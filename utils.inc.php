<?php
function start_page($title)
{
    echo '<!DOCTYPE html>'
        . '<html lang="fr_FR">'
        . '<head><meta charset="UTF-8"/>'
        . '<link rel="stylesheet" type="text/css" href="vue/style.css">'
        . '<title>' . PHP_EOL . $title . '</title>'
        . '</head>'
        . '<script>function recharger() { location.reload(true); }</script>'
        . '<body>' . PHP_EOL;
};

function end_page()
{
    echo '</body></html>';
};
?>