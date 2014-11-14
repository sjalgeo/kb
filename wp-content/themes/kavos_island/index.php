<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage travel_island
 */


get_header(); ?>

    <?php
    // show the text from the current page.
    if(get_query_var('page_id') && get_query_var('page_id') == get_option('page_for_posts')){
        global $post;
        $args = array( 'p' => get_query_var('page_id') );
        $post = get_post( get_query_var('page_id') );
        setup_postdata($post);
        //$page = get_page(get_option('page_for_posts'));
        //if(strlen(trim($page->post_content))>0){
        ?> <h1><?php
        the_title();
        //echo htmlspecialchars($page->post_title);?></h1>
        <?php //echo do_shortcode($page->post_content);
        the_content();
        ?>
        <div class="clear"></div>
        <?php
    }
    if ( have_posts() ) : ?>

        <?php //travel_island_content_nav( 'nav-above' ); ?>

        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'content', get_post_format() ); ?>

        <?php endwhile; ?>
        <?php travel_island_content_nav( 'nav-below' ); ?>

    <?php else : ?>

        <div id="post-0" class="post no-results not-found">
            <div class="entry-header">
                <h1 class="entry-title"><?php _e( 'Nothing Found', 'travel_island' ); ?></h1>
            </div><!-- .entry-header -->

            <div class="entry-content">
                <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'travel_island' ); ?></p>
                <?php get_search_form(); ?>
            </div><!-- .entry-content -->
        </div><!-- #post-0 -->

    <?php endif; ?>

<?php get_footer(); ?>