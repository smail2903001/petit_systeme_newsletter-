<?php
$nom = null;
if (!empty($_GET['action']) && $_GET['action'] === 'deconnecter') {
    // method => unset => detruit une variable + ca peut etre utiliser pr detruire les cles ds un tableau
    unset($_COOKIE['utilisateur']);
    // meme ceci => detruit la varaible pr le rest d'execution et pas depuis le tableau de cookies
    setcookie('utilisateur', '', time() - 1);
}
if (!empty($_COOKIE['utilisateur'])) {
    $nom = $_COOKIE['utilisateur'];
}
if (!empty($_POST['nom'])) {
    setcookie('utilisateur', $_POST['nom']);
    $nom = $_POST['nom'];
}
/* cette page va pas fonctionner que c'est 
l'utilisateur a entre son nom (formaulaires)*/
require 'elements/header.php'; ?>
<?php if ($nom) : ?>
    <h1>Bonjour <?= htmlentities($nom) ?></h1>
    <a href="./profil.php?action=deconnecter">Se deconnecter</a>
<?php else : ?>
    <form action="" method="post">
        <div class="form-group">
            <input class="form-control" name="nom" placeholder="Entrer votre nom">
        </div>
        <button class="btn btn-primary">Se connecter</button>
    </form>
<?php endif; ?>

<?php
require 'elements/footer.php';
?>