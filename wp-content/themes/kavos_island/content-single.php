<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage travel_island
 * @since travel_island 1.0
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="blog">
        <div class="entry-header">
            <h1>
                <span><?php the_title(); ?></span>
            </h1>
        </div>
        <div class="blog_full">
            <div class="blog_text">
                <div class="date_flag">
                    <span class="day"><?php echo get_the_date('jS');?></span>
                    <span class="month"><?php echo get_the_date('M');?></span>
                    <span class="year"><?php echo get_the_date('Y');?></span>
                </div>

                <?php if ( has_post_thumbnail() ) { ?>
                    <div class="fancy_image"><?php  the_post_thumbnail( 'insideblog' ); ?></div>
                <?php } ?>

                <?php the_content(); ?>

            </div>
        </div>
        <?php if ( 'post' == get_post_type() ) : ?>
        <div class="blog_footer">
            <ul>
                <li>
                    <?php travel_island_posted_on() ;?>
                </li>
                <?php if ( comments_open() ) : ?>
                <li>
                    <?php comments_popup_link( '<span class="leave-comment">' . __( 'Leave a comment', 'travel_island' ) . '</span>', __( '<b>1</b> Comment', 'travel_island' ), __( '<b>%</b> Comments', 'travel_island' ) ); ?>
                </li>
                <?php endif; // End if comments_open() ?>

                <?php
                /* translators: used between list items, there is a space after the comma */
                $categories_list = get_the_category_list( __( ', ', 'travel_island' ) );
                if ( $categories_list ):
                    ?>
                    <li>
                        <?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'travel_island' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list ); ?>
                    </li>
                    <?php endif; // End if categories ?>
                <?php
                /* translators: used between list items, there is a space after the comma */
                $tags_list = get_the_tag_list( '', __( ', ', 'travel_island' ) );
                if ( $tags_list ):
                    ?>
                    <li>
                        <?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'travel_island' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
                    </li>
                    <?php endif; // End if $tags_list ?>
                <?php edit_post_link( __( 'Edit', 'travel_island' ), '<li class="edit-link">', '</li>' ); ?>
            </ul>
            <div class="clear"></div>
        </div>

        <?php endif; ?>
    </div>

</div><!-- #post-<?php the_ID(); ?> -->
