<?php
/**
 * Template Name: Artists
 */
get_header();
$characters = range('A', 'Z');
if (have_posts()) : while (have_posts()) : the_post();
        ?>
        <article class="page-item">
            <header class="page-header">
                <div class="container-fluid">
                    <h1><?php the_title(); ?></h1>
                    <ul id="artist-filter">
                        <li><span><?php _e('Filter Artist:'); ?></span></li>
                        <?php
                        foreach ($characters as $character) :
                            ?>
                            <li>
                                <a href="<?php echo add_query_arg('starts_with', $character, get_permalink()); ?>"><?php echo $character; ?></a>
                            </li>
                            <?php
                        endforeach;
                        ?>
                    </ul>
                </div>
            </header>
            <div class="page-content content-section dark-red-center-brush-bottom">
                <div class="container-fluid">
                    <?php get_template_part('partials/loop', 'artists'); ?>
                </div>
            </div>
        </article>
        <?php
    endwhile;
endif;
get_footer();
