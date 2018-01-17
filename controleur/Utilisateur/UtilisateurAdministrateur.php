<?php
session_start();
require_once '../gettext.inc.php';
class UtilisateurAdministrateur extends UtilisateurTraducteur
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

    public function exporterTraduction($lang){
        parent::exporterTraduction($lang);
    }
}