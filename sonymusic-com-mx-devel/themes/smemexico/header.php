<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?php wp_title(''); ?>
        </title>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri() . '/assets/img/menu_icon.png'; ?>" type="image/x-icon">
        <?php wp_head(); ?>
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body <?php body_class(); ?>>
        <a href="#main" class="sr-only">Skip to content</a>
        <nav id="header-nav" class="navbar navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-nav-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo home_url(); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/nav-logo.png" alt="Sony Music Entertainment México" class="" width="335" height="47" />
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="header-nav-collapse">
                    <?php sme_mex_menu('header-menu'); ?>
                </div>
            </div>
        </nav>
        <main id="main">