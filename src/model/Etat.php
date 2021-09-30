<?php
namespace Site\src\model;

class Etat
{
    private $idEtat;
    private $libelle;

    public function getIdEtat()
    {
        return $this->idEtat;
    }

    public function setIdEtat($idEtat)
    {
        $this->idEtat = $idEtat;
    }

    public function getLibelle()
    {
        return $this->libelle;
    }

    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }
}