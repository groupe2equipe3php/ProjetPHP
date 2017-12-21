<?php
require_once '../utils.inc.php';
start_page('Connexion');
?>
    <form action="user_connexion.php" method="post">
        <label name="email">E-mail : <input type="text" name="email"/></label><br/>
        <label name="mdp">Mot de passe : <input type="password" name="mdp"/></label><br/>
        <input type="submit"/>
    </form>
<?php
end_page();
?>