<?php get_header(); ?>
	

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <div class="img-left"><a href=""><img src="<?php echo get_template_directory_uri();?>/img/decor_asso.png" alt="banniere solidarite grece"/></a></div>
			<section class="error-404 not-found">
					<div class="page-header col s12">
						<h1 class="page-title">Il semblerait que vous soyez perdu</h1>
					</div>
					<div class="error-img"><img src="<?php echo get_template_directory_uri();?>/img/404.svg" alt=""></div>
					<div class="page-content col s12" style="text-align:center">
							<h2>Revenez donc vers la <a href="<?php echo home_url();?>">home page</a> !</h2>
					</div>				
			</section>

		</main>
	</div>


	<?php get_footer(); ?>