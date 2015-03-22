<?php

function sja_kavos_brand_shortcode($atts){

    extract( shortcode_atts( array(

    ), $atts ));

    if (isset($atts['id']))
    {
        $brand = new Brand($atts['id']);
        return createBrandCTA($brand);
    }
}

add_shortcode('KavosCTA', 'sja_kavos_brand_shortcode');

?>