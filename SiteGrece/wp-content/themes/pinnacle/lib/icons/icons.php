<?php

function icon_extension_admin_scripts() {
  wp_register_style('icon_extension_css', get_template_directory_uri() . '/lib/icons/css/icon-select.css', false, null);
  wp_enqueue_style('icon_extension_css');
  
  wp_register_style('icon_css', get_template_directory_uri() . '/assets/css/icons.css', false, null);
  wp_enqueue_style('icon_css');

  wp_register_script('icon_extension_js', get_template_directory_uri() . '/lib/icons/js/icon-select.js', false, null, false);
  wp_enqueue_script('icon_extension_js');
}

add_action('admin_enqueue_scripts', 'icon_extension_admin_scripts');
