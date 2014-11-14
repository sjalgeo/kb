<?php


function travel_island_widgets_init() {

    // we pass widget registration off to the widget_area_manager plugin.

    // add layout areas (ie: areas that can contain the widgets)
    do_action('widget_area_add_layouts',array(


        /**
         * The main widget area.
         * This displays on the left or right of every page on the website.
         * It can also be "hidden", when hidden the page goes to full width.
         */
        'main' => array(
            'name' => 'Left/Right Column',
            'default_widget_area' => array(
                'all'=>'main', // the main default area used for all pages
                'products'=>'shop', // which widget area to use for products listing
                'product'=>'shop', // which widget area to use for individual product listing
                'archive'=>'widget_area-2', // which widget area to use for archive pages
                'post'=>'widget_area-3', // which widget area to use for individual post pages
            ),
            'default_position' => array(
                'all'=>'pos_right', // change to pos_left or hidden if you like.
                'archive'=>'pos_right', // change to pos_left or hidden if you like.
                'post'=>'pos_right', // change to pos_left or hidden if you like.
            ),
            'positions' => array(
                'pos_left' => array(
                    'name' => 'Left',
                    // hooks that are called from in our template with something like:
                    // do_action('widget_area_manager_hook','before_content');
                    // the special {WIDGETS} string will contain the selected widget_area
                    'before_content' => '<div id="widget_area_main_wrap" class="right_column width_695 content_main">{HOOK:content_top}',
                    'after_content' => '{HOOK:content_bottom}</div><div id="widget_area_main_holder" class="widget-area left_column width_223" role="complementary">{WIDGETS}</div>',
                ),
                'pos_right' => array(
                    'name' => 'Right',
                    // hooks that are called from in our template with something like:
                    // do_action('widget_area_manager_hook','before_content');
                    // the special {WIDGETS} string will contain the selected widget_area
                    'before_content' => '<div id="widget_area_main_wrap" class="left_column width_695 content_main">{HOOK:content_top}',
                    'after_content' => '{HOOK:content_bottom}</div><div id="widget_area_main_holder" class="widget-area right_column width_223" role="complementary">{WIDGETS}</div>',
                ),
                'pos_hidden' => array(
                    'name' => 'Hidden',
                    // hooks that are called from in our template with something like:
                    // do_action('widget_area_manager_hook','before_content');
                    // the special {WIDGETS} string will contain the selected widget_area
                    'before_content' => '<div id="widget_area_main_wrap_full" class="content_main full_column">{HOOK:content_top}',
                    'after_content' => '{HOOK:content_bottom}</div>',
                ),
            ),
        ),
        /**
         * The above_content area directly under the top banner.
         * They can place a full width slider here if they want.
         */
        'above_content' => array(
            'name' => 'Above Content',
            'default_widget_area' => array(
                'all' => false,
                'front_page'=>'homepage',
            ),
            'default_position' => array(
                'all' => 'pos_hidden',
                'front_page'=>'pos_content',
            ),
            'positions' => array(
                'pos_content' => array(
                    'name' => 'Width of Content',
                    // hooks that are called from in our template with something like:
                    // do_action('widget_area_manager_hook','before_content');
                    // the special {WIDGETS} string will contain the selected widget_area
                    'content_top' => '<div id="widget_area_top" class="widget-area" role="complementary">{WIDGETS}</div>',
                ),
                'pos_full' => array(
                    'name' => 'Full Page Width',
                    // hooks that are called from in our template with something like:
                    // do_action('widget_area_manager_hook','before_content');
                    // the special {WIDGETS} string will contain the selected widget_area
                    'content_full_page' => '<div id="widget_area_top" class="widget-area" role="complementary">{WIDGETS}</div>',
                ),
                'pos_hidden' => array(
                    'name' => 'Hidden',
                ),
            ),
        ),
        /**
         * Along the footer of the content area.
         */
        'footer' => array(
            'name' => 'Below Content',
            'default_widget_area' => false,
            'default_position' => 'pos_hidden',
            'positions' => array(
                'pos_content' => array(
                    'name' => 'Width of Content',
                    // hooks that are called from in our template with something like:
                    // do_action('widget_area_manager_hook','before_content');
                    // the special {WIDGETS} string will contain the selected widget_area
                    'content_bottom' => '<div id="widget_area_bottom" class="bottom-widget-area" role="complementary">{WIDGETS}</div>',
                ),
                'pos_full' => array(
                    'name' => 'Full Page Width',
                    // hooks that are called from in our template with something like:
                    // do_action('widget_area_manager_hook','before_content');
                    // the special {WIDGETS} string will contain the selected widget_area
                    'content_full_page_bottom' => '<div id="widget_area_bottom" class="bottom-widget-area" role="complementary">{WIDGETS}</div>',
                ),
                'pos_hidden' => array(
                    'name' => 'Hidden',
                ),
            ),
        ),
        /** end hook area config */
    ));

    // add the sidebars:
    $sidebars = array();

    /// the small header widget area:
    $sidebars['homepage'] = array(
        'name' => __( "Home Slider", 'travel_island' ),
        'description' => 'This widget area is default for your home page. It will show the home page slider.',
        'id' => 'homepage',
        'before_widget' => '',
        'after_widget' => "",
        'before_title' => '',
        'after_title' => '',
    );

    $sidebars['contact'] = array(
        'name' => __( "Contact Page", 'travel_island' ),
        'description' => 'This widget area is default for your contact page. Add social or contact widgets here.',
        'id' => 'contact',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    );

    $sidebars['shop'] = array(
        'name' => __( "Shop Sidebar", 'travel_island' ),
        'description' => 'This is the default widget group that can be displayed on the left or right of every shop page.',
        'id' => 'shop',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    );


    // main sidebar, for the left/right area.
    $sidebars['main'] = array(
        'name' => __( "Sidebar Column #1", 'travel_island' ),
        'description' => 'This is the default widget group that can be displayed on the left or right of every page.',
        'id' => 'main',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    );


    $number = get_option('_dtbaker_theme_optional_widget_count',6);
    for($x=2;$x<=$number;$x++){
        $sidebars['widget_area-'.$x] = array(
            'name' => 'Sidebar Column #'.$x,
            'id' => 'widget_area-'.$x,
            'description' => 'An empty sidebar for use on any page',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        );
    }
    $sidebars['widget_area-2']['description'] = 'This is used by default on blog archive pages.';
    $sidebars['widget_area-3']['description'] = 'This is used by default on individual blog pages.';

    $sidebars['blank1'] = array(
        'name' => __( "Blank Widget Area", 'travel_island' ),
        'description' => 'This widget area is can be used if you want to have a second home page slider setup on a different page.',
        'id' => 'blank1',
        'before_widget' => '',
        'after_widget' => "",
        'before_title' => '',
        'after_title' => '',
    );

    do_action('widget_area_add_sidebars',$sidebars);
}
add_action( 'widgets_init', 'travel_island_widgets_init' );




foreach(glob( dirname(__FILE__)."/widgets/*.php" ) as $filename) include_once($filename);

