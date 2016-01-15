<div id="portfolio_carousel_container" class="carousel_outerrim">
    <?php global $post, $pinnacle; 
    $text 	 = get_post_meta( $post->ID, '_kad_portfolio_carousel_title', true );
    $bporder = get_post_meta( $post->ID, '_kad_portfolio_carousel_order', true );
    $bpgroup = get_post_meta( $post->ID, '_kad_portfolio_carousel_group', true );
				    if(!empty($text)) {
				     	echo '<h3 class="sectiontitle">'.esc_html($text).'</h3>';
				 	} else {
				 		echo '<h3 class="sectiontitle">'.__('Recent Projects', 'virtue').'</h3>';
				 	} 
      				if(isset($pinnacle['portfolio_style_default'])) {
		      			$pstyleclass = $pinnacle['portfolio_style_default'];
		      		} else {
		      			$pstyleclass = 'padded_style';
		      		}
		      		if(isset($pinnacle['portfolio_hover_style_default'])) {
		      			$phoverstyleclass = $pinnacle['portfolio_hover_style_default'];
		      		} else {
		      			$phoverstyleclass = 'p_lightstyle';
		      		}
		      		if(isset($pinnacle['portfolio_ratio_default'])) {
                   	 	$pimgratio = $pinnacle['portfolio_ratio_default'];
                   	} else {
                   	 	$pimgratio = "square";
                   	 }
                   	 $showexcerpt = false;
                   	 $plb = false;
                   	 $portfolio_item_types = true;
			        if(isset($bporder)) {
			        	$bp_orderby = $bporder;
			        } else {
			        	$bp_orderby = 'menu_order';
			        }
					if($bp_orderby == 'menu_order') {
						$bp_order = 'ASC';
					} else {
						$bp_order = 'DESC';
					}
					if(empty($bpgroup) || $bpgroup == 'default') {
						if(isset($pinnacle['single_portfolio_carousel_items']) &&  $pinnacle['single_portfolio_carousel_items'] == 'cat') {
							$typeterms =  wp_get_post_terms( $post->ID, 'portfolio-type', array( 'orderby' => 'parent', 'order' => 'ASC' ));
							$typeterm = $typeterms[0];
							$bp_cat_slug = $typeterm->slug; 
						} else {
							$bp_cat_slug = '';
						}
					} else if($bpgroup == 'cat') {
						$typeterms =  wp_get_post_terms( $post->ID, 'portfolio-type', array( 'orderby' => 'parent', 'order' => 'ASC' ));
						$typeterm = $typeterms[0]; 
						$bp_cat_slug = $typeterm->slug; 
					} else {
						$bp_cat_slug = '';
					} ?> 
            		<div class="portfolio-carouselcase fredcarousel">
            		<?php if(!empty($pinnacle['portfolio_recent_car_column'])) {
            			$portfolio_column = $pinnacle['portfolio_recent_car_column'];
            		} else {
            			$portfolio_column = 4;
            		}
            		if ($portfolio_column == '2') {
            			$itemsize = 'tcol-md-6 tcol-sm-6 tcol-xs-12 tcol-ss-12'; 
            			$slidewidth = 600;
            			$md = 2;
            			$sm = 2;
            			$xs = 1;
            			$ss = 1;
            		} else if ($portfolio_column == '3'){
            			$itemsize = 'tcol-md-4 tcol-sm-4 tcol-xs-6 tcol-ss-12';
            			$slidewidth = 400;
            			$md = 3;
            			$sm = 3;
            			$xs = 2;
            			$ss = 1;
            		} else if ($portfolio_column == '6'){
            			$itemsize = 'tcol-md-2 tcol-sm-3 tcol-xs-4 tcol-ss-6';
            			$slidewidth = 300;
            			$md = 6;
            			$sm = 4;
            			$xs = 3;
            			$ss = 2;
            		} else if ($portfolio_column == '5'){
            			$itemsize = 'tcol-md-25 tcol-sm-3 tcol-xs-4 tcol-ss-6';
            			$slidewidth = 300;
            			$md = 5;
            			$sm = 4;
            			$xs = 3;
            			$ss = 2;
            		} else {
            			$itemsize = 'tcol-md-3 tcol-sm-4 tcol-xs-6 tcol-ss-12';
            			$slidewidth = 300;
            			$md = 4; 
            			$sm = 3; 
            			$xs = 2; 
            			$ss = 1;
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
					} ?>
					<div id="carouselcontainer-portfolio" class="rowtight">
            			<div id="portfolio-carousel" class="clearfix initcaroufedsel caroufedselclass <?php echo esc_attr($pstyleclass);?> <?php echo esc_attr($phoverstyleclass);?>" data-carousel-container="#carouselcontainer-portfolio" data-carousel-transition="300" data-carousel-scroll="items:1" data-carousel-auto="true" data-carousel-speed="9000" data-carousel-id="portfolio" data-carousel-md="<?php echo esc_attr($md);?>" data-carousel-sm="<?php echo esc_attr($sm);?>" data-carousel-xs="<?php echo esc_attr($xs);?>" data-carousel-ss="<?php echo esc_attr($ss);?>">
                 	<?php $temp 	= $wp_query; 
						  $wp_query = null; 
						  $wp_query = new WP_Query();
				  		  $wp_query->query(array(
				  		  	'orderby' => $bp_orderby,
				  		  	'order' => $bp_order,
				  		  	'post_type' => 'portfolio',
				  		  	'portfolio-type'=> $bp_cat_slug,
				  		  	'post__not_in' => array($post->ID),
				  		  	'posts_per_page' => '8'
				  		  	)
				  		  );
							if ( $wp_query ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
							<div class="<?php echo esc_attr($itemsize); ?> kad_portfolio_item">
								<div class="portfolio-item grid_item postclass kad-light-gallery">
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
                           										$terms = get_the_terms( $post->ID, 'portfolio-type' ); 
                           										if ($terms) {?>
                           											<p class="cportfoliotag"><?php $output = array(); foreach($terms as $term){ $output[] = $term->name;} echo implode(', ', $output); ?></p> 
                           										<?php } 
                           									} ?>
		                                       				<?php if($showexcerpt) {?> 
		                                       					<p class="p_excerpt"><?php echo pinnacle_excerpt(16); ?></p> 
		                                       				<?php } ?>
		                                       				<?php if($plb) {?>
		                                       					<a href="<?php echo esc_url($thumbnailURL); ?>" class="kad-btn kad-btn-primary plightbox-btn" title="<?php the_title();?>" data-rel="lightbox"><i class="kt-icon-search4"></i></a>
		                                       				<?php }?>
		                                       		<?php } ?>
		                                       		</div>
	                                       		</div>
	                                   		</a>
	                                   	</div>
	                                </div>
	                                <?php $image = null; $thumbnailURL = null;?>
                           		<?php } ?>
                           		<?php if($pstyleclass == "padded_style" ) { ?>
				              		<a href="<?php the_permalink() ?>" class="portfoliolink">
					              		<div class="piteminfo">   
					                          <h5><?php the_title();?></h5>
					                           <?php if($portfolio_item_types == true) {
					                           		$terms = get_the_terms( $post->ID, 'portfolio-type' ); 
					                           		if ($terms) {?> 
					                           			<p class="cportfoliotag"><?php $output = array(); foreach($terms as $term){ $output[] = $term->name;} echo implode(', ', $output); ?></p> 
					                           		<?php } 
					                           	} ?>
					                          	<?php if($showexcerpt == true) {?> 
					                          		<p><?php echo pinnacle_excerpt(16); ?></p> 
					                          	<?php } ?>
					                    </div>
				                	</a>
                				<?php } ?>
                				</div>
                    		</div>
							<?php endwhile; else: ?>
							<li class="error-not-found"><?php _e('Sorry, no portfolio entries found.', 'pinnacle');?></li>
							<?php endif;
							$wp_query = null; 
							$wp_query = $temp;
							wp_reset_query(); ?>					
						</div>
					</div>
    				<div class="clearfix"></div>
			            <a id="prevport-portfolio" class="prev_carousel icon-angle-left" href="#"></a>
						<a id="nextport-portfolio" class="next_carousel icon-angle-right" href="#"></a>
            	</div>
</div><!-- Porfolio Container-->			