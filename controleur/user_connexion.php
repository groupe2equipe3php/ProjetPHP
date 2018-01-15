<?php
session_start();
require_once '../modele/bdd_connexion.php';
require_once '../modele/bdd_verification.php';
require_once '../modele/bdd_recherche.php';
require_once 'Utilisateur/Utilisateur.php';
require_once 'Utilisateur/UtilisateurStandard.php';
require_once 'Utilisateur/UtilisateurPremium.php';
require_once 'Utilisateur/UtilisateurTraducteur.php';
require_once 'Utilisateur/UtilisateurAdministrateur.php';

$bdd = bdd_connexion();

$email  = $_POST['email'];
$mdp    = $_POST['mdp'];
//echo 'Identifiants récupérés.<br/>';

if (is_null($email)) {
    echo 'L\'e-mail n\'est pas renseigné.';
    die();
} elseif (is_null($mdp)) {
    echo 'Le mot de passe n\'est pas renseigné.';
    die();
}

if(bdd_user_verification_connexion($bdd, $email, $mdp)) {
    echo 'Connecté<br/>';
    $_SESSION['email']  = $email;
    $_SESSION['pseudo'] = get_pseudo($bdd, $email);
    $_SESSION['user']   = null;

    $type = get_type($bdd, $email);
    echo $type . '<br/>';

    switch($type) {
        case 's':
            $_SESSION['user'] = serialize(new UtilisateurStandard());
            break;
        case 'p':
            $_SESSION['user'] = serialize(new UtilisateurPremium());
            break;
        case 't':
            $_SESSION['user'] = serialize(new UtilisateurTraducteur());
            break;
        case 'a':
            $_SESSION['user'] = serialize(new UtilisateurAdministrateur());
            break;
    }
}
/*else {
    //echo 'Pas connecté.<br/>';
}*/
?>
    <form action="../vue/index.php">
        <br/><input type="submit" value="Accueil"/><br/>
    </form>