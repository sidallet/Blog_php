<?php

class Admin
{
    private $login;
    private $mdp;

    /**
     * @param $login
     * @param $mdp
     */

    #la création d'un instance d'Admin nécessite un login ($login) correspondant à un Admin de la Base de Données et son mdp
    public function __construct(string $login, string $mdp)
    {
        $this->login = $login;
        $this->mdp = $mdp;
    }


    public function __toString() : string {
        return "toString de l'Admin de login ".$this->getLogin();
    } 


    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getMdp(): string
    {
        return $this->mdp;
    }

    /**
     * @param string $mdp
     */
    public function setMdp(string $mdp)
    {
        $this->mdp = $mdp;
    }

}