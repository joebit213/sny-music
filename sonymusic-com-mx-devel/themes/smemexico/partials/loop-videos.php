<?php
if (is_singular('video')) {
    $associated_artist = get_field('associated_artist');
    $youtube_url = get_field('youtube_url');
    $youtube_id = parse_youtube_id($youtube_url);
} else {
    $args = array(
        'post_type' => 'video',
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $videos = new WP_Query($args);
    if ($videos->have_posts()):
        while ($videos->have_posts()) : $videos->the_post();
            $associated_artist = get_field('associated_artist');
            $youtube_url = get_field('youtube_url');
            $youtube_id = parse_youtube_id($youtube_url);
        endwhile;
        wp_reset_postdata();
    endif;
}
?>
<div id="video-player">
    <div class="embed-responsive embed-responsive-16by9">
        <?php echo str_replace('></iframe>', ' title="' . esc_attr(get_the_title()) . '"></iframe>', $youtube_url); ?>
    </div>
</div>
<?php
$v = 0;
$vv = 0;
$args = array(
    'post_type' => 'video',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC'
);

$videos = new WP_Query($args);
if ($videos->have_posts()) :
    ?>
    <div class="row video-row">
        <?php
        while ($videos->have_posts()) : $videos->the_post();
            get_template_part('partials/loop', 'video_1');
            $v++;
            $vv++;
            if ($vv == 2) {
                echo '<div class="clearfix visible-xs visible-sm"></div>';
                $vv = 0;
            }
            if ($v == 4) {
                echo '<div class="clearfix hidden-xs hidden-sm"></div>';
                $v = 0;
            }
        endwhile;
        wp_reset_postdata();
        ?>
    </div>    
    <?php
endif;
?>