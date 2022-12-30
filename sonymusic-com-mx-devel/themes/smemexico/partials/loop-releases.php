<?php
$r = 0;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'release',
    'posts_per_page' => 16,
    'meta_key' => 'release_date',
    'orderby' => 'meta_value',
    'order' => 'DESC',
    'paged' => $paged
);

$releases = new WP_Query($args);
if ($releases->have_posts()) :
    ?>
    <div class="row release-row">
        <?php
        while ($releases->have_posts()) : $releases->the_post();
            get_template_part('partials/loop', 'release');
            $r++;
            if ($r == 4) {
                echo '<div class="clearfix"></div>';
                $r = 0;
            }
        endwhile;
        wp_reset_postdata();
        ?>
    </div>    
    <?php
endif;

if (function_exists('wp_pagenavi')) :
    ?>
    <nav class="page-navi">
        <?php
        wp_pagenavi(array('query' => $releases));
        ?>
    </nav>
    <?php
endif;
?>