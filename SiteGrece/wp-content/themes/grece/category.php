<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="main category col-md-8">
			<h1 class="title-header">Catégorie : <?php single_cat_title(); ?></h1>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="category-content">
				<a href="<?php the_permalink(); ?>">
					<h2><?php the_title(); ?></h2>
				</a>
				<hr>

				<?php the_excerpt(); ?>
			</div>
		<?php endwhile; else: endif; ?>
		<?php query_posts('category_name='.get_the_title().'&post_status=publish,future');?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<h1></h1>
		<p>
			<?php the_content(); ?>
		<?php endwhile; else: endif; ?>
	</div>
	<div class="col-md-4">

		<?php get_sidebar(); ?>
	</div>
</div>
</div>
<?php get_footer(); ?>