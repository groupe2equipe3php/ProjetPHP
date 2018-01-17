<?php
session_start();
require_once '../gettext.inc.php';
require_once '../utils.inc.php';

initialiser_gettext($_SESSION['lang']);
start_page(_("Inscription"));
?>

    <form action="../controleur/inscription/user_inscription.php" method="post">
        <label name="nom"><?php echo _("Nom : ") ?><input type="text" name="nom"/></label><br/><br/>
        <label name="prenom"><?php echo _("Prenom : ") ?><input type="text" name="prenom"/></label><br/><br/>
        <label name="pseudo"><?php echo _("Pseudo : ") ?><input type="text" name="pseudo"/></label><br/><br/>
        <label name="email">E-mail : <input type="text" name="email"/></label><br/><br/>
        <label name="mdp"><?php echo _("Mot de passe : ") ?><input type="password" name="mdp"/></label><br/><br/>
        <input type="submit"/>
    </form>

<?php
end_page();
?>