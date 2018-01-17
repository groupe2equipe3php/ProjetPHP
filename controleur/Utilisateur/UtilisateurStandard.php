<?php
session_start();
require_once '../gettext.inc.php';
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
    public function traduire($text, $lang){
        initialiser_gettext($lang);
        echo _($text);
    }
}