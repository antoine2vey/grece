<div class="sliderclass carousel_outerrim">
  <?php global $post; 
    $height = get_post_meta( $post->ID, '_kad_posthead_height', true );
    $swidth = get_post_meta( $post->ID, '_kad_posthead_width', true );
    if (!empty($height)) {
      $slideheight = $height;
    } else {
      $slideheight = 400;
    }
    if (!empty($swidth)) {
      $slidewidth = $swidth;
    } else {
      $slidewidth = 1170;
    } ?>
    <div id="imageslider" class="loading container">
      <div class="carousel_slider_outer fredcarousel fadein-carousel" style="overflow:hidden; max-width:<?php echo esc_attr($slidewidth);?>px; height: <?php echo esc_attr($slideheight);?>px; margin-left: auto; margin-right:auto;">
          <div class="carousel_slider initcarouselslider" data-carousel-container=".carousel_slider_outer" data-carousel-transition="600" data-carousel-height="<?php echo esc_attr($slideheight); ?>" data-carousel-auto="true" data-carousel-speed="9000" data-carousel-id="carouselslider">
            <?php $image_gallery = get_post_meta( $post->ID, '_kad_image_gallery', true );
                  if(!empty($image_gallery)) {
                      $attachments = array_filter( explode( ',', $image_gallery ) );
                          if ($attachments) {
                              foreach ($attachments as $attachment) :
                                $attachment_url = wp_get_attachment_url($attachment , 'full');
                                $image = aq_resize($attachment_url, null, $slideheight, false, false);
                                if(empty($image)) {$image = array($slide['url'],$slidewidth,$slideheight);} 
                                  echo '<div class="carousel_gallery_item" style="float:left; display: table; position: relative; text-align: center; margin: 0; width:auto; height:'.esc_attr($image[2]).'px;">';
                                    echo '<div class="carousel_gallery_item_inner" style="vertical-align: middle; display: table-cell;">';
                                      echo '<img src="'.esc_url($image[0]).'" width="'.esc_attr($image[1]).'" height="'.esc_attr($image[2]).'" />'; ?>
                                    </div>
                                  </div>
                              <?php endforeach; 
                          }
                  }?>
          </div>
          <div class="clearfix"></div>
              <a id="prevport-carouselslider" class="prev_carousel icon-angle-left" href="#"></a>
              <a id="nextport-carouselslider" class="next_carousel icon-angle-right" href="#"></a>
      </div> <!--fredcarousel-->
    </div><!--Container-->
</div><!--sliderclass-->                       
            