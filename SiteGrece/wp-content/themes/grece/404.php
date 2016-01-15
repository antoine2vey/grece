<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<div class="row">
					<div class="page-header col s12">
						<h1 class="page-title"><?php _e( 'Il semblerait que vous êtes perdu.', 'grece' ); ?></h1>
					</div>
				</div>
				<div class="row">
					<div class="page-content col s12">
						<p>
							<?php _e( "N'hésitez pas à aller voir votre médecin traitant", 'twentyfifteen' ); ?>
						</p>
					</div>
				</div>
				
				<?php get_search_form(); ?>
			</section>

		</main>
	</div>

	<?php get_footer(); ?>