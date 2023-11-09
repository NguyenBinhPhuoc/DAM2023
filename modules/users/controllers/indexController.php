<?php

function construct()
{
    load('helper', 'url');
    load('lib', 'validation');
    load_model('index');
}

function regAction()
{
    global $error, $full_name, $name_login, $password, $email;
    $email = null;
    if (isset($_POST['register'])) {
        $upload_dir = "public/uploads/avartar/";
        $error = array();
        //check họ và tên
        if (empty($_POST['full_name'])) {
            $error['full_name'] = 'Không để trống họ và tên!';
        } else {
            if (!(strlen($_POST['full_name']) >= 6 && strlen($_POST['full_name']) <= 32)) {
                $error['full_name'] = 'Họ và tên yêu cầu từ 6 đến 32 ký tự.';
            } else {
                $full_name = $_POST['full_name'];
            }
        }
        // check tên đăng nhập
        if (empty($_POST['name_login'])) {
            $error['name_login'] = 'Không để trống tên đăng nhập!';
        } else {
            if (!(strlen($_POST['name_login']) >= 6 && strlen($_POST['name_login']) <= 32)) {
                $error['name_login'] = 'Tên đăng nhập yêu cầu từ 6 đến 32 ký tự.';
            } else {
                if (!is_username($_POST['name_login'])) {
                    $error['name_login'] = 'Tên đăng nhập cho phép sử dụng ký tự, chữ số, dấu chấm, dấu gạch dưới, từ 6 đến 32 ký tự.';
                } else {
                    $name_login = $_POST['name_login'];
                }
            }
        }
        //check mail
        if (empty($_POST['email'])) {
            $error['email'] = 'Không để trống tên email!';
        } else {
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $error['email'] = 'Vui lòng nhập đúng định dạng email.<br>Ví dụ: example@gmail.com';
            } else {
                $email = $_POST['email'];
            }
        }
        //check password
        if (empty($_POST['password'])) {
            $error['password'] = 'Vui lòng không để trống password đăng nhập!';
        } else {
            if (!(strlen($_POST['password']) >= 6 && strlen($_POST['password']) <= 32)) {
                $error['password'] = 'Password yêu cầu từ 6 đến 32 ký tự.';
            } else {
                if (!is_password($_POST['password'])) {
                    $error['password'] = 'Password cho phép sử dụng chữ cái, chữ số, ký tự đặt biệt,có 1 ký tự viết hoa và có từ 6 đến 32 ký tự.';
                } else {
                    $password = $_POST['password'];
                }
            }
        }
        // check enter_password
        if ($_POST['enter_password'] !== $_POST['password']) {
            $error['enter_password'] = 'Nhập lại mật khẩu không trùng khớp!';
        } else {
            $enter_password = $_POST['enter_password'];
        }
        // check ảnh đại diện.
        $upload_file = $upload_dir . basename($_FILES['myfile']['name']);
        #Xử lý upload đúng file ảnh
        $type_allow = array('png', 'jpg', 'gif', 'jpeg');
        $type = pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION);
        if (!in_array(strtolower($type), $type_allow)) {
            $error['type'] = "Chỉ được upload file có đuôi png, jpg, gif, jpeg";
        } else {
            #Upload file có kích thước nhỏ hơn 20MB ~ 20 971 520 byte
            $file_size = $_FILES['myfile']['size'];
            if ($file_size > 20971520) {
                $error['file_size'] = "Chỉ được upload file bé hơn 20 MB";
            }
        }
        if (empty($error)) {
            if (!user_exist($name_login, $email)) {
                if (file_exists($upload_file)) {
                    //========================
                    //Xử lý đổi tên File tự động
                    //========================
                    #Tạo file mới
                    //Tên file.Đuôi file
                    $file_name = pathinfo($_FILES['myfile']['name'], PATHINFO_FILENAME); // Lấy tên file
                    $new_file_name = $file_name . ' - Copy.';
                    #Tạo đường dẫn mới
                    $new_upload_file = $upload_dir . $new_file_name . $type;
                    $k = 1;
                    while (file_exists($new_upload_file)) {
                        $new_file_name = $file_name . " - Copy({$k}).";
                        $k++;
                        $new_upload_file = $upload_dir . $new_file_name . $type;
                    }
                    $upload_file = $new_upload_file;
                }
                $data = array(
                    'username' => $name_login,
                    'password' => md5($password),
                    'email' => $email,
                    'avartar' => $upload_file,
                    'fullname' => $full_name,
                );
                move_uploaded_file($_FILES['myfile']['tmp_name'], $upload_file);
                add_user($data);
                redirect('?mod=users&action=login');
            } else {
                $error['account'] = "Email hoặc username đã tồn tại trên hệ thống!";
            }
        }
    }
    load_view('reg');
}

function loginAction()
{
    global $error, $username, $password;
    if (isset($_POST['login'])) {
        $error = array();
        if (empty($_POST['username'])) {
            $error['username'] = 'Không để trống username đăng nhập!';
        } else {
            if (!(strlen($_POST['username']) >= 6 && strlen($_POST['username']) <= 32)) {
                $error['username'] = 'Username yêu cầu từ 6 đến 32 ký tự.';
            } else {
                if (!is_username($_POST['username'])) {
                    $error['username'] = 'Username cho phép sử dụng ký tự, chữ số, dấu chấm, dấu gạch dưới, từ 6 đến 32 ký tự.';
                } else {
                    $username = $_POST['username'];
                }
            }
        }
        if (empty($_POST['password'])) {
            $error['password'] = 'Vui lòng không để trống password đăng nhập!';
        } else {
            if (!(strlen($_POST['password']) >= 6 && strlen($_POST['password']) <= 32)) {
                $error['password'] = 'Password yêu cầu từ 6 đến 32 ký tự.';
            } else {
                if (!is_password($_POST['password'])) {
                    $error['password'] = 'Password cho phép sử dụng chữ cái, chữ số, ký tự đặt biệt, phải bắt đầu bằng 1 ký tự viết hoa và có từ 6 đến 32 ký tự.';
                } else {
                    $password = $_POST['password'];
                }
            }
        }

        if (empty($error)) {
            if (check_login($username, md5($password))) {
                $_SESSION['is_login'] = true;
                $_SESSION['user_login'] = $username;
                $_SESSION['fullname'] = info_user('fullname');
                $_SESSION['avartar'] = info_user('avartar');
                $_SESSION['role'] = info_user('role');
                if ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'editer') {
                    redirect('?mod=admin');
                } else {
                    redirect();
                }
            } else {
                $error['account'] = "Tên đăng nhập hoặc mật khẩu không tồn tại";
            }
        }
    }
    load_view('login');
}


function logoutAction()
{
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    unset($_SESSION['fullname']);
    unset($_SESSION['avartar']);
    unset($_SESSION['role']);
    unset($_SESSION['cart']);
    redirect('');
}
