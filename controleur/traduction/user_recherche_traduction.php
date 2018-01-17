<?php
session_start();
require_once '../modele/bdd_connexion.php';
require_once '../modele/bdd_recherche.php';

$mot = $_POST['mot_a_traduire'];

$bdd = bdd_connexion();
$traduction = get_traduction($bdd, $mot);

if(! $traduction) {
    echo _("Ce mot n'a pas de traduction dans la base de données. Souhaitez-vous demander une traduction ?");

    $_SESSION['mot_a_traduire'] = $mot;
    ?>
    <form action="user_enregistrer_demande_traduction.php" method="post">
        <!-- TODO saisir la langue du mot -->

        <input type="submit" value="<?php echo _("Enregistrer une demande") ?>"/>
    </form>
    <?php
}
else {
    echo $traduction;
}
?>
    <form action="../index.php">
        <input type="submit" value="<?php echo _("Accueil") ?>"/>
    </form>