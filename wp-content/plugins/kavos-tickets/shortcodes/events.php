<?php

function sja_kavos_events_shortcode($atts){

    extract( shortcode_atts( array(

    ), $atts ));

    showAllEventsByDate();
}

add_shortcode('kbEvents', 'sja_kavos_events_shortcode');

?>