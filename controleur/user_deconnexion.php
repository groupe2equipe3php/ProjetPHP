<?php
session_start();
session_destroy();
header('Location: ../vue/index_non_connecte.php');
?>