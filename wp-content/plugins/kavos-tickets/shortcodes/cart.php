<?php

function sja_kavos_cart_shortcode($atts){

    extract( shortcode_atts( array(

            ), $atts ));

        echo kbGetCartTable();

}

add_shortcode('Kavos_Cart', 'sja_kavos_cart_shortcode');

?>