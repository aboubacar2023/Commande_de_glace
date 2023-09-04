<?php
$erreur = NULL;
if (!empty($_POST['pseudo']) && !empty($_POST['motdepasse'])) {
    if ($_POST['pseudo'] === 'Bane' && $_POST['motdepasse'] === 'ab') {
        session_start();
        $_SESSION['connecte'] = 1;
        header('location: index.php');
        exit();
    } else {
        $erreur = "Identifiant inconnu";
    }
}
require 'fonctions/auth.php';
if (est_connecte()) {
    header('location: index.php');
    exit();
}
require 'header.php';
?>
<?php
if ($erreur) : ?>
    <div class="alert alert-danger">
        <?= $erreur ?>
    </div>
<?php endif; ?>
<form action="" method="POST">
    <div class="form-group">
        <input type="text" class="form-control" name="pseudo" placeholder="Nom d'utilisateur">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="motdepasse" placeholder="Votre mot de passe">
    </div><br>
    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>