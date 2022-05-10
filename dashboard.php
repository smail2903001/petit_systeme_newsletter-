<?php
require './functions/compteur.php';
$annee = (int)date('Y');
$annee_selection = !empty($_GET['annee']) ? (int)$_GET['annee'] : null;
$mois_selection = !empty($_GET['mois']) ? $_GET['mois'] : null;
if ($annee_selection && $mois_selection) {
    $total = nombre_vues_mois($annee_selection, $mois_selection);
} else {
    $total = nombre_vues();
}
$mois = [
    '01' => 'janvier',
    '02' => 'Fevrier',
    '03' => 'Mars',
    '04' => 'Avril',
    '05' => 'Mai',
    '06' => 'Juin',
    '07' => 'Juillet',
    '08' => 'Aout',
    '09' => 'Septembre',
    '10' => 'Octobre',
    '11' => 'Novembre',
    '12' => 'Decembre'
];
require 'elements/header.php'; ?>
<div class="row">
    <div class="col-md-4">
        <div class="list-group-item">
            <?php for ($i = 0; $i < 5; $i++) : ?>
                <a href="dashboard.php?annee=<?= $annee - $i ?>" class="list-group-item <?= $annee - $i === $annee_selection ? 'active' : ''; ?>"><?= $annee - $i ?></a>
                <?php if ($annee - $i === $annee_selection) : ?>
                    <?php foreach ($mois as $numero => $nom) : ?>
                        <a class="list-group-item <?= $numero === $mois_selection ? 'active' : ''; ?> ?> " href="dashboard.php?annee=<?= $annee_selection ?>&mois=<?= $numero ?>">
                            <?= $nom ?>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <strong style="font-size: 3em;"><?= $total ?></strong>
                <br>
                Visite<?= ($total > 1) ? 's' : ''; ?> total
            </div>
        </div>
    </div>
</div>
<hr>
<?php require 'elements/footer.php'; ?>