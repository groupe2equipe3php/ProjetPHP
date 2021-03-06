<?php
session_start();

require_once '../../gettext.inc.php';

require_once '../../modele/bdd_connexion.php';
require_once '../../modele/bdd_insertion.php';

initialiser_gettext($_SESSION['lang']);

function valider_inscription($email) {
    $cle = rand(0, 100000);

    $bdd = bdd_connexion();
    bdd_set_cle($bdd, $cle, $email);

    $sujet   = _("Activer votre compte");
    $entete  = _("From: inscription@projetphp.com");
    $message = 'Bienvenue sur le site de traduction de l\'équipe 3 du groupe 2.

Pour activer votre compte, veuillez cliquer sur le lien ci-dessous.

http://groupe2equipe3php.alwaysdata.net/controleur/inscription/activation_inscription.php?email='
        . urlencode($email)
        . '&cle=' . urlencode($cle) .'

Ceci est un mail automatique, merci de ne pas y répondre.';

    if(mail($email, $sujet, $message, $entete)) {
        return true;
    }
    return false;
}
?>