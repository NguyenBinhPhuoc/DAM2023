<?php
function get_product_by_id($id)
{
    $item = db_fetch_row("SELECT * FROM `products` WHERE `id` =  {$id}");
    return $item;
}

function get_list_cat()
{
    $result = db_fetch_array("SELECT * FROM `categories`");
    return $result;
}

function get_list_product()
{
    $item = db_fetch_array("SELECT * FROM `products`");
    return $item;
}
