<div class="catalog_wrapper">
    <div class="catalog_item">
        <img class="catalog_image" src=/img/<?= $item['image_link'] ?>>
        <div class="catalog_fields">
            <p class="catalog_name">
                <?= $item['name'] ?>
            </p>
            <p class="catalog_price">Цена:
                <?= $item['price'] ?>₽
            </p>
            <p class="catalog_description">
                <?= $item['description'] ?>
            </p>
        </div>
    </div>

    <form class="feedback_form" action="/models/feedback.php?action=create" method="post">
        <h2>Отзывы</h2>
        <input type="hidden" name="id" value="<?= $url_array = explode('/', $_SERVER['REQUEST_URI'])[2] ?>" />
        <p>Оставьте отзыв:</p>
        <input type="text" name="name" placeholder="Ваше имя" />
        <input type="text" name="message" placeholder="Ваш отзыв" />
        <input type="submit" value="Добавить" />
    </form>

    <div class="feedback_wrapper">
        <?php foreach ($feedback as $review): ?>
            <form class="feedback_entry">
                <input type="hidden" name="catalog_id"
                    value="<?= $url_array = explode('/', $_SERVER['REQUEST_URI'])[2] ?>" />
                <input type="hidden" name="id" value="<?= $review['id'] ?>" />
                <b>
                    <?= $review['name'] ?>:
                </b>
                <div class="feedback_message">
                    <textarea name="message" rows="3"><?= $review['contents'] ?></textarea>
                </div>
                <input formmethod="post" formaction="/models/feedback.php?action=update" type="submit" value="Сохранить" />
                <input formmethod="post" formaction="/models/feedback.php?action=delete" type="submit" value="Удалить" />
            </form>
        <?php endforeach; ?>
    </div>
</div>