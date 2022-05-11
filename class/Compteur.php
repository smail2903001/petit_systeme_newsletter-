<?php
class Compteur
{
    const INCREMENT = 1;
    protected $fichier;
    public function __construct(string $fichier)
    {
        $this->fichier = $fichier;
    }

    public function incrementer(): void
    {
        $compteur = 1;
        if (file_exists($this->fichier)) {
            // verifier c'est le fichier compteur existe 
            // si le fichier existe on incremente 
            $compteur = (int)file_get_contents($this->fichier);
            $compteur += self::INCREMENT;
        }
        // sinon on cree le fichier avec la valeur 1
        file_put_contents($this->fichier, $compteur);
    }

    public function recuperer(): int
    {
        if (!file_exists($this->fichier)) {
            return 0;
        }
        return file_get_contents($this->fichier);
    }
}
