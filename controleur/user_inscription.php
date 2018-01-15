<?php
session_start();
require_once '../modele/bdd_connexion.php';
require_once '../modele/bdd_insertion.php';
require_once '../modele/bdd_verification.php';
require_once 'validation_inscription.php';
require_once '../gettext.inc.php';

$bdd = bdd_connexion();

$nom    = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$pseudo = htmlspecialchars($_POST['pseudo']);
$email  = htmlspecialchars($_POST['email']);
$mdp    = htmlspecialchars($_POST['mdp']);

if (is_null($nom)) {
    echo _("Le nom n'est pas renseigné.");
    die();
} elseif (is_null($prenom)) {
    echo _("Le prénom n'est pas renseigné.");
    die();
} elseif (is_null($pseudo)) {
    echo _("Le pseudo n'est pas renseigné.");
    die();
} elseif (is_null($email)) {
    echo _("L'e-mail n'est pas renseigné.");
    die();
} elseif (is_null($mdp)) {
    echo _("Le mot de passe n'est pas renseigné.");
    die();
}

if (bdd_user_verification_inscription($bdd, $email)) {
    if (bdd_user_insertion($bdd, $nom, $prenom, $pseudo, $email, $mdp)) {
        echo _("Utilisateur inscrit.") . '<br/>';

        if (valider_inscription($email)) {
            echo _("E-mail de confirmation envoyé.") . '<br/>';
        } else {
            echo _("L'e-mail de confirmation n'a pas pu être envoyé.") . '<br/>';
        }
    } else {
        echo _("Erreur pendant l'inscription. Veuillez réessayer.") . '<br/>';
    }
}
else {
    echo _("Utilisateur déjà inscrit.") . '<br/>';
}
?>
    <form action="../vue/index.php">
        <br/><input type="submit" value="<?php echo _("Accueil") ?>"/><br/>
    </form>