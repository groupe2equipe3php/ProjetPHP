<?php
session_start();
require_once '../gettext.inc.php';
require_once '../utils.inc.php';
require_once '../modele/bdd_recherche.php';

$mots = array();
$mot = $_POST['mot_a_traduire'];
$bdd = bdd_connexion();
echo _("Voici la liste des demandes de traduction");
$mots = afficher_traduction_requests($bdd, $mot);
initialiser_gettext($_SESSION['lang']);
start_page(_("Inscription"));
echo _("Voici la liste des demandes de traduction");
?>
    <form action="../vue/index.php">
        <input type="submit" value="<?php echo _("Accueil") ?>"/>
    </form>
<?php
end_page();
?>