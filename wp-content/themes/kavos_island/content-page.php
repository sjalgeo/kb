<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage travel_island
 * @since travel_island 1.0
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<h1 class="entry-title"><span><?php the_title(); ?></span></h1>
	</div><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
        <?php travel_island_content_nav( 'nav-below' ); ?>
	</div><!-- .entry-content2 -->
	<div class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'travel_island' ), '<span class="edit-link">', '</span>' ); ?>
	</div><!-- .entry-meta -->
</div><!-- #post-<?php the_ID(); ?> -->
<?php
?>