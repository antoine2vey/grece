<?php global $pinnacle; ?>
<footer id="containerfooter" class="footerclass" role="contentinfo">
  	<div class="container">
  		<div class="row">
  			<?php if(isset($pinnacle['footer_layout'])) { $footer_layout = $pinnacle['footer_layout']; } else { $footer_layout = 'fourc'; }
  				if ($footer_layout == "fourc") {
	  				if (is_active_sidebar('footer_1') ) { ?> 
						<div class="col-md-3 col-sm-6 footercol1">
						<?php dynamic_sidebar('footer_1'); ?>
						</div> 
	            	<?php }; ?>
					<?php if (is_active_sidebar('footer_2') ) { ?> 
						<div class="col-md-3 col-sm-6 footercol2">
						<?php dynamic_sidebar('footer_2'); ?>
						</div> 
			        <?php }; ?>
			        <?php if (is_active_sidebar('footer_3') ) { ?> 
						<div class="col-md-3 col-sm-6 footercol3">
						<?php dynamic_sidebar('footer_3'); ?>
						</div> 
		            <?php }; ?>
					<?php if (is_active_sidebar('footer_4') ) { ?> 
						<div class="col-md-3 col-sm-6 footercol4">
						<?php dynamic_sidebar('footer_4'); ?>
						</div> 
			        <?php }; ?>
			    <?php } else if($footer_layout == "threec") {
			    	if (is_active_sidebar('footer_third_1') ) { ?> 
						<div class="col-md-4 footercol1">
						<?php dynamic_sidebar('footer_third_1'); ?>
						</div> 
	            	<?php }; ?>
					<?php if (is_active_sidebar('footer_third_2') ) { ?> 
						<div class="col-md-4 footercol2">
						<?php dynamic_sidebar('footer_third_2'); ?>
						</div> 
			        <?php }; ?>
			        <?php if (is_active_sidebar('footer_third_3') ) { ?> 
						<div class="col-md-4 footercol3">
						<?php dynamic_sidebar('footer_third_3'); ?>
						</div> 
		            <?php }; ?>
				<?php } else {
						if (is_active_sidebar('footer_double_1') ) { ?>
						<div class="col-md-6 footercol1">
						<?php dynamic_sidebar('footer_double_1'); ?> 
						</div> 
			            <?php }; ?>
			        <?php if (is_active_sidebar('footer_double_2') ) { ?>
						<div class="col-md-6 footercol2">
						<?php dynamic_sidebar('footer_double_2'); ?> 
						</div> 
			            <?php }; ?>
			        <?php } ?>
        </div> <!-- Row -->
    	<div class="footercredits clearfix">
    		<?php if (has_nav_menu('footer_navigation')) :?>
    			<div class="footernav clearfix">
    			<?php wp_nav_menu(array('theme_location' => 'footer_navigation', 'menu_class' => 'footermenu'));?>
    			</div>
    		<?php endif;?>
        	<?php if(!empty($pinnacle['footer_text'])) { 
        		$footerstring = $pinnacle['footer_text'];
        		$footerstring = str_replace('[copyright]','&copy;',$footerstring);
        		$footerstring = str_replace('[the-year]',date('Y'),$footerstring);
        		$footerstring = str_replace('[site-name]',get_bloginfo('name'),$footerstring);
        		$footerstring = str_replace('[theme-credit]','- WordPress Theme by <a href="http://www.kadencethemes.com/" target="_blank">Kadence Themes</a>',$footerstring);
        		echo '<p>'. do_shortcode($footerstring).'</p>';} ?>
    	</div><!-- credits -->
    </div><!-- container -->
</footer>
<?php wp_footer(); ?>