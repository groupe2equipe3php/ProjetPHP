<?php
require_once '../modele/bdd_connexion.php';
require_once '../modele/bdd_recherche.php';

$mot = $_POST['mot_a_traduire'];
$bdd = bdd_connexion();

$traduction = get_traduction($bdd, $mot);

if(! $traduction) {
    header('Location: ../vue/proposition_traduction.php');
}
else {
    echo $traduction;
}