<?php
/**
 * 404 Template 
 */
get_header();
?>
<article class="page-item">
    <header class="page-header">
        <div class="container-fluid">
            <h1><?php _e('Page Not Found', 'sme_mexico'); ?></h1>
        </div>
    </header>
    <div class="page-content content-section dark-red-center-brush-bottom">
        <div class="container-fluid">
            <?php _e('Sorry, but the page that you are searching for could not be found.', 'sme_mexico'); ?>
        </div>
    </div>
</article>
<?php
get_footer();
