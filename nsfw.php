<?php
$age = null;
// definir le cookie 
if (!empty($_POST['birthday'])) {
    setcookie('birthday', $_POST['birthday']);
    // definir ds le talbleau des cookies un cle ..
    // mais on va voir ceci que pour la prochine requette ...
    // Petite Solution => definir manuellement 
    $_COOKIE['birthday'] = $_POST['birthday'];
}
// verifier l'age 
if (!empty($_COOKIE['birthday'])) {
    $birthday = (int)$_COOKIE['birthday'];
    $age = date('Y') - $birthday;
}
require 'elements/header.php';
?>

<?php if ($age && $age >= 18) : ?>
    <h1>Du contenu reserve aux adultes</h1>
<?php elseif ($age !== null) : ?>
    <div class="alert alert-danger">
        Vous n'avez pas l'age requis pr voir le contenu
    </div>
<?php else : ?>
    <form action="" method="post">
        <div class="form-group">
            <label for="birthday">Section reservee pour les adultes , entrer votre annee de naissance</label>
            <select name="birthday" id="birthday" class="form-control">
                <?php for ($i = 2010; $i > 1910; $i--) : ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <button type="sumbit" class="btn btn-primary"> Envoyer </button>
    </form>
<?php endif; ?>
<?php
require 'elements/footer.php';
?>