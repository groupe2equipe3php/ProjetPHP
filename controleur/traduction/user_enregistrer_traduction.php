<?php
session_start();

require_once '../../gettext.inc.php';
require_once '../../utils.inc.php';

require_once '../../modele/bdd_connexion.php';
require_once '../../modele/bdd_insertion.php';

initialiser_gettext($_SESSION['lang']);

$bdd = bdd_connexion();

$mot        = $_SESSION['mot'];
$traduction = $_POST['traduction'];

if(bdd_traduction_insertion($bdd, $mot, $traduction)) {
    echo _("Traduction enregistrée, merci.") . '<br/>';
}
else {
    echo _("Erreur pendant la traduction. Veuillez réessayer.") . '<br/>';
}

?>

<form action="../../vue/traduction/affichage_demandes_traduction.php"><br/>
    <input type="submit" value="<?php echo _("Accueil") ?>"/>
</form>