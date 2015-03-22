<?php
/**
 * Template Name: Home Page with Widgets
 * Description: A Page Template for the home page
 *
 * @package WordPress
 * @subpackage travel_island
 * @since travel_island 1.0
 */

// are we displaying a sidebar here?
// if we're using this template it means we are on a "page"
// and this "page" will have options under it for sidebar etc..

the_post();

get_header();

// incase a plugin at the top does a loop - this one fails.
wp_reset_postdata();
?>


    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php
        $home_style = 'home_no_thumb';
        /*if ( has_post_thumbnail() ) {
            //$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( THUMB_IMAGE_WIDTH, THUMB_IMAGE_HEIGHT) );
            //print_r($image);
            //the_post_thumbnail( );
            $home_style = 'home_has_thumb';
            ?>
            <div class="fancy_picture_box" style="float:right; margin-left:10px;">
                <!-- start with the plain image you want to be fancified -->
                <?php the_post_thumbnail( 'home-pretty-thumb' ); ?>
                <div></div>
            </div>
            <?php
        }*/ ?>

        <div class="home_wrap <?php echo $home_style;?>">

            <?php /* <h1 style="height:40px;">
                <span class="florish_title_left"></span>
                <span><?php the_title(); ?></span>
                <span class="florish_title_right"></span>
            </h1> */ ?>

            <div class="entry-content">
                <?php the_content(); ?>
                <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'travel_island' ) . '</span>', 'after' => '</div>' ) ); ?>
            </div><!-- .entry-content -->

            <div class="clear"></div>
        </div>

    </div><!-- #post-<?php the_ID(); ?> -->


<?php get_footer(); ?>