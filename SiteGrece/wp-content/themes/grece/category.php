<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <div class="main category col-md-8">
                <h1 class="title-header">Catégorie : <?php single_cat_title(); ?></h1>
                <?php if (have_posts()) : while (have_posts()) :
                    the_post(); ?>
                    <a href="<?php the_permalink(); ?>">
                        <div class="category-content">

                            <h2><?php the_title(); ?></h2>

                            <hr>

                            <?php the_excerpt(); ?>
                        </div>
                    </a>
                <?php endwhile;
                else:
                endif; ?>
            </div>
            <div class="col-md-4">

                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>