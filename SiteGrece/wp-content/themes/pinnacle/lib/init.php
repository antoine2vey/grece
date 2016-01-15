<?php
/**
 * Pinnacle initial setup and constants
 */
function kadence_setup() {
  // Register Menus
  register_nav_menus(array(
    'primary_navigation'  => __('Primary Navigation', 'pinnacle'),
    'topbar_navigation'   => __('Topbar Navigation', 'pinnacle'),
    'footer_navigation'   => __('Footer Navigation', 'pinnacle'),
  ));
  add_theme_support('post-thumbnails');
  add_theme_support( 'title-tag' );
  add_image_size( 'pinnacle_widget-thumb', 60, 60, true );
  add_post_type_support( 'attachment', 'page-attributes' );
  add_theme_support('post-formats', array('gallery', 'image', 'video'));
  add_theme_support( 'automatic-feed-links' );
  add_editor_style('/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'kadence_setup');

if (!defined('__DIR__')) { define('__DIR__', dirname(__FILE__)); }

function pinnacle_fav_output(){
  // Keep for fallback
  global $pinnacle;
  if(isset($pinnacle['pinnacle_custom_favicon']['url']) && !empty($pinnacle['pinnacle_custom_favicon']['url']) ) {
    echo '<link rel="shortcut icon" type="image/x-icon" href="'. esc_url($pinnacle['pinnacle_custom_favicon']['url']).'" />';
  }
}
add_action('wp_head', 'pinnacle_fav_output', 5);