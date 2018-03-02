<!doctype html>

<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css">

    <script defer src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-3.3.1.min.js"></script>
    <script defer src="<?php echo get_template_directory_uri(); ?>/assets/js/popper.min.js"></script>
    <script defer src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
    <script defer src="<?php echo get_template_directory_uri(); ?>/assets/js/fontawesome.js"></script>

    <?php wp_head(); ?>

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.min.css">

</head>

<body <?php body_class(); ?>>

    <div class="container">
        <?php print_hp_menu('Main menu'); ?>
    </div>