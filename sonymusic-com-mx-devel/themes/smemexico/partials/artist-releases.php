<section id="artist-releases" class="content-section medium-red-section light-red-right-brush-bottom">
    <div class="container-fluid slim-container">
        <?php
        $spotify_embed = get_field('spotify_embed');
        if (!empty($spotify_embed)) :
            ?>
            <h2 class="section-title"><?php _e('Escucha', 'sme_mexico'); ?></h2>
            <div class="spotify-embed">
                <?php 
                echo $spotify_embed;
                if (have_rows('spotify_embed_buy_links')) :
                    ?>
                    <div class="btn-group buy-links" role="group">
                        <button type="button" class="btn btn-block btn-red dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <?php _e('Escucha', 'sme_mexico'); ?>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <?php
                            while (have_rows('spotify_embed_buy_links')) : the_row();
                                $buy_title = get_sub_field('buy_title');
                                $buy_url = get_sub_field('buy_url');
                                if (!empty($buy_title) && !empty($buy_url)) :
                                    ?>
                                    <li>
                                        <a href="<?php echo $buy_url; ?>" target="_blank"><?php echo $buy_title; ?></a>
                                    </li>
                                    <?php
                                endif;
                            endwhile;
                            ?>
                        </ul>
                    </div>                                        
                    <?php
                endif;
                ?>
            </div>
            <?php
        endif;
        ?>
        <h2 class="section-title"><?php _e('Lanzamientos', 'sme_mexico'); ?></h2>
        <?php
        $r = 0;
        $args = array(
            'post_type' => 'release',
            'posts_per_page' => -1,
            'meta_key' => 'release_date',
            'orderby' => 'meta_value',
            'order' => 'DESC',
            'meta_query' => array(
                'key' => 'associated_artist',
                'value' => '"' . get_the_ID() . '"',
                'compare' => 'LIKE'
            )
        );

        $releases = new WP_Query($args);
        if ($releases->have_posts()) :
            ?>
            <div class="row release-row">
                <?php
                while ($releases->have_posts()) : $releases->the_post();
                    $col_size = 'col-md-6';
                    include(locate_template('partials/loop-release.php'));
                    $r++;
                    if ($r == 2) {
                        echo '<div class="clearfix"></div>';
                        $r = 0;
                    }
                endwhile;
                wp_reset_postdata();
                ?>
            </div>    
            <?php
        else :
            ?>
            <p class="text-center empty-results"><?php _e('No releases.', 'sme_mexico'); ?></p>
        <?php
        endif;
        ?>
    </div>
</section>