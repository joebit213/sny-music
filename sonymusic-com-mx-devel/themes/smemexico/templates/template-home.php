<?php
/**
 * Template Name: Home
 */
get_header();
if (have_posts()) : while (have_posts()) : the_post();
        ?>
        <article>
            <?php
            $home_partials = array('carousel', 'media', 'social');
            foreach ($home_partials as $home_partial) {
                get_template_part('partials/home', $home_partial);
            }
            ?>
        </article>
        <?php
    endwhile;
endif;
get_footer();
