<?php
session_start();

require_once '../gettext.inc.php';
require_once '../utils.inc.php';

require_once '../modele/bdd_connexion.php';
require_once '../modele/bdd_insertion.php';
require_once '../modele/bdd_verification.php';

start_page(_("Modification utilisateur"));

initialiser_gettext($_SESSION['lang']);

$bdd = bdd_connexion();

$email = $_POST['email'];
$type  = $_POST['type'];

if(bdd_verification_modification_utilisateur($bdd, $email)) {
    if (bdd_set_type($bdd, $email, $type)) {
        echo _("Type de l'utilisateur modifié.") . '<br/>';
    } else {
        echo _("Erreur pendant la modification du type.") . '<br/>';
    }
}
else {
    echo _("Cet utilisateur n'existe pas.") . '<br/>';
}

?>
<form action="../controleur/index.php">
    <br/><input type="submit" value="<?php echo _("Accueil") ?>"/>
</form>
