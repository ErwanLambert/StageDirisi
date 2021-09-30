<?php
$route = isset($personnel) && $personnel->getIdPers() ? 'editPersonnel&personnelId='.$personnel->getIdPers() : 'addPersonnel';
$nom = isset($personnel) && $personnel->getNom() ? htmlspecialchars($personnel->getNom()) : '';
$prenom = isset($personnel) && $personnel->getPrenom() ? htmlspecialchars($personnel->getPrenom()) : '';
$DefGrade = isset($personnel) && $personnel->getDefGrade() ? htmlspecialchars($personnel->getDefGrade()) : '';
$Grade = isset($personnel) && $personnel->getGrade() ? htmlspecialchars($personnel->getGrade()) : '';
$idBureau = isset($personnel) && $personnel->getIdBureau() ? htmlspecialchars($personnel->getIdBureau()) : '';

?>
<form method="post" action="../public/index.php?route=addPersonnel ?>">
    <label for="nom">Nom</label><br>
    <input type="text" id="nom" name="nom" value="<?= $nom; ?>"><br><br>
    <label for="prenom">Prénom</label><br>
    <input type="text" id="prenom" name="prenom" value="<?= $prenom; ?>"><br><br>
    <label for="defGrade">Grade</label>
    <select id="defGrade" name="defGrade">
    <?php
    use Site\src\DAO\PersonnelDAO;
    $defGrade = new PersonnelDAO();
    $defGrades = $defGrade->getGrades(); 
    foreach ($defGrades as $defGrade){
        ?>
        <option value="<?= htmlspecialchars($defGrade->getDefGrade());?>" id="defGrade" name="defGrade"><?= htmlspecialchars($defGrade->getDefGrade());?></option>
    <?php 
    }
    ?>
    </select><br><br>
    <label for="grade">Acronyme</label>
    <select id="grade" name="grade">
    <?php
    $grade = new PersonnelDAO();
    $grades = $grade->getGrades(); 
    foreach ($grades as $grade){
        ?>
        <option value="<?= htmlspecialchars($grade->getGrade());?>" id="grade" name="grade"><?= htmlspecialchars($grade->getGrade());?></option>
    <?php 
    }
    ?>
    </select><br>
    <br>
    <label for="idBureau">Bureau</label>
    <select id="idBureau" name="idBureau">
    <?php
    use Site\src\DAO\BureauDAO;
    $bureau = new BureauDAO();
    $bureaux = $bureau->getBureaux(); 
    foreach ($bureaux as $bureau){
        ?>
        <option value="<?= htmlspecialchars($bureau->getIdBureau());?>"><?= htmlspecialchars($bureau->getAcronymeBureau());?> - <?= htmlspecialchars($bureau->getNomBureau());?></option>
    <?php 
    }
    ?>
    </select><br><br>
    <input type="submit" value="Envoyer" id="submit" name="submit">
</form>