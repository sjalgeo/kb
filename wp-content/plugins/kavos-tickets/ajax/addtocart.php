<?php

    require_once('../../../../wp-load.php'); // relative path from your PHP file

    if (empty($_SESSION['kbcart'])) $_SESSION['kbcart'] = array();

    $timestamp = time();
    $eventid = array_lookup($_POST, 'eventid');
    $quantity = array_lookup($_POST, 'quantity',1);
    $cruiseticket = array_lookup($_POST, 'cruiseticket');
    $viptable = array_lookup($_POST, 'viptable');

    # handling if some already added

    if (isset($_SESSION['kbcart'][$eventid]) AND is_array($_SESSION['kbcart'][$eventid]))
    {
        $_SESSION['kbcart'][$eventid]['quantity'] = $_SESSION['kbcart'][$eventid]['quantity'] + $quantity;
    }
    else
    {
        $variations = array();

        if ($cruiseticket) $variations['cruiseticket'] = $cruiseticket;
        if ($viptable) $variations['viptable'] = $viptable;

        ksort($variations);
        $key = '';
        foreach($variations as $i => $var)
        {
            $key .= '.'.$i.'.'.$var;
        }

        $row = array(
            'timestamp'=>$timestamp,
            'eventid'=>$eventid,
            'quantity'=>$quantity,
            'variations'=>$variations
        );

        $_SESSION['kbcart'][$eventid.$key] = $row;
    }



    echo json_encode($_SESSION);