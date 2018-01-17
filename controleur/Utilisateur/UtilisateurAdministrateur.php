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
    public function traduire($text){
        parent::traduire($text);
    }
    public function demanderTraduction($text){
        parent::demanderTraduction($text);
    }
    public function visualiserMesDemandes(){
        parent::visualiserMesDemandes();
    }
    public function ajouterTraduction($text1,$lang1,$text2,$lang2){
        parent::ajouterTraduction($text1,$lang1,$text2,$lang2);
    }
    public function exporterTraduction($lang){
        parent::exporterTraduction($lang);
    }

}