<?php
$args = array(
    'post_type' => 'event',
    'posts_per_page' => -1,
    'meta_key' => 'event_date',
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'tax_query' => array(
        array(
            'taxonomy' => 'event-type',
            'field' => 'slug',
            'terms' => 'featured'
        )
    ),
    'meta_query' => array(
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
        <div class="col-sm-2"><?php _e('Artista', 'sme_mexico'); ?></div>
        <div class="col-sm-2"><?php _e('Fecha', 'sme_mexico'); ?></div>
        <div class="col-sm-3"><?php _e('Evento', 'sme_mexico'); ?></div>
        <div class="col-sm-3"><?php _e('Lugar', 'sme_mexico'); ?></div>
        <div class="col-sm-2"><?php _e('Boletos', 'sme_mexico'); ?></div>
    </div>
    <?php
    while ($events->have_posts()) : $events->the_post();
        get_template_part('partials/loop', 'event');
    endwhile;
    wp_reset_postdata();
else :
    ?>
    <p class="text-center empty-results"><?php _e('No upcoming events.', 'sme_mexico'); ?></p>
                <?php
endif;