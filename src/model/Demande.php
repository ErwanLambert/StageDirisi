<?php
namespace Site\src\model;

class Demande
{
    private $idDemande;
    private $commentaire;
    private $adresse;
    private $dateDebut;
    private $timeDebut;
    private $dateFin;
    private $timeFin;
    private $idType;
    private $idPers;
    private $idEtat;

    public function getIdDemande()
    {
        return $this->idDemande;
    }

    public function setIdDemande($idDemande)
    {
        $this->idDemande = $idDemande;
    }

    public function getCommentaire()
    {
        return $this->commentaire;
    }

    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }

    public function getTimeDebut()
    {
        return $this->timeDebut;
    }

    public function setTimeDebut($timeDebut)
    {
        $this->timeDebut = $timeDebut;
    }

    public function getDateFin()
    {
        return $this->dateFin;
    }

    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    }

    public function getTimeFin()
    {
        return $this->timeFin;
    }

    public function setTimeFin($timeFin)
    {
        $this->timeFin = $timeFin;
    }

    public function getIdType()
    {
        return $this->idType;
    }

    public function setIdType($idType)
    {
        $this->idType = $idType;
    }

    public function getIdPers()
    {
        return $this->idPers;
    }

    public function setIdPers($idPers)
    {
        $this->idPers = $idPers;
    }

    public function getIdEtat()
    {
        return $this->idEtat;
    }

    public function setIdEtat($idEtat)
    {
        $this->idEtat = $idEtat;
    }
}