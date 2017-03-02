<?php
$hote = 'localhost';
$utilisateur = 'root';
$mdp = 'root';
$nom_bdd = 'max-book';

try {
    $bdd = new PDO('mysql:host=' . $hote . ';dbname=' . $nom_bdd . ';charset=utf8',
        $utilisateur,
        $mdp,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch(Exception $e) {
    var_dump('Erreur SQL:'. $e->getMessage());
    die();
}
