<div class="row article-index">
<div class="col-md-2"></div>


	<?php if (have_posts()) : ?>
		<?php wp_reset_postdata(); query_posts('posts_per_page=4'); while (have_posts()) : the_post(); ?>


		<div class="col-md-2 col-xs-12" id="article">
                <div class="article_image">
            <?php
if ( has_post_thumbnail() ) {
    echo "<img src='".get_the_post_thumbnail_url()."'/>";
}
else {
   echo '<img src="' . get_template_directory_uri() . '/img/joris.jpg"/>';
}
?>               
                </div>
                <div class="article_texte">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p><?php echo excerpt_home(); ?></p>
                </div>
                <div class="article_auteur">
                    <div class="left">
                        <span class="nom"><?php the_author(); ?></span>
                        <br />
                        <i class="fa fa-pencil"></i><span class="date"><?php the_time('l j F Y'); ?></span></div>
                    <div class="right">
                        <?php echo get_avatar( get_the_author_meta( 'ID' )); ?>
                    </div>
                </div>
            </div>

			<?php endwhile; ?>
				<?php else : ?>


					<p class="nothing">Aucun article n'est disponible, contactez l'éditeur pour du contenu ! Sinon patientez ;-)</p>

				<?php endif; ?>

</div>
</section>