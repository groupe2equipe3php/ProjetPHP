<?php
function bdd_user_insertion(PDO $bdd, $nom, $prenom, $pseudo, $email, $mdp)
{
    try {
        $request = $bdd->prepare('INSERT INTO user (nom, prenom, pseudo, email, mdp) VALUES(:nom, :prenom, :pseudo, :email, :mdp)');
        $request->execute(array('nom' => $nom, 'prenom' => $prenom, 'pseudo' => $pseudo, 'email' => $email, 'mdp' => $mdp));
        echo 'Données ajoutées à la base de données.<br/>';
    }
    catch (PDOException $exception) {
        $exception->getMessage();
    }
}
?>