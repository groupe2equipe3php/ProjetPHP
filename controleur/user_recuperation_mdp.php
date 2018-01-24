<?php
session_start();

require_once '../utils.inc.php';
require_once '../modele/bdd_connexion.php';
require_once '../gettext.inc.php';

start_page(_("Recuperation de mot de passe"));

$bdd = bdd_connexion();

if (isset($_GET['section'])) {
    $section = htmlspecialchars($_GET['section']);
} else {
    $section = "";
}

//if (!isset($_POST['mail'])) {
//    $error = "Veuillez choisir une option";
//}

if (isset($_POST['recup_submit'], $_POST['recup_mail'], $_POST['mail']) && $_POST['mail'] == "meth_mail") {
    if (!empty($_POST['recup_mail']) ) {
        $recup_mail = htmlspecialchars($_POST['recup_mail']);
        if(isset($_POST['mail'])) {
            if (filter_var($recup_mail, FILTER_VALIDATE_EMAIL)) {
                $mailexist = $bdd->prepare('SELECT id FROM user WHERE email = ?');
                $mailexist->execute(array($recup_mail));
                $mailexist = $mailexist->rowCount();
                if ($mailexist == 1) {
                    $_SESSION['recup_mail'] = $recup_mail;
                    $recup_code = "";
                    for ($i = 0; $i < 8; $i++) {
                        $recup_code .= mt_rand(0, 9);
                    }
                    //$_SESSION['recup_code'] = $recup_code;

                    $mail_recup_exist = $bdd->prepare('SELECT id FROM recuperation WHERE mail = ? ');
                    $mail_recup_exist->execute(array($recup_mail));
                    $mail_recup_exist = $mail_recup_exist->rowCount();

                    if ($mail_recup_exist == 1) {
                        $recup_insert = $bdd->prepare('UPDATE recuperation SET code = ? WHERE mail= ?');
                        $recup_insert->execute(array($recup_code, $recup_mail));
                    } else {
                        $recup_insert = $bdd->prepare('INSERT INTO recuperation(mail,code) VALUES (?,?)');
                        $recup_insert->execute(array($recup_mail, $recup_code));
                    }

                    $message = _("
                     
                        Voici votre code de récuperation: '$recup_code' 
                        
                    
                     ");

                    mail($recup_mail, _("Recuperation de mot de passe"), $message);
                    header("Location:http://groupe2equipe3php.alwaysdata.net/controleur/user_recuperation_mdp.php?section=code");

                } else {
                    $error = _("Cette adresse mail n'est pas enregistée");
                }

            } else {
                $error = _("Adresse mail incorrecte");
            }
        }
//        if(!isset($_POST['mail'])) {
//            $error = "Veuillez choisir une option";

    } else {
        $error = _("Veuillez entrez votre adresse mail");
    }
}
//else{
//    $error = "Veuillez choisir une option";
//}


if (isset($_POST['verif_submit'], $_POST['verif_code'])) {
    if (!empty($_POST['verif_code'])) {
        $verif_code = htmlspecialchars($_POST['verif_code']);
        $verif_req = $bdd->prepare('SELECT id FROM recuperation WHERE mail = ? AND code = ?');
        $verif_req->execute(array($_SESSION['recup_mail'], $verif_code));
        $verif_req = $verif_req->rowCount();
        if ($verif_req == 1) {
            $up_req = $bdd->prepare('UPDATE recuperation SET confirme = 1 WHERE mail = ? ');
            $up_req->execute(array($_SESSION['recup_mail']));

            header('Location:http://groupe2equipe3php.alwaysdata.net/controleur/user_recuperation_mdp.php?section=changemdp');
        } else {
            $error = _("Code invalide");
        }
    } else {
        $error = _("Veuillez entrer votre code de confirmation");
    }
}

if (isset($_POST['change_submit'])) {
    if (isset($_POST['change_mdp'], $_POST['change_mdpc'])) {
        $verif_confirme = $bdd->prepare('SELECT confirme FROM recuperation WHERE mail = ? ');
        $verif_confirme->execute(array($_SESSION['recup_mail']));
        $verif_confirme = $verif_confirme->fetch();
        $verif_confirme = $verif_confirme['confirme'];
        if ($verif_confirme == 1) {
            $mdp = htmlspecialchars($_POST['change_mdp']);
            $mdpc = htmlspecialchars($_POST['change_mdpc']);
            if (!empty($mdp) AND !empty($mdpc)) {
                if ($mdp == $mdpc) {
                    $mdp = password_hash($mdp, PASSWORD_DEFAULT);
                    $ins_mdp = $bdd->prepare('UPDATE user SET mdp = ? WHERE email = ?');
                    $ins_mdp->execute(array($mdp, $_SESSION['recup_mail']));
                    $del_req = $bdd->prepare('DELETE FROM recuperation WHERE mail = ?');
                    $del_req->execute(array($_SESSION['recup_mail']));
                    header('Location:http://groupe2equipe3php.alwaysdata.net/vue/connexion.php');
                } else {
                    $error = _("Vos mots de passe ne correspondent pas");
                }

            } else {
                $error = _("Veuillez remplir tous les champs");
            }
        } else {
            $error = _("Veuillez valider votre mail grace au code de verification qui vous a été envoyé par mail");
        }
    } else {
        $error = _("Veuillez remplir tous les champs");
    }
}


if (isset($_POST['recup_submit'], $_POST['recup_mail'], $_POST['mail']) && $_POST['mail'] == "meth_aleatoire") {
    if (!empty($_POST['recup_mail'])) {
        $recup_mail = htmlspecialchars($_POST['recup_mail']);
        if (filter_var($recup_mail, FILTER_VALIDATE_EMAIL)) {
            $mailexist = $bdd->prepare('SELECT id FROM user WHERE email = ?');
            $mailexist->execute(array($recup_mail));
            $mailexist = $mailexist->rowCount();
            if ($mailexist == 1) {
                $_SESSION['recup_mail'] = $recup_mail;
                $mdp_alea = "";

                function chaine_aleatoire($nb_car, $chaine = 'azertyuiopqsdfghjklmwxcvbn0123456789')
                {
                    $nb_lettres = strlen($chaine) - 1;
                    $mdp_alea = '';
                    for($i=0; $i < $nb_car; $i++)
                    {
                        $pos = mt_rand(0, $nb_lettres);
                        $car = $chaine[$pos];
                        $mdp_alea .= $car;
                    }
                    return $mdp_alea;
                }

                $mdp_alea = chaine_aleatoire(8);


                $message = "
                 
                    ". _("Voici votre nouveau mot de passe") ." '". $mdp_alea . "'
                    
                
                 ";

                mail($recup_mail, _("Mot de passe aleatoire generer"), $message);


                header('Location:http://groupe2equipe3php.alwaysdata.net/vue/connexion.php');
                $mdp_alea = password_hash($mdp_alea, PASSWORD_DEFAULT);
                $up_mdp = $bdd->prepare('UPDATE user SET mdp = ? WHERE email = ?');
                $up_mdp->execute(array($mdp_alea, $_SESSION['recup_mail']));
                $up_mdp = $up_mdp->rowCount();

            } else {
                $error = _("Cette adresse mail n'est pas enregistée");
            }

        } else {
            $error = _("Adresse mail incorrecte");
        }

    } else {
        $error = _("Veuillez entrez votre adresse mail");
    }
}

require_once '../vue/recuperation_mdp.php'; // laisser en bas sinon les erreurs ne sont pas gerées