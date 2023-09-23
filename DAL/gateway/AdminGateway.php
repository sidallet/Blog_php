<?php

class AdminGateway
{
    private $con;

    public function __construct(Connection $con){
        $this->con = $con;
    }

    #renvoit un tableau des Admin ayant leur attribut login égal à $login
    public function FindAdminByLogin($login) {
        if($login != "") {
            //préparation et exécution de la requête
            $query='select * from Admin where login=:login';
            $this->getCon()->executeQuery($query, array( ':login' => array($login,PDO::PARAM_STR),));
            
            //conversion en objets
            $results=$this->getCon()->getResults();
            foreach($results as $row)
            $Tab_dAdmin[] = new Admin($row['login'], $row['mdp']);
            if(!isset($Tab_dAdmin)) {
                return NULL; //aucun admin trouvé avec ce login
            }
            return $Tab_dAdmin;
        }
        else throw new RuntimeException("Erreur : veuillez renseigner un login admin");
    }

    public function FindAdminByLoginMdp($login, $mdp) :array {
        if($login != "") {
            if($mdp != "") {
                //préparation et exécution de la requête
                $query = 'select * from Admin where login=:login and mdp=:mdp';
                $this->getCon()->executeQuery($query, array(':login' => array($login, PDO::PARAM_STR), ':mdp' => array($mdp, PDO::PARAM_STR)));

                //conversion en objets
                $results = $this->getCon()->getResults();
                foreach ($results as $row) {
                    $Tab_dAdmin[] = new Admin($row['login'], $row['mdp']);
                }
                return $Tab_dAdmin;
            }
            else throw new RuntimeException("Erreur : veuillez renseigner un mdp valide pour ce login");
        }
        else throw new RuntimeException("Erreur : veuillez renseigner un login admin");
    }


    #renvoit le hash du Admin d'attribut login égal à $login
    public function FindHashByLogin($login)  {
        if($login != "") {
            //préparation et exécution de la requête
            $query='select * from Admin where login=:login';
            $this->getCon()->executeQuery($query, array( ':login' => array($login,PDO::PARAM_STR),));

            //conversion en objets
            $results=$this->getCon()->getResults();
            if(!empty($results)) {
                return $results[0]['mdp']; //hash en réalité dans la BD
            }
        }
        else throw new RuntimeException("Erreur : veuillez renseigner un login admin");
    }


    #insère un nouvel Admin dans la BD avec les attributs $login et $mdp
    public function insertAdmin($login, $mdp){
        $query = 'insert into Admin(login, mdp) VALUES(:login, :mdp)';
        $this->getCon()->executeQuery($query, array(':login' => array($login,PDO::PARAM_STR), ':mdp' => array($mdp,PDO::PARAM_STR)));
    }

    #supprime l'Admin ayant son attribut login(PRIMARY KEY) égal à $login
    public function deleteAdmin($login){
        $query = 'delete from Admin where login = :login';
        $this->getCon()->executeQuery($query, array(':login' => array($login,PDO::PARAM_STR)));
    }


    //GETTERS ET SETTERS
    /**
     * @return Connection
     */
    public function getCon(): Connection
    {
        return $this->con;
    }

    /**
     * @param Connection $con
     */
    public function setCon(Connection $con)
    {
        $this->con = $con;
    }
} 