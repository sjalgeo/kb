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
include('shortcodes/events.php');
include('controllers/brandpage.php');
include('controllers/eventspage.php');

include('Entity/Brand.php');
include('Entity/Event.php');