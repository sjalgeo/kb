<?php
/**
Plugin Name: Kavos Tickets Plugin
Plugin URI: stephen.algeo.com
Description: TODO
Version: TODO
Author: TODO
Author URI: TODO
Tested up to: 4.0
 */

define('DEV_MODE','1');

if ( DEV_MODE == '1'){
    # Config related to development
    ini_set('display_errors', 'on');                # Error settings if in dev mode
    error_reporting(E_ALL);

    include('library/debug.php');
}

define('KBTICKETS_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('KBTICKETS_VIEWS', plugin_dir_path(__FILE__).'views/');
define('KBTICKETS_PLUGIN_SLUG','kavos-tickets');


# TODO include everything in shortcodes folder
include('library/functions.php');
include('library/options.php');
include('library/cart.php');
include('library/events.php');
include('library/views.php');
include('shortcodes/brand.php');
include('shortcodes/cart.php');
include('controllers/brandpage.php');

include('Entity/Brand.php');
include('Entity/Event.php');