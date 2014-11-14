<?php


add_action('admin_menu', 'dtbaker_add_theme_page');
//add_action('publish_page', 'dtbaker_savepagecustom');
//add_action('publish_post', 'dtbaker_savepagecustom');

function dtbakerfoo(){return 'dtba';}
function dtbaker_add_theme_page() {
    if ( isset( $_REQUEST['update_settings'] ) && 'true' == $_REQUEST['update_settings'] ) {
        check_admin_referer('dtbaker-header');

        // save all options:
        $data = $_POST;
        foreach($data as $key=>$val){
            if(is_array($val))continue;
            if(preg_match('/^'.dtbakerfoo().'ker/',$key)){
                update_option($key,$val);
            }
        }

        if(isset($data['default_content']) && is_array($data['default_content'])){
            if(isset($data['default_content']['settings'])&&$data['default_content']['settings']){
                // set the home page.
                $page = get_page_by_title('Home Page');
                if($page && $page->ID){
                    update_option('show_on_front','page');
                    update_option('page_on_front',$page->ID);
                    $page = get_page_by_title('Blog Page');
                    if($page && $page->ID){
                        update_option('page_for_posts',$page->ID);
                    }
                }
            }
            if(isset($data['default_content']['menu'])&&$data['default_content']['menu']){
                $menus = get_terms('nav_menu');
                $save = array();
                foreach($menus as $menu){
                    if($menu->name == 'Main Menu'){
                        $save['primary'] = $menu->term_id;
                    }else if($menu->name == 'Footer Menu'){
                        $save['footer'] = $menu->term_id;
                    }
                }
                if($save){
                    set_theme_mod( 'nav_menu_locations', array_map( 'absint', $save ) );
                }
            }
            if(isset($data['default_content']['widgets'])&&$data['default_content']['widgets']){
                $export = false;
                if($export){
                    // used for me to export my widget settings.
                    $widget_positions = get_option('sidebars_widgets');
                    $widget_options = array();
                    foreach($widget_positions as $sidebar_name => $widgets){
                        if(is_array($widgets)){
                            foreach($widgets as $widget_name){
                                $widget_name_strip = preg_replace('#-\d+$#','',$widget_name);
                                $widget_options[$widget_name_strip] = get_option('widget_'.$widget_name_strip);
                            }
                        }
                    }
                    $a = base64_encode(serialize($widget_positions));
                    $b = base64_encode(serialize($widget_options));
                    echo "widget_positions: \n\n\n$a\n\n\n widget_options \n\n\n$b\n\n\n";exit;
                }else{
                    // importing.
                    $widget_positions = get_option('sidebars_widgets');

                    $import_widget_positions = unserialize(base64_decode($_REQUEST['widget_positions']));
                    $import_widget_options = unserialize(base64_decode($_REQUEST['widget_options']));
                    foreach($import_widget_options as $widget_name => $widget_options){
                        $existing_options = get_option('widget_'.$widget_name,array());
                        $new_options = $existing_options + $widget_options;
//                        echo $widget_name;
//                        print_r($new_options);
                        update_option('widget_'.$widget_name,$new_options);
                    }
                    update_option('sidebars_widgets',array_merge($widget_positions,$import_widget_positions));
//                    print_r($widget_positions + $import_widget_positions);exit;
                }
            }
        }

        // save logo
        $upload_success = false;
        if(isset($_FILES['logo_image']) && strlen($_FILES['logo_image']['name'])){
            $file_name = get_template_directory().'/images/logo.png';
            if(is_uploaded_file($_FILES['logo_image']['tmp_name'])){
                // move to position.
                if(preg_match("/(\.(?:png))$/i", $_FILES['logo_image']['name'], $matches)){
                    // image name found.
                    if(move_uploaded_file($_FILES['logo_image']['tmp_name'], $file_name)){
                        $upload_success=true;
                    }
                }
            }
            if(!$upload_success){
                echo "Failed to upload logo image, please make sure it is a PNG (".$_FILES['logo_image']['name'].") and check folder permissions ($file_name) and try again.";
                print_r($_FILES['logo_image']);
                exit;
            }
            // todo: check upload error message and report, meh.
        }
        $upload_success = false;
        if(isset($_FILES['logo_image2']) && strlen($_FILES['logo_image2']['name'])){
            $file_name = get_template_directory().'/images/logo2.png';
            if(is_uploaded_file($_FILES['logo_image2']['tmp_name'])){
                // move to position.
                if(preg_match("/(\.(?:png))$/i", $_FILES['logo_image2']['name'], $matches)){
                    // image name found.
                    if(move_uploaded_file($_FILES['logo_image2']['tmp_name'], $file_name)){
                        $upload_success=true;
                    }
                }
            }
            if(!$upload_success){
                echo "Failed to upload logo image, please make sure it is a PNG (".$_FILES['logo_image2']['name'].") and check folder permissions ($file_name) and try again.";
                print_r($_FILES['logo_image2']);
                exit;
            }
            // todo: check upload error message and report, meh.
        }
        wp_redirect("themes.php?page=".basename($_GET['page'])."&saved=true");
        die;
    }
    add_theme_page(__('Options: Envato','travel_island'), __('Options: Envato','travel_island'), 'edit_themes', 'dtbaker.theme_options_envato.php', 'dtbaker_theme_page_envato');
    add_theme_page(__('Options: Logo/Header','travel_island'), __('Options: Logo/Header','travel_island'), 'edit_themes', 'dtbaker.theme_options_logo.php', 'dtbaker_theme_page_logo');
    add_theme_page(__('Options: Font','travel_island'), __('Options: Font','travel_island'), 'edit_themes', 'dtbaker.theme_options_font.php', 'dtbaker_theme_page_font');
    add_theme_page(__('Default Content','travel_island'), __('Default Content','travel_island'), 'edit_themes', 'dtbaker.theme_options_default.php', 'dtbaker_theme_page_default');


}


require_once("dtbaker.theme_options_default.php");
require_once("dtbaker.theme_options_logo.php");
require_once("dtbaker.theme_options_font.php");
require_once("dtbaker.theme_options_envato.php");