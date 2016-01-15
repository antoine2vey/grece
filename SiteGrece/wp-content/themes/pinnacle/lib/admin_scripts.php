<?php

/**
 * Enqueue CSS & JS
 */

function pinnacle_admin_scripts() {
  wp_register_style('kt_admin_css', get_template_directory_uri() . '/assets/css/kt_adminstyles.css', false, 100, false);
  wp_enqueue_style('kt_admin_css');

  wp_register_script('kad_admin_js', get_template_directory_uri() . '/assets/js/kad_adminscripts.js', false, null, false);
  wp_enqueue_script('kad_admin_js');
}

add_action('admin_enqueue_scripts', 'pinnacle_admin_scripts');

if(is_admin()){ 
  if(pinnacle_is_edit_page()){
  function pinnacle_img_upload_scripts(){
      wp_enqueue_media();
        wp_enqueue_script('kadwidget_upload', get_template_directory_uri() . '/assets/js/min/widget_upload.min.js');
    }
    add_action('admin_enqueue_scripts', 'pinnacle_img_upload_scripts');
  } 
}
function pinnacle_is_edit_page(){
  if (!is_admin()) return false;
    if ( in_array( $GLOBALS['pagenow'], array( 'post.php', 'post-new.php', 'widgets.php', 'post.php', 'post-new.php' ) ) ) {
      return true;
    }
}