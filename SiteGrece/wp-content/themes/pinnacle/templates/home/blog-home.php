<div class="home_blog home-margin clearfix home-padding">
	<?php global $pinnacle, $postcolumn; 
		if(isset($pinnacle['blog_title']) && !empty($pinnacle['blog_title'])) {
			$blog_title = $pinnacle['blog_title'];
		} else {
			$blog_title = __('Latest from the Blog', 'pinnacle');
		} ?>
		<div class="clearfix">
			<h3 class="hometitle"><?php echo esc_html($blog_title);?></h3>
		</div>
		<div id="kad-blog-grid" class="rowtight init-masonry" data-masonry-selector=".b_item">
		<?php if(isset($pinnacle['home_post_count'])) { 
			$blogcount = $pinnacle['home_post_count'];
		} else { 
			$blogcount = '3';
		} 
		if(isset($pinnacle['home_post_column'])) {
			$blog_grid_column = $pinnacle['home_post_column'];
		} else {
			$blog_grid_column ="3";
		}
		if ($blog_grid_column == '2') {
			$itemsize = 'tcol-md-6 tcol-sm-6 tcol-xs-12 tcol-ss-12'; 
			$postcolumn = '2';
		} else if ($blog_grid_column == '3'){
			$itemsize = 'tcol-md-4 tcol-sm-4 tcol-xs-6 tcol-ss-12'; 
			$postcolumn = '3';
		} else {
			$itemsize = 'tcol-md-3 tcol-sm-4 tcol-xs-6 tcol-ss-12';
			$postcolumn = '4';
		}
		if(!empty($pinnacle['home_post_type'])) { 
			$blog_cat = get_term_by ('id',$pinnacle['home_post_type'],'category');
			$blog_cat_slug = $blog_cat -> slug;
		} else {
			$blog_cat_slug = '';
		}
			$temp 	  = $wp_query; 
			$wp_query = null; 
			$wp_query = new WP_Query();
			$wp_query->query(array(
				'posts_per_page' => $blogcount,
				'category_name'=> $blog_cat_slug
				)
			);
			if ( $wp_query ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
				<div class="<?php echo esc_attr($itemsize);?> b_item kad_blog_item">
					<?php get_template_part('templates/content', 'post-grid');?>
				</div>
            <?php endwhile; else: ?>
					<li class="error-not-found"><?php _e('Sorry, no blog entries found.', 'pinnacle');?></li>
			<?php endif; ?>
			<?php $wp_query = null; 
			$wp_query = $temp;
			wp_reset_query(); ?>
		</div>
</div> <!--home-blog -->