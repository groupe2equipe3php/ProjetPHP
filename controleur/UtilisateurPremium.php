<?php
session_start();
class UtilisateurPremium extends Utilisateur
{
    private $email  = '';
    private $pseudo = '';

    public function __construct()
    {
        parent::__construct();
    }
}
?>