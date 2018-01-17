<?php
session_start();

require_once '../../gettext.inc.php';
require_once '../../utils.inc.php';

start_page(_("Inscription"));

initialiser_gettext($_SESSION['lang']);
?>

<form action="../../controleur/traduction/user_recherche_traduction.php" method="post">
    <!--<label name="selection_langue"><?php echo _("Sélectionnez la langue") ?>
        <select>
            <option value="Français"><?php echo _("Français") ?></option>
            <option value="Anglais"><?php echo _("Anglais") ?></option>
        </select>
    </label><br/><br/>-->

    <label name="traduction"><?php echo _("Mot à traduire ") ?>
            <input type="text" name="mot_a_traduire"/></label><br/><br/>

    <input type="submit" value="<?php echo _("Traduire") ?>"/>
</form><br/>

<form action="../../controleur/index.php">
    <input type="submit" value="<?php echo _("Accueil") ?>"/>
</form>

<?php
end_page();