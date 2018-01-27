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
        .'<link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">'
        .'<link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">'
        .'<link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">'
        .'<link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">'
        .'<link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">'
        .'<link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">'
        .'<link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">'
        .'<link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">'
        .'<link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">'
        .'<link rel="icon" type="image/png" sizes="192x192"  href="/favicon/android-icon-192x192.png">'
        .'<link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">'
        .'<link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">'
        .'<link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">'
        .'<link rel="manifest" href="/favicon/manifest.json">'
        .'<meta name="msapplication-TileColor" content="#ffffff">'
        .'<meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">'
        .'<meta name="theme-color" content="#ffffff">'
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