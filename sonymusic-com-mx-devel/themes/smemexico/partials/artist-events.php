<section id="artist-events" class="content-section dark-red-section white-dark-brush-bottom">
    <div class="container-fluid slim-container">
        <h2 class="section-title"><?php _e('Eventos', 'sme_mexico'); ?></h2>
        <?php
        $args = array(
            'post_type' => 'event',
            'posts_per_page' => -1,
            'meta_key' => 'event_date',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'associated_artist',
                    'value' => get_the_ID(),
                    'compare' => '='
                ),
                array(
                    'key' => 'event_date',
                    'value' => date('Ymd'),
                    'compare' => '>='
                )
            )
        );

        $events = new WP_Query($args);
        if ($events->have_posts()) :
            ?>
            <div class="row events-header">
                <div class="col-sm-2"><?php _e('Date', 'sme_mexico'); ?></div>
                <div class="col-sm-4"><?php _e('Venue', 'sme_mexico'); ?></div>
                <div class="col-sm-4"><?php _e('Location', 'sme_mexico'); ?></div>
                <div class="col-sm-2"><?php _e('Tickets', 'sme_mexico'); ?></div>
            </div>
            <?php
            while ($events->have_posts()) : $events->the_post();
                get_template_part('partials/loop', 'artist-event');
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
    if ($events->found_posts > 3) :
        ?>
        <div class="btn-wrap">
            <a id="view-all-events" href="#" class="btn btn-red"><?php _e('View All Events', 'sme_mexico'); ?></a>
        </div>
        <?php
    endif;
    ?>
</section>