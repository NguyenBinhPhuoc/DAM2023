<?php
get_header('admin');
?>
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách sản phẩm</h5>
            <div class="form-search form-inline">
                <form action="#">
                    <input type="" class="form-control form-search" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="analytic">
                <a href="" class="text-primary">Trạng thái 1<span class="text-muted">(10)</span></a>
                <a href="" class="text-primary">Trạng thái 2<span class="text-muted">(5)</span></a>
                <a href="" class="text-primary">Trạng thái 3<span class="text-muted">(20)</span></a>
            </div>
            <div class="form-action form-inline py-3">
                <select class="form-control mr-1" id="">
                    <option>Chọn</option>
                    <option>Tác vụ 1</option>
                    <option>Tác vụ 2</option>
                </select>
                <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
            </div>
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th scope="col">
                            <input name="checkall" type="checkbox">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($list_product as $item) {
                    ?>
                        <tr class="">
                            <td>
                                <input type="checkbox">
                            </td>
                            <td><?php echo $i ?></td>
                            <td><img id="img_list_product" src="<?php echo $item['images'] ?>" alt=""></td>
                            <td><a href="#"><?php echo $item['title'] ?></a></td>
                            <td><?php echo currency_format($item['price']) ?></td>
                            <td><?php echo $category[$item['cate_id']] ?></td>
                            <td>
                                <a href="?mod=admin&action=updateProduct&id=<?php echo $item['id'] ?>" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="?mod=admin&action=deleteProduct&id=<?php echo $item['id'] ?>" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
            <?php
            // $rows = $conn->query("SELECT COUNT(*) FROM `product`")->fetchColumn();
            // $total_pages = ceil($rows / 8);

            // $str_paggi = "<nav aria-label='Page navigation example'>
            //                 <ul class='pagination'>";
            // if ($_REQUEST['pagi'] > 1) {
            //     $page_prev = $_REQUEST['pagi'] - 1;
            //     $str_paggi .= "<li class='page-item'>
            //                         <a class='page-link' href='./index.php?view=list-product&pagi={$page_prev}' aria-label='Previous'>
            //                             <span aria-hidden='true'>Trước</span>
            //                             <span class='sr-only'>Sau</span>
            //                         </a>
            //                     </li>";
            // }
            // for ($i = 1; $i <= $total_pages; $i++) {
            //     $active = "";
            //     if ($i == $_REQUEST['pagi']) $active = "style='background-color: #ee4d2d;'";
            //     $str_paggi .= " <li class='page-item'><a {$active} class='page-link' href='./index.php?view=list-product&pagi={$i}'>{$i}</a></li>";
            // }

            // if ($_REQUEST['pagi'] < $total_pages) {
            //     $page_next = $_REQUEST['pagi'] + 1;
            //     $str_paggi .= "<li class='page-item'>
            //                         <a class='page-link' href='./index.php?view=list-product&pagi={$page_next}' aria-label='Next'>
            //                             <span aria-hidden='true'>&raquo;</span>
            //                             <span class='sr-only'>Next</span>
            //                         </a>
            //                     </li>";
            // }
            // $str_paggi .= "</ul>
            // </nav>";
            // echo $str_paggi;

            ?>
        </div>
    </div>
</div>
<?php
get_footer('admin');
?>