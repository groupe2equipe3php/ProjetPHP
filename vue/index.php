<?php
session_start();
require_once '../utils.inc.php';

start_page('Traducteur Groupe 2 Équipe 3 IUT');

// Message de bienvenue
if(is_null($_SESSION['pseudo'])) {
    // L'utilisateur n'est pas connecté
    echo 'Bienvenue sur le site de traduction ! Vous pouvez vous inscrire ou vous connecter.<br/><br/>';
?>
    <form action="inscription.php" method="post">
        <input type="submit" name="inscription" value="S'inscrire"/><br/><br/>
    </form>
    <form action="connexion.php" method="post">
        <input type="submit" name="user_connexion" value="Se connecter"/><br/>
    </form>
<?php
}
else {
    // L'utilisateur est connecté
    echo 'Bienvenue <strong>' . $_SESSION['pseudo']
        . '</strong> ! Vous êtes connecté avec l\'adresse <strong>' . $_SESSION['email']
        . '</strong><br/><br/>';
?>
    <form action="../controleur/user_deconnexion.php" method="post">
        <input type="submit" name="user_deconnexion" value="Se déconnecter"/><br/>
    </form>
<?php
}
?>
    <!-- Sélection de la langue de saisie -->
    <br/><label name="langue" > Sélectionnez la langue de saisie.
        <select id="selection_langue">
            <option value="Français" selected="selected">Français</option>
            <option value="Anglais">Anglais</option>
        </select>
    </label>

    <!-- Javascript : modification de la variable de session en fonction de la langue -->
    <script>
        var e = document.getElementById("selection_langue");
        var langue = e.options[e.selectedIndex].value;
        if(langue === "Français") {
            <?php
                $_SESSION['langue'] = "francais";
            ?>
        }
        else if(langue === "Anglais") {
            <?php
                $_SESSION['langue'] = "anglais";
            ?>
        }
    </script>
<?php

end_page();
?>