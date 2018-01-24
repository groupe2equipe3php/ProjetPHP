<?php
session_start();

require_once '../../gettext.inc.php';
require_once '../../utils.inc.php';

start_page(_("Recherche d'une traduction"));
$title = "Recherche d'une traduction";

initialiser_gettext($_SESSION['lang']);

echo _("$title") . '<br/><br/>';
if (empty($_SESSION['user'])) {
    echo _("Vous devez être connecté pour pouvoir demander une traduction");?>
    <br/><br/><form action="../../vue/connexion.php">
    <input type="submit" value="<?php echo _("Connexion") ?>"/>
    </form><br/>
    <form action="../../controleur/index.php">
        <input type="submit" value="<?php echo _("Accueil") ?>"/>
    </form><?php
}
else {
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
}
end_page();