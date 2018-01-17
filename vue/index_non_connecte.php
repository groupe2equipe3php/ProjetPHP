<?php
session_start();

require_once '../gettext.inc.php';
require_once '../utils.inc.php';

initialiser_gettext($_SESSION['lang']);

// _() est un alias de gettext()
start_page(_("Traducteur Groupe 2 Équipe 3 IUT"));
?>

<div class="bloc">
    <p><?php echo _("Bienvenue sur le site de traduction ! Vous pouvez vous inscrire ou vous connecter.") ?></p>

    <form action="../vue/inscription.php" method="post">
        <input type="submit" name="user_inscription" value="<?php echo _("S'inscrire") ?>"/><br/><br/>
    </form>

    <form action="../vue/connexion.php" method="post">
        <input type="submit" name="user_connexion" value="<?php echo _("Se connecter") ?>"/><br/><br/>
    </form>

    <form action="../vue/recuperation_mdp.php" method="post">
        <input type="submit" name="recuperation_mdp" value="<?php echo _("Mot de passe oublié") ?>"/>
    </form>
</div>

<div class="bloc">
    <p> <?php echo _("Voici le site web de traduction de l'équipe 3 du groupe 2 pour le projet PHP du semestre 3, IUT AMU site Aix.") ?></p>
    <p> <?php echo _("Ce groupe est composé de :") ?></p>

    <ul>
        <li>Raphael Charpy</li>
        <li>Yoan Giovacchini</li>
        <li>Olivier Goasampis</li>
        <li>Lucas Jordan</li>
    </ul>
</div>

<div class="bloc">
    <p><?php echo _("Pour rechercher une traduction :") ?></p>

    <form action="../vue/traduction/recherche_traduction.php" method="post">
        <input type="submit" value="<?php echo _("Je veux traduire !") ?>"/>
    </form>
</div>

<!-- Sélection de la langue de saisie -->
<div class="bloc">
    <form action="index_non_connecte.php" method="post">
        <p><?php echo _("Sélectionnez la langue du site ") ?></p>

        <input type="radio" name="selection_langue" value="francais" id="selection_langue_francais" />
        <label for="selection_langue_francais"><?php echo _("Français") ?></label>

        <input type="radio" name="selection_langue" value="anglais" id="selection_langue_anglais" />
        <label for="selection_langue_anglais"><?php echo _("Anglais") ?></label><br/><br/>

        <input type="submit" value="<?php echo _("Recharger") ?>" onclick="recharger();"/>
    </form>
</div>