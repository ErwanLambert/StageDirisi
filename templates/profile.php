<?php $this->title = 'Mon profil'; ?>
<h1>Site DIRISI</h1>
<p>En construction</p>
<?= $this->session->show('update_password'); ?>
<div>
    <h2><?= $this->session->get('pseudo'); ?></h2>
    <p><?= $this->session->get('idPers'); ?></p>
    <a href="../public/index.php?route=updatePassWord">Modifier son mot de passe</a>
    <a href="../public/index.php?route=editPersonnel&personnelId=<?= $this->session->get('idPers'); ?>">Modifier</a>
    <a href="../public/index.php?route=deletePersonnel&personnelId=<?= $this->session->get('idPers'); ?>">Supprimer</a>
    <a href="../public/index.php?route=form_permission&personnelId=<?= $this->session->get('idPers'); ?>">Demande de permission</a>
</div>
<br>
<a href="../public/index.php">Retour à l'accueil</a>