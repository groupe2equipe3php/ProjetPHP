<?php
function initialiser_gettext($lang)
{
    // Initialisation de gettext
    putenv('LANG=' . $lang);
    setlocale(LC_ALL, $lang);

    $domain = 'messages';
    bindtextdomain($domain, '../locale');
    textdomain($domain);
}
?>