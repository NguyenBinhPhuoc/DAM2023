<?php
get_header();
?>
<div class="app__container">
    <div class="grid wide">
        <div class="row sm-gutter app__content">
            <div class="col l-2 m-0 c-0">
                <?php get_sidebar() ?>
            </div>
            <div class="col min-height l-10 m-12 c-12">
                <div class="row row_detail_product">
                    <div class="col l-5">
                        <div class="img_detail_product">
                            <img src="<?php echo $item['images'] ?>" alt="Ảnh">
                        </div>

                        <div class="list-img_detail_product">
                            <span class="sub_img_detail_product">
                                <img src="<?php echo $item['images'] ?>" />
                            </span>
                            <span class="sub_img_detail_product">
                                <img src="<?php echo $item['images'] ?>" />
                            </span>
                            <span class="sub_img_detail_product">
                                <img src="<?php echo $item['images'] ?>" />
                            </span>
                            <span class="sub_img_detail_product">
                                <img src="<?php echo $item['images'] ?>" />
                            </span>
                            <span class="sub_img_detail_product">
                                <img src="<?php echo $item['images'] ?>" />
                            </span>
                        </div>
                    </div>
                    <div class="col l-7">
                        <div class="info">
                            <h3 class="product-name"><?php echo $item['title'] ?></h3>
                            <div class="desc">
                                <p><?php echo $item['description'] ?></p>
                            </div>
                            <div class="num-product">
                                <span class="title">Sản phẩm: </span>
                                <span class="status">Còn hàng</span>
                            </div>
                            <p class="price"><?php echo currency_format($item['price_sale']) ?></p>
                            <div class="num-order-wp">
                                <a title="" id="minus"><i class="fa fa-minus"></i></a>
                                <input type="text" name="num-order" value="1" id="num-order">
                                <a title="" id="plus"><i class="fa fa-plus"></i></a>
                            </div>
                            <a href="?mod=products&controller=cart&action=add&id=<?php echo $item['id'] ?>" class="add-cart">Thêm giỏ hàng</a>
                            <a href="?page=cart" class="buy">Mua ngay</a>
                        </div>
                    </div>


                </div>

                <div class="row row_detail_product">
                    <div class="section" id="post-product-wp">
                        <div class="section-head">
                            <h3 class="section-title">Mô tả sản phẩm</h3>
                        </div>
                        <div class="section-detail">
                            <p><?php echo $item['detail'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>