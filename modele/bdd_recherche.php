<?php
session_start();
require_once '../gettext.inc.php';

function get_pseudo(PDO $bdd, $email) {
    try {
        $request = $bdd->prepare('SELECT pseudo FROM user WHERE email = :email');
        $request->execute(array('email' => $email));

        if($request->rowCount() == 0) {
            echo _("Cet utilisateur n'est pas enregistré.") . '<br/>';
        }
        else {
            $data = $request->fetch();
            return $data['pseudo'];
        }
    }
    catch(PDOException $exception) {
        $exception->getMessage();
    }
    return null;
}

function get_cle(PDO $bdd, $email) {
    try {
        $request = $bdd->prepare('SELECT cle FROM user WHERE email = :email');
        $request->execute(array('email' => $email));

        if($request->rowCount() == 0) {
            echo _("Cet utilisateur n'est pas enregistré.") . '<br/>';
        }
        else {
            $data = $request->fetch();
            return $data['cle'];
        }
    }
    catch(PDOException $exception) {
        $exception->getMessage();
    }
    return null;
}

function get_actif(PDO $bdd, $email) {
    try {
        $request = $bdd->prepare('SELECT actif FROM user WHERE email = :email');
        $request->execute(array('email' => $email));

        if($request->rowCount() == 0) {
            echo _("Cet utilisateur n'est pas enregistré.") . '<br/>';
        }
        else {
            $data = $request->fetch();
            return $data['actif'];
        }
    }
    catch(PDOException $exception) {
        $exception->getMessage();
    }
    return null;
}

function get_type(PDO $bdd, $email) {
    try {
        $request = $bdd->prepare('SELECT type_user FROM user WHERE email = :email');
        $request->execute(array('email' => $email));

        if($request->rowCount() == 0) {
            echo _("Cet utilisateur n'est pas enregistré.") . '<br/>';
        }
        else {
            $data = $request->fetch();
            return $data['type_user'];
        }
    }
    catch(PDOException $exception) {
        $exception->getMessage();
    }
    return null;
}

function get_traduction(PDO $bdd, $mot) {
    try {
        $request = $bdd->prepare('SELECT traduction FROM traduction WHERE mot = :mot');
        $request->execute(array('mot' => $mot));

        if($request->rowCount() == 0) {
            echo _("Ce mot n'est pas enregistré.") . '<br/>';
        }
        else {
            $data = $request->fetch();
            return $data['traduction'];
        }
    }
    catch(PDOException $exception) {
        $exception->getMessage();
    }
    return false;
}

function afficher_traduction_requests(PDO $bdd) {
    try {
        $request = $bdd->prepare('SELECT * FROM demande_traduction');
        $request->execute();

        if($request->rowCount() == 0) {
            echo _("Ce mot n'est pas enregistré.") . '<br/>';
        }
        else {
            while ($data = $request->fetch()) {
                echo $data['email'] . "\t" . $data['mot'] . "\t" . $data['langue'] . "\t" . $data['etat']; ?>
                <form action="../controleur/traduction.php" method="post">
                    <input type="submit" name="Traduire" value="Traduire">
                </form><br/>
                <?php
            }
        }
    }
    catch(PDOException $exception) {
        $exception->getMessage();
    }
    return false;
}