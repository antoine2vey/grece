  <?php get_header(); ?>
      <?php get_template_part('templates/page', 'header'); ?>
      <div id="content" class="container">
        <div class="row">
          <div class="main <?php echo esc_attr( pinnacle_main_class() ); ?>  postlist" role="main">
            <div class="entry-content" itemprop="mainContentOfPage">
            
            <?php if (!have_posts()) : ?>
                <div class="alert">
                  <?php _e('Sorry, no results were found.', 'pinnacle'); ?>
                </div>
                <?php get_search_form(); ?>
            <?php endif; ?>

            <?php while (have_posts()) : the_post(); ?>
              <?php get_template_part('templates/content', get_post_format()); ?>
            <?php endwhile; ?>

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
            </div>
          </div><!-- /.main -->
          <?php get_sidebar(); ?>
        </div><!-- /.row-->
      </div><!-- /.content -->
    </div><!-- /.wrap -->
    <?php get_footer(); ?>