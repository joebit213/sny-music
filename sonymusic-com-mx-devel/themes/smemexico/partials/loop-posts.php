<div class="news slim-container">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            get_template_part('partials/loop', 'post');
        endwhile;
        wp_reset_postdata();
    else :
        ?>
        <p class="text-center empty-results"><?php _e('No upcoming events.', 'sme_mexico'); ?></p>
    <?php
    endif;
    ?>
</div>  
<?php
if (function_exists('wp_pagenavi')) :
    ?>
    <nav class="page-navi">
        <?php
        wp_pagenavi();
        ?>
    </nav>
    <?php
endif;
?>