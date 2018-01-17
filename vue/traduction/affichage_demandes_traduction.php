<?php
session_start();

require_once '../../gettext.inc.php';
require_once '../../utils.inc.php';

require_once '../../modele/bdd_recherche.php';
require_once '../../modele/bdd_connexion.php';

start_page(_("Demandes de traduction"));

initialiser_gettext($_SESSION['lang']);

$bdd = bdd_connexion();

echo _("Voici la liste des demandes de traduction") . '<br/><br/>';

get_demandes_traduction($bdd);
?>

<form action="../../controleur/index.php">
    <input type="submit" value="<?php echo _("Accueil") ?>"/>
</form>

<?php
end_page();