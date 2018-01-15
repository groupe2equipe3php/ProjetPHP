<?php
function bdd_user_insertion(PDO $bdd, $nom, $prenom, $pseudo, $email, $mdp) {
    try {
        $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);

        // Création d'un utilisateur standard
        $request = $bdd->prepare('INSERT INTO user (nom, prenom, pseudo, email, mdp, type_user) '
        . 'VALUES(:nom, :prenom, :pseudo, :email, :mdp, :type_user)');

        $request->execute(array('nom' => $nom, 'prenom' => $prenom, 'pseudo' => $pseudo, 'email' => $email,
            'mdp' => $mdp_hash, 'type_user' => 's'));

        echo 'Données ajoutées à la base de données.<br/>';
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

        echo 'Clef ajoutée à la base de données.<br/>';
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

        echo 'Votre compte a été activé.<br/>';
    }
    catch (PDOException $exception) {
        $exception->getMessage();
        return false;
    }
    return true;
}