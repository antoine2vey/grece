<?php 

function kad_custom_css() {

global $pinnacle; 

if(isset($pinnacle['topbar_height']) && isset($pinnacle['topbar']) && $pinnacle['topbar'] == 1) {
  $topbar_height = '#topbar {height:'.$pinnacle['topbar_height'].'px;} #topbar ul.sf-menu li a, #topbar .top-menu-cart-btn, #topbar .top-menu-search-btn, #topbar .topbarsociallinks li a, #topbar .nav-trigger-case .kad-navbtn {line-height:'.$pinnacle['topbar_height'].'px;}';
} else {
  $topbar_height = '';
} 
if(isset($pinnacle['topbar_iconmenu_fontsize'])) {
  $topbar_iconmenu_fontsize = '#kad-banner #topbar .topbarsociallinks li a {font-size:'.$pinnacle['topbar_iconmenu_fontsize'].'px;}';
} else {
  $topbar_iconmenu_fontsize = '';
}
$htoppadding = '.trans-header #pageheader {padding-top:'.pinnacle_header_height().'px;}';

//Typography
if(!empty($pinnacle['font_h1'])) {
  $font_family = '.headerfont, .tp-caption, .yith-wcan-list li, .yith-wcan .yith-wcan-reset-navigation, ul.yith-wcan-label li a, .product_item .price {font-family:'.$pinnacle['font_h1']['font-family'].';} 
  .topbarmenu ul li {font-family:'.$pinnacle['font_primary_menu']['font-family'].';}
  #kadbreadcrumbs {font-family:'.$pinnacle['font_p']['font-family'].';}';
} else {
  $font_family = '';
}  

//Basic Styling

if(!empty($pinnacle['primary_color'])) {
  $primaryrgb = kt_hex2rgb($pinnacle['primary_color']); 
  $color_primary = '.home-message:hover {background-color:'.$pinnacle['primary_color'].'; background-color: rgba('.$primaryrgb[0].', '.$primaryrgb[1].', '.$primaryrgb[2].', 0.6);}
nav.woocommerce-pagination ul li a:hover, .wp-pagenavi a:hover, .woocommerce-info, .panel-heading .accordion-toggle, .variations .kad_radio_variations label:hover, .variations .kad_radio_variations label.selectedValue,.variations .kad_radio_variations label:hover {border-color: '.$pinnacle['primary_color'].';}
a, .product_price ins .amount, .price ins .amount, .price ins, .color_primary, .postedinbottom a:hover, .footerclass a:hover, .posttags a:hover, .subhead a:hover, .nav-trigger-case:hover .kad-menu-name, .star-rating, .kad-btn-border-white:hover, .tp-caption .kad-btn-border-white:hover, .woocommerce-info:before, .nav-trigger-case:hover .kad-navbtn, #wp-calendar a, .widget_categories .widget-inner .cat-item a:hover, .widget_archive li a:hover, .widget_nav_menu li a:hover,.widget_recent_entries li a:hover, .widget_pages li a:hover, .product-categories li a:hover, .product-categories li a:hover {color: '.$pinnacle['primary_color'].';}
.widget_price_filter .ui-slider .ui-slider-handle, .product_item .kad_add_to_cart:hover, .product_item a.button:hover, .product_item.hidetheaction:hover .kad_add_to_cart:hover, .kad-btn-primary, html .woocommerce-page .widget_layered_nav ul.yith-wcan-label li a:hover, html .woocommerce-page .widget_layered_nav ul.yith-wcan-label li.chosen a, nav.woocommerce-pagination ul li span.current, nav.woocommerce-pagination ul li a:hover, .product-category.grid_item a:hover h5, .woocommerce-message .button, .widget_layered_nav_filters ul li a, .widget_layered_nav ul li.chosen a, .wpcf7 input.wpcf7-submit, .yith-wcan .yith-wcan-reset-navigation, .panel-heading .accordion-toggle, .nav-tabs li.active, .menu-cart-btn .kt-cart-total, .form-search .search-icon, .product_item .add_to_cart_button:hover, div.product .woocommerce-tabs ul.tabs li.active, #containerfooter .menu li a:hover, .bg_primary, .home-iconmenu .home-icon-item:hover i, .home-iconmenu .home-icon-item:hover h4:after, .home-iconmenu .home-icon-item:hover .kad-btn-primary, p.demo_store, #commentform .form-submit #submit, .kad-hover-bg-primary:hover, .widget_shopping_cart_content .checkout, .product_item.hidetheaction:hover .add_to_cart_button:hover, .product_item.hidetheaction:hover a.button:hover, .productnav a:hover, .kad-btn-primary, .single_add_to_cart_button, #commentform .form-submit #submit, #payment #place_order, .yith-wcan .yith-wcan-reset-navigation, .checkout-button, .widget_shopping_cart_content .checkout, .cart-collaterals .shipping_calculator .button, .login .form-row .button, .order-actions .button, input[type="submit"].button, .post-password-form input[type="submit"], #kad-top-cart-popup .button.checkout, #kad-head-cart-popup .button.checkout, table.shop_table td.actions .checkout-button.button, .select2-container .select2-choice .select2-arrow, .woocommerce span.onsale, span.onsale, .woocommerce #carouselcontainer span.onsale, #filters li a.selected, #filters li a:hover, .p_primarystyle .portfolio-hoverover, .woocommerce-message, .woocommerce-error, a.added_to_cart:hover, .cart-collaterals .cart_totals tr.order-total, .cart-collaterals .shipping_calculator h2 a:hover, .top-menu-cart-btn .kt-cart-total, #topbar ul.sf-menu li a:hover, .topbarmenu ul.sf-menu li.sf-dropdown:hover, .topbarsociallinks li a:hover, #topbar .nav-trigger-case .kad-navbtn:hover, .top-menu-search-btn:hover, .top-search-btn.collapsed:hover, .top-menu-cart-btn:hover, .top-cart-btn.collapsed:hover, .wp-pagenavi .current, .wp-pagenavi a:hover, .login .form-row .button, .post-password-form input[type="submit"], .kad-post-navigation .kad-previous-link a:hover, .kad-post-navigation .kad-next-link a:hover, .select2-results .select2-highlighted, .variations .kad_radio_variations label.selectedValue, #payment #place_order, .checkout-button, input[type="submit"].button, .order-actions .button, .productnav a:hover, #nav-main ul.sf-menu ul li a:hover, #nav-main ul.sf-menu ul li.current-menu-item a, .woocommerce-checkout .chosen-container .chosen-results li.highlighted, .return-to-shop a.wc-backward {background: '.$pinnacle['primary_color'].';}';
} else {
  $color_primary = '';
}
if(!empty($pinnacle['primary20_color'])) {
  $color_primary30 =  'a:hover {color: '.$pinnacle['primary20_color'].';} 
.kad-btn-primary:hover, .login .form-row .button:hover, #payment #place_order:hover, .yith-wcan .yith-wcan-reset-navigation:hover, .widget_shopping_cart_content .checkout:hover, .woocommerce-message .button:hover, #commentform .form-submit #submit:hover, .wpcf7 input.wpcf7-submit:hover, .widget_layered_nav_filters ul li a:hover, table.shop_table td.actions .checkout-button.button:hover, .product_item.hidetheaction:hover .add_to_cart_button, .kad-btn-primary:hover, input[type="submit"].button:hover, .single_add_to_cart_button:hover, .order-actions .button:hover, .woocommerce-message .button:hover,  #kad-top-cart-popup .buttons .button.checkout:hover, #kad-head-cart-popup .buttons .button.checkout:hover, #commentform .form-submit #submit:hover, .checkout-button:hover, #payment #place_order:hover, .widget_shopping_cart_content .checkout:hover, .cart-collaterals .shipping_calculator .button:hover, .yith-wcan .yith-wcan-reset-navigation:hover, .login .form-row .button:hover, .post-password-form input[type="submit"]:hover, table.shop_table td.actions .checkout-button.button:hover .widget_layered_nav ul li.chosen a:hover, .checkout-button:hover, .order-actions .button:hover, input[type="submit"].button:hover, .product_item.hidetheaction:hover .kad_add_to_cart, .product_item.hidetheaction:hover a.button, .post-password-form input[type="submit"]:hover, .return-to-shop a.wc-backward:hover {background: '.$pinnacle['primary20_color'].';}';
} else {
  $color_primary30 = '';
}
if(!empty($pinnacle['gray_font_color'])) {
  $color_grayfont = '.color_gray, .subhead, .subhead a, .posttags, .posttags a, .product_meta a, .postedinbottom a {color:'.$pinnacle['gray_font_color'].';}';
} else {
  $color_grayfont = '';
}
if(!empty($pinnacle['header_background_choice']) && $pinnacle['header_background_choice'] == 'simple' && !empty($pinnacle['header_background_color'])) {
    $head_bgcolor = kt_hex2rgb($pinnacle['header_background_color']); 
  $hbg_color = '.is-sticky .headerclass, .none-trans-header .headerclass {background: rgba('.$head_bgcolor[0].', '.$head_bgcolor[1].', '.$head_bgcolor[2].', '.$pinnacle['header_background_transparency'].');}';
} else {
  $hbg_color = '';
}
if(!empty($pinnacle['header_overlay_background_transparency'])) {
  $header_overlay_background_transparency = '.titleclass .header-color-overlay {opacity:'.$pinnacle['header_overlay_background_transparency'].';}';
} else {
  $header_overlay_background_transparency = '';
}
if(!empty($pinnacle['pageheader_background']) && !empty($pinnacle['pageheader_background']['background-color'])) {
  $pageheader_color = '.titleclass {background:'.$pinnacle['pageheader_background']['background-color'].';}';
} else {
  $pageheader_color = '';
}
if(!empty($pinnacle['footerfont_color'])) {
  $color_footerfont = '#containerfooter h3, #containerfooter, .footercredits p, .footerclass a, .footernav ul li a, #containerfooter .menu li a, .footerclass h5, .footerclass h2 .footerclass .kadence_social_widget a, .footerclass .widget-title {color:'.$pinnacle['footerfont_color'].';}.footerclass .widget-title:after{background: '.$pinnacle['footerfont_color'].';}';
} else {
  $color_footerfont = '';
}
if(!empty($pinnacle['font_primary_menu']['color'])) {
  $mobile_color = '.none-trans-header .nav-trigger-case.collapsed .kad-navbtn, .is-sticky .nav-trigger-case.collapsed .kad-navbtn {color:'.$pinnacle['font_primary_menu']['color'].';}';
} else {
  $mobile_color = '';
}
if(!empty($pinnacle['header_border_color'])) {
  $header_border_color = '.headerclass {border-color:'.$pinnacle['header_border_color'].';}';
} else {
  $header_border_color = '';
}
// Sitewide Call
if(isset($pinnacle['sitewide_action_padding'])) {
  $sitewide_action_padding = '.kt-call-sitewide-to-action {padding:'.$pinnacle['sitewide_action_padding'].'px 0;}';
} else {
  $sitewide_action_padding = '';
}
//home page 
if(isset($pinnacle['home_action_padding'])) {
  $home_action_padding = '.kt-home-call-to-action {padding:'.$pinnacle['home_action_padding'].'px 0;}';
} else {
  $home_action_padding = '';
}

if(isset($pinnacle['page_max_width']) && $pinnacle['page_max_width'] == '1') {
    $page_max_width = '@media (min-width: 1200px) {.container {width: 970px;} aside.col-lg-3 {width: 33.33333333333333%;} .main.col-lg-9 {width: 66.66666666666666%;}}';
    } else {
      $page_max_width = '';
    } 
  //topbar mobile
if(isset($pinnacle['topbar_mobile_hide']) && $pinnacle['topbar_mobile_hide'] == '1') {
    $topbar_mobile_hide = '@media (max-width: 767px) {#topbar{display:none;}}';
    } else {
      $topbar_mobile_hide = '';
    } 
//Page title pagetitle_align
if(isset($pinnacle['pagetitle_align']) && $pinnacle['pagetitle_align'] != 'center') {
    $pagetitle_align = '.page-header {text-align: '.$pinnacle['pagetitle_align'].';}@media (max-width: 992px){#kadbreadcrumbs {text-align: '.$pinnacle['pagetitle_align'].';}}';
    } else {
      $pagetitle_align = '';
    } 
if(isset($pinnacle['pagetitle_align']) && $pinnacle['pagetitle_align'] == 'right') {
    $pagetitle_align_right = '#kadbreadcrumbs {margin-top: 0;}';
    } else {
      $pagetitle_align_right = '';
    } 
  if(!empty($pinnacle['x2_logo_upload']['url'])) {
  $x2logo = '@media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {body #kad-banner #logo .kad-standard-logo, .trans-header .is-sticky #kad-banner #logo .kad-standard-logo {background-image: url("'.$pinnacle['x2_logo_upload']['url'].'") !important;} }';
} else {
  $x2logo = '';
}
  if(!empty($pinnacle['th_x2_logo_upload']['url'])) {
  $x2logo_white = ' @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) { .trans-header #kad-banner #logo .kad-standard-logo-tranbg {background-image:url("'.$pinnacle['th_x2_logo_upload']['url'].'") !important;}}';
} else {
  $x2logo_white = '';
}
  if(!empty($pinnacle['shop_title_min_height'])) {
  $ptitle_minheight = '.product_item .product_details h5 {min-height:'.$pinnacle['shop_title_min_height'].'px;}';
} else {
  $ptitle_minheight = '';
}
  if(isset($pinnacle['hide_author']) and ($pinnacle['hide_author'] == 0)) {
  $show_author = '.kad-hidepostauthortop, .postauthortop {display:none;}';
  } else {
  $show_author = '';
  } 
  if(isset($pinnacle['hide_postedin']) and ($pinnacle['hide_postedin'] == 0)) {
  $show_postedin = '.postedinbottom {display:none;}';
  } else {
  $show_postedin = '';
  } 
   if(isset($pinnacle['hide_posttags']) and ($pinnacle['hide_posttags'] == 0)) {
  $show_posttag = '.posttags {display:none;}';
  } else {
  $show_posttag = '';
  } 
  if(isset($pinnacle['hide_commenticon']) and ($pinnacle['hide_commenticon'] == 0)) {
  $show_comment = '.postcommentscount {display:none;}';
  } else {
  $show_comment = '';
  } 
  if(isset($pinnacle['hide_postdate']) and ($pinnacle['hide_postdate'] == 0)) {
  $show_date = '.postdate, .kad-hidedate, .postdatetooltip{display:none;}';
  } else {
  $show_date = '';
  } 
  if(isset($pinnacle['topbar_layout']) and ($pinnacle['topbar_layout'] == 1)) {
  $topbar_layout = '.kad-topbar-left, .kad-topbar-left .topbar_social {float:right;} #topbar .kad-topbar-right ul.topbmenu, .kad-topbar-right .kad-topsearch-button, .kad-topbar-right .top-menu-cart-btn {float:left;} .kad-topbar-right #kad-top-search-popup, .kad-topbar-right #kad-top-cart-popup{right: auto;left: 0px;}';
  } else {
  $topbar_layout = '';
  } 
if (isset($pinnacle['smooth_scrolling_background']) && $pinnacle['smooth_scrolling_background'] == 1) {
  $scrolling_background = '#ascrail2000 {background-color: transparent;}';
} else {
  $scrolling_background = '';
}
if(isset($pinnacle['header_height'])) {
  $header_height = '.kad-header-style-basic #nav-main ul.sf-menu > li > a, .kad-header-style-basic #kad-shrinkheader #mobile-nav-trigger a {line-height:'.$pinnacle['header_height'].'px;}';
} else {
  $header_height = '.kad-header-style-basic #nav-main ul.sf-menu > li > a, .kad-header-style-basic #kad-shrinkheader #mobile-nav-trigger a {line-height:90px;}';
}
if(isset($pinnacle['mobile_switch']) && $pinnacle['mobile_switch'] == '1') {
  $mobileslider = '@media (max-width: 767px) {.kad-desktop-slider {display:none;}}';
} else {
  $mobileslider = '';
}
if (isset($pinnacle['single_post_header_title']) && $pinnacle['single_post_header_title'] == 'posttitle' && isset($pinnacle['default_showposttitle_below']) && $pinnacle['default_showposttitle_below'] == '0') {
  $posttitle = '.single-post .single-article header h1.entry-title {display:none;}';
  } else {
  $posttitle = '';
  }
if (!empty($pinnacle['custom_css'])) {
  $custom_css = $pinnacle['custom_css'];
} else {
  $custom_css = '';
}

$kad_custom_css = '<style type="text/css">'.$topbar_height.$topbar_iconmenu_fontsize.$header_border_color.$htoppadding.$header_overlay_background_transparency.$pageheader_color.$font_family.$color_primary30.$color_grayfont.$color_footerfont.$posttitle.$home_action_padding.$sitewide_action_padding.$pagetitle_align_right.$color_primary.$pagetitle_align.$show_posttag.$x2logo.$x2logo_white.$ptitle_minheight.$topbar_layout.$topbar_mobile_hide.$hbg_color.$scrolling_background.$show_author.$show_postedin.$show_comment.$header_height.$page_max_width.$show_date.$mobile_color.$mobileslider
.$custom_css.'</style>';

  echo $kad_custom_css;
}
add_action('wp_head', 'kad_custom_css');
?>
