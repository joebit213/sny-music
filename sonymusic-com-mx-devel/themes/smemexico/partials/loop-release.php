<?php
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
$col_size = !empty($col_size) ? $col_size : 'col-md-3';
?>
<div class="<?php echo $col_size; ?>">
    <article class="release-item">
    <?php
                                if (have_rows('stream_links')) :
                            ?>

    <div class="btn-group btn-block stream-links" role="group">
        <button type="button" class="btn btn-block btn-red dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

            <figure>
                <?php the_post_thumbnail('release', array('class' => 'img-responsive')); ?>
            </figure>
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
        <div class="release-info">
        <?php
                                                endif;
                                                ?>
            <h3>
                <span class="release-title"><?php the_title(); ?></span>
                <span class="release-artist"><?php echo $associated_artist[0]->post_title; ?></span>
            </h3>
        </div>
        <div class="release-links">
            <div class="row">
                <div class="col-sm-6">
                    <?php
                    if (have_rows('buy_links')) :
                        ?>
                        <div class="btn-group btn-block buy-links" role="group">
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
                        <div class="btn-group btn-block stream-links" role="group">
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