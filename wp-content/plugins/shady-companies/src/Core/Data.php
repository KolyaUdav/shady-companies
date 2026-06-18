<?php

namespace Shady\Companies\Core;

use WP_Query;

if (!defined('ABSPATH')) {
    exit;
}

class Data
{
    public static function getTags(string $selectedTagValue): array
    {
        $rawTags = get_terms(['taxonomy' => 'company_tag', 'hide_empty' => true]);

        if (is_wp_error($rawTags) || empty($rawTags)) {
            return [];
        }

        $allTags = [];

        foreach ($rawTags as $rTag) {
            $allTags[] = [
                'slug' => esc_attr($rTag->slug),
                'name' => esc_html($rTag->name),
                'is_selected' => selected($selectedTagValue, $rTag->slug, false),
            ];
        }

        return $allTags;
    }

    public static function getCompaniesData(string $searchQuery = '', string $tagSlug = ''): array
    {
        $query = self::getCompaniesQuery($searchQuery, $tagSlug);

        if (!$query->have_posts()) {
            return [];
        }

        $rawPosts = $query->posts;
        $allPosts = [];

        foreach ($rawPosts as $rPost) {
            $logo = get_field('company_logo', $rPost->ID);
            $cons = get_field('company_cons', $rPost->ID);

            $allPosts[] = [
                'title' => esc_html($rPost->post_title),
                'content' => $rPost->post_content,
                'logo' => esc_url($logo),
                'cons' => esc_html($cons),
                'excerpt' => esc_html($rPost->post_excerpt),
            ];
        }

        return $allPosts;
    }

    private static function getCompaniesQuery(string $searchQuery, string $tagSlug): WP_Query
    {
        $args = [
            'post_type' => 'company',
            'posts_per_page' => 12,
            'post_status' => 'publish',
            'order' => 'ASC',
        ];

        if (!empty($searchQuery)) {
            $args['s'] = sanitize_text_field($searchQuery);
        }

        if (!empty($tagSlug)) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'company_tag',
                    'field' => 'slug',
                    'terms' => sanitize_title($tagSlug),
                ]
            ];
        }

        return new WP_Query($args);
    }
}
