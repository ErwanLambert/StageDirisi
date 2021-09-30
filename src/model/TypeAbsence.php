<?php
namespace Site\src\model;

class TypeAbsence
{
    private $idType;
    private $libelleType;

    public function getIdType()
    {
        return $this->idType;
    }

    public function setIdType($idType)
    {
        $this->idType = $idType;
    }

    public function getLibelleType()
    {
        return $this->libelleType;
    }

    public function setLibelleType($libelleType)
    {
        $this->libelleType = $libelleType;
    }
}