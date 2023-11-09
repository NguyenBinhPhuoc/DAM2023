<!-- Login form -->
<link rel="stylesheet" href="public/css/main.css">
<link rel="stylesheet" href="public/css/base.css">
<link rel="stylesheet" href="public/fonts/fontawesome-free-5.15.4-web/css/all.min.css" />

<div class="modal" style="display:flex">
    <div class="modal__overlay active"></div>
    <div class="modal__body">
        <div class="auth-form active">
            <div class="auth-form__container">
                <div class="auth-form__header">
                    <h3 class="auth-form__heading">Đăng nhập</h3>
                    <a href="?mod=users&action=reg" class="auth-form__switch-btn">Đăng ký</a>
                </div>

                <form action="" method="post">
                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="text" class="auth-form__input" value="<?php echo set_value('username') ?>" name="username" placeholder="Username" />
                            <?php echo form_error('username') ?>
                        </div>
                        <div class="auth-form__group">
                            <input type="password" class="auth-form__input" name="password" placeholder="Password" />
                            <?php echo form_error('password') ?>
                        </div>
                        <div class="auth-form__group">
                            <input type="checkbox" name="remember_me" id="remember_me">
                            <label style="font-size: 14px;padding-left: 2px;
                            font-weight: 700;" for="remember_me">Remember me</label>
                        </div>
                    </div>

                    <div class="auth-form__aside">
                        <div class="auth-form__help">
                            <a href="forgot_password.php" class="auth-form__help-link auth-form__help-link-forgot">Quên mật khẩu</a>
                            <span class="auth-form__help-separate"></span>
                            <a href="" class="auth-form__help-link">Cần trợ giúp?</a>
                        </div>
                    </div>

                    <div class="auth-form__group">
                        <?php echo form_error('account') ?>
                    </div>

                    <div class="auth-form__controls">
                        <a href="?" class="btn btn--normal">TRỞ LẠI</a>
                        <input type="submit" value="ĐĂNG NHẬP" name="login" class="btn btn--primary btn--submit">
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