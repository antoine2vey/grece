<div class="sliderclass kad-desktop-slider">
	<div id="imageslider" class="container">
		<?php global $pinnacle; 
			if(isset($pinnacle['slider_size_width'])) {
				$slidewidth = $pinnacle['slider_size_width'];
			} else {
				$slidewidth = 1140;
			} ?>
				<div class="videofit" style="max-width:<?php echo esc_attr($slidewidth);?>px; margin-left: auto; margin-right:auto;">
	                <?php if(!empty($pinnacle['video_embed'])) echo $pinnacle['video_embed'];?>
	            </div>
	</div><!--Container-->
</div><!--feat-->