<?php
session_start();
require_once '../gettext.inc.php';

echo 'TODO<br/>';
?>
    <form action="../vue/index.php">
        <br/><input type="submit" value="<?php echo _("Accueil") ?>"/><br/>
    </form>