<?php

// only if jigoshop is installed.
// todo: check if installed.
/*
// remove some default jigoshop stuff:
remove_action( 'jigoshop_before_main_content', 'jigoshop_breadcrumb', 20, 0);
remove_action( 'jigoshop_sidebar', 'jigoshop_get_sidebar', 10);
remove_action( 'jigoshop_after_shop_loop_item_title', 'jigoshop_template_loop_price', 10, 2);
//remove_action( 'jigoshop_before_single_product_summary', 'jigoshop_show_product_sale_flash', 10, 2); // changed with 1.0
remove_action( 'jigoshop_before_single_product_summary_thumbnails', 'jigoshop_show_product_sale_flash', 10, 2);
add_action( 'jigoshop_before_single_product_summary', 'jigoshop_show_product_sale_flash', 90, 2);

// add our own jigoshop mods:


add_action( 'jigoshop_before_single_product', 'dtbaker_jigoshop_breadcrumb', 10, 0);
function dtbaker_jigoshop_breadcrumb(){
    echo '<div class="shop_breadcrumb">';
    jigoshop_breadcrumb(' &rsaquo; ', '<div>');
    echo '</div>';
}

//add_action( 'jigoshop_before_shop_loop_item_title', 'jigoshop_template_loop_product_thumbnail', 10, 2);
add_action( 'jigoshop_before_shop_loop_item_title', 'dtbaker_show_product_thumb_border', 9);
function dtbaker_show_product_thumb_border(){
    $size = jigoshop_get_image_size('shop_small');
    echo '<span class="shop_image_decal" style="width:'.($size[0]-10).'px; height:'.($size[1]-10).'px;"></span> ';
}


add_action( 'jigoshop_before_shop_loop_item_title', 'dtbaker_jigoshop_template_loop_price', 10, 2);
function dtbaker_jigoshop_template_loop_price( $post, $_product ) {
    ?><span class="price2"><?php echo $_product->get_price_html(); ?></span><?php
}

// wrapper around add to cart button
add_action( 'jigoshop_after_shop_loop_item', 'dtbaker_add_to_cart_before', 9, 2);
add_action( 'jigoshop_after_shop_loop_item', 'dtbaker_add_to_cart_after', 11, 2);
function dtbaker_add_to_cart_before( $post, $_product ) {
    echo '<div class="add_to_cart">';
}
function dtbaker_add_to_cart_after( $post, $_product ) {
    echo '</div>';
}


add_action( 'jigoshop_template_single_summary', 'dtbaker_jigoshop_price_summary_spacer', 15, 0);
function dtbaker_jigoshop_price_summary_spacer(){
    echo '<div style="clear:right;"></div>';
}*/