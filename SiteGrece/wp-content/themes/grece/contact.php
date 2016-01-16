<?php /* Template Name: contact */?>
<?php get_header();?>
 <section id="contact">
        <div class="row">
            <div class="col-md-3 col-sm-2 col-xs-1">
                <img src="<?php echo get_template_directory_uri();?>/img/decor_asso.png" class="img-responsive hidden-sm hidden-xs" id="decor" />
            </div>
            <div class="col-md-7 col-sm-8 col-xs-10">
                <h1>Nous contacter</h1>
                <div class="underline"></div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-1"></div>
        </div>
        <div class="container">
            <form class="form-horizontal" role="form" method="POST" action="#">
                <div class="form-group">
                    <div>
                        <label for="name" class="col-sm-2 control-label">Nom</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Votre nom" value="">
                        </div>
                    </div>
                    <div>
                        <label for="name" class="col-sm-2 control-label">Prénom</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Votre prénom" value="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="message" class="col-sm-2 control-label">Message</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="4" name="message"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button id="submit" name="submit" type="submit" class="btn btn-primary">
                            Envoyer 
                            <i class="fa fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        ! Will be used to display an alert to the user>
                    </div>
                </div>
            </form>
        </div>
    </section>

<?php get_footer();?>