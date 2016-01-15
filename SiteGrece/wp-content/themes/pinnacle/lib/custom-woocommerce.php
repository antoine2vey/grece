<?php 
/*-----------------------------------------------------------------------------------*/
/* This theme supports WooCommerce */
/*-----------------------------------------------------------------------------------*/

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
  add_theme_support( 'woocommerce' );
}
/*-----------------------------------------------------------------------------------*/
/* WooCommerce Functions */
/*-----------------------------------------------------------------------------------*/

if (class_exists('woocommerce')) {
  add_filter( 'woocommerce_enqueue_styles', '__return_false' );
  // Disable WooCommerce Lightbox
  update_option( 'woocommerce_enable_lightbox', false );
    
}
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// Redefine woocommerce_output_related_products()
add_filter( 'woocommerce_output_related_products_args', 'pinnacle_woo_related_products_limit' );
  function pinnacle_woo_related_products_limit( $args ) {
  $args['posts_per_page'] = 4; // 4 related products
  $args['columns'] = 4; // arranged in 2 columns
  return $args;
}
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );

function pinnacle_woocommerce_output_upsells() {
  woocommerce_upsell_display( 4,4 ); 
}
add_action( 'woocommerce_after_single_product_summary', 'pinnacle_woocommerce_output_upsells', 15 );

function pinnacle_product_thumnbnail_image($html) {
    $html = str_replace('data-rel="prettyPhoto', 'data-rel="lightbox', $html);
    return $html;
}
add_filter( 'woocommerce_single_product_image_thumbnail_html', 'pinnacle_product_thumnbnail_image');

// Number of products per page
function pinnacle_products_per_page() {
    global $pinnacle;
    if ( isset( $pinnacle['products_per_page'] ) ) {
      return $pinnacle['products_per_page'];
    }
}
add_filter('loop_shop_per_page', 'pinnacle_products_per_page');

// Display product tabs?
add_action('wp_head','pinnacle_tab_check');
function pinnacle_tab_check() {
    global $pinnacle;
    if ( isset( $pinnacle[ 'product_tabs' ] ) && $pinnacle[ 'product_tabs' ] == "0" ) {
      remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
    }
}

// Display related products?
add_action('wp_head','pinnacle_related_products');
function pinnacle_related_products() {
    global $pinnacle;
    if ( isset( $pinnacle[ 'related_products' ] ) && $pinnacle[ 'related_products' ] == "0" ) {
      remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
    }
}

add_filter('loop_shop_columns', 'pinnacle_loop_columns');
  function pinnacle_loop_columns() {
    global $pinnacle;
    if(isset($pinnacle['product_shop_layout'])) {
      return $pinnacle['product_shop_layout'];
    } else {
      return 4;
    }
}

// Shop Pages
remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_show_product_loop_sale_flash', 5 );

if ( isset( $pinnacle['default_showproducttitle_inpost'] ) && $pinnacle['default_showproducttitle_inpost'] == 0 ) {
  remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
  add_action( 'woocommerce_single_product_summary', 'kt_hidden_woocommerce_template_single_title', 5 );

  function kt_hidden_woocommerce_template_single_title() {
    echo '<span itemprop="name" class="product_title kt_title_hidden entry-title">';
      the_title(); 
     echo '</span>';

  }
}

add_filter( 'add_to_cart_fragments', 'kt_get_refreshed_fragments' );
 function kt_get_refreshed_fragments($fragments) {
    // Get mini cart
    ob_start();

    woocommerce_mini_cart();

    $mini_cart = ob_get_clean();

    // Fragments and mini cart are returned
    $fragments['div.kt-header-mini-cart-refreash'] ='<div class="kt-header-mini-cart-refreash">' . $mini_cart . '</div>';

    return $fragments;

  }
  add_filter( 'add_to_cart_fragments', 'kt_get_refreshed_fragments_number' );
 function kt_get_refreshed_fragments_number($fragments) {
    global $woocommerce;
    // Get mini cart
    ob_start();

    ?><span class="kt-cart-total"><?php echo $woocommerce->cart->cart_contents_count; ?></span> <?php

    $fragments['span.kt-cart-total'] = ob_get_clean();

    return $fragments;

  }


remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'kt_woocommerce_template_loop_product_title', 10);
function kt_woocommerce_template_loop_product_title() {
  echo '<h5>'.get_the_title().'</h5>';
}


remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 10 );
remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );
add_action( 'woocommerce_single_variation', 'kt_woocommerce_single_variation', 10 );
add_action( 'woocommerce_single_variation', 'kt_woocommerce_single_variation_add_to_cart_button', 20 );

if ( ! function_exists( 'kt_woocommerce_single_variation_add_to_cart_button' ) ) {
  /**
   * Output the add to cart button for variations.
   */
  function kt_woocommerce_single_variation_add_to_cart_button() {
    global $product;
    ?>
    <div class="variations_button">
      <?php woocommerce_quantity_input( array( 'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1 ) ); ?>
      <button type="submit" class="kad_add_to_cart headerfont kad-btn kad-btn-primary single_add_to_cart_button"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
      <input type="hidden" name="add-to-cart" value="<?php echo absint( $product->id ); ?>" />
      <input type="hidden" name="product_id" value="<?php echo absint( $product->id ); ?>" />
      <input type="hidden" name="variation_id" class="variation_id" value="" />
    </div>
    <?php
  }
}

if ( ! function_exists( 'kt_woocommerce_single_variation' ) ) {
  /**
   * Output placeholders for the single variation.
   */
  function kt_woocommerce_single_variation() {
    echo '<div class="single_variation headerfont"></div>';
  }
}


// Shop Page Image
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'kt_woocommerce_template_loop_product_thumbnail', 10 );
function kt_woocommerce_template_loop_product_thumbnail() {
  global $pinnacle, $woocommerce_loop, $post;

  // Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
  $woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

$product_column = $woocommerce_loop['columns']; 
  if ($product_column == '3'){
    $productimgwidth = 400;
  } else if ($product_column == '5'){
    $productimgwidth = 240;
  } else {
    $productimgwidth = 300;
  }

  if(isset($pinnacle['product_img_resize']) && $pinnacle['product_img_resize'] == 0) {
    $resizeimage = 0;
  } else {
    $resizeimage = 1;
    $productimgheight = $productimgwidth;
  }

    if ( $resizeimage == 1 ) {
        echo '<div class="kad-product-noflipper">';
          if ( has_post_thumbnail() ) {
            $product_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
            $product_image_url = $product_image[0]; 
            $image_product = aq_resize($product_image_url, $productimgwidth, $productimgheight, true);
                  if(empty($image_product)) {$image_product = $product_image_url;} ?> 
                  <img width="<?php echo esc_attr($productimgwidth);?>" height="<?php echo esc_attr($productimgheight);?>" src="<?php echo esc_attr($image_product);?>" class="attachment-shop_catalog wp-post-image" alt="<?php the_title();?>">
                <?php }
              echo '</div>';
      } else { 
        echo '<div class="kad-woo-image-size">';
        echo woocommerce_template_loop_product_thumbnail();
        echo '</div>';
          } 
  }


remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 5 );

remove_action( 'woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10 );


remove_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10 );
add_action( 'woocommerce_shop_loop_subcategory_title', 'kt_woocommerce_template_loop_category_title', 10 );

 function kt_woocommerce_template_loop_category_title( $category ) {
        ?>
        <h5>
            <?php
                echo $category->name;

                if ( $category->count > 0 )
                    echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">(' . $category->count . ')</mark>', $category );
            ?>
        </h5>
        <?php
    }


remove_action( 'woocommerce_before_subcategory', 'woocommerce_template_loop_category_link_open', 10 );
remove_action( 'woocommerce_after_subcategory', 'woocommerce_template_loop_category_link_close', 10 );
add_action( 'woocommerce_before_subcategory', 'kt_woocommerce_template_loop_category_link_open', 10 );
add_action( 'woocommerce_after_subcategory', 'kt_woocommerce_template_loop_category_link_close', 10 );

function kt_woocommerce_template_loop_category_link_open( $category ) {
    echo '<a href="' . get_term_link( $category->slug, 'product_cat' ) . '">';
}
function kt_woocommerce_template_loop_category_link_close() {
    echo '</a>';
}

