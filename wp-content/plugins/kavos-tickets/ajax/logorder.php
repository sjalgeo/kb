<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('../../../../wp-load.php'); // relative path from your PHP file

$name = array_lookup($_POST, 'name');
$email = array_lookup($_POST, 'email');

if(!$name OR !$email) exit;

$wpdb->insert(
    'orderclicks',
    array(
        'name' => $name,
        'email' => $email,
        'timestamp'=>date("Y-m-d H:i:s")
    )
);

if ($wpdb->insert_id)
{
    echo json_encode(array('id'=>$wpdb->insert_id));
}
else{
    echo json_encode(array('status'=>'failed'));
}

