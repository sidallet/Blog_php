<?php

class NewsGateway
{
    private $con;

    public function __construct(Connection $con){
        $this->con = $con;
    }

    #renvoit un tableau contenant toutes les News de la BD
    public function FindNewsAll() :array {
            //préparation et exécution de la requête
            $query='select * from News';
            $this->getCon()->executeQuery($query, array());

            //conversion en objets
            $results=$this->getCon()->getResults();
            Foreach($results as $row)
                $Tab_de_News[] = new News($row['idNews'], $row['titre'], $row['contenu'], $row['date']);
            return $Tab_de_News;
    }

    #renvoit le nombre de News présentes dans la BD
    public function CountTotalNews() :int {
            //préparation et exécution de la requête
            $query='select * from News';
            $this->getCon()->executeQuery($query, array());
            //conversion en objets
            $results=$this->getCon()->getCount();
            return $results;
    }

    #renvoit un tableau des News ayant leur attribut idNews entre $id et ($id + $nbNews -1)
    public function FindNewsPage($premierNews,$nbNews) :array {
            //$idFin=$premierNews + $nbNews-1;

            //préparation et exécution de la requête
            //$query='select * from News where idNews >= :premierNews and idNews <= :idFin';
            $query='select * from News LIMIT :premierNews, :nbNews';
            $this->getCon()->executeQuery($query, array( ':premierNews' => array($premierNews,PDO::PARAM_INT),':nbNews' => array($nbNews,PDO::PARAM_INT)));

            //conversion en objets
            $results=$this->getCon()->getResults();
            Foreach($results as $row)
                $Tab_de_News[] = new News($row['idNews'], $row['titre'], $row['contenu'], $row['date']);
            return $Tab_de_News;
    }

    #renvoit un tableau des News ayant leur attribut date égal à $date
    public function FindNewsByDate($date) :array {
        if($date <> 0) {
            //préparation et exécution de la requête
            $query='select * from News where date=:date';
            $this->getCon()->executeQuery($query, array( ':date' => array($date,PDO::PARAM_STR),));
            
            //conversion en objets
            $results=$this->getCon()->getResults();
            if(empty($results)) return array();

            Foreach($results as $row)
                $Tab_de_News[] = new News($row['idNews'], $row['titre'], $row['contenu'], $row['date']);
            return $Tab_de_News;
        }
        else throw new RuntimeException("Erreur rencontrée dans FindNewsByDate");
    }

    #renvoit un tableau des News ayant leur attribut date égal à $id
    public function FindNewsById($id) :array {
        if($id > 0) {
            //préparation et exécution de la requête
            $query='select * from News where idNews=:id';
            $this->getCon()->executeQuery($query, array( ':id' => array($id,PDO::PARAM_STR),));
            
            //conversion en objets
            $results=$this->getCon()->getResults();
            Foreach($results as $row)
                $Tab_de_News[] = new News($row['idNews'], $row['titre'], $row['contenu'], $row['date']);
            return $Tab_de_News;
        }
        else throw new RuntimeException("Erreur rencontrée dans FindNewsById");
    }

    #renvoit un tableau des News ayant leur attribut titre égal à $titre
    public function FindNewsByTitre($titre) :array {
        if($titre != "") {
            //préparation et exécution de la requête
            $query='select * from News where titre=:titre';
            $this->getCon()->executeQuery($query, array( ':titre' => array($titre,PDO::PARAM_STR),));
            
            //conversion en objets
            $results=$this->getCon()->getResults();
            Foreach($results as $row)
                $Tab_de_News[] = new News($row['idNews'], $row['titre'], $row['contenu'], $row['date']);
            return $Tab_de_News;
        }
        else throw new RuntimeException("Erreur rencontrée dans FindNewsByTitre");
    }

    # insertion dans la BD d'une News avec les attributs $idNews, $titre, $contenu et $date
    public function insertNews($idNews, $titre, $contenu, $date){
        $query = 'insert into News(idNews, titre, contenu, date) VALUES(:idNews, :titre, :contenu, :date)';
        $this->getCon()->executeQuery($query, array(':idNews' => array($idNews,PDO::PARAM_INT), ':titre' => array($titre,PDO::PARAM_STR), ':contenu' => array($contenu,PDO::PARAM_STR), ':date' => array($date,PDO::PARAM_STR)));
    }

    # suppression dans la BD de la News d'attribut idNews égal à $idNews
    public function deleteNews($idNews){
        $query2 = 'delete from Commentaire where idnews= :idNews'; //obligatoire pour supprimer correctement
        $query = 'delete from News where idNews = :idNews';
        $this->getCon()->executeQuery($query2, array(':idNews' => array($idNews,PDO::PARAM_INT)));
        $this->getCon()->executeQuery($query, array(':idNews' => array($idNews,PDO::PARAM_INT)));
    }

    # modifie tous les attributs de la News d'attribut idNews égal à $idNews
    public function updateAllNews($idNews, $titre, $contenu, $date){
        $query = 'update News set titre = :titre and contenu = :contenu and date = :date where idNews = :idNews';
        $this->getCon()->executeQuery($query, array(':idNews' => array($idNews,PDO::PARAM_INT), ':titre' => array($titre,PDO::PARAM_STR), ':contenu' => array($contenu,PDO::PARAM_STR), ':date' => array($date,PDO::PARAM_STR)));
    }

    # modifie le titre de la News d'attribut idNews égal à $idNews
    public function updateTitreNews($idNews, $titre){
        $query = 'update News set titre = :titre where idNews = :idNews';
        $this->getCon()->executeQuery($query, array(':idNews' => array($idNews,PDO::PARAM_INT), ':titre' => array($titre,PDO::PARAM_STR)));
    }

    # modifie tous le contenu de la News d'attribut idNews égal à $idNews
    public function updateContenuNews($idNews, $contenu){
        $query = 'update News set contenu = :contenu where idNews = :idNews';
        $this->getCon()->executeQuery($query, array(':idNews' => array($idNews,PDO::PARAM_INT), ':contenu' => array($contenu,PDO::PARAM_STR)));
    }

    # modifie tous la date de la News d'attribut idNews égal à $idNews
    public function updateDateNews($idNews, $date){
        $query = 'update News set date = :date where idNews = :idNews';
        $this->getCon()->executeQuery($query, array(':idNews' => array($idNews,PDO::PARAM_INT), ':date' => array($date,PDO::PARAM_STR)));
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