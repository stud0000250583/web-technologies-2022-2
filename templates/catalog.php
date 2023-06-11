<h2>Каталог</h2>

<div class="preview_catalog_wrapper">
    <?php foreach ($catalog as $item): ?>
        <div class="preview_catalog_item">
            <a href="/catalog/<?= $item['id'] ?>">
                <img class="preview_image" src="/img/<?= $item["image_link"] ?>" alt="">
            </a>
            <div class="preview_data">
                <p class="preview_name">
                    <?= $item["name"] ?>
                </p>
                <p class="preview_price">
                    <?= $item["price"] ?>₽
                </p>
                <a href="/catalog/<?= $item['id'] ?>">
                    <button>Купить</button>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>