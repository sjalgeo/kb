<?php



function dtbaker_theme_page_font(){


    //Google Font Files
    $google_fonts=dtbaker_get_google_fonts();
    ksort($google_fonts);
	?>
	
	
	<div class="wrap">

	<form action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="update_settings" value="true">
	<?php wp_nonce_field('dtbaker-header'); 
	if ( isset( $_REQUEST['saved'] ) ) echo '<div id="message" class="updated fade"><p><strong>'.__('Options saved.').'</strong></p></div>';
	?>
        <h2>Font Options:</h2>
        <p>You can search &amp; preview available fonts in the font archive here: <a href="http://www.google.com/webfonts" target="_blank">http://www.google.com/webfonts</a></p>
        <table>
            <tr>
                <td>Main Body Font:</td>
                <td>
                    <select name="dtbaker_font_body">
                        <option value=""> - none - </option>
                        <?php
                        $current_font = get_option('dtbaker_font_body','PT+Sans');
                        foreach($google_fonts as $font_id => $font_name){ ?>
                            <option value="<?php echo htmlspecialchars($font_id);?>" <?php
                                echo $current_font == $font_id ? ' selected' : '';
                                ?>><?php echo $font_name[0];?></option>
                        <?php } ?>
                    </select>
                    (PT Sans is default)
                </td>
            </tr>
            <tr>
                <td>Header Menu Font:</td>
                <td>
                    <select name="dtbaker_font_menu">
                        <option value=""> - none - </option>
                        <?php
                        $current_font = get_option('dtbaker_font_menu','Amaranth');
                        foreach($google_fonts as $font_id => $font_name){ ?>
                            <option value="<?php echo htmlspecialchars($font_id);?>" <?php
                                echo $current_font == $font_id ? ' selected' : '';
                                ?>><?php echo $font_name[0];?></option>
                        <?php } ?>
                    </select>
                    (Amaranth is default)
                </td>
            </tr>
            <tr>
                <td>Banner Bar Font:</td>
                <td>
                    <select name="dtbaker_font_banner_bar">
                        <option value=""> - none - </option>
                        <?php
                        $current_font = get_option('dtbaker_font_banner_bar','Amaranth');
                        foreach($google_fonts as $font_id => $font_name){ ?>
                            <option value="<?php echo htmlspecialchars($font_id);?>" <?php
                                echo $current_font == $font_id ? ' selected' : '';
                                ?>><?php echo $font_name[0];?></option>
                        <?php } ?>
                    </select>
                    (Amaranth is default)
                </td>
            </tr>
            <tr>
                <td>Page Title Fonts:</td>
                <td>
                    <select name="dtbaker_font_title">
                        <option value=""> - none - </option>
                        <?php
                        $current_font = get_option('dtbaker_font_title','Lobster');
                        foreach($google_fonts as $font_id => $font_name){ ?>
                            <option value="<?php echo htmlspecialchars($font_id);?>" <?php
                                echo $current_font == $font_id ? ' selected' : '';
                                ?>><?php echo $font_name[0];?></option>
                        <?php } ?>
                    </select>
                    (Lobster is default)
                </td>
            </tr>
            <tr>
                <td>Widget Font:</td>
                <td>
                    <select name="dtbaker_font_widget">
                        <option value=""> - none - </option>
                        <?php
                        $current_font = get_option('dtbaker_font_widget','PT+Sans');
                        foreach($google_fonts as $font_id => $font_name){ ?>
                            <option value="<?php echo htmlspecialchars($font_id);?>" <?php
                                echo $current_font == $font_id ? ' selected' : '';
                                ?>><?php echo $font_name[0];?></option>
                        <?php } ?>
                    </select>
                    (PT Sans is default)
                </td>
            </tr>
        </table>
        <input type="submit" class="button-primary" value="<?php _e('Save Changes','travel_island') ?>" />
	</form>
	</div>
<?php }




