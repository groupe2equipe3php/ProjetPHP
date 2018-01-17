<?php
session_start();
require_once '../gettext.inc.php';
require_once '../utils.inc.php';
require_once  '../vue/traduction.php';
initialiser_gettext($SESSION['lang']);

$MAT = htmlspecialchars($_POST['MAT']);

echo _($MAT);

end_page();
?>