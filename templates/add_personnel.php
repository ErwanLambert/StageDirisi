<?php $this->title = "Nouveau personnel"; ?>
<h1>Site DIRISI</h1>
<p>En construction</p>
<div>
    <form method="post" action="../public/index.php?route=addPersonnel">
        <label for="nom">Nom</label><br>
        <input type="text" id="nom" name="nom"><br>
        <?= isset($errors['nom']) ? $errors['nom'] : ''; ?>
        <label for="prenom">Prénom</label><br>
        <input type="text" id="prenom" name="prenom"><br>
        <?= isset($errors['prenom']) ? $errors['prenom'] : ''; ?><br>
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
        <label for="idArmee">Armée </label>
        <select id="idArmee" name="idArmee">
        <?php
        use Site\src\DAO\ArmeeDAO;
        $armee = new ArmeeDAO();
        $armees = $armee->getArmees(); 
        foreach ($armees as $armee){
            ?>
            <option value="<?= htmlspecialchars($armee->getIdArmee());?>"><?= htmlspecialchars($armee->getLibelle());?></option>
        <?php 
        }
        ?>
        </select><br><br>
        <label for="pseudo">Pseudo </label><br>
        <input type="text" id="pseudo" name="pseudo"><br>
        <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
        <label for="password">Mot de passe </label><br>
        <input type="password" id="password" name="password"><br><br>
        <?= isset($errors['password']) ? $errors['password'] : ''; ?>
        <input type="submit" value="Envoyer" id="submit" name="submit">
    </form>
    <a href="../public/index.php">Retour à l'accueil</a>
<div>


        