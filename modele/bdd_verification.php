<?php
function bdd_user_connexion(PDO $bdd, $email, $mdp)
{
    try {
        $request = $bdd->prepare('SELECT email, mdp FROM user WHERE email = :email');
        $request->execute(array('email' => $email));

        if($request->rowCount() == 0) {
            echo 'Cet utilisateur n\'est pas enregistré.<br/>';
        }
        else {
            $data = $request->fetch();
            if($data['mdp'] == $mdp) {
                echo 'Utilisateur connecté.<br/>';
                return true;
            }
            else {
                echo 'Le mot de passe renseigné n\'est pas le bon<br/>';
            }
        }
    }
    catch (PDOException $exception) {
        $exception->getMessage();
    }
    return false;
}
?>