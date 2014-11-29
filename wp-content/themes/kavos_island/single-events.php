<?php
/**
 * Brand / Event template
 */
?>

<?php get_header('shop'); ?>

<?php do_action('jigoshop_before_main_content'); // <div id="container"><div id="content" role="main"> ?>

<?php
    $brand_id = get_post_meta($post->ID, 'brand_id', false);
    $brand_id = $brand_id[0];

    $brand = new Brand($brand_id);
    echo createBrandPage($brand);

?>

<?php do_action('jigoshop_after_main_content'); // </div></div> ?>
<?php do_action('jigoshop_sidebar'); ?>
<?php get_footer('shop'); ?>