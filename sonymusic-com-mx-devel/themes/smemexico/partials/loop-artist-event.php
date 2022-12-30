<?php
$event_date = get_field('event_date');
$venue = get_field('venue');
$location = get_field('location');
$ticket_url = get_field('ticket_url');
?>
<div class="event">
    <div class="row">
        <div class="col-sm-2">
            <span class="event-date"><?php echo date('M d', strtotime($event_date)); ?></span>
        </div>
        <div class="col-sm-4">
            <span class="event-venue"><?php echo $venue; ?></span>
        </div>
        <div class="col-sm-4">
            <span class="event-location"><?php echo $location; ?></span>
        </div>
        <div class="col-sm-2">
            <a href="<?php echo $ticket_url; ?>" target="_blank" class="btn btn-red btn-block"><?php _e('Tickets', 'sme_mexico'); ?></a>
        </div>
    </div>
</div>