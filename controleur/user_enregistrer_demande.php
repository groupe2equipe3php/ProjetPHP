<?php
session_start();
require_once '../modele/bdd_connexion.php';
require_once '../modele/bdd_recherche.php';

$bdd = bdd_connexion();
$mot = $_POST['mot_a_traduire'];

