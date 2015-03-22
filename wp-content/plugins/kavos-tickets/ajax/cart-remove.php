<?php

require_once('../../../../wp-load.php'); // relative path from your PHP file

if (empty($_SESSION['kbcart'])) $_SESSION['kbcart'] = array();

$key = array_lookup($_POST, 'key');

if ($key)
{
    unset($_SESSION['kbcart'][str_replace('_', '.', $key)]);

    echo kbGetCartTable();
}
else{
    echo json_encode(array('status'=>'failed'));
}

