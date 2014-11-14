<?php
/* Plugin Name: SJA Functions
Plugin URI: n/a
Description:  
Version: ongoing
Author: 
Author URI: 
*/

define('DEV_MODE','1');

if ( DEV_MODE == '1'){
    # Config related to development
    ini_set('display_errors', 'on');                # Error settings if in dev mode
    error_reporting(E_ALL);

    include('library/debug.php');
}


function sja_get_from_array( $array , $element, $returniffalse = false){

    if ( !is_array($array) OR !isset( $array[$element] ) OR $array[$element] == "" ){
        return $returniffalse;
    }else{
        return $array[$element];
    }
}

function sja_get_post_image($postID){
    if (has_post_thumbnail( $postID )) {
        $output = wp_get_attachment_image_src( get_post_thumbnail_id( $postID ), 'single-post-thumbnail' ) ;

        return ( sja_get_from_array($output, '0', false));
    }
}