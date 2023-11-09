<?php
function base_url($url = "")
{
    global $config;
    return $config['base_url'] . $url;
}
function redirect($url = "")
{
    global $config;
    $path = $config['base_url'] . $url;
    header("Location: {$path}");
}
function get_url()
{
    $placeholders = array();
    foreach ($_GET as $key => $value) {
        $placeholders[] = "{$key}={$value}";
    }
    $placeholders_new = implode('&', $placeholders);
    return "?" . $placeholders_new;
}
