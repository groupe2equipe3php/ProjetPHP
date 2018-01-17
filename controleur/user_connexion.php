<?php
session_start();
require_once '../gettext.inc.php';
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

if (is_null($email)) {
    echo _("L'e-mail n'est pas renseigné.");
    die();
} elseif (is_null($mdp)) {
    echo _("Le mot de passe n'est pas renseigné.");
    die();
}

if(bdd_user_verification_connexion($bdd, $email, $mdp)) {
    echo _("Connecté") . '<br/>';
    $_SESSION['email']  = $email;
    $_SESSION['pseudo'] = get_pseudo($bdd, $email);
    // TODO
    $_SESSION['user']   = get_type($bdd, $email);
}
else {
    echo _("Pas connecté.") . '<br/>';
}
?>
    <form action="index.php">
        <br/><input type="submit" value="<?php echo _("Accueil") ?>"/><br/>
    </form>