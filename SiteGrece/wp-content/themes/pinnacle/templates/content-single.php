<?php get_template_part('templates/blog', 'post-header');
    global $post, $pinnacle;
        if(pinnacle_display_sidebar()) {
          $slide_sidebar = 848;
        } else {
          $slide_sidebar = 1170;
        }
        // Get Post Head settings
        if ( has_post_format( 'video' )) {
              $headcontent = get_post_meta( $post->ID, '_kad_video_blog_head', true );
              if(empty($headcontent) || $headcontent == 'default') {
                  if(!empty($pinnacle['video_post_blog_default'])) {
                        $headcontent = $pinnacle['video_post_blog_default'];
                    } else {
                        $headcontent = 'video';
                    }
              }
              $swidth = get_post_meta( $post->ID, '_kad_video_posthead_width', true ); 
              if (!empty($swidth)) {
                $slidewidth = $swidth;
              } else {
                $slidewidth = $slide_sidebar;
              }
        } else if (has_post_format( 'gallery' )) {
              $headcontent = get_post_meta( $post->ID, '_kad_gallery_blog_head', true );
              if(empty($headcontent) || $headcontent == 'default') {
                  if(!empty($pinnacle['gallery_post_blog_default'])) {
                        $headcontent = $pinnacle['gallery_post_blog_default'];
                    } else {
                        $headcontent = 'flex';
                    }
              }
              $height = get_post_meta( $post->ID, '_kad_gallery_posthead_height', true );
              $swidth = get_post_meta( $post->ID, '_kad_gallery_posthead_width', true );
                if (!empty($height)){
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
               $headcontent = get_post_meta( $post->ID, '_kad_image_blog_head', true );
              if(empty($headcontent) || $headcontent == 'default') {
                  if(!empty($pinnacle['image_post_blog_default'])) {
                        $headcontent = $pinnacle['image_post_blog_default'];
                    } else {
                        $headcontent = 'image';
                    }
              }
              $swidth = get_post_meta( $post->ID, '_kad_posthead_width', true );
              if (!empty($swidth)) {
                $slidewidth = $swidth;
              } else {
                $slidewidth = $slide_sidebar;
              } 
        } else {
                  $headcontent = 'none';
        } ?>
        <div id="content" class="container">
          <div class="row single-article" itemscope="" itemtype="http://schema.org/BlogPosting">
            <div class="main <?php echo esc_attr( pinnacle_main_class() ); ?>" role="main">
              <?php while (have_posts()) : the_post(); ?>
                <article <?php post_class('postclass'); ?>>
                  <?php if ($headcontent == 'flex') { ?>
                    <section class="postfeat">
                      <div class="flexslider kt-flexslider loading kad-light-gallery" style="max-width:<?php echo esc_attr($slidewidth);?>px;" data-flex-speed="7000" data-flex-anim-speed="400" data-flex-animation="fade" data-flex-auto="true">
                        <ul class="slides">
                          <?php $image_gallery = get_post_meta( $post->ID, '_kad_image_gallery', true );
                                  if(!empty($image_gallery)) {
                                    $attachments = array_filter( explode( ',', $image_gallery ) );
                                      if ($attachments) {
                                      foreach ($attachments as $attachment) {
                                        $attachment_url = wp_get_attachment_url($attachment , 'full');
                                        $image = aq_resize($attachment_url, $slidewidth, $slideheight, true);
                                          if(empty($image)) {$image = $attachment_url;}
                                        echo '<li><a href="'.esc_attr($attachment_url).'" data-rel="lightbox"><img src="'.esc_attr($image).'" width="'.esc_attr($slidewidth).'" height="'.esc_attr($slideheight).'" itemprop="image"/></a></li>';
                                      }
                                    }
                                  }?>                            
                        </ul>
                      </div> <!--Flex Slides-->
                    </section>
                  <?php } else if ($headcontent == 'carouselslider') { ?>
                    <section class="postfeat">
                      <div id="imageslider" class="loading">
                        <div class="carousel_slider_outer fredcarousel fadein-carousel" style="overflow:hidden; max-width:<?php echo esc_attr($slidewidth);?>px; height: <?php echo esc_attr($slideheight);?>px; margin-left: auto; margin-right:auto;">
                            <div class="carousel_slider initcarouselslider" data-carousel-container=".carousel_slider_outer" data-carousel-transition="600" data-carousel-height="<?php echo esc_attr($slideheight); ?>" data-carousel-auto="true" data-carousel-speed="9000" data-carousel-id="carouselslider">
                                <?php $image_gallery = get_post_meta( $post->ID, '_kad_image_gallery', true );
                                      if(!empty($image_gallery)) {
                                          $attachments = array_filter( explode( ',', $image_gallery ) );
                                            if ($attachments) {
                                              foreach ($attachments as $attachment) {
                                                    $attachment_url = wp_get_attachment_url($attachment , 'full');
                                                    $image = aq_resize($attachment_url, null, $slideheight, false, false);
                                                    if(empty($image)) {$image = array($attachment_url,$slidewidth,$slideheight);} 
                                                    echo '<div class="carousel_gallery_item" style="float:left; display: table; position: relative; text-align: center; margin: 0; width:auto; height:'.esc_attr($image[2]).'px;">';
                                                    echo '<div class="carousel_gallery_item_inner" style="vertical-align: middle; display: table-cell;">';
                                                    echo '<img src="'.esc_attr($image[0]).'" width="'.esc_attr($image[1]).'" height="'.esc_attr($image[2]).'" itemprop="image" />';
                                                      ?>
                                                    </div>
                                                  </div>
                                      <?php } } }?>
                            </div>
                            <div class="clearfix"></div>
                              <a id="prevport-carouselslider" class="prev_carousel icon-angle-left" href="#"></a>
                              <a id="nextport-carouselslider" class="next_carousel icon-angle-right" href="#"></a>
                          </div> 
                      </div>  
                    </section>
                  <?php } else if ($headcontent == 'video') { ?>
                    <section class="postfeat">
                        <div class="videofit" style="max-width: <?php echo esc_attr($slidewidth);?>px; margin-left: auto; margin-right: auto;">
                              <?php echo get_post_meta( $post->ID, '_kad_post_video', true ); ?>
                        </div>
                    </section>
                  <?php } else if ($headcontent == 'image') {           
                    $thumb = get_post_thumbnail_id();
                    $img_url = wp_get_attachment_url( $thumb,'full' );
                    $image = aq_resize( $img_url, $slidewidth, false );
                    if(empty($image)) { $image = $img_url; }
                    if($image) : ?>
                    <section class="postfeat">
                        <div class="imghoverclass post-single-img" itemprop="image">
                            <a href="<?php echo esc_url($img_url); ?>" data-rel="lightbox" class="">
                              <img src="<?php echo esc_url($image); ?>" itemprop="image" alt="<?php the_title(); ?>" />
                            </a>
                          </div>
                    </section>
                    <?php endif; ?>
                  <?php } ?>
                  <?php if(isset($pinnacle['hide_author_img']) && $pinnacle['hide_author_img'] == '1') { 
                          get_template_part('templates/entry', 'meta-author'); 
                  } ?>
                  <header>
                      <?php if(isset($pinnacle['single_post_title_output']) && $pinnacle['single_post_title_output'] == 'h2' ) { ?>
                      <h2 class="entry-title" itemprop="name headline"><?php the_title(); ?></h2>
                      <?php 
                      } else if(isset($pinnacle['single_post_title_output']) && $pinnacle['single_post_title_output'] == 'none' ) {
                        // Do nothing
                      } else { ?>
                      <h1 class="entry-title" itemprop="name headline"><?php the_title(); ?></h1>
                      <?php } ?>
                      <?php get_template_part('templates/entry', 'meta-subhead'); ?>
                  </header>
                  <div class="entry-content clearfix" itemprop="description articleBody">
                    <?php the_content(); ?>
                    <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'pinnacle'), 'after' => '</p></nav>')); ?>
                  </div>
                  <footer class="single-footer clearfix">
                    <?php get_template_part('templates/entry', 'meta-footer'); ?>
                  </footer>
                </article>
                <?php if(isset($pinnacle['show_postlinks']) &&  $pinnacle['show_postlinks'] == 1) {
                          get_template_part('templates/entry', 'post-links'); 
                }
                $authorbox = get_post_meta( $post->ID, '_kad_blog_author', true );
                $blog_carousel_recent = get_post_meta( $post->ID, '_kad_blog_carousel_similar', true ); 
                if(empty($authorbox) || $authorbox == 'default') {
                  if(isset($pinnacle['post_author_default']) && ($pinnacle['post_author_default'] == 'yes')) {
                    pinnacle_author_box(); 
                  }
                } else if($authorbox == 'yes'){
                  pinnacle_author_box();
                } 
                if(empty($blog_carousel_recent) || $blog_carousel_recent == 'default' ) { 
                  if(isset($pinnacle['post_carousel_default'])) {
                      $blog_carousel_recent = $pinnacle['post_carousel_default']; 
                  } 
                }
                if ($blog_carousel_recent == 'similar') {
                  get_template_part('templates/similarblog', 'carousel'); 
                } else if( $blog_carousel_recent == 'recent') {
                  get_template_part('templates/recentblog', 'carousel');
                } ?>
                 <?php comments_template('/templates/comments.php'); ?>
            <?php endwhile; ?>
          </div>

