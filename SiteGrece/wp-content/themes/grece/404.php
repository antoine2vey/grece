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
					<div class="page-header col s12">
						<h1 class="page-title"><?php _e( 'Il semblerait que vous êtes perdu.', 'grece' ); ?></h1>
					</div>
					<div class="page-content col s12" style="text-align:center">
						<p>
							<h2>That's an error, just go back <a href="<?php echo home_url();?>">here</a> !</h2>
						</p>
					</div>				
			</section>

		</main>
	</div>

	<?php get_footer(); ?>