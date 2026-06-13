<?php

function shady_theme_scripts() {
    wp_enqueue_style('shady-main-style', get_stylesheet_uri(), [], '1.0.0');
    
    wp_enqueue_script('shady-main-js', get_template_directory_uri() . '/assets/js/main.js', [], '1.0.0', true);
}

function shady_theme_setup() {
    add_theme_support('title-tag');

    add_theme_support(
        'custom-logo',
        [
            'height' => 100,
            'width' => 400,
            'flex-height' => true,
            'flex-width' => true,
        ],
    );

    register_nav_menus([
        'primary-menu' => 'Главное меню в шапке',
        'footer-menu' => 'Меню в подвале сайта',
    ]);
}

add_action('wp_enqueue_scripts', 'shady_theme_scripts');
add_action('after_setup_theme', 'shady_theme_setup');