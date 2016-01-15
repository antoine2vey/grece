  <?php get_header(); ?>
      <?php get_template_part('templates/page', 'header'); ?>
      <div id="content" class="container">
        <div class="row">

            <?php $homeid = get_option( 'page_for_posts' );
              if(get_post_meta( $homeid, '_kad_blog_summery', true ) == 'full') {
                $summary = 'full'; $postclass = "single-article fullpost";
              } else {
                $summary = 'normal'; $postclass = 'postlist';
              } ?>
      
              <div class="main <?php echo esc_attr( pinnacle_main_class() ); ?> <?php echo esc_attr($postclass) .' '. esc_attr($fullclass); ?>" role="main">
            
            <?php if (!have_posts()) : ?>
                <div class="alert">
                  <?php _e('Sorry, no results were found.', 'pinnacle'); ?>
                </div>
                <?php get_search_form(); ?>
            <?php endif; ?>

            <?php if($summary == 'full'){
                      while (have_posts()) : the_post(); 
                          get_template_part('templates/content', 'fullpost'); 
                      endwhile; 
                  } else {
                      while (have_posts()) : the_post(); 
                          get_template_part('templates/content', get_post_format());
                      endwhile; 
                  }?>

            <?php if ($wp_query->max_num_pages > 1) :
                      if(function_exists('pinnacle_wp_pagination')) {
                          pinnacle_wp_pagination();   
                      } else { ?>      
                          <nav class="post-nav">
                            <ul class="pager">
                              <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'pinnacle')); ?></li>
                              <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'pinnacle')); ?></li>
                            </ul>
                          </nav>
                      <?php } 
                  endif; ?>

          </div><!-- /.main -->
          <?php get_sidebar(); ?>
        </div><!-- /.row-->
      </div><!-- /.content -->
    </div><!-- /.wrap -->
    <?php get_footer(); ?>