<?php
function prepareParams($page, $id)
{
    switch ($page) {
        case 'index':
            $params['title'] = 'Главная';
            break;

        case 'catalog':
            $params['title'] = 'Каталог';
            $params['catalog'] = getCatalog();
            break;

        case 'catalog_entry':
            $item = getOneCatalog($id);
            $params['title'] = $item['name'];
            $params['item'] = $item;
            $params['feedback'] = getAllFeedback($id);
            break;

        case 'about':
            $params['title'] = 'about';
            $params['phone'] = 444333;
            break;

        case 'news':
            $params['title'] = 'Новости';
            $params['news'] = getNews();
            break;

        case 'news_entry':
            $news = getOneNews($id);
            $params['title'] = $news['title'] . '. Новости нашего магазина';
            $params['news'] = $news;
            break;

        default:
            echo "404";
            die();
    }

    return $params;
}