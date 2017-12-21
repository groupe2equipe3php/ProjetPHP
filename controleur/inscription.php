<?php
require_once '../modele/bdd_connexion.php';
require_once '../modele/bdd_insertion.php';

$bdd = bdd_connexion();

$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$pseudo = htmlspecialchars($_POST['pseudo']);
$email = htmlspecialchars($_POST['email']);
$mdp = htmlspecialchars($_POST['mdp']);
echo 'Paramètres récupérés.<br/>';

if (is_null($nom)) {
    echo 'Le nom n\'est pas renseigné.';
    die();
} elseif (is_null($prenom)) {
    echo 'Le prénom n\'est pas renseigné.';
    die();
} elseif (is_null($pseudo)) {
    echo 'Le pseudo n\'est pas renseigné.';
    die();
} elseif (is_null($email)) {
    echo 'L\'e-mail n\'est pas renseigné.';
    die();
} elseif (is_null($mdp)) {
    echo 'Le mot de passe n\'est pas renseigné.';
    die();
}

bdd_user_insertion($bdd, $nom, $prenom, $pseudo, $email, $mdp);
?>