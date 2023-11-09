<?php
function get_product_by_id($id)
{
    $result = db_fetch_row("SELECT * FROM `products` WHERE `id` = '{$id}'");
    return $result;
}

function update_product($data_product, $id)
{
    $result = db_update('products', $data_product, "`id` = '{$id}'");
    return $result;
}

function get_list_product()
{
    $result = db_fetch_array("SELECT * FROM `products`");
    return $result;
}

function get_list_cat()
{
    $result = db_fetch_array("SELECT * FROM `categories`");
    return $result;
}

function add_product($data_product)
{
    $result = db_insert('products', $data_product);
    return $result;
}

function add_category($data_cate)
{
    $result = db_insert('categories', $data_cate);
    return $result;
}

function delete_product_by_id($id)
{
    db_delete('products', "`id` = '{$id}'");
}

//======================
// USERS
//======================
function get_list_user()
{
    $result = db_fetch_array("SELECT * FROM `users`");
    return $result;
}

function get_user_by_id($id)
{
    $result = db_fetch_row("SELECT * FROM `users` WHERE `id` = '{$id}'");
    return $result;
}

function delete_user_by_id($id)
{
    db_delete('users', "`id` = '{$id}'");
}

function add_user($data)
{
    $result = db_insert('users', $data);
    return $result;
}

function update_user($data_user, $id)
{
    $result = db_update('users', $data_user, "`id` = '{$id}'");
    return $result;
}

function user_exist($username, $email)
{
    $check_user = db_num_rows("SELECT * FROM `users` WHERE `username` = '{$username}' or `email` = '{$email}'");
    if ($check_user > 0)
        return true;
    return false;
}

function user_exist_email($email)
{
    $check_user = db_num_rows("SELECT * FROM `users` WHERE `email` = '{$email}'");
    if ($check_user > 0)
        return true;
    return false;
}

function user_exist_username($username)
{
    $check_user = db_num_rows("SELECT * FROM `users` WHERE `username` = '{$username}'");
    if ($check_user > 0)
        return true;
    return false;
}
