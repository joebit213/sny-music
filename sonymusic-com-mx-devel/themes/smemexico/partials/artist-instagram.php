<?php
$instagram_id = get_field('instagram_id');
$instagram_username = get_field('instagram_username');
?>
<section id="artist-instagram" class="content-section white-section white-dark-brush-bottom">
    <div class="instagram social-section">
        <div class="container-fluid">
            <?php
            if (!empty($instagram_username)) :
                ?>
                <div class="social-title clearfix">
                    <h2 class="section-title"><?php echo "@$instagram_username"; ?></h2>
                    <i class="fa fa-fw fa-instagram" aria-hidden="true"></i><span class="sr-only"><?php _e('Instagram', 'sme_mexico'); ?></span>
                </div>
                <?php
            endif;
            ?>
            <div class="instagram-wrap">
                <?php
                if (!empty($instagram_id)) {
                    echo do_shortcode("[instagram-feed id=$instagram_id]");
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    if (!empty($instagram_username)) :
        ?>
        <div class="btn-wrap">
            <a href="https://www.instagram.com/<?php echo $instagram_username; ?>/" target="_blank" class="btn btn-red"><?php printf('%s @%s %s', __('Follow', 'sme_mexico'), $instagram_username, __('On Instagram', 'sme_mexico')); ?></a>
        </div>
        <?php
    endif;
    ?>
</section>