<?php get_template_part('templates/portfolio', 'post-header'); ?>
  <?php if ( ! post_password_required() ) {
	global $post, $pinnacle; 
        $layout             = get_post_meta( $post->ID, '_kad_ppost_layout', true ); 
				$ppost_type         = get_post_meta( $post->ID, '_kad_ppost_type', true );
				$imgheight          = get_post_meta( $post->ID, '_kad_posthead_height', true );
				$imgwidth           = get_post_meta( $post->ID, '_kad_posthead_width', true );
        $portfolio_carousel = get_post_meta( $post->ID, '_kad_portfolio_carousel_recent', true );

			if($layout == 'above')  {
				$imgclass           = 'col-md-12';
				$textclass          = 'pcfull clearfix';
				$entryclass         = 'col-md-8';
				$valueclass         = 'col-md-4';
        $layoutclass        = 'kt-portfolio-above';
        $layoutcontainclass = 'container';
				$slidewidth_d       = 1140;
		} elseif ($layout == 'three')  {
				$imgclass           = 'col-md-12';
				$textclass          = 'pcfull clearfix';
				$entryclass         = 'col-md-12';
				$valueclass         = 'col-md-12';
        $layoutclass        = 'kt-portfolio-above';
        $layoutcontainclass = 'container';
				$slidewidth_d       = 1140;
			} elseif ($layout == 'besidesmall') {
				$imgclass           = 'col-md-8';
				$textclass          = 'col-md-4 pcside';
				$entryclass         = '';
				$valueclass         = '';
				$slidewidth_d       = 780;
        $layoutcontainclass = '';
        $layoutclass        = 'kt-portfolio-beside';
			} else {
        $imgclass = 'col-md-7';
        $textclass = 'col-md-5 pcside';
        $entryclass = '';
        $valueclass = '';
        $layoutcontainclass = '';
        $layoutclass = 'kt-portfolio-beside';
        $slidewidth_d = 653;
        }
			 	$portfolio_margin = '';
		  if (!empty($imgheight)) {
        $slideheight = $imgheight;
      } else { 
        $slideheight = 450;
      } 
		  if (!empty($imgwidth)) {
        $slidewidth = $imgwidth; 
      } else { 
        $slidewidth = $slidewidth_d;
      } 
       do_action( 'kadence_single_portfolio_after_header' ); 
		 ?>
  <div id="content" class="container">
      <div class="row">
        <div class="main <?php echo esc_attr( pinnacle_main_class() ); ?> portfolio-single <?php echo esc_attr($layoutclass);?>" role="main">
          <?php while (have_posts()) : the_post(); ?>		

            <?php do_action( 'kadence_single_portfolio_before' );  ?> 

            <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                <div class="portfolio-postclass">
      	            <div class="row">
                  		<div class="<?php echo esc_attr($imgclass); ?>">
                         <?php do_action( 'kadence_single_portfolio_feature_before' );  ?> 
            				  <?php if ($ppost_type == 'flex') { ?>
                					<div class="flexslider kt-flexslider loading kad-light-gallery" style="max-width:<?php echo esc_attr($slidewidth);?>px;" data-flex-speed="7000" data-flex-anim-speed="400" data-flex-animation="fade" data-flex-auto="true">
                              <ul class="slides">
                                <?php $image_gallery = get_post_meta( $post->ID, '_kad_image_gallery', true );
                                      if(!empty($image_gallery)) {
                                    	   $attachments = array_filter( explode( ',', $image_gallery ) );
                                    	   if ($attachments) {
                											         foreach ($attachments as $attachment) {
                          												$attachment_url = wp_get_attachment_url($attachment , 'full');
                          												$caption = get_post($attachment)->post_excerpt;
                          												$image = aq_resize($attachment_url, $slidewidth, $slideheight, true);
                													        if(empty($image)) {$image = $attachment_url;}
                												            echo '<li><a href="'.esc_url($attachment_url).'" data-rel="lightbox" title="'.esc_attr($caption).'"><img src="'.esc_url($image).'" alt="'.esc_attr($caption).'" /></a></li>';
                											         }
                										      }
                								    } ?>                            
                						  </ul>
                          </div> <!--Flex Slides-->
				              <?php } else if ($ppost_type == 'imagegrid') {
                            $image_gallery = get_post_meta( $post->ID, '_kad_image_gallery', true );
                            $columns = get_post_meta( $post->ID, '_kad_portfolio_img_grid_columns', true );
                                if(empty($columns)) {$columns = '3';}
                            echo do_shortcode('[gallery ids="'.$image_gallery.'" columns="'.$columns.'"]');
                        } else if ($ppost_type == 'video') { ?>
					                <div class="videofit">
                  		      <?php  echo get_post_meta( $post->ID, '_kad_post_video', true );?>
                  	      </div>
				              <?php } else if ($ppost_type == 'carousel') { ?>
                  					<div id="imageslider" class="loading carousel_outerrim">
                  					    <div class="carousel_slider_outer fredcarousel fadein-carousel" style="overflow:hidden; max-width:<?php echo esc_attr($slidewidth);?>px; height: <?php echo esc_attr($slideheight);?>px; margin-left: auto; margin-right:auto;">
                  					        <div class="carousel_slider kad-light-gallery initcarouselslider" data-carousel-container=".carousel_slider_outer" data-carousel-transition="600" data-carousel-height="<?php echo esc_attr($slideheight); ?>" data-carousel-auto="true" data-carousel-speed="9000" data-carousel-id="carouselslider">
                  					            <?php $image_gallery = get_post_meta( $post->ID, '_kad_image_gallery', true );
                                            	if(!empty($image_gallery)) {
                                      				  $attachments = array_filter( explode( ',', $image_gallery ) );
                                      					    if ($attachments) {
                  										                  foreach ($attachments as $attachment) {
                                    											$attachment_url = wp_get_attachment_url($attachment , 'full');
                                    											$caption = get_post($attachment)->post_excerpt;
                  					                    	        $image = aq_resize($attachment_url, null, $slideheight, false, false);
                  					                    	        if(empty($image)) {$image = array($attachment_url, $slidewidth, $slideheight);} 
                            					                        echo '<div class="carousel_gallery_item" style="float:left; display: table; position: relative; text-align: center; margin: 0; width:auto; height:'.esc_attr($image[2]).'px;">';
                              					                        echo '<div class="carousel_gallery_item_inner" style="vertical-align: middle; display: table-cell;">';
                                					                        echo '<a href="'.esc_url($attachment_url).'" data-rel="lightbox" title="'.esc_attr($caption).'">';
                                					                         echo '<img src="'.esc_url($image[0]).'" width="'.esc_attr($image[1]).'" height="'.esc_attr($image[2]).'"  />';
                                					                        echo '</a>';
                  					                                    echo '</div>';
                  					                                  echo '</div>'; 
                  					                            } 
                  					                        } 
                  					                  } ?>
                  					        </div>
                  					        <div class="clearfix"></div>
                  					            <a id="prevport-carouselslider" class="prev_carousel icon-angle-left" href="#"></a>
                  					            <a id="nextport-carouselslider" class="next_carousel icon-angle-right" href="#"></a>
                  					    </div> <!--fredcarousel-->
                  					</div><!--Container-->
				              <?php } else if ($ppost_type == 'none') {
					                 $portfolio_margin = "kad_portfolio_nomargin";
				              } else {					
              						$post_id = get_post_thumbnail_id();
              						$img_url = wp_get_attachment_url( $post_id);
              						$image = aq_resize( $img_url, $slidewidth, $slideheight, true );
						              if(empty($image)) {$image = $img_url;} 
							              if($image) : ?>
                                    <div class="imghoverclass portfolio-single-img">
                                    	<a href="<?php echo esc_attr($img_url); ?>" data-rel="lightbox" class="lightboxhover">
                                    		<img src="<?php echo esc_attr($image); ?>" alt="<?php echo esc_attr(get_post($post_id)->post_excerpt); ?>"  />
                                    	</a>
                                    </div>
                            <?php endif; ?>
				              <?php } ?>
                      <?php do_action( 'kadence_single_portfolio_feature_after' );  ?> 
        	            </div><!--imgclass -->
                      <div class="p-container <?php echo esc_attr($layoutcontainclass);?>">
                			    <div class="<?php echo esc_attr($textclass); ?>">
                              <div class="postclass clearfix">
                                <div class="entry-content <?php echo esc_attr($entryclass); ?> <?php echo esc_attr($portfolio_margin);?>">
                                  <?php if (isset($pinnacle['default_showportfoliotitle_inpost']) && $pinnacle['default_showportfoliotitle_inpost'] == 1) { ?>
                                    <h1 class="entry-title"><?php the_title(); ?></h1>
                                  <?php } ?>
                                   <?php do_action( 'kadence_single_portfolio_content_before' );  ?> 
		      	                        <?php the_content(); ?>
                                    <?php do_action( 'kadence_single_portfolio_content_after' );  ?> 
		  		                      </div>
                        	    	<div class="<?php echo esc_attr($valueclass); ?>">
                                <?php do_action( 'kadence_single_portfolio_value_before' );  ?> 
                        				    	<?php     $project_v1t = get_post_meta( $post->ID, '_kad_project_val01_title', true );
                        				    						$project_v1d = get_post_meta( $post->ID, '_kad_project_val01_description', true );
                        				    						$project_v2t = get_post_meta( $post->ID, '_kad_project_val02_title', true );
                        				    						$project_v2d = get_post_meta( $post->ID, '_kad_project_val02_description', true );
                        				    						$project_v3t = get_post_meta( $post->ID, '_kad_project_val03_title', true );
                        				    						$project_v3d = get_post_meta( $post->ID, '_kad_project_val03_description', true );
                        				    						$project_v4t = get_post_meta( $post->ID, '_kad_project_val04_title', true );
                        				    						$project_v4d = get_post_meta( $post->ID, '_kad_project_val04_description', true );
                        				    						$project_v5t = get_post_meta( $post->ID, '_kad_project_val05_title', true );
                        				    						$project_v5d = get_post_meta( $post->ID, '_kad_project_val05_description', true ); ?>
                                <?php if (!empty($project_v1t) || !empty($project_v2t) || !empty($project_v3t) || !empty($project_v4t) || !empty($project_v5t)) { ?>
                                  <div class="pcbelow">
                                    <ul class="portfolio-content disc">
                          				    <?php if (!empty($project_v1t)) echo '<li class="pdetails"><span>'.esc_html($project_v1t).'</span> '.esc_html($project_v1d).'</li>'; ?>
                          				    <?php if (!empty($project_v2t)) echo '<li class="pdetails"><span>'.esc_html($project_v2t).'</span> '.esc_html($project_v2d).'</li>'; ?>
                          				    <?php if (!empty($project_v3t)) echo '<li class="pdetails"><span>'.esc_html($project_v3t).'</span> '.esc_html($project_v3d).'</li>'; ?>
                          				    <?php if (!empty($project_v4t)) echo '<li class="pdetails"><span>'.esc_html($project_v4t).'</span> '.esc_html($project_v4d).'</li>'; ?>
                          				    <?php if (!empty($project_v5t)) echo '<li class="pdetails"><span>'.esc_html($project_v5t).'</span> <a href="'.esc_url($project_v5d).'" target="_new">'.esc_html($project_v5d).'</a></li>'; ?>
                        				    <?php do_action( 'kadence_single_portfolio_list_li' );  ?> 
                                    </ul><!--Portfolio-content-->
                      				    </div>
                                <?php }?>
                                <?php do_action( 'kadence_single_portfolio_value_after' );  ?> 
				                        </div>
                              </div>
                          </div>
    	                </div><!--Layoutclass -->
                    </div><!--row-->
                    <div class="clearfix"></div>
                </div><!--postclass-->
                <footer>
                    <?php wp_link_pages(array('before' => '<nav id="page-nav" class="wp-pagenavi"><p>' . __('Pages:', 'pinnacle'), 'after' => '</p></nav>')); 
                    if (!empty($portfolio_carousel) || $portfolio_carousel == 'default') { 
                        if(isset($pinnacle['single_portfolio_carousel_default']) && $pinnacle['single_portfolio_carousel_default'] == "yes") {
                          get_template_part('templates/bottomportfolio', 'carousel');
                        }
                    } elseif ($portfolio_carousel == 'yes'){
                        get_template_part('templates/bottomportfolio', 'carousel');
                    } ?>
                </footer>
                <?php if(isset($pinnacle['portfolio_comments']) && $pinnacle['portfolio_comments'] == 1) { comments_template('/templates/comments.php'); } ?>
            </article>
            <?php do_action( 'kadence_single_portfolio_after' );  ?> 
          <?php endwhile; ?>
  <?php } else { ?>
        <div id="content" class="container">
          <div class="row">
              <div class="main <?php echo pinnacle_main_class(); ?> portfolio-single" role="main">
                  <?php echo get_the_password_form();
  }?>
</div>