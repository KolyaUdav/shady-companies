<?php
    /**
     * @var string $searchValue - текущее значение поиска
     * @var string $tagValue - текущее значение выбранного тега
     * @var string $tagsSelectHtml - код селекта с тегами
     * @var string $companiesGridHtml - код сетки с контентом
     */
?>

<div class="shady-companies-registry" style="font-family: system-ui, sans-serif;">  
    <form method="GET" action="" class="registry-filter-form" style="margin-bottom: 30px; display: flex; gap: 10px;">
        <input type="text" name="c_search" value="<?php echo $searchValue; ?>" placeholder="Поиск компании..." style="padding: 10px; flex-grow: 1;">
        
        <?php echo $tagsSelectHtml ?>
        
        <button type="submit" style="padding: 10px 20px; background: #dc2626; color:#fff; border:none; cursor:pointer;">Найти</button>
        <?php if ($searchValue || $tagValue): ?>
            <a href="<?php echo esc_url(strtok($_SERVER["REQUEST_URI"], '?')); ?>" style="padding: 10px; align-self: center;">✕ Сбросить</a>
        <?php endif; ?>
    </form>

    <?php echo $companiesGridHtml; ?>
    
</div>