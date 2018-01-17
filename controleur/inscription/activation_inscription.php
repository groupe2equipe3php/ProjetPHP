<?php
session_start();

require_once '../../gettext.inc.php';

require_once '../../modele/bdd_connexion.php';
require_once '../../modele/bdd_recherche.php';
require_once '../../modele/bdd_insertion.php';

initialiser_gettext($_SESSION['lang']);

$email = urldecode($_GET['email']);
$cle   = urldecode($_GET['cle']);

$bdd    = bdd_connexion();
$clebdd = get_cle($bdd, $email);
$actif  = get_actif($bdd, $email);

if($actif == '1') {
    echo _("Votre compte est déjà actif !") . '<br/>';
}
else {
    if($cle == $clebdd) {
        bdd_set_actif($bdd, $email);
        echo _("Compte activé.") . '<br/>';
    }
    else {
        echo _("Une erreur est survenue, votre compte n'a pas été activé.") . '<br/>';
    }
}
?>

<form action="../index.php">
    <input type="submit" name="index" value="<?php echo _("Accueil") ?>"/>
</form>