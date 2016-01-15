<div class="subhead">
    <span class="postauthortop author vcard">
    	<?php echo __('by', 'pinnacle'); ?> <span itemprop="author"><a href="<?php echo esc_attr(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="fn" rel="author"><?php echo get_the_author() ?></a></span>
    </span>
    <span class="updated postdate"><?php echo __('on', 'pinnacle'); ?> <span class="postday" itemprop="datePublished"><?php echo get_the_date() ?></span></span>
    <span class="postcommentscount"><?php echo __('with', 'pinnacle'); ?> 
    	<a href="<?php the_permalink();?>#post_comments"><?php comments_number(); ?></a>
    </span>
</div>
<?php //__('No Replies', 'pinnacle'), __('1 Reply', 'pinnacle'), __('% Replies') ?>