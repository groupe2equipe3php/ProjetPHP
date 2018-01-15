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

    public function getEmail() {
        return $this->email;
    }

    public function getPseudo() {
        return $this->pseudo;
    }
}