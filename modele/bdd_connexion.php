<?php
session_start();
require_once '../gettext.inc.php';

function bdd_connexion()
{
    $bdd = null;
    try {
        $bdd = new PDO('mysql:host=mysql-groupe2equipe3php.alwaysdata.net;dbname=groupe2equipe3php_base;charset=utf8',
            '149231',
            'root');
    }
    catch (PDOException $exception) {
        $exception->getMessage();
    }
    return $bdd;
}