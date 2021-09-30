<?php $this->title = "Site DIRISI"; ?>
<h1>Site DIRISI</h1>
<p>En construction</p>
<div>
    <h2><?= htmlspecialchars($secteur->getNomSec());?></h2>
    <p><?= htmlspecialchars($secteur->getAcronyme());?></p>
</div>
<br>
<a href="../public/index.php">Retour à l'accueil</a>
<div id="bureaux" class="texte-left" style="margin-left: 50px">
    <h3>Bureaux</h3>
    <?php
    foreach ($bureaux as $bureau)
    {
        ?>
        <div>
            <h4><a href="../public/index.php?route=bureau&bureauId=<?=htmlspecialchars($bureau->getIdBureau());?>"><?= htmlspecialchars($bureau->getNomBureau());?></a></h4>
            <p><?= htmlspecialchars($bureau->getAcronymeBureau());?></p>
        </div>
        <?php
    }
    ?>
</div>