<?php
require_once '../utils.inc.php';
start_page('Récupération du mot de passe');
?>
    <p>Récupération du mot de passe.</p>
    <form action="../controleur/user_recuperation_mdp.php" method="post">
        <label name="email">E-mail : <input type="text" name="email"/></label><br/><br/>
        <label name="methode">Méthode :
            <select>
                <option name="methode" selected="selected">Lien pour changer de mot de passe</option>
                <option name="methode">Nouveau mot de passe aléatoire</option>
            </select>
        </label><br/><br/>
        <input type="submit"/>
    </form><br/>

<?php
end_page();
?>