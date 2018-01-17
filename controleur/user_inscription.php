<?php
session_start();
require_once '../modele/bdd_connexion.php';
require_once '../modele/bdd_insertion.php';
require_once '../modele/bdd_verification.php';
require_once 'validation_inscription.php';

$bdd = bdd_connexion();
$err = array();

$nom    = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$pseudo = htmlspecialchars($_POST['pseudo']);
$email  = htmlspecialchars($_POST['email']);
$mdp    = htmlspecialchars($_POST['mdp']);

if (empty($nom)) {
    $err["nom"][] = "Le nom n'est pas renseigné";
}
elseif (strlen($nom)> 64) {
    $err["nom"][] = "Le nom ne doit pas dépasser 64 caractères";
}
if (empty($prenom)) {
    $err["prenom"][] = "Le nom n'est pas renseigné";
}
elseif (strlen($prenom)> 64) {
    $err["prenom"][] = "Le prénom ne doit pas dépasser 64 caractères";
}
if (empty($pseudo)) {
    $err["pseudo"][] = "Le pseudo n'est pas renseigné";
}
elseif (strlen($pseudo) > 64) {
    $err["pseudo"][] = "Le pseudo ne doit pas dépasser 64 caractères";
}
if (empty($email)) {
    $err["email"][] = "L'email n'est pas renseigné";
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $err["email"][] = "L'email n'est pas au bon format";
}
if (empty($mdp)) {
    $err["mdp"][] = "Le mot de passe n'est pas renseigné";
}
elseif (strlen($mdp) < 8) {
    $err["mdp"][] = "Le mot de passe ne doit pas être inférieur à 8 caractères";
}

if (count($err) == 0) {
    echo 'Paramètres récupérés.<br/>';
    if (bdd_user_verification_inscription($bdd, $email)) {
        if (bdd_user_insertion($bdd, $nom, $prenom, $pseudo, $email, $mdp)) {
            echo 'Utilisateur inscrit.<br/>';

            if (valider_inscription($email)) {
                echo 'E-mail de confirmation envoyé.<br/>';
            } else {
                echo 'L\'e-mail de confirmation n\'a pas pu être envoyé.<br/>';
            }
        } else {
            echo 'Erreur pendant l\'inscription. Veuillez réessayer.<br/>';
        }
    }
    else {
        echo 'Utilisateur déjà inscrit.<br/>';
    }
    die();
}

if (count($err) > 0) {
    echo "Veuillez respecter les consignes ci-dessous SVP";
    echo "<ul>";
    foreach ($err as $champEnErreur => $erreursDuChamp) {
        foreach ($erreursDuChamp as $erreur) {
            echo "<li>".$erreur."</li>";
        }
    }
    echo "</ul>";
}

?>
    <form action="../controleur/user_inscription.php" method="post">
        <label name="nom">Nom : <input type="text" name="nom" value="<?php echo htmlEntities($nom);?>"/></label><br/><br/>
        <label name="prenom">Prenom : <input type="text" name="prenom" value="<?php echo htmlEntities($prenom);?>"/></label><br/><br/>
        <label name="pseudo">Pseudo : <input type="text" name="pseudo" value="<?php echo htmlEntities($pseudo);?>"/></label><br/><br/>
        <label name="email">E-mail : <input type="text" name="email" value="<?php echo htmlEntities($email);?>"/></label><br/><br/>
        <label name="mdp">Mot de passe : <input type="password" name="mdp" <?php echo htmlEntities($mdp);?>/></label><br/><br/>
        <input type="submit"/><br/>
    </form>
    <form action="../vue/index.php">
        <input type="submit" value="Accueil"/>
    </form>