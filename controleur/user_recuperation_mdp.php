<?php
session_start();
require_once('../utils.inc.php');
require_once '../modele/bdd_connexion.php';
$bdd = bdd_connexion();
start_page("Recuperation de mot de passe");


if(isset($_GET['section'])) {
    $section = htmlspecialchars($_GET['section']);
} else {
    $section = "" ;
}

if(isset($_POST['recup_submit'],$_POST['recup_mail'] )){
    if(!empty($_POST['recup_mail'])){
        $recup_mail = htmlspecialchars($_POST['recup_mail']);
        if(filter_var($recup_mail,FILTER_VALIDATE_EMAIL)) {
            $mailexist = $bdd->prepare('SELECT id FROM user WHERE email = ?');
            $mailexist->execute(array($recup_mail));
            $mailexist = $mailexist->rowCount();
            if($mailexist == 1 ) {
                $_SESSION['recup_mail'] = $recup_mail;
                $recup_code = "";
                for ($i=0; $i < 8 ; $i++){
                    $recup_code .= mt_rand(0,9);
                }
                //$_SESSION['recup_code'] = $recup_code;

                $mail_recup_exist = $bdd->prepare('SELECT id FROM recuperation WHERE mail = ? ');
                $mail_recup_exist->execute(array($recup_mail));
                $mail_recup_exist = $mail_recup_exist->rowCount();

                if($mail_recup_exist == 1 ) {
                    $recup_insert = $bdd->prepare('UPDATE recuperation SET code = ? WHERE mail= ?');
                    $recup_insert->execute(array($recup_code,$recup_mail));
                } else  {
                    $recup_insert = $bdd->prepare('INSERT INTO recuperation(mail,code) VALUES (?,?)');
                    $recup_insert->execute(array($recup_mail,$recup_code));
                }

                $message = '
                 
                    Voici votre code de récuperation: '.$recup_code.' 
                    
                
                 ' ;

                mail($recup_mail, "Recuperation de mot de passe  " , $message );
                header("Location:http://groupe2equipe3php.alwaysdata.net/controleur/user_recuperation_mdp.php?section=code");

            } else {
                $error = "Cette adresse mail n'est pas enregistée" ;
            }
        } else {
            $error = "Adresse mail incorrecte" ;
        }

    } else {
        $error = 'Veuillez entrez votre adresse mail' ;
    }
}

if(isset($_POST['verif_submit'],$_POST['verif_code'])) {
    if(!empty($_POST['verif_code'])) {
        $verif_code = htmlspecialchars($_POST['verif_code']);
        $verif_req = $bdd->prepare('SELECT id FROM recuperation WHERE mail = ? AND code = ?') ;
        $verif_req->execute(array($_SESSION['recup_mail'],$verif_code));
        $verif_req = $verif_req->rowCount();
        if($verif_req == 1) {
            $up_req = $bdd->prepare('UPDATE recuperation SET confirme = 1 WHERE mail = ? ');
            $up_req->execute(array($_SESSION['recup_mail']));

            header('Location:http://groupe2equipe3php.alwaysdata.net/controleur/user_recuperation_mdp.php?section=changemdp');
        } else {
            $error ="Code invalide" ;
        }
    } else {
        $error = "Veuillez entrer votre code de confirmation " ;
    }
}

if(isset($_POST['change_submit'])) {
    if(isset($_POST['change_mdp'],$_POST['change_mdpc'])) {
        $verif_confirme = $bdd->prepare('SELECT confirme FROM recuperation WHERE mail = ? ');
        $verif_confirme->execute(array($_SESSION['recup_mail']));
        $verif_confirme = $verif_confirme->fetch();
        $verif_confirme = $verif_confirme['confirme'];
        if($verif_confirme == 1) {
            $mdp = htmlspecialchars($_POST['change_mdp']);
            $mdpc = htmlspecialchars($_POST['change_mdpc']);
            if(!empty($mdp) AND !empty($mdpc)) {
                if ($mdp == $mdpc) {
                    $mdp = sha1($mdp);
                    $ins_mdp = $bdd->prepare('UPDATE user SET mdp = ? WHERE mail = ?');
                    $ins_mdp->execute(array($mdp, $_SESSION['recup_mail']));
                    $del_req = $bdd->prepare('DELETE FROM recuperation WHERE mail = ?');
                    $del_req->execute(array($_SESSION['recup_mail']));
                    header('Location:http://groupe2equipe3php.alwaysdata.net/vue/connexion.php');
                } else {
                    $error = "Vos mots de passe ne correspondent pas";
                }

            } else {
                $error = "Veuillez remplir tous les champs " ;
            }
        } else {
            $error = "Veuillez valider votre mail grace au code de verification qui vous a été envoyé par mail" ;
        }
    } else {
        $error = "Veuillez remplir tous les champs " ;
    }
}

require_once ('../vue/recuperation_mdp.php');