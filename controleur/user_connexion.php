<?php
session_start();

require_once '../gettext.inc.php';

require_once '../modele/bdd_connexion.php';
require_once '../modele/bdd_verification.php';
require_once '../modele/bdd_recherche.php';

initialiser_gettext($_SESSION['lang']);

$bdd = bdd_connexion();

$email  = $_POST['email'];
$mdp    = $_POST['mdp'];

if (is_null($email)) {
    echo _("L'e-mail n'est pas renseigné.");
    die();
} elseif (is_null($mdp)) {
    echo _("Le mot de passe n'est pas renseigné.");
    die();
}

if (bdd_user_verification_connexion($bdd, $email, $mdp)) {
    $_SESSION['email']  = $email;
    $_SESSION['pseudo'] = get_pseudo($bdd, $email);
    $_SESSION['user']   = get_type($bdd, $email);

    header('Location: ../vue/index_connecte.php');
}
else {
    header('Location: ../vue/index_non_connecte.php');
}