<?php
	 if(!pinnacle_hide_pagetitle()) {
	 	//empty
 	} else { 
	global $post, $pinnacle;

		$bsub 				= get_post_meta( $post->ID, '_kad_subtitle', true );
		$post_header_title 	= get_post_meta( $post->ID, '_kad_post_header_title', true );

		if(!empty($post_header_title)) {
			$page_title_title = $post_header_title;
		} else {
			if(isset($pinnacle['single_portfolio_header_title']) && $pinnacle['single_portfolio_header_title'] == 'custom') {
				if(isset($pinnacle['portfolio_header_title_text'])) {
					$page_title_title = $pinnacle['portfolio_header_title_text']; 
				} else {
					$page_title_title = '';
				}
				$bsub = $pinnacle['portfolio_header_subtitle_text'];
			} else if (isset($pinnacle['single_portfolio_header_title']) && $pinnacle['single_portfolio_header_title'] == 'posttitle') {
				$page_title_title =  get_the_title();
			} else {
				if ( $terms = wp_get_post_terms( $post->ID, 'portfolio-type', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ) {
	              $cat = $terms[0];
	              $page_title_title = $cat->name;
	            } else {
	            	$page_title_title = '';
	            }
			}
		} ?>
<div id="pageheader" class="titleclass">
<div class="header-color-overlay"></div>
	<div class="container">
		<div class="page-header">
			<div class="row">
				<div class="col-md-12">
				  	<h1 class="product_page_title entry-title"><?php echo esc_html($page_title_title); ?></h1>
					  <?php if(!empty($bsub)) { echo '<p class="subtitle"> '.do_shortcode($bsub).' </p>'; } ?>
					  	<?php if(isset($pinnacle['portfolio_header_nav']) && $pinnacle['portfolio_header_nav'] == '1') { ?>
					  		<div class="portfolionav">
				   			<?php pinnacle_previous_post_link_plus( array('order_by' => 'menu_order', 'loop' => true, 'in_same_tax' => false, 'format' => '%link', 'link' => '<i class="icon-angle-left"></i>') );
				   				$parent_link = get_post_meta( $post->ID, '_kad_portfolio_parent', true ); 
				   				if(!empty($parent_link) && ($parent_link != 'default')) {
				   					$parent_id = $parent_link;
				   				} else {
				   					$parent_id = $pinnacle['portfolio_link'];
				   				}
				   			if( !empty($parent_id)){ ?>
				   				<a href="<?php echo esc_attr(get_page_link($parent_id)); ?>"><i class="icon-th-large"></i></a> 
				   			<?php }
					   		pinnacle_next_post_link_plus( array('order_by' => 'menu_order', 'loop' => true, 'in_same_tax' => false, 'format' => '%link', 'link' => '<i class="icon-angle-right"></i>') ); ?>
					   		</div>
					   	<?php } ?>
				</div>
			</div>
		</div>
	</div><!--container-->
</div><!--titleclass-->

<?php } ?>