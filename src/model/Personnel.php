<?php 
namespace Site\src\model;

class Personnel
{
    private $idPers;
    private $nom;
    private $prenom;
    private $grade;
    private $defGrade;
    private $idBureau;
    private $idArmee;
    private $pseudo;
    private $password;
    private $createdAt;

    public function getIdPers()
    {
        return $this->idPers;
    }

    public function setIdPers($idPers)
    {
        $this->idPers = $idPers;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getGrade()
    {
        return $this->grade;
    }

    public function setGrade($grade)
    {
        $this->grade = $grade;
    }

    public function getDefGrade()
    {
        return $this->defGrade;
    }

    public function setDefGrade($defGrade)
    {
        $this->defGrade = $defGrade;
    }

    public function getIdBureau()
    {
        return $this->idBureau;
    }

    public function setIdBureau($idBureau)
    {
        $this->idBureau = $idBureau;
    }

    public function getIdArmee()
    {
        return $this->idArmee;
    }

    public function setIdArmee($idArmee)
    {
        $this->idArmee = $idArmee;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
}