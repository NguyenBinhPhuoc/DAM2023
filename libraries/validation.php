<?php
function is_username($username)
{
    $pattern = "/^[A-Za-z0-9_\.]{6,32}$/";
    if (!preg_match($pattern, $username))
        return false;
    return true;
}
function is_password($password)
{
    $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,32}$/";
    if (!preg_match($pattern, $password))
        return false;
    return true;
}
function form_error($label_field)
{
    global $error; //Nó hiểu được biến bên ngoài
    if (!empty($error[$label_field])) return "<p class='error'>*{$error[$label_field]}</p>";
}
function form_succsess($label_field)
{
    global $success; //Nó hiểu được biến bên ngoài
    if (!empty($success[$label_field])) return "<p class='success'>{$success[$label_field]}</p>";
}
function set_value($label_field) // tên trường ví dụ: 'username'
{
    global $$label_field;
    if (!empty($$label_field))
        return $$label_field;
    return false;
}
function is_phone_number($number)
{
    $pattern = "/^(09|03|08|01[2|6|8|9])+([0-9]{8})$/";
    if (!preg_match($pattern, $number))
        return false;
    return true;
}
