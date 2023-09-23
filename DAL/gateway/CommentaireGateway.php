<?php

class CommentaireGateway
{
    private $con;

    public function __construct(Connection $con){
        $this->con = $con;
    }

    public function countCommByPseudo($pseudo) : array {
        if($pseudo != "") {
            //préparation et exécution de la requête
            $query = 'select count(*) from Commentaire where pseudo=:pseudo';
            $this->getCon()->executeQuery($query, array(':pseudo' => array($pseudo, PDO::PARAM_STR)));

            $results=$this->getCon()->getResults();
            foreach ($results as $row) {
                $nbMess = $row;
            }
            return $nbMess;
        }
        else throw new Exception("Veuillez renseigner un pseudo valide");
    }

    #renvoit un tableau des Commentaire ayant leur attribut idCommentaire égal à $id
    public function FindCommentaireById($id) :array {
        if($id >= 0) {
            //préparation et exécution de la requête
            $query='select * from Commentaire where idCommentaire=:id';
            $this->getCon()->executeQuery($query, array( ':id' => array($id,PDO::PARAM_INT)));
            
            //conversion en objets
            $results=$this->getCon()->getResults();
            Foreach($results as $row)
                $Tab_de_Comm[] = new Commentaire($row['idCommentaire'], $row['idNews'], $row['pseudo'], $row['contenu']);

            if(empty($Tab_de_Comm))
                return [];
            return $Tab_de_Comm;
        }
        else throw new RuntimeException("Erreur : veuillez renseigner un id de commentaire supérieur ou égal à 0");
    }

    #renvoit un tableau des Commentaire ayant leur attribut idNews égal à $idNews
    public function FindCommentaireByIdNews($idNews) :array {
        if($idNews >= 0) {
            //préparation et exécution de la requête
            $query='select * from Commentaire where idNews=:idNews';
            $this->getCon()->executeQuery($query, array( ':idNews' => array($idNews,PDO::PARAM_INT)));

            //conversion en objets
            $results=$this->getCon()->getResults();
            Foreach($results as $row)
                $Tab_de_Comm[] = new Commentaire($row['idCommentaire'], $row['idNews'], $row['pseudo'], $row['contenu']);

            if(empty($Tab_de_Comm))
                return [];
            return $Tab_de_Comm;
        }
        else throw new RuntimeException("Erreur : veuillez renseigner un id de commentaire supérieur ou égal à 0");
    }

    #insère dans la BD un Commentaire avec les attributs $idCommentaire, $idNews, $pseudo et $contenu
    public function insertCommentaire($idCommentaire, $idNews, $pseudo, $contenu){
        $query = 'insert into Commentaire(idCommentaire, idNews, pseudo, contenu) VALUES(:idCommentaire, :idNews, :pseudo, :contenu)';
        $this->getCon()->executeQuery($query, array(':idCommentaire' => array($idCommentaire,PDO::PARAM_INT), ':idNews' => array($idNews,PDO::PARAM_INT), ':pseudo' => array($pseudo,PDO::PARAM_STR), ':contenu' => array($contenu,PDO::PARAM_STR)));
    }

    #supprime de la BD le Commentaire d'idCommentaire égal à $id
    public function deleteCommentaire($id){
        $query = 'delete from Commentaire where idCommentaire = :id';
        $this->getCon()->executeQuery($query, array(':id' => array($id,PDO::PARAM_INT)));
    }

    #modifie dans la BD le contenu du Commentaire d'idCommentaire égal à $idCommentaire.
    #ce contenu est remplacé par $contenu.
    public function updateContenuCommentaire($idCommentaire, $contenu){
        $query = 'update Commentaire set contenu = :contenu where idCommentaire = :idCommentaire';
        $this->getCon()->executeQuery($query, array(':idCommentaire' => array($idCommentaire,PDO::PARAM_INT), ':contenu' => array($contenu,PDO::PARAM_STR)));
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


