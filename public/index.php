<?php
include '../config/config.php';

$url_array = explode('/', $_SERVER['REQUEST_URI']);
$id = $url_array[2] ?? 0;

if ($url_array[1] == "") {
    $page = 'index';
} elseif (!$id) {
    $page = $url_array[1];
} else {
    $page = $url_array[1] . "_entry";
}

$params = prepareParams($page, $id);
echo render($page, $params);