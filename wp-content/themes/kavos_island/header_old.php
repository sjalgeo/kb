<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage travel_island
 * @since travel_island 1.0
 */


$logo_top = get_option('dtbaker_logo_top',22);
$logo_left = get_option('dtbaker_logo_left',22);
$logo_under = get_option('dtbaker_logo_under',0);
$show_search = get_option('dtbaker_header_search',1);
$show_phone = get_option('dtbaker_header_phone',2); // 0 = no, 1 = yes but no phone graphic, 2 = yes with graphic
$phone_number = get_option('dtbaker_header_phone_text','1300 555 555');
//$header_height = get_option('dtbaker_header_height',209);



?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'travel_island' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <style type="text/css">
        #header_logo{
            padding:<?php echo $logo_top;?>px 0 <?php echo $logo_under;?>px <?php echo $logo_left;?>px;
        }
    </style>
<?php

    /**
     * Find out what google fonts we are using for the website
     */
    $used_google_fonts = array();
    $dtbaker_font_body = get_option('dtbaker_font_body','PT+Sans');
    $dtbaker_font_menu = get_option('dtbaker_font_menu','Amaranth');
    $dtbaker_font_banner_bar = get_option('dtbaker_font_banner_bar','Amaranth');
    $dtbaker_font_title = get_option('dtbaker_font_title','Lobster');
    $dtbaker_font_widget = get_option('dtbaker_font_widget','PT+Sans');
    $used_google_fonts[$dtbaker_font_body.':400'] = true;
    $used_google_fonts[$dtbaker_font_menu.':400'] = true;
    $used_google_fonts[$dtbaker_font_banner_bar.':400'] = true;
    $used_google_fonts[$dtbaker_font_title.':400'] = true;
    $used_google_fonts[$dtbaker_font_widget.':400'] = true;
    echo '<link href="http://fonts.googleapis.com/css?family=';
    echo implode('|',array_keys($used_google_fonts));
    echo '" rel="stylesheet" type="text/css"/>';
    echo "\n";
    /**
     * Now print out these special styles:
     */
    $google_fonts=dtbaker_get_google_fonts();
    echo '<style type="text/css">';
    if($dtbaker_font_body){
        echo "body, .dtbaker_button, .dtbaker_button_light{ font-family: '".$google_fonts[$dtbaker_font_body][1]."', cursive; }\n";
    }
    if($dtbaker_font_menu){
        echo "#header_menu a, .flexslider_wrapper .flexslider_sidebar li a, #header_phone { font-family: '".$google_fonts[$dtbaker_font_menu][1]."', cursive; }\n";
    }
    if($dtbaker_font_banner_bar){
        echo ".full_banner .content { font-family: '".$google_fonts[$dtbaker_font_menu][1]."', cursive; }\n";
    }
    if($dtbaker_font_title){
        echo "h1, h2, h3, div.blog h1 span, .blog h2 span, .widget #searchsubmit, .shop_breadcrumb div, div.product p.price, .widget-title, #respond input#submit, #sidebar_image_button, #sidebar_image_shipping, .full_banner .title { font-family: '".$google_fonts[$dtbaker_font_title][1]."', cursive; }\n";
    }
    if($dtbaker_font_widget){
        echo ".widget ul li a, #header_search_button { font-family: '".$google_fonts[$dtbaker_font_widget][1]."', cursive; }\n";
    }
    echo '</style>';

	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

    wp_register_style( 'travel_island_css', get_stylesheet_directory_uri().'/style.css' );
    wp_register_style( 'travel_island_jigoshop', get_stylesheet_directory_uri().'/style.jigoshop.css' );
    wp_register_style( 'travel_island_media', get_stylesheet_directory_uri().'/style.media.css' );
    wp_enqueue_style( 'travel_island_css' );
    wp_enqueue_style( 'travel_island_jigoshop' );
    wp_enqueue_style( 'travel_island_media' );


	wp_head();

    /* <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" /> */

?>


</head>

<body <?php body_class(); ?>>

<div id="holder">
<div class="bg_wave_tile">
    <div class="bg_details">
        <div class="bg_wave_tile_cover">
            <div id="wrapper">

                <div id="header">



                    <div id="header_logo">
                        <a href="<?php echo home_url();?>" title="<?php echo esc_attr(bloginfo());?>"><img src="<?php echo get_stylesheet_directory_uri().'/images/logo.png';?>" alt="<?php echo esc_attr(bloginfo());?>" border="0"></a>
                    </div>

                    <?php if($show_search){ ?>
                    <!-- start header serach bar -->
                    <div id="header_search">
                        <form action="" method="GET">
                            <div id="header_search_content">
                                <input type="text" name="s" value="" id="header_search_input">
                                <input type="submit" name="go" value="<?php _e('Search','travel_island');?>" id="header_search_button">
                            </div>
                            <div id="header_search_background"></div>
                        </form>
                    </div>
                    <?php } ?>
                    <?php if($show_phone>0){ ?>
                    <div id="header_phone" class="<?php echo $show_phone == 2 ? 'header_phone_graphic':'';?>">
                        <?php if($show_phone == 2){ ?>
                        <span class="header_phone_prefix">
                            <img src="<?php echo get_stylesheet_directory_uri(),'/images/icon_phone.png';?>">
                            <?php _e('PH:','travel_island');?></span>
                        <?php } ?>
                        <span class="header_phone_text"><?php echo $phone_number;?></span>
                    </div>
                    <?php } ?>


                    <!-- start the main menu -->
                    <div id="header_menu">
                        <h3 class="assistive-text"><?php _e( 'Main menu', 'travel_island' ); ?></h3>
                        <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
                        <div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'travel_island' ); ?>"><?php _e( 'Skip to primary content', 'travel_island' ); ?></a></div>
                        <div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'travel_island' ); ?>"><?php _e( 'Skip to secondary content', 'travel_island' ); ?></a></div>
                        <?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assiged to the primary position is the one used. If none is assigned, the menu with the lowest ID is used. */ ?>
                        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                    </div>
                    <!--end main menu-->


                    <div class="clear"></div>

                </div>

                <div id="content_bg">

                <?php


                // call the sidebar manager widget:
                // "content_full" shows a widget area that spans the complete width of the page.
                do_action('widget_area_manager_hook','content_full_page');
                // "before content" starts the <div> tags to display the main content with an optional sidebar.
                do_action('widget_area_manager_hook','before_content');

                ?>