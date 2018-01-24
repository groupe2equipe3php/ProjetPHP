<?php
session_start();

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

function bdd_demande_traduction_insertion(PDO $bdd, $email, $mot, $langue) {
    try {
        $request = $bdd->prepare('INSERT INTO demande_traduction (email, mot, langue, etat) '
            . 'VALUES(:email, :mot, :langue, :etat)');

        $request->execute(array('email' => $email, 'mot' => $mot, 'langue' => $langue, 'etat' => 'En attente'));
    }
    catch (PDOException $exception) {
        $exception->getMessage();
        return false;
    }
    return true;
}

function bdd_traduction_insertion(PDO $bdd, $mot, $traduction) {
    try {
        $bdd->beginTransaction(); // S'il y a une erreur on ne met pas à jour la base de données

        if(empty($traduction)) {
            return false;
        }

        $request = $bdd->prepare('DELETE FROM traduction WHERE mot = :mot');
        $request->execute(array('mot' => $mot)); // En cas de mise à jour, on supprime les précédents

        $request = $bdd->prepare('INSERT INTO traduction (mot, traduction) '
            . 'VALUES(:mot, :traduction)');
        $request->execute(array('mot' => $mot, 'traduction' => $traduction));

        $request = $bdd->prepare('DELETE FROM demande_traduction WHERE mot = :mot');
        $request->execute(array('mot' => $mot));

        $bdd->commit();
    }
    catch (PDOException $exception) {
        $exception->getMessage();
        $bdd->rollBack();
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
    }
    catch (PDOException $exception) {
        $exception->getMessage();
        return false;
    }
    return true;
}