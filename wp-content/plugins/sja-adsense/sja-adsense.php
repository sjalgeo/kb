<?php
/* Plugin Name: Responsive Adsense Plugin
Plugin URI: n/a
Description:  
Version: ongoing
Author: 
Author URI: 
*/

define ('SJA_ADS_PLUGIN_PATH', plugin_dir_path(__FILE__));
define ('SJA_ADS_PATH', plugin_dir_path(__FILE__).'ads/');
define ('SJA_ADS_TEMPLATES', plugin_dir_path(__FILE__).'templates/');

include ('library/debug.php');
include ('library/ads.php');
include ('shortcodes/responsive-ad.php');


//include(SJA_ADS_PLUGIN_PATH.)


//echo DEV_MODE;exit;
//sja_debug(123);

//sja_debug(SJA_ADS_PLUGIN_PATH);