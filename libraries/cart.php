<?php
// Lấy danh sách sản phẩm đã thêm vào giỏ hàng
function get_list_buy_cart()
{
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart']['buy'] as &$item) {
            $item['url_delete_cart'] = "?mod=products&controller=cart&action=delete&id={$item['id']}";
        }
        return $_SESSION['cart']['buy'];
    }
    return false;
}
function get_num_order_cart()
{
    if (isset($_SESSION['cart'])) {
        return $_SESSION['cart']['info']['num_oder'];
    }
    return false;
}
function get_total_cart()
{
    if (isset($_SESSION['cart'])) {
        return $_SESSION['cart']['info']['total'];
    }
    return false;
}

function update_cart($qty)
{
    foreach ($qty as $id => $new_qty) {
        $_SESSION['cart']['buy'][$id]['qty'] = $new_qty;
        $_SESSION['cart']['buy'][$id]['sub_total'] = $new_qty * $_SESSION['cart']['buy'][$id]['price'];
    }
    update_info_cart();
}
