<?php
function initialiser_gettext($lang)
{
    // Est-ce que l'utilisateur a modifié la langue ?
    if(isset($_POST['selection_langue'])) {
        if($_POST['selection_langue'] == 'francais') {
            $_SESSION['lang'] = 'fr_FR';
        }
        else {
            $_SESSION['lang'] = 'en_US';
        }
    }

    // Initialisation de gettext
    putenv('LANG=' . $lang);
    setlocale(LC_ALL, $lang);

    $domain = 'messages';
    bindtextdomain($domain, '../locale');
    textdomain($domain);
}
?>