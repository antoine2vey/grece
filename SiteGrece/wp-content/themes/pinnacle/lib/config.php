<?php
/**
 * Configuration values
 */

define('POST_EXCERPT_LENGTH', 40);


/**
 * .main classes
 */
function pinnacle_main_class() {
  if (pinnacle_display_sidebar()) {
    // Classes on pages with the sidebar
    $class = 'col-lg-9 col-md-8 kt-sidebar';
  } else {
    // Classes on full width pages
    $class = 'col-md-12 kt-nosidebar';
  }

  return $class;
}

/**
 * .sidebar classes
 */
function pinnacle_sidebar_class() {
  return 'col-lg-3 col-md-4';
}

/**
 * Define which pages shouldn't have the sidebar
 *
 * See lib/sidebar.php for more details
 */
function pinnacle_display_sidebar() {
   if (class_exists('woocommerce'))  {
        $sidebar_config = new Kadence_Sidebar(
        array('pinnacle_sidebar_page_woo','pinnacle_sidebar_on_archive_page','pinnacle_sidebar_on_shop_page','pinnacle_sidebar_on_shop_cat_page','pinnacle_sidebar_on_post','is_404','is_product','pinnacle_sidebar_on_home_page','pinnacle_sidebar_on_myaccount_page','is_cart','is_checkout',array('is_singular', array('portfolio')),array('is_singular', array('kadslider')), array('is_tax', array('portfolio-type'))
        ),
        array('template-portfolio-grid.php','template-contact.php')
      );
  } else {
  $sidebar_config = new Kadence_Sidebar(
    array('pinnacle_sidebar_page', 'pinnacle_sidebar_on_post','is_404','pinnacle_sidebar_on_archive_page_noshop','pinnacle_sidebar_on_home_page', array('is_singular', array('portfolio')), array('is_singular', array('kadslider')), array('is_tax', array('portfolio-type'))
      ),
    array('template-portfolio-grid.php','template-contact.php' )
  );
}

  return apply_filters('kadence_display_sidebar', $sidebar_config->display);
}

function pinnacle_sidebar_on_shop_page() {
  if( is_shop() ) {
  global $pinnacle; 
    if(isset($pinnacle['shop_layout']) && $pinnacle['shop_layout'] == 'sidebar') {
        return false;
      } else {
        return true;
    }
  }
}
function pinnacle_sidebar_page_woo() {
  if( is_page() && !is_page_template('template-portfolio-grid.php') && !is_page_template('template-contact.php') && !is_account_page() && !is_shop() && !is_front_page() ) {
  global $post; 
  $postsidebar = get_post_meta( $post->ID, '_kad_page_sidebar', true );
      if(isset($postsidebar) && $postsidebar == 'yes') {
        return false;
        } else {
        return true;
        }
  }
}
function pinnacle_sidebar_page() {
  if( is_page() && !is_page_template('template-portfolio-grid.php') && !is_page_template('template-contact.php') && !is_front_page() ) {
  global $post; 
  $postsidebar = get_post_meta( $post->ID, '_kad_page_sidebar', true );
      if(isset($postsidebar) && $postsidebar == 'yes') {
        return false;
        } else {
        return true;
        }
  }
}
function pinnacle_sidebar_on_shop_cat_page() {
  if(is_product_category() || is_product_tag()) {
  global $pinnacle; 
    if(isset($pinnacle['shop_cat_layout']) && $pinnacle['shop_cat_layout'] == 'sidebar') {
        return false;
      } else {
        return true;
    }
  }
}
function pinnacle_sidebar_on_myaccount_page() {
  if(is_account_page()) {
    $current_user = wp_get_current_user();
        if ( 0 == $current_user->ID ) {
            return true;
        } else { 
            return false;
        }
   }
}
function pinnacle_sidebar_on_post() {
  if(is_single() ) {
    global $post;
    $postsidebar = get_post_meta( $post->ID, '_kad_post_sidebar', true );
      if(isset($postsidebar) && $postsidebar == 'no') {
        return true;
        } else if(isset($postsidebar) && $postsidebar == 'default') {
          global $pinnacle;
          if(isset($pinnacle['blogpost_sidebar_default']) && $pinnacle['blogpost_sidebar_default'] == 'no') {
            return true;
          } else {
            return false;
          }
        } else {
          return false;
        }
      }
}

function pinnacle_sidebar_on_home_page() {
  if(is_front_page()) {
      global $pinnacle; 
      if(isset($pinnacle['home_sidebar_layout']) && $pinnacle['home_sidebar_layout'] == 'sidebar') {
        return false;
        } else {
          return true;
        }
   }
}
function pinnacle_sidebar_on_archive_page() {
  if(is_archive() && !is_shop() && !is_product_category() && !is_product_tag()) {
      global $pinnacle; 
      if(isset($pinnacle['blog_cat_layout']) && $pinnacle['blog_cat_layout'] == 'sidebar') {
        return false;
        } else {
          return true;
        }
   }
}
function pinnacle_sidebar_on_archive_page_noshop() {
  if(is_archive()) {
      global $pinnacle; 
      if(isset($pinnacle['blog_cat_layout']) && $pinnacle['blog_cat_layout'] == 'sidebar') {
        return false;
        } else {
          return true;
        }
   }
}
function pinnacle_shop_layout_css() {
  global $pinnacle;
  if(pinnacle_display_sidebar()) {
          if(isset($pinnacle['product_shop_layout'])) {
            $columns = "shopcolumn".$pinnacle['product_shop_layout']." shopsidebarwidth"; 
          } else {$columns = "shopcolumn4 shopsidebarwidth"; }
      } else {
         if(isset($pinnacle['product_shop_layout'])) { $columns = "shopcolumn".$pinnacle['product_shop_layout']." shopfullwidth"; 
          } else { $columns = "shopcolumn4 shopfullwidth";  }
      }

  return $columns;
}
function pinnacle_category_layout_css() {
  global $pinnacle;
  if(pinnacle_display_sidebar()) {
          if(isset($pinnacle['product_shop_layout']) && $pinnacle['product_shop_layout'] == "single") {
            $columns = "s-threecolumn"; 
          } else {
            $columns = "s-threecolumn"; 
          }
    } else {
        if(isset($pinnacle['product_shop_layout']) && $pinnacle['product_shop_layout'] == "single") {
            $columns = "fourcolumn"; 
          } else {
            $columns = "fourcolumn";
          }
        }

  return $columns;
}

function pinnacle_display_topbar() {
  global $pinnacle;
   if(isset($pinnacle['topbar'])) {
  if($pinnacle['topbar'] == 1 ) {$topbar = true;} else { $topbar = false;}
} else {$topbar = true;}
  return $topbar;
  }
function pinnacle_display_topbar_icons() {
  global $pinnacle;
 if(isset($pinnacle['topbar_icons'])) {
  if($pinnacle['topbar_icons'] == 1 ) {$topbaricons = true;} else { $topbaricons = false;}
} else {$topbaricons = false;}
  return $topbaricons;
  }
  function pinnacle_display_top_search() {
  global $pinnacle;
 if(isset($pinnacle['topbar_search'])) {
  if($pinnacle['topbar_search'] == 1 ) {$topsearch = true;} else { $topsearch = false;}
} else {$topsearch = true;}
  return $topsearch;
  }
function pinnacle_display_topbar_widget() {
  global $pinnacle;
 if(isset($pinnacle['topbar_widget'])) {
  if($pinnacle['topbar_widget'] == 1 ) {$topbarwidget = true;} else { $topbarwidget = false;}
} else {$topbarwidget = false;}
  return $topbarwidget;
  }
function pinnacle_hide_pagetitle() {
  if( is_front_page() ) {
    global $pinnacle;
    if(isset($pinnacle['choose_home_header']) && $pinnacle['choose_home_header'] == 'none') {
        $pagetitledisplay = false;
    } else {
        $pagetitledisplay = true;
    }
  } else if(is_page() && !is_front_page() ) {
    global $post, $pinnacle;
    $hidepagetitle = get_post_meta( $post->ID, '_kad_pagetitle_hide', true );
      if(isset($hidepagetitle) && $hidepagetitle == 'hide') {
        $pagetitledisplay = false;
      } else if(isset($hidepagetitle) && $hidepagetitle == 'show') {
        $pagetitledisplay = true;
      } else {
           if(isset($pinnacle['default_showpagetitle']) && $pinnacle['default_showpagetitle'] == '0') {
            $pagetitledisplay = false;
            } else {
            $pagetitledisplay = true;
            }
      }
    }else if (is_singular('product') ) {
     global $post, $pinnacle;
      $hidepagetitle = get_post_meta( $post->ID, '_kad_pagetitle_hide', true );
      if(isset($hidepagetitle) && $hidepagetitle == 'hide') {
        $pagetitledisplay = false;
      } else if(isset($hidepagetitle) && $hidepagetitle == 'show') {
        $pagetitledisplay = true;
      } else {
           if(isset($pinnacle['default_showproducttitle']) && $pinnacle['default_showproducttitle'] == '0') {
            $pagetitledisplay = false;
            } else {
            $pagetitledisplay = true;
            }
      }
  } else if(is_post_type_archive('product_cat', 'product_tag','category', 'post_tag')) {
    global $pinnacle;
       if(isset($pinnacle['default_showpagetitle']) && $pinnacle['default_showpagetitle'] == '0') {
            $pagetitledisplay = false;
        } else {
            $pagetitledisplay = true;
        }
  }else if (is_single() ) {
     global $post, $pinnacle;
    $hidepagetitle = get_post_meta( $post->ID, '_kad_pagetitle_hide', true );
      if(isset($hidepagetitle) && $hidepagetitle == 'hide') {
        $pagetitledisplay = false;
      } else if(isset($hidepagetitle) && $hidepagetitle == 'show') {
        $pagetitledisplay = true;
      } else {
           if(isset($pinnacle['default_showposttitle']) && $pinnacle['default_showposttitle'] == '0') {
            $pagetitledisplay = false;
            } else {
            $pagetitledisplay = true;
            }
      }
   } else if (class_exists('woocommerce') && is_shop())  {
                  $shop_page_id = woocommerce_get_page_id('shop');
                  $hide = get_post_meta( $shop_page_id, '_kad_pagetitle_hide', true );
                    if(isset($hide) && $hide == 'hide') {
                      $pagetitledisplay = false;
                    } else {
                      $pagetitledisplay = true;
                    }
  } else {
    global $pinnacle;
      if(isset($pinnacle['default_showpagetitle']) && $pinnacle['default_showpagetitle'] == '0') {
            $pagetitledisplay = false;
      } else {
            $pagetitledisplay = true;
      }
  }

  return apply_filters('kadence_pagetitle_display', $pagetitledisplay);
}
function pinnacle_pagetitle_behind_header() {
  if(!pinnacle_hide_pagetitle()) {
    $pageheaderbg = false;
  } else {
    if(is_front_page()) {
      global $pinnacle;
                if(isset($pinnacle['hs_behindheader']) && $pinnacle['hs_behindheader'] == '0') {
                  $pageheaderbg = false;
                } else {
                  $pageheaderbg = true;
                }
      } elseif(is_page() || is_single() || is_singular() ) {
        global $post, $pinnacle;
              $hs_behind = get_post_meta( $post->ID, '_kad_pagetitle_behind_head', true );
              if(isset($hs_behind) && $hs_behind == 'true') {
                $pageheaderbg = true;
              } else if(isset($hs_behind) && $hs_behind == 'false') {
                $pageheaderbg = false;
              } else {
                if(isset($pinnacle['pagetitle_intoheader']) && $pinnacle['pagetitle_intoheader'] == '0') {
                  $pageheaderbg = false;
                } else {
                  $pageheaderbg = true;
                }
              }
      } else {
        global $pinnacle;
        if(isset($pinnacle['pagetitle_intoheader']) && $pinnacle['pagetitle_intoheader'] == '0') {
                  $pageheaderbg = false;
                } else {
                  $pageheaderbg = true;
                }
      }
  }
      return apply_filters('kadence_pagetitle_behindheader', $pageheaderbg);
}
function pinnacle_shop_behindheader($pageheaderbg) {
   if (class_exists('woocommerce'))  {
      if(is_shop()) {
              global $pinnacle;
              $shop_page_id = woocommerce_get_page_id('shop');
              $hs_behind = get_post_meta( $shop_page_id, '_kad_pagetitle_behind_head', true );
                if(isset($hs_behind) && $hs_behind == 'true') {
                  $pageheaderbg = true;
                } else if(isset($hs_behind) && $hs_behind == 'false') {
                 $pageheaderbg = false;
                } else {
                     if(isset($pinnacle['pagetitle_intoheader']) && $pinnacle['pagetitle_intoheader'] == '0') {
                      $pageheaderbg = false;
                    } else {
                      $pageheaderbg = true;
                    }
              }

      }
    }
    return $pageheaderbg;
}
add_filter('kadence_pagetitle_behindheader','pinnacle_shop_behindheader');

function pinnacle_header_height() {
  global $pinnacle;
    if(pinnacle_display_topbar()) {
        if(isset($pinnacle['topbar_height']) && isset($pinnacle['header_height'])) {
        $output = $pinnacle['topbar_height'] + $pinnacle['header_height'];
        } else {
          $output = '120';
        }
    } else {
         if(isset($pinnacle['header_height'])) {
          $output = $pinnacle['header_height'];
          } else {
           $output = '120';
          }
    }
    return $output;
  }
add_filter('body_class','kad_layout_body_class');
function kad_layout_body_class($classes) {
 global $pinnacle;
  if(pinnacle_pagetitle_behind_header()) {
    $pagetitlebg = 'trans-header';
  } else {
    $pagetitlebg = 'none-trans-header';
  }
$classes[] = 'wide';
  $classes[] = $pagetitlebg;

  return $classes;
}

/*  Browser detection body_class() output
/* ------------------------------------ */ 
function pinnacle_browser_body_class( $classes ) {
    global $is_IE;
    if($is_IE) {
        $browser = $_SERVER['HTTP_USER_AGENT'];
        $browser = substr( "$browser", 25, 8);
        if ($browser == "MSIE 7.0"  ) {
            $classes[] = 'ie7';
            $classes[] = 'ie';
        } elseif ($browser == "MSIE 6.0" ) {
            $classes[] = 'ie6';
            $classes[] = 'ie';
        } elseif ($browser == "MSIE 8.0" ) {
            $classes[] = 'ie8';
            $classes[] = 'ie';
        } elseif ($browser == "MSIE 9.0" ) {
            $classes[] = 'ie9';
            $classes[] = 'ie';
        } else {
            $classes[] = 'ie';
        }
    }
    else $classes[] = 'not_ie';

    return $classes;
}
add_filter( 'body_class', 'pinnacle_browser_body_class' );

function pinnacle_icon_list() {
$icons = array("icon-glass " => "icon-glass ", "icon-music " => "icon-music ", "icon-search " => "icon-search ", "icon-envelope-alt " => "icon-envelope-alt ", "icon-heart " => "icon-heart ", "icon-star " => "icon-star ", "icon-star-empty " => "icon-star-empty ", "icon-user " => "icon-user ", "icon-film " => "icon-film ", "icon-th-large " => "icon-th-large ", "icon-th " => "icon-th ", "icon-th-list " => "icon-th-list ", "icon-ok " => "icon-ok ", "icon-remove " => "icon-remove ", "icon-zoom-in " => "icon-zoom-in ", "icon-zoom-out " => "icon-zoom-out ", "icon-power-off" => "icon-power-off", "icon-off " => "icon-off ", "icon-signal " => "icon-signal ", "icon-gear" => "icon-gear", "icon-cog " => "icon-cog ", "icon-trash " => "icon-trash ", "icon-home " => "icon-home ", "icon-file-alt " => "icon-file-alt ", "icon-time " => "icon-time ", "icon-road " => "icon-road ", "icon-download-alt " => "icon-download-alt ", "icon-download " => "icon-download ", "icon-upload " => "icon-upload ", "icon-inbox " => "icon-inbox ", "icon-play-circle " => "icon-play-circle ", "icon-rotate-right" => "icon-rotate-right", "icon-repeat " => "icon-repeat ", "icon-refresh " => "icon-refresh ", "icon-list-alt " => "icon-list-alt ", "icon-lock " => "icon-lock ", "icon-flag " => "icon-flag ", "icon-headphones " => "icon-headphones ", "icon-volume-off " => "icon-volume-off ", "icon-volume-down " => "icon-volume-down ", "icon-volume-up " => "icon-volume-up ", "icon-qrcode " => "icon-qrcode ", "icon-barcode " => "icon-barcode ", "icon-tag " => "icon-tag ", "icon-tags " => "icon-tags ", "icon-book " => "icon-book ", "icon-bookmark " => "icon-bookmark ", "icon-print " => "icon-print ", "icon-camera " => "icon-camera ", "icon-font " => "icon-font ", "icon-bold " => "icon-bold ", "icon-italic " => "icon-italic ", "icon-text-height " => "icon-text-height ", "icon-text-width " => "icon-text-width ", "icon-align-left " => "icon-align-left ", "icon-align-center " => "icon-align-center ", "icon-align-right " => "icon-align-right ", "icon-align-justify " => "icon-align-justify ", "icon-list " => "icon-list ", "icon-indent-left " => "icon-indent-left ", "icon-indent-right " => "icon-indent-right ", "icon-facetime-video " => "icon-facetime-video ", "icon-picture " => "icon-picture ", "icon-pencil " => "icon-pencil ", "icon-map-marker " => "icon-map-marker ", "icon-adjust " => "icon-adjust ", "icon-tint " => "icon-tint ", "icon-edit " => "icon-edit ", "icon-share " => "icon-share ", "icon-check " => "icon-check ", "icon-move " => "icon-move ", "icon-step-backward " => "icon-step-backward ", "icon-fast-backward " => "icon-fast-backward ", "icon-backward " => "icon-backward ", "icon-play " => "icon-play ", "icon-pause " => "icon-pause ", "icon-stop " => "icon-stop ", "icon-forward " => "icon-forward ", "icon-fast-forward " => "icon-fast-forward ", "icon-step-forward " => "icon-step-forward ", "icon-eject " => "icon-eject ", "icon-chevron-left " => "icon-chevron-left ", "icon-chevron-right " => "icon-chevron-right ", "icon-plus-sign " => "icon-plus-sign ", "icon-minus-sign " => "icon-minus-sign ", "icon-remove-sign " => "icon-remove-sign ", "icon-ok-sign " => "icon-ok-sign ", "icon-question-sign " => "icon-question-sign ", "icon-info-sign " => "icon-info-sign ", "icon-screenshot " => "icon-screenshot ", "icon-remove-circle " => "icon-remove-circle ", "icon-ok-circle " => "icon-ok-circle ", "icon-ban-circle " => "icon-ban-circle ", "icon-arrow-left " => "icon-arrow-left ", "icon-arrow-right " => "icon-arrow-right ", "icon-arrow-up " => "icon-arrow-up ", "icon-arrow-down " => "icon-arrow-down ", "icon-mail-forward:before" => "icon-mail-forward:before", "icon-share-alt " => "icon-share-alt ", "icon-resize-full " => "icon-resize-full ", "icon-resize-small " => "icon-resize-small ", "icon-plus " => "icon-plus ", "icon-minus " => "icon-minus ", "icon-asterisk " => "icon-asterisk ", "icon-exclamation-sign " => "icon-exclamation-sign ", "icon-gift " => "icon-gift ", "icon-leaf " => "icon-leaf ", "icon-fire " => "icon-fire ", "icon-eye-open " => "icon-eye-open ", "icon-eye-close " => "icon-eye-close ", "icon-warning-sign " => "icon-warning-sign ", "icon-plane " => "icon-plane ", "icon-calendar " => "icon-calendar ", "icon-random " => "icon-random ", "icon-comment " => "icon-comment ", "icon-magnet " => "icon-magnet ", "icon-chevron-up " => "icon-chevron-up ", "icon-chevron-down " => "icon-chevron-down ", "icon-retweet " => "icon-retweet ", "icon-shopping-cart " => "icon-shopping-cart ", "icon-folder-close " => "icon-folder-close ", "icon-folder-open " => "icon-folder-open ", "icon-resize-vertical " => "icon-resize-vertical ", "icon-resize-horizontal " => "icon-resize-horizontal ", "icon-bar-chart " => "icon-bar-chart ", "icon-twitter-sign " => "icon-twitter-sign ", "icon-facebook-sign " => "icon-facebook-sign ", "icon-camera-retro " => "icon-camera-retro ", "icon-key " => "icon-key ", "icon-gears" => "icon-gears", "icon-cogs " => "icon-cogs ", "icon-comments " => "icon-comments ", "icon-thumbs-up-alt " => "icon-thumbs-up-alt ", "icon-thumbs-down-alt " => "icon-thumbs-down-alt ", "icon-star-half " => "icon-star-half ", "icon-heart-empty " => "icon-heart-empty ", "icon-signout " => "icon-signout ", "icon-linkedin-sign " => "icon-linkedin-sign ", "icon-pushpin " => "icon-pushpin ", "icon-external-link " => "icon-external-link ", "icon-signin " => "icon-signin ", "icon-trophy " => "icon-trophy ", "icon-github-sign " => "icon-github-sign ", "icon-upload-alt " => "icon-upload-alt ", "icon-lemon " => "icon-lemon ", "icon-phone " => "icon-phone ", "icon-unchecked" => "icon-unchecked", "icon-check-empty " => "icon-check-empty ", "icon-bookmark-empty " => "icon-bookmark-empty ", "icon-phone-sign " => "icon-phone-sign ", "icon-twitter " => "icon-twitter ", "icon-facebook " => "icon-facebook ", "icon-github " => "icon-github ", "icon-unlock " => "icon-unlock ", "icon-credit-card " => "icon-credit-card ", "icon-rss " => "icon-rss ", "icon-hdd " => "icon-hdd ", "icon-bullhorn " => "icon-bullhorn ", "icon-bell " => "icon-bell ", "icon-certificate " => "icon-certificate ", "icon-hand-right " => "icon-hand-right ", "icon-hand-left " => "icon-hand-left ", "icon-hand-up " => "icon-hand-up ", "icon-hand-down " => "icon-hand-down ", "icon-circle-arrow-left " => "icon-circle-arrow-left ", "icon-circle-arrow-right " => "icon-circle-arrow-right ", "icon-circle-arrow-up " => "icon-circle-arrow-up ", "icon-circle-arrow-down " => "icon-circle-arrow-down ", "icon-globe " => "icon-globe ", "icon-wrench " => "icon-wrench ", "icon-tasks " => "icon-tasks ", "icon-filter " => "icon-filter ", "icon-briefcase " => "icon-briefcase ", "icon-fullscreen " => "icon-fullscreen ", "icon-group " => "icon-group ", "icon-link " => "icon-link ", "icon-cloud " => "icon-cloud ", "icon-beaker " => "icon-beaker ", "icon-cut " => "icon-cut ", "icon-copy " => "icon-copy ", "icon-paperclip" => "icon-paperclip", "icon-paper-clip " => "icon-paper-clip ", "icon-save " => "icon-save ", "icon-sign-blank " => "icon-sign-blank ", "icon-reorder " => "icon-reorder ", "icon-list-ul " => "icon-list-ul ", "icon-list-ol " => "icon-list-ol ", "icon-strikethrough " => "icon-strikethrough ", "icon-underline " => "icon-underline ", "icon-table " => "icon-table ", "icon-magic " => "icon-magic ", "icon-truck " => "icon-truck ", "icon-pinterest " => "icon-pinterest ", "icon-pinterest-sign " => "icon-pinterest-sign ", "icon-google-plus-sign " => "icon-google-plus-sign ", "icon-google-plus " => "icon-google-plus ", "icon-money " => "icon-money ", "icon-caret-down " => "icon-caret-down ", "icon-caret-up " => "icon-caret-up ", "icon-caret-left " => "icon-caret-left ", "icon-caret-right " => "icon-caret-right ", "icon-columns " => "icon-columns ", "icon-sort " => "icon-sort ", "icon-sort-down " => "icon-sort-down ", "icon-sort-up " => "icon-sort-up ", "icon-envelope " => "icon-envelope ", "icon-linkedin " => "icon-linkedin ", "icon-rotate-left" => "icon-rotate-left", "icon-undo " => "icon-undo ", "icon-legal " => "icon-legal ", "icon-dashboard " => "icon-dashboard ", "icon-comment-alt " => "icon-comment-alt ", "icon-comments-alt " => "icon-comments-alt ", "icon-bolt " => "icon-bolt ", "icon-sitemap " => "icon-sitemap ", "icon-umbrella " => "icon-umbrella ", "icon-paste " => "icon-paste ", "icon-lightbulb " => "icon-lightbulb ", "icon-exchange " => "icon-exchange ", "icon-cloud-download " => "icon-cloud-download ", "icon-cloud-upload " => "icon-cloud-upload ", "icon-user-md " => "icon-user-md ", "icon-stethoscope " => "icon-stethoscope ", "icon-suitcase " => "icon-suitcase ", "icon-bell-alt " => "icon-bell-alt ", "icon-coffee " => "icon-coffee ", "icon-food " => "icon-food ", "icon-file-text-alt " => "icon-file-text-alt ", "icon-building " => "icon-building ", "icon-hospital " => "icon-hospital ", "icon-ambulance " => "icon-ambulance ", "icon-medkit " => "icon-medkit ", "icon-fighter-jet " => "icon-fighter-jet ", "icon-beer " => "icon-beer ", "icon-h-sign " => "icon-h-sign ", "icon-plus-sign-alt " => "icon-plus-sign-alt ", "icon-double-angle-left " => "icon-double-angle-left ", "icon-double-angle-right " => "icon-double-angle-right ", "icon-double-angle-up " => "icon-double-angle-up ", "icon-double-angle-down " => "icon-double-angle-down ", "icon-angle-left " => "icon-angle-left ", "icon-angle-right " => "icon-angle-right ", "icon-angle-up " => "icon-angle-up ", "icon-angle-down " => "icon-angle-down ", "icon-desktop " => "icon-desktop ", "icon-laptop " => "icon-laptop ", "icon-tablet " => "icon-tablet ", "icon-mobile-phone " => "icon-mobile-phone ", "icon-circle-blank " => "icon-circle-blank ", "icon-quote-left " => "icon-quote-left ", "icon-quote-right " => "icon-quote-right ", "icon-spinner " => "icon-spinner ", "icon-circle " => "icon-circle ", "icon-mail-reply" => "icon-mail-reply", "icon-reply " => "icon-reply ", "icon-github-alt " => "icon-github-alt ", "icon-folder-close-alt " => "icon-folder-close-alt ", "icon-folder-open-alt " => "icon-folder-open-alt ", "icon-expand-alt " => "icon-expand-alt ", "icon-collapse-alt " => "icon-collapse-alt ", "icon-smile " => "icon-smile ", "icon-frown " => "icon-frown ", "icon-meh " => "icon-meh ", "icon-gamepad " => "icon-gamepad ", "icon-keyboard " => "icon-keyboard ", "icon-flag-alt " => "icon-flag-alt ", "icon-flag-checkered " => "icon-flag-checkered ", "icon-terminal " => "icon-terminal ", "icon-code " => "icon-code ", "icon-reply-all " => "icon-reply-all ", "icon-mail-reply-all " => "icon-mail-reply-all ", "icon-star-half-full" => "icon-star-half-full", "icon-star-half-empty " => "icon-star-half-empty ", "icon-location-arrow " => "icon-location-arrow ", "icon-crop " => "icon-crop ", "icon-code-fork " => "icon-code-fork ", "icon-unlink " => "icon-unlink ", "icon-question " => "icon-question ", "icon-info " => "icon-info ", "icon-exclamation " => "icon-exclamation ", "icon-superscript " => "icon-superscript ", "icon-subscript " => "icon-subscript ", "icon-eraser " => "icon-eraser ", "icon-puzzle-piece " => "icon-puzzle-piece ", "icon-microphone " => "icon-microphone ", "icon-microphone-off " => "icon-microphone-off ", "icon-shield " => "icon-shield ", "icon-calendar-empty " => "icon-calendar-empty ", "icon-fire-extinguisher " => "icon-fire-extinguisher ", "icon-rocket " => "icon-rocket ", "icon-maxcdn " => "icon-maxcdn ", "icon-chevron-sign-left " => "icon-chevron-sign-left ", "icon-chevron-sign-right " => "icon-chevron-sign-right ", "icon-chevron-sign-up " => "icon-chevron-sign-up ", "icon-chevron-sign-down " => "icon-chevron-sign-down ", "icon-html5 " => "icon-html5 ", "icon-css3 " => "icon-css3 ", "icon-anchor " => "icon-anchor ", "icon-unlock-alt " => "icon-unlock-alt ", "icon-bullseye " => "icon-bullseye ", "icon-ellipsis-horizontal " => "icon-ellipsis-horizontal ", "icon-ellipsis-vertical " => "icon-ellipsis-vertical ", "icon-rss-sign " => "icon-rss-sign ", "icon-play-sign " => "icon-play-sign ", "icon-ticket " => "icon-ticket ", "icon-minus-sign-alt " => "icon-minus-sign-alt ", "icon-check-minus " => "icon-check-minus ", "icon-level-up " => "icon-level-up ", "icon-level-down " => "icon-level-down ", "icon-check-sign " => "icon-check-sign ", "icon-edit-sign " => "icon-edit-sign ", "icon-external-link-sign " => "icon-external-link-sign ", "icon-share-sign " => "icon-share-sign ", "icon-compass " => "icon-compass ", "icon-collapse " => "icon-collapse ", "icon-collapse-top " => "icon-collapse-top ", "icon-expand " => "icon-expand ", "icon-euro" => "icon-euro", "icon-eur " => "icon-eur ", "icon-gbp " => "icon-gbp ", "icon-dollar" => "icon-dollar", "icon-usd " => "icon-usd ", "icon-rupee" => "icon-rupee", "icon-inr " => "icon-inr ", "icon-yen" => "icon-yen", "icon-jpy " => "icon-jpy ", "icon-renminbi" => "icon-renminbi", "icon-cny " => "icon-cny ", "icon-won" => "icon-won", "icon-krw " => "icon-krw ", "icon-bitcoin" => "icon-bitcoin", "icon-btc " => "icon-btc ", "icon-file " => "icon-file ", "icon-file-text " => "icon-file-text ", "icon-sort-by-alphabet " => "icon-sort-by-alphabet ", "icon-sort-by-alphabet-alt " => "icon-sort-by-alphabet-alt ", "icon-sort-by-attributes " => "icon-sort-by-attributes ", "icon-sort-by-attributes-alt " => "icon-sort-by-attributes-alt ", "icon-sort-by-order " => "icon-sort-by-order ", "icon-sort-by-order-alt " => "icon-sort-by-order-alt ", "icon-thumbs-up " => "icon-thumbs-up ", "icon-thumbs-down " => "icon-thumbs-down ", "icon-youtube-sign " => "icon-youtube-sign ", "icon-youtube " => "icon-youtube ", "icon-xing " => "icon-xing ", "icon-xing-sign " => "icon-xing-sign ", "icon-youtube-play " => "icon-youtube-play ", "icon-dropbox " => "icon-dropbox ", "icon-stackexchange " => "icon-stackexchange ", "icon-instagram " => "icon-instagram ", "icon-flickr " => "icon-flickr ", "icon-adn " => "icon-adn ", "icon-bitbucket " => "icon-bitbucket ", "icon-bitbucket-sign " => "icon-bitbucket-sign ", "icon-tumblr " => "icon-tumblr ", "icon-tumblr-sign " => "icon-tumblr-sign ", "icon-long-arrow-down " => "icon-long-arrow-down ", "icon-long-arrow-up " => "icon-long-arrow-up ", "icon-long-arrow-left " => "icon-long-arrow-left ", "icon-long-arrow-right " => "icon-long-arrow-right ", "icon-apple " => "icon-apple ", "icon-windows " => "icon-windows ", "icon-android " => "icon-android ", "icon-linux " => "icon-linux ", "icon-dribbble " => "icon-dribbble ", "icon-skype " => "icon-skype ", "icon-foursquare " => "icon-foursquare ", "icon-trello " => "icon-trello ", "icon-female " => "icon-female ", "icon-male " => "icon-male ", "icon-gittip " => "icon-gittip ", "icon-sun " => "icon-sun ", "icon-moon " => "icon-moon ", "icon-archive " => "icon-archive ", "icon-bug " => "icon-bug ", "icon-vk " => "icon-vk ", "icon-weibo " => "icon-weibo ", "icon-renren " => "icon-renren ");                    
return apply_filters('kadence_icon_list', $icons);
}

if (!isset($content_width)) { $content_width = 940; }
