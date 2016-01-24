<?php get_header(); ?>
<div class="main">
	<h1>Catégorie : <?php single_cat_title(); ?></h1>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		<?php the_content();echo"<br/>" ?>
	<?php endwhile; else: endif; ?>

	<?php query_posts('category_name='.get_the_title().'&post_status=publish,future');?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<h1></h1>
	<p><?php the_content(); ?>
	<?php endwhile; else: endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>