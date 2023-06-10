<?php
$menu = [
    [
        'name' => "Главная",
        'link' => "/engine"
    ],
    [
        'name' => "Каталог",
        'link' => "/engine/?page=catalog"
    ],
    [
        'name' => "О нас",
        'link' => "/engine/?page=about"
    ],
];

foreach ($menu as $menu_item) {
    echo "<a href=" . $menu_item['link'] . '>';
    echo $menu_item['name'] . "</a> ";
}
echo "<br>";