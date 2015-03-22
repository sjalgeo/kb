<?php



function dtbaker_theme_page_logo() {
	?>
	
	
	<div class="wrap">

	<form action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="update_settings" value="true">
	<?php wp_nonce_field('dtbaker-header'); 
	if ( isset( $_REQUEST['saved'] ) ) echo '<div id="message" class="updated fade"><p><strong>'.__('Options saved.').'</strong></p></div>';
	?>
        <h2>Logo &amp; Header Options:</h2>
        <table>
            <tr>
                <td>Main Logo:</td>
                <td>
                    <input type="file" name="logo_image"> <br/>
                    (upload a PNG logo, 195px x 95x is a good size)
                </td>
                <td width="110" align="center">
                    <img src="<?php echo get_template_directory_uri();?>/images/logo.png" alt="<?php bloginfo('name'); ?>" />
                </td>
            </tr>
            <tr>
                <td>Logo position from top:</td>
                <td colspan="2">
                    <input type="text" name="dtbaker_logo_top" value="<?php echo get_option('dtbaker_logo_top',22);?>"> pixels (default is 22)
                </td>
            </tr>
            <tr>
                <td>Logo position from left:</td>
                <td colspan="2">
                    <input type="text" name="dtbaker_logo_left" value="<?php echo get_option('dtbaker_logo_left',22);?>"> pixels (default is 22)
                </td>
            </tr>
            <tr>
                <td>Padding under logo:</td>
                <td colspan="2">
                    <input type="text" name="dtbaker_logo_under" value="<?php echo get_option('dtbaker_logo_under',0);?>"> pixels (default is 0)
                </td>
            </tr>
            <tr>
                <td>Show Header Search Box:</td>
                <td colspan="2">
                    <select name="dtbaker_header_search">
                        <option value="1"<?php echo get_option('dtbaker_header_search',1) == 1 ? ' selected':'';?>>Yes</option>
                        <option value="0"<?php echo get_option('dtbaker_header_search',1) == 0 ? ' selected':'';?>>No</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Show Header Phone Number:</td>
                <td colspan="2">
                    <select name="dtbaker_header_phone">
                        <option value="2"<?php echo get_option('dtbaker_header_phone',2) == 2 ? ' selected':'';?>>Yes, with phone graphic</option>
                        <option value="1"<?php echo get_option('dtbaker_header_phone',2) == 1 ? ' selected':'';?>>Yes, without phone graphic</option>
                        <option value="0"<?php echo get_option('dtbaker_header_phone',2) == 0 ? ' selected':'';?>>No</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Header Phone Number Text:</td>
                <td colspan="2">
                    <input type="text" name="dtbaker_header_phone_text" value="<?php echo get_option('dtbaker_header_phone_text','1300 555 555');?>">
                </td>
            </tr>
        </table>
        <input type="submit" class="button-primary" value="<?php _e('Save Changes','travel_island') ?>" />
	</form>
	</div>
<?php }




