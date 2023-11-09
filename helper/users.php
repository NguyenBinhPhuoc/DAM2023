<?php
//Trả về true nếu đã login
function is_login()
{
    if (isset($_SESSION['is_login']))
        return true;
    return false;
}
