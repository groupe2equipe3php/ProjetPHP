<?php
function bdd_connexion()
{
    try {
        $bdd = new PDO('mysql:host=mysql-groupe2equipe3php.alwaysdata.net;dbname=groupe2equipe3php_base;charset=utf8',
            '149231',
            'root');
        echo 'Connecté à la base de données.<br/>';
    }
    catch (PDOException $exception) {
        $exception->getMessage();
    }
    return $bdd;
}
?>