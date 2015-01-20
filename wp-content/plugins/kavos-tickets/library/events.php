<?php

function getRemainingEvents($brand)
{
    global $wpdb;

    $q = '
            SELECT *
            FROM events
            WHERE enabled = 1
            AND brand_id = '.$brand->getId(). '
            AND date > NOW()
            ORDER BY date';

    $rs = $wpdb->get_results( $q );

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