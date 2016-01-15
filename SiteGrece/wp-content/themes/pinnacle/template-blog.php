<?php
/*
Template Name: Blog
*/
	get_header();
		get_template_part('templates/page', 'header'); ?>

			<div id="content" class="container">
   				<div class="row">

   				<?php global $post;
   				if(pinnacle_display_sidebar()) {
   					$display_sidebar = true; 
   					$fullclass 		 = '';
   				} else {
   					$display_sidebar = false; 
   					$fullclass = 'fullwidth';
   				}
   				if(get_post_meta( $post->ID, '_kad_blog_summery', true ) == 'full') {
   					$summery = 'full'; $postclass = "single-article fullpost";
   				} else {
   					$summery = 'normal'; $postclass = 'postlist';
   				} ?>
      
      				<div class="main <?php echo esc_attr( pinnacle_main_class() );?> <?php echo esc_attr($postclass) .' '. esc_attr($fullclass); ?>" role="main">
      					
      					<div class="entry-content" temprop="mainContentOfPage">
			      			<?php get_template_part('templates/content', 'page'); ?>
			      		</div>
		      		<?php
      					$blog_category 	= get_post_meta( $post->ID, '_kad_blog_cat', true ); 
						$blog_cat 		= get_term_by ('id',$blog_category,'category');
						$blog_items 	= get_post_meta( $post->ID, '_kad_blog_items', true ); 
						
						if($blog_category == '-1' || $blog_category == '') {
		      				$blog_cat_slug 	= '';
						} else {
							$blog_cat 		= get_term_by ('id',$blog_category,'category');
							$blog_cat_slug 	= $blog_cat -> slug;
						}

						if($blog_items == 'all') {
							$blog_items = '-1';
						} 

						$temp 	  = $wp_query; 
						$wp_query = null; 
						$wp_query = new WP_Query();
						$wp_query->query(array(
							'paged' 			=> $paged,
							'category_name'		=> $blog_cat_slug,
							'posts_per_page' 	=> $blog_items
						));
						
						if ( $wp_query ) : 
							while ( $wp_query->have_posts() ) : 
								$wp_query->the_post();
									
									if($summery == 'full') {
										if($display_sidebar){
											get_template_part('templates/content', 'fullpost'); 
										} else {
											get_template_part('templates/content', 'fullpostfull');
										}
									} else {
										if($display_sidebar){
									 	get_template_part('templates/content', get_post_format()); 
									 	} else {
								 			get_template_part('templates/content', 'fullwidth');
								 		}
									} 
		                    endwhile;

		                    else: ?>

								<li class="error-not-found">
									<?php _e('Sorry, no blog entries found.', 'pinnacle'); ?>
								</li>

							<?php endif; 

							if ($wp_query->max_num_pages > 1) :
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
							$wp_query = null; 
							$wp_query = $temp;
							wp_reset_query(); ?>
							<?php do_action('kt_after_pagecontent'); ?>
					</div><!-- /.main -->

					<?php get_sidebar(); ?>
    			</div><!-- /.row-->
    		</div><!-- /.content -->
  		</div><!-- /.wrap -->
  	<?php get_footer(); ?>