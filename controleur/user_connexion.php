<?php
require_once '../modele/bdd_connexion.php';
require_once '../modele/bdd_verification.php';

$bdd = bdd_connexion();

$email = $_POST['email'];
$mdp   = $_POST['mdp'];
echo 'Identifiants récupérés.<br/>';

if (is_null($email)) {
    echo 'L\'e-mail n\'est pas renseigné.';
    die();
} elseif (is_null($mdp)) {
    echo 'Le mot de passe n\'est pas renseigné.';
    die();
}

if(bdd_user_connexion($bdd, $email, $mdp)) {
    echo 'Whes ju connecté<br/>';
}
else {
    echo 'zebi<br/>';
}

?>