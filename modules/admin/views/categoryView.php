<?php
get_header('admin');
?>
<div id="content" class="container-fluid">
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Thêm danh mục
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="name">Tên danh mục</label>
                            <input class="form-control" type="text" name="name" id="name">
                            <?php echo form_error('name') ?>
                        </div>
                        <div class="form-group">
                            <label for="">Danh mục cha</label>
                            <select class="form-control" id="">
                                <option>Chọn danh mục</option>
                                <?php
                                foreach ($list_cat as $item) {
                                ?>
                                    <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label for="">Trạng thái</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    Chờ duyệt
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                <label class="form-check-label" for="exampleRadios2">
                                    Công khai
                                </label>
                            </div>
                        </div> -->
                        <input type="submit" name="btn" value="Thêm mới" class="btn btn-primary">
                        <span>
                            <?php echo form_error('add_cate') ?>
                            <?php echo form_succsess('add_cate') ?>
                        </span>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Danh mục
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Mã loại</th>
                                <th scope="col">Tên loại</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($list_cat as $item) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $i ?></th>
                                    <td><?php echo $item['id'] ?></td>
                                    <td><?php echo $item['name'] ?></td>
                                    <td></td>
                                </tr>
                            <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
get_footer('admin');
?>