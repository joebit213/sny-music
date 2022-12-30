<section id="artist-videos" class="content-section light-red-section dark-red-left-brush-bottom">
    <div class="container-fluid slim-container">
        <h2 class="section-title"><?php _e('Videos', 'sme_mexico'); ?></h2>
        <?php
        $args = array(
            'post_type' => 'video',
            'posts_per_page' => 1,
            'orderby' => 'date',
            'order' => 'DESC',
            'meta_query' => array(
                array(
                    'key' => 'associated_artist',
                    'value' => '"' . get_the_ID() . '"',
                    'compare' => 'LIKE'
                )
            )
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
        if (!empty($youtube_url)) :
            ?>
            <div id="video-player">
                <div class="embed-responsive embed-responsive-16by9">
                    <?php echo str_replace('></iframe>', ' title="' . esc_attr(get_the_title()) . '"></iframe>', $youtube_url); ?>
                </div>
            </div>
            <?php
        endif;
        $v = 0;
        $vv = 0;
        $args = array(
            'post_type' => 'video',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'DESC',
            'meta_query' => array(
                array(
                    'key' => 'associated_artist',
                    'value' => '"' . get_the_ID() . '"',
                    'compare' => 'LIKE'
                )
            )
        );

        $videos = new WP_Query($args);
        if ($videos->have_posts()) :
            ?>
            <div class="row video-row">
                <?php
                while ($videos->have_posts()) : $videos->the_post();
                    $col_size = 'col-md-4';
                    include(locate_template('partials/loop-video.php'));
                    $v++;
                    if ($v == 3) {
                        echo '<div class="clearfix"></div>';
                        $v = 0;
                    }
                endwhile;
                wp_reset_postdata();
                ?>
            </div>    
            <?php
        else :
            ?>
            <p class="text-center empty-results"><?php _e('No videos.', 'sme_mexico'); ?></p>
        <?php
        endif;
        ?>
    </div>
</section>