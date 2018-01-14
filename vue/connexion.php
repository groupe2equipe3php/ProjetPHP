<?php
require_once '../utils.inc.php';
require_once '../gettext.inc.php';
start_page(_("Connexion"));
?>

    <form action="../controleur/user_connexion.php" method="post">
        <label name="email">E-mail : <input type="text" name="email"/></label><br/><br/>
        <label name="mdp"><?php echo _("Mot de passe : ") ?><input type="password" name="mdp"/></label><br/><br/>
        <input type="submit"/>
    </form>

<?php
end_page();
?>