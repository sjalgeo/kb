<?php


foreach(glob( dirname(__FILE__)."/shortcodes/*.php" ) as $filename) include_once($filename);




function dtbaker_shortcode_ticklist($atts, $innercontent='', $code='') {
    return preg_replace('#<ul#i','<ul class="ticklist"',$innercontent);
}

add_shortcode('ticklist', 'dtbaker_shortcode_ticklist');

function dtbaker_shortcode_bullet($atts, $innercontent='', $code='') {
    return preg_replace('#<ul#i','<ul class="bullets"',$innercontent);
}

add_shortcode('bulletlist', 'dtbaker_shortcode_bullet');


function dtbaker_shortcode_separator($atts, $innercontent='', $code='') {
    return '<p>&nbsp;</p><hr class="clear"/>';
}

add_shortcode('separator', 'dtbaker_shortcode_separator');

function dtbaker_toggle_shortcode($atts, $innercontent='', $code) {
    extract(shortcode_atts(array(
        'id' => false,
        'hidden' => 1,
        'more_link' => '[read more]',
    ), $atts));
    // do we hide all other open ones before showing this one?
    static $temp_id = 1;
    if(!$id){
        $id = $temp_id;
    }
    ob_start();
    if($code=='togglesummary'){
        ?>
    <div id="dtbaker_toggle_s_<?php echo $id;?>">
        <?php echo $innercontent;?>
        <a href="#" onclick="jQuery('#dtbaker_toggle_s_<?php echo $id;?>').slideUp();
            jQuery('#dtbaker_toggle_<?php echo $id;?>').slideDown(); return false;"><?php echo $more_link;?></a>
    </div> <?php
    }else if($code=='togglebutton'){
        ?> <a href="#" onclick="jQuery('#dtbaker_toggle_<?php echo $id;?>').slideToggle(); return false;"><?php echo trim($innercontent);?></a> <?php
    }else if($code=='togglecontent'){
        ?> <div id="dtbaker_toggle_<?php echo $id;?>" style="<?php echo ($hidden) ? 'display:none;' : '';?>">
        <?php echo $innercontent;?>
    </div> <?php
        $temp_id++;
    }
    return ob_get_clean();
}
add_shortcode('togglebutton', 'dtbaker_toggle_shortcode');
add_shortcode('togglecontent', 'dtbaker_toggle_shortcode');
add_shortcode('togglesummary', 'dtbaker_toggle_shortcode');
