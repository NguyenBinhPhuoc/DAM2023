<?php
get_header();
?>
<div class="app__container">
    <div class="grid wide">
        <div class="row sm-gutter app__content">
            <div class="col l-2 m-0 c-0">
                <?php get_sidebar() ?>
            </div>

            <div class="col l-10 m-12 c-12">
                <div class="slide-show-auto">
                    <img id="slide-show-auto__img" src="public/img/slideShow/000.jpeg" width="100%" alt="Ảnh" />
                </div>

                <div class="home-filter hide-on-mobile-tablet">
                    <span class="home-filter__label">Sắp xếp theo</span>
                    <button class="home-filter__btn btn btn--white">
                        Phổ biến
                    </button>
                    <button class="home-filter__btn btn btn--primary">
                        Mới nhất
                    </button>
                    <button class="home-filter__btn btn btn--white">
                        Bán chạy
                    </button>

                    <div class="select-input">
                        <span class="select-input__label">Giá</span>
                        <i class="select-input__icon fas fa-angle-down"></i>

                        <ul class="select-input__list">
                            <li class="select-input__item">
                                <a href="index.php?odb=lowToHigh" class="select-input__link">Giá: Thấp đến cao</a>
                            </li>
                            <li class="select-input__item">
                                <a href="?odb=highToLow" class="select-input__link">Giá: Cao đến thấp</a>
                            </li>
                        </ul>
                    </div>

                    <div class="home-filter__page">
                        <span class="home-filter__page-num">
                            <span class="home-filter__page-current">1</span>/14
                        </span>

                        <div class="home-filter__page-control">
                            <a href="" class="home-filter__page-btn home-filter__page-btn--disabled">
                                <i class="home-filter__page-icon fas fa-angle-left"></i>
                            </a>
                            <a href="" class="home-filter__page-btn">
                                <i class="home-filter__page-icon fas fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <nav class="mobile-category">
                    <ul class="mobile-category__list">
                        <li class="mobile-category__item">
                            <a href="" class="mobile-category__link">Dụng cụ & Thiết bị tiện ích Dụng cụ & Thiết bị tiện ích
                                Dụng cụ & Thiết bị tiện ích</a>
                        </li>
                        <li class="mobile-category__item">
                            <a href="" class="mobile-category__link">Dụng cụ & Thiết bị tiện ích</a>
                        </li>
                        <li class="mobile-category__item">
                            <a href="" class="mobile-category__link">Dụng cụ & Thiết bị tiện ích</a>
                        </li>
                        <li class="mobile-category__item">
                            <a href="" class="mobile-category__link">Dụng cụ & Thiết bị tiện ích</a>
                        </li>
                        <li class="mobile-category__item">
                            <a href="" class="mobile-category__link">Dụng cụ & Thiết bị tiện ích</a>
                        </li>
                        <li class="mobile-category__item">
                            <a href="" class="mobile-category__link">Dụng cụ & Thiết bị tiện ích</a>
                        </li>
                        <li class="mobile-category__item">
                            <a href="" class="mobile-category__link">Dụng cụ & Thiết bị tiện ích</a>
                        </li>
                        <li class="mobile-category__item">
                            <a href="" class="mobile-category__link">Dụng cụ & Thiết bị tiện ích</a>
                        </li>
                        <li class="mobile-category__item">
                            <a href="" class="mobile-category__link">Dụng cụ & Thiết bị tiện ích</a>
                        </li>
                        <li class="mobile-category__item">
                            <a href="" class="mobile-category__link">Dụng cụ & Thiết bị tiện ích</a>
                        </li>
                        <li class="mobile-category__item">
                            <a href="" class="mobile-category__link">Dụng cụ & Thiết bị tiện ích</a>
                        </li>
                        <li class="mobile-category__item">
                            <a href="" class="mobile-category__link">Dụng cụ & Thiết bị tiện ích</a>
                        </li>
                        <li class="mobile-category__item">
                            <a href="" class="mobile-category__link">Dụng cụ & Thiết bị tiện ích</a>
                        </li>
                        <li class="mobile-category__item">
                            <a href="" class="mobile-category__link">Dụng cụ & Thiết bị tiện ích</a>
                        </li>
                        <li class="mobile-category__item">
                            <a href="" class="mobile-category__link">Dụng cụ & Thiết bị tiện ích</a>
                        </li>
                        <li class="mobile-category__item">
                            <a href="" class="mobile-category__link">Dụng cụ & Thiết bị tiện ích</a>
                        </li>
                        <li class="mobile-category__item">
                            <a href="" class="mobile-category__link">Dụng cụ & Thiết bị tiện ích</a>
                        </li>
                        <li class="mobile-category__item">
                            <a href="" class="mobile-category__link">Dụng cụ & Thiết bị tiện ích</a>
                        </li>
                    </ul>
                </nav>

                <div class="home-product">
                    <div style="width: 100%;" class="row sm-gutter">
                        <!-- Product item -->
                        <?php
                        // show_array($list_product);
                        foreach ($list_product as $item) {
                        ?>
                            <div class="col l-3 m-4 c-6">
                                <div class="home-product-item">
                                    <a href="?mod=products&action=index&id=<?php echo $item['id'] ?>" title="<?php echo $item['title'] ?>">
                                        <div class="home-product-item__img" style="
                                background-image: url(<?php echo $item['images'] ?>);
                                "></div>
                                        <h4 class="home-product-item__name">
                                            <?php echo $item['title'] ?>
                                        </h4>
                                        <div class="home-product-item__price">
                                            <span class="home-product-item__price-old"><?php echo currency_format($item['price']) ?></span>
                                            <span class="home-product-item__price-current"><?php echo currency_format($item['price_sale']) ?></span>
                                        </div>
                                        <div class="home-product-item__action">
                                            <span class="home-product-item__like home-product-item__like--liked">
                                                <i class="home-product-item__like-icon-empty far fa-heart"></i>
                                                <i class="home-product-item__like-icon-fill fas fa-heart"></i>
                                            </span>
                                            <div class="home-product-item__rating">
                                                <i class="home-product-item__star--gold fas fa-star"></i>
                                                <i class="home-product-item__star--gold fas fa-star"></i>
                                                <i class="home-product-item__star--gold fas fa-star"></i>
                                                <i class="home-product-item__star--gold fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <span class="home-product-item__sold">88 Đã bán</span>
                                        </div>
                                        <div class="home-product-item__origin">
                                            <span class="home-product-item__brand">Whoo</span>
                                            <span class="home-product-item__origin-name">Nhật Bản</span>
                                        </div>
                                    </a>
                                    <div class="home-product-item__addcart fas fa-shopping-cart">
                                        Thêm vào giỏ hàng
                                    </div>
                                    <div class="home-product-item__favourite">
                                        <i class="fas fa-check"></i>
                                        <span>Yêu thích +</span>
                                    </div>
                                    <div class="home-product-item__sale-off">
                                        <span class="home-product-item__sale-off-percent">3%</span>
                                        <span class="home-product-item__sale-off-label">GIẢM</span>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <?php
                echo get_pagging($num_page, $page, get_url());
                ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>