<?php
session_start();
require_once '../gettext.inc.php';

function bdd_user_insertion(PDO $bdd, $nom, $prenom, $pseudo, $email, $mdp) {
    try {
        $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);

        // Création d'un utilisateur standard
        $request = $bdd->prepare('INSERT INTO user (nom, prenom, pseudo, email, mdp, type_user) '
        . 'VALUES(:nom, :prenom, :pseudo, :email, :mdp, :type_user)');

        $request->execute(array('nom' => $nom, 'prenom' => $prenom, 'pseudo' => $pseudo, 'email' => $email,
            'mdp' => $mdp_hash, 'type_user' => 's'));
    }
    catch (PDOException $exception) {
        $exception->getMessage();
        return false;
    }
    return true;
}

function bdd_traduction_insertion(PDO $bdd, $email, $mot, $traduction) {
    try {
        $request = $bdd->prepare('INSERT INTO demande_traduction (email, mot, traduction) '
        . 'VALUES(:email, :mot, :traduction)');

        $request->execute(array('email' => $email, 'mot' => $mot, 'traduction' => $traduction));
    }
    catch (PDOException $exception) {
        $exception->getMessage();
        return false;
    }
    return true;
}

function bdd_set_mdp(PDO $bdd, $mdp, $email) {
    try {
        $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);

        $request = $bdd->prepare('UPDATE user SET mdp = :mdp WHERE email LIKE :email');
        $request->execute(array('mdp' => $mdp_hash, 'email' => $email));
    }
    catch (PDOException $exception) {
        $exception->getMessage();
        return false;
    }
    return true;
}

function bdd_set_pseudo(PDO $bdd, $pseudo, $email) {
    try {
        $request = $bdd->prepare('UPDATE user SET pseudo = :pseudo WHERE email LIKE :email');
        $request->execute(array('pseudo' => $pseudo, 'email' => $email));
    }
    catch (PDOException $exception) {
        $exception->getMessage();
        return false;
    }
    return true;
}

function bdd_set_cle(PDO $bdd, $cle, $email) {
    try {
        $request = $bdd->prepare('UPDATE user SET cle = :cle WHERE email LIKE :email');
        $request->execute(array('cle' => $cle, 'email' => $email));
    }
    catch (PDOException $exception) {
        $exception->getMessage();
        return false;
    }
    return true;
}

function bdd_set_actif(PDO $bdd, $email) {
    try {
        $request = $bdd->prepare('UPDATE user SET actif = 1 WHERE email like :email');
        $request->execute(array('email' => $email));

        //echo _("Votre compte a été activé.") . '<br/>';
    }
    catch (PDOException $exception) {
        $exception->getMessage();
        return false;
    }
    return true;
}