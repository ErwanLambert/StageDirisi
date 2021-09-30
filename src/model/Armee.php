<?php
namespace Site\src\model;

class Armee
{
    private $idArmee;
    private $libelle;

    public function getIdArmee()
    {
        return $this->idArmee;
    }

    public function setIdArmee($idArmee)
    {
        $this->idArmee = $idArmee;
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