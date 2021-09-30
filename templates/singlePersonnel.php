<?php $this->title = "Site DIRISI"; ?>
<h1>Site DIRISI</h1>
<p>En construction</p>
<div>
    <h2><?= htmlspecialchars($secteur->getNomSec());?></h2>
    <p><?= htmlspecialchars($secteur->getAcronyme());?></p>
    <div>
    <h2><?= htmlspecialchars($bureau->getNomBureau());?></h2>
    <p><?= htmlspecialchars($bureau->getAcronymeBureau());?></p>
    </div>
</div>
<br>
<a href="../public/index.php">Retour à l'accueil</a>
<div id="personnels" class="texte-left" style="margin-left: 50px">
    <h3>Personnels</h3>
    <?php
    foreach ($personnels as $personnel)
    {
        ?>
        <div>
            <h4><?= htmlspecialchars($personnel->getNom());?> <?= htmlspecialchars($personnel->getPrenom());?></h4>
            <p><?= htmlspecialchars($personnel->getDefGrade());?></p>
        </div>
        <div class="actions">
            <a href="../public/index.php?route=editPersonnel&personnelId=<?= $personnel->getIdPers(); ?>">Modifier</a>
            <a href="../public/index.php?route=deletePersonnel&personnelId=<?= $personnel->getIdPers(); ?>">Supprimer</a>
            <a href="../public/index.php?route=form_permission&personnelId=<?= $personnel->getIdPers(); ?>">Demande de permission</a>
        <div>
        <?php
    }
    ?>
</div>