<?php
require 'db.php';

function render()
{
    $sql = "SELECT * FROM menu WHERE parent_ID IS NULL";
    $data = get_assoc_result($sql);
    foreach ($data as $item) {
        render_parent($item);
    }
}

function render_parent($item)
{
    $parent_id = $item['id'];
    $sql = "SELECT * FROM menu WHERE parent_id = $parent_id";
    $children = get_assoc_result($sql);
    if (count($children) > 0) {
        $res = '
        <div class="list-item list-item_open" data-parent>
            <div class="list-item__inner">
                <img class="list-item__arrow" src="img/chevron-down.png" alt="chevron-down" data-open>
                <img class="list-item__folder" src="img/folder.png" alt="folder">
                <span>' . $item['name'] . '</span>
            </div>
        <div class="list-item__items">';
        echo $res;
        foreach ($children as $child) {
            render_parent($child);
        }
        echo '</div></div>';
    } else {
        echo render_child($item);
    }
}

function render_child($item)
{
    return '
    <div class="list-item">
        <div class="list-item__inner">
            <img class="list-item__folder" src="img/folder.png" alt="folder">
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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="list-items" id="list-items">
        <div class="test">
            <?= render() ?>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>