<?php get_header(); ?>
	<div class="hero">
		<img src="<?php echo get_template_directory_uri();?>/img/Greece.png" />
	</div>
	<section id="asso">
		<div class="row">
			<div class="col-md-3 col-sm-2 col-xs-1">
				<img src="<?php echo get_template_directory_uri();?>/img/decor_asso.png" class="img-responsive hidden-sm hidden-xs" id="decor" />
			</div>
			<div class="col-md-7 col-sm-8 col-xs-10">
				<h1>L'association</h1>
				<div class="underline"></div>
				<div class="texte">
					<p>Nous sommes trois étudiants infirmiers de l'école du Centre Hospitalier d'Arras (62).</p>
					<br />
					<p>Dans un contexte économique et social des plus complexes, il est en total adéquation avec notre future profession de s'engager, s'engager pour l'autre, pour l'humain.</p>
					<br />
					<p>Nos amis grecs sont dans une situation sanitaire et sociale des plus catastrophiques. Les soins ne peuvent plus être effectués dans les services publics à cause d'un manque cruel de financement. Les malaises en classe sont de plus en plus fréquents, faute de déjeuner le matin. On assiste également à une nette augmentation des maladies psychologiques telle que la dépression. Certaines maladies disparues refont également leur apparition.</p>
					<br />
					<p>Les Grecs s'organisent donc sur un système de bénévolat dans des dispensaires sociaux, où les personnels de santé viennent se relayer bénévolement pour assurer les soins de bases à la population.</p>
				</div>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-1"></div>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-2 col-xs-1"></div>
			<div class="col-md-2 col-sm-2 col-xs-3">
				<div class="photo">
					<img src="<?php echo get_template_directory_uri();?>/img/Greece.png" />
				</div>
				<h2>Clément <span class="bold">Viseur</span></h2>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-3">
				<div class="photo">
					<img src="<?php echo get_template_directory_uri();?>/img/Greece.png" />
				</div>
				<h2>Rodolphe <span class="bold">Herbaut</span></h2>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-3">
				<div class="photo">
					<img src="<?php echo get_template_directory_uri();?>/img/Greece.png" />
				</div>
				<h2>Qui <span class="bold">suis-je</span></h2>
			</div>
			<div class="col-md-3 col-sm-2 col-xs-1"></div>
		</div>
	</section>

	<section id="projet">
		<div class="row">
			<div class="col-md-2 col-sm-2 col-xs-1">
				<img src="<?php echo get_template_directory_uri();?>/img/decor_projet2.png" id="decor2" class="hidden-sm hidden-xs" />
			</div>
			<div class="col-md-6 col-sm-8 col-xs-10" id="project">
				<h1>Le projet</h1>
				<div class="underline"></div>
				<div class="texte">
					<p>Nous avons donc tout les trois décidé de nous engager humanitairement et de partir amener en camion du matériel médical, dentaire et paramédical dans un dispensaire social grec.</p>
					<br />
					<p>Nous sommes à la recherche de financement pour ce camion. Nous désirons acheter un camion neuf, non pas pour s'assurer un voyage confortable, mais simplement car nous nous engageons moralement à léguer ce camion neuf au Secours Populaire Francais local qui assure l'aide alimentaire à plus de 160 familles chaque jour. ( Il n'y a pas besoin de partir loin pour faire de l'humanitaire).</p>

					<p>L'objectif est de <span class="bold">25 000 €</span>.</p>
					<br />

					<p>Chacun peut donner en fonction de ses moyens et sans se précariser. Merci d'avance pour votre engagement citoyen et humain. Ici vous pouvez directement et en un clic, participer à cette cagnotte. Chacun participe du montant qu'il souhaite.</p>
					<p>Tous les paiements sont sécurisés via PayPal.</p>
				</div>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12" id="box">
				<div id="in-box">
					<div class="row">
						<span id="montant-recolte">520 €</span>
						<span id="montant-total">collectés sur 25 000 €</span></div>
					<br />
					<div class="row">
						<span id="percent">2%</span>
						<div id="bar">
							<div id="progress-bar"></div>
						</div>
					</div>
					<div class="row">
						<div class="left">
							<i class="fa fa-clock-o fa-2x"></i>
							<h4 id="jours-restants">230</h4>
							<h5>Jours restants</h5>
						</div>
						<div class="right">
							<i class="fa fa-user fa-2x"></i>
							<h4 id="nb-participants">21</h4>
							<h5>participants</h5>
						</div>
					</div>
					<div class="row">
						<a href="#">
							<div class="clearfix" id="button">Je participe</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section id="galerie">
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-1"></div>
            <div class="col-md-8">
                <h1>Galerie</h1>
                <div class="underline"></div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-1"></div>
        </div>
        <div class="row" id="options">
            <div class="col-md-2 col-sm-2 col-xs-1"></div>
            <div class="col-md-4 col-sm-4 col-xs-5">
                <div class="left">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Récents <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Populaires</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-5">
                <div class="right">
                    <button type="button" class="btn btn-default">Tout afficher</button>
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-1"></div>
        </div>
	<?php get_template_part('loop');?>
		<?php get_footer(); ?>