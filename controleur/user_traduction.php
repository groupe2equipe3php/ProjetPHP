<?php
session_start();
require_once '../gettext.inc.php';
require_once '../utils.inc.php';
require_once  '../vue/traduction.php';

initialiser_gettext($_SESSION['lang']);

$traduction = htmlspecialchars($_POST['mot_a_traduire']);
echo _($traduction);
