<section id="home-media" class="content-section dark-red-section white-light-brush-bottom">
    <div id="home-newsletter">
        <div class="container-fluid">
            <h2><?php _e('Newsletter', 'sme_mexico'); ?></h2>
            <p>
                <?php _e('Recibe las noticias más recientes de Sony Music México', 'sme_mexico'); ?>
            </p>
            <div class="newsletter-link">
                <a href="#" class="btn btn-red"><?php _e('Suscribir', 'sme_mexico'); ?></a>
            </div>
        </div>
    </div>
    <div id="home-releases">
        <div class="container-fluid">
            <h2 class="section-title"><?php _e('Lo nuevo', 'sme_mexico'); ?></h2>
            <?php
            $args = array(
                'post_type' => 'release',
                'posts_per_page' => 9,
                'meta_key' => 'release_date',
                'orderby' => 'meta_value',
                'order' => 'DESC'
            );

            $releases = new WP_Query($args);
            if ($releases->have_posts()):
                ?>
                <div id="releases-carousel" class="owl-carousel">
                    <?php
                    while ($releases->have_posts()) : $releases->the_post();
                        if (has_post_thumbnail()) :
                            $associated_artist = get_field('associated_artist');
                            $release_types = get_the_terms(get_the_ID(), 'release-type');
                            $release_types_str = '';
                            $release_types_arr = array();

                            if ($release_types && !is_wp_error($release_types)) {
                                foreach ($release_types as $release_type) {
                                    $release_types_arr[] = $release_type->name;
                                }
                                $release_types_str = '<span> - ' . join(", ", $release_types_arr) . '</span>';
                            }
                            ?>
                            <div class="item">

                                    <article class="release-item">
                                    <?php
                                if (have_rows('stream_links')) :
                            ?>
                            <div class="btn-group dropup btn-block stream-links" role="group">
                                <button type="button" class="btn btn-block btn-red dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                           
                                                        
                                        <figure>
                                            <img src="" data-src="<?php the_post_thumbnail_url('release'); ?>" width="400" height="400" alt="" class="owl-lazy img-responsive" />
                                        </figure>
                                        </button>
                                        <ul class="dropdown-menu menu_release-item" role="menu">
                                                            <?php
                                                            while (have_rows('stream_links')) : the_row();
                                                                $stream_title = get_sub_field('stream_title');
                                                                $stream_url = get_sub_field('stream_url');
                                                                if (!empty($stream_title) && !empty($stream_url)) :
                                                                    ?>
                                                                    <li>
                                                                        <a href="<?php echo $stream_url; ?>" target="_blank"><?php echo $stream_title; ?></a>
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
                                        <div class="release-info">
                                            <h3>
                                                <span class="release-title"><?php the_title(); ?></span>
                                                <span class="release-artist"><?php echo $associated_artist[0]->post_title; ?></span>
                                            </h3>
                                        </div>

                                        <div style="display: none;" class="release-links">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                <?php
                                                if (have_rows('buy_links')) :
                                                    ?>
                                                    <div class="btn-group dropup btn-block buy-links" role="group">
                                                        <button type="button" class="btn btn-block btn-red dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                            <?php _e('Consíguelo aquí', 'sme_mexico'); ?>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <?php
                                                            while (have_rows('buy_links')) : the_row();
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

                                                <div class="col-sm-6">
                                                <?php
                                                if (have_rows('stream_links')) :
                                                    ?>
                                                    <div class="btn-group dropup btn-block stream-links" role="group">
                                                        <button type="button" class="btn btn-block btn-red dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                            <?php _e('Escucha', 'sme_mexico'); ?>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <?php
                                                            while (have_rows('stream_links')) : the_row();
                                                                $stream_title = get_sub_field('stream_title');
                                                                $stream_url = get_sub_field('stream_url');
                                                                if (!empty($stream_title) && !empty($stream_url)) :
                                                                    ?>
                                                                    <li>
                                                                        <a href="<?php echo $stream_url; ?>" target="_blank"><?php echo $stream_title; ?></a>
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
                                            </div>
                                        </div>
                                    </article>
                                
                            </div>
                            <?php
                        endif;
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
                <?php
            endif;
            ?>
        </div>
    </div>
    <div class="btn-wrap">
        <a href="<?php echo site_url('/lo-nuevo/'); ?>" class="btn btn-red"><?php _e('Ve todo lo nuevo', 'sme_mexico'); ?></a>
    </div>
    <div id="home-videos">
        <div class="container-fluid">
            <h2 class="section-title"><?php _e('Videos Destacados', 'sme_mexico'); ?></h2>
            <?php
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
                    ?>
                    <div id="video-player">
                        <div class="embed-responsive embed-responsive-16by9">
                            <?php echo str_replace('></iframe>', ' title="' . esc_attr(get_the_title()) . '"></iframe>', $youtube_url); ?>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            $args = array(
                'post_type' => 'video',
                'posts_per_page' => 15,
                'orderby' => 'date',
                'order' => 'DESC'
            );

            $videos = new WP_Query($args);
            if ($videos->have_posts()):
                ?>
                <div id="videos-carousel" class="owl-carousel">
                    <?php
                    while ($videos->have_posts()) : $videos->the_post();
                        $associated_artist = get_field('associated_artist');
                        $youtube_url = get_field('youtube_url', false, false);
                        $youtube_id = parse_youtube_id($youtube_url);
                        ?>
                        <div class="item">
                            <article class="video-item">
                                <figure>
                                    <a href="#" class="video-thumb-link" data-artist="<?php echo esc_attr($associated_artist[0]->post_title); ?>" data-title="<?php echo esc_attr(get_the_title()); ?>" data-embed-url="<?php echo esc_attr("https://www.youtube.com/embed/$youtube_id/"); ?>">
                                        <img src="" data-src="//img.youtube.com/vi/<?php echo $youtube_id; ?>/mqdefault.jpg" width="320" height="180" alt="<?php echo esc_attr(get_the_title()); ?>" class="owl-lazy img-responsive" />
                                        <h3>
                                            <span class="video-artist"><?php echo $associated_artist[0]->post_title; ?></span>
                                            <span class="video-title"><?php the_title(); ?></span>
                                        </h3>   
                                    </a>
                                </figure>
                            </article>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
                <?php
            endif;
            ?>
        </div>
    </div>
    <div class="btn-wrap">
        <a href="<?php echo site_url('/videos/'); ?>" class="btn btn-red"><?php _e('Ve todos los videos', 'sme_mexico'); ?></a>
    </div>
</section>