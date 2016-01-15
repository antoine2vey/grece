<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<form role="search" method="get" id="searchform" class="form-search woocommerce-product-search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
	<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="search-query" placeholder="<?php _e( 'Search for products', 'pinnacle' ); ?>" />
	<button type="submit" id="searchsubmit" class="search-icon"><i class="icon-search"></i></button>
	<input type="hidden" name="post_type" value="product" />
</form>