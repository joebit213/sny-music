<?php
$header_image = get_field('header_image');
if (!empty($header_image)) :
    ?>
    <div class="artist-header-image">
        <img src="<?php echo $header_image['sizes']['slide']; ?>" alt="<?php esc_attr(get_the_title()); ?>" class="img-responsive" />
    </div>
    <?php
endif;
$website_url = get_field('website_url');
$instagram_username = get_field('instagram_username');
$twitter_url = get_field('twitter_url');
$facebook_url = get_field('facebook_url');
$youtube_url = get_field('youtube_url');
$content_length = strlen(get_the_content());
$bio_content_class = $content_length > 600 ? 'collapsed' : '';
?>
<section id="artist-bio" class="content-section dark-red-section medium-red-right-brush-center">
    <div class="container-fluid slim-container">
        <div class="row">
            <div class="col-md-4">
                <h1 class="artist-title"><?php the_title(); ?></h1>
                <?php
                if (!empty($website_url)) :
                    ?>
                    <a href="<?php echo $website_url; ?>" target="_blank" class="artist-website"><?php echo str_replace(array('http:', 'https:', '/', 'www.'), array('', '', '', ''), $website_url); ?></a>
                    <?php
                endif;
                if (!empty($instagram_username) || !empty($twitter_url) || !empty($facebook_url) || !empty($youtube_url)) :
                    ?>
                    <ul class="artist-socials">
                        <?php
                        if (!empty($instagram_username)) :
                            ?>
                            <li>
                                <a href="https://www.instagram.com/<?php echo $instagram_username; ?>/" target="_blank"><i class="fa fa-fw fa-instagram" aria-hidden="true"></i><span class="sr-only"><?php _e('Instagram', 'sme_mexico'); ?></span></a>
                            </li>
                            <?php
                        endif;
                        if (!empty($twitter_url)) :
                            ?>
                            <li>
                                <a href="<?php echo $twitter_url; ?>" target="_blank"><i class="fa fa-fw fa-twitter" aria-hidden="true"></i><span class="sr-only"><?php _e('Twitter', 'sme_mexico'); ?></span></a>
                            </li>
                            <?php
                        endif;
                        if (!empty($facebook_url)) :
                            ?>
                            <li>
                                <a href="<?php echo $facebook_url; ?>" target="_blank"><i class="fa fa-fw fa-facebook-official" aria-hidden="true"></i><span class="sr-only"><?php _e('Facebook', 'sme_mexico'); ?></span></a>
                            </li>
                            <?php
                        endif;
                        if (!empty($youtube_url)) :
                            ?>
                            <li>
                                <a href="<?php echo $youtube_url; ?>" target="_blank"><i class="fa fa-fw fa-youtube-play" aria-hidden="true"></i><span class="sr-only"><?php _e('YouTube', 'sme_mexico'); ?></span></a>
                            </li>
                            <?php
                        endif;
                        ?>
                    </ul>
                    <?php
                endif;
                ?>
            </div>
            <div class="col-md-8">
                <div class="bio-content <?php echo $bio_content_class; ?>">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    if ($bio_content_class == 'collapsed') :
        ?>
        <div class="btn-wrap">
            <a id="bio-read-more" href="#" class="btn btn-red" data-toggle-text="<?php _e('Leer menos', 'sme_mexico'); ?>"><?php _e('Leer más', 'sme_mexico'); ?></a>
        </div>
        <?php
    endif;
    ?>
</section>