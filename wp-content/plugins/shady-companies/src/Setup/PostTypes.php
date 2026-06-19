<?php

namespace Shady\Companies\Setup;

if (!defined('ABSPATH')) {
    exit;
}

class PostTypes
{
    public function __construct()
    {
        $this->registerStructures();

        add_filter('acf/settings/save_json', [$this, 'setAcfSavePoint']);
        add_filter('acf/settings/load_json', [$this, 'setAcfLoadPoint']);
    }

    public function registerStructures(): void
    {
        register_taxonomy('company_tag', ['company'], [
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
        ]);

        register_post_type('company', [
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
        ]);
    }

    public function setAcfSavePoint(string $path): string
    {
        $pluginDir = dirname(__FILE__, 3) . '/acf-json';
        if (!file_exists($pluginDir)) {
            wp_mkdir_p($pluginDir);
        }
        return $pluginDir;
    }

    public function setAcfLoadPoint(array $paths): array
    {
        $paths[] = dirname(__FILE__, 3) . '/acf-json';
        return $paths;
    }
}
