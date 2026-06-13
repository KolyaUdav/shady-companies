<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header class="site-header">
        <div class="container">
            <div class="site-branding">
                <?php if (has_custom_logo()): ?>
                    <?php the_custom_logo(); ?>
                <?php else: ?>
                    <p class="site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <?php bloginfo('name'); ?>
                        </a>
                    </p>

                    <?php $description = get_bloginfo('description', 'display'); ?>

                    <?php if ($description || is_customize_preview()): ?>
                        <p class="site-description"><?php echo $description; ?></p>
                    <?php endif; ?>
                <?php endif; ?>

                <nav class="main-navigation">
                    <?php
                        wp_nav_menu([
                            'theme_location' => 'primary-menu',
                            'menu_class' => 'nav-menu-list',
                            'container' => false,
                            'fallback_cb' => false,
                        ]);
                    ?>
                </nav>
            </div>
        </div>
    </header>
