<?php
function getCatalog()
{
    $goods = getAssocResult("SELECT * FROM goods");
    return $goods;
}

function getOneCatalog($id)
{
    return getOneResult("SELECT * FROM goods WHERE id = {$id}");
}