<div id="home-carousel" class="content-section light-red-section">
    <?php
    if (have_rows('slides')):
        ?>
        <div id="home-carousel-top" class="owl-carousel">
            <?php
            while (have_rows('slides')) : the_row();
                $slide_image = get_sub_field('slide_image');
                $slide_text_line_1 = get_sub_field('slide_text_line_1');
                $slide_text_line_2 = get_sub_field('slide_text_line_2');
                $slide_text_line_3 = get_sub_field('slide_text_line_3');
                $slide_url = get_sub_field('slide_url');
                ?>
            <div class="item" data-slide-url="<?php echo esc_attr($slide_url); ?>" data-slide-caption-1="<?php echo esc_attr($slide_text_line_1); ?>" data-slide-caption-2="<?php echo esc_attr($slide_text_line_2); ?>" data-slide-caption-3="<?php echo esc_attr($slide_text_line_3); ?>">
                    <img src="" data-src="<?php echo $slide_image['sizes']['slide']; ?>" alt="" class="owl-lazy" />
                </div>
                <?php
            endwhile;
            reset_rows();
            ?>
        </div>
        <div class="container-fluid">
            <div id="home-carousel-caption">
                <span class="slide-caption-1"></span>
                <span class="slide-caption-2"></span>
                <span class="slide-caption-3"></span>
                <a href="#" target="_blank" class="btn btn-white"><?php _e('Leer más', 'sme_mexico'); ?></a>
            </div>
        </div>
        <?php
    endif;
    ?>
</div>