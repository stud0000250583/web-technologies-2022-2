<?php
function renderTemplate($page, $params = [])
{
    extract($params);
    ob_start();
    include TEMPLATES_DIR . $page . ".php";
    return ob_get_clean();
}

function render($page, $params = [])
{
    return renderTemplate(LAYOUTS_DIR . 'main', [
        'title' => $params['title'],
        'menu' => renderTemplate('menu', ['menus' => getMenu()]),
        'content' => renderTemplate($page, $params)
    ]);
}