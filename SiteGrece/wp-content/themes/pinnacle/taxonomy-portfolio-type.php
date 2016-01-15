	<?php get_header(); ?>
		
		<?php get_template_part('templates/page', 'header'); ?>
		
		<?php global $pinnacle;
		
		if(isset($pinnacle['portfolio_style_default'])) {
		    $pstyleclass = $pinnacle['portfolio_style_default'];
		} else {
		   	$pstyleclass = 'padded_style';
		}
		if(isset($pinnacle['portfolio_ratio_default'])) {
            $pimgratio = $pinnacle['portfolio_ratio_default'];
        } else {
            $pimgratio = "square";
        }
        if(isset($pinnacle['portfolio_hover_style_default'])) {
		    $phoverstyleclass = $pinnacle['portfolio_hover_style_default'];
		} else {
		    $phoverstyleclass = 'p_lightstyle';
		}
		if(!empty($pinnacle['portfolio_tax_column'])) {
		 	$portfolio_column = $pinnacle['portfolio_tax_column'];
		 } else {
		 	$portfolio_column = 4;
		 }
		    
		    if ($portfolio_column == '2') {
		    	$itemsize = 'tcol-md-6 tcol-sm-6 tcol-xs-12 tcol-ss-12'; 
		    	$slidewidth = 600;
		    } else if ($portfolio_column == '3'){
		    	$itemsize = 'tcol-md-4 tcol-sm-4 tcol-xs-6 tcol-ss-12'; 
		    	$slidewidth = 400;
		    } else if ($portfolio_column == '6'){
		    	$itemsize = 'tcol-md-2 tcol-sm-3 tcol-xs-4 tcol-ss-6';
		    	$slidewidth = 300; 
		    } else if ($portfolio_column == '5'){
		    	$itemsize = 'tcol-md-25 tcol-sm-3 tcol-xs-4 tcol-ss-6'; 
		    	$slidewidth = 300;
		    } else {
		    	$itemsize = 'tcol-md-3 tcol-sm-4 tcol-xs-6 tcol-ss-12'; 
		    	$slidewidth = 300;
		    }
		    
		    if($pimgratio == 'portrait') {
				$temppimgheight = $slidewidth * 1.35;
				$slideheight = floor($temppimgheight);
			} else if($pimgratio == 'landscape') {
				$temppimgheight = $slidewidth / 1.35;
				$slideheight = floor($temppimgheight);
			} else if($pimgratio == 'widelandscape') {
				$temppimgheight = $slidewidth / 2;
				$slideheight = floor($temppimgheight);
			} else {
				$slideheight = $slidewidth;
			}
			$showexcerpt = false; 
			$plb = false; 
			$portfolio_item_types = true;
		    ?> 
		        <div id="content" class="container">
   					<div class="row">
      					<div class="main <?php echo esc_attr( pinnacle_main_class() ); ?>" role="main">
					      	<?php echo category_description(); ?> 
					      	<?php if (!have_posts()) : ?>
								<div class="alert">
								    <?php _e('Sorry, no results were found.', 'virtue'); ?>
								</div>
		  						<?php get_search_form(); ?>
							<?php endif; ?>

							<div id="portfoliowrapper" class="rowtight <?php echo esc_attr($pstyleclass);?> <?php echo esc_attr($phoverstyleclass);?>"> 
								<?php global $wp_query;
								$cat_obj = $wp_query->get_queried_object();
							 	$termslug = $cat_obj->slug;
								query_posts(array( 
									'paged'  			=> $paged,
									'posts_per_page'	=> '12',
									'orderby' 			=> 'menu_order',
									'order' 			=> 'ASC',
									'post_type' 		=> 'portfolio',
									'portfolio-type'	=> $termslug
									) 
								);
							 	while (have_posts()) : the_post(); ?>
									
								<div class="<?php echo esc_attr($itemsize);?> p-item">
					                <div class="portfolio-item grid_item postclass kad-light-gallery kad_portfolio_fade_in">
                       				<?php if (has_post_thumbnail( $post->ID ) ) { 
                       					$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
										$thumbnailURL = $image_url[0]; 
									 	$image = aq_resize($thumbnailURL, $slidewidth, $slideheight, true);
										if(empty($image)) {$image = $thumbnailURL;} ?>

										<div class="portfolio-imagepadding">
											<div class="portfolio-hoverclass">
												<a href="<?php the_permalink() ?>" class="">
			                                       <img src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>" class="kad-lightboxhover">
			                                       <div class="portfolio-hoverover"></div>
			                                       <div class="portfolio-table">
			                                       		<div class="portfolio-cell">
			                                       			<?php if($pstyleclass == "padded_style" ) { ?>
				                                       			<a href="<?php the_permalink() ?>" class="kad-btn kad-btn-primary"><?php echo __('View details', 'pinnacle');?></a>
				                                       			<?php if($plb) {?>
				                                       				<a href="<?php echo esc_url($thumbnailURL); ?>" class="kad-btn kad-btn-primary plightbox-btn" title="<?php the_title();?>" data-rel="lightbox"><i class="kt-icon-search4"></i></a>
				                                       			<?php } ?>
				                                       		<?php } elseif($pstyleclass == "flat-no-margin" || $pstyleclass == "flat-w-margin" ) { ?>
				                                       			<h5><?php the_title();?></h5>
		                           								<?php if($portfolio_item_types == true) { 
		                           									$terms = get_the_terms( $post->ID, 'portfolio-type' ); if ($terms) {?>
		                           										<p class="cportfoliotag"><?php $output = array(); foreach($terms as $term){ $output[] = $term->name;} echo implode(', ', $output); ?></p> 
		                           									<?php } 
		                           								}
				                                       			if($showexcerpt) {?>
				                                       				<p class="p_excerpt"><?php echo pinnacle_excerpt(16); ?></p>
				                                       			<?php } ?>
				                                       			<?php if($plb) {?>
				                                       				<a href="<?php echo esc_url($thumbnailURL); ?>" class="kad-btn kad-btn-primary plightbox-btn" title="<?php the_title();?>" data-rel="lightbox"><i class="kt-icon-search4"></i></a>
				                                       			<?php }
				                                       		} ?>
				                                       	</div>
	                                       			</div>
	                                   			</a>
	                                   		</div>
	                                	</div>
	                                	<?php $image = null; $thumbnailURL = null;
                           			}

                           			if($pstyleclass == "padded_style" ) { ?>
					              		<a href="<?php the_permalink() ?>" class="portfoliolink">
						              		<div class="piteminfo">   
						                          <h5><?php the_title();?></h5>
						                           	<?php if($portfolio_item_types == true) {
						                           		$terms = get_the_terms( $post->ID, 'portfolio-type' ); if ($terms) {?>
						                           			<p class="cportfoliotag"><?php $output = array(); foreach($terms as $term){ $output[] = $term->name;} echo implode(', ', $output); ?></p> 
						                           		<?php }
						                           	}
						                          	if($showexcerpt == true) {?> 
						                          		<p><?php echo pinnacle_excerpt(16); ?></p>
						                          	<?php } ?>
						                    </div>
					                	</a>
                					<?php } ?>
               						</div>
	                    		</div>
								<?php endwhile; ?>
                			</div> <!--portfoliowrapper-->
                
		                    <?php if ($wp_query->max_num_pages > 1) :
		                           	if(function_exists('pinnacle_wp_pagination')) {
		                            	pinnacle_wp_pagination();
		                            } else { ?>     
			                            <nav id="post-nav" class="pager">
			                                <div class="previous"><?php next_posts_link(__('&larr; Older posts', 'virtue')); ?></div>
			                                <div class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'virtue')); ?></div>
			                            </nav>
		                           	<?php } 
		                    endif;
                      		$wp_query = null; 
                      		wp_reset_query(); ?>
						</div><!-- /.main -->
						
						<?php get_sidebar(); ?>
     				</div><!-- /.row-->
    			</div><!-- /.content -->
  		</div><!-- /.wrap -->
	<?php get_footer(); ?>