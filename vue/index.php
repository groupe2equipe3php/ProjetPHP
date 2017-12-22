<?php
session_start();
require_once '../utils.inc.php';

start_page('Traducteur Groupe 2 Équipe 3 IUT');

// Affichage de la langue du site actuelle
if(is_null($_SESSION['langue']) or $_SESSION['langue'] = "francais") {
    $_SESSION['langue'] = "francais";
    echo 'Français<br/><br/>';
}
elseif ($_SESSION['langue'] == "anglais") {
    echo 'Anglais<br/><br/>';
}

// Message de bienvenue
if(is_null($_SESSION['pseudo'])) {
    // L'utilisateur n'est pas connecté
    echo 'Bienvenue sur le site de traduction ! Vous pouvez vous inscrire ou vous connecter.<br/><br/>';
?>
    <form action="inscription.php" method="post">
        <input type="submit" name="inscription" value="S'inscrire"/><br/><br/>
    </form>
    <form action="connexion.php" method="post">
        <input type="submit" name="user_connexion" value="Se connecter"/><br/><br/>
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
        <input type="submit" name="user_deconnexion" value="Se déconnecter"/><br/><br/>
    </form>

<?php
}
?>
    <!-- Sélection de la langue de saisie -->
    <label for="selection_langue">Sélectionnez la langue du site</label>
    <select name="selection_langue" id="selection_langue">
        <?php
        if($_SESSION['langue'] == "francais") {
            echo '<option value="Français" selected="selected">Français</option>
                  <option value="Anglais">Anglais</option>';
            }
            elseif($_SESSION['langue'] == "anglais") {
            echo '<option value="Français">Français</option>
                  <option value="Anglais" selected="selected">Anglais</option>';
            }
        ?>
    </select>

<?php
end_page();
?>