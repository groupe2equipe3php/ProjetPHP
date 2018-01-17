<?php
session_start();
require_once '../gettext.inc.php';
require_once '../utils.inc.php';

initialiser_gettext($_SESSION['lang']);
start_page(_("Inscription"));
?>
<?php echo _("Ce mot n'est pas traduit, voulez vous le traduire ?") ?><br/><br/>
    <form action="../controleur/user_traduction.php" method="post">
            <label name="traduction"><?php echo _("Traduction ") ?>
                <input type="text" name="mot_a_traduire"/></label><br/><br/>
            <input type="submit" value="<?php echo _("Traduire") ?>"/>
    </form><br/>

    <form action="../vue/index.php">
        <input type="submit" value="<?php echo _("Accueil") ?>"/>
    </form>
<?php
end_page();
?>