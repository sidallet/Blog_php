<?php
    if(!isset($_COOKIE['nbMessages']))
            setcookie('nbMessages',0, time()+365*24*60*60, null, null, false, true);
    //charge les classes & les vues
    require_once("config/Autoload.php");
    try {
        $al = new Autoload();
        $al::charger();
    }catch(Exception $e){
        require_once("vues/vueErreur.php");
        echo $e->getMessage();
    }

    require_once(__DIR__.'/config/config.php');

    $frontCont = new FrontControleur();
    
