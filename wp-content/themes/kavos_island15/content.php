<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage travel_island
 * @since travel_island 1.0
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="blog">
        <div class="entry-header">
            <?php if ( is_sticky() ) : ?>
                <h2 class="entry-title"><span><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'travel_island' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></span></h2>
                <h3 class="entry-format"><?php _e( 'Featured', 'travel_island' ); ?></h3>
            <?php else : ?>
                <h2 class="entry-title"><span><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'travel_island' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></span></h2>
            <?php endif; ?>
        </div>
        <div class="blog_summary">
            <?php if ( has_post_thumbnail() ) { ?>
            <div class="blog_thumb fancy_image">
                <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
                    <?php
                    //<span class="thumb_thumb_decoration"></span>
                    if ( has_post_thumbnail() ) {
                        //$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( THUMB_IMAGE_WIDTH, THUMB_IMAGE_HEIGHT) );
                        //print_r($image);
                        the_post_thumbnail( );
                    }else{
                        ?>
                        <img src="<?php echo get_template_directory_uri();?>/images/placeholder.png" width="<?php echo THUMB_IMAGE_WIDTH;?>" height="<?php echo THUMB_IMAGE_HEIGHT;?>" alt="<?php echo esc_attr(the_title_attribute('echo=0'));?>">
                        <?php
                    }
                    ?>
                </a>
            </div>
            <div class="blog_text has_image">
            <?php }else{ ?>
            <div class="blog_text">
            <?php } ?>
                <div class="date_flag">
                    <span class="day"><?php echo get_the_date('jS');?></span>
                    <span class="month"><?php echo get_the_date('M');?></span>
                    <span class="year"><?php echo get_the_date('Y');?></span>
                </div>


                <div class="entry-summary">
                    <?php the_excerpt(); ?>
                </div><!-- .entry-summary3 -->
                <?php /* <?php else : ?>
                <div class="entry-content">
                    <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'travel_island' ) ); ?>
                    <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'travel_island' ) . '</span>', 'after' => '</div>' ) ); ?>
                </div><!-- .entry-content3 -->
                <?php endif; ?>
*/ ?>
            </div>
        </div>
        <?php if ( 'post' == get_post_type() ) : ?>
        <div class="blog_footer">
            <a href="<?php the_permalink();?>" class="dtbaker_button_light"><?php _e('Read More','travel_island');?></a>
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










