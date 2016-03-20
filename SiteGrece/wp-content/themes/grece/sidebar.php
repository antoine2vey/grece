<div class="side">
    <h2 class="section title-header">Les derniers articles</h2>
    <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="205">
        <?php wp_reset_postdata();
        query_posts('posts_per_page=5');
        while (have_posts()) : the_post(); ?>
            <li>
                <a href="<?php the_permalink(); ?>">
                    <ul class="list last-articles">
                        <li>
                            <h4>
                                <?php the_title(); ?>
                            </h4>
                        </li>
                        <li>
                            <?php
                            $excerpt = get_the_excerpt();
                            echo string_limit_words($excerpt, 15);
                            ?> ...
                        </li>
                    </ul>
                </a>
            </li>
        <?php endwhile; ?>
    </ul>

    <div class="widget">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar()) : ?>
            <?php dynamic_sidebar(); ?>
        <?php endif; ?>
    </div>
</div>