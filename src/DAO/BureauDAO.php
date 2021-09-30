<?php
namespace Site\src\DAO;
use Site\src\model\Bureau;

class BureauDAO extends DAO
{
    private function buildObject($row)
    {
        $bureau = new Bureau();
        $bureau->setIdBureau($row['idBureau']);
        $bureau->setNomBureau($row['nomBureau']);
        $bureau->setAcronymeBureau($row['acronymeBureau']);
        return $bureau;
    }

    public function getBureauxFromSecteur($secteurId)
    {
        $sql = 'SELECT idBureau, nomBureau, acronymeBureau FROM bureau WHERE idSec = ? ORDER BY idBureau ASC';
        $result = $this->createQuery($sql, [$secteurId]);
        $bureaux = [];
        foreach ($result as $row){
            $bureauId = $row['idBureau'];
            $bureaux[$bureauId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $bureaux;
    }

    public function getBureaux()
    {
        $sql = 'SELECT idBureau, nomBureau, acronymeBureau FROM bureau ORDER BY idBureau ASC';
        $result = $this->createQuery($sql);
        $bureaux = [];
        foreach ($result as $row){
            $bureauId = $row['idBureau'];
            $bureaux[$bureauId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $bureaux;
    }

    public function getBureau($bureauId)
    {
        $sql = 'SELECT idBureau, nomBureau, acronymeBureau FROM bureau WHERE idBureau = ?';
        $result = $this->createQuery($sql, [$bureauId]);
        $bureau = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($bureau);
    }
}