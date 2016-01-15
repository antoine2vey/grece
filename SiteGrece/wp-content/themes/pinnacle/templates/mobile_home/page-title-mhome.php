<?php global $pinnacle; 
	if(isset($pinnacle['m_home_page_title'])) {
		$homepagetitle = $pinnacle['m_home_page_title'];
	} else {
		$home_page_title = '';
	}
	if(isset($pinnacle['m_home_page_sub_title'])) {
		$bsub = $pinnacle['m_home_page_sub_title'];
	} else {
		$bsub = '';
	} 
	if(isset($pinnacle['m_home_page_title_parallax']) && $pinnacle['m_home_page_title_parallax'] == '1') {
		$b_parallax = 'kad-parallax';
	} else {
		$b_parallax = '';
	} 
	if(isset($pinnacle['m_home_page_title_ptop'])) {
		$tpadding = 'padding-top:'.$pinnacle['m_home_page_title_ptop'].'px;';
	} else {
		$tpadding = '';
	}
	if(isset($pinnacle['m_home_page_title_pbottom'])) {
		$bpadding = 'padding-bottom:'.$pinnacle['m_home_page_title_pbottom'].'px;';
	} else {
		$bpadding = '';
	}
	if(isset($pinnacle['m_home_page_title_align'])) {
		$talign = 'text-align:'.$pinnacle['m_home_page_title_align'];
	} else {
		$talign = '';
	}
	if(isset($pinnacle['m_home_pagetitle_background'])) {
		if(!empty($pinnacle['m_home_pagetitle_background']['background-image'])) {
			$bg_img 		= 'url('.$pinnacle['m_home_pagetitle_background']['background-image'].')';
			$bg_repeat 		= 'background-repeat: ' . $pinnacle['m_home_pagetitle_background']['background-repeat'].';';
			$bg_size 		= 'background-size: ' .$pinnacle['m_home_pagetitle_background']['background-size'].';';
			$bg_position 	= 'background-position: ' .$pinnacle['m_home_pagetitle_background']['background-position'].';';
			$bg_attachment 	= 'background-attachment: ' .$pinnacle['m_home_pagetitle_background']['background-attachment'].';';
		} else {
			$bg_img 		= '';
			$bg_repeat 		= '';
			$bg_size 		= '';
			$bg_position 	= '';
			$bg_attachment 	= '';
		}
		if(!empty($pinnacle['m_home_pagetitle_background']['background-color'])) {
			$bgcolor = $pinnacle['m_home_pagetitle_background']['background-color'];
		} else {
			$bgcolor = '';
		}
		if(!empty($bgcolor) || !empty($bg_img)) {
			$bg_style = 'background:'.$bgcolor.' '.$bg_img.';';
		} else {
			$bg_style = '';
		}
	}
	if(!empty($homepagetitle)) {
       	$homepagetitle = str_replace('[site-name]',get_bloginfo('name'),$homepagetitle);
    }
    if(!empty($bsub)) {
       	$bsub = str_replace('[site-tagline]',get_bloginfo('description'),$bsub);
    }
?>
<div id="pageheader" class="titleclass kad-mobile-slider home-title-class <?php echo esc_attr($b_parallax);?>" style="<?php echo esc_attr($bg_style).' '.esc_attr($bg_repeat).' '.esc_attr($bg_size).' '.esc_attr($bg_position).' '.esc_attr($bg_attachment); ?>">
<div class="header-color-overlay"></div>
	<div class="container">
		<div class="page-header home-page-header" style="<?php echo esc_attr($tpadding).' '.esc_attr($bpadding).' '.esc_attr($talign);?>">
			<div class="row">
				<div class="col-md-12">
				  	<h1 class="kad-page-title home-page-title"><?php echo esc_html($homepagetitle);?></h1>
					  <?php if(!empty($bsub)) { echo '<p class="subtitle home-page-subtitle"> '. esc_html($bsub).' </p>'; } ?>
				</div>
			</div>
		</div>
	</div><!--container-->
</div><!--titleclass-->