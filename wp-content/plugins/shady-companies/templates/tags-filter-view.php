<?php
/**
 * @var array $allTags - Набор обработанных данных о тегах
 */
?>

<select name="c_tag" style="padding: 10px;">
    <option value="">Все теги</option>
    
    <?php foreach ($allTags as $tag): ?> 
        <option value="<?php echo esc_attr($tag['slug']); ?>" <?php echo $tag['is_selected'] ?>><?php echo esc_html($tag['name']); ?></option>;
    
    <?php endforeach; ?>
</select>