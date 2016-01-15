<?php global $post, $pinnacle;
        $slide_sidebar = 1170; $portraittext = 'col-md-8';$portraitimg = 'col-md-4';
         // Get summary setting
          if ( has_post_format( 'video' )) {
              $postsummery  = get_post_meta( $post->ID, '_kad_video_post_summery', true );
              $swidth       = get_post_meta( $post->ID, '_kad_video_posthead_width', true ); 
              if(empty($postsummery) || $postsummery == 'default') {
                  if(!empty($pinnacle['video_post_summery_default'])) {
                      $postsummery = $pinnacle['video_post_summery_default'];
                  } else {
                      $postsummery = 'video';
                  }
              }
              if (!empty($swidth)) {
                $slidewidth = $swidth;
              } else {
                $slidewidth = $slide_sidebar;
              }
              
          } else if (has_post_format( 'gallery' )) {
              $postsummery  = get_post_meta( $post->ID, '_kad_gallery_post_summery', true );
              $height       = get_post_meta( $post->ID, '_kad_gallery_posthead_height', true ); 
              $swidth       = get_post_meta( $post->ID, '_kad_gallery_posthead_width', true ); 
              if(empty($postsummery) || $postsummery == 'default') {
                  if(!empty($pinnacle['gallery_post_summery_default'])) {
                      $postsummery = $pinnacle['gallery_post_summery_default'];
                    } else {
                      $postsummery = 'slider_landscape';
                    }
              }
              if (!empty($height)) {
                $slideheight = $height;
              } else {
                $slideheight = 400;
              }
              if (!empty($swidth)) {
                $slidewidth = $swidth;
              } else {
                $slidewidth = $slide_sidebar;
              }
          } elseif (has_post_format( 'image' )) {
              $postsummery  = get_post_meta( $post->ID, '_kad_image_post_summery', true );
              $swidth       = get_post_meta( $post->ID, '_kad_image_posthead_width', true );
              if(empty($postsummery) || $postsummery == 'default') {
                  if(!empty($pinnacle['image_post_summery_default'])) {
                          $postsummery = $pinnacle['image_post_summery_default'];
                    } else {
                          $postsummery = 'img_portrait';
                    }
              }
              if (!empty($swidth)) {
                $slidewidth = $swidth;
              } else {
                $slidewidth = $slide_sidebar;
              }
          } else {
                if(!empty($pinnacle['post_summery_default'])) {
                  $postsummery = $pinnacle['post_summery_default'];
                } else {
                  $postsummery = 'img_landscape';
                }
                $slidewidth = $slide_sidebar;
            
          } ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class('kad_blog_item postclass kad-animation'); ?> data-animation="fade-in" data-delay="0" itemscope="" itemtype="http://schema.org/BlogPosting">
              <div class="row">
                  <?php if($postsummery == 'img_landscape') { 
                            $textsize = 'col-md-12'; 
                            if (has_post_thumbnail( $post->ID ) ) {
                              $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
                              $thumbnailURL = $image_url[0];
                              $image = aq_resize($thumbnailURL,$slidewidth, false);
                              if(empty($image)) { $image = $thumbnailURL; } ?>
                              <div class="col-md-12">
                                  <div class="imghoverclass img-margin-center" itemprop="image">
                                    <a href="<?php the_permalink()  ?>" title="<?php the_title(); ?>">
                                      <img src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>" class="iconhover" style="display:block;">
                                    </a> 
                                  </div>
                              </div>
                              <?php $image = null; $thumbnailURL = null;
                            }  ?>
                  <?php } elseif($postsummery == 'img_portrait') { 
                            $textsize = $portraittext;
                            if (has_post_thumbnail( $post->ID ) ) {
                              $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
                              $thumbnailURL = $image_url[0]; 
                              $image = aq_resize($thumbnailURL, 360, 360, true);
                              if(empty($image)) { $image = $thumbnailURL; } ?>
                                <div class="<?php echo $portraitimg;?>">
                                    <div class="imghoverclass img-margin-center" itemprop="image">
                                        <a href="<?php the_permalink()  ?>" title="<?php the_title(); ?>">
                                            <img src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>" class="iconhover" style="display:block;">
                                        </a> 
                                    </div>
                                </div>
                            <?php $image = null; $thumbnailURL = null;
                            }  else  {
                              $textsize = 'col-md-12';
                            } ?>
                  <?php } elseif($postsummery == 'slider_landscape') {
                            $textsize = 'col-md-12'; ?>
                            <div class="col-md-12">
                                <div class="flexslider kt-flexslider loading" style="max-width:<?php echo esc_attr($slidewidth);?>px;" data-flex-speed="7000" data-flex-anim-speed="400" data-flex-animation="fade" data-flex-auto="true">
                                    <ul class="slides">
                                      <?php $image_gallery = get_post_meta( $post->ID, '_kad_image_gallery', true );
                                            if(!empty($image_gallery)) {
                                              $attachments = array_filter( explode( ',', $image_gallery ) );
                                                if ($attachments) {
                                                  foreach ($attachments as $attachment) {
                                                    $attachment_url = wp_get_attachment_url($attachment , 'full');
                                                    $image = aq_resize($attachment_url, $slidewidth, $slideheight, true);
                                                    if(empty($image)) {$image = $attachment_url;} ?>
                                                      <li>
                                                        <a href="<?php the_permalink() ?>">
                                                          <img src="<?php echo esc_url($image); ?>" class="" alt="<?php esc_attr($attachment_post->post_excerpt);?>" />
                                                        </a>
                                                      </li>
                                                  <?php }
                                                }
                                            } ?>                                   
                                    </ul>
                                </div> <!--Flex Slides-->
                            </div>
                    <?php } elseif($postsummery == 'slider_portrait') { ?>
                             <?php $textsize = 'col-md-7'; ?>
                              <div class="col-md-5">
                                  <div class="flexslider kt-flexslider loading" data-flex-speed="7000" data-flex-anim-speed="400" data-flex-animation="fade" data-flex-auto="true">
                                      <ul class="slides">
                                         <?php $image_gallery = get_post_meta( $post->ID, '_kad_image_gallery', true );
                                            if(!empty($image_gallery)) {
                                              $attachments = array_filter( explode( ',', $image_gallery ) );
                                                if ($attachments) {
                                                  foreach ($attachments as $attachment) {
                                                  $attachment_url = wp_get_attachment_url($attachment , 'full');
                                                  $image = aq_resize($attachment_url, 360, 360, true);
                                                  if(empty($image)) {$image = $attachment_url;} ?>
                                                    <li>
                                                      <a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>">
                                                        <img src="<?php echo esc_url($image); ?>" alt="<?php esc_attr($attachment_post->post_excerpt);?>" class="" />
                                                      </a>
                                                    </li>
                                                  <?php }
                                                }
                                            } ?>           
                                      </ul>
                                </div> <!--Flex Slides-->
                            </div>
                    <?php } elseif($postsummery == 'video') {
                           $textsize = 'col-md-12'; ?>
                            <div class="col-md-12">
                                <div class="videofit">
                                    <?php echo get_post_meta( $post->ID, '_kad_post_video', true ); ?>
                                </div>
                            </div>
                    <?php } else { 
                            $textsize = 'col-md-12'; 
                          }?>
                      <div class="<?php echo esc_attr($textsize);?> postcontent">
                          <?php get_template_part('templates/entry', 'meta-author'); ?>
                          <header>
                            <a href="<?php the_permalink() ?>">
                              <h3 class="entry-title" itemprop="name headline">
                                <?php the_title(); ?>
                              </h3>
                            </a>
                            <?php get_template_part('templates/entry', 'meta-subhead'); ?>
                          </header>
                          <div class="entry-content" itemprop="articleBody">
                              <?php the_excerpt(); ?>
                          </div>
                      </div><!-- Text size -->
                      <div class="col-md-12 postfooterarea">
                      <footer class="clearfix">
                          <?php get_template_part('templates/entry', 'meta-footer'); ?>
                      </footer>
                  </div>
                </div><!-- row-->
            </article> <!-- Article -->