<?php

function sja_adsense_shortcode($atts){

       extract( shortcode_atts( array(
           'asin' => null,
           'product_id' => null,
           'size' => 150,
           'description' => true,
           'align' => 'left'
       ), $atts ));


    $id = substr(microtime(), -8);

    $template = sjaGetTemplate();
//    $ad = sjaGetAdBySize('729x90');
//    $ad = sjaGetAdBySize('250x250');
    $ad = sjaGetAdBySize('468x60');
//    $ad = sjaGetAdBySize('336x280');
//    $ad = sjaGetAdBySize('320x100');
//    $ad = sjaGetAdBySize('970x250');
    $template = str_replace('{CREATIVE}', $ad, $template);
    $template = str_replace('{SCRIPT}', sjaGetScript(), $template);
    $template = str_replace('{ID}', $id, $template);
    return $template;
}

add_shortcode('sja_adsense', 'sja_adsense_shortcode');

?>