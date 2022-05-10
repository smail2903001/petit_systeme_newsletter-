<?php
/* ou aura besoin 2 fct => une pr incrementer le compteur 
et l'autre pr lire ce compteur */

function ajouter_vue(): void
{   // chemin vers le ficheir qui va contenaire le compteur 
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    $fichier_journalier = $fichier . '-' . date('Y-m-d');
    incrementer_comptuer($fichier);
    incrementer_comptuer($fichier_journalier);
}

function incrementer_comptuer(string $fichier): void
{
    $compteur = 1;
    if (file_exists($fichier)) {
        // verifier c'est le fichier compteur existe 
        // si le fichier existe on incremente 
        $compteur = (int)file_get_contents($fichier);
        $compteur++;
    }
    // sinon on cree le fichier avec la valeur 1
    file_put_contents($fichier, $compteur);
}

/* fonction qui va recuperer le nbr de vues */

function nombre_vues(bool $journalier = false): string
{
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    if ($journalier) {
        $fichier .=  '-' . date('Y-m-d');
    }
    return file_get_contents($fichier);
}
