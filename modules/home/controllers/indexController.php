<?php
function construct()
{
    load('helper', 'url');
    load('helper', 'pagging');
    load('helper', 'format');
    load_model('index');
}

function indexAction()
{
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $search = $_GET['search'];
    if (isset($_GET['cate_id'])) {
        $cate_id = (int)$_GET['cate_id'];
        $total_row = get_count_rows_where($cate_id);
    } else {
        $total_row = get_count_rows();
    }
    $num_per_page = 8;
    $num_page = ceil($total_row / $num_per_page);
    $start = ($page - 1) * $num_per_page;
    if (isset($_GET['cate_id'])) {
        $list_products = get_product_by_cate_id($cate_id, $start, $num_per_page);
    } else {
        if (isset($_GET['search'])) {
            $list_products = get_list_product($start, $num_per_page, "`title` LIKE '%{$search}%' ");
        } else {
            $list_products = get_list_product($start, $num_per_page);
        }
    }
    $data['list_product'] = $list_products;
    $data['page'] = $page;
    $data['num_page'] = $num_page;
    load_view('index', $data);
}
