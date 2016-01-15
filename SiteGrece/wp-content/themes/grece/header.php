<!DOCTYPE html>
<html>

<head <?php language_attributes(); ?>>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title>
		<?php bloginfo('title'); ?>
	</title>
	<?php wp_head(); ?>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
</head>

<body>
	<div>
		<header class="z-depth-1">
			<div class="navbar-fixed">
				<nav>
					<div class="nav-wrapper">
						<?php if (is_single()) : ?>
							<a href="<?php echo home_url(); ?>" class="title-blog brand-logo">
						<img src="<?php echo get_template_directory_uri();?>/img/logo_blank.png" alt="">
					</a>
							<ul id="nav-mobile" class="right">
								<li>
									<a href="#">L'association</a>
								</li>
								<li>
									<a href="#">Le projet</a>
								</li>
								<li>
									<a href="#">Galerie</a>
								</li>
								<li>
									<a href="#">Faites un don</a>
								</li>
							</ul>
							<?php else : ?>
								<a href="<?php echo home_url(); ?>" class="title-blog brand-logo">
						<img src="<?php echo get_template_directory_uri();?>/img/logo_blank.png" alt="test">
					</a>
								<ul id="nav-mobile" class="right">
									<li>
										<a href="#">L'association</a>
									</li>
									<li>
										<a href="#">Le projet</a>
									</li>
									<li>
										<a href="#">Galerie</a>
									</li>
									<li>
										<a href="#">Faites un don</a>
									</li>
								</ul>
								<?php endif; ?>
					</div>
				</nav>
			</div>
		</header>