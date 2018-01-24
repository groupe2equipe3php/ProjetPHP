<?php
session_start();

function start_page($title)
{
    if (empty($_SESSION['user'])) {
        echo '<!DOCTYPE html>'
            . '<html lang="fr_FR">'
            . '<head><meta charset="UTF-8"/>'
            . '<link rel="stylesheet" type="text/css" href="style.css">'
            . '<title>' . PHP_EOL . $title . '</title>'
            . '</head><body><div class="bloc">'
            . '<nav>
                    <ul>
                        <a href="/controleur/index.php">ACCUEIL</a>
                        <a href="/vue/connexion.php">CONNEXION</a>
                        <a href="/vue/traduction/recherche_traduction.php">TRADUIRE</a>
                    </ul>
               </nav></div>';
    }
    else {
        echo '<!DOCTYPE html>'
            . '<html lang="fr_FR">'
            . '<head><meta charset="UTF-8"/>'
            . '<link rel="stylesheet" type="text/css" href="style.css">'
            . '<title>' . PHP_EOL . $title . '</title>'
            . '</head><body><div class="bloc">'
            . '<nav>
                    <ul>
                        <a href="/controleur/index.php">ACCUEIL</a>
                        <a href="/controleur/user_deconnexion.php">DECONNEXION</a>
                        <a href="/vue/traduction/recherche_traduction.php">TRADUIRE</a>
                    </ul>
               </nav></div>';
    }
};

function end_page()
{
    echo '</body></html>';
};
?>