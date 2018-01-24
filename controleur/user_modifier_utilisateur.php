<?php
session_start();

require_once '../gettext.inc.php';
require_once '../utils.inc.php';

start_page(_("Modification utilisateur"));

initialiser_gettext($_SESSION['lang']);

