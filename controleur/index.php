<?php
session_start();

require_once '../gettext.inc.php';
require_once '../utils.inc.php';

require_once '../controleur/Utilisateur/Utilisateur.php';
require_once '../controleur/Utilisateur/UtilisateurStandard.php';
require_once '../controleur/Utilisateur/UtilisateurPremium.php';
require_once '../controleur/Utilisateur/UtilisateurTraducteur.php';
require_once '../controleur/Utilisateur/UtilisateurAdministrateur.php';

if(! isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'fr_FR';
}

if(isset($_POST['selection_langue'])) {
    if($_POST['selection_langue'] == 'francais') {
        $_SESSION['lang'] = 'fr_FR';
    }
    else {
        $_SESSION['lang'] = 'en_US';
    }
}

if(is_null($_SESSION['pseudo'])) { // L'utilisateur n'est pas connecté
    header('Location: ../vue/index_non_connecte.php');
}
else { // L'utilisateur est connecté
    header('Location: ../vue/index_connecte.php');
}