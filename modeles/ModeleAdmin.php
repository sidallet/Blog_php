<?php

class ModeleAdmin
{
    private $dsn;
    private $user;
    private $password;

    public function __construct() {
        global $dsn, $user, $password;
        $this->dsn = $dsn;
        $this->user = $user;
        $this->password = $password;
    }

    //Connecte l'admin avec les login et mdp renseignés, en passant par AdminGateway
    public function connexion($login, $mdp) {

        $gA = new AdminGateway(new Connection($this->getDsn(), $this->getUser(), $this->getPassword()));

        $login = Nettoyage::Nettoyer_string($login);
        $mdp = Nettoyage::Nettoyer_string($mdp);
        $hash = $gA->FindHashByLogin($login);
        if ($gA->FindAdminByLogin($login) == null) {
            echo "Le login Admin '".$login."' n'existe pas.";
            require_once("vues/vueLogin.php");
        }
        else if(!isset($hash)) {
            echo "Le mot de passe donné n'est pas le bon.";
        }
        else if(password_verify($mdp, $hash)){
            $_SESSION['role'] = 'admin';
            $_SESSION['login'] = $login;
            return true;
        }
        return false;
    }

    //Détruit la session actuelle et réinitialise les variables de session
    public function deconnexion() {
        session_unset();
        session_destroy();
        $_SESSION = array();
    }

    //revoit un booléen
    public function isAdmin() {
        if(isset($_SESSION['role']) && isset($_SESSION['login']))
            return true;
        else
            return false;
    }

    //renvoit une instance de l'Admin si elle existe, NULL sinon
    public function returnAdmin() {
        if(isset($_SESSION['role']) && isset($_SESSION['login'])) {
            $login = Nettoyage::Nettoyer_string($_SESSION['login']);
            $role = Nettoyage::Nettoyer_string($_SESSION['role']);
            return new Admin($login, $role);
        }
        else
            return null;
    }

    //appelle la gateway admin et insère un admin
    public function insererAdmin($login, $mdp, $mdpVerif) {
        if(isset($login) && isset($mdp) && isset($mdpVerif) && !empty($login) && !empty($mdp) && !empty($mdpVerif)) {
            $login = Nettoyage::Nettoyer_string($login);
            if(Nettoyage::Nettoyer_string($mdp) == Nettoyage::Nettoyer_string($mdpVerif)) {
                $aGW = new AdminGateway(new Connection($this->getDsn(), $this->getUser(), $this->getPassword()));

                $mdpCrypte = password_hash($mdp, PASSWORD_BCRYPT);
                $aGW->insertAdmin($login, $mdpCrypte);
            }
        }
    }

    //GETTERS & SETTERS
    /**
     * @return mixed
     */
    public function getDsn()
    {
        return $this->dsn;
    }

    /**
     * @param mixed $dsn
     */
    public function setDsn($dsn)
    {
        $this->dsn = $dsn;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
 }