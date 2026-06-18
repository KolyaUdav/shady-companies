<?php get_header(); ?>

<main class="custom-page-layout">
    <div class="hero-banner">
        <h1>Черный список работодателей</h1>
    </div>

    <div class="page-content">
        <?php echo do_shortcode('[shady_companies_registry]'); ?>
    </div>
</main>

<?php get_footer(); ?>