<?php

#fait la liaison entre la classe métier News et la NewsGateway
#permet de ne pas mélanger PHP et SQL
class ModeleNews
{
    private $dsn;
    private $user;
    private $password;

    public function __construct()
    {
        global $dsn, $user, $password;
        $this->dsn = $dsn;
        $this->user = $user;
        $this->password = $password;
    }

    # appelle FindNewsByDate de NewsGateway qui renvoit les News de date $date
    public function newsParDate($date)
    {
        $g = new NewsGateway(new Connection($this->getDsn(), $this->getUser(), $this->getPassword()));
        if (isset($date))
        {
            if(Validation::Verifier_date($date)) 
            {
               $listNews = $g->FindNewsByDate($date);
                if(empty($listNews)) {
                    require_once("index.php");
                }

            return $listNews; 
            }

            
        }
        else{
            $VueErreur[] = ["Date attendue"];
            require_once("vues/vueErreur.php");
        }
    }

    # appelle FindNewsPage de NewsGateway qui renvoit toutes les News d'idNews
    # entre $premierNews et ($premierNews + $nbNewsParPage -1)
    public function newsParPage($premierNews,$nbNewsParPage)
    {
        global $dsn, $user, $password;
        $premierNews = Nettoyage::Nettoyer_int($premierNews);
        $nbNewsParPage = Nettoyage::Nettoyer_int($nbNewsParPage);
        $g = new NewsGateway(new Connection($dsn, $user, $password));
        $listNews = $g->FindNewsPage($premierNews, $nbNewsParPage);
        return $listNews;
    }

    # appelle CountTotalNews de NewsGateway qui renvoit toutes les News de la BD
    public function nombreNews()
    {
        $g = new NewsGateway(new Connection($this->getDsn(), $this->getUser(), $this->getPassword()));
        $nb=$g->CountTotalNews();
        if($nb==0)
        {
            throw new Exception("Pas de news");
        }
        return $nb;
    }


    # après nettoyage, si les variables $date, $titre, $contenu sont valides,
    # on appelle la méthode insertNews de ModeleNews
    public function ajouterNews($date,$titre,$contenu)
    {
        $g = new NewsGateway(new Connection($this->getDsn(), $this->getUser(), $this->getPassword()));

        if(Validation::Verifier_string($titre)) {
            if (Validation::Verifier_string($contenu)) {
                if (Validation::Verifier_date($date)) {
                     $titre = Nettoyage::Nettoyer_string($titre);
                $contenu = Nettoyage::Nettoyer_string($contenu);
                $g->insertNews(NULL, $titre, $contenu, $date);
                }
               else {
                echo "Veuillez saisir une date ";
                }
            }
            else {
                echo "Veuillez saisir un contenu ";
            }
        }
        else{
            echo "Veuillez saisir un titre ";
        }
    }


    # appelle deleteNews de NewsGateway qui supprime dans la BD la news ayant l'idNews $id
    public function suppressionNews($id)
    {
        $g = new NewsGateway(new Connection($this->getDsn(), $this->getUser(), $this->getPassword()));
        $g->deleteNews($id);
    }


    //GETTERS & SETTERS
    /**
     * @return string
     */
    public function getDsn(): string
    {
        return $this->dsn;
    }

    /**
     * @param string $dsn
     */
    public function setDsn(string $dsn)
    {
        $this->dsn = $dsn;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param string $user
     */
    public function setUser(string $user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }
}