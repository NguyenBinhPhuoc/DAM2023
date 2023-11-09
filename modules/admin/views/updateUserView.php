<?php
get_header('admin');
?>
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Chỉnh sửa người dùng
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Họ và tên</label>
                    <input value="<?php echo set_value('full_name') ?>" name="full_name" type="text" class="form-control" placeholder="Họ và Tên" />
                    <?php echo form_error('full_name') ?>
                </div>
                <div class="form-group">
                    <label for="email">Tên đăng nhập</label>
                    <input value="<?php echo set_value('name_login') ?>" name="name_login" type="text" class="form-control" placeholder="Tên đăng nhập" />
                    <?php echo form_error('name_login') ?>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input value="<?php echo set_value('email') ?>" name="email" type="text" class="form-control" placeholder="Email" />
                    <?php echo form_error('email') ?>
                </div>
                <div class="form-group">
                    <label for="email">Mật khẩu</label>
                    <input value="<?php echo set_value('password') ?>" name="password" type="password" class="form-control" placeholder="Mật khẩu" />
                    <?php echo form_error('password') ?>
                </div>
                <div class="form-group">
                    <label for="email">Nhập lại mật khẩu</label>
                    <input name="enter_password" type="password" class="form-control" placeholder="Nhập lại mật khẩu" />
                    <?php echo form_error('enter_password') ?>
                </div>
                <div class="form-group">
                    <span style="font-size: 16px;">Ảnh đại diện hiện tại:</span><br>
                    <?php if (!empty($avartar)) echo '<img style="height: 80px; width: 80px; object-fit: cover;     border-radius: 10px; margin-top: 5px;" src="' . $avartar . '" alt="">'; ?><br>
                    <span style="font-size: 16px;">Chọn ảnh đại diện mới:</span>
                    <input type="file" name="myfile">
                    <?php echo form_error('type') ?>
                    <?php echo form_error('file_size') ?>
                </div>
                <div class="form-group">
                    <label for="role">Thuộc quyền</label>
                    <select class="form-control" id="role" name="role">
                        <option value="<?php echo set_value('role') ?>"><?php echo set_value('role') ?></option>
                        <option value="editor">editor</option>
                        <option value="user">user</option>
                    </select>
                </div>

                <button type="submit" name="register" class="btn btn-primary">Chỉnh sửa</button>
            </form>
        </div>
        <span>
            <?php echo form_error('account') ?>
            <?php echo form_error('add_user') ?>
            <?php echo form_succsess('add_user') ?>
        </span>

    </div>
</div>
<?php
get_footer('admin');
?>