<?php
session_start();
require_once '../gettext.inc.php';
require_once '../utils.inc.php';

initialiser_gettext();
// _() est un alias de gettext()
start_page(_("Traducteur Groupe 2 Équipe 3 IUT"));
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

<script>
    function lang_francais() {
        <?php $_SESSION['lang'] = 'fr_FR'; ?>
    }
    function lang_anglais() {
        <?php $_SESSION['lang'] = 'en_US'; ?>
    }
    function recharger() {
        location.reload(true);
        window.open('', "<?php echo $_SESSION['lang'] ?>", '');
    }
</script>

<?php
echo $_SESSION['lang'] . '<br/><br/>';

// Message de bienvenue
if(is_null($_SESSION['pseudo'])) {
    // L'utilisateur n'est pas connecté
?>
    <div class="bloc">
    <p><?php echo _("Bienvenue sur le site de traduction ! Vous pouvez vous inscrire ou vous connecter.") ?></p>
    <form action="inscription.php" method="post">
        <input type="submit" name="user_inscription" value="<?php echo _("S'inscrire") ?>"/><br/><br/>
    </form>
    <form action="connexion.php" method="post">
        <input type="submit" name="user_connexion" value="<?php echo _("Se connecter") ?>"/><br/><br/>
    </form>
    <form action="recuperation_mdp.php" method="post">
        <input type="submit" name="recuperation_mdp" value="<?php echo _("Mot de passe oublié") ?>"/>
    </form>
    </div><br/>

<?php
}
else {
    // L'utilisateur est connecté
?>
    <div class="bloc">
    <p> <?php echo _("Bienvenue ") ?> <strong>
            <?= $_SESSION['pseudo'] ?>
    </strong> ! <?php echo _("Vous êtes connecté avec l'adresse ") ?> <strong>
            <?= $_SESSION['email'] ?>
    </strong></p>
    <form action="../controleur/user_deconnexion.php" method="post">
        <input type="submit" name="user_deconnexion" value="<?php echo _("Se déconnecter") ?>"/>
    </form>
    </div><br/>

<?php
}
?>
    <div class="bloc">
    <p> <?php echo _("Voici le site web de traduction de l'équipe 3 du groupe 2 pour le projet PHP du semestre 3, IUT AMU site Aix.") ?></p>
    <p> <?php echo _("Ce groupe est composé de :") ?></p>
    <ul>
        <li>Raphael Charpy</li>
        <li>Yoan Giovacchini</li>
        <li>Olivier Goasampis</li>
        <li>Lucas Jordan</li>
    </ul>
    </div><br/>

    <div class="bloc">
    <form action="../controleur/traduction.php" method="post">
        <label name="recherche_traduction"> <?php echo _("Saisir") ?>
            <textarea name="recherche_traduction"></textarea>
        </label>
        <input type="submit" value="<?php echo _("Traduire") ?>"/><br/><br/>
    </form>

    <!-- Sélection de la langue de saisie -->
    <form action="index.php" method="post">
        <p><?php echo _("Sélectionnez la langue du site ") ?></p>

        <input type="radio" name="selection_langue" id="selection_langue_francais"
               onchange="lang_francais();"
               checked="<?php if($_SESSION['lang'] == 'fr_FR') { echo 'checked'; } ?>"/>
        <label for="selection_langue_francais"><?php echo _("Français") ?></label>

        <input type="radio" name="selection_langue" id="selection_langue_anglais"
               onchange="lang_anglais();"
               checked="<?php if($_SESSION['lang'] == 'en_US') { echo 'checked'; } ?>"/>
        <label for="selection_langue_anglais"><?php echo _("Anglais") ?></label>

        <input type="submit" value="<?php echo _("Recharger") ?>" onclick="recharger();"/>
    </form>
    </div><br/>

<?php
end_page();
?>