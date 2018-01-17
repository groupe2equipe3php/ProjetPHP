<?php
session_start();

require_once '../gettext.inc.php';
require_once '../modele/bdd_connexion.php';
require_once '../modele/bdd_insertion.php';
require_once '../modele/bdd_verification.php';

initialiser_gettext($_SESSION['lang']);

$bdd = bdd_connexion();

if($_POST['pseudo'] != "") {
    $nouveau_pseudo = $_POST['pseudo'];

    if(bdd_set_pseudo($bdd, $nouveau_pseudo, $_SESSION['email'])) {
        echo _("Le pseudo a été modifié.") . '<br/>';
        $_SESSION['pseudo'] = $nouveau_pseudo;
    }
    else {
        echo _("Une erreur est survenue pendant la modification du pseudo. Veuillez réessayer plus tard.") . '<br/>';
    }
}

if($_POST['ancien_mdp'] != "" and $_POST['nouveau_mdp'] != "") {
    $ancien_mdp  = $_POST['ancien_mdp'];
    $nouveau_mdp = $_POST['nouveau_mdp'];

    if(bdd_user_verification_connexion($bdd, $_SESSION['email'], $ancien_mdp)) {
        if(bdd_set_mdp($bdd, $nouveau_mdp, $_SESSION['email'])) {
            echo _("Le mot de passe a été modifié.") . '<br/>';
        }
        else {
            echo _("Une erreur est survenue pendant la modification du mot de passe. Veuillez réessayer plus tard.") . '<br/>';
        }
    }
    else {
        echo _("Le mot de passe renseigné n'est pas le bon.") . '<br/>';
    }
}
?>

<form action="index.php"><br/>
    <input type="submit" name="index" value="<?php echo _("Accueil") ?>"/>
</form>