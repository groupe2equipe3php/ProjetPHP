<?php
session_start();
require_once '../gettext.inc.php';
class UtilisateurTraducteur extends UtilisateurPremium
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
        parent::rechercher($text);
    }
}