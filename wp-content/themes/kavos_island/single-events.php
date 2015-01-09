<?php
/**
 * The template for displaying Brand/Event Pages.
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
?>

<?php get_header(); ?>

<?php outputBrandPage($post); ?>

    <div class="entry-content">

        <?php the_post(); ?>
        <?php the_content(); ?>

    </div>

<?php outputBrandPage($post); ?>

<?php get_footer(); ?>