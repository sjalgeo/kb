<?php



function dtbaker_theme_page_envato() {

    $licence_code = get_option("_envato_licencetravel_island","");
    if(isset($_REQUEST["save_envato_licence"])){
        $licence_code = $_REQUEST["save_envato_licence"];
        update_option("_envato_licencetravel_island",$licence_code);
    }

	?>
	
	
	<div class="wrap">

	<?php wp_nonce_field('dtbaker-header');
	if ( isset( $_REQUEST['saved'] ) ) echo '<div id="message" class="updated fade"><p><strong>'.__('Options saved.').'</strong></p></div>';
	?>
        <h2>Envato Options:</h2>
        <p>Thank you for purchasing this theme.</p>
        <p>Here you can setup automatic updates, so you will always receive the latest version of the theme. First we need your "licence purchase code". Please enter it below:</p>


        <form action="" method="post" >
            <input type="text" name="save_envato_licence" value="<?php echo htmlspecialchars($licence_code);?>"
                   style="padding:5px; font-size: 16px; width: 400px;"> <br/>
            <input type="submit" class="button-primary" value="<?php _e('Save Licence Key','travel_island') ?>" />
        </form>


        <p>Your unique code is in your "Licence Certificate" on the <strong>Downloads</strong> page in ThemeForest (where you downloaded this theme).</p>
        <p>The key looks something like this: 39d40592-12c0-1234-988b-123458cd736b</p>
        <p>If you are having trouble locating this file please <a href="http://support.dtbaker.com.au/support-ticket.html">email us</a> and we can help you locate it.</p>


	</div>
<?php }




