<?php

require_once('../../../../wp-load.php'); // relative path from your PHP file

$eventid = array_lookup($_POST, 'eventid');
$brandid = array_lookup($_POST, 'brandid');
$option = array_lookup($_POST, 'option');
$value = array_lookup($_POST, 'value');

if ($option=='false') $option=false;
if ($value=='false') $value=false;

if ($eventid)
{
    $options = $_POST;

    $event = new Event($eventid);

    echo '<p>'.$event->getPriceFormatted($option, $value).'</p>';
}