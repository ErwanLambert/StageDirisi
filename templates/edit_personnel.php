<?php $this->title = "Modifier le personnel"; ?>
<h1>Site DIRISI</h1>
<p>En construction</p>
<div>
    <form method="post" action="../public/index.php?route=editPersonnel&personnelId=<?= htmlspecialchars($personnel->getIdPers());?>">
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($personnel->getNom());?>" disabled="disabled"><br>
        <?= isset($errors['nom']) ? $errors['nom'] : ''; ?>
        <label for="prenom">Prénom</label>
        <input type="text" if="prenom" name="prenom" value="<?= htmlspecialchars($personnel->getPrenom());?>" disabled="disabled"><br>
        <?= isset($errors['prenom']) ? $errors['prenom'] : ''; ?>
        <label for="idArmee">Armée </label>
        <select id="idArmee" name="idArmee" disabled="disabled">
        <?php
        use Site\src\DAO\ArmeeDAO;
        $armee = new ArmeeDAO();
        $armees = $armee->getArmees(); 
        foreach ($armees as $armee){
            ?>
            <option value="<?= htmlspecialchars($armee->getIdArmee());?>" id="idArmee" name="idArmee"
            <?php
            if($armee->getIdArmee() === $personnel->getIdArmee()){
                ?>
                selected
                <?php
            }
            ?>
            ><?= htmlspecialchars($armee->getLibelle());?></option>
        <?php 
        }
        ?>
        </select><br><br>
        <label for="defGrade">Grade</label>
        <select id="defGrade" name="defGrade" >
        <?php
        use Site\src\DAO\PersonnelDAO;
        $defGrade = new PersonnelDAO();
        $defGrades = $defGrade->getGrades(); 
        foreach ($defGrades as $defGrade){
            ?>
            <option value="<?= htmlspecialchars($defGrade->getDefGrade());?>" id="defGrade" name="defGrade"
            <?php
            if($defGrade->getDefGrade() === $personnel->getDefGrade()){
                ?>
                selected
                <?php
            }
            ?>
            ><?= htmlspecialchars($defGrade->getDefGrade());?></option>
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
            <option value="<?= htmlspecialchars($grade->getGrade());?>" id="grade" name="grade"
            <?php 
            if($grade->getGrade() === $personnel->getGrade()){
                ?>
                selected
                <?php
            }
            ?>            
            ><?= htmlspecialchars($grade->getGrade());?></option>
        <?php 
        }
        ?>
        </select><br><br>
        <label for="pseudo">Pseudo </label><br>
        <input type="text" id="pseudo" name="pseudo" value="<?= htmlspecialchars($personnel->getPseudo());?>"><br>
        <label for="password">Mot de passe </label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Mettre à jour" id="submit" name="submit">
    </form><br>
    <a href="../public/index.php">Retour à l'accueil</a>
<div>