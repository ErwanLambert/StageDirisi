<?php
namespace Site\src\DAO;
use Site\config\Parameter;
use Site\src\model\Etat;

class EtatDAO extends DAO
{
    private function buildObject($row)
    {
        $etat = new Etat();
        $etat->setIdEtat($row['idEtat']);
        $etat->setLibelle($row['libelle']);
        return $etat;
    }

    public function getEtatAttente($idEtat)
    {
        $sql = 'SELECT e.libelle FROM etat e JOIN demande d USING(idEtat) WHERE d.idEtat = ?';
        $result = $this->createQuery($sql, [$idEtat]);
        $etat = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($etat);
    }
}