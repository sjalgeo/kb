<?php

    require_once('../../../../wp-load.php'); // relative path from your PHP file

    if (empty($_SESSION['kbcart'])) $_SESSION['kbcart'] = array();

    $timestamp = time();
    $eventid = array_lookup($_POST, 'eventid');
    $quantity = array_lookup($_POST, 'quantity',1);


    # handling if some already added

    if (isset($_SESSION['kbcart'][$eventid]) AND is_array($_SESSION['kbcart'][$eventid]))
    {
        $_SESSION['kbcart'][$eventid]['quantity'] = $_SESSION['kbcart'][$eventid]['quantity'] + $quantity;
    }
    else
    {
        $_SESSION['kbcart'][$eventid] = array(
            'timestamp'=>$timestamp,
            'eventid'=>$eventid,
            'quantity'=>$quantity
        );
    }



    echo json_encode($_SESSION);