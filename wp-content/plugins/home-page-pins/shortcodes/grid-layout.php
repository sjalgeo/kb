<?php



function grid_layout($atts){


//



 /*   extract( shortcode_atts( array(
        'asin' => null,
        'product_id' => null,
        'size' => 150,
        'description' => true,
        'align' => 'left'
    ), $atts ));*/
//	$output = "";
    $layout_output='';


//	$layout_output .= '
//
//<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
//<!-- leaderboard -->
//<ins class="adsbygoogle"
//     style="display:inline-block;width:728px;height:90px"
//     data-ad-client="ca-pub-9340225966707192"
//     data-ad-slot="9580565465"></ins>
//<script>
//(adsbygoogle = window.adsbygoogle || []).push({});
//</script>';


    $layout_output .= "<div class='sja-grid'>";

    $layout_output .= '


                        ';

//	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("SJA Widget Area") ) : endif;

//    $layout_output .= sja_create_post_pin(
//        'wp-content/uploads/2014/08/reunion.png',
//        '../product/kavos-reunion-london-2014',
//        'Kavos Reunion London!',
//        "Early Bird Tickets on Sale. Book Now!");

    $layout_output .= sja_create_post_pin(
        'wp-content/uploads/2014/01/trinity_square-trans-300x294.png',
        'events/club-trinity/',
        'Club Trinity Live in Kavos',
        "Huge Summer for 2015. Book Now!");

    $layout_output .= sja_create_post_pin(
        'wp-content/uploads/2014/01/buzz-bar-street-view.jpg',
        '../the-best-bars-in-kavos',
        'Kavos Top Bars',
        'A look at a few of our favourites..');

//    $layout_output .= sja_show_child_pages( 'Bars and Nightlife', 5 );

    $layout_output .= sja_create_post_pin(
        'wp-content/uploads/2014/01/kavos.love_.corfu_.condom.png',
        '../kavos-the-virgins-guide/',
        "Kavos Virgin's Guide",
        'Your BIG questions answered.');



//    $layout_output .= sja_create_post_pin(
//        '/wp-content/uploads/2014/01/trinity_square-trans.png',
//        '../product-category/nightlife/',
//        'Huge Clubnights',
//        'VIP Access to the biggest events');

    $layout_output .= sja_create_post_pin(
        'wp-content/uploads/2013/11/Booze-Cruise-Kavos-Group-300x300.png',
        'events/kavos-vip-booze-cruise/',
        'Booze Cruise',
        'The Best Day of your holiday without a doubt, Book Now');

    $layout_output .= sja_create_post_pin(
        'wp-content/uploads/2014/03/sandstorm-beach-party-300x300.jpg',
        'events/sandstorm-clubnights/',
        'Sandstorm Clubnights',
        'Breach, MK, Jaguar Skills, Skepta');

    $layout_output .= sja_show_random_posts(5);

    $layout_output .= sja_create_post_pin(
        'wp-content/uploads/2013/11/super-paint-party-20141-300x300.jpg',
        'events/super-paint-party/',
        'Super Paint Party',
        "Last year's biggest party returns for 2015");

//    $layout_output .= sja_create_post_pin(
//        'wp-content/uploads/2014/04/dapper_laughs_kavos-228x228.jpg',
//        '../product/proper-moist-party/',
//        'Dapper Laughs',
//        'Hosting weekly parties throughout July');

//    $layout_output .= sja_create_post_pin(
//        'http://kavosbooked.com/wp-content/uploads/2013/01/slider-02-headfucker.png',
//        '../the-kavos-headfucker',
//        'Kavos Headfuckers',
//        'How to make them wherever you are!');



    $layout_output .= sja_create_post_pin(
        'wp-content/uploads/2014/01/kavos-beach-jump.jpg',
        '../working-in-kavos/',
        'Working in Kavos',
        'The first few steps to the best summer of your life!');

//    $layout_output .= sja_create_post_pin(
//        '/wp-content/uploads/2014/02/naughty-boy-kavos.png',
//        '../product/trinity-clubnights/',
//        'Naughty Boy in Kavos',
//        "July 16th Lockout Event. Book Now.");
    $layout_output .= sja_create_post_pin(
        'wp-content/uploads/2014/01/rodney.melon_.guy_.jpg',
        '../kavos-drinking-challenges',
        'Drinking Challenges',
        'If you are man enough');


    $layout_output .= sja_create_post_pin(
        'wp-content/uploads/2014/01/steak.house_.chicken.combo_.jpg',
        '../the-best-food-in-kavos/',
        'Kavos Top Food',
        'A look at a few of our favourites..');



//	$layout_output .= sja_create_social(
//		array(
//			'facebook' => 'KavosHolidays',
//			'twitter' => 'KavosCountdown'
//		)
//	);

//    $layout_output .= sja_create_ad('1830');

    $layout_output .= '</div>';

    return $layout_output;
}

add_shortcode('grid_layout', 'grid_layout');

function sja_create_post_pin( $image , $link, $heading, $text=''){
    $output =

    '
        <div class="sja-pin sja-shadow">
        <a href="' . $link . '"></a>
            <div class="entry-image">
                <img src="' .  $image . '">
            </div>
            <div class="entry-text">
                <h2>' . $heading . '</h2>
                <p>' . $text . '</p>
            </div>
        </div>
    ';

    return $output;
}

function sja_create_feature( $image , $link, $heading, $text=''){
    $output = '

        <a href=' . $link . '></a>
        <div class="sja-feature sja-shadow">

                <div class="entry-image"><img src="' . $image . '"></div>
                <span class="entry-text"><h2>' . $heading . '</h2><p>' . $text . '</p></div>

       </div>

    ';

    return $output;
}

function sja_create_ad($type){
    if ( $type == '1830' OR $type == 1830){

    }
}
function sja_show_random_posts($amount){
    $sja_random_posts = query_posts(array(
        'showposts' => $amount,
        'orderby' => 'rand',
//        'category_name' => 'Food and Drink' //You can insert any category name
    ));

    $output='<div class="sja-random-posts">';

    foreach ($sja_random_posts as $key => $post) {

        $heading = $post->post_title;
        $image = sja_get_post_image( $post->ID );
        $link = $post->guid;



//        $output .= '
//        <a href="' . $link . '">
//            <div class="sja-post-mini">
//                <div class="sja-left sja-thumb-img"><img class="sja-thumb-img-img" src="' . $image . '"></div>
//                <div class="sja-right sja-headline"><h2>' . $heading . '</h2></div>
//            </div>
//        </a>';

        $output .=

            '<div class="small-post"><a href="'.$link.'">
                <h3>[BLOG] ' .$heading.'</h3>

            </a></div>';

    }
    $output .= '</div>';

    return $output;
}

function sja_create_social($profiles){

    $output='<div class="sja-random-posts">';

    foreach ($profiles as $key => $handle) {

        $heading 	= '';
        $image		= '';
        $url        = '';

		if ( $key == 'facebook' ) {
		
			$heading 	= '/ ' . $handle;
			$image		= plugins_url('img/social-icons/facebook.png', __FILE__) ;
			$url        = 'http://www.facebook.com/' . $handle;
		
		} elseif ($key == 'twitter') {
            $heading 	= '@' . $handle;
            $image		= plugins_url('img/social-icons/twitter.png', __FILE__) ;
            $url        = 'http://www.twitter.com/' . $handle;
        }

        if ($heading == '' OR $image =='' OR $url ==''){
            # Output nothing
        } else{
            $output .= '
			<a href="' . $url . '">
				<div class="sja-post-mini">
					<div class="sja-left sja-thumb-img"><img class="sja-thumb-img-img" src="' . $image . '"></div>
					<div class="sja-right sja-headline"><h2>' . $heading . '</h2></div>
				</div>
			</a>';
        }
    }
    $output .= '</div>';
    return $output;
}

function sja_show_child_pages( $parent_name, $amount=3 ){

    // Set up the objects needed
    $my_wp_query = new WP_Query();
    $all_wp_pages = $my_wp_query->query(
        array('post_type' => 'page'));

    // Get the page as an Object
    $parent_page =  get_page_by_title( $parent_name );

    // Filter through all pages and find Portfolio's children
    $page_children = get_page_children( $parent_page->ID, $all_wp_pages );

    if ( sizeof($page_children) < $amount){ $amount = sizeof($page_children);}

    $rand_keys = array_rand($page_children, $amount);

    $output ='';

    if ( is_array($rand_keys)){
        foreach( $rand_keys as $key){

            $child_page = sja_get_from_array($page_children, $key, false);
            $url = $child_page->guid;
            $heading = $child_page->post_title;

            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $child_page->ID ), 'single-post-thumbnail' );
            $image_url = sja_get_from_array($image, 0);
            $output .= '
        <a href="' . $url . '">
            <div class="sja-post-mini">
                <div class="sja-left sja-thumb-img"><img class="sja-thumb-img-img" src="' . $image_url . '"></div>
                <div class="sja-right sja-headline"><h2>' . $heading . '</h2></div>
            </div>
        </a>';
        }
    } else{
            $child_page = sja_get_from_array($page_children, $rand_keys, false);
            $url = $child_page->guid;
            $heading = $child_page->post_title;

            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $child_page->ID ), 'single-post-thumbnail' );
            $image_url = sja_get_from_array($image, 0);
        $output .= '
        <a href="' . $url . '">
            <div class="sja-post-mini">
                <div class="sja-left sja-thumb-img"><img class="sja-thumb-img-img" src="' . $image_url . '"></div>
                <div class="sja-right sja-headline"><h2>' . $heading . '</h2></div>
            </div>
        </a>';
    }
    return $output;
}
?>