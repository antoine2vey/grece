<?php
/*
Template Name: Blog Grid
*/
?>
	<?php get_header(); ?>
		
		<?php get_template_part('templates/page', 'header'); ?>
		<div id="content" class="container">
   			<div class="row">
   				<?php global $post, $postcolumn;
		   			$blog_grid_column 	= get_post_meta( $post->ID, '_kad_blog_columns', true );
		   			$blog_category 		= get_post_meta( $post->ID, '_kad_blog_cat', true );
		   			$blog_items         = get_post_meta( $post->ID, '_kad_blog_items', true );  

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

					$blog_cat = get_term_by ('id',$blog_category,'category');
					if($blog_category == '-1' || $blog_category == '') {
      					$blog_cat_slug = '';
					} else {
						$blog_cat = get_term_by ('id',$blog_category,'category');
						$blog_cat_slug = $blog_cat -> slug;
					}
					if($blog_items == 'all'){
						$blog_items = '-1';
					} ?>

		      	<div class="main <?php echo esc_attr( pinnacle_main_class() );?>" role="main">
		      		<div class="entry-content" temprop="mainContentOfPage">
		      		<?php get_template_part('templates/content', 'page'); ?>
		      		</div>

		      		<div id="kad-blog-grid" class="rowtight init-masonry" data-masonry-selector=".b_item">
		      		<?php   $temp 	  = $wp_query; 
							$wp_query = null; 
							$wp_query = new WP_Query();
							$wp_query->query(array(
									'paged' 			=> $paged,
									'category_name'		=> $blog_cat_slug,
									'posts_per_page' 	=> $blog_items
								));
							
							if ( $wp_query ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
								
								<div class="<?php echo esc_attr($itemsize);?> b_item kad_blog_item">
									<?php get_template_part('templates/content', 'post-grid');?>
								</div>

							<?php endwhile; else: ?>
								<li class="error-not-found"><?php _e('Sorry, no blog entries found.', 'pinnacle'); ?></li>
							<?php endif; ?>

                	</div> <!-- Blog Grid -->

					<?php if ($wp_query->max_num_pages > 1) :
							if(function_exists('pinnacle_wp_pagination')) {
		        				pinnacle_wp_pagination();  
		        			} else { ?>      
						        <nav class="post-nav">
					                <ul class="pager">
					                  <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'pinnacle')); ?></li>
					                  <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'pinnacle')); ?></li>
					                </ul>
					            </nav>
	        		<?php } 
					endif; 
					$wp_query = null; $wp_query = $temp;
					wp_reset_query(); ?>
					<?php do_action('kt_after_pagecontent'); ?>
				</div><!-- /.main -->
				<?php get_sidebar(); ?>
      		</div><!-- /.row-->
    	</div><!-- /.content -->
  	</div><!-- /.wrap -->
 	<?php get_footer(); ?>