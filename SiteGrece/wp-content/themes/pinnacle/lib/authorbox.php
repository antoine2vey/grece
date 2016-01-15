<?php

function pinnacle_author_box() { ?>
<div class="author-box">
	<ul class="nav nav-tabs" id="authorTab">
    <li class="active"><a href="#about"><?php _e('About Author', 'pinnacle'); ?></a></li>
    <li><a href="#latest"><?php _e('Latest Posts', 'pinnacle'); ?></a></li>
  </ul>
  <div class="tab-content postclass">
    <div class="tab-pane clearfix active" id="about">
    	<div class="author-profile vcard">
  		<?php echo get_avatar( get_the_author_meta('ID'), 80 ); ?>
          <div class="author-follow"><span class="followtext"><?php _e('Follow', 'pinnacle'); ?> <?php the_author_meta( 'display_name' ); ?>:</span>
          <?php if ( get_the_author_meta( 'facebook' ) ) { ?>
  			<span class="facebooklink">
  				<a href="<?php esc_url(the_author_meta( 'facebook' )); ?>" target="_blank" title="<?php _e('Follow', 'pinnacle'); ?>  <?php the_author_meta( 'display_name' ); ?> <?php _e('on Facebook', 'pinnacle');?>"><i class="icon-facebook"></i></a>
  			</span>
              <?php } if ( get_the_author_meta( 'twitter' ) ) { ?>
              <span class="twitterlink">
  				<a href="http://twitter.com/<?php esc_url(the_author_meta( 'twitter' )); ?>" target="_blank" title="<?php _e('Follow', 'pinnacle'); ?>  <?php the_author_meta( 'display_name' ); ?> <?php _e('on Twitter', 'pinnacle');?>"><i class="icon-twitter"></i></a>
  			</span>
              <?php } if ( get_the_author_meta( 'google' ) ) { ?>
              <span class="googlepluslink">
  				<a href="<?php esc_url(the_author_meta( 'google' )); ?>" target="_blank" title="<?php _e('Follow', 'pinnacle'); ?>  <?php the_author_meta( 'display_name' ); ?> <?php _e('on Google Plus', 'pinnacle');?>"><i class="icon-google-plus"></i></a>
  			</span>
              <?php } if ( get_the_author_meta( 'youtube' ) ) { ?>
              <span class="youtubelink">
          <a href="<?php esc_url(the_author_meta( 'youtube' )); ?>" target="_blank" title="<?php _e('Follow', 'pinnacle'); ?>  <?php the_author_meta( 'display_name' ); ?> <?php _e('on YouTube', 'pinnacle');?>"><i class="icon-youtube"></i></a>
        </span>
              <?php } if ( get_the_author_meta( 'flickr' ) ) { ?>
              <span class="flickrlink">
  				<a href="<?php esc_url(the_author_meta( 'flickr' )); ?>" target="_blank" title="<?php _e('Follow', 'pinnacle'); ?>  <?php the_author_meta( 'display_name' ); ?> <?php _e('on Flickr', 'pinnacle');?>"><i class="icon-flickr2"></i></a>
  			</span>
              <?php } if ( get_the_author_meta( 'vimeo' ) ) { ?>
              <span class="vimeolink">
  				<a href="<?php esc_url(the_author_meta( 'vimeo' )); ?>" target="_blank" title="<?php _e('Follow', 'pinnacle'); ?>  <?php the_author_meta( 'display_name' ); ?> <?php _e('on Vimeo', 'pinnacle');?>"><i class="icon-vimeo"></i></a>
  			</span>
              <?php } if ( get_the_author_meta( 'linkedin' ) ) { ?>
              <span class="linkedinlink">
  				<a href="<?php esc_url(the_author_meta( 'linkedin' )); ?>" target="_blank" title="<?php _e('Follow', 'pinnacle'); ?>  <?php the_author_meta( 'display_name' ); ?> <?php _e('on linkedin', 'pinnacle');?>"><i class="icon-linkedin"></i></a>
  			</span>
              <?php } if ( get_the_author_meta( 'dribbble' ) ) { ?>
              <span class="dribbblelink">
  				<a href="<?php esc_url(the_author_meta( 'dribbble' )); ?>" target="_blank" title="<?php _e('Follow', 'pinnacle'); ?>  <?php the_author_meta( 'display_name' ); ?> <?php _e('on Dribbble', 'pinnacle');?>"><i class="icon-dribbble"></i></a>
  			</span>
        <?php } if ( get_the_author_meta( 'pinterest' ) ) { ?>
              <span class="pinterestlink">
  				<a href="<?php esc_url(the_author_meta( 'pinterest' )); ?>" target="_blank" title="<?php _e('Follow', 'pinnacle'); ?>  <?php the_author_meta( 'display_name' ); ?> <?php _e('on Pinterest', 'pinnacle');?>"><i class="icon-pinterest"></i></a>
  			</span>
        <?php } if ( get_the_author_meta( 'instagram' ) ) { ?>
        <span class="instagramlink">
          <a href="<?php esc_url(the_author_meta( 'instagram' )); ?>" target="_blank" title="<?php _e('Follow', 'pinnacle'); ?>  <?php the_author_meta( 'display_name' ); ?> <?php _e('on Instagram', 'pinnacle');?>"><i class="icon-instagram"></i></a>
        </span>
  		<?php } ?>
          </div><!--Author Follow-->

  		<h5 class="author-name"><?php the_author_posts_link(); ?></h5>
          <?php if ( get_the_author_meta( 'occupation' ) ) { ?>
          <p class="author-occupation"><strong><?php the_author_meta( 'occupation' ); ?></strong></p>
          <?php } ?>
  		<p class="author-description author-bio">
  			<?php the_author_meta( 'description' ); ?>
  		</p>
      </div>
     </div><!--pane-->
    <div class="tab-pane clearfix" id="latest">
      <div class="author-latestposts">
        <?php echo get_avatar( get_the_author_meta('ID'), 80 ); ?>
        <h5><?php _e('Latest posts from', 'pinnacle'); ?> <?php the_author_posts_link(); ?></h5>
    			<ul>
  			   <?php
            global $authordata, $post;
            $temp     = null; 
            $wp_query = null; 
            $wp_query = new WP_Query();
            $wp_query->query(array(
              'author'          => $authordata->ID,
              'posts_per_page'  =>3
              )
            );
            if ( $wp_query ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
              <li>
                <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
                <span class="recentpost-date"> - <?php echo get_the_time('F j, Y'); ?></span>
              </li>
            <?php endwhile; 
            endif; 
            $wp_query = null; 
            $wp_query = $temp;
            wp_reset_query(); ?>
  			   </ul>
  	   </div><!--Latest Post -->
    </div><!--Latest pane -->
  </div><!--Tab content -->
</div><!--Author Box -->
 <?php } ?>