<?php
require_once '../utils.inc.php';
start_page('Récupération du mot de passe');
?>
    <form action="../controleur/recuperation_mdp_mail.php" method="post">

        <input type="submit"/>
    </form>

<?php
end_page();
?>