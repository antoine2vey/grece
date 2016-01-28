<?php get_header(); ?>
<section id="articles">
	<div class="main single container">
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<div class="post">
			<div class="row">
				<div class="col-md-8">
					<h1 class="post-title"><?php the_title(); ?></h1>
					<div class="underline"></div>

					<div class="post-content">
						<?php the_content(); ?>
					</div>

					<p class="infos post-info">
						<i class="fa fa-clock-o"></i><?php the_date(); ?> / <i class="fa fa-user"></i> <?php the_author(); ?> // <?php the_category(); ?>
					</p>

					<div class="post-comments">
						<?php comments_template(); ?>
					</div>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>

		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div>


	</div>

</div>
</div>
</section>

<?php get_footer(); ?>