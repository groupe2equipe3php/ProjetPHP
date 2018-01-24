<?php
session_start();

require_once '../gettext.inc.php';
require_once '../utils.inc.php';

start_page(_("Modification utilisateur"));

initialiser_gettext($_SESSION['lang']);

echo _("Saisir un e-mail avec un nouveau type d'utilisateur.") . '<br/><br/>';

?>
<form action="../controleur/user_modifier_utilisateur.php" method="post">
    <label name="mot"><?php echo _("Mot à modifier") ?>
        <input type="text" name="mot"/></label><br/>

    <label name="traduction"><?php echo _("Nouvelle traduction") ?>
        <input type="text" name="traduction"/></label><br/><br/>

    <input type="submit" value="<?php echo _("Envoyer") ?>"/>
</form>

<form action="../../controleur/index.php">
    <br/><input type="submit" value="<?php echo _("Accueil") ?>"/>
</form>