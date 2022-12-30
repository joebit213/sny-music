<?php

// Register custom post types

function sme_mexico_post_types() {

    // Artists
    $labels = array(
        'name' => __('Artists', 'sme_mexico'),
        'singular_name' => __('Artist', 'sme_mexico'),
        'menu_name' => __('Artists', 'sme_mexico'),
        'name_admin_bar' => __('Artists', 'sme_mexico'),
        'add_new' => __('Add New', 'sme_mexico'),
        'add_new_item' => __('Add New Artist', 'sme_mexico'),
        'new_item' => __('New Artist', 'sme_mexico'),
        'edit_item' => __('Edit Artist', 'sme_mexico'),
        'view_item' => __('View Artist', 'sme_mexico'),
        'all_items' => __('All Artists', 'sme_mexico'),
        'search_items' => __('Search Artists', 'sme_mexico'),
        'parent_item_colon' => __('Parent Artist:', 'sme_mexico'),
        'not_found' => __('No artists found.', 'sme_mexico'),
        'not_found_in_trash' => __('No artists found in Trash.', 'sme_mexico'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'artist'),
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'author', 'revisions'),
    );

    register_post_type('artist', $args);

// Releases
    $labels = array(
        'name' => __('Releases', 'sme_mexico'),
        'singular_name' => __('Release', 'sme_mexico'),
        'menu_name' => __('Releases', 'sme_mexico'),
        'name_admin_bar' => __('Releases', 'sme_mexico'),
        'add_new' => __('Add New', 'sme_mexico'),
        'add_new_item' => __('Add New Release', 'sme_mexico'),
        'new_item' => __('New Release', 'sme_mexico'),
        'edit_item' => __('Edit Release', 'sme_mexico'),
        'view_item' => __('View Release', 'sme_mexico'),
        'all_items' => __('All Releases', 'sme_mexico'),
        'search_items' => __('Search Releases', 'sme_mexico'),
        'parent_item_colon' => __('Parent Release:', 'sme_mexico'),
        'not_found' => __('No releases found.', 'sme_mexico'),
        'not_found_in_trash' => __('No releases found in Trash.', 'sme_mexico'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => false,
        'rewrite' => false,
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-format-audio',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'author', 'revisions'),
    );

    register_post_type('release', $args);

    // Videos
    $labels = array(
        'name' => __('Videos', 'sme_mexico'),
        'singular_name' => __('Video', 'sme_mexico'),
        'menu_name' => __('Videos', 'sme_mexico'),
        'name_admin_bar' => __('Videos', 'sme_mexico'),
        'add_new' => __('Add New', 'sme_mexico'),
        'add_new_item' => __('Add New Video', 'sme_mexico'),
        'new_item' => __('New Video', 'sme_mexico'),
        'edit_item' => __('Edit Video', 'sme_mexico'),
        'view_item' => __('View Video', 'sme_mexico'),
        'all_items' => __('All Videos', 'sme_mexico'),
        'search_items' => __('Search Videos', 'sme_mexico'),
        'parent_item_colon' => __('Parent Video:', 'sme_mexico'),
        'not_found' => __('No videos found.', 'sme_mexico'),
        'not_found_in_trash' => __('No videos found in Trash.', 'sme_mexico'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'video'),
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-format-video',
        'supports' => array('title', 'author', 'revisions'),
    );

    register_post_type('video', $args);

    // Events
    $labels = array(
        'name' => __('Events', 'sme_mexico'),
        'singular_name' => __('Event', 'sme_mexico'),
        'menu_name' => __('Events', 'sme_mexico'),
        'name_admin_bar' => __('Events', 'sme_mexico'),
        'add_new' => __('Add New', 'sme_mexico'),
        'add_new_item' => __('Add New Event', 'sme_mexico'),
        'new_item' => __('New Event', 'sme_mexico'),
        'edit_item' => __('Edit Event', 'sme_mexico'),
        'view_item' => __('View Event', 'sme_mexico'),
        'all_items' => __('All Events', 'sme_mexico'),
        'search_items' => __('Search Events', 'sme_mexico'),
        'parent_item_colon' => __('Parent Event:', 'sme_mexico'),
        'not_found' => __('No events found.', 'sme_mexico'),
        'not_found_in_trash' => __('No events found in Trash.', 'sme_mexico'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'event'),
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-calendar',
        'supports' => array('title', 'author', 'revisions'),
    );

    register_post_type('event', $args);
}

add_action('init', 'sme_mexico_post_types');
