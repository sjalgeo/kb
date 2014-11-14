<?php

# Include all wordpress functions.
require_once('../../../../wp-load.php'); // relative path from your PHP file
global $wpdb;
$wpdb->show_errors = FALSE;

if (isset($_POST['holderwidth'])){
    $holder = $_POST['holderwidth'];

    if ($holder > 729)
    {
        $ad = sjaGetAdBySize('729x90');
    }
    else{
        $ad = sjaGetAdBySize('468x60');
    }
}

//    $ad = sjaGetAdBySize('250x250');
//    $ad = sjaGetAdBySize('336x280');
//    $ad = sjaGetAdBySize('320x100');
//    $ad = sjaGetAdBySize('970x250');
//    $template = str_replace('{ID}', $_POST['id'], $template);
//    $template = str_replace('{CREATIVE}', $ad, $template);


echo $ad;