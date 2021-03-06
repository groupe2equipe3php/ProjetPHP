<?php
session_start();

require_once '/home/groupe2equipe3php/www/gettext.inc.php';

initialiser_gettext($_SESSION['lang']);

function bdd_user_verification_inscription(PDO $bdd, $email) {
    try {
        $request = $bdd->prepare('SELECT * FROM user WHERE email = :email');
        $request->execute(array('email' => $email));

        if($request->rowCount() == 0) {
            return true;
        }
    }
    catch (PDOException $exception) {
        $exception->getMessage();
    }
    return false;
}

function bdd_user_verification_connexion(PDO $bdd, $email, $mdp)
{
    try {
        $request = $bdd->prepare('SELECT email, mdp, actif FROM user WHERE email = :email');
        $request->execute(array('email' => $email));

        if($request->rowCount() == 0) {
            echo _("Utilisateur incconu.") . '<br/>';
        }
        else {
            $data = $request->fetch();

            if($data['actif'] == 0) {
                echo _("Votre compte n'a pas encore été vérifié.") . '<br/>';
                return false;
            }

            if(password_verify($mdp, $data['mdp'])) {
                return true;
            }
            else {
                echo _("Le mot de passe renseigné n'est pas le bon.") . '<br/>';
                return false;
            }
        }
    }
    catch (PDOException $exception) {
        $exception->getMessage();
    }
    return false;
}

function bdd_verification_modification_traduction(PDO $bdd, $mot) {
    try {
        $request = $bdd->prepare('SELECT * FROM traduction WHERE mot = :mot');
        $request->execute(array('mot' => $mot));

        if($request->rowCount() == 0) {
            return false;
        }
        return true;
    }
    catch (PDOException $exception) {
        $exception->getMessage();
    }
    return false;
}

function bdd_verification_modification_utilisateur(PDO $bdd, $email) {
    try {
        $request = $bdd->prepare('SELECT * FROM user WHERE email = :email');
        $request->execute(array('email' => $email));

        if($request->rowCount() == 0) {
            return false;
        }
        return true;
    }
    catch (PDOException $exception) {
        $exception->getMessage();
    }
    return false;
}