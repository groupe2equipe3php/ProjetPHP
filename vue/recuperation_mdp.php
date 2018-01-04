<?php
require_once '../utils.inc.php';
start_page('Récupération du mot de passe');
?>
    <p>Récupération du mot de passe.</p>
<?php if($section == 'code') { ?>
    Un code de verification vous a ete envoyé par mail : <?= $_SESSION['recup_mail'] ?>
    <br/><br/>
    <form  method="post" class="default-form" >
        <input type="text" placeholder="Code de verification" name="verif_code" /><br/>
        <input type="submit" value="Valider" name="verif_submit" /><br/>
    </form>
<?php } elseif($section == "changemdp") { ?>
    Nouveau  mot de passe pour <?= $_SESSION['recup_mail'] ?>
    <form action="../controleur/user_recuperation_mdp.php" method="post" class="default-form" >
        <input type="password" placeholder="Nouveau mot de passe" name="change_mdp" /><br/>
        <input type="password" placeholder="Confirmation mot de passe" name="change_mdpc" /><br/>
        <input type="submit" value="Valider" name="change_submit" /><br/>
    </form>
<?php } else { ?>
    <form action="../controleur/user_recuperation_mdp.php" method="post" class="default-form">
        <label name="email">E-mail : <input type="email" placeholder="Votre adresse mail " name="recup_mail"/></label><br/><br/>
        <label name="methode">Méthode :
            <select>
                <option name="methode" selected="selected">Lien pour changer de mot de passe</option>
                <option name="methode">Nouveau mot de passe aléatoire</option>
            </select>
        </label><br/><br/>
        <input type="submit" value="Valider" name="recup_submit"/>
    </form><br/>
<?php } ?>
<?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } else {echo '<br />';} ?>

<?php
end_page();
?>