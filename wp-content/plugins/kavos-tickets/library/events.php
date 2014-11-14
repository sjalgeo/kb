<?php

function getRemainingEvents($brand)
{
    global $wpdb;
    $rs = $wpdb->get_results( 'SELECT * FROM events WHERE brand_id = '.$brand->getId(). ' ORDER BY date' );
    return $rs;
}

function cleanDate($date)
{
    return date("M dS", strtotime($date));
}

function cleanDateWithDay($date)
{
    return date("D M dS", strtotime($date));
}