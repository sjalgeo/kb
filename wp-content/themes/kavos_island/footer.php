<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the header content
 *
 */

do_action('widget_area_manager_hook','after_content');
?>


<div class="clear"></div><!--makes footer stick to the bottom of the design-->
<?php
// after content widget area (optional)
do_action('widget_area_manager_hook','content_full_page_bottom');
?>

<div class="clear"></div><!--makes footer stick to the bottom of the design-->

</div><!--end content_bg-->
<div id="footer">
        <div id="footer_menu">
            <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
        </div>

<!--    <div style="clear:both;"></div>-->
</div><!--end footer-->

</div><!--end wrapper-->
</div><!--end bg_wave_tile_cover-->
</div><!--end bg_details-->
</div><!--end bg_wave_tile-->
<div class="clear"></div>
<div id="footer_decal">
<!--    <div></div>-->
</div>
</div><!--end holder-->


<?php wp_footer(); ?>

</body>
</html>