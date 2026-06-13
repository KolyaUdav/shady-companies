<?php get_header(); ?>

<main class="site-main">
    <div class="container">
        <?php if (have_posts()): ?>
            <?php while (have_posts()): ?>
                <?php the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class('custom-article-class') ?>>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <div class="entry-content"><?php the_content(); ?></div>
                </article>

            <?php endwhile; ?>
        <?php else: ?>
            <p>Ничего не найдено</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>