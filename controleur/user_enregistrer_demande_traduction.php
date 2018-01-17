<?php
session_start();
require_once '../modele/bdd_connexion.php';
require_once '../modele/bdd_insertion.php';

$bdd = bdd_connexion();

$mot    = $_SESSION['mot_a_traduire'];
$langue = 'Français';

if(bdd_demande_traduction_insertion($bdd, $_SESSION['email'], $mot, $langue)) {
    echo _("Demande de traduction enregistrée") . '<br/><br/>';
}
else {
    echo _("Une erreur est survenue pendant l'enregistrement de la demande. Veuillez réessayer.") . '<br/>';
}
?>

    <form action="../vue/index.php">
        <input type="submit" value="<?php echo _("Accueil") ?>"/>
    </form>