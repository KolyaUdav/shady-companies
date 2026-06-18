<?php

namespace Shady\Companies\Frontend;

use Shady\Companies\Core\Data;

if (!defined('ABSPATH')) {
    exit;
}

class Shortcode
{
    public function __construct() 
    {
        add_shortcode('shady_companies_registry', [$this, 'render']);
    }

    public function render(): string|false
    {
        $searchValue = !empty($_GET['c_search']) ? sanitize_text_field(wp_unslash($_GET['c_search'])) : '';
        $searchValue = esc_attr($searchValue);
        $tagValue = !empty($_GET['c_tag']) ? sanitize_title(wp_unslash($_GET['c_tag'])) : '';

        $companiesGridHtml = $this->renderCompaniesGrid($searchValue, $tagValue);
        $tagsSelectHtml = $this->renderTagsSelect($tagValue);

        ob_start();

        require_once plugin_dir_path(__FILE__) . '../../templates/registry-view.php';

        return ob_get_clean();
    }

    public function renderTagsSelect(string $selectedTagValue): string|false
    {
        $allTags = Data::getTags($selectedTagValue);

        ob_start();

        require_once plugin_dir_path(__FILE__) . '../../templates/tags-filter-view.php';

        return ob_get_clean();
    }

    public function renderCompaniesGrid(string $searchValue, string $tagValue): string|false
    {
        $allPosts = Data::getCompaniesData($searchValue, $tagValue);

        ob_start();

        require_once plugin_dir_path(__FILE__) . '../../templates/companies-grid-view.php';

        return ob_get_clean();
    }
}
