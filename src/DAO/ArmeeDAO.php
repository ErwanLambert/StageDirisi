<?php
namespace Site\src\DAO;
use Site\config\Parameter;
use Site\src\model\Armee;

class ArmeeDAO extends DAO
{
    private function buildObject($row)
    {
        $armee = new Armee();
        $armee->setIdArmee($row['idArmee']);
        $armee->setLibelle($row['libelle']);
        return $armee;
    }

    public function getArmees()
    {
        $sql = 'SELECT * FROM armee';
        $result = $this->createQuery($sql);
        $armees = [];
        foreach ($result as $row){
            $armeeId = $row['idArmee'];
            $armees[$armeeId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $armees;
    }

    public function getArmeeFromPersonnel($personnelId)
    {
        $sql = 'SELECT a.libelle FROM armee a JOIN personnel p USING(idArmee) WHERE p.idPers = ?';
        $result = $this->createQuery($sql, [$personnelId]);
        $armee = [];
        foreach ($result as $row) {
            $armeeId = $row['idArmee'];
            $armee[$armeeId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $armee;
    }
}