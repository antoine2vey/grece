<?php get_header(); ?>
	<div class="main">
		<?php query_posts('posts_per_page=10'); ?>
<?php get_template_part('loop'); ?>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>