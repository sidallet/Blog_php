<?php

#fait la liaison entre la classe métier Commentaire et la CommentaireGateway
#permet de ne pas mélanger PHP et SQL
class ModeleCommentaire
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

    public function numberCommByPseudo($pseudo) {
        $g = new CommentaireGateway(new Connection($this->getDsn(), $this->getUser(), $this->getPassword()));

        $pseudo = Nettoyage::Nettoyer_string($pseudo);
        if(Validation::Verifier_string($pseudo)) {
            $arrayNbComm = $g->countCommByPseudo($pseudo);
            return $arrayNbComm[0];
        }
        else
            throw new Exception("Ce pseudo n'est pas valide ! (envoyé depuis ModeleCommentaire)");
    }


    # Si les champs pseudo et commentaire sont renseignés, nettoie et valide les champs etappelle la méthode insertCommentaire de CommentaireGateway
    # (qui insère le commentaire dans la BD)
    public function ajouterCommentaire($idNews, $pseudo, $commentaire)
    {
        $g = new CommentaireGateway(new Connection($this->getDsn(), $this->getUser(), $this->getPassword()));


        $pseudo = Nettoyage::Nettoyer_string($pseudo);
        $commentaire = Nettoyage::Nettoyer_string($commentaire);
        $idNews = Nettoyage::Nettoyer_int($idNews);
        if(Validation::Verifier_string($pseudo)) {
            if (Validation::Verifier_string($commentaire)) {
                if(Validation::Verifier_int($idNews)) {
                    $g->insertCommentaire(NULL, $idNews, $pseudo, $commentaire);
                }
                else {
                    echo "idNews non valide ";
                }
            }
            else {
                echo "Veuillez saisir un commentaire ";
            }
        }
        else{
            echo "Veuillez saisir un pseudo ";
        }

    }

    public function rechercheCommentaire($idNews)
    {
        $g = new CommentaireGateway(new Connection($this->getDsn(), $this->getUser(), $this->getPassword()));
        $idNews = Nettoyage::Nettoyer_int($idNews);
        $listComm = $g->FindCommentaireByIdNews($idNews);
        return $listComm;
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