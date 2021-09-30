<?php
namespace Site\src\DAO;
use Site\src\model\Secteur;

class SecteurDAO extends DAO
{
    private function buildObject($row)
    {
        $secteur = new Secteur();
        $secteur->setIdSec($row['idSec']);
        $secteur->setNomSec($row['nomSec']);
        $secteur->setAcronyme($row['acronyme']);
        return $secteur;
    }

    public function getSecteurs()
    {
        $sql = 'SELECT idSec, nomSec, acronyme FROM secteur ORDER BY idSec ASC';
        $result = $this->createQuery($sql);
        $secteurs = [];
        foreach ($result as $row){
            $secteurId = $row['idSec'];
            $secteurs[$secteurId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $secteurs;
    }

    public function getSecteur($secteurId)
    {
        $sql = 'SELECT idSec, nomSec, acronyme FROM secteur WHERE idSec = ?';
        $result = $this->createQuery($sql, [$secteurId]);
        $secteur = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($secteur);
    }

    public function getSecteurFromBureau($bureauId)
    {
        $sql = 'SELECT s.idSec, s.nomSec, s.acronyme FROM bureau b JOIN secteur s USING(idSec) WHERE idBureau = ?';
        $result = $this->createQuery($sql, [$bureauId]);
        $bureau = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($bureau);
    }
}