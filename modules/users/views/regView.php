<link rel="stylesheet" href="public/css/main.css">
<link rel="stylesheet" href="public/css/base.css">
<link rel="stylesheet" href="public/fonts/fontawesome-free-5.15.4-web/css/all.min.css" />

<div class="modal" style="display:flex">
    <div class="modal__overlay active"></div>
    <div class="modal__body">
        <div class="auth-form active">
            <div class="auth-form__container">
                <div class="auth-form__header">
                    <h3 class="auth-form__heading">Đăng ký</h3>
                    <a href="?mod=users&action=login" class="auth-form__switch-btn">Đăng nhập</a>
                </div>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input value="<?php echo set_value('full_name') ?>" name="full_name" type="text" class="auth-form__input" placeholder="Họ và Tên" />
                            <?php echo form_error('full_name') ?>
                        </div>
                        <div class="auth-form__group">
                            <input value="<?php echo set_value('name_login') ?>" name="name_login" type="text" class="auth-form__input" placeholder="Tên đăng nhập" />
                            <?php echo form_error('name_login') ?>
                        </div>
                        <div class="auth-form__group">
                            <input value="<?php echo set_value('email') ?>" name="email" type="text" class="auth-form__input" placeholder="Email" />
                            <?php echo form_error('email') ?>
                        </div>
                        <div class="auth-form__group">
                            <input value="<?php echo set_value('password') ?>" name="password" type="password" class="auth-form__input" placeholder="Mật khẩu" />
                            <?php echo form_error('password') ?>
                        </div>
                        <div class="auth-form__group">
                            <input name="enter_password" type="password" class="auth-form__input" placeholder="Nhập lại mật khẩu" />
                            <?php echo form_error('enter_password') ?>
                        </div>
                        <div class="auth-form__group">
                            <span style="font-size: 14px;">Chọn ảnh đại diện:</span>
                            <input type="file" name="myfile">
                            <?php echo form_error('type') ?>
                            <?php echo form_error('file_size') ?>
                        </div>
                    </div>

                    <div class="auth-form__aside">
                        <p class="auth-form__policy-text">
                            Bằng việc đăng kí, bạn đã đồng ý với F8-Shop về
                            <a href="" class="auth-form__text-link">Điều khoản dịch vụ</a> &
                            <a href="" class="auth-form__text-link">Chính sách bảo mật</a>
                        </p>
                    </div>
                    <div class="auth-form__group">
                        <?php echo form_error('account') ?>
                    </div>
                    <div class="auth-form__controls">
                        <a href="?" class="btn btn--normal">TRỞ LẠI</a>
                        <input type="submit" value="ĐĂNG KÝ" name="register" class="btn btn--primary btn--submit">
                    </div>
                </form>
            </div>

            <div class="auth-form__socials">
                <a href="" class="auth-form__socials--facebook btn btn--size-s btn--width-icon">
                    <i class="auth-form__socials-icon fab fa-facebook-square"></i>
                    <span class="auth-form__socials-title">Kết nối với Facebook</span>
                </a>
                <a href="" class="auth-form__socials--google btn btn--size-s btn--width-icon">
                    <i class="auth-form__socials-icon fab fa-google"></i>
                    <span class="auth-form__socials-title">Kết nối với Google</span>
                </a>
            </div>
        </div>
    </div>
</div>