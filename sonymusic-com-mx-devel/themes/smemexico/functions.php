<?php
// Add ACF Options Page
if (function_exists('acf_add_options_page')) {
    acf_add_options_page('API Options');
}

// Required files
require_once(get_template_directory() . '/inc/post_types.php');
require_once(get_template_directory() . '/inc/taxonomies.php');
require_once(get_template_directory() . '/inc/SongKickEvents.php');

new SongKickEvents();

// Init
function sme_mex_init() {
    // Menu
    register_nav_menu('header-menu', 'Header Menu');

    // Featured image support
    add_theme_support('post-thumbnails');

    // Featured image sizes
    add_image_size('artist', 1920, 964, array('center', 'top'));
    add_image_size('artist-thumb', 335, 335, array('center', 'top'));
    add_image_size('slide', 1920, 964, array('center', 'top'));
    add_image_size('slide-thumb', 360, 235, array('center', 'top'));
    add_image_size('release', 400, 400, array('center', 'top'));
    add_image_size('news', 1046, 588, array('center', 'top'));

    // RSS
    add_theme_support('automatic-feed-links');
}

add_action('init', 'sme_mex_init');

function sme_mex_widgets_init() {
    register_sidebar(array(
        'name' => __('News Sidebar', 'sme_mexico'),
        'id' => 'news-sidebar',
        'description' => __('Widgets in this area will be shown on all news pages.', 'sme_mexico'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'sme_mex_widgets_init');

// Display menu
function sme_mex_menu($menu_id) {
    switch ($menu_id) {
        case 'footer-menu':
            $menu_class = 'footer-menu';
            break;
        default:
            $menu_class = 'nav navbar-nav navbar-right';
            break;
    }
    $args = array(
        'theme_location' => $menu_id,
        'menu' => '',
        'container' => '',
        'container_class' => '',
        'container_id' => '',
        'menu_class' => $menu_class,
        'menu_id' => $menu_id,
        'echo' => true,
        'fallback_cb' => '',
        'before' => '',
        'after' => '',
        'link_before' => '',
        'link_after' => '',
        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth' => 3,
        'walker' => new Bootstrap_Walker()
    );
    wp_nav_menu($args);
}

// Bootstrap Menu Walker
class Bootstrap_Walker extends Walker_Nav_Menu {

    function check_current($classes) {
        return preg_match('/(current[-_])|active|dropdown/', $classes);
    }

    function start_lvl(&$output, $depth = 0, $args = array()) {
        $output .= "\n<ul class=\"dropdown-menu\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $item_html = '';
        parent::start_el($item_html, $item, $depth, $args);
        if ($item->is_dropdown && ($depth === 0)) {
            $item_html = str_replace('<a', '<a class="dropdown-toggle" data-toggle="dropdown" data-target="#"', $item_html);
            $item_html = str_replace('</a>', ' <b class="caret"></b></a>', $item_html);
        } elseif (stristr($item_html, 'li class="divider')) {
            $item_html = preg_replace('/<a[^>]*>.*?<\/a>/iU', '', $item_html);
        } elseif (stristr($item_html, 'li class="dropdown-header')) {
            $item_html = preg_replace('/<a[^>]*>(.*)<\/a>/iU', '$1', $item_html);
        }
        $output .= $item_html;
    }

    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
        $element->is_dropdown = ((!empty($children_elements[$element->ID]) && (($depth + 1) < $max_depth || ($max_depth === 0))));
        if ($element->is_dropdown) {
            $element->classes[] = 'dropdown';
        }
        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }

}

// Front end CSS & JS

function sme_mex_scripts() {

// CSS
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), null);
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css', array(), null);
    wp_enqueue_style('raleway', 'https://fonts.googleapis.com/css?family=Raleway:400,100,100italic,400italic,500,500italic,600,600italic,700,700italic,800,800italic', array(), null);
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), null);
    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), null);
    wp_enqueue_style('sme-mex', get_stylesheet_uri(), array('bootstrap', 'magnific-popup', 'owl-carousel'), null);

// JavaScript

	wp_deregister_script('jquery');
	wp_register_script('jquery', "https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js", false, $ver);

    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), null, true);
    wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), null, true);
    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), null, true);
    wp_enqueue_script('imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array('jquery'), null, true);
    wp_enqueue_script('matchheight', get_template_directory_uri() . '/assets/js/jquery.matchHeight-min.js', array('jquery'), null, true);
    wp_enqueue_script('js-cookie', get_template_directory_uri() . '/assets/js/js.cookie.js', array('jquery'), null, true);
    wp_enqueue_script('sme-mex', get_template_directory_uri() . '/assets/js/main.js', array('jquery', 'bootstrap', 'imagesloaded', 'matchheight', 'js-cookie'), null, true);

    if (is_front_page()) {
        wp_enqueue_script('sme-mex-home', get_template_directory_uri() . '/assets/js/home.js', array('jquery', 'bootstrap', 'magnific-popup', 'owl-carousel'), null, true);
    }

    if (is_page_template('templates/template-events.php')) {
        wp_enqueue_script('google-maps', "https://maps.googleapis.com/maps/api/js?key=AIzaSyCwhsIIYN2d-NufBgfyTDU9BSCqqT4G-Gk", array(), false, true);
        wp_enqueue_script('sme-mex-map', get_template_directory_uri() . '/assets/js/map.js', array('google-maps'), null, true);

        $script_vars = array();
        $script_vars['marker_url'] = get_template_directory_uri() . '/assets/img/map_pin.png';

        $args = array(
            'post_type' => 'event',
            'posts_per_page' => -1,
            'meta_key' => 'event_date',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'event-type',
                    'field' => 'slug',
                    'terms' => 'featured'
                )
            ),
            'meta_query' => array(
                array(
                    'key' => 'event_date',
                    'value' => date('Ymd'),
                    'compare' => '>='
                )
            )
        );

        $events = new WP_Query($args);
        if ($events->have_posts()) {
            while ($events->have_posts()) {
                $events->the_post();
                $script_vars['events'][] = array(
                    'artist' => get_the_title(get_field('associated_artist')),
                    'event_date' => date('F jS, Y', strtotime(get_field('event_date'))),
                    'location' => get_field('location'),
                    'venue' => get_field('venue'),
                    'latitude' => get_field('latitude'),
                    'longitude' => get_field('longitude')
                );
            }
            wp_reset_postdata();
        }

        wp_localize_script('sme-mex-map', 'sme_mex_map', $script_vars);
    }
}

add_action('wp_enqueue_scripts', 'sme_mex_scripts');

// Parse YouTube ID
function parse_youtube_id($url) {
    preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $matches);
    return $matches[0];
}

/* Convert hexdec color string to rgb(a) string */

function hex2rgba($color, $opacity = false) {

    $default = 'rgb(0,0,0)';

    //Return default if no color provided
    if (empty($color))
        return $default;

    //Sanitize $color if "#" is provided 
    if ($color[0] == '#') {
        $color = substr($color, 1);
    }

    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
    } elseif (strlen($color) == 3) {
        $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
    } else {
        return $default;
    }

    //Convert hexadec to rgb
    $rgb = array_map('hexdec', $hex);

    //Check if opacity is set(rgba or rgb)
    if ($opacity) {
        if (abs($opacity) > 1)
            $opacity = 1.0;
        $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
    } else {
        $output = 'rgb(' . implode(",", $rgb) . ')';
    }

    //Return rgb(a) color string
    return $output;
}

// Twitter Hashtag / Reply parse
function twitter_parse($text) {
    $text = preg_replace('/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/', '<a href="$0" target="_blank">$0</a>', $text);
    $text = preg_replace('#@([\\d\\w]+)#', '<a href="http://twitter.com/$1" target="_blank">$0</a>', $text);
    $text = preg_replace('/#([\\d\\w]+)/', '<a href="http://twitter.com/#search?q=%23$1" target="_blank">$0</a>', $text);
    return $text;
}

// Facebook Hashtag / Reply parse
function facebook_parse($text) {
    $text = preg_replace('/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/', '<a href="$0" target="_blank">$0</a>', $text);
    $text = preg_replace('#@([\\d\\w]+)#', '<a href="https://www.facebook.com/$1" target="_blank">$0</a>', $text);
    $text = preg_replace('/#([\\d\\w]+)/', '<a href="https://www.facebook.com/hashtag/$1" target="_blank">$0</a>', $text);
    return $text;
}

// Share Links
function sme_mex_share($title = '', $permalink = '') {
    $title = !empty($title) ? $title : get_the_title();
    $permalink = !empty($permalink) ? $permalink : get_permalink();
    ?>
    <ul class="share-links">
        <li>
            <span><?php _e('Share:', 'sme_mexico'); ?></span>
        </li><li>
            <a href="https://twitter.com/intent/tweet?text=<?php echo rawurlencode($title); ?>&url=<?php echo rawurlencode($permalink); ?>" target="_blank"><i class="fa fa-fw fa-twitter" aria-hidden="true"></i><span class="sr-only"><?php _e('Twitter', 'sme_mexico'); ?></span></a>
        </li><li>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode($permalink); ?>" target="_blank"><i class="fa fa-fw fa-facebook-official" aria-hidden="true"></i><span class="sr-only"><?php _e('Facebook', 'sme_mexico'); ?></span></a>
        </li>
    </ul>
    <?php
}

// Additional query vars
function sme_mex_query_vars($qvars) {
    $qvars[] = 'starts_with';
    return $qvars;
}

add_filter('query_vars', 'sme_mex_query_vars', 10, 1);

// Starts with filter
function sme_mex_starts_with($sql, $wp_query) {
    global $wpdb;
    $starts_with = get_query_var('starts_with');

    if ($starts_with && $wp_query->query_vars['post_type'] == 'artist') {
        $sql .= $wpdb->prepare(" AND $wpdb->posts.post_title LIKE %s ", sanitize_text_field($starts_with) . '%');
    }

    return $sql;
}

add_action('posts_where', 'sme_mex_starts_with', 10, 2);

// Facebook feed
function sme_mex_get_facebook_wall() {
    $facebook_response = wp_remote_get('https://graph.facebook.com/22320727860/feed?access_token=475727872450459|9708c7ec06fa1886f8899ad9f48cca74');
    if (!is_wp_error($facebook_response)) {
        $formatted_facebook_wall_posts = array();
        $facebook_object = json_decode($facebook_response['body']);
        $facebook_wall_posts = $facebook_object->data;

        $fb = 0;
        foreach ($facebook_wall_posts as $facebook_wall_post) {
            if (!empty($facebook_wall_post->message)) {
                $id = explode('_', $facebook_wall_post->id);
                $formatted_facebook_wall_posts[] = array(
                    'id' => $id[1],
                    'created' => $facebook_wall_post->created_time,
                    'message' => $facebook_wall_post->message,
                    'link' => $facebook_wall_post->link
                );
                $fb++;
                if ($fb == 3) {
                    break;
                }
            }
        }

        update_option('sme_mex_facebook', $formatted_facebook_wall_posts);
    }
}

function search_form_filter($form) {
    $form = str_replace('</div>', '</div><input type="hidden" name="post_type" value="post" />', $form);
    return $form;
}

add_filter('get_search_form', 'search_form_filter');
