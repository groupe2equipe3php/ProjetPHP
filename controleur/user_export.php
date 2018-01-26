<?php
session_start();

require_once '../gettext.inc.php';
require_once '../modele/bdd_connexion.php';
require_once '../modele/bdd_recherche.php';

initialiser_gettext($_SESSION['lang']);

$bdd   = bdd_connexion();
$datas = get_traductions($bdd);

if(! $datas) {
    echo _("Il n'a pas de traduction enregistrée.");
}
else {
    $compteur = 1;

    $fichier = fopen('../download/messages.po', 'w+');
// On ouvre le fichier en lecture/écriture

    fwrite($fichier, 'msgid ""' . "\n");
    fwrite($fichier, 'msgstr ""' . "\n");
    fwrite($fichier, "\n");

    foreach ($datas as $data) {
        fwrite($fichier, '# ' . $compteur . "\n");
        fwrite($fichier, 'msgid "' . $data['mot'] . '"' . "\n");
        fwrite($fichier, 'msgstr "' . $data['traduction'] . '"' . "\n");
        fwrite($fichier, "\n");
        ++$compteur;
    }


    if($_POST['export'] == 'po') {
        shell_exec('gzip ../download/messages.po');
        header('Location: ../download/messages.po.gz'); // Téléchargement
    }
    elseif($_POST['export'] == 'mo') {
        shell_exec('msgfmt ../download/messages.po -o ../download/messages.mo');
        shell_exec('gzip ../download/messages.mo');
        header('Location: ../download/messages.mo.gz'); // Téléchargement
    }
    else {
        shell_exec('msgfmt ../download/messages.po -o ../download/messages/messages.mo');
        shell_exec('mkdir ../download/messages/; mv ../download/messages.po ../download/messages/');
        shell_exec('tar czf ../download/messages.tar.gz ../download/messages/');
        header('Location: ../download/messages.tar.gz'); // Téléchargement
    }
}

?>
<form action="index.php">
    <br/><input type="submit" value="<?php echo _("Accueil") ?>"/>
</form>