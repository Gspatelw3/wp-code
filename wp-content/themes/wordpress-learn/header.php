<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="wrapper">
        <header class="header container">
            <?php wp_nav_menu([
                'theme_location' => 'header-menu',
                'container' => 'nav',
                'container_class' => 'navbar navbar-expand-sm bg-light'
            ]); ?>
        </header>