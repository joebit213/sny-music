<?php
$a = 0;
$aa = 0;
$args = array(
    'post_type' => 'artist',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC'
);

$artists = new WP_Query($args);
if ($artists->have_posts()) :
    ?>
    <div class="row artist-row">
        <?php
        while ($artists->have_posts()) : $artists->the_post();
            get_template_part('partials/loop', 'artist');
            $a++;
            $aa++;
            if ($aa == 2) {
                echo '<div class="clearfix visible-xs visible-sm"></div>';
                $aa = 0;
            }
            if ($a == 4) {
                echo '<div class="clearfix hidden-xs hidden-sm"></div>';
                $a = 0;
            }
        endwhile;
        wp_reset_postdata();
        ?>
    </div>    
    <?php
endif;