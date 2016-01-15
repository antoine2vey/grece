<div class="row">
<div class="col-md-2"></div>
	<?php if (have_posts()) : ?>
		<?php wp_reset_postdata(); query_posts('posts_per_page=4'); while (have_posts()) : the_post(); ?>

<!--
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
-->
		<div class="col-md-2 col-sm-8 col-xs-12" id="article">
                <div class="article_image">
                    <img src="<?php echo get_template_directory_uri();?>/img/Greece.png" />
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
                        <img src="<?php echo get_template_directory_uri();?>/img/Unknown-4.png" alt="auteur_photo" /></div>
                </div>
            </div>
			<?php endwhile; ?>
				<?php else : ?>
					<p class="nothing">Aucun article n'est disponible, contactez l'éditeur pour du contenu ! Sinon patientez ;-)</p>
					<?php endif; ?>
						<div class="col-md-2"></div>
</div>
</section>