<?php

# selon l'action indiquée dans le champ 'action', permet à l'utilisateur de changer de page, ajouter un commentaire,
# ouvrir/fermer la fenêtre des commentaires, et rechercher une news
class ControleurUser
{
    function __construct() {
        
        global $rep, $vues;

        $VueErreur = array();

        try{
            if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){ //si l'action n'est pas vide
                $action  = $_REQUEST['action'];
            }
            else{ //sinon on lui affecte null
                $action=null;
            }

            switch($action){
                case NULL:
                    $this->changerPage();
                    break;
                case 'afficherConnexion': //cas du click sur le bouton "Connexion" du header
                    $this->afficherConnexion();
                    break;
                case 'connexionAdmin': //cas de connexion à un compte Admin existant
                    $this->connexionAdmin();
                    break;
                case 'fenetreAjouterAdmin':
                    $this->fenetreAjouterAdmin();
                    break;
                case 'ajouterAdmin': //cas de la création d'un compte Admin
                    $this->createAdmin();
                    break;
                case 'ajouterCommentaire': //action="ajouterCommentaire" quand on clique sur valider le commentaire donc passe ici
                    $this->addNewComment();
                    $this->changerPage();
                    break;
                case 'fenetreCommentaire': //cas de l'ouverture/fermeture de la fenêtre pour commenter
                    $this->accederFormComm();
                    break;
                case 'fenetreListeCommentaire': //cas de l'ouverture de la liste des commentaires
                    $this->accederListeCommentaire();
                    break;
                case 'rechercherNews': //cas d'un click sur le bouton de recherche par dates du header
                    $this->rechercherNews();
                    break;
                default: //action="afficher" quand on change page donc passe forcement ici
                    $this->changerPage();
            }

        } catch (PDOException $e)
        {
            //si erreur BD, pas le cas ici
            $VueEreur[] = $e->getMessage();
            require ("vues/vueErreur.php");

        }
        catch (Exception $e2)
            {
                $VueEreur[] = $e2->getMessage();
                require ("vues/vueErreur.php");
            }


    //fin
    exit(0);
        
        //$this->changerPage();
    }//fin constructeur

    function afficherConnexion()
    {
        require("vues/vueLogin.php");
    }

    //connecte l'utilisateur en tant qu'Admin
    function connexionAdmin() {
        $login = $_REQUEST['loginAdmin'];
        $mdp = $_REQUEST['password'];
        try {
            $modeleA = new ModeleAdmin();
            $b = $modeleA->connexion($login, $mdp);
            $this->changerPage();
        }
        catch(Exception $e) {
                $VueErreur[] = $e->getMessage();
                require_once("vues/vueErreur.php");
                return;
        } 
            
    }

    //Ouvre al fenêtre contenant le formulaire pour ajouter l'Admin
    function fenetreAjouterAdmin() {
        require("vues/vueAjouterAdmin.php");
    }

    //crée un nouveau compte Admin dans la BD
    function createAdmin() {
        $modeleA = new ModeleAdmin();
        if ($_REQUEST['newPassword'] != $_REQUEST['newPassword2'] ) {
            echo "Mot de passe mal saisi";
            require_once("vues/vueAjouterAdmin.php");
        }
            else {
               try{
                $modeleA->insererAdmin($_REQUEST['newLoginAdmin'], $_REQUEST['newPassword'], $_REQUEST['newPassword2']);
                $this->changerPage();
            }
            catch(Exception $e) {
                $VueErreur[] = $e->getMessage();
                require_once("vues/vueErreur.php");
                return;
            } 
        }
        
    }

    #modifie les News affichées dans la vue affichageNews
    # pour augmenter le nombre de news par page ======> augmenter $nbNewsParPage
    function changerPage() {

        $modeleN = new ModeleNews();
        $nbNewsParPage = 2;
        try{
            $nbNews = $modeleN->nombreNews();
        }
        catch(Exception $e) {
            $nbNews = 0;
            $VueErreur[] = $e->getMessage();
            require_once("vueErreur.php");
        }

        $nbPages = ceil($nbNews / $nbNewsParPage);

        if(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $nbPages) {
            $page=intval($_GET['page']);
        }
        else {
            $page= 1;
        }


        $premierNews = ($page - 1) * $nbNewsParPage;
        $listNews = $modeleN->newsParPage($premierNews, $nbNewsParPage);
        $_SESSION['isInAffichageRecherche'] = false;
        require_once("vues/affichageNews.php");
    }

    #appelle la vue servant à ajouter un commentaire
    function accederFormComm()
    {
        $id= $_GET['idNews'];
        require("vues/ajoutComm.php");
    }


    function accederListeCommentaire()
    {
        $modeleN = new ModeleNews();
        $modeleC= new ModeleCommentaire();
        try{
            $nbNews = $modeleN->nombreNews();
        }
        catch(Exception $e) {
            $nbNews = 0;
            $VueErreur[] = $e->getMessage();
            require_once("vueErreur.php");
        }

        $id= $_GET['idNews'];
        $listComm = $modeleC->rechercheCommentaire($id);
        require("vues/vueCommentaires.php");
    }



    #appelle la méthode ajouterCommentaire de ModeleCommentaire
    function addNewComment() {
        $id=$_GET['idNews'];
        $modeleC = new ModeleCommentaire();
        $modeleA = new ModeleAdmin();

        if(!isset($_SESSION['pseudo'])) {
            $pseudoComm = $_POST['pseudo'];
            $_SESSION['pseudo'] = $pseudoComm;
        }
        else {
            $pseudoComm = $_SESSION['pseudo'];
        }

        $commentComm = $_POST['commentaire'];
        $modeleC->ajouterCommentaire($id, $pseudoComm, $commentComm);

        //update du cookie
        setcookie('nbMessages', $_COOKIE['nbMessages']+1, time()+365*24*60*60, null, null, false, true);
    }



    #cette méthode est appelée quand un utilisateur indique une certaine date, et cette fonction
    #affiche seulement les News dont l'attribut date est celui indiqué
    function rechercherNews()
    {   
        $date = $_POST['rechercheDate'];
        $modeleN = new ModeleNews();
        try {
            if(isset($date) && !empty($date)) {
                $listNews = $modeleN->newsParDate($date);
                $nbPages = sizeof($listNews);
                $nbNews = $modeleN->nombreNews();
                $_SESSION['isInAffichageRecherche'] = true;
                require_once('vues/affichageNews.php');
            }
            else {
                echo "Veuillez renseigner une date.";
                $this->changerPage();
            }

        } catch (Exception $e) {
            $VueErreur[] = $e->getMessage();
            require_once('vues/vueErreur.php');
        }
    }


    
}
