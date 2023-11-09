<?php

function construct()
{
    load('helper', 'format');
    load('helper', 'url');
    load('lib', 'cart');
    load_model('cart');
}

function indexAction()
{
    $id = (int)$_GET['id'];
    $item = get_product_by_id($id);
    $data['item'] = $item;
    load_view('cart');
}

function updateAction()
{
    $id = $_POST['id'];
    $qty = $_POST['qty'];
    // Lấy thông tin sản phẩm
    $item = get_product_by_id($id);

    if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
        //Cập nhật số lượng
        $_SESSION['cart']['buy'][$id]['qty'] = $qty;
        //Cập nhật tổng tiền
        $sub_total = $qty * $item['price_sale'];
        $_SESSION['cart']['buy'][$id]['sub_total'] = $sub_total;
        //Cập nhật toàn bộ giỏ hàng
        update_info_cart();
        // Lấy tổng giá trị trong giỏ hàng
        $total = get_total_cart();
        //Giá trị trả về
        $data = array(
            'sub_total' => currency_format($sub_total),
            'total' => currency_format($total)
        );
        echo json_encode($data);
    }
}

function addAction()
{
    $id = (int)$_GET['id'];
    add_cart($id);
    redirect('?mod=products&controller=cart&action=index');
}

function deleteAction()
{
    $id = (int)$_GET['id'];
    delete_cart($id);
    redirect('?mod=products&controller=cart&action=index');
}

function deleteAllAction()
{
    delete_cart('');
    redirect('?mod=products&controller=cart&action=index');
}
