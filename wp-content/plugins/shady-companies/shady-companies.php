<?php

/**
 * Plugin Name: Реестр недобросовестных компаний
 * Description: Плагин для ведения базы компаний с оценками, тегами, поиском и фильтрацией
 * Version: 1.0.0
 * Author: Kolya Udav
 */

if (!defined('ABSPATH')) {
    exit;
}

if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

class ShadyCompaniesPluginBootstrap
{
    public static function init(): void
    {
        new \Shady\Companies\Setup\PostTypes();
        new \Shady\Companies\Frontend\Shortcode();
    }
}

ShadyCompaniesPluginBootstrap::init();
