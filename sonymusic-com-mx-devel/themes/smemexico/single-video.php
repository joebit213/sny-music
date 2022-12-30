<?php
/**
 * Videos template
 */
get_header();
if (have_posts()) : while (have_posts()) : the_post();
        ?>
        <article class="page-item">
            <header class="page-header">
                <div class="container-fluid">
                    <h1><?php _e('Videos', 'sme_mexico'); ?></h1>
                </div>
            </header>
            <div class="page-content content-section dark-red-center-brush-bottom">
                <div class="container-fluid">
                    <?php get_template_part('partials/loop', 'videos'); ?>
                </div>
            </div>
        </article>
        <?php
    endwhile;
endif;
get_footer();
