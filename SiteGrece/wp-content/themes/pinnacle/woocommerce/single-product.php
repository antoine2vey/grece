<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_header();
?>
	<?php get_template_part('templates/woo', 'product-header'); ?>

        <div id="content" class="container">
           	<div class="row">
              <div class="main <?php echo esc_attr( pinnacle_main_class() ); ?>" role="main">
          		<?php while ( have_posts() ) : the_post(); ?>

          			<?php woocommerce_get_template_part( 'content', 'single-product' ); ?>

          		<?php endwhile; // end of the loop. ?>

              </div>
              <?php get_sidebar(); ?>
            </div><!-- /.row-->
          </div><!-- /.content -->
      </div><!-- /.wrap -->
      <?php get_footer(); ?>