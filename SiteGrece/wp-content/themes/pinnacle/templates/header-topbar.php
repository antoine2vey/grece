<?php global $pinnacle; ?>
<section id="topbar" class="topclass">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-ss-6 kad-topbar-left">
          <div class="topbar_social_area topbar-widget clearfix">
            <?php if(pinnacle_display_topbar_widget()) { 
                    if(is_active_sidebar('topbarright')) { 
                      dynamic_sidebar('topbarright');
                    } 
                  }
            if(pinnacle_display_topbar_icons()) : ?>
              <div class="topbar_social">
                <ul class="topbarsociallinks">
                  <?php $top_icons = $pinnacle['topbar_icon_menu'];
                  foreach ($top_icons as $top_icon) {
                    if(!empty($top_icon['target']) && $top_icon['target'] == 1) {
                      $target = '_blank';
                    } else {
                      $target = '_self';
                    }

                    echo '<li class="kad-tbicon-links"><a href="'.esc_attr($top_icon['link']).'" class="kad-color-'.esc_attr($top_icon['icon_o']).'" data-toggle="tooltip" data-placement="bottom" target="'.esc_attr($target).'" data-original-title="'.esc_attr($top_icon['title']).'">';
                    if(!empty($top_icon['url'])) {
                      echo '<img src="'.esc_url($top_icon['url']).'"/>' ;
                    } else { 
                      echo '<i class="'.esc_attr($top_icon['icon_o']).'"></i>';
                    }
                    echo '</a></li>';
                  } ?>
                </ul>
              </div>
            <?php endif; ?>
          </div>
        </div><!-- close col-md-6 -->
        <div class="col-md-6 col-ss-6 kad-topbar-right">
          <div id="topbar-search" class="topbar-right-search clearfix">
            <?php if(pinnacle_display_top_search()) { ?>
              <div id="kt-searchcontain" class="panel">
                <ul class="kad-topsearch-button">
                    <li>
                      <a class="top-menu-search-btn collapsed" data-toggle="collapse" data-parent="#topbar-search" data-target="#kad-top-search-popup"><i class="icon-search"></i></a>
                    </li>
                </ul>
                <div id="kad-top-search-popup" class="collapse topclass">
                <?php get_search_form();?>
                </div>
              </div>
            <?php } 
            if(isset($pinnacle['show_cartcount']) && $pinnacle['show_cartcount'] == '1') { 
              if (class_exists('woocommerce')) {
              global $pinnacle, $woocommerce; ?>
                  <div id="kt-cartcontain" class="panel">
                    <ul class="kad-cart-total">
                      <li>
                        <a class="top-menu-cart-btn collapsed" data-toggle="collapse" data-parent="#topbar-search" data-target="#kad-top-cart-popup">
                            <i class="icon-shopping-cart"></i><span class="kt-cart-total"> <?php echo $woocommerce->cart->cart_contents_count; ?> </span> 
                        </a>
                      </li>
                    </ul>
                    <div id="kad-top-cart-popup" class="collapse">
                      <div id="kad-top-cart-popup-inner">
                        <div class="kt-header-mini-cart-refreash">
                          <?php woocommerce_mini_cart();?>
                        </div>
                      </div>
                    </div>
                  </div>
              <?php  }
            }

            if (has_nav_menu('topbar_navigation')) :
                wp_nav_menu(array('theme_location' => 'topbar_navigation', 'menu_class' => 'sf-menu topbmenu')); ?>
                <div id="mobile-nav-trigger" class="nav-trigger">
                  <a class="nav-trigger-case" data-toggle="collapse" rel="nofollow" data-target=".top_mobile_menu_collapse">
                    <div class="kad-navbtn clearfix">
                      <i class="icon-reorder"></i>
                    </div>
                  </a>
                </div>
            <?php endif;?>
          </div>
        </div> <!-- close col-md-6-->
      </div> <!-- Close Row -->
      <?php if (has_nav_menu('topbar_navigation')) :?>
        <div id="kad-mobile-nav" class="kad-mobile-nav">
              <div class="kad-nav-inner mobileclass">
                <div id="mobile_menu_collapse_top" class="kad-nav-collapse collapse top_mobile_menu_collapse">
                  <?php wp_nav_menu(array('theme_location' => 'topbar_navigation','items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 'menu_class' => 'kad-top-mnav'));?>
               </div>
            </div>
        </div>
    <?php endif;?>
    </div> <!-- Close Container -->
  </section>