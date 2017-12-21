<?php
/**
 * nom
 * prénom
 * pseudo (unique)
 * email  (unique)
 * mdp
 */

try {
    $bdd = new PDO('mysql:host=mysql-groupe2equipe3php.alwaysdata.net;dbname=groupe2equipe3php_base;charset=utf8',
        '149231',
        'root');

    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $mdp = htmlspecialchars($_POST['mdp']);

    if (is_null($nom)) {
        echo 'Le nom n\'est pas renseigné.';
        die();
    } elseif (is_null($prenom)) {
        echo 'Le prénom n\'est pas renseigné.';
        die();
    } elseif (is_null($pseudo)) {
        echo 'Le pseudo n\'est pas renseigné.';
        die();
    } elseif (is_null($email)) {
        echo 'L\'e-mail n\'est pas renseigné.';
        die();
    } elseif (is_null($mdp)) {
        echo 'Le mot de passe n\'est pas renseigné.';
        die();
    }

    $request = $bdd->prepare('INSERT INTO user VALUES(:nom, :prenom, :pseudo, :email, :mdp)');
    $request->execute(array('nom' => $nom, 'prenom' => $prenom, 'pseudo' => $pseudo, 'email' => $email, 'mdp' => $mdp));
    $request->closeCursor();
    $bdd = null;
}
catch(Exception $exception) {
    $exception->getMessage();
}
?>