<!DOCTYPE html>
<html lang="fr">

<head <?php language_attributes(); ?>>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title>
		<?php bloginfo('title'); ?>
	</title>
	<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700,100' rel='stylesheet' type='text/css'>
	<?php wp_head(); ?>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
</head>

<body>
	<div>
		<header class="navbar">
			<div class="container">
					<div id="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri();?>/img/logo.png"/></a></div>

					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#toggle">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse" id="toggle">
						<ul class="nav navbar-nav navbar-left">
							<li><a href="<?php echo home_url();?>/#asso">L'association</a></li>
							<li><a href="<?php echo home_url(); ?>/projet">Le projet</a></li>
							<li><a href="<?php echo home_url()?>/#galerie">Nos articles</a></li>
							<li><a href="#">Faire un don</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right hidden-xs hidden-sm">
							<li>
								<form action="#" method="POST" class="search">
									<?php get_search_form(); ?>
								</form>
							</li>
							<li><a href="<?php echo home_url();?>/wp-login.php">S'identifier</a></li>
							<li>

                                <a href="<?php echo home_url();?>/wp-login.php" class="inscription"><button class="btn btn-danger">S'inscrire</button></a>
							</li>
						</ul>
					</div>
			</div>
		</header>