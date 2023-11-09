<?php

function construct()
{
    load('helper', 'format');
    load('helper', 'url');
    load('lib', 'cart');
    load_model('index');
}

function indexAction()
{
    $id = (int)$_GET['id'];
    $item = get_product_by_id($id);
    $data['item'] = $item;
    load_view('index', $data);
    show_array($_SESSION);
}


function editAction()
{
    // $id = (int)$_GET['id'];
    // $item = get_user_by_id($id);
    // show_array($item);
}
