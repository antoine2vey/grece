<div class="side">
	<h2 class="section title-header">Les derniers articles</h2>
	
		<?php wp_reset_postdata(); query_posts('posts_per_page=5'); while (have_posts()) : the_post(); ?>
		<ul class="list last-articles">
		<li>
			<h4>
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h4>
		</li>
		<li>
			<?php
			$excerpt = get_the_excerpt();
			echo string_limit_words($excerpt,15);
			?> ...
		</li>
</ul>
	<?php endwhile; ?>


<div class="widget">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
	<?php dynamic_sidebar(); ?>
<?php endif; ?>
</div>
</div>