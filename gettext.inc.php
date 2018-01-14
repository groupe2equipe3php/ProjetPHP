<?php
session_start();

// Initialisation de gettext
putenv("LANG=" . $_SESSION['lang']);
setlocale(LC_ALL, $_SESSION['lang']);

$domain = "messages";
bindtextdomain($domain, "locale");
textdomain($domain);
?>