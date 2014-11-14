<?php

function sja_show_posts($atts){

 /*   extract( shortcode_atts( array(
        'asin' => null,
        'product_id' => null,
        'size' => 150,
        'description' => true,
        'align' => 'left'
    ), $atts ));*/
	$output = "";
	?>
<ul>
<?php

global $post;

$args = array( 'posts_per_page' => 5, 'offset'=> 1, 'category' => 1 );

$myposts = get_posts( $args );
$output = "";

foreach( $myposts as $post ) : setup_postdata($post); ?>

          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

		
<?php 

	$output .= "Post Name: " . $post->post_name . "<br>";
	
	
	
	if(isset($post->post_excerpt)){
		$output .=  "no excerpt" . "<br>";
	}else{
		$output .= "Post Content: " . $post->post_content . "<br>";
	}
	$output .= "<br>" . $post->post_excerpt;
	$output .= "Post Date:" . $post->post_date . "<br>";
	$output .= "Post Status: " . $post->post_status . "<br>";
	
/*	echo "<pre>";
	print_r($post);
	echo "</pre>";*/

endforeach; ?>

</ul><?php
	
	
	return $output;
}

add_shortcode('sja_show_posts', 'sja_show_posts');

?>