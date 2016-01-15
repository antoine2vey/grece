  <?php get_header();
    
    get_template_part('templates/page', 'header');
      
      global $pinnacle, $postcolumn; 
      if(pinnacle_display_sidebar()) {
        $display_sidebar = true;
        $fullclass = '';
      } else {$display_sidebar = false;
        $fullclass = 'fullwidth';
      }
      if(isset($pinnacle['category_post_summary']) && $pinnacle['category_post_summary'] == 'full'){
        $summary = 'full'; $postclass = "single-article fullpost";
      } else if(isset($pinnacle['category_post_summary']) && $pinnacle['category_post_summary'] == 'grid'){
          if(isset($pinnacle['category_post_grid_columns'])) {
            $blog_grid_column = $pinnacle['category_post_grid_columns'];
          } else {
            $blog_grid_column = '3';
          }
          $summary = 'grid';
          $postclass = 'postlist';
          if ($blog_grid_column == '2') {
            $itemsize = 'tcol-md-6 tcol-sm-6 tcol-xs-12 tcol-ss-12'; 
            $postcolumn = '2';
          } else if ($blog_grid_column == '3'){
            $itemsize = 'tcol-md-4 tcol-sm-4 tcol-xs-6 tcol-ss-12'; 
            $postcolumn = '3';
          } else {
            $itemsize = 'tcol-md-3 tcol-sm-4 tcol-xs-6 tcol-ss-12';
            $postcolumn = '4';
          }
      } else { 
        $summary = 'normal'; 
        $postclass = 'postlist';
      } ?>
          <div id="content" class="container">
            <div class="row">
              <div class="main <?php echo esc_attr( pinnacle_main_class() ); ?>  <?php echo esc_attr($postclass) .' '. esc_attr($fullclass); ?>" role="main">

                <?php if (!have_posts()) : ?>
                    <div class="alert">
                      <?php _e('Sorry, no results were found.', 'pinnacle'); ?>
                    </div>
                    <?php get_search_form(); ?>
                <?php endif; ?>

                <?php if($summary == 'full'){
                        if($display_sidebar){
                           while (have_posts()) : the_post();
                              get_template_part('templates/content', 'fullpost'); 
                           endwhile;
                        } else {
                            while (have_posts()) : the_post(); 
                              get_template_part('templates/content', 'fullpostfull');
                            endwhile;
                        }
                } else if($summary == 'grid') { ?>
                        <div id="kad-blog-grid" class="rowtight init-masonry" data-masonry-selector=".b_item">
                            <?php while (have_posts()) : the_post(); ?>
                                <div class="<?php echo esc_attr($itemsize);?> b_item kad_blog_item">
                                 <?php  get_template_part('templates/content', 'post-grid'); ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                <?php } else {
                        if($display_sidebar){
                             while (have_posts()) : the_post();
                                  get_template_part('templates/content', get_post_format());
                             endwhile;
                        } else {
                              while (have_posts()) : the_post(); 
                                  get_template_part('templates/content', 'fullwidth');
                              endwhile;
                        }
                }
                if ($wp_query->max_num_pages > 1) : 
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
