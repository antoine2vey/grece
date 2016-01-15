
<?php
	 if(!pinnacle_hide_pagetitle()) { ?>
<?php } else { 
	global $post, $pinnacle; 

		$bsub 				= get_post_meta( $post->ID, '_kad_subtitle', true );
		$post_header_title 	= get_post_meta( $post->ID, '_kad_post_header_title', true );

	if(!empty($post_header_title)) {
		$page_title_title = $post_header_title;
	} else {
		if(isset($pinnacle['single_product_header_title']) && $pinnacle['single_product_header_title'] == 'custom') {
			if(isset($pinnacle['product_header_title_text'])) {$page_title_title = $pinnacle['product_header_title_text']; 
		} else { 
			$page_title_title = '';
		}
		$bsub = $pinnacle['product_header_subtitle_text'];
	} else if (isset($pinnacle['single_product_header_title']) && $pinnacle['single_product_header_title'] == 'posttitle') {
		$page_title_title =  get_the_title();
	} else {
		if ( $terms = wp_get_post_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ) {
	        $main_term = $terms[0];
	        $page_title_title = $main_term->name;
	    } else {
	    	$shop_page_id = woocommerce_get_page_id( 'shop' );
	    	$shop_page = get_post( $shop_page_id );
	    	$page_title_title = $shop_page->post_title;
	    }
	}
}
?>
<div id="pageheader" class="titleclass">
<div class="header-color-overlay"></div>
	<div class="container">
		<div class="page-header">
			<div class="row">
				<div class="col-md-12">
				  	<h1 class="product_page_title entry-title" itemprop="name headline"><?php echo esc_html($page_title_title); ?></h1>
					  <?php if(!empty($bsub)) { echo '<p class="subtitle"> '.do_shortcode($bsub).' </p>'; } ?>
				</div>
			</div>
		</div>
	</div><!--container-->
</div><!--titleclass-->
<?php } ?>