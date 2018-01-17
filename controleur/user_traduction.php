<?php
session_start();
require_once '../gettext.inc.php';
require_once '../utils.inc.php';
require_once '../modele/bdd_connexion.php';
require_once '../modele/bdd_recherche.php';

//initialiser_gettext($_SESSION['lang']);

$mot = htmlspecialchars($_POST['mot_a_traduire']);

$bdd = bdd_connexion();

echo get_traduction($bdd, $mot);