<?php
function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}

function scripts_js()
{
    wp_register_script( 'script_js', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery', 'jquery-ui-core' ), false, true );
	wp_register_script( 'hyphenate', get_template_directory_uri() . '/js/hyphenate.js', array( 'jquery', 'jquery-ui-core' ), false, true );
	wp_register_script( 'wow', get_template_directory_uri() . '/js/wow.min.js', array( 'jquery', 'jquery-ui-core' ), false, true );
    wp_enqueue_script( 'script_js' );
//	wp_enqueue_script('hyphenate');
	wp_enqueue_script('wow');
}
add_action( 'wp_enqueue_scripts', 'scripts_js' );

function wp_style()
{
	wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), false, 'screen' );
	wp_enqueue_style('bootstrap');
	wp_register_style( 'animate', get_template_directory_uri() . '/css/animate.css', array(), false, 'screen' );
    wp_enqueue_style( 'animate');
	wp_register_style( 'reset', get_template_directory_uri() . '/css/reset.css', array(), false, 'screen' );
    wp_enqueue_style( 'reset');
}
add_action( 'wp_enqueue_scripts', 'wp_style' );



function enqueue_font_awesome() {
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' );

}
add_action( 'wp_enqueue_scripts', 'enqueue_font_awesome' );


function bbx_images( $html ) { 
	$html = preg_replace( '/(width|height)="\d*"\s/', "", $html ); 
	return $html;
} 
add_filter( 'post_thumbnail_html', 'bbx_images', 10 );
add_filter( 'image_send_to_editor', 'bbx_images', 10 ); 
add_filter( 'wp_get_attachment_link', 'bbx_images', 10 );




function excerpt_home(){

$excerpt = get_the_content();
$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
$excerpt = strip_shortcodes($excerpt);
$excerpt = strip_tags($excerpt);
$excerpt = substr($excerpt, 0, 190);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
$excerpt = $excerpt.' [...]';
return $excerpt;
}

add_theme_support('post-thumbnails',array('post'));



function texte_commentaire($comment){
	return "<span class='texte_commentaire'>".$comment."</span>";
}
add_filter('comment_text', 'texte_commentaire',1000);

$now   = time();
$date2 = strtotime('2012-08-14 16:01:05');
 
function dateDiff($date1, $date2){
    $diff = abs($date1 - $date2);
    $retour = array();
 
    $tmp = $diff;
    $retour['second'] = $tmp % 60;
 
    $tmp = floor( ($tmp - $retour['second']) /60 );
    $retour['minute'] = $tmp % 60;
 
    $tmp = floor( ($tmp - $retour['minute'])/60 );
    $retour['hour'] = $tmp % 24;
 
    $tmp = floor( ($tmp - $retour['hour'])  /24 );
    $retour['day'] = $tmp;
 
    return $retour;
}

?>