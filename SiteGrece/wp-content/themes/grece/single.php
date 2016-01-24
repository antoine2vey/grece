<?php get_header(); ?>

<div class="main single container">
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	<div class="post">
		<div class="row">
			<h1 class="post-title"><?php the_title(); ?></h1>
		</div>

		<div class="row">
			<p class="post-info"> Posté le
				<?php the_date(); ?> dans
				<?php the_category(', '); ?> par
				<?php the_author(); ?>. </p>
		</div>

		<div class="post-content row">
			<?php the_content(); ?>
		</div>

		<div class="post-comments row">
			<?php comments_template(); ?>
		</div>
		</div>
	<?php endwhile; ?>
<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>