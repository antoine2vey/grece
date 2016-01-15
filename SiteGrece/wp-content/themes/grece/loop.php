<div class="all-post">
	<div class="row">
		<div class="col l8">
			<?php if (have_posts()) : ?>
				<?php wp_reset_postdata(); query_posts('posts_per_page=3'); while (have_posts()) : the_post(); ?>

					<div class="post">
						<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h3>
						<p class="post-info"> Posté le
							<?php the_time('l j F Y'); ?> dans
								<?php the_category(', '); ?> par
									<strong><?php the_author(); ?></strong>. </p>
						<div class="post-content">
							<?php the_excerpt(); ?>
						</div>

					</div>
					<?php endwhile; ?>
						<?php else : ?>
							<p class="nothing">Aucun article n'est disponible, contactez l'éditeur pour du contenu ! Sinon patientez ;-)</p>
							<?php endif; ?>
		</div>
		<div class="col l4">
			<?php get_sidebar();?>
		</div>

	</div>
</div>