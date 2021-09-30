<?php $this->title = "Demande de permission"; 
use Site\src\DAO\ArmeeDAO;
$armee = new ArmeeDAO();
?>
<h1>Site DIRISI</h1>
<p>En construction</p>
<div>
    <form method="post" action="../public/index.php?route=form_permission&personnelId=<?= htmlspecialchars($personnel->getIdPers());?>">
        <label for="nom">Nom : </label>
        <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($personnel->getNom());?>" disabled="disabled"><br>
        <label for="prenom">Prénom : </label>
        <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($personnel->getPrenom());?>" disabled="disabled"><br>
        <label for="armee">Armée : </label>
        <?php
        $armees = $armee->getArmees(); 
        foreach ($armees as $armee){
            if($armee->getIdArmee() === $personnel->getIdArmee()){
            ?>
                <input type="text" id="armee" name="armee" value="<?= htmlspecialchars($armee->getLibelle());?>" disabled="disabled"><br><br>
                <?php
            }
        }
        ?>
        <label for="date">Date de début : </label>
        <input type="date" id="dateDebut" name="dateDebut">
        <select id="timeDebut" name="timeDebut">
            <option value="1" selected>Inclus</option>
            <option value="2">Matin</option>
            <option value="3">Après-midi</option>
        </select><br><br>
        <label for="date">Date de fin : </label>
        <input type="date" id="dateFin" name="dateFin">
        <select id="timeFin" name="timeFin">
            <option value="1" selected>Inclus</option>
            <option value="2">Matin</option>
            <option value="3">Après-midi</option>
        </select><br><br>
        <label for="idType">Type d'absence : </label>
        <select id="idType" name="idType">
        <?php
        use Site\src\DAO\TypeAbsenceDAO;
        $typeAbsence = new TypeAbsenceDAO();
        $typesAbsence = $typeAbsence->getTypesAbsence(); 
        foreach ($typesAbsence as $typeAbsence){
            ?>
            <option value="<?= htmlspecialchars($typeAbsence->getIdType());?>" id="idType" name="idType"><?= htmlspecialchars($typeAbsence->getLibelleType());?></option>
        <?php 
        }
        ?>
        </select><br><br> 
        <label for="commentaire">Commentaire : </label>
        <textarea type="textarea" id="commentaire" name="commentaire"></textarea><br>
        <label for="adresse">Adresse : </label>
        <textarea type="textarea" id="adresse" name="adresse"></textarea><br><br>
        <input type="submit" value="Envoyer" id="submit" name="submit">
    </form>
    <a href="../public/index.php">Retour à l'accueil</a>
</div>