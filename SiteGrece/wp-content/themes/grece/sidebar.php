<div class="side">
	<?php get_search_form(); ?>
		<ul class="list">
			<?php wp_get_archives('type=monthly'); ?>
		</ul>
		<h4 class="section">Derniers articles</h4>
		<ul class="list">
			<?php wp_reset_postdata(); query_posts('posts_per_page=5'); while (have_posts()) : the_post(); ?>
				<li>
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</li>
				<li>
					<?php
  $excerpt = get_the_excerpt();
  echo string_limit_words($excerpt,15);
?> ...
				</li>

				<?php endwhile; ?>

		</ul>
		<div class="widget">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
				<?php dynamic_sidebar(); ?>
					<?php endif; ?>
		</div>
</div>