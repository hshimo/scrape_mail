<?php
/**
 * Common functions
 *
 *
 *
 */


// print debug string
function pr($var) {
    if (SCRAPE_MAIL_DEBUG_PRINT) {
        $array = debug_backtrace();
        echo '[DEBUG] ' . $array[0]['file'] . " (line " . $array[0]['line'] . ")\n";
        echo '[DEBUG] ';
        print_r($var);
        echo "\n";
    }
}
