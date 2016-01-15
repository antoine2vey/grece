 <?php if (pinnacle_display_sidebar()) : ?>
      <aside class="<?php echo pinnacle_sidebar_class(); ?>" role="complementary">
        	<div class="sidebar">
			<?php if(is_front_page()) {
					global $pinnacle; $sidebar = $pinnacle['home_sidebar'];
					if (!empty($sidebar)) {
						dynamic_sidebar($sidebar);
					} else  {
						dynamic_sidebar('sidebar-primary');
					} 
			} elseif( class_exists('woocommerce') and (is_shop())) {
				global $pinnacle; $sidebar = $pinnacle['shop_sidebar'];
	 			if (!empty($sidebar)) {
					dynamic_sidebar($sidebar);
				} else  {
					dynamic_sidebar('sidebar-primary');
				} 
			} elseif( class_exists('woocommerce') and (is_product_category() || is_product_tag())) {
				global $pinnacle; $sidebar = $pinnacle['shop_cat_sidebar'];
	 			if (!empty($sidebar)) {
					dynamic_sidebar($sidebar);
				} else {
					dynamic_sidebar('sidebar-primary');
				} 
			} elseif( class_exists('woocommerce') and (is_account_page())) {
				    get_template_part('templates/account', 'sidebar');
			} elseif(is_page() || is_single() ) {
				global $post; $sidebar = get_post_meta( $post->ID, '_kad_sidebar_choice', true ); 
		 		if (!empty($sidebar)) {
						dynamic_sidebar($sidebar);
				} else {
						dynamic_sidebar('sidebar-primary');
				} 
			} elseif (is_archive()) {
				global $pinnacle; 
				if(isset($pinnacle['blog_cat_sidebar'])) {
					dynamic_sidebar($pinnacle['blog_cat_sidebar']);
				} else  {
					dynamic_sidebar('sidebar-primary');
				} 
			} elseif(is_category()) {
				global $pinnacle; 
				if(isset($pinnacle['blog_cat_sidebar'])) {
					dynamic_sidebar($pinnacle['blog_cat_sidebar']);
				} else  {
					dynamic_sidebar('sidebar-primary');
				} 
			} elseif (is_tag()) {
				dynamic_sidebar('sidebar-primary');
			} elseif (is_post_type_archive()) {
				dynamic_sidebar('sidebar-primary');
			} elseif (is_day()) {
				 dynamic_sidebar('sidebar-primary');
			} elseif (is_month()) {
				 dynamic_sidebar('sidebar-primary');
			} elseif (is_year()) {
				 dynamic_sidebar('sidebar-primary');
			} elseif (is_author()) {
				 dynamic_sidebar('sidebar-primary');
			} elseif (is_search()) {
				global $pinnacle; 
				if(isset($pinnacle['search_sidebar'])) {
					dynamic_sidebar($pinnacle['search_sidebar']);
				} else  {
					dynamic_sidebar('sidebar-primary');
				} 
			} else {
				dynamic_sidebar('sidebar-primary');
			} ?>
        </div><!-- /.sidebar -->
    </aside><!-- /aside -->
<?php endif; ?>