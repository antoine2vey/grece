<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


global $product, $woocommerce_loop, $pinnacle, $post;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

$product_column = $woocommerce_loop['columns']; 
	if ($product_column == '3'){
		$itemsize = 'tcol-md-4 tcol-sm-4 tcol-xs-6 tcol-ss-12'; 
	} else if ($product_column == '5'){
		$itemsize = 'tcol-md-25 tcol-sm-3 tcol-xs-4 tcol-ss-6'; 
	} else {
		$itemsize = 'tcol-md-3 tcol-sm-4 tcol-xs-6 tcol-ss-12';
	}

	// Extra post classes
	$classes = array();
	if(isset($pinnacle['shop_hide_action']) && $pinnacle['shop_hide_action'] == 1) {
		$classes[] = 'hidetheaction';
	}
	$classes[] = 'grid_item';
	$classes[] = 'product_item';
	$classes[] = 'clearfix';
	$classes[] = 'postclass';
	$classes[] = 'kad_product_fade_in';
?>
<div class="<?php echo esc_attr($itemsize);?> kad_product">
	<div <?php post_class( $classes ); ?>>

	<?php 	/**
			 * woocommerce_before_shop_loop_item hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 5
			 * @hooked woocommerce_template_loop_product_link_open - 10 (THEME UNHOOKS)
			 */
			do_action( 'woocommerce_before_shop_loop_item' ); 

			?>
			<a href="<?php the_permalink(); ?>" class="product_item_link product_img_link">

			<?php 
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' ); ?> 

	         	<div class="kad-action-case"></div>
	            </a>
		    <div class="product_details_case clearfix">
				<div class="product_details">
					<a href="<?php the_permalink(); ?>" class="product_item_link product_title_link">
			<?php 
				/**
			 	* woocommerce_shop_loop_item_title hook
			 	*
			 	* @hooked woocommerce_template_loop_product_title - 10
			 	*/
				do_action( 'woocommerce_shop_loop_item_title' );
				?>
					</a>
					<?php if ( apply_filters( 'kadence_product_archive_excerpt', true ) ) : ?>
						<div class="product_excerpt">
							<?php
							if ($post->post_excerpt){
								echo apply_filters( 'archive_woocommerce_short_description', $post->post_excerpt );
							} else {
								the_excerpt();
							} ?>
						</div>
					<?php endif; ?>
				</div>
		
			<?php
				/**
				 * woocommerce_after_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_template_loop_product_link_close - 5
				 * @hooked woocommerce_template_loop_add_to_cart - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item_title' );
			?>
			</div>

	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>

	</div>
</div>