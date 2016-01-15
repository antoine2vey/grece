
<?php
global $pinnacle; 
if(!pinnacle_hide_pagetitle()) { ?>
<?php } else { 
	if(is_shop()) {
		$shop_page_id	= woocommerce_get_page_id('shop');
		$bsub 			= get_post_meta( $shop_page_id, '_kad_subtitle', true );
	} else {
		$bsub 			= $description = apply_filters( 'the_content', term_description() );
		$bsub 			= strip_tags($bsub);
	}

?>
<div id="pageheader" class="titleclass">
<div class="header-color-overlay"></div>
	<div class="container">
		<div class="page-header">
			<div class="row">
				<div class="col-md-12">
				  	<h1 class="entry-title" itemprop="name headline"><?php woocommerce_page_title(); ?></h1>
					  <?php if(!empty($bsub)) { echo '<div class="subtitle"> '.esc_html($bsub).' </div>'; } ?>
				</div>
			</div>
		</div>
	</div><!--container-->
</div><!--titleclass-->
<?php } ?>