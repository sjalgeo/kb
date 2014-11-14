<?php

// for testing: comment out on live sites.
//set_site_transient('update_themes', null);

/***** BEGIN AUTOMATIC UPDATE CODE *******/
if(!function_exists("dtbaker_prepare_request11")){
    function dtbaker_prepare_request11($action, $args) {
        global $wp_version;
        return array(
            "body" => array(
                "action" => $action,
                "args" => serialize($args),
                "envatolicence" => get_option("_envato_licencetravel_island",""),
                "envatoitem" => "2283659",
                "install" => home_url(),
            ),
            "user-agent" => "WordPress/" . $wp_version . "; " . home_url()
        );
    }
}
add_filter("pre_set_site_transient_update_themes", "dtbaker_check_for_theme_update11");
if(!function_exists("dtbaker_check_for_theme_update11")){
    function dtbaker_check_for_theme_update11($checked_data) {
        $theme_data = wp_get_theme( TEMPLATEPATH . '/style.css');
        $theme_version = $theme_data['Version'];
        $theme_base = get_option('stylesheet');
        //if (empty($checked_data->checked))
        //   return $checked_data;

        $request_args = array(
            "name" => $theme_base,
            "version" => $theme_version,
        );
        $request_string = dtbaker_prepare_request11("check_for_updates", $request_args);
        $request_string['body']['foo'] = "bar"; //testing
        $request_string['body']['v1'] = $theme_version;
        $raw_response = wp_remote_post("http://support.dtbaker.com.au/admin/external/m.wordpress/h.public/i.11/hash.b338646ac0f5cd447555f7d8b755d555", $request_string);
        if (!is_wp_error($raw_response) && ($raw_response["response"]["code"] == 200))
            $response = @unserialize($raw_response["body"]);

        // Feed the update data into WP updater
        if (is_object($response) && !empty($response))
            $checked_data->response[$theme_base] = (array)$response;

        return $checked_data;
    }
}
add_filter("themes_api", "dtbaker_theme_api_call11", 10, 3);
if(!function_exists("dtbaker_theme_api_call11")){
    function dtbaker_theme_api_call11($def, $action, $args) {
        $theme_data = wp_get_theme( TEMPLATEPATH . '/style.css');
        $theme_version = $theme_data['Version'];
        $theme_base = get_option('stylesheet');
        if ($args->slug != $theme_base)
            return false;


        // Get the current version
        $args->version = $theme_version;
        $request_args = array(
            "name" => $theme_base,
            "version" => $theme_version,
        );
        $request_string = dtbaker_prepare_request11($action, $request_args);
        $request_string['body']['foo'] = "bar"; //testing
        $request_string['body']['v1'] = $theme_version;
        $request = wp_remote_post("http://support.dtbaker.com.au/admin/external/m.wordpress/h.public/i.11/hash.b338646ac0f5cd447555f7d8b755d555", $request_string);

        if (is_wp_error($request)) {
            $res = new WP_Error("themes_api_failed", __("An Unexpected HTTP Error occurred during the API request."), $request->get_error_message());
        } else {
            $res = @unserialize($request["body"]);
            if ($res === false)
                $res = new WP_Error("themes_api_failed", __("An unknown error occurred"), $request["body"]);
        }
        return $res;
    }
}
/***** END AUTOMATIC UPDATE CODE *******/
