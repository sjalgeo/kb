<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage travel_island
 * @since travel_island 1.0
 */

get_header(); ?>

    <div id="primary">
        <div id="content" role="main">

            <?php if ( have_posts() ) : ?>

                <div class="entry-header">
                    <h1 class="entry-title"><span>Kavos Events</span></h1>
                </div>

<!--                <div class="page-header">-->
<!--                    <h1 class="page-title">-->
<!--                        Events-->
<!--                    </h1>-->
<!--                </div>-->

                <?php
                //travel_island_content_nav( 'nav-above' );
                ?>

                <?php /* Start the Loop */ ?>

                <div class="entry-content">
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php
                    /* Include the Post-Format-specific template for the content.
                     * If you want to overload this in a child theme then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
//                    get_template_part( 'content', get_post_format() );


                    $brand_id = get_post_meta($post->ID, 'brand_id', false);
                    $brand_id = $brand_id[0];

                    $brand = new Brand($brand_id);

                    ?>

                    <a href="<?php  echo get_permalink($post->ID) ?>">
                        <div style="display: block; border:5px solid transparent;width:100%;height:200px;">
                            <div class="archive-left">
                                <img src="<?php echo $brand->getImage(); ?>">
                            </div>
                            <div class="archive-right">
                                <h2>
                                    <?php echo $brand->getName(); ?>
                                </h2>
                                <p>
                                    <?php echo $brand->getDescription(); ?>
                                </p>
                            </div>
                        </div>
                    </a>

                <?php endwhile; ?>
                </div>
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

        </div><!-- #content -->
    </div><!-- #primary -->

<?php get_footer(); ?>