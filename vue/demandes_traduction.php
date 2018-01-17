<?php
session_start();
require_once '../gettext.inc.php';
require_once '../utils.inc.php';
require_once '../modele/bdd_recherche.php';
require_once '../modele/bdd_connexion.php';


start_page(_("Demandes de traduction"));

$bdd = bdd_connexion();
initialiser_gettext($_SESSION['lang']);

echo _("Voici la liste des demandes de traduction") . '<br/>';
afficher_traduction_requests($bdd);
?>
    <form action="../vue/index.php">
        <input type="submit" value="<?php echo _("Accueil") ?>"/>
    </form>
<?php
end_page();
?>