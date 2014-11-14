<?php
/**
 * Register our sidebars and widgetized areas.
 *
 */
function sja_home_pin_widgets_init() {

	register_sidebar( array(
		'name' => 'SJA Widget Area',
		'id' => 'sja_home_item_01',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	) );
}
//add_action( 'widgets_init', 'sja_home_pin_widgets_init' );

//add_action( 'jigoshop_before_single_product_summary', 'jigoshop_breadcrumb', 20);


wp_dequeue_style( 'flexslider' )

?>