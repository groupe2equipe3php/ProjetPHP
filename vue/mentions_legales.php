<?php
session_start();

require_once '../gettext.inc.php';
require_once '../utils.inc.php';

initialiser_gettext($_SESSION['lang']);

start_page(_("Mentions légales"));

echo _("Mentions légales") . '<br/><br/>';

echo _("Créateurs du site :");
echo '<ul>
        <li>Raphael Charpy</li>
        <li>Yoan Giovacchini</li>
        <li>Olivier Goasampis</li>
        <li>Lucas Jordan</li>
      </ul><br/><br/>';

echo 'IUT AMU ' . _("site Aix") . '<br/>';
echo '413 avenue Gaston Berger<br/>';
echo '04 42 93 90 00<br/><br/>';

echo _("Ce site est hébergé par Alwaysdata.") . '<br/>';
echo '<a href="https://www.alwaysdata.com/">alwaysdata.com</a>';

end_page();