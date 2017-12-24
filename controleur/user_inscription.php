<?php
session_start();
require_once '../modele/bdd_connexion.php';
require_once '../modele/bdd_insertion.php';

$bdd = bdd_connexion();

$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$pseudo = htmlspecialchars($_POST['pseudo']);
$email = htmlspecialchars($_POST['email']);
$mdp = htmlspecialchars($_POST['mdp']);
echo 'Paramètres récupérés.<br/>';

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

if(bdd_user_insertion($bdd, $nom, $prenom, $pseudo, $email, $mdp)) {
    echo 'Utilisateur inscrit.<br/>';
    if(mail($email,
        'Confirmation inscription traducteur groupe 2 équipe 3',
        'Veuillez confirmer votre inscription. Merci de votre confiance.')) {
        echo 'E-mail de confirmation envoyé.<br/>';
    }
    else {
        echo 'L\'e-mail de confirmation n\'a pas pu être envoyé.<br/>';
    }
    $_SESSION['pseudo'] = $pseudo;
    $_SESSION['email']  = $email;
}
else {
    echo 'Erreur pendant l\'inscription. Veuillez réessayer.<br/>';
}
?>
    <form action="../vue/index.php">
        <br/><input type="submit" value="Accueil"/><br/>
    </form>