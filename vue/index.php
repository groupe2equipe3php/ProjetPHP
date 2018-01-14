<?php
session_start();
require_once '../utils.inc.php';

start_page('Traducteur Groupe 2 Équipe 3 IUT');
?>
<style>
    .bloc {
        font-family:"Century Gothic", Avenir, Futura, sans-serif;
        background-color:#dfe3ee;
        font-size:0.9em;
        border-radius:2em;

        padding-top:0.5em;
        padding-left:2em;
        padding-right:2em;
        padding-bottom:0.5em;
        margin-right:60%;
    }
</style>

<?php
echo 'Test de gettext /!\ (ignorer)<br/>';

$language = 'en';
putenv("LANG=$language");
setlocale(LC_ALL, $language);

// Set the text domain as 'messages'
$domain = 'messages';
bindtextdomain($domain, "/www/locale");
textdomain($domain);

gettext("Voici une chaine a traduire");

echo '<br/>';


// Message de bienvenue
if(is_null($_SESSION['pseudo'])) {
    // L'utilisateur n'est pas connecté
?>
    <div class="bloc">
    <p>Bienvenue sur le site de traduction ! Vous pouvez vous inscrire ou vous connecter.</p>
    <form action="inscription.php" method="post">
        <input type="submit" name="user_inscription" value="S'inscrire"/><br/><br/>
    </form>
    <form action="connexion.php" method="post">
        <input type="submit" name="user_connexion" value="Se connecter"/><br/><br/>
    </form>
    <form action="recuperation_mdp.php" method="post">
        <input type="submit" name="recuperation_mdp" value="Mot de passe oublié"/>
    </form>
    </div><br/>

<?php
}
else {
    // L'utilisateur est connecté
?>
    <div class="bloc">
    <p>Bienvenue <strong>
            <?= $_SESSION['pseudo'] ?>
    </strong> ! Vous êtes connecté avec l'adresse <strong>
            <?= $_SESSION['email'] ?>
    </strong></p>
    <form action="../controleur/user_deconnexion.php" method="post">
        <input type="submit" name="user_deconnexion" value="Se déconnecter"/>
    </form>
    </div><br/>

<?php
}
?>
    <div class="bloc">
    <p>Voici le site web de traduction de l'équipe 3 du groupe 2 pour le projet PHP du semestre 3, IUT AMU site Aix.</p>
    <p>Ce groupe est composé de : </p>
    <ul>
        <li>Raphael Charpy</li>
        <li>Yoan Giovacchini</li>
        <li>Olivier Goasampis</li>
        <li>Lucas Jordan</li>
    </ul>
    </div><br/>

    <div class="bloc">
    <form action="../controleur/traduction.php" method="post">
        <label name="recherche_traduction">Saisir
            <textarea name="recherche_traduction"></textarea>
        </label>
        <input type="submit" value="Traduire"/><br/><br/>
    </form>

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
    </div><br/>

<?php
end_page();
?>