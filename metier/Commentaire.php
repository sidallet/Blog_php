<?php

#Est lié à une instance de News d'idNews $idNews
class Commentaire
{
    private $idCommentaire;
    private $pseudo;
    private $contenu;
    private $idNews;
    /**
     * @param $idCommentaire
     * @param $pseudo
     * @param $contenu
     * @param $idNews
     */

    #la création d'une instance de Commentaire nécessite un id de commentaire($idCommentaire), l'id de la News auquel il est attaché($idNews),
    #le pseudo de l'utilisateur ayant posté ce commentaire($pseudo) et le contenu du commentaire($contenu)
    public function __construct(int $idCommentaire, int $idNews, string $pseudo, string $contenu)
    {
        $this->idCommentaire = $idCommentaire;
        $this->pseudo = $pseudo;
        $this->contenu = $contenu;
        $this->idNews = $idNews;
    }

    public function __toString() : string {
        return "toString du Commentaire d'id ".$this->getIdCommentaire()." rattaché à la News d'id ".$this->getIdNews()." créé par le bloggeur de pseudo ".$this->getPseudo();
    } 

    /**
     * @return mixed
     */
    public function getIdCommentaire()
    {
        return $this->idCommentaire;
    }

    /**
     * @param mixed $idCommentaire
     */
    public function setIdCommentaire($idCommentaire)
    {
        $this->idCommentaire = $idCommentaire;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * @return mixed
     */
    public function getIdNews()
    {
        return $this->idNews;
    }

    /**
     * @param mixed $idNews
     */
    public function setIdNews($idNews)
    {
        $this->idNews = $idNews;
    }



}