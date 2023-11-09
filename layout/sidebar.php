<nav class="category">
    <h3 class="category__heading">
        <i class="category__heading-icon fas fa-list"></i>
        Danh mục
    </h3>
    <ul class="category-list">
        <li <?php
            if (isset($_GET['cate_id'])) {
                echo "class='category-item'";
            } else {
                echo "class='category-item category-item--active'";
            }
            ?>>
            <a href='index.php' class='category-item__link'>Tất cả sản phẩm</a>
        </li>
        <?php
        $list_cat = get_list_cat();
        foreach ($list_cat as $item) {
        ?>
            <li <?php
                if (isset($_GET['cate_id']) && ($_GET['cate_id'] == $item['id'])) {
                    echo "class='category-item category-item--active'";
                } else {
                    echo "class='category-item'";
                }
                ?>>
                <a href='?mod=home&action=index&cate_id=<?php echo $item['id'] ?>' class='category-item__link'><?php echo $item['name'] ?></a>
            </li>
        <?php
        }
        ?>
    </ul>
</nav>