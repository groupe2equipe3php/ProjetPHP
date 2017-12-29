<?php
function get_pseudo(PDO $bdd, $email) {
    try {
        $request = $bdd->prepare('SELECT pseudo FROM user WHERE email = :email');
        $request->execute(array('email' => $email));

        if($request->rowCount() == 0) {
            echo 'Cet utilisateur n\'est pas enregistré.<br/>';
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
            echo 'Cet utilisateur n\'est pas enregistré.<br/>';
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
            echo 'Cet utilisateur n\'est pas enregistré.<br/>';
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
?>