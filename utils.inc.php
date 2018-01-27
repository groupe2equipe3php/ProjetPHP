<?php
session_start();

function start_page($title)
{
    echo '<!DOCTYPE html>'
        . '<html lang="fr_FR">'
        . '<head><meta charset="UTF-8"/>'
        . '<meta name="description" content="Site de traduction de l\'équipe 3 du groupe 2, IUT AMU Informatique site Aix">'
        . '<meta name="keywords" content="Traduction, IUT, AMU, Projet PHP">'
        . '<link rel="stylesheet" type="text/css" href="style.css">'
        . '<title>' . PHP_EOL . $title . '</title>'
        . '</head><body>'
        . '<div class="bloc"><nav><ul><a href="/controleur/index.php">Accueil</a> ';

    if (empty($_SESSION['user'])) {
        echo '<a href="/vue/connexion.php">' . _("Connexion") . '</a> ';
    }
    else {
        echo '<a href="/controleur/user_deconnexion.php">' . _("Deconnexion") . '</a> ';
    }

    echo '<a href="/vue/recherche_traduction.php">' . _("Traduction") . '</a>';

    // Sélection de la langue
    echo '<form action="/controleur/index.php" method="post">';
    echo '<p>' . _("Sélectionner la langue du site :") . '</p>';
    echo '<input type="radio" name="selection_langue" value="francais" id="selection_langue_francais" />
          <label for="selection_langue_francais">' . _("Français") . '</label>

          <input type="radio" name="selection_langue" value="anglais" id="selection_langue_anglais" />
          <label for="selection_langue_anglais">' . _("Anglais") . '</label><br/><br/>

          <input type="submit" value="' . _("Recharger") . '"/></form></ul></nav></div>';
};

function end_page()
{
    echo '</body></html>';
};