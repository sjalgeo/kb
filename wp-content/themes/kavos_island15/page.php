<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage travel_island
 * @since travel_island 1.0
 */

get_header();
?>

        <?php the_post(); ?>

        <?php get_template_part( 'content', 'page' ); ?>

<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage travel_island
 * @since travel_island 1.0
 */

?>

<?php get_footer(); ?>