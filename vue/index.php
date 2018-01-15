<?php
session_start();
require_once '../utils.inc.php';
require_once '../controleur/Utilisateur/Utilisateur.php';
require_once '../controleur/Utilisateur/UtilisateurStandard.php';
require_once '../controleur/Utilisateur/UtilisateurPremium.php';
require_once '../controleur/Utilisateur/UtilisateurTraducteur.php';
require_once '../controleur/Utilisateur/UtilisateurAdministrateur.php';

start_page('Traducteur Groupe 2 Équipe 3 IUT');
?>
<style>
    .bloc {
        font-family:"Century Gothic", Avenir, Futura, sans-serif;
        background-color:#dfe3ee;
        font-size:0.9em;
        border-radius:2em;

        padding: 0.5em 2em;
        margin-right:60%;
    }
</style>

<?php
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
    </strong>.<br/>Vous êtes un utilisateur <strong><?php
        if(unserialize($_SESSION['user']) instanceof UtilisateurStandard) {
            echo 'standard';
        }
        elseif(unserialize($_SESSION['user']) instanceof UtilisateurPremium) {
            echo 'premium';
        }
        elseif(unserialize($_SESSION['user']) instanceof UtilisateurTraducteur) {
            echo 'traducteur';
        }
        elseif(unserialize($_SESSION['user']) instanceof UtilisateurAdministrateur) {
            echo 'administrateur';
        }
        else {
            echo 'erreur';
        }
    ?></strong>.</p>

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
    <p>Pour rechercher une traduction :</p>
    <form action="traduction.php" method="post">
        <input type="submit" value="Je veux traduire !"/>
    </form>
    </div><br/>

    <!-- Sélection de la langue de saisie -->
    <div class="bloc">
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
    </div>

<?php
end_page();
?>