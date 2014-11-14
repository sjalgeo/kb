<?php

if (!function_exists('array_lookup')){      // version of get_from_array we're pushing forward with :)
    function array_lookup( $array , $element, $returniffalse = false, $returniftrue = null){
        if ( !is_array($array) OR !isset( $array[$element] ) OR $array[$element] == "" ){
            return $returniffalse;          # Custom Item to Return if any of the tests fails
        }else{
            if ( $returniftrue == null ){
                return $array[$element];        # Return item from element in array
            } else {
                return $returniftrue;           # Custom Item to return instead of item if set
            }
        }
    }
}


function kbFormatPrice($raw)
{
    $price = $raw / 100;
    $price = number_format($price, 2, '.', '');
    $price = '£'.$price;
    return $price;
}

function kbPaypalPrice($raw)
{
    $price = $raw / 100;
    $price = number_format($price, 2, '.', '');
    return $price;
}

function sja_StartSession() {
    if(!session_id()) {
        session_start();
    }
}

add_action('init', 'sja_StartSession', 1);