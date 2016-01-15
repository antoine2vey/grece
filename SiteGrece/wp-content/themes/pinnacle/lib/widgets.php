<?php
/**
 * Register sidebars and widgets
 */
function pinnacle_sidebar_list() {
  $all_sidebars=array(array('name'=>__('Primary Sidebar', 'pinnacle'), 'id'=>'sidebar-primary'));
  global $pinnacle; 
  if(isset($pinnacle['cust_sidebars'])) {
  if (is_array($pinnacle['cust_sidebars'])) {
    $i = 1;
  foreach($pinnacle['cust_sidebars'] as $sidebar){
    if(empty($sidebar)) {$sidebar = 'sidebar'.$i;}
    $all_sidebars[]=array('name'=>$sidebar, 'id'=>'sidebar'.$i);
    $i++;
  }
 }
}
  global $kad_sidebars;
  $kad_sidebars = $all_sidebars;
  return $all_sidebars;
}
add_action('init', 'pinnacle_sidebar_list');

function pinnacle_register_sidebars(){
  $the_sidebars = pinnacle_sidebar_list();
  if (function_exists('register_sidebar')){
    foreach($the_sidebars as $side){
      pinnacle_register_sidebar($side['name'], $side['id']);    
    }

  }
}
function pinnacle_register_sidebar($name, $id){
  register_sidebar(array('name'=>$name,
    'id' => $id,
         'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-inner">',
    'after_widget' => '</div></section>',
    'before_title' => '<h5 class="widget-title">',
    'after_title' => '</h5>',
  ));
}
add_action('widgets_init', 'pinnacle_register_sidebars');

function pinnacle_widgets_init() {
    //Topbar 
  if(pinnacle_display_topbar_widget()) {
  register_sidebar(array(
    'name'          => __('Topbar Widget', 'pinnacle'),
    'id'            => 'topbarright',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '',
    'after_title'   => '',
  ));
}
  // Sidebars
  register_sidebar(array(
    'name'          => __('Primary Sidebar', 'pinnacle'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h5 class="widget-title">',
    'after_title'   => '</h5>',
  ));

  // Footer
  global $pinnacle; if(isset($pinnacle['footer_layout'])) { $footer_layout = $pinnacle['footer_layout'];} else {$footer_layout = "fourc";}
  if ($footer_layout == "fourc") {
    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => __('Footer Column 1', 'pinnacle'),
        'id' => 'footer_1',
        'before_widget' => '<div class="footer-widget"><aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
      )
    );
    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => __('Footer Column 2', 'pinnacle'),
        'id' => 'footer_2',
        'before_widget' => '<div class="footer-widget"><aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
      )
    );
    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => __('Footer Column 3', 'pinnacle'),
        'id' => 'footer_3',
        'before_widget' => '<div class="footer-widget"><aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
      )
    );
    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => __('Footer Column 4', 'pinnacle'),
        'id' => 'footer_4',
        'before_widget' => '<div class="footer-widget"><aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
      )
    );
  } else if ($footer_layout == "threec") {
    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => __('Footer Column 1', 'pinnacle'),
        'id' => 'footer_third_1',
        'before_widget' => '<div class="footer-widget"><aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
      )
    );
    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => __('Footer Column 2', 'pinnacle'),
        'id' => 'footer_third_2',
        'before_widget' => '<div class="footer-widget"><aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
      )
    );
    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => __('Footer Column 3', 'pinnacle'),
        'id' => 'footer_third_3',
        'before_widget' => '<div class="footer-widget"><aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
      )
    );
  } else {
      if ( function_exists('register_sidebar') )
        register_sidebar(array(
          'name' => __('Footer Column 1', 'pinnacle'),
          'id' => 'footer_double_1',
          'before_widget' => '<div class="footer-widget"><aside id="%1$s" class="widget %2$s">',
          'after_widget' => '</aside></div>',
          'before_title' => '<h4 class="widget-title">',
          'after_title' => '</h4>',
        )
      );
      if ( function_exists('register_sidebar') )
        register_sidebar(array(
          'name' => __('Footer Column 2', 'pinnacle'),
          'id' => 'footer_double_2',
          'before_widget' => '<div class="footer-widget"><aside id="%1$s" class="widget %2$s">',
          'after_widget' => '</aside></div>',
          'before_title' => '<h4 class="widget-title">',
          'after_title' => '</h4>',
        )
      );
    }

  // Widgets
  register_widget('kad_contact_widget');
  register_widget('kad_social_widget');
  register_widget('kad_recent_posts_widget');
  register_widget('kad_post_grid_widget');
  register_widget('kad_image_widget');
}
add_action('widgets_init', 'pinnacle_widgets_init');

/**
 * Contact widget
 */
class kad_contact_widget extends WP_Widget {
  function kad_contact_widget() {
    $widget_ops = array('classname' => 'widget_kadence_contact', 'description' => __('Use this widget to add a Vcard to your site', 'pinnacle'));
    $this->__construct('widget_kadence_contact', __('Pinnacle: Contact/Vcard', 'pinnacle'), $widget_ops);
    $this->alt_option_name = 'widget_kadence_contact';
  }

  function widget($args, $instance) {

    $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
    if (!isset($instance['company'])) { $instance['company'] = ''; }
    if (!isset($instance['name'])) { $instance['name'] = ''; }
    if (!isset($instance['street_address'])) { $instance['street_address'] = ''; }
    if (!isset($instance['locality'])) { $instance['locality'] = ''; }
    if (!isset($instance['region'])) { $instance['region'] = ''; }
    if (!isset($instance['postal_code'])) { $instance['postal_code'] = ''; }
    if (!isset($instance['tel'])) { $instance['tel'] = ''; }
    if (!isset($instance['fixedtel'])) { $instance['fixedtel'] = ''; }
    if (!isset($instance['email'])) { $instance['email'] = ''; }

    echo $args['before_widget'];
    if ($title) {
      echo $args['before_title'];
      echo $title;
      echo $args['after_title'];
    }
  ?>
    <div class="vcard">
      
      <?php if(!empty($instance['company'])):?><h5 class="vcard-company"><i class="icon-building"></i><?php echo esc_html($instance['company']); ?></h5><?php endif;?>
      <?php if(!empty($instance['name'])):?><p class="vcard-name"><i class="icon-user"></i><?php echo esc_html($instance['name']); ?></p><?php endif;?>
      <?php if(!empty($instance['street_address']) || !empty($instance['locality']) || !empty($instance['region']) ):?>
        <p class="vcard-address"><i class="icon-map-marker"></i><?php echo esc_html($instance['street_address']); ?>
       <span><?php echo esc_html($instance['locality']); ?> <?php echo esc_html($instance['region']); ?> <?php echo esc_html($instance['postal_code']); ?></span></p>
     <?php endif;?>
      <?php if(!empty($instance['tel'])):?><p class="tel"><i class="icon-tablet"></i> <?php echo esc_html($instance['tel']); ?></p><?php endif;?>
      <?php if(!empty($instance['fixedtel'])):?><p class="tel fixedtel"><i class="icon-phone"></i> <?php echo esc_html($instance['fixedtel']); ?></p><?php endif;?>
      <?php if(!empty($instance['email'])):?><p><a class="email" href="mailto:<?php echo antispambot($instance['email']);?>"><i class="icon-envelope"></i> <?php echo antispambot($instance['email']); ?></a></p> <?php endif;?>
    </div>
      <?php
    echo $args['after_widget'];

  }

  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title']          = strip_tags($new_instance['title']);
    $instance['company']        = strip_tags($new_instance['company']);
    $instance['name']           = strip_tags($new_instance['name']);
    $instance['street_address'] = strip_tags($new_instance['street_address']);
    $instance['locality']       = strip_tags($new_instance['locality']);
    $instance['region']         = strip_tags($new_instance['region']);
    $instance['postal_code']    = strip_tags($new_instance['postal_code']);
    $instance['tel']            = strip_tags($new_instance['tel']);
    $instance['fixedtel']       = strip_tags($new_instance['fixedtel']);
    $instance['email']          = strip_tags($new_instance['email']);
    return $instance;
  }

  function form($instance) {
      $title          = isset($instance['title']) ? esc_attr($instance['title']) : '';
      $company        = isset($instance['company']) ? esc_attr($instance['company']) : '';
      $name           = isset($instance['name']) ? esc_attr($instance['name']) : '';
      $street_address = isset($instance['street_address']) ? esc_attr($instance['street_address']) : '';
      $locality       = isset($instance['locality']) ? esc_attr($instance['locality']) : '';
      $region         = isset($instance['region']) ? esc_attr($instance['region']) : '';
      $postal_code    = isset($instance['postal_code']) ? esc_attr($instance['postal_code']) : '';
      $tel            = isset($instance['tel']) ? esc_attr($instance['tel']) : '';
      $fixedtel       = isset($instance['fixedtel']) ? esc_attr($instance['fixedtel']) : '';
      $email          = isset($instance['email']) ? esc_attr($instance['email']) : '';
  ?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'pinnacle'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('company')); ?>"><?php _e('Company Name:', 'pinnacle'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('company')); ?>" name="<?php echo esc_attr($this->get_field_name('company')); ?>" type="text" value="<?php echo esc_attr($company); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('name')); ?>"><?php _e('Name:', 'pinnacle'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('name')); ?>" name="<?php echo esc_attr($this->get_field_name('name')); ?>" type="text" value="<?php echo esc_attr($name); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('street_address')); ?>"><?php _e('Street Address:', 'pinnacle'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('street_address')); ?>" name="<?php echo esc_attr($this->get_field_name('street_address')); ?>" type="text" value="<?php echo esc_attr($street_address); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('locality')); ?>"><?php _e('City/Locality:', 'pinnacle'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('locality')); ?>" name="<?php echo esc_attr($this->get_field_name('locality')); ?>" type="text" value="<?php echo esc_attr($locality); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('region')); ?>"><?php _e('State/Region:', 'pinnacle'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('region')); ?>" name="<?php echo esc_attr($this->get_field_name('region')); ?>" type="text" value="<?php echo esc_attr($region); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('postal_code')); ?>"><?php _e('Zipcode/Postal Code:', 'pinnacle'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('postal_code')); ?>" name="<?php echo esc_attr($this->get_field_name('postal_code')); ?>" type="text" value="<?php echo esc_attr($postal_code); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('tel')); ?>"><?php _e('Mobile Telephone:', 'pinnacle'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('tel')); ?>" name="<?php echo esc_attr($this->get_field_name('tel')); ?>" type="text" value="<?php echo esc_attr($tel); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('fixedtel')); ?>"><?php _e('Fixed Telephone:', 'pinnacle'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('fixedtel')); ?>" name="<?php echo esc_attr($this->get_field_name('fixedtel')); ?>" type="text" value="<?php echo esc_attr($fixedtel); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php _e('Email:', 'pinnacle'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($email); ?>" />
    </p>
  <?php
  }
}
/**
 * Social widget
 */
class kad_social_widget extends WP_Widget {
  function kad_social_widget() {
    $widget_ops = array('classname' => 'widget_kadence_social', 'description' => __('Simple way to add Social Icons', 'pinnacle'));
    $this->__construct('widget_kadence_social', __('Pinnacle: Social Links', 'pinnacle'), $widget_ops);
    $this->alt_option_name = 'widget_kadence_social';
  }

  function widget($args, $instance) {


    if (!isset($args['widget_id'])) {
      $args['widget_id'] = null;
    }


    ob_start();
    extract($args, EXTR_SKIP);

    $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
    if (!isset($instance['facebook']))  { $instance['facebook'] = ''; }
    if (!isset($instance['twitter']))   { $instance['twitter'] = ''; }
    if (!isset($instance['instagram'])) { $instance['instagram'] = ''; }
    if (!isset($instance['googleplus'])){ $instance['googleplus'] = ''; }
    if (!isset($instance['flickr']))    { $instance['flickr'] = ''; }
    if (!isset($instance['vimeo']))     { $instance['vimeo'] = ''; }
    if (!isset($instance['youtube']))   { $instance['youtube'] = ''; }
    if (!isset($instance['pinterest'])) { $instance['pinterest'] = ''; }
    if (!isset($instance['dribbble']))  { $instance['dribbble'] = ''; }
    if (!isset($instance['linkedin']))  { $instance['linkedin'] = ''; }
    if (!isset($instance['tumblr']))    { $instance['tumblr'] = ''; }
    if (!isset($instance['vk']))        { $instance['vk'] = ''; }

    if (!isset($instance['rss'])) { $instance['rss'] = ''; }

    echo $before_widget;
    if ($title) {
      echo $before_title;
      echo $title;
      echo $after_title;
    }
  ?>
    <div class="kadence_social_widget clearfix">
      
<?php if(!empty($instance['facebook'])):?><a href="<?php echo esc_url($instance['facebook']); ?>" class="facebook_link" title="Facebook" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="Facebook"><i class="icon-facebook"></i></a><?php endif;?>
<?php if(!empty($instance['twitter'])):?><a href="<?php echo esc_url($instance['twitter']); ?>" class="twitter_link" title="Twitter" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="Twitter"><i class="icon-twitter"></i></a><?php endif;?>
<?php if(!empty($instance['instagram'])):?><a href="<?php echo esc_url($instance['instagram']); ?>" class="instagram_link" title="Instagram" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="Instagram"><i class="icon-instagram"></i></a><?php endif;?>
<?php if(!empty($instance['googleplus'])):?><a href="<?php echo esc_url($instance['googleplus']); ?>" class="googleplus_link" rel="publisher" title="GooglePlus" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="GooglePlus"><i class="icon-google-plus"></i></a><?php endif;?>
<?php if(!empty($instance['flickr'])):?><a href="<?php echo esc_url($instance['flickr']); ?>" class="flickr_link" title="Flickr" data-toggle="tooltip" target="_blank" data-placement="top" data-original-title="Flickr"><i class="icon-flickr"></i></a><?php endif;?>
<?php if(!empty($instance['vimeo'])):?><a href="<?php echo esc_url($instance['vimeo']); ?>" class="vimeo_link" title="Vimeo" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="Vimeo"><i class="icon-play"></i></a><?php endif;?>
<?php if(!empty($instance['youtube'])):?><a href="<?php echo esc_url($instance['youtube']); ?>" class="youtube_link" title="YouTube" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="YouTube"><i class="icon-youtube"></i></a><?php endif;?>
<?php if(!empty($instance['pinterest'])):?><a href="<?php echo esc_url($instance['pinterest']); ?>" class="pinterest_link" title="Pinterest" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="Pinterest"><i class="icon-pinterest"></i></a><?php endif;?>
<?php if(!empty($instance['dribbble'])):?><a href="<?php echo esc_url($instance['dribbble']); ?>" class="dribbble_link" title="Dribbble" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="Dribbble"><i class="icon-dribbble"></i></a><?php endif;?>
<?php if(!empty($instance['linkedin'])):?><a href="<?php echo esc_url($instance['linkedin']); ?>" class="linkedin_link" title="LinkedIn" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="LinkedIn"><i class="icon-linkedin"></i></a><?php endif;?>
<?php if(!empty($instance['tumblr'])):?><a href="<?php echo esc_url($instance['tumblr']); ?>" class="tumblr_link" title="Tumblr" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="Tumblr"><i class="icon-tumblr"></i></a><?php endif;?>
<?php if(!empty($instance['vk'])):?><a href="<?php echo esc_url($instance['vk']); ?>" class="vk_link" title="VK" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="VK"><i class="icon-vk"></i></a><?php endif;?>
<?php if(!empty($instance['rss'])):?><a href="<?php echo esc_url($instance['rss']); ?>" class="rss_link" title="RSS" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="RSS"><i class="icon-rss-sign"></i></a><?php endif;?>
    </div>
  <?php
    echo $after_widget;

  }

  function update($new_instance, $old_instance) {
    $instance = $old_instance;
     $instance['title']     = strip_tags($new_instance['title']);
    $instance['facebook']   = strip_tags($new_instance['facebook']);
    $instance['twitter']    = strip_tags($new_instance['twitter']);
    $instance['instagram']  = strip_tags($new_instance['instagram']);
    $instance['googleplus'] = strip_tags($new_instance['googleplus']);
    $instance['flickr']     = strip_tags($new_instance['flickr']);
    $instance['vimeo']      = strip_tags($new_instance['vimeo']);
    $instance['youtube']    = strip_tags($new_instance['youtube']);
    $instance['pinterest']  = strip_tags($new_instance['pinterest']);
    $instance['dribbble']   = strip_tags($new_instance['dribbble']);
    $instance['linkedin']   = strip_tags($new_instance['linkedin']);
    $instance['tumblr']     = strip_tags($new_instance['tumblr']);
    $instance['vk']         = strip_tags($new_instance['vk']);
    $instance['rss']        = strip_tags($new_instance['rss']);

    return $instance;
  }

  function form($instance) {
    $title      = isset($instance['title']) ? esc_attr($instance['title']) : '';
    $facebook   = isset($instance['facebook']) ? esc_attr($instance['facebook']) : '';
    $twitter    = isset($instance['twitter']) ? esc_attr($instance['twitter']) : '';
    $instagram  = isset($instance['instagram']) ? esc_attr($instance['instagram']) : '';
    $googleplus = isset($instance['googleplus']) ? esc_attr($instance['googleplus']) : '';
    $flickr     = isset($instance['flickr']) ? esc_attr($instance['flickr']) : '';
    $vimeo      = isset($instance['vimeo']) ? esc_attr($instance['vimeo']) : '';
    $youtube    = isset($instance['youtube']) ? esc_attr($instance['youtube']) : '';
    $pinterest  = isset($instance['pinterest']) ? esc_attr($instance['pinterest']) : '';
    $dribbble   = isset($instance['dribbble']) ? esc_attr($instance['dribbble']) : '';
    $linkedin   = isset($instance['linkedin']) ? esc_attr($instance['linkedin']) : '';
    $tumblr     = isset($instance['tumblr']) ? esc_attr($instance['tumblr']) : '';
    $vk         = isset($instance['vk']) ? esc_attr($instance['vk']) : '';
    $rss        = isset($instance['rss']) ? esc_attr($instance['rss']) : '';
  ?>
  <p>
      <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'pinnacle'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>"><?php _e('Facebook:', 'pinnacle'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" type="text" value="<?php echo esc_attr($facebook); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>"><?php _e('Twitter:', 'pinnacle'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('instagram')); ?>"><?php _e('Instagram:', 'pinnacle'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('instagram')); ?>" name="<?php echo esc_attr($this->get_field_name('instagram')); ?>" type="text" value="<?php echo esc_attr($instagram); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('googleplus')); ?>"><?php _e('GooglePlus:', 'pinnacle'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('googleplus')); ?>" name="<?php echo esc_attr($this->get_field_name('googleplus')); ?>" type="text" value="<?php echo esc_attr($googleplus); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('flickr')); ?>"><?php _e('Flickr:', 'pinnacle'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('flickr')); ?>" name="<?php echo esc_attr($this->get_field_name('flickr')); ?>" type="text" value="<?php echo esc_attr($flickr); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('vimeo')); ?>"><?php _e('Vimeo:', 'pinnacle'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('vimeo')); ?>" name="<?php echo esc_attr($this->get_field_name('vimeo')); ?>" type="text" value="<?php echo esc_attr($vimeo); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('youtube')); ?>"><?php _e('Youtube:', 'pinnacle'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('youtube')); ?>" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>" type="text" value="<?php echo esc_attr($youtube); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('pinterest')); ?>"><?php _e('Pinterest:', 'pinnacle'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('pinterest')); ?>" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" type="text" value="<?php echo esc_attr($pinterest); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('dribbble')); ?>"><?php _e('Dribbble:', 'pinnacle'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('dribbble')); ?>" name="<?php echo esc_attr($this->get_field_name('dribbble')); ?>" type="text" value="<?php echo esc_attr($dribbble); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('linkedin')); ?>"><?php _e('Linkedin:', 'pinnacle'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('linkedin')); ?>" name="<?php echo esc_attr($this->get_field_name('linkedin')); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('tumblr')); ?>"><?php _e('Tumblr:', 'pinnacle'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('tumblr')); ?>" name="<?php echo esc_attr($this->get_field_name('tumblr')); ?>" type="text" value="<?php echo esc_attr($tumblr); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('vk')); ?>"><?php _e('VK:', 'pinnacle'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('vk')); ?>" name="<?php echo esc_attr($this->get_field_name('vk')); ?>" type="text" value="<?php echo esc_attr($vk); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('rss')); ?>"><?php _e('RSS:', 'pinnacle'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('rss')); ?>" name="<?php echo esc_attr($this->get_field_name('rss')); ?>" type="text" value="<?php echo esc_attr($rss); ?>" />
    </p>
  <?php
  }
}
/**
 * Kadence Recent_Posts widget class
 *  Just a rewite of wp recent post
 * 
 */
class kad_recent_posts_widget extends WP_Widget {

  function kad_recent_posts_widget() {
      $widget_ops = array('classname' => 'kadence_recent_posts', 'description' => __('This shows the most recent posts on your site with a thumbnail', 'pinnacle'));
      $this->__construct('kadence_recent_posts', __('Pinnacle: Recent Posts', 'pinnacle'), $widget_ops);
      $this->alt_option_name = 'kadence_recent_entries';

  }

  function widget($args, $instance) {

    if ( ! isset( $args['widget_id'] ) )
      $args['widget_id'] = $this->id;


    ob_start();
    extract($args);

    $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts', 'pinnacle') : $instance['title'], $instance, $this->id_base);
    if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
      $number = 10;

    $r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'category_name' => $instance['thecate'], 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
    if ($r->have_posts()) :
?>
    <?php echo $before_widget; ?>
    <?php if ( $title ) echo $before_title . $title . $after_title; ?>
    <ul>
    <?php  while ($r->have_posts()) : $r->the_post(); ?>
    <li class="clearfix postclass">
        <a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>" class="recentpost_featimg">
          <?php global $post; if(has_post_thumbnail( $post->ID ) ) { 
            the_post_thumbnail( 'pinnacle_widget-thumb' ); 
          } else { 
            $image_url = pinnacle_img_placeholder_small();
            echo '<img width="60" height="60" src="'.$image_url.'" class="attachment-widget-thumb wp-post-image" alt="">'; } ?></a>
        <a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>" class="recentpost_title"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a>
        <span class="recentpost_date color_gray"><?php echo get_the_date(get_option( 'date_format' )); ?></span>
        </li>
    <?php endwhile; ?>
    </ul>
    <?php echo $after_widget; ?>
<?php
    // Reset the global $the_post as this query will have stomped on it
    wp_reset_postdata();

    endif;

  }

  function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['number'] = (int) $new_instance['number'];
    $instance['thecate'] = $new_instance['thecate'];

    return $instance;
  }

  function form( $instance ) {
    $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
    $number = isset($instance['number']) ? absint($instance['number']) : 5;
    if (isset($instance['thecate'])) { $thecate = esc_attr($instance['thecate']); } else {$thecate = '';}
     $categories= get_categories();
     $cate_options = array();
          $cate_options[] = '<option value="">All</option>';
 
    foreach ($categories as $cate) {
      if ($thecate==$cate->slug) { $selected=' selected="selected"';} else { $selected=""; }
      $cate_options[] = '<option value="' . $cate->slug .'"' . $selected . '>' . $cate->name . '</option>';
    }

?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'pinnacle'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

    <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'pinnacle'); ?></label>
    <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
        <p>
    <label for="<?php echo $this->get_field_id('thecate'); ?>"><?php _e('Limit to Catagory (Optional):', 'pinnacle'); ?></label>
    <select id="<?php echo $this->get_field_id('thecate'); ?>" name="<?php echo $this->get_field_name('thecate'); ?>"><?php echo implode('', $cate_options); ?></select>
  </p>
<?php
  }
}

/**
 * Kadence Post Grid widget class
 * 
 */
class kad_post_grid_widget extends WP_Widget {

  function kad_post_grid_widget() {
      $widget_ops = array('classname' => 'kadence_image_grid', 'description' => __('This shows a grid of featured images from recent posts or portfolio items', 'pinnacle'));
      $this->__construct('kadence_image_grid', __('Pinnacle: Post Grid', 'pinnacle'), $widget_ops);
      $this->alt_option_name = 'kadence_image_grid';

  }

  function widget($args, $instance) {

    if ( ! isset( $args['widget_id'] ) )
      $args['widget_id'] = $this->id;


    ob_start();
    extract($args);

    $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
    if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
      $number = 8; 
      echo $before_widget; ?>
        <?php if ( $title ) echo $before_title . $title . $after_title;
        
       switch ($instance['gridchoice']) {
      
        case "portfolio" :
        
          $r = new WP_Query( apply_filters('widget_posts_args', array( 
          'post_type' => 'portfolio', 
          'portfolio-type' => $instance['thetype'], 
          'no_found_rows' => true, 
          'posts_per_page' => $number, 
          'post_status' => 'publish', 
          'ignore_sticky_posts' => true ) ) );
          if ($r->have_posts()) :
          ?>        
          <div class="imagegrid-widget">
          <?php  while ($r->have_posts()) : $r->the_post(); ?>
          <?php global $post; if(has_post_thumbnail( $post->ID ) ) { ?> 
          <a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>" class="imagegrid_item lightboxhover">
            <?php the_post_thumbnail( 'pinnacle_widget-thumb' ); ?>
          </a>
                    <?php } ?>
          <?php endwhile; ?>
          </div>
          <?php wp_reset_postdata(); endif;
                break;
                case "post":          
            $r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'category_name' => $instance['thecat'], 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
            if ($r->have_posts()) : ?>
            <div class="imagegrid-widget">
          <?php  while ($r->have_posts()) : $r->the_post(); ?>
          
            <?php global $post; if(has_post_thumbnail( $post->ID ) ) { ?> <a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>" class="imagegrid_item lightboxhover"><?php the_post_thumbnail( 'pinnacle_widget-thumb' ); ?></a><?php } ?>
          <?php endwhile; ?>
          </div>
          <?php wp_reset_postdata(); endif;
               break; 
       } ?>
             
             <div class="clearfix"></div>
      <?php echo $after_widget; ?>
        
<?php
  }

  function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['number'] = (int) $new_instance['number'];
    $instance['thecat'] = $new_instance['thecat'];
    $instance['thetype'] = $new_instance['thetype'];
    $instance['gridchoice'] = $new_instance['gridchoice'];
 
    return $instance;
  }

  function form( $instance ) {
    
    $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
    $gridchoice = isset($instance['gridchoice']) ? esc_attr($instance['gridchoice']) : '';
    $number = isset($instance['number']) ? absint($instance['number']) : 6;
    if (isset($instance['thecat'])) { $thecat = esc_attr($instance['thecat']); } else {$thecat = '';}
    if (isset($instance['thetype'])) { $thetype = esc_attr($instance['thetype']); } else {$thetype = '';}

     $types= get_terms('portfolio-type');
     $type_options = array();
          $type_options[] = '<option value="">All</option>';
 
    foreach ($types as $type) {
      if ($thetype==$type->slug) { $selected=' selected="selected"';} else { $selected=""; }
      $type_options[] = '<option value="' . $type->slug .'"' . $selected . '>' . $type->name . '</option>';
    }
     $categories= get_categories();
     $cat_options = array();
          $cat_options[] = '<option value="">All</option>';
 
    foreach ($categories as $cat) {
      if ($thecat==$cat->slug) { $selected=' selected="selected"';} else { $selected=""; }
      $cat_options[] = '<option value="' . $cat->slug .'"' . $selected . '>' . $cat->name . '</option>';
    }


?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'pinnacle'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

    <p><label for="<?php echo $this->get_field_id('gridchoice'); ?>"><?php _e('Grid Choice:','pinnacle'); ?></label>
        <select id="<?php echo $this->get_field_id('gridchoice'); ?>" name="<?php echo $this->get_field_name('gridchoice'); ?>">
            <option value="post"<?php echo ($gridchoice === 'post' ? ' selected="selected"' : ''); ?>><?php _e('Blog Posts', 'pinnacle'); ?></option>
            <option value="portfolio"<?php echo ($gridchoice === 'portfolio' ? ' selected="selected"' : ''); ?>><?php _e('Portfolio', 'pinnacle'); ?></option>
        </select></p>
        
        <p><label for="<?php echo $this->get_field_id('thecat'); ?>"><?php _e('If Post - Choose Category (Optional):', 'pinnacle'); ?></label>
    <select id="<?php echo $this->get_field_id('thecat'); ?>" name="<?php echo $this->get_field_name('thecat'); ?>"><?php echo implode('', $cat_options); ?></select></p>
        
    <p><label for="<?php echo $this->get_field_id('thetype'); ?>"><?php _e('If Portfolio - Choose Type (Optional):', 'pinnacle'); ?></label>
    <select id="<?php echo $this->get_field_id('thetype'); ?>" name="<?php echo $this->get_field_name('thetype'); ?>"><?php echo implode('', $type_options); ?></select></p>
        
        <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of images to show:', 'pinnacle'); ?></label>
    <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
  
<?php
  }
}


class kad_image_widget extends WP_Widget{

    function kad_image_widget() {
        $widget_ops = array('classname' => 'kadence_simple_image', 'description' => __('This allows for an image and a simple about text.', 'pinnacle'));
        $this->__construct('kadence_simple_image', __('Pinnacle: Image', 'pinnacle'), $widget_ops);
        $this->alt_option_name = 'kadence_simple_image';
    }

    public function widget($args, $instance){ 
        extract( $args );
        if (!empty($instance['image_link_open']) && $instance['image_link_open'] == "none") {
          $uselink = false;
          $link = '';
          $linktype = '';
        } else if(empty($instance['image_link_open']) || $instance['image_link_open'] == "lightbox") {
          $uselink = true;
          $link = esc_url($instance['image_uri']);
          $linktype = 'data-rel="lightbox"';
        } else if($instance['image_link_open'] == "_blank") {
          $uselink = true;
          if(!empty($instance['image_link'])) {$link = $instance['image_link'];} else {$link = esc_url($instance['image_uri']);}
          $linktype = 'target="_blank"';
        } else if($instance['image_link_open'] == "_self") {
          $uselink = true;
          if(!empty($instance['image_link'])) {$link = $instance['image_link'];} else {$link = esc_url($instance['image_uri']);}
          $linktype = 'target="_self"';
        }
        $image_id = attachment_url_to_postid( $instance['image_uri'] );
        if(isset($image_id) && $image_id != '0') {
          $alt_text = get_post_meta($image_id, '_wp_attachment_image_alt', true);
        } else {
          $alt_text = '';
        }
    ?>
     <?php echo $before_widget; ?>
    <div class="kad_img_upload_widget">
        <?php if($uselink == true) {echo '<a href="'.esc_url($link).'" '.$linktype.'>';} ?>
        <img src="<?php echo esc_url($instance['image_uri']); ?>" alt="<?php echo esc_attr($alt_text); ?>" />
        <?php if($uselink == true) {echo '</a>'; }?>
        <?php if(!empty($instance['text'])) { ?> <p class="kadence_image_widget_caption"><?php echo esc_html($instance['text']); ?></p><?php }?>
    </div>

    <?php echo $after_widget; ?>
    <?php }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['text'] = strip_tags( $new_instance['text'] );
        $instance['image_uri'] = strip_tags( $new_instance['image_uri'] );
        $instance['image_link'] = $new_instance['image_link'];
        $instance['image_link_open'] = $new_instance['image_link_open'];

        return $instance;
    }

  public function form($instance){ 
    $image_uri = isset($instance['image_uri']) ? esc_attr($instance['image_uri']) : '';
    $image_link = isset($instance['image_link']) ? esc_attr($instance['image_link']) : '';
    if (isset($instance['image_link_open'])) { $image_link_open = esc_attr($instance['image_link_open']); } else {$image_link_open = 'lightbox';}
    $link_options = array();
    $link_options_array = array();
    $link_options[] = array("slug" => "lightbox", "name" => __('Lightbox', 'pinnacle'));
    $link_options[] = array("slug" => "_blank", "name" => __('New Window', 'pinnacle'));
    $link_options[] = array("slug" => "_self", "name" => __('Same Window', 'pinnacle'));
    $link_options[] = array("slug" => "none", "name" => __('No Link', 'pinnacle'));

    foreach ($link_options as $link_option) {
      if ($image_link_open == $link_option['slug']) { $selected=' selected="selected"';} else { $selected=""; }
      $link_options_array[] = '<option value="' . $link_option['slug'] .'"' . $selected . '>' . $link_option['name'] . '</option>';
    }
    ?>
  <div class="kad_img_upload_widget">
    <p>
        <img class="kad_custom_media_image" src="<?php if(!empty($instance['image_uri'])){echo $instance['image_uri'];} ?>" style="margin:0;padding:0;max-width:100px;display:block" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image URL', 'pinnacle'); ?></label><br />
        <input type="text" class="widefat kad_custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $image_uri; ?>">
        <input type="button" value="<?php _e('Upload', 'pinnacle'); ?>" class="button kad_custom_media_upload" id="kad_custom_image_uploader" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('image_link_open'); ?>"><?php _e('Image opens in', 'pinnacle'); ?></label><br />
        <select id="<?php echo $this->get_field_id('image_link_open'); ?>" name="<?php echo $this->get_field_name('image_link_open'); ?>"><?php echo implode('', $link_options_array);?></select>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('image_link'); ?>"><?php _e('Image Link (optional)', 'pinnacle'); ?></label><br />
        <input type="text" class="widefat kad_img_widget_link" name="<?php echo $this->get_field_name('image_link'); ?>" id="<?php echo $this->get_field_id('image_link'); ?>" value="<?php echo $image_link; ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text/Caption (optional)', 'pinnacle'); ?></label><br />
      <textarea name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>" class="widefat" ><?php if(!empty($instance['text'])) echo $instance['text']; ?></textarea>
    </p>
  </div>
    <?php
  }


}
