<?php
function add_cart($id)
{
    $item = get_product_by_id($id);
    # Thêm thông tin vào giỏ hàng
    $qty = 1;
    if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
        $qty = $_SESSION['cart']['buy'][$id]['qty'] + 1;
    }
    $_SESSION['cart']['buy'][$id] = array(
        'id' => $item['id'],
        'url' => $item['images'],
        'product_title' => $item['title'],
        'price' => $item['price_sale'],
        'product_thumb' => $item['images'],
        'qty' => $qty,
        'sub_total' => $item['price_sale'] * $qty
    );
    // Cập nhật hoá đơn
    update_info_cart();
}
function update_info_cart()
{
    if (isset($_SESSION['cart'])) {
        $num_oder = 0;
        $total = 0;
        foreach ($_SESSION['cart']['buy'] as $item) {
            $num_oder += $item['qty'];
            $total += $item['sub_total'];
        }
        $_SESSION['cart']['info'] = array(
            'num_oder' => $num_oder,
            'total' => $total
        );
    }
}
function delete_cart($id)
{
    if (isset($_SESSION['cart'])) {
        #Xoá sản phẩm có $id trong giỏ hàng
        if (!empty($id)) {
            unset($_SESSION['cart']['buy'][$id]);
            update_info_cart();
        } else {
            unset($_SESSION['cart']);
        }
    }
}
function get_product_by_id($id)
{
    $item = db_fetch_row("SELECT * FROM `products` WHERE `id` =  {$id}");
    return $item;
}


function get_list_product()
{
    $item = db_fetch_array("SELECT * FROM `products`");
    return $item;
}
