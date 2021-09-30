<?php
namespace Site\src\DAO;
use Site\config\Parameter;
use Site\src\model\Demande;

class DemandeDAO extends DAO
{
    private function buildObject($row)
    {
        $demande = new Demande();
        $demande->setIdDemande($row['idDemande']);
        $demande->setCommentaire($row['commentaire']);
        $demande->setAdresse($row['adresse']);
        $demande->setDateDebut($row['dateDebut']);
        $demande->setTimeDebut($row['timeDebut']);
        $demande->setDateFin($row['dateFin']);
        $demande->setTimeFin($row['timeFin']);
        $demande->setIdType($row['idType']);
        $demande->setIdPers($row['idPers']);
        $demande->setIdEtat($row['idEtat']);
        return $demande;
    }
    
    public function addPerm($post, $personnelId)
    {
        $sql = 'INSERT INTO demande (idDemande, commentaire, adresse, dateDebut, timeDebut, dateFin, timeFin, idType, idPers, idEtat) VALUES (idDemande, ?, ?, ?, ?, ?, ?, ?, ?, 1)';
        $this->createQuery($sql, [$post->get('commentaire'), $post->get('adresse'), $post->get('dateDebut'), $post->get('timeDebut'), $post->get('dateFin'), $post->get('timeFin'), $post->get('idType'), $personnelId]);
    }
}