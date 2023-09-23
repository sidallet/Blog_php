<?php

class FrontControleur
{
    public function __construct() {
        //démarrage de session
        session_start();
        $_SESSION['isInAffichageRecherche'] = false;

        if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
            $action  = $_REQUEST['action'];
        }
        else{
            $action=null;
        }


        $listeActionAdmin = array('decoAdmin', 'ajouterNews', 'supprimerNews','accederAjouterNews');
        $mdlAdmin = new ModeleAdmin();

        try {
            if ($mdlAdmin->isAdmin()) {
                $admin = $mdlAdmin->returnAdmin();
            }
            else
                $admin = null;

            if(isset($_REQUEST['action']) && in_array($_REQUEST['action'], $listeActionAdmin)) {
                if($admin == null) {
                    require_once("vues/vueLogin.php");
                }
                else
                    new ControleurAdmin($admin);
            }
            else
                new ControleurUser();


        } catch(Exception $e) {
            $VueErreur = $e->getMessage();
            require_once("vues/vueErreur.php");
        }
    }
}