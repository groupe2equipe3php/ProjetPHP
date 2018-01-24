<?php
session_start();

require_once '../gettext.inc.php';
require_once '../utils.inc.php';

start_page(_("Inscription"));
$title = "Inscription";
initialiser_gettext($_SESSION['lang']);

echo _("$title") . '<br/><br/>';
?>

<form action="../controleur/inscription/user_inscription.php" method="post">
    <label name="nom"><?php echo _("Nom : ") ?><input type="text" name="nom"/></label><br/><br/>
    <label name="prenom"><?php echo _("Prenom : ") ?><input type="text" name="prenom"/></label><br/><br/>
    <label name="pseudo"><?php echo _("Pseudo : ") ?><input type="text" name="pseudo"/></label><br/><br/>
    <label name="email">E-mail : <input type="text" name="email"/></label><br/><br/>
    <label name="mdp"><?php echo _("Mot de passe : ") ?><input type="password" name="mdp"/></label><br/><br/>
    <input type="submit" value="<?php echo _("Valider") ?>"/>
</form>
    <form action="../../vue/index_non_connecte.php">
        <br/><input type="submit" value="<?php echo _("Accueil") ?>"/>
    </form>

<?php
end_page();
?>