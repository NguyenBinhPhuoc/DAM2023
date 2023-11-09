<?php

function get_list_product($start, $num_per_page, $where = '')
{
    if (!empty($where)) {
        $where = "WHERE {$where}";
    }
    $result = db_fetch_array("SELECT * FROM `products` {$where} LIMIT {$start}, {$num_per_page}");
    return $result;
}

function get_list_cat()
{
    $result = db_fetch_array("SELECT * FROM `categories`");
    return $result;
}

function get_count_rows()
{
    $result = db_num_rows("SELECT * FROM `products`");
    return $result;
}

function get_count_rows_where($cate_id)
{
    $result = db_num_rows("SELECT * FROM `products` WHERE `cate_id` = '{$cate_id}'");
    return $result;
}

function get_product_by_cate_id($cate_id, $start, $num_per_page)
{
    $result = db_fetch_array("SELECT * FROM `products` WHERE `cate_id` = '{$cate_id}' LIMIT {$start}, {$num_per_page}");
    return $result;
}
