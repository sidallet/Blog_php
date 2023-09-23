<?php

class News
{
    private $idNews;
    private $titre;
    private $contenu;
    private $date;

    /**
     * @param $idNews
     * @param $titre
     * @param $contenu
     * @param $date
     */

    #pour créer une instance de News, son id($idNews) est obligatoire, ainsi que son titre($titre),
    #son contenu($contenu) et sa sate de publication($date).
    public function __construct(int $idNews, string $titre, string $contenu, string $date)
    {
        $this->idNews = $idNews;
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->date = $date;
    }

    public function __toString() : string {
        return "toString de la News d'id ".$this->getIdNews()." de titre ".$this->getTitre()." publiée à la date ".$this->getDate();
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

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
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
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

}
