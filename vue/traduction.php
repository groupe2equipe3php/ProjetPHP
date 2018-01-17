<?php
session_start();
require_once '../gettext.inc.php';
require_once '../utils.inc.php';

initialiser_gettext($_SESSION['lang']);
start_page(_("Inscription"));
?>
    <form action="../controleur/user_traduction.php" method="post">
        Sélectionnez la langue
        <select>
            <option value="Français">Français</option>
            <option value="Anglais">Anglais</option>
        </select>
        <label name="MAT"><?php echo _("Mot à traduire ") ?><input type="text" name="MAT"/></label><br/><br/>
        <input type="submit" value="Traduire"/>
    </form><br/>
    <form action="../vue/index.php">
        <input type="submit" value="Accueil"/>
    </form>
<?php
end_page();
?>