<?php
session_start();

require_once '../gettext.inc.php';
require_once '../utils.inc.php';

start_page(_("Connexion"));

initialiser_gettext($_SESSION['lang']);
?>

<form action="../controleur/user_changer_infos.php" method="post">
    <p><?php echo _("Veuillez saisir les informations que vous souhaitez modifier.") ?></p>

    <label name="pseudo"><?php echo _("Pseudo : ") ?>
        <input type="text" name="pseudo"/></label><br/><br/>

    <label name="ancien_mdp"><?php echo _("Ancien mot de passe : ") ?>
        <input type="password" name="ancien_mdp"/></label><br/>

    <label name="nouveau_mdp"><?php echo _("Nouveau mot de passe : ") ?>
        <input type="password" name="nouveau_mdp"/></label><br/><br/>

    <input type="submit" value="<?php _("Envoyer") ?>"/>
</form>