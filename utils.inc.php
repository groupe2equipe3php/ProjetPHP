<?php
function start_page($title)
{
    echo '<!DOCTYPE html><html lang="fr_FR"><head><meta charset="UTF-8"/><title>'
        . PHP_EOL . $title . '</title></head><body>' . PHP_EOL;
};

function end_page()
{
    echo '</body></html>';
};
?>