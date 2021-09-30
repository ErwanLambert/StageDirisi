<?php
namespace Site\src\model;

class Bureau
{
    private $idBureau;
    private $nomBureau;
    private $acronymeBureau;
    private $idSec;

    public function getIdBureau()
    {
        return $this->idBureau;
    }

    public function setIdBureau($idBureau)
    {
        $this->idBureau = $idBureau;
    }

    public function getNomBureau()
    {
        return $this->nomBureau;
    }

    public function setNomBureau($nomBureau)
    {
        $this->nomBureau = $nomBureau;
    }

    public function getAcronymeBureau()
    {
        return $this->acronymeBureau;
    }

    public function setAcronymeBureau($acronymeBureau)
    {
        $this->acronymeBureau = $acronymeBureau;
    }

    public function getIdSec()
    {
        return $this->idSec;
    }

    public function setIdSec($idSec)
    {
        $this->idSec = $idSec;
    }
}