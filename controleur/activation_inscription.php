<?php
require_once '../modele/bdd_connexion.php';
require_once '../modele/bdd_recherche.php';
require_once '../modele/bdd_insertion.php';

$email = $_GET['email'];
$cle   = $_GET['cle'];

$bdd    = bdd_connexion();
$clebdd = get_cle($bdd, $email);
$actif  = get_actif($bdd, $email);

if($actif == '1') {
    echo 'Votre compte est déjà actif !<br/>';
}
else {
    if($cle == $clebdd) {
        bdd_set_actif($bdd, $email);
    }
    else {
        echo 'Une erreur est survenue, votre compte n\'a pas été activé.<br/>';
    }
}
?>
    <form action="../vue/index.php">
        <br/><input type="submit" name="index" value="Accueil"/>
    </form>