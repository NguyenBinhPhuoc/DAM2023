<?php
get_header('admin');
?>
<div id="content" class="container-fluid">
    <style>
        #img_list_user {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
    </style>
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách thành viên</h5>
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
                        <th>
                            <input type="checkbox" name="checkall">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Ảnh đại điện</th>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Quyền</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($list_user as $item) {
                    ?>
                        <tr class="">
                            <td>
                                <input type="checkbox">
                            </td>
                            <td><?php echo $i; ?></td>
                            <td><img id="img_list_user" src="<?php echo $item['avartar'] ?>" alt=""></td>
                            <td><?php echo $item['fullname'] ?></td>
                            <td><?php echo $item['username'] ?></td>
                            <td><?php echo $item['email'] ?></td>
                            <td><?php echo $item['role'] ?></td>
                            <td>
                                <a href="?mod=admin&action=updateUser&id=<?php echo $item['id'] ?>" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="?mod=admin&action=deleteUser&id=<?php echo $item['id'] ?>" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                        $i++;
                    }
                    ?>



                    <!-- <tr class="">
                        <td>
                            <input type="checkbox">
                        </td>
                        <td>1</td>
                        <td><img src="http://via.placeholder.com/80X80" alt=""></td>
                        <td><a href="#">Samsung Galaxy A51 (8GB/128GB)</a></td>
                        <td>7.790.000₫</td>
                        <td>Điện thoại</td>
                        <td>26:06:2020 14:00</td>
                        <td><span class="badge badge-success">Còn hàng</span></td>
                        <td>
                            <a href="#" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr> -->
                </tbody>
                <!-- <tr>
                    <td>
                        <input type="checkbox">
                    </td>
                    <th scope="row">3</th>
                    <td>Nguyễn Hồng Nhung</td>
                    <td>hongnhung</td>
                    <td>hongnhung@gmail.com</td>
                    <td>Editor</td>
                    <td>26:06:2020 14:00</td>
                    <td>
                        <a href="#" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                        <a href="#" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                    </td>
                </tr> -->
            </table>
            <?php if (isset($_GET['role']) && $_GET['role'] == 'admin') {
                echo '<span style="color: red;">*Không thể xoá admin</span>';
            } ?>
        </div>
    </div>
</div>
<?php
get_footer('admin');
?>