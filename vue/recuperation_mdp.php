<?php
session_start();

require_once '../gettext.inc.php';
require_once '../utils.inc.php';

start_page(_("Récupération du mot de passe"));
$title = "Récupération du mot de passe";
initialiser_gettext($_SESSION['lang']);

echo _("$title") . '<br/><br/>';
?>

<?php
if($section == 'code') {
    echo _("Un code de verification vous a été envoyé par mail : ") . $_SESSION['recup_mail']
?>

<br/><br/>
<form  method="post" class="default-form" >
    <input type="text" placeholder="<?php echo _("Code de verification") ?>" name="verif_code" /><br/>
    <input type="submit" value="<?php echo _("Valider") ?>" name="verif_submit" /><br/>
</form>

<?php
}
elseif($section == "changemdp") {
    echo _("Nouveau  mot de passe pour ") . $_SESSION['recup_mail']
?>

<form action="../controleur/user_recuperation_mdp.php" method="post" class="default-form" >
    <input type="password" placeholder="<?php echo _("Nouveau mot de passe") ?>" name="change_mdp" /><br/>
    <input type="password" placeholder="<?php echo _("Confirmation mot de passe") ?>" name="change_mdpc" /><br/>
    <input type="submit" value="<?php echo _("Valider") ?>" name="change_submit" /><br/>
</form>

<?php
}
else {
?>

<form action="../controleur/user_recuperation_mdp.php" method="post" class="default-form">
    <label name="email">E-mail :
        <input type="email" placeholder="<?php echo _("Votre adresse mail ") ?>" name="recup_mail"/></label><br/><br/>

    <p><?php echo _("Sélectionnez la méthode :") ?></p>

    <input type="radio" name="mail" id="methode_mail" value="meth_mail"/>
    <label for="methode_mail"><?php echo _("Recevoir un lien par mail") ?></label>

    <input type="radio" name="mail" id="methode_aleatoire" value="meth_aleatoire"/>
    <label for="methode_aleatoire"><?php echo _("Nouveau mot de passe aléatoire") ?></label>

    <input type="submit" value="<?php echo _("Valider") ?>" name="recup_submit"/>
</form>
    <form action="../controleur/index.php">
        <br/><input type="submit" value="<?php echo _("Accueil") ?>"/>
    </form>

<?php
}

if(isset($error)) {
    echo '<span style="color:red">'.$error.'</span>';
}
else {
    echo '<br />';
}
?>

<?php
end_page();