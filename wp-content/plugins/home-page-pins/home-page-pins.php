<?php
/* Plugin Name: Home Page Pins
Plugin URI: n/a
Description:  
Version: ongoing
Author: 
Author URI: 
*/

define ('HPP_PLUGIN_PATH', plugin_dir_path(__FILE__));

	include("shortcodes/grid-layout.php");
    include ('library/debug.php');

    # Functions
    include("library/functions.php");


function safely_add_stylesheet() {

    if (sja_get_from_array($_SERVER,'REQUEST_URI') == '/' OR sja_get_from_array($_SERVER,'REQUEST_URI') == '/kb/'){
        wp_enqueue_style( 'gridlayout-css', plugins_url('css/sja_gridlayout_style.css', __FILE__) );
    }
}

add_action( 'wp_enqueue_scripts', 'safely_add_stylesheet' );