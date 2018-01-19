<?php
session_start();

require_once '/home/groupe2equipe3php/www/gettext.inc.php';

initialiser_gettext($_SESSION['lang']);

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
            return false;
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

function get_demandes_traduction(PDO $bdd) {
    try {
        $request = $bdd->prepare('SELECT * FROM demande_traduction');
        $request->execute();

        if($request->rowCount() == 0) {
            return false;
        }
        else {
            echo _("E-mail Mot Langue État") . '<br/><br/>';

            while ($data = $request->fetch()) {
                echo $data['email'] . ' ' ?><strong><?php echo $data['mot'] ?></strong><?php
                echo ' ' . $data['langue'] . ' ' . $data['etat'];
                ?>

                <form action="/vue/traduction/traduire_demandes.php" method="post">
                    <input type="hidden" name="mot" value="<?php echo $data['mot'] ?>"> <!-- Envoyer l'information -->
                    <input type="hidden" name="langue" value="<?php echo $data['langue'] ?>">

                    <input type="submit" name="traduire" value="<?php echo _("Traduire") ?>">
                </form><br/>

                <?php
            }
            return true;
        }
    }
    catch(PDOException $exception) {
        $exception->getMessage();
    }
    return false;
}