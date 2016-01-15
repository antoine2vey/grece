<?php
/**
 * Product loop sale flash
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product, $pinnacle;
if ($product->is_on_sale()) { ?>
  	<?php $sale_text = __( 'Sale!', 'pinnacle'); ?>
	<?php echo apply_filters('woocommerce_sale_flash', '<span class="onsale bg_primary headerfont">'.$sale_text.'</span>', $post, $product); ?>
<?php } ?>