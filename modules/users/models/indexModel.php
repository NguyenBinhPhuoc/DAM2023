<?php

function check_login($username, $password)
{
    $check_user = db_num_rows("SELECT * FROM `users` WHERE `username` = '{$username}' and `password` = '{$password}'");
    if ($check_user > 0)
        return true;
    return false;
}

function info_user($label = 'id')
{
    $user_login = $_SESSION['user_login'];
    $user = db_fetch_row("SELECT * FROM `users` WHERE `username` = '{$user_login}'");
    return $user[$label];
}

function add_user($data)
{
    db_insert('users', $data);
}

function user_exist($username, $email)
{
    $check_user = db_num_rows("SELECT * FROM `users` WHERE `username` = '{$username}' or `email` = '{$email}'");
    if ($check_user > 0)
        return true;
    return false;
}
