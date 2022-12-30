<?php

class SongKickEvents {

    private $songkick_api_key;
    private $songkick_endpoint = 'http://api.songkick.com/api/3.0/artists/%s/calendar.json?apikey=%s';
    private $songkick_artists;
    private $songkick_events;
    private $wp_artist_query_args;

    public function __construct() {
        $this->songkick_api_key = get_field('songkick_api_key', 'option');
        $this->songkick_artists = array();
        $this->songkick_events = array();
        $this->wp_artist_query_args = array(
            'post_type' => 'artist',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
            'meta_key' => 'songkick_id'
        );

        if (!wp_next_scheduled('sme_mexico_sk_events')) {
            wp_schedule_event(time(), 'twicedaily', 'sme_mexico_sk_events');
        }

        add_action('sme_mexico_sk_events', array($this, 'scheduledUpdate'));
    }

    private function queryArtists() {
        $artists = new WP_Query($this->wp_artist_query_args);
        if ($artists->have_posts()) {
            while ($artists->have_posts()) {
                $artists->the_post();
                $this->songkick_artists[get_field('songkick_id')] = get_the_ID();
            }
        }
    }

    private function songkickAPICall($songkick_id) {
        $response = wp_remote_get(sprintf($this->songkick_endpoint, $songkick_id, $this->songkick_api_key));
        $events = false;
        if (is_array($response)) {
            $events_json = json_decode($response['body']);
            $events = $events_json->resultsPage->results->event;
        }
        return $events;
    }

    private function getEvents() {
        $this->queryArtists();
        if (!empty($this->songkick_artists)) {
            foreach ($this->songkick_artists as $songkick_artist_id => $wp_post_id) {
                $this->parseEvents($this->songkickAPICall($songkick_artist_id), $songkick_artist_id);
            }
        }
    }

    private function parseEvents($events, $songkick_artist_id) {
        if (!empty($events)) {
            foreach ($events as $event) {
                $this->songkick_events[] = array(
                    'field_57ab8b490dc54' => $this->songkick_artists[$songkick_artist_id],
                    'songkick_artist_id' => $songkick_artist_id,
                    'songkick_event_id' => $event->id,
                    'title' => $event->displayName,
                    'event_date' => date('Ymd', strtotime($event->start->date)),
                    'ticket_url' => $event->uri,
                    'location' => $event->location->city,
                    'venue' => $event->venue->displayName,
                    'latitude' => !empty($event->venue->lat) ? $event->venue->lat : $event->location->lat,
                    'longitude' => !empty($event->venue->lng) ? $event->venue->lng : $event->location->lng
                );
            }
        }
    }

    private function saveEvents() {
        if (!empty($this->songkick_events)) {
            foreach ($this->songkick_events as $event) {
                $this->createOrUpdateEventPost($event, $this->postExists($event['songkick_event_id']));
            }
        }
    }

    private function postExists($songkick_event_id) {
        $events = get_posts(array('meta_key' => 'songkick_event_id', 'meta_value' => $songkick_event_id, 'posts_per_page' => '1', 'post_type' => 'event'));
        return !empty($events) ? $events[0]->ID : false;
    }

    private function createOrUpdateEventPost($event, $post_id = false) {
        if (empty($post_id)) {
            $event_args = array(
                'post_title' => $event['title'],
                'post_type' => 'event',
                'post_status' => 'publish'
            );
            $post_id = wp_insert_post($event_args, false);
        }

        foreach ($event as $k => $v) {
            if ($k !== 'title' && $k !== 'songkick_artist_id') {
                update_field($k, $v, $post_id);
            }
        }
    }

    public function scheduledUpdate() {
        try {
            $this->getEvents();
            $this->saveEvents();
        } catch (Exception $ex) {
            // Log this somewhere
            echo $ex->getMessage();
        }
    }

}
