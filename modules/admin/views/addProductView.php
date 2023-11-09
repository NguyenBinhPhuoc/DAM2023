<?php
get_header('admin');
?>
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm sản phẩm
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Tên sản phẩm</label>
                            <input class="form-control" type="text" value="<?php echo set_value('name_product') ?>" name="name_product" id="name">
                            <?php echo form_error('name_product') ?>
                        </div>
                        <div class="form-group">
                            <label for="price">Giá hiện tại</label>
                            <input class="form-control" type="text" value="<?php echo set_value('price') ?>" name="price" id="price">
                            <?php echo form_error('price') ?>
                        </div>
                        <div class="form-group">
                            <label for="price_sale">Giá đã giảm</label>
                            <input class="form-control" type="text" value="<?php echo set_value('price_sale') ?>" name="price_sale" id="price_sale">
                            <?php echo form_error('price_sale') ?>
                        </div>
                        <div class="form-group">
                            <label for="img">Ảnh sản phẩm</label>
                            <input class="form-control" type="file" name="myfile" id="img">
                            <?php echo form_error('type') ?>
                            <?php echo form_error('file_size') ?>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="intro">Mô tả sản phẩm</label>
                            <textarea name="description" class="form-control" id="intro" cols="30" rows="12"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="intro">Chi tiết sản phẩm</label>
                    <textarea name="detail" class="form-control" id="intro" cols="30" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="category">Danh mục</label>
                    <select class="form-control" id="category" name="category">
                        <option value="<?php echo set_value('category') ?>"><?php if (!set_value('category')) {
                                                                                echo "Chọn danh mục";
                                                                            } else {
                                                                                echo $category_get_name[set_value('category')];
                                                                            }
                                                                            ?></option>
                        <?php
                        foreach ($list_cat as $item) {
                        ?>
                            <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <?php echo form_error('category') ?>
                </div>
                <input type="submit" name="add_product" class="btn btn-primary" value="Thêm mới">
            </form>
            <span>
                <?php echo form_error('add_product') ?>
                <?php echo form_succsess('add_product') ?>
            </span>
        </div>
    </div>
</div>
<?php
get_footer('admin');
?>