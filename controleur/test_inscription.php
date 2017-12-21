<?php
require_once '../utils.inc.php';
start_page('Inscription');
?>
<form action="inscription.php" method="post">
    <label name="nom">Nom : <input type="text" name="nom"/></label><br/>
    <label name="prenom">Prenom : <input type="text" name="prenom"/></label><br/>
    <label name="pseudo">Pseudo : <input type="text" name="pseudo"/></label><br/>
    <label name="email">E-mail : <input type="text" name="email"/></label><br/>
    <label name="mdp">Mot de passe : <input type="password" name="mdp"/></label><br/>
    <input type="submit"/>
</form>
<?php
end_page();
?>