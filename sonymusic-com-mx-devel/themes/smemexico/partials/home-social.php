<section id="home-social" class="content-section white-section white-dark-brush-bottom">
    <div id="home-playlist">
        <div class="container-fluid">
            <h2 class="section-title"><?php _e('Playlist', 'sme_mexico'); ?></h2>
            <div class="row playlist playlist-new">
                <div class="item">
                    <article class="release-item">
                        <a href="https://open.spotify.com/playlist/5i6TPyuopfPKAaamnsLskD?si=4dd2b4e3ef774c0e">
                            <figure>
                                <img src="https://cdn.smehost.net/sonymusiccommx-mxprod/wp-content/uploads/2022/05/PopEsShak.jpg"       data-src="" width="400" height="400" alt="" class="owl-lazy img-responsive" />
                            </figure>
                        </a>
                    </article>
                </div>
                <div class="item">
                    <article class="release-item">
                        <a href="https://open.spotify.com/playlist/55lCjEKHyrO3wpLYD8Ktdo?si=27e674b676d445e9">
                            <figure>
                                <img src="https://cdn.smehost.net/sonymusiccommx-mxprod/wp-content/uploads/2022/05/Éxitos-2022-C.       -Tangana.jpg" data-src="" width="400" height="400" alt="" class="owl-lazy img-responsive" />
                            </figure>
                        </a>
                    </article>
                </div>
                <div class="item">
                    <article class="release-item">
                        <a href="https://open.spotify.com/playlist/72FdsweCiOlp4BXdRrUq58?si=72f094778f384f85">
                            <figure>
                                <img src="https://cdn.smehost.net/sonymusiccommx-mxprod/wp-content/uploads/2022/05/Pop-Inglés-Harry-Styles.jpg" data-src="" width="400" height="400" alt="" class="owl-lazy img-responsive" />
                            </figure>
                        </a>
                    </article>
                </div>
                <div class="item">
                    <article class="release-item">
                        <a href="https://open.spotify.com/playlist/5eYZGmjBvg3kpIUVpRCUhE?si=f7c158e6783d4585">
                            <figure>
                                <img src="https://cdn.smehost.net/sonymusiccommx-mxprod/wp-content/uploads/2022/05/RockEsCerati.jpg" data-src="" width="400" height="400" alt="" class="owl-lazy img-responsive" />
                            </figure>
                        </a>
                    </article>
                </div>
            </div>
        </div>
    </div>

    <div class="instagram social-section">
        <div class="container-fluid">
            <div class="social-title clearfix">
                <h2 class="section-title"><?php _e('@SonyMusicMexico', 'sme_mexico'); ?></h2>
                <i class="fa fa-fw fa-instagram" aria-hidden="true"></i><span class="sr-only"><?php _e('Instagram', 'sme_mexico'); ?></span>
            </div>
            <div class="instagram-wrap">
                <?php echo do_shortcode('[instagram-feed]'); ?>
            </div>
        </div>
    </div>
    <div class="btn-wrap">
        <a href="https://www.instagram.com/sonymusicmexico/" target="_blank" class="btn btn-red"><?php _e('Síguenos en Instagram', 'sme_mexico'); ?></a>
    </div>
    <div class="twitter social-section">
        <div class="container-fluid">
            <div class="social-title clearfix">
                <h2 class="section-title"><?php _e('@SonyMusicMexico', 'sme_mexico'); ?></h2>
                <i class="fa fa-fw fa-facebook-official" aria-hidden="true"></i><span class="sr-only"><?php _e('Facebook', 'sme_mexico'); ?></span>
            </div>
            <div class="row">
                <?php
                $facebook_wall_posts = get_option('sme_mex_facebook');
                if (!empty($facebook_wall_posts)) :
                    foreach ($facebook_wall_posts as $facebook_wall_post) :
                        ?>
                        <div class="col-md-4">
                            <article class="social-post">
                                <div class="social-post-text">
                                    <?php echo facebook_parse($facebook_wall_post['message']); ?>   
                                </div> 
                            </article>
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </div>
    <div class="btn-wrap">
        <a href="https://www.facebook.com/sonymusicmexico" target="_blank" class="btn btn-red"><?php _e('Síguenos en Facebook', 'sme_mexico'); ?></a>
    </div>
    <div class="twitter social-section">
        <div class="container-fluid">
            <div class="social-title clearfix">
                <h2 class="section-title"><?php _e('@SonyMusicMexico', 'sme_mexico'); ?></h2>
                <i class="fa fa-fw fa-twitter" aria-hidden="true"></i><span class="sr-only"><?php _e('Twitter', 'sme_mexico'); ?></span>
            </div>
            <div class="row">
                <?php
                $tweets = getTweets(3, 'SonyMusicMexico', array('trim_user' => false, 'include_rts' => true));
                foreach ($tweets as $tweet) :
                    ?>
                    <div class="col-md-4">
                        <article class="social-post">
                            <div class="social-post-text">
                                <?php echo twitter_parse($tweet['text']); ?>
                            </div>
                            <div class="social-post-author">
                                <a href="https://twitter.com/<?php echo $tweet['user']['screen_name']; ?>" target="_blank">@<?php echo $tweet['user']['screen_name']; ?></a>
                            </div>
                        </article>
                    </div>
                    <?php
                endforeach;
                ?>  
            </div>
        </div>
    </div>
    <div class="btn-wrap">
        <a href="https://twitter.com/sonymusicmexico" target="_blank" class="btn btn-red"><?php _e('Síguenos en Twitter', 'sme_mexico'); ?></a>
    </div>
</section>