<?php
session_start();
$title = "Nous contact";
$nav = "contact";
require './elements/header.php'; ?>


<div class="row">
    <div class="col-md-8">
        <h2> Nous conatcter</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat eum distinctio maiores ipsa! Sapiente cum totam impedit dolore hic, perspiciatis at doloremque ab nulla? Incidunt laudantium delectus ducimus sunt officia.</p>
    </div>
    <div class="col-md-4">
        <h2>Debug</h2>
        <pre>
            <?= var_dump($_SESSION) ?>
        </pre>
    </div>
</div>
<?php require './elements/footer.php'; ?>