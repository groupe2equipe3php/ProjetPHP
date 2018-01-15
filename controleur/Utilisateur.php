<?php
session_start();
abstract class Utilisateur
{
    private $email  = '';
    private $pseudo = '';

    public function __construct()
    {
        $this->email  = $_SESSION['email'];
        $this->pseudo = $_SESSION['pseudo'];
    }
}
?>