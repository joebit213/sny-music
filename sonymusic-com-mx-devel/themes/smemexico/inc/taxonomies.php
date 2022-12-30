<?php

function sme_mexico_taxonomies() {

    // Release Type
    $labels = array(
        'name' => __('Release Type', 'sme_mexico'),
        'singular_name' => __('Release Type', 'sme_mexico'),
        'search_items' => __('Search Release Types', 'sme_mexico'),
        'all_items' => __('All Release Types', 'sme_mexico'),
        'parent_item' => __('Parent Release Type', 'sme_mexico'),
        'parent_item_colon' => __('Parent Release Types:', 'sme_mexico'),
        'edit_item' => __('Edit Release Type', 'sme_mexico'),
        'update_item' => __('Update Release Type', 'sme_mexico'),
        'add_new_item' => __('Add New Release Type', 'sme_mexico'),
        'new_item_name' => __('New Release Types Name', 'sme_mexico'),
        'menu_name' => __('Release Types', 'sme_mexico'),
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'release-type')
    );

    register_taxonomy('release-type', array('release'), $args);

    // Event Type
    $labels = array(
        'name' => __('Event Type', 'sme_mexico'),
        'singular_name' => __('Event Type', 'sme_mexico'),
        'search_items' => __('Search Event Types', 'sme_mexico'),
        'all_items' => __('All Event Types', 'sme_mexico'),
        'parent_item' => __('Parent Event Type', 'sme_mexico'),
        'parent_item_colon' => __('Parent Event Types:', 'sme_mexico'),
        'edit_item' => __('Edit Event Type', 'sme_mexico'),
        'update_item' => __('Update Event Type', 'sme_mexico'),
        'add_new_item' => __('Add New Event Type', 'sme_mexico'),
        'new_item_name' => __('New Event Types Name', 'sme_mexico'),
        'menu_name' => __('Event Types', 'sme_mexico'),
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'event-type')
    );

    register_taxonomy('event-type', array('event'), $args);
}

add_action('init', 'sme_mexico_taxonomies');
