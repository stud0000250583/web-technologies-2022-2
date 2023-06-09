<?php
$menu = [
    [
        'name' => "Поисковики",
        'link' => "",
        'children' => [
            [
                'name' => "Yandex",
                'link' => "https://ya.ru",
                'children' => [
                    [
                        'name' => "Карты",
                        'link' => "https://ya.ru/maps"
                    ],
                    [
                        'name' => "Маркет",
                        'link' => "https://ya.ru/market"
                    ]
                ]
            ],
            [
                'name' => "Google",
                'link' => "https://google.com"
            ]
        ]
    ],
    [
        'name' => "Штука",
        'link' => ''
    ]
];

function render_current($menu_item)
{
    echo "<li><a href=" . $menu_item['link'] . ">" . $menu_item['name'] . "</a></li>";
}

function render_all($menu)
{
    echo "<ul>";
    foreach ($menu as $menu_item)
        if (isset($menu_item['children'])) {
            render_current($menu_item);
            render_all($menu_item['children']);
        } else {
            render_current($menu_item);
        }
    echo "</ul>";
}

render_all($menu);
?>