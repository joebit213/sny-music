<?php
/**
 * Post Template 
 */
get_header();
if (have_posts()) : while (have_posts()) : the_post();
        $format = get_field('format');
        ?>
        <article class="news-item">
            <div class="page-content content-section dark-red-center-brush-bottom">
                <div class="container-fluid">
                    <div class="news slim-container">
                        <?php
                        switch ($format) :
                            case 'video':
                                $youtube_url = get_field('youtube_url');
                                if (!empty($youtube_url)) :
                                    ?>
                                    <div class="featured-content">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <?php echo $youtube_url; ?>
                                        </div>
                                    </div>
                                    <?php
                                endif;
                                break;
                            case 'artist-voice':
                                break;
                            default:
                                ?>
                                <div class="featured-content">
                                    <?php the_post_thumbnail('news', array('class' => 'img-responsive')); ?>
                                </div>
                                <?php
                                break;
                        endswitch;
                        ?>
                        <header class="post-header">
                            <div class="row">
                                <div class="col-sm-10">
                                    <?php
                                    $categories = get_the_category_list(', ');
                                    if (!empty($categories)) :
                                        ?>
                                        <div class="categories">
                                            <?php echo $categories; ?>
                                        </div>
                                        <?php
                                    endif;
                                    ?>
                                </div>
                                <div class="col-sm-2 time-wrap">
                                    <time pubdate="<?php the_time('c'); ?>"><?php the_time('d.M.y'); ?></time>
                                </div>
                            </div>
                            <h1><?php the_title(); ?></h1>
                        </header>
                        <div class="single-post-content">
                            <div class="row">
                                <div class="col-sm-4">
                                    <?php
                                    if ($format == 'artist-voice') :
                                        the_post_thumbnail('large', array('class' => 'img-responsive center-block artist-voice-cover'));
                                    else :
                                        sme_mex_share();
                                    endif;
                                    ?>
                                </div>
                                <div class="col-sm-8">
                                    <?php
                                    the_content();
                                    if ($format == 'artist-voice') :
                                        $autograph_image = get_field('autograph_image');
                                        if (!empty($autograph_image)) :
                                            ?>
                                            <img src="<?php echo $autograph_image['sizes']['medium']; ?>" alt="<?php echo $autograph_image['title']; ?>" class="img-responsive artist-voice-autograph" />
                                            <?php
                                        endif;
                                        $google_play_url = get_field('google_play_url');
                                        $itunes_url = get_field('itunes_url');
                                        $spotify_url = get_field('spotify_url');
                                        $apple_music_url = get_field('apple_music_url');
                                        if (!empty($google_play_url) || !empty($itunes_url) || !empty($spotify_url) || !empty($apple_music_url)) :
                                            ?>
                                            <ul class="artist-voice-buy-links clearfix">
                                                <?php
                                                if (!empty($google_play_url)) :
                                                    ?>
                                                    <li>
                                                        <a href="<?php echo $google_play_url; ?>" target="_blank">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/buy/google-play.png" alt="Google Play" class="img-responsive" />
                                                        </a>
                                                    </li>
                                                    <?php
                                                endif;
                                                if (!empty($itunes_url)) :
                                                    ?>
                                                    <li>
                                                        <a href="<?php echo $itunes_url; ?>" target="_blank">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/buy/itunes.png" alt="iTunes" class="img-responsive" />
                                                        </a>
                                                    </li>
                                                    <?php
                                                endif;
                                                if (!empty($spotify_url)) :
                                                    ?>
                                                    <li>
                                                        <a href="<?php echo $spotify_url; ?>" target="_blank">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/buy/spotify.png" alt="Spotify" class="img-responsive" />
                                                        </a>
                                                    </li>
                                                    <?php
                                                endif;
                                                if (!empty($apple_music_url)) :
                                                    ?>
                                                    <li>
                                                        <a href="<?php echo $apple_music_url; ?>" target="_blank">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/buy/apple-music.png" alt="Apple Music" class="img-responsive" />
                                                        </a>
                                                    </li>
                                                    <?php
                                                endif;
                                                ?>
                                            </ul>
                                            <?php
                                        endif;
                                    endif;
                                    ?>
                                </div>
                            </div>
                            <?php
                            if ($format == 'artist-voice') :
                                $youtube_url = get_field('youtube_url');
                                $audio_embed = get_field('audio_embed');
                                ?>
                                <div class="row">
                                    <?php
                                    if (!empty($youtube_url)) :
                                        ?>
                                        <div class="col-sm-8">
                                            <div class="featured-content">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <?php echo $youtube_url; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    endif;
                                    if (!empty($audio_embed)) :
                                        ?>
                                        <div class="col-sm-4">
                                            <div class="featured-content">
                                                <?php echo $audio_embed; ?>
                                            </div>
                                        </div>
                                        <?php
                                    endif;
                                    ?>
                                </div>
                                <?php
                            endif;
                            ?>
                        </div>
                    </div>
                    <nav class="page-navi">
                        <div class="row">
                            <div class="col-sm-4 page-navi-left">
                                <?php next_post_link('%link', __('Anterior', 'sme_mexico'), true); ?>
                            </div>
                            <div class="col-sm-4 page-navi-center">
                                <?php
                                if ($format == 'artist-voice') {
                                    $back_url = site_url('/category/en-la-voz-del-artist/');
                                    $back_text = __('En La Voz Del Artista ', 'sme_mexico');
                                } elseif (in_category('lanzamientos')) {
                                    $back_url = site_url('/category/lanzamientos/');
                                    $back_text = __('Lanzamientos ', 'sme_mexico');
                                } else {
                                    $back_url = site_url('/category/noticias/');
                                    $back_text = __('Noticias ', 'sme_mexico');
                                }
                                ?>
                                <a href="<?php echo $back_url; ?>"><?php echo $back_text; ?></a>
                            </div>
                            <div class="col-sm-4 page-navi-right">
                                <?php previous_post_link('%link', __('Siguiente', 'sme_mexico'), true); ?>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </article>
        <?php
    endwhile;
endif;
get_footer();
