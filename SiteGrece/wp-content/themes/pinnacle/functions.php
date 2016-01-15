<?php
function pinnacle_lang_setup() {
load_theme_textdomain('pinnacle', get_template_directory() . '/languages');
}
add_action( 'after_setup_theme', 'pinnacle_lang_setup' );

/*
 * Init Customizer Options
 */
require_once locate_template('/themeoptions/redux/framework.php');          			// Customizer framework
require_once locate_template('/themeoptions/theme_options.php');          				// Customizer framework
require_once locate_template('/themeoptions/options_assets/pinnacle_extension.php'); 	// Customizer framework

/*
 * Init Theme Startup/Core utilities
 */
require_once locate_template('/lib/utils.php');           								// Utility functions
require_once locate_template('/lib/init.php');            								// Initial theme setup and constants
require_once locate_template('/lib/aq_resizer.php');      								// Resize on the fly
require_once locate_template('/lib/sidebar.php');         								// Sidebar class
require_once locate_template('/lib/config.php');          								// Configuration
require_once locate_template('/lib/cleanup.php');        								// Cleanup
require_once locate_template('/lib/nav.php');            								// Custom nav modifications
require_once locate_template('/lib/custom.php');          								// Custom functions
require_once locate_template('/lib/metaboxes.php');     								// Custom metaboxes
require_once locate_template('/lib/plugin-activate.php');   							// Plugin Activation

/*
 * Init Widget areas
 */
require_once locate_template('/lib/widgets.php');         								// Sidebars and widgets

/*
 * Template Hooks
 */
require_once locate_template('/lib/comments.php');        								// Custom comments modifications
require_once locate_template('/lib/authorbox.php');         							// Author box
require_once locate_template('/lib/custom-woocommerce.php'); 							// Woocommerce functions
require_once locate_template('/lib/template-actions.php');         					    // Template actions

/*
 * Load Scripts
 */
require_once locate_template('/lib/admin_scripts.php');    								// Admin Scripts functions
require_once locate_template('/lib/scripts.php');        								// Scripts and stylesheets
require_once locate_template('/lib/output_css.php'); 									// Fontend Custom CSS

