<?php global $pinnacle;
if ( post_type_exists( 'portfolio' ) ) {

	if(isset($pinnacle['home_portfolio_carousel_count'])) {
		$hp_pcount = $pinnacle['home_portfolio_carousel_count'];
	} else {
		$hp_pcount = '8';
	}
	if(isset($pinnacle['home_portfolio_carousel_speed'])) {
		$hport_speed = $pinnacle['home_portfolio_carousel_speed'].'000';
	} else {
		$hport_speed = '9000';
	}
	if(isset($pinnacle['home_portfolio_order'])) {
		$hp_orderby = $pinnacle['home_portfolio_order'];
	} else {
		$hp_orderby = 'menu_order';
	}
	if(isset($pinnacle['home_portfolio_carousel_scroll']) && $pinnacle['home_portfolio_carousel_scroll'] == 'all' ) {
		$hport_scroll = '';
	} else {
		$hport_scroll = 'items:1,';
	}
	if(isset($pinnacle['portfolio_show_type']) && $pinnacle['portfolio_show_type'] == 1) {
		$showtypes = true;
	} else {
		$showtypes = false;
	}
	if(isset($pinnacle['home_port_car_layoutstyle'])) {
		$layoutstyle = $pinnacle['home_port_car_layoutstyle'];
	} else {
		$layoutstyle = 'default';
	}
	if(isset($pinnacle['home_port_car_hoverstyle'])) {
		$hoverstyle = $pinnacle['home_port_car_hoverstyle'];
	} else {
		$hoverstyle = 'default';
	}
	if(isset($pinnacle['home_port_car_imageratio'])) {
		$ratio = $pinnacle['home_port_car_imageratio'];
	} else {
		$ratio = 'default';
	}
	if(isset($pinnacle['portfolio_show_excerpt']) && $pinnacle['portfolio_show_excerpt'] == 1) {
		$showexcerpt = true;
	} else {
		$showexcerpt = false;
	}
	if(isset($pinnacle['portfolio_car_lightbox']) && $pinnacle['portfolio_car_lightbox'] == 1) {
		$lightbox = true;
	} else {
		$lightbox = false;
	}
	if(isset($pinnacle['home_portfolio_carousel_column'])) {
		$columns = $pinnacle['home_portfolio_carousel_column'];
	} else {
		$columns = 3;
	}
	if($hp_orderby == 'menu_order') {
		$p_order = 'ASC';
	} else {
		$p_order = 'DESC';
	}
	if(!empty($pinnacle['portfolio_type'])) {
		$port_cat = get_term_by ('id',$pinnacle['portfolio_type'],'portfolio-type');
		$portfolio_category = $port_cat -> slug;
	} else {
		$portfolio_category = '';
	}

	if($layoutstyle == 'default') {
		if(isset($pinnacle['portfolio_style_default'])) {
		    $pstyleclass = $pinnacle['portfolio_style_default'];
		} else {
		    $pstyleclass = 'padded_style';
		}
	} else {
	    $pstyleclass = $layoutstyle;
	}
	
	if($hoverstyle == 'default') {
		if(isset($pinnacle['portfolio_hover_style_default'])) {
		    $phoverstyleclass = $pinnacle['portfolio_hover_style_default'];
		} else {
		    $phoverstyleclass = 'p_lightstyle';
		}
	} else {
	    $phoverstyleclass = $hoverstyle;
	}

	if($ratio == 'default') {
        if(isset($pinnacle['portfolio_ratio_default'])) {
            $pimgratio = $pinnacle['portfolio_ratio_default'];
        } else {
            $pimgratio = "square";
        }
    } else {
        $pimgratio = $ratio;
   	}

	if ($columns == '2') {
		$itemsize = 'tcol-md-6 tcol-sm-6 tcol-xs-12 tcol-ss-12';
		$slidewidth = 600; 
		$md = 2; 
		$sm = 2; 
		$xs = 1; 
		$ss = 1;
	} else if ($columns == '3'){
		$itemsize = 'tcol-md-4 tcol-sm-4 tcol-xs-6 tcol-ss-12';
		$slidewidth = 400;
		$md = 3;
		$sm = 3;
		$xs = 2;
		$ss = 1;
	} else if ($columns == '6'){
		$itemsize = 'tcol-md-2 tcol-sm-3 tcol-xs-4 tcol-ss-6';
		$slidewidth = 300;
		$md = 6;
		$sm = 4;
		$xs = 3;
		$ss = 2;
	} else if ($columns == '5'){
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

<div class="home-portfolio home-margin carousel_outerrim home-padding kad-animation" data-animation="fade-in" data-delay="0">

	<?php if(!empty($pinnacle['portfolio_title'])) {
		echo '<div class="clearfix"><h3 class="hometitle">'.esc_html($pinnacle['portfolio_title']).'</h3></div>';
	}

	$shortcodeclasses[] = $pstyleclass;
    $shortcodeclasses[] = $phoverstyleclass;
    $shortcodeclasses[] = 'kt-portfolio-homepage'; ?>
	
	<div class="home-margin fredcarousel">
		<div id="carouselcontainer-portfolio" class="rowtight <?php echo implode(" ", $shortcodeclasses);?> fadein-carousel">
			<div id="portfolio-carousel" class="clearfix caroufedselclass initcaroufedsel clearfix" data-carousel-container="#carouselcontainer-portfolio" data-carousel-transition="700" data-carousel-scroll="<?php echo esc_attr($hport_scroll); ?>" data-carousel-auto="true" data-carousel-speed="<?php echo esc_attr($hport_speed); ?>" data-carousel-id="portfolio" data-carousel-md="<?php echo esc_attr($md);?>" data-carousel-sm="<?php echo esc_attr($sm);?>" data-carousel-xs="<?php echo esc_attr($xs);?>" data-carousel-ss="<?php echo esc_attr($ss);?>">
				<?php $temp 	= $wp_query; 
					  $wp_query = null; 
					  $wp_query = new WP_Query();
					  $wp_query->query(array(
						'orderby' 		 => $hp_orderby,
						'order' 		 => $p_order,
						'post_type' 	 => 'portfolio',
						'portfolio-type' => $portfolio_category,
						'posts_per_page' => $hp_pcount
						)
					  );
					  if ( $wp_query ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
						<div class="<?php echo esc_attr($itemsize);?> all p-item">
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
		                                       				<?php if($lightbox) {?>
		                                       					<a href="<?php echo esc_url($thumbnailURL); ?>" class="kad-btn kad-btn-primary plightbox-btn" title="<?php the_title();?>" data-rel="lightbox"><i class="icon-search"></i></a>
		                                       				<?php } ?>
		                                       		<?php } elseif($pstyleclass == "flat-no-margin" || $pstyleclass == "flat-w-margin" ) { ?>
		                                       				<h5><?php the_title();?></h5>
                           									<?php if($showtypes == true) { 
                           										$terms = get_the_terms( $post->ID, 'portfolio-type' ); 
                           										if ($terms) {?> 
                           										<p class="cportfoliotag"><?php $output = array(); foreach($terms as $term){ $output[] = $term->name;} echo implode(', ', $output); ?></p> 
                           										<?php } 
                           									} ?>
		                                       				<?php if($showexcerpt) {?>
		                                       					<p class="p_excerpt"><?php echo pinnacle_excerpt(16); ?></p> 
		                                       				<?php } ?>
		                                       				<?php if($lightbox) {?>
		                                       					<a href="<?php echo esc_url($thumbnailURL); ?>" class="kad-btn kad-btn-primary plightbox-btn" title="<?php the_title();?>" data-rel="lightbox"><i class="icon-search"></i></a>
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
					                           <?php if($showtypes) { 
					                           		$terms = get_the_terms( $post->ID, 'portfolio-type' ); 
					                           		if ($terms) {?>
					                           			<p class="cportfoliotag"><?php $output = array(); foreach($terms as $term){ $output[] = $term->name;} echo implode(', ', $output); ?></p> 
					                           		<?php } 
					                           	} ?>
					                          <?php if($showexcerpt) {?> 
					                          	<p class="p_excerpt"><?php echo pinnacle_excerpt(16); ?></p> 
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
		</div> <!-- fred Carousel-->
</div> <!--featclass -->
<?php } ?>				