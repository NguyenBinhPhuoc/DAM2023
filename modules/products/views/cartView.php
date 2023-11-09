<?php
get_header();
?>

<?php
$list_buy = get_list_buy_cart();
?>

<div id="main-content-wp" class="cart-page">
    <div id="wrapper" class="wp-inner clearfix">
        <?php
        if (!empty($list_buy)) {
        ?>
            <div class="section" id="info-cart-wp">
                <div class="section-detail table-responsive">
                    <form action="?mod=cart&act=update" method="post">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Mã sản phẩm</td>
                                    <td>Ảnh sản phẩm</td>
                                    <td>Tên sản phẩm</td>
                                    <td>Giá sản phẩm</td>
                                    <td>Số lượng</td>
                                    <td colspan="2">Thành tiền</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($list_buy as $item) {
                                ?>
                                    <tr>
                                        <td>0000<?php echo $item['id'] ?></td>
                                        <td>
                                            <a href="<?php echo $item['url'] ?>" title="" class="thumb">
                                                <img width="100%" src="<?php echo $item['product_thumb'] ?>" alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="<?php echo $item['url'] ?>" title="" class="name-product"><?php echo $item['product_title'] ?></a>
                                        </td>
                                        <td><?php echo currency_format($item['price']) ?></td>
                                        <td>
                                            <input type="number" data-id="<?php echo $item['id'] ?>" name="qty[<?php echo $item['id'] ?>]" min="1" max="10" value="<?php echo $item['qty'] ?>" class="num-order">
                                        </td>
                                        <td id="sub-total-<?php echo $item['id'] ?>"><?php echo currency_format($item['sub_total']) ?></td>
                                        <td>
                                            <a href="<?php echo $item['url_delete_cart'] ?>" title="Xoá sản phẩm" class="del-product"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <p id="total-price" class="fl-right">Tổng giá: <span><?php echo currency_format(get_total_cart()) ?></span></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <div class="fl-right">
                                                <input type="submit" id="update-cart" value="Cập nhật giỏ hàng" name="btn_update_cart">
                                                <a href="?mod=cart&act=checkout" title="" id="checkout-cart">Thanh toán</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
                </div>
            </div>
        <?php
        } else {
        ?>
            <p>Không có sản phẩm nào trong giỏ hàng</p>
        <?php
        }
        ?>
        <div class="section" id="action-cart-wp">
            <div class="section-detail">
                <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                <a style="margin-left: 12px;" href="?" title="" id="buy-more">Mua tiếp</a><br />
                <a style="margin-left: 12px;" href="?mod=products&controller=cart&action=deleteAll" title="" id="delete-cart">Xóa toàn bộ giỏ hàng</a>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>