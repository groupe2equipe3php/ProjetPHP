<?php
session_start();
require_once '../modele/bdd_connexion.php';
require_once '../modele/bdd_verification.php';
require_once '../modele/bdd_recherche.php';

$bdd = bdd_connexion();

$email  = $_POST['email'];
$mdp    = $_POST['mdp'];
echo 'Identifiants récupérés.<br/>';

if (is_null($email)) {
    echo 'L\'e-mail n\'est pas renseigné.';
    die();
} elseif (is_null($mdp)) {
    echo 'Le mot de passe n\'est pas renseigné.';
    die();
}

if(bdd_user_verification_connexion($bdd, $email, $mdp)) {
    echo 'Connecté<br/>';
    $_SESSION['pseudo'] = get_pseudo($bdd, $email);
    $_SESSION['email']  = $email;
}
else {
    echo 'Pas connecté.<br/>';
}
?>
    <form action="../vue/index.php">
        <br/><input type="submit" value="Accueil"/><br/>
    </form>