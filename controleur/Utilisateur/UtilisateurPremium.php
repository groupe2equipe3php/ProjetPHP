<?php
session_start();
require_once '../gettext.inc.php';
class UtilisateurPremium extends UtilisateurStandard
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

    public function rechercher($text){

    }

}