<?php
function bdd_user_verification_inscription(PDO $bdd, $email) {
    try {
        $request = $bdd->prepare('SELECT * FROM user WHERE email = :email');
        $request->execute(array('email' => $email));

        if($request->rowCount() == 0) {
            return true;
        }
    }
    catch (PDOException $exception) {
        $exception->getMessage();
    }
    return false;
}

function bdd_user_verification_connexion(PDO $bdd, $email, $mdp)
{
    try {
        $request = $bdd->prepare('SELECT email, mdp, actif FROM user WHERE email = :email');
        $request->execute(array('email' => $email));

        if($request->rowCount() == 0) {
            echo 'Cet utilisateur n\'est pas enregistré.<br/>';
        }
        else {
            $data = $request->fetch();

            if($data['actif'] == 0) {
                echo 'Votre compte n\'a pas encore été vérifié.<br/>';
                return false;
            }

            if(password_verify($mdp, $data['mdp'])) {
                //echo 'Utilisateur connecté.<br/>';
                return true;
            }
            else {
                echo 'Le mot de passe renseigné n\'est pas le bon<br/>';
                return false;
            }
        }
    }
    catch (PDOException $exception) {
        $exception->getMessage();
    }
    return false;
}
?>