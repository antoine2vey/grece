<div class="sliderclass kad-mobile-slider">
<?php global $pinnacle; 
          if(isset($pinnacle['mobile_slider_size'])) {
            $slideheight = $pinnacle['mobile_slider_size'];
          } else {
            $slideheight = 300;
          }
          if(isset($pinnacle['mobile_slider_size_width'])) {
            $slidewidth = $pinnacle['mobile_slider_size_width'];
          } else {
            $slidewidth = 480;
          }
          if(isset($pinnacle['mobile_slider_captions'])) {
            $captions = $pinnacle['mobile_slider_captions'];
          } else {
            $captions = '';
          }
          if(isset($pinnacle['home_mobile_slider'])) {
            $slides = $pinnacle['home_mobile_slider'];
          } else {
            $slides = '';
          }
          if(isset($pinnacle['mobile_trans_type'])) {
            $transtype = $pinnacle['mobile_trans_type'];
          } else {
            $transtype = 'slide';
          }
          if(isset($pinnacle['mobile_slider_transtime'])) {
            $transtime = $pinnacle['mobile_slider_transtime'];
          } else {
            $transtime = '300';
          }
          if(isset($pinnacle['mobile_slider_autoplay']) && $pinnacle['mobile_slider_autoplay'] == "1") {
            $autoplay = 'true';
          } else {
            $autoplay = 'false';
          }
          if(isset($pinnacle['mobile_slider_pausetime'])) {
            $pausetime = $pinnacle['mobile_slider_pausetime'];
          } else {
            $pausetime = '7000';
          } ?>
    <div id="imageslider" class="container">
        <div class="flexslider kt-flexslider loading" style="max-width:<?php echo esc_attr($slidewidth);?>px; margin-left: auto; margin-right:auto;" data-flex-speed="<?php echo esc_attr($pausetime);?>" data-flex-anim-speed="<?php echo esc_attr($transtime);?>" data-flex-animation="<?php echo esc_attr($transtype);?>" data-flex-auto="<?php echo esc_attr($autoplay);?>">
            <ul class="slides">
                <?php foreach ($slides as $slide) : 
                        $image = aq_resize($slide['url'], $slidewidth, $slideheight, true);
                        if(empty($image)) {$image = $slide['url'];} ?>
                        <li> 
                            <?php if(!empty($slide['link'])){
                               echo '<a href="'.esc_attr($slide['link']).'">'; 
                            }?>
                              <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($slide['description']);?>" title="<?php echo esc_attr($slide['title']); ?>" />
                                <?php if ($captions == '1') { ?> 
                                  <div class="flex-caption">
                                    <?php if (!empty($slide['title'])){
                                            echo '<div class="captiontitle headerfont">'.esc_html($slide['title']).'</div>'; 
                                    }
                                    if (!empty($slide['description'])){
                                            echo '<div><div class="captiontext headerfont"><p>'.esc_html($slide['description']).'</p></div></div>';
                                    }?>
                                  </div> 
                                <?php } ?>
                            <?php if(!empty($slide['link'])){ 
                                echo '</a>';
                            } ?>
                        </li>
                <?php endforeach; ?>
            </ul>
        </div> <!--Flex Slides-->
    </div><!--Container-->
</div><!--feat-->