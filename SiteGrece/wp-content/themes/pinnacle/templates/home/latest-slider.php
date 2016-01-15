<div class="sliderclass kad-desktop-slider">
  <?php  global $pinnacle; 
          if(isset($pinnacle['slider_size'])) {
            $slideheight = $pinnacle['slider_size'];
          } else {
            $slideheight = 400;
          }
          if(isset($pinnacle['slider_size_width'])) {
            $slidewidth = $pinnacle['slider_size_width'];
          } else {
            $slidewidth = 1140;
          }
          if(isset($pinnacle['trans_type'])) {
            $transtype = $pinnacle['trans_type'];
          } else {
            $transtype = 'slide';
          }
          if(isset($pinnacle['slider_transtime'])) {
            $transtime = $pinnacle['slider_transtime'];
          } else {
            $transtime = '300';
          }
          if(isset($pinnacle['slider_autoplay']) && $pinnacle['slider_autoplay'] == "1") {
            $autoplay = 'true';
          } else {
            $autoplay = 'false';
          }
          if(isset($pinnacle['slider_pausetime'])) {
            $pausetime = $pinnacle['slider_pausetime'];
          } else {
            $pausetime = '7000';
          } ?>
            <div id="imageslider" class="">
              <div class="flexslider kt-flexslider loading" style="max-width:<?php echo esc_attr($slidewidth);?>px; margin-left: auto; margin-right:auto;" data-flex-speed="<?php echo esc_attr($pausetime);?>" data-flex-anim-speed="<?php echo esc_attr($transtime);?>" data-flex-animation="<?php echo esc_attr($transtype); ?>" data-flex-auto="<?php echo esc_attr($autoplay);?>">
                  <ul class="slides">
                    <?php $temp     = $wp_query; 
                          $wp_query = null; 
                          $wp_query = new WP_Query();
                          $wp_query->query(array(
                            'posts_per_page' => 4
                            )
                          );
                          if ( $wp_query ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
                              if (has_post_thumbnail( $post->ID ) ) {
                                  $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
                                  $thumbnailURL = $image_url[0]; 
                                  $image = aq_resize($thumbnailURL, $slidewidth, $slideheight, true);
                                  if(empty($image)) { $image = $thumbnailURL; } ?>
                                      <li> 
                                        <a href="<?php the_permalink(); ?>">
                                          <img src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>" />
                                                <div class="flex-caption">
                                                  <div class="captiontitle headerfont"><?php the_title(); ?></div>
                                                </div> 
                                        </a>
                                      </li>
                                      <?php } endwhile; else: ?>
                                      <li class="error-not-found"><?php _e('Sorry, no blog entries found.', 'pinnacle'); ?></li>
                                      <?php endif; ?>
                                      <?php $wp_query = null; 
                                      $wp_query = $temp;
                                      wp_reset_query(); ?>
                  </ul>
              </div> <!--Flex Slides-->
            </div><!--Container-->
</div><!--sliderclass-->