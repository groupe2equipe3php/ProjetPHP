<?php
session_start();

require_once '../gettext.inc.php';
require_once '../utils.inc.php';

initialiser_gettext($_SESSION['lang']);

start_page(_("Changement des informations"));

echo _("Changement des informations") . '<br/><br/>';
?>


<form action="../controleur/user_changer_infos.php" method="post">
    <p><?php echo _("Veuillez saisir les informations que vous souhaitez modifier.") ?></p>

    <label name="pseudo"><?php echo _("Pseudo : ") ?>
        <input type="text" name="pseudo"/></label><br/><br/>

    <label name="ancien_mdp"><?php echo _("Ancien mot de passe : ") ?>
        <input type="password" name="ancien_mdp"/></label><br/>

    <label name="nouveau_mdp"><?php echo _("Nouveau mot de passe : ") ?>
        <input type="password" name="nouveau_mdp"/></label><br/><br/>

    <input type="submit" value="<?php echo _("Envoyer") ?>"/>
</form>