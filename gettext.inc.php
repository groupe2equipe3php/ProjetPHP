<?php
session_start();

function initialiser_gettext()
{
    if (!isset($_SESSION['lang'])) {
        $_SESSION['lang'] = 'fr_FR';
    }

    // Initialisation de gettext
    putenv('LANG=' . $_SESSION['lang']);
    setlocale(LC_ALL, $_SESSION['lang']);

    $domain = 'messages';
    bindtextdomain($domain, 'locale');
    textdomain($domain);
}
?>