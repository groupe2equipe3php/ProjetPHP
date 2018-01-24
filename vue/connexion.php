<?php
session_start();

require_once '../gettext.inc.php';
require_once '../utils.inc.php';

start_page(_("Connexion"));

initialiser_gettext($_SESSION['lang']);
?>

<form action="../controleur/user_connexion.php" method="post">
    <label name="email">E-mail :
        <input type="text" name="email"/></label><br/><br/>

    <label name="mdp"><?php echo _("Mot de passe : ") ?>
        <input type="password" name="mdp"/></label><br/><br/>

    <input type="submit" value="<?php echo _("Valider") ?>"/>
</form>
    <form action="../../vue/index_non_connecte.php">
        <br/><input type="submit" value="<?php echo _("Accueil") ?>"/>
    </form>
<?php
end_page();
?>