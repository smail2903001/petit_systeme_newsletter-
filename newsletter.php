<?php
session_start();
require './elements/header.php';
$error = null;
$email = null;
$success = null;
if (!empty($_POST['email'])) {
    // verifier l'email avec la fct filter_var
    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'emails' . DIRECTORY_SEPARATOR . date('Y-m-d');
        file_put_contents($file, $email . PHP_EOL, FILE_APPEND);
        $success = "Votre mail a bien ete enregistre";
        $email = null;
    } else {
        $error = "Email invalide";
    }
}

?>

<h1>S'inscrire a la newsletter</h1>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, iure corrupti cum sint, delectus harum dolorum perspiciatis labore, nulla quos magni reprehenderit facere quidem libero impedit maiores! Cumque, commodi dolorem?</p>

<?php if ($error) : ?>
    <div class="alert alert-danger">
        <?= $error ?>
    </div>
<?php endif; ?>

<?php if ($success) : ?>
    <div class="alert alert-success">
        <?= $success ?>
    </div>
<?php endif; ?>

<form class="form-inline" action="/newsletter.php" method="POST">
    <div class="form-group">
        <input class="form-control" type="email" name="email" placeholder="Entrer votre email" value="<?php echo $email !== null ?  htmlentities($email) : ''; ?>">
    </div>
    <button type="submit" class="btn btn-primary">S'inscrire</button>

</form>



<?php
require './elements/footer.php';
?>