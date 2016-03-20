<?php get_header(); ?>
<section id="articles">
    <div class="main single container">
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <div class="post">
            <div class="row">
                <div class="col-md-8">
                    <span class="title-header">Le <?php the_date(); ?></span>
                    <div class="content">

                        <h1 class="post-title"><?php the_title(); ?></h1>
                        <div class="underline"></div>
                        <p class="infos post-info">
                            <i class="fa fa-clock-o"></i> <?php echo the_time('G:i'); ?> / <i class="fa fa-user"></i> <?php the_author(); ?> / <i class="fa fa-folder-open"></i> <?php the_category(', '); ?> / <span id="comments"><i class="fa fa-comment-o"></i> <?php comments_number('Pas de commentaire', '1 commentaire', '% commentaires' );?></span>
                        </p>
                        <div class="underline"></div>

                        <div class="post-content hyphenate">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <div class="content">

                        <div class="post-comments">
                            <?php comments_template(); ?>
                        </div>
                    </div>

                </div>
                <?php endwhile; ?>
                <?php endif; ?>

                <nav class="col-md-4">
                    <?php get_sidebar(); ?>
                </nav>


            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>