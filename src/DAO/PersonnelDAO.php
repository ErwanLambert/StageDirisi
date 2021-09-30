<?php
namespace Site\src\DAO;
use Site\config\Parameter;
use Site\src\model\Personnel;

class PersonnelDAO extends DAO
{
    private function buildObject($row)
    {
        $personnel = new Personnel();
        $personnel->setIdPers($row['idPers']);
        $personnel->setNom($row['nom']);
        $personnel->setPrenom($row['prenom']);
        $personnel->setGrade($row['grade']);
        $personnel->setDefGrade($row['defGrade']);
        $personnel->setIdArmee($row['idArmee']);
        $personnel->setPseudo($row['pseudo']);
        $personnel->setPassword($row['password']);
        return $personnel;
    }

    public function getPersonnelsFromBureau($bureauId)
    {
        $sql = 'SELECT idPers, nom, prenom, grade, defGrade FROM personnel WHERE idBureau = ? ORDER BY idPers ASC';
        $result = $this->createQuery($sql, [$bureauId]);
        $personnels = [];
        foreach ($result as $row) {
            $personnelId = $row['idPers'];
            $personnels[$personnelId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $personnels;
    }

    public function getPersonnel($personnelId)
    {
        $sql = 'SELECT idPers, nom, prenom, grade, defGrade, idBureau, idArmee, pseudo, password FROM personnel WHERE idPers = ?';
        $result = $this->createQuery($sql, [$personnelId]);
        $personnel = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($personnel);
    }

    public function getGrades()
    {
        $sql = 'SELECT grade, defGrade FROM personnel GROUP BY grade';
        $result = $this->createQuery($sql);
        $grades = [];
        foreach ($result as $row) {
            $gradeUni = $row['grade'];
            $grades[$gradeUni] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $grades;
    }

    public function getDefGrades()
    {
        $sql = 'SELECT grade, defGrade FROM personnel GROUP BY grade';
        $result = $this->createQuery($sql);
        $defGrades = [];
        foreach ($result as $row) {
            $defGradeUni = $row['defGrade'];
            $defGrades[$defGradeUni] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $defGrades;
    }

    public function getLibelle($personnelId)
    {
        $sql ='SELECT a.libelle FROM personnel p JOIN armee a USING(idArmee) WHERE idPers = ?';
        $result = $this->createQuery($sql, [$personnelId]);
        $armee = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($armee);

        //$sql = 'SELECT s.idSec, s.nomSec, s.acronyme FROM bureau b JOIN secteur s USING(idSec) WHERE idBureau = ?';
        //$result = $this->createQuery($sql, [$bureauId]);
        //$bureau = $result->fetch();
        //$result->closeCursor();
        //return $this->buildObject($bureau);
    }

    public function addPersonnel(Parameter $post)
    {
        $this->checkUser($post);
        $sql = 'INSERT INTO personnel (idPers, nom, prenom, grade, defGrade, idBureau, idArmee, pseudo, password, createdAt) VALUES (idPers, ?, ?, ?, ?, ?, ?, ?, ?, NOW())';
        $this->createQuery($sql, [$post->get('nom'), $post->get('prenom'), $post->get('grade'), $post->get('defGrade'), $post->get('idBureau'), $post->get('idArmee'), $post->get('pseudo'), password_hash($post->get('password'), PASSWORD_BCRYPT)]);
    }

    public function checkUser(Parameter $post)
    {
        $sql = 'SELECT COUNT(pseudo) FROM personnel WHERE pseudo = ?';
        $result = $this->createQuery($sql, [$post->get('pseudo')]);
        $isUnique = $result->fetchColumn();
        if($isUnique){
            return '<p>Le pseudo existe déjà</p>';
        }
    }

    public function login(Parameter $post)
    {
        $sql = 'SELECT idPers, password FROM personnel WHERE pseudo = ?';
        $data = $this->createQuery($sql, [$post->get('pseudo')]);
        $result = $data->fetch();
        $isPasswordValid = password_verify($post->get('password'), $result['password']);
        return [
            'result' => $result,
            'isPasswordValid' => $isPasswordValid
        ];
    }

    public function editPersonnel(Parameter $post, $personnelId)
    {
        $sql = 'UPDATE personnel SET defGrade=:defGrade, grade=:grade WHERE idPers=:personnelId';
        $this->createQuery($sql, [
            'defGrade' => $post->get('defGrade'),
            'grade' => $post->get('grade'),
            'personnelId' => $personnelId
        ]);
    }

    public function deletePersonnel($personnelId)
    {
        $sql = 'DELETE FROM personnel WHERE idPers = ?';
        $this->createQuery($sql, [$personnelId]);
    }

    public function updatePassword(Parameter $post, $pseudo)
    {
        $sql ='UPDATE personnel SET password = ? WHERE pseudo = ?';
        $this->createQuery($sql, [password_hash($post->get('password'), PASSWORD_BCRYPT), $pseudo]);
    }
}