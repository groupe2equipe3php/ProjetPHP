<?php
session_start();

require_once '../gettext.inc.php';
require_once '../utils.inc.php';

initialiser_gettext($_SESSION['lang']);

start_page(_("Proposition de traduction"));
$title = "Proposition de traduction";

echo _("$title") . '<br/><br/>';

$_SESSION['mot'] = $_POST['mot']; // Envoyé par le champ <input type="hidden"/> de get_demandes_traduction()

echo _("Traduction du mot") . ' ' ?><strong><?php echo $_SESSION['mot'] ?></strong><?php
echo ' écrit en ' . $_POST['langue'] . '.<br/><br/>';

?>
<form action="../controleur/traduction/user_enregistrer_traduction.php" method="post">
    <label name="traduction"><?php echo _("Saisissez la traduction") ?>
        <input type="text" name="traduction"/></label>

    <input type="submit" value="<?php echo _("Envoyer") ?>"/>
</form>

<?php
end_page();