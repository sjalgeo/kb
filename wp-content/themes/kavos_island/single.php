<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage travel_island
 * @since travel_island 1.0
 */

get_header(); ?>

    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'content', 'single' ); ?>
        <nav id="nav-single" class="navigation  ">
            <h3 class="assistive-text"><?php _e( 'Post navigation', 'travel_island' ); ?></h3>
            <div class="nav-previous"><?php previous_post_link( '%link', __( '&larr; Back', 'travel_island' ) ); ?></div>
            <div class="nav-next"><?php next_post_link( '%link', __( 'Next &rarr;', 'travel_island' ) ); ?></div>
        </nav><!-- #nav-above -->
    <?php endwhile; // end of the loop. ?>


<?php get_footer(); ?>