<?php
$associated_artist = get_field('associated_artist');
$youtube_url = get_field('youtube_url', false, false);
$youtube_id = parse_youtube_id($youtube_url);
$col_size = !empty($col_size) ? $col_size : 'col-md-6 col-lg-3';
?>
<div class="<?php echo $col_size; ?>">
    <article class="video-item">
        <figure>
            <a href="<?php the_permalink(); ?>" class="video-thumb-link" data-artist="<?php echo esc_attr($associated_artist[0]->post_title); ?>" data-title="<?php echo esc_attr(get_the_title()); ?>" data-embed-url="<?php echo esc_attr("https://www.youtube.com/embed/$youtube_id/"); ?>">
                <img src="//img.youtube.com/vi/<?php echo $youtube_id; ?>/mqdefault.jpg" width="320" height="180" alt="" class="img-responsive" />
                <h3>
                    <span class="video-artist"><?php echo $associated_artist[0]->post_title; ?></span>
                    <span class="video-title"><?php the_title(); ?></span>
                </h3>   
            </a>
        </figure>
    </article>
</div>