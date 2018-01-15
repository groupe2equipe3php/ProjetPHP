<?php
session_start();
class UtilisateurAdministrateur extends Utilisateur
{
    private $email  = '';
    private $pseudo = '';

    public function __construct()
    {
        parent::__construct();
    }
}