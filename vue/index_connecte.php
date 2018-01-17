<?php
session_start();

require_once '../gettext.inc.php';
require_once '../utils.inc.php';

// _() est un alias de gettext()
start_page(_("Traducteur Groupe 2 Équipe 3 IUT"));

initialiser_gettext($_SESSION['lang']);
?>

<div class="bloc">
    <p><?php echo _("Bienvenue") ?><strong> <?= $_SESSION['pseudo'] ?></strong> !
        <?php echo _("Vous êtes connecté avec l'adresse") ?> <strong><?= $_SESSION['email'] ?></strong>.<br/>
        <?php echo _("Vous êtes un utilisateur ") ?><strong>
            <?php
            $type = $_SESSION['user'];
            switch ($type) {
                case 's':
                    echo _("standard");
                    break;
                case 'p':
                    echo _("premium");
                    break;
                case 't':
                    echo _("traducteur");
                    break;
                case 'a':
                    echo _("administrateur");
                    break;
                default:
                    echo _("erreur");
            }
            ?>
        </strong>.</p>

    <form action="../controleur/user_deconnexion.php" method="post">
        <input type="submit" name="user_deconnexion" value="<?php echo _("Se déconnecter") ?>"/>
    </form>
</div>

<div class="bloc_configuration">
    <form action="changer_infos.php" method="post">
        <p><?php echo _("Configuration du compte") ?></p>
        <input type="submit" name="changer_infos" value="<?php echo _("Modifier les informations") ?>"/>
    </form>
</div>

<div class="bloc_configuration">
    <form action="traduction/affichage_demandes_traduction.php" method="post">
        <p><?php echo _("Traduction") ?></p>
        <input type="submit" name="traduire_demandes" value="<?php echo _("Traduire les demandes") ?>"/>
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

    <form action="traduction/recherche_traduction.php" method="post">
        <input type="submit" value="<?php echo _("Je veux traduire !") ?>"/>
    </form>
</div>

<!-- Sélection de la langue -->
<div class="bloc">
    <form action="../controleur/index.php" method="post">
        <p><?php echo _("Sélectionnez la langue du site ") ?></p>

        <input type="radio" name="selection_langue" value="francais" id="selection_langue_francais" />
        <label for="selection_langue_francais"><?php echo _("Français") ?></label>

        <input type="radio" name="selection_langue" value="anglais" id="selection_langue_anglais" />
        <label for="selection_langue_anglais"><?php echo _("Anglais") ?></label><br/><br/>

        <input type="submit" value="<?php echo _("Recharger") ?>"/>
    </form>
</div>

<?php
end_page();