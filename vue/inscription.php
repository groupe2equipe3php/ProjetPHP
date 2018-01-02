<?php
require_once '../utils.inc.php';
start_page('Inscription');
?>
    <form action="../controleur/user_inscription.php" method="post">
        <label name="nom">Nom : <input type="text" name="nom"/></label><br/><br/>
        <label name="prenom">Prenom : <input type="text" name="prenom"/></label><br/><br/>
        <label name="pseudo">Pseudo : <input type="text" name="pseudo"/></label><br/><br/>
        <label name="email">E-mail : <input type="text" name="email"/></label><br/><br/>
        <label name="mdp">Mot de passe : <input type="password" name="mdp"/></label><br/><br/>
        <input type="submit"/><br/><br/>
    </form>
    <form action="../vue/index.php">
        <input type="submit" value="Accueil"/>
    </form>
<?php
end_page();
?>