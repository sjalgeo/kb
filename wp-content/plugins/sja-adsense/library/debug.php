<?php

    # Config related to development
    ini_set('display_errors', 'on');                # Error settings if in dev mode
    error_reporting(E_ALL);

if (!function_exists('sja_get_from_array')){
    function sja_get_from_array( $array , $element, $returniffalse = false){

        if ( !is_array($array) OR !isset( $array[$element] ) OR $array[$element] == "" ){
            return $returniffalse;
        }else{
            return $array[$element];
        }
    }
}

if (!function_exists('sja_get_post_image')){
    function sja_get_post_image($postID){
        if (has_post_thumbnail( $postID )) {
            $output = wp_get_attachment_image_src( get_post_thumbnail_id( $postID ), 'single-post-thumbnail' ) ;
            return ( sja_get_from_array($output, '0', false));
        }
    }
}


if (!function_exists('sja_debug')){
    function sja_debug($item)
    {
        echo '<div style="background:ghostwhite;z-index:99999;margin-left:20px;">';
        echo '<pre>debug:<br>';
        if (is_array($item)){

            print_r($item);

        } elseif (is_object($item)){

            var_dump($item);

        }elseif(is_numeric($item)){

            echo '[numeric: '.$item.']';

        }elseif($item === ''){
            echo '[is empty string]';
        }elseif(is_string($item)){

            echo '[string: '.$item.']';

        }elseif($item === true){

            echo '[item is true]';

        }elseif($item === false){

            echo '[item is false]';

        }else {

            echo '[unknown]';
            echo $item;
            print_r($item);
            var_dump($item);

        }
        echo '<br>------</pre></div>';
    }
}