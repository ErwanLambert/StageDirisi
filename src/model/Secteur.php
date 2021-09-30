<?php
namespace Site\src\model;

class Secteur
{
    private $idSec;
    private $nomSec;
    private $acronyme;

    public function getIdSec()
    {
        return $this->idSec;
    }

    public function setIdSec($idSec)
    {
        $this->idSec = $idSec;
    }

    public function getNomSec()
    {
        return $this->nomSec;
    }

    public function setNomSec($nomSec)
    {
        $this->nomSec = $nomSec;
    }

    public function getAcronyme()
    {
        return $this->acronyme;
    }

    public function setAcronyme($acronyme)
    {
        $this->acronyme = $acronyme;
    }
}