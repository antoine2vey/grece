<?php /* Template Name:don */ ?>
<?php get_header(); ?>
<section id="don">
    <div class="row">
        <div class="col-md-2 col-sm-2 col-xs-1">
            <img src="<?php echo get_template_directory_uri();?>/img/decor_projet2.png" id="decor2" class="hidden-sm hidden-xs"/>
        </div>
        <div class="col-md-6 col-sm-8 col-xs-10" id="project">
            <h1>Faire un don</h1>

            <div class="underline"></div>
            <div class="texte">

                <p>Nous avons donc tout les trois décidé de nous engager humanitairement et de partir amener en camion
                    du matériel médical, dentaire et paramédical dans un dispensaire social grec.</p>
                <br/>

                <p>Nous sommes à la recherche de financement pour ce camion. Nous désirons acheter un camion neuf, non
                    pas pour s'assurer un voyage confortable, mais simplement car nous nous engageons moralement à
                    léguer ce camion neuf au Secours Populaire Francais local qui assure l'aide alimentaire à plus de
                    160 familles chaque jour. ( Il n'y a pas besoin de partir loin pour faire de l'humanitaire).</p>

                <p>L'objectif est de <span class="bold">25 000 €</span>.</p>
                <br/>

                <p>Chacun peut donner en fonction de ses moyens et sans se précariser. Merci d'avance pour votre
                    engagement citoyen et humain. Ici vous pouvez directement et en un clic, participer à cette
                    cagnotte. Chacun participe du montant qu'il souhaite.</p>

                <p>Tous les paiements sont sécurisés via PayPal.</p>

                <div class="img-don">
                    <img
                        src="http://www.ouest-france.fr/sites/default/files/styles/image-640x360/public/2014/11/06/le-secours-populaire-prepare-sa-grande-braderie.jpg?itok=NDEeMQVx"
                        class="img-responsive"/>
                </div>

            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12" id="box">
            <div id="in-box">
                <div class="row">
                    <span id="montant-recolte">520 €</span>
                    <span id="montant-total">collectés sur 25 000 €</span></div>
                <br/>

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

<?php get_footer(); ?>