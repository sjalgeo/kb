<?php

function sja_kavos_cart_shortcode($atts){

    extract( shortcode_atts( array(

            ), $atts ));

        ?>

    <div id="cart_holder">
        <?php echo kbGetCartTable(); ?>
    </div>

    <script type="text/javascript">
        function kbEmptyCart(){

            jQuery.ajax({
                url: '<?php echo get_site_url(); ?>/wp-content/plugins/kavos-tickets/ajax/emptycart.php',
                type: 'POST',
                data: {
                    //                eventid: $eventid
                },
                success: function(data, textStatus, xhr) {

                    $jsondata = JSON.parse(data);
                    console.dir($jsondata);
                    window.location.assign('<?php echo get_site_url(); ?>/cart');
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log(textStatus.reponseText);
                }
            });

        }
    </script>


<?php

}

add_shortcode('Kavos_Cart', 'sja_kavos_cart_shortcode');

?>