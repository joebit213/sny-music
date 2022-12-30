<div class="col-md-6 col-lg-3">
    <article class="artist-item">
        <figure>
            <a href="<?php the_permalink(); ?>" class="artist-thumb-link">
                <?php the_post_thumbnail('artist-thumb', array('class' => 'img-responsive', 'alt' => get_the_title())); ?>
            </a>
        </figure>
        <h2>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
    </article>
</div>