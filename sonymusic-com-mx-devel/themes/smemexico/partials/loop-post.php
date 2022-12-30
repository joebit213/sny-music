<?php
$format = get_field('format');
?>
<article class="news-item">
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
            ?>
            <div class="row">
                <div class="col-sm-5">
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
                    <h2>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                </div>
                <div class="col-sm-7">
                    <blockquote class="unstyled">
                        <?php the_excerpt(); ?>
                    </blockquote>
                    <div class="read-more-wrap">
                        <a href="<?php the_permalink(); ?>" class="btn btn-red"><?php _e('Leer más', 'sme_mexico'); ?></a>
                    </div>
                </div>
            </div>
            <?php
            break;
        case 'featured':
            if (has_post_thumbnail()) :
                ?>
                <div class="featured-content">
                    <?php the_post_thumbnail('news', array('class' => 'img-responsive')); ?>
                </div>
                <?php
            endif;
            ?>
            <div class="row">
                <div class="col-sm-5">
                    <h2>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                </div>
                <div class="col-sm-7">
                    <blockquote class="unstyled">
                        <?php the_excerpt(); ?>
                    </blockquote>
                    <div class="read-more-wrap">
                        <a href="<?php the_permalink(); ?>" class="btn btn-red"><?php _e('Leer más', 'sme_mexico'); ?></a>
                    </div>
                </div>
            </div>
            <?php
            break;
        case 'artist-voice':
        default:
            ?>
            <div class="row">
                <div class="col-sm-5">
                    <h2>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <blockquote class="unstyled">
                        <?php the_excerpt(); ?>
                    </blockquote>
                </div>
                <div class="col-sm-7">
                    <?php
                    if (has_post_thumbnail()) :
                        ?>
                        <div class="featured-content">
                            <?php the_post_thumbnail('news', array('class' => 'img-responsive')); ?>
                        </div>
                        <?php
                    endif;
                    ?>
                    <div class="read-more-wrap">
                        <a href="<?php the_permalink(); ?>" class="btn btn-red"><?php _e('Leer más', 'sme_mexico'); ?></a>
                    </div>
                </div>
            </div>
            <?php
            break;
    endswitch;
    ?>
</article>