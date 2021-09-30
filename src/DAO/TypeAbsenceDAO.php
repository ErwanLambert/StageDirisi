<?php
namespace Site\src\DAO;
use Site\config\Parameter;
use Site\src\model\TypeAbsence;

class TypeAbsenceDAO extends DAO
{
    private function buildObject($row)
    {
        $typeAbsence = new TypeAbsence();
        $typeAbsence->setIdType($row['idType']);
        $typeAbsence->setLibelleType($row['libelleType']);
        return $typeAbsence;
    }

    public function getTypesAbsence()
    {
        $sql = 'SELECT idType, libelleType FROM typeabsence';
        $result = $this->createQuery($sql);
        $typesAbsence = [];
        foreach ($result as $row) {
            $typeAbsence = $row['idType'];
            $typesAbsence[$typeAbsence] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $typesAbsence;
    }
}