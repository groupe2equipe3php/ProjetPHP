<?php
session_start();
session_destroy();

echo 'Vous êtes déconnecté.<br/><br/>';
?>
    <form action="../vue/index.php">
        <input type="submit" value="Accueil"/><br/>
    </form>