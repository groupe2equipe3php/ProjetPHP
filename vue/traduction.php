<?php
session_start();
require_once '../gettext.inc.php';
require_once '../utils.inc.php';

initialiser_gettext($_SESSION['lang']);
start_page(_("Inscription"));
?>
    <form action="../controleur/user_traduction.php" method="post">
        <?php echo _("Sélectionnez la langue") ?>

        <select>
            <option value="Français"><?php echo _("Français") ?></option>
            <option value="Anglais"><?php echo _("Anglais") ?></option>
        </select>

        <label name="MAT"><?php echo _("Mot à traduire ") ?>
            <input type="text" name="mot_a_traduire"/></label><br/><br/>

        <input type="submit" value="<?php echo _("Traduire") ?>"/>
    </form><br/>

    <form action="../vue/index.php">
        <input type="submit" value="<?php echo _("Accueil") ?>"/>
    </form>
<?php
end_page();
?>