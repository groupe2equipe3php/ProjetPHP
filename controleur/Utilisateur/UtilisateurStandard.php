<?php
session_start();
class UtilisateurStandard extends Utilisateur
{
    private $email  = '';
    private $pseudo = '';

    public function __construct()
    {
        parent::__construct();
    }

    public function getEmail()
    {
        return parent::getEmail();
    }

    public function getPseudo()
    {
        return parent::getPseudo();
    }
}
?>