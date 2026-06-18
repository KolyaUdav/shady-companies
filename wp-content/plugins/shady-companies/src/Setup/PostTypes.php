<?php

namespace Shady\Companies\Setup;

if (!defined('ABSPATH')) {
    exit;
}

class PostTypes
{
    public function __construct()
    {
        add_action('init', [$this, 'registerCompanyCPT']);
        add_action('init', [$this, 'registerCompanyTaxonomy']);
        add_action('after_setup_theme', [$this, 'ensureACFJsonDirectory']);
    }

    public function registerCompanyCPT(): void
    {
        $args = [
            'labels' => [
                'name' => 'Компании',
                'singular_name' => 'Компания',
                'add_new' => 'Добавить компанию',
                'menu_name' => 'Реестр компаний',
            ],
            'public' => true,
            'has_archive' => true,
            'supports' => [
                'title',
                'editor',
            ],
            'rewrite' => [
                'slug' => 'companies',
            ],
            'show_in_rest' => true,
        ];

        register_post_type('company', $args);
    }

    public function registerCompanyTaxonomy(): void
    {
        $args = [
            'labels' => [
                'name' => 'Теги компаний',
                'singular_name' => 'Тег',
                'search_items' => 'Искать теги',
                'all_items' => 'Все теги',
                'edit_item' => 'Редактировать тег',
                'update_item' => 'Обновить тег',
                'add_new_item' => 'Добавить новый тег',
            ],
            'hierarchical' => false,
            'show_ui' => true,
            'show_in_rest' => true,
            'query_var' => true,
            'rewrite' => ['slug' => 'company-tag'],
        ];

        register_taxonomy('company_tag', ['company'], $args);
    }

    public function ensureACFJsonDirectory(): void
    {
        $themeDir = get_stylesheet_directory() . '/acf-json';

        if (!file_exists($themeDir) && is_writable(get_stylesheet_directory())) {
            wp_mkdir_p($themeDir);
        }
    }
}
