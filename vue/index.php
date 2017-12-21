<?php
require_once '../utils.inc.php';
start_page('Traducteur Groupe2Equipe3PHP');
?>
    <form action="../controleur/test_inscription.php" method="post">
        <input type="submit" name="inscription" value="S'inscrire"/><br/>
    </form>
    <form action="../controleur/test_user_connexion.php" method="post">
        <input type="submit" name="user_connexion" value="Se connecter"/><br/>
    </form>
<?php
end_page();
?>