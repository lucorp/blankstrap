<!doctype html>

<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/lib/css/bootstrap.min.css">

    <script defer src="<?php echo get_template_directory_uri(); ?>/lib/js/jquery-3.3.1.min.js"></script>
    <script defer src="<?php echo get_template_directory_uri(); ?>/lib/js/popper.min.js"></script>
    <script defer src="<?php echo get_template_directory_uri(); ?>/lib/js/bootstrap.min.js"></script>
    <script defer src="<?php echo get_template_directory_uri(); ?>/lib/js/fontawesome.js"></script>

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
