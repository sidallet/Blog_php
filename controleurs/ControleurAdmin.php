<?php

# selon l'action indiquée dans le champ 'action', permet à un admin connecté d'ajouter ou supprimer une news
class ControleurAdmin extends ControleurUser
{
    function __construct($admin) {
        $VueErreur = array();
        if($admin == null) {
            $VueErreur[]="Erreur : l'internaute n'est pas Admin";
            require ("vues/vueErreur.php");
        }


        

        try{
            if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
                $action  = $_REQUEST['action'];
            }
            else{
                $action=null;
            }

            switch($action){
                case null: //si l'action a un pb, passe ici
                    $this->changerPage();
                    $VueErreur[]="Erreur d'appel php";
                    require ("vues/vueErreur.php");
                    break;
                case 'accederAjouterNews':
                    $this->accederAjouterNews();
                    break;
                case 'ajouterNews':
                    $this->ajouterNews();
                    break;
                case 'supprimerNews':
                    $this->supprimerNews();
                    break;
                case 'decoAdmin':
                    $this->decoAdmin();
                    break;
                default: //action="afficher" quand on change page donc passe forcement ici
                    $this->changerPage();
            }

        } catch (PDOException $e)
        {
            //si erreur BD, pas le cas ici
            $VueEreur[] =   "Erreur inattendue!!! ";
            require ("vues/vueErreur.php");

        }
        catch (Exception $e2)
            {
                $VueEreur[] =   "Erreur inattendue!!! ";
                require ("vues/vueErreur.php");
            }


    //fin
    exit(0);
        
        //$this->changerPage();
    }//fin constructeur


    function accederAjouterNews()
    {
        require("vues/ajouterNews.php");
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

    # va appeler la méthode ajouterNews de ModeleNews, en affectant les champs correspondants
    # aux variables $date, $titre et $contenu
    function ajouterNews()
    {

        $modeleN = new ModeleNews();
        try{
            $date = $_POST['date'];
            $titre = $_POST['titre'];
            $contenu = $_POST['contenu'];
            $modeleN->ajouterNews($date,$titre,$contenu);
            $this->changerPage();
        }
        catch(Exception $e) {
                $VueErreur[] = $e->getMessage();
                require_once("vues/vueErreur.php");
                return;
        } 
        

    }

    # va appeler la méthode supprimerNews de ModeleNews
    function supprimerNews()
    {
        $id=$_GET['idNews'];
        $modeleN = new ModeleNews();
        try{
            $modeleN->suppressionNews($id);
            $this->changerPage();
        }
        catch(Exception $e) {
                $VueErreur[] = $e->getMessage();
                require_once("vues/vueErreur.php");
                return;
        } 
        
    }


    function decoAdmin() {
        $modeleA = new ModeleAdmin();
        $modeleA->deconnexion();
        $this->changerPage();
    }
}
