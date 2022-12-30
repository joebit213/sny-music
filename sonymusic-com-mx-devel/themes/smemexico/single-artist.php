<?php
/**
 * Artist Template 
 */
get_header();
if (have_posts()) : while (have_posts()) : the_post();
        ?>
        <article class="artist">
            <?php
            $artist_partials = array('bio', 'releases', 'videos', 'events'/* , 'instagram' */);
            foreach ($artist_partials as $artist_partial) {
                get_template_part('partials/artist', $artist_partial);
            }
            ?>
        </article>
        <?php
    endwhile;
endif;
get_footer();
