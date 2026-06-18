<?php
/**
 * @var array $allPosts - массив постов
 */
?>

<div class="companies-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px;">
    <?php if (!empty($allPosts)): ?>
        <?php foreach ($allPosts as $post): ?>
            <article class="company-card" style="border: 1px solid #eee; padding: 20px; background: #fff; border-radius: 8px;">
                <?php if (!empty($post['logo'])): ?>
                    <img src="<?php echo $post['logo']; ?>" alt="Logo" style="max-height: 40px; margin-bottom: 10px; display: block;">
                <?php endif; ?>

                <h3 style="margin: 0 0 10px 0;"><?php echo $post['title']; ?></h3>

                <?php if (!empty($post['content'])): ?>
                    <div style="background: #f1eeee; border-left: 3px solid #b4adad; padding: 8px; margin-bottom: 10px; font-size: 0.9rem;">
                        <?php echo $post['content']; ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($post['cons'])): ?>
                    <div style="background: #fef2f2; border-left: 3px solid #ef4444; padding: 8px; margin-bottom: 10px; font-size: 0.9rem;">
                        <strong>Минусы:</strong> <?php echo $post['cons']; ?>
                    </div>
                <?php endif; ?>

                <div style="font-size: 0.9rem; color: #555;"><?php echo $post['excerpt']; ?></div>
            </article>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Компаний не найдено</p>
    <?php endif; ?>
</div>
