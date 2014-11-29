<?php

require_once('../../../../wp-load.php'); // relative path from your PHP file

$eventid = array_lookup($_POST, 'eventid');
$brandid = array_lookup($_POST, 'brandid');


if ($eventid)
{
    $event = new Event($eventid);

    echo $event->getPriceFormatted();
}