<?php $post_category = get_the_category(); 
	if ( $post_category ) {?>
		<span class="postedinbottom"><i class="icon-folder-close"></i> <?php the_category(', ') ?></span>
	<?php }
	$tags = get_the_tags(); 
	if ($tags) { ?>
		<span class="posttags color_gray"><i class="icon-tag"></i> <?php the_tags('', ', ', ''); ?> </span>
	<?php } ?>