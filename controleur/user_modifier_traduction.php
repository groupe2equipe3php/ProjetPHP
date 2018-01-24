<?php
session_start();

require_once '../gettext.inc.php';
require_once '../modele/bdd_connexion.php';
require_once '../modele/bdd_insertion.php';
require_once '../modele/bdd_verification.php';

initialiser_gettext($_SESSION['lang']);

$bdd = bdd_connexion();

$mot        = $_POST['mot'];
$traduction = $_POST['traduction'];

if(bdd_verification_modification_traduction($bdd, $mot)) {
    if(bdd_traduction_insertion($bdd, $mot, $traduction)) {
        echo _("Traduction modifiée.") . '<br/>';
    }
    else {
        echo _("Erreur pendant la modification de la traduction.") . '<br/>';
    }
}
else {
    echo _("Cette traduction n'est pas enregistrée dans la base de données.") . '<br/>';
}

?>
<form action="../controleur/index.php">
    <br/><input type="submit" value="<?php echo _("Accueil") ?>"/>
</form>