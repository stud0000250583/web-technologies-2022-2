<h2>Новости</h2>

<?php foreach ($news as $item): ?>
    <div>
        <b>
            <a href="/news/<?= $item['id'] ?>"><?= $item['title'] ?></a>
        </b>
    </div>
<?php endforeach; ?>