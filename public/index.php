<?php
require 'db.php';
$menu = get_assoc_result("SELECT * FROM menu");

function render($menu)
{
    foreach ($menu as $item) {
        if (!isset($item['parent_id'])) {
            render_parent($item);
        }
    }
}

function get_children($parent_id) {
    $menu = $GLOBALS['menu'];
    $children = [];
    foreach ($menu as $item) {
        if ($item['parent_id'] == $parent_id)
            array_push($children, $item);
    }
    return $children;
}

function render_parent($item)
{
    $parent_id = $item['id'];
    $children = get_children($parent_id);
    if (count($children) > 0) {
        echo '
        <div class="list-item list-item_open" data-parent>
            <div class="list-item__inner">
                <img class="list-item__folder" src="/img/folder.png" alt="folder">
                <span>' . $item['name'] . '</span>
                <img class="list-item__arrow" src="/img/chevron-down.png" alt="chevron-down" data-open>
            </div>
        <div class="list-item__items">';
        foreach ($children as $child) {
            render_parent($child);
        }
        echo '</div></div>';
    } else {
        render_child($item);
    }
}

function render_child($item)
{
    echo '
    <div class="list-item">
        <div class="list-item__inner">
            <img class="list-item__folder" src="/img/folder.png" alt="folder">
            <span>' . $item['name'] . '</span>
        </div>
    </div>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>List Item</title>
    <link rel="stylesheet" href="/styles/style.css">
</head>

<body>
    <div class="list-items" id="list-items">
        <div class="test">
            <?= render($menu) ?>
        </div>
    </div>
    <script src="/scripts/script.js"></script>
</body>

</html>