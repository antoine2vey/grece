    <div id="blog_carousel_container" class="carousel_outerrim">
        <?php global $post; $text = get_post_meta( $post->ID, '_kad_blog_carousel_title', true ); 
        	if(!empty($text)) { 
        		echo '<h3 class="sectiontitle">'.esc_html($text).'</h3>'; 
        	} else {
    			echo '<h3 class="sectiontitle">'.__('Similar Posts', 'pinnacle').'</h3>';
    		} ?>
    		<?php if (pinnacle_display_sidebar()) {
            		$itemsize = 'tcol-md-4 tcol-sm-4 tcol-xs-6 tcol-ss-12'; 
            		$md = 3; 
            		$sm = 3; 
            		$xs = 2; 
            		$ss = 1; 
            	} else {
            		$itemsize = 'tcol-md-3 tcol-sm-3 tcol-xs-4 tcol-ss-12'; 
            		$md = 4; 
            		$sm = 3; 
            		$xs = 2; 
            		$ss = 1;
            	} ?>
            <div class="blog-carouselcase fredcarousel">
				<div id="carouselcontainer-blog" class="rowtight">
    				<div id="blog_carousel" class="blog_carousel initcaroufedsel clearfix" data-carousel-container="#carouselcontainer-blog" data-carousel-transition="300" data-carousel-scroll="items:1" data-carousel-auto="true" data-carousel-speed="9000" data-carousel-id="blog" data-carousel-md="<?php echo esc_attr($md);?>" data-carousel-sm="<?php echo esc_attr($sm);?>" data-carousel-xs="<?php echo esc_attr($xs);?>" data-carousel-ss="<?php echo esc_attr($ss);?>">
      					<?php $categories = get_the_category($post->ID);
							if ($categories) {
							$category_ids = array();
								foreach($categories as $individual_category) {
									$category_ids[] = $individual_category->term_id;
								} 
							}
							$temp 	  = $wp_query; 
						  	$wp_query = null; 
						  	$wp_query = new WP_Query();
						  	$wp_query->query(array(
						  		'category__in'   => $category_ids,
						  		'orderby' 		 => 'rand',
						  		'post__not_in'	 => array($post->ID),
						  		'posts_per_page' =>6
						  		));
							if ( $wp_query ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
			                	<div class="<?php echo esc_attr($itemsize);?> b_item kad_blog_item">
										<?php get_template_part('templates/content', 'post-grid-carousel');?>
								</div>
							<?php endwhile; else: ?>
								<li class="error-not-found"><?php _e('Sorry, no blog entries found.', 'pinnacle'); ?></li>
							<?php endif; 
								$wp_query = null; 
							  	$wp_query = $temp;  // Reset
								wp_reset_query(); ?>								
					</div>
     				<div class="clearfix"></div>
		            <a id="prevport-blog" class="prev_carousel icon-angle-left" href="#"></a>
					<a id="nextport-blog" class="next_carousel icon-angle-right" href="#"></a>
            	</div>
        	</div>
	</div><!-- blog_carousel_container-->				