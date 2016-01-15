<?php
/**
 * Setup theme functions for Melos.
 *
 * @package ThinkUpThemes
 */

// Declare latest theme version
$GLOBALS['thinkup_theme_version'] = '1.0.6';

// Setup content width 
if ( ! isset( $content_width ) )
	$content_width = 1170;

//----------------------------------------------------------------------------------
//	Add Theme Options Panel & Assign Variable Values
//----------------------------------------------------------------------------------

	// Add Redux Framework
	require_once( get_template_directory() . '/admin/main/framework.php' );
	require_once( get_template_directory() . '/admin/main/options.php' );

	// Load Theme Variables.
	require_once( get_template_directory() . '/admin/main/options/00.variables.php' ); 

	// Add Theme Options Features.
	require_once( get_template_directory() . '/admin/main/options/00.theme-setup.php' ); 
	require_once( get_template_directory() . '/admin/main/options/01.general-settings.php' ); 
	require_once( get_template_directory() . '/admin/main/options/02.homepage.php' ); 
	require_once( get_template_directory() . '/admin/main/options/03.header.php' ); 
	require_once( get_template_directory() . '/admin/main/options/04.footer.php' );
	require_once( get_template_directory() . '/admin/main/options/05.blog.php' ); 

//----------------------------------------------------------------------------------
//	Assign Theme Specific Functions
//----------------------------------------------------------------------------------

// Setup theme features, register menus and scripts.
if ( ! function_exists( 'thinkup_themesetup' ) ) {

	function thinkup_themesetup() {

		// Load required files
		require_once ( get_template_directory() . '/lib/functions/extras.php' );
		require_once ( get_template_directory() . '/lib/functions/template-tags.php' );

		// Make theme translation ready.
		load_theme_textdomain( 'melos', get_template_directory() . '/languages' );

		// Add default theme functions.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-formats', array( 'gallery', 'image', 'video', 'audio', 'status', 'quote', 'link', 'chat' ) );
		add_theme_support( 'custom-background' );

		// Add support for custom header
		$args = apply_filters( 'custom-header', array( 'height' => 200, 'width'  => 1600 ) );
		add_theme_support( 'custom-header', $args );

		// Add WooCommerce functions.
		add_theme_support( 'woocommerce' );

		// Add excerpt support to pages.
		add_post_type_support( 'page', 'excerpt' );

		// Register theme menu's.
		register_nav_menus( array( 'pre_header_menu' => 'Pre Header Menu', ) );
		register_nav_menus( array( 'header_menu' => 'Primary Header Menu', ) );
		register_nav_menus( array( 'sub_footer_menu' => 'Footer Menu', ) );
	}
}
add_action( 'after_setup_theme', 'thinkup_themesetup' );


//----------------------------------------------------------------------------------
//	Register Front-End Styles And Scripts
//----------------------------------------------------------------------------------

function thinkup_frontscripts() {

	global $thinkup_theme_version;

	// Add jQuery library.
	wp_enqueue_script('jquery');

	// Register theme stylesheets.
	wp_register_style( 'thinkup-responsive', get_template_directory_uri() . '/styles/style-responsive.css', '', $thinkup_theme_version );

	// Add theme stylesheets.
	wp_enqueue_style( 'thinkup-bootstrap', get_template_directory_uri() . '/lib/extentions/bootstrap/css/bootstrap.min.css', '', '2.3.2' );
	wp_enqueue_style( 'thinkup-prettyPhoto', get_template_directory_uri() . '/lib/extentions/prettyPhoto/css/prettyPhoto.css', '', '3.1.6' );
	wp_enqueue_style( 'thinkup-shortcodes', get_template_directory_uri() . '/styles/style-shortcodes.css', '', $thinkup_theme_version );
	wp_enqueue_style( 'thinkup-style', get_stylesheet_uri(), '', $thinkup_theme_version );

	// Add Font Packages.
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/lib/extentions/font-awesome/css/font-awesome.css', '', '4.2.0' );

	// Add theme scripts
	wp_enqueue_script( 'thinkup-imagesloaded', get_template_directory_uri() . '/lib/scripts/plugins/imagesloaded/imagesloaded.js', array( 'jquery' ), '1.3.4', true );	
	wp_enqueue_script( 'thinkup-prettyPhoto', ( get_template_directory_uri().'/lib/extentions/prettyPhoto/js/jquery.prettyPhoto.js' ), array( 'jquery' ), '3.1.6', 'true' );
	wp_enqueue_script( 'thinkup-frontend', get_template_directory_uri() . '/lib/scripts/main-frontend.js', array( 'jquery' ), '1.1', 'true'  );
	wp_enqueue_script( 'thinkup-bootstrap', get_template_directory_uri() . '/lib/extentions/bootstrap/js/bootstrap.js', array( 'jquery' ), '2.3.2', 'true'  );
	wp_enqueue_script( 'thinkup-modernizr', get_template_directory_uri() . '/lib/scripts/modernizr.js', array( 'jquery' ), '2.6.2', 'true'  );

	// Register Retina script - Enqueued in 01.general-settings.php
	wp_register_script( 'thinkup-retina', get_template_directory_uri() . '/lib/scripts/retina.js', array( 'jquery' ), '0.0.2', '', true );

	// Add ScrollUp script and style
	wp_enqueue_script( 'thinkup-scrollup', get_template_directory_uri() . '/lib/scripts/plugins/scrollup/jquery.scrollUp.min.js', array( 'jquery' ), '2.3.3', 'true'  );

	// Add Masonry scripts to Blog & Testimonials pag
	if ( thinkup_check_isblog() ) {
		wp_enqueue_script( 'jquery-masonry' );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Add ThinkUpSlider scripts
	if ( is_front_page() or thinkup_check_ishome() ) {
		wp_enqueue_script( 'thinkup-slider', get_template_directory_uri() . '/lib/scripts/plugins/ResponsiveSlides/responsiveslides.min.js', array( 'jquery' ), '1.54', 'true' );
		wp_enqueue_script( 'thinkup-slider-call', get_template_directory_uri() . '/lib/scripts/plugins/ResponsiveSlides/responsiveslides-call.js', array( 'jquery' ), $thinkup_theme_version, 'true' );
	}
}
add_action( 'wp_enqueue_scripts', 'thinkup_frontscripts', 10 );


//----------------------------------------------------------------------------------
//	Register Back-End Styles And Scripts
//----------------------------------------------------------------------------------

function thinkup_adminscripts() {

	global $thinkup_theme_version;

	// Register theme stylesheets.
	wp_register_style( 'thinkup-backend', get_template_directory_uri() . '/styles/backend/style-backend.css', '', $thinkup_theme_version );
	wp_register_style( 'font-awesome', get_template_directory_uri() . '/lib/extentions/font-awesome/css/font-awesome.css', '', '4.2.0' );

	// Register theme scripts.
	wp_register_script( 'thinkup-backend', get_template_directory_uri() . '/lib/scripts/main-backend.js', array( 'jquery' ), $thinkup_theme_version );

		// Add theme stylesheets.
		wp_enqueue_style( 'thinkup-backend' );

		// Add theme scripts.
		wp_enqueue_script( 'thinkup-backend' );
}
add_action( 'admin_enqueue_scripts', 'thinkup_adminscripts' );


//----------------------------------------------------------------------------------
//	Register Theme Widgets
//----------------------------------------------------------------------------------

function thinkup_widgets_init() {

	// Register default sidebar
	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sidebar-1',
		'before_widget' => '<aside class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Register footer sidebars
    register_sidebar( array(
        'name' => 'Footer Column 1',
        'id' => 'footer-w1',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="footer-widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
 
    register_sidebar( array(
        'name' => 'Footer Column 2',
        'id' => 'footer-w2',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="footer-widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => 'Footer Column 3',
        'id' => 'footer-w3',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="footer-widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => 'Footer Column 4',
        'id' => 'footer-w4',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="footer-widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => 'Footer Column 5',
        'id' => 'footer-w5',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="footer-widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => 'Footer Column 6',
        'id' => 'footer-w6',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="footer-widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

	// Register sub-footer sidebars
    register_sidebar( array(
        'name' => 'Sub-Footer Column 1',
        'id' => 'sub-footer-w1',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="sub-footer-widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => 'Sub-Footer Column 2',
        'id' => 'sub-footer-w2',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="sub-footer-widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
}
add_action( 'widgets_init', 'thinkup_widgets_init' );