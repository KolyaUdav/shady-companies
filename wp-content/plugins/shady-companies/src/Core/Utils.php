<?php

namespace Shady\Companies\Core;

if (!defined('ABSPATH')) {
    exit;
}

class Utils
{
    public static function getResetUrl(): string
    {
        global $wp;

        return home_url(add_query_arg([], $wp->request));
    }
}
