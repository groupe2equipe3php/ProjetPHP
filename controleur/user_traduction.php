<?php
session_start();
require_once '../gettext.inc.php';
require_once '../utils.inc.php';
require_once '../bdd_connexion.php';

$bdd = bdd_connexion();

if (is_null($bdd)) {
    echo _("Vous n'êtes pas connecté veulliez vous connecter pour pouvoir traduire");
}
end_page();
?>