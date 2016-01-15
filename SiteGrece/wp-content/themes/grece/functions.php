<?php
function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}

if ( function_exists('register_sidebar') ) register_sidebar();	

function scripts_js()
{
    wp_register_script( 'script_js', get_template_directory_uri() . '/js/materialize.js', array( 'jquery', 'jquery-ui-core' ), '20120208', true );
    wp_enqueue_script( 'script_js' );
}
add_action( 'wp_enqueue_scripts', 'scripts_js' );

function wp_style()
{
	wp_register_style( 'materialize', get_template_directory_uri() . '/css/materialize.css', array(), '20120208', 'screen,projection' );
    wp_enqueue_style( 'materialize' );
}
add_action( 'wp_enqueue_scripts', 'wp_style' );


function bbx_images( $html ) { 
	$html = preg_replace( '/(width|height)="\d*"\s/', "", $html ); 
	return $html;
} 
add_filter( 'post_thumbnail_html', 'bbx_images', 10 );
add_filter( 'image_send_to_editor', 'bbx_images', 10 ); 
add_filter( 'wp_get_attachment_link', 'bbx_images', 10 );

?>