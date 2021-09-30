<?php $this->title = "Site DIRISI"; ?>

<h1>Site DIRISI</h1>
<p>En construction</p>
<?= $this->session->show('edit_personnel'); ?>
<?= $this->session->show('add_personnel'); ?>
<?= $this->session->show('form_permission'); ?>
<?= $this->session->show('login'); ?>
<?= $this->session->show('logout'); ?>
<?= $this->session->show('delete_personnel'); ?><br>
<?php
if($this->session->get('pseudo')){
    ?>
    <a href="../public/index.php?route=logout">Déconnexion</a>
    <a href="../public/index.php?route=profile">Profil</a>
    <?php
}else{
    ?>
    <a href="../public/index.php?route=addPersonnel">Inscription</a>
    <a href="../public/index.php?route=login">Connexion</a>
    <?php
}
?>
<?php
    foreach ($secteurs as $secteur)
    {
        ?>
            <div>
                    <h2><a href="../public/index.php?route=secteur&secteurId=<?=htmlspecialchars($secteur->getIdSec());?>"><?= htmlspecialchars($secteur->getNomSec());?></a></h2>
                    <p><?= htmlspecialchars($secteur->getAcronyme());?></p>
            </div>
        <?php
    }
?>