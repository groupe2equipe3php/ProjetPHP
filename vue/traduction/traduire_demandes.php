<?php
session_start();

require_once '../../gettext.inc.php';
require_once '../../utils.inc.php';

start_page(_("Proposition de traduction"));

initialiser_gettext($_SESSION['lang']);

$_SESSION['mot'] = $_GET['mot']; // Envoyé par le champ <input type="hidden"/> de get_demandes_traduction()

echo _("Traduction du mot") . ' ' . $_SESSION['mot'] . ' écrit en ' . $_GET['langue'] . '.<br/>';

?>
<form action="../../controleur/traduction/user_enregistrer_traduction.php">
    <label name="traduction"><?php echo _("Saisissez la traduction") ?>
        <input type="text" name="traduction"/>
    </label>

    <input type="submit" value="<?php echo _("Accueil") ?>"/>
</form>

<?php
end_page();