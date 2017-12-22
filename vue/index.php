<?php
session_start();
require_once '../utils.inc.php';

start_page('Traducteur Groupe 2 Équipe 3 IUT');

if(is_null($_SESSION['pseudo'])) {
    echo 'Bienvenue sur le site de traduction ! Vous pouvez vous inscrire ou vous connecter.<br/><br/>';
?>

    <form action="inscription.php" method="post">
        <input type="submit" name="inscription" value="S'inscrire"/><br/><br/>
    </form>
    <form action="connexion.php" method="post">
        <input type="submit" name="user_connexion" value="Se connecter"/><br/>
    </form>
<?php
}
else {
    echo 'Bienvenue <strong>' . $_SESSION['pseudo']
        . '</strong> ! Vous êtes connecté avec l\'adresse <strong>' . $_SESSION['email']
        . '</strong><br/><br/>';
?>

    <form action="../controleur/user_deconnexion.php" method="post">
        <input type="submit" name="user_deconnexion" value="Se déconnecter"/><br/>
    </form>
<?php
}

end_page();
?>