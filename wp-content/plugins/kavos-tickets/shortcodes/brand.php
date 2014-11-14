<?php

function sja_kavos_brand_shortcode($atts){

    extract( shortcode_atts( array(

            ), $atts ));

    if (isset($atts['id']))
    {
        $brand = new Brand($atts['id']);
        return createBrandPage($brand);
    }
}

add_shortcode('KavosBrand', 'sja_kavos_brand_shortcode');

?>