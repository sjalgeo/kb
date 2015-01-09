<?php

function sja_kavos_cart_shortcode($atts){

    extract( shortcode_atts( array(

            ), $atts ));

        ?>

    <div id="cart_holder">
        <?php echo kbGetCartTable(); ?>
    </div>
<?php

}

add_shortcode('Kavos_Cart', 'sja_kavos_cart_shortcode');

?>