(function($) {
    $("#header_menu li:last-child").addClass('last-child');

})(jQuery);

window.onload = function(){
    // fix sidebar height if needed.
    if(jQuery('#widget_area_main_wrap').height() && jQuery('#widget_area_main_wrap').height() < jQuery('#widget_area_main_holder').height()){
        jQuery('#widget_area_main_wrap').height(jQuery('#widget_area_main_holder').height());
    }
};