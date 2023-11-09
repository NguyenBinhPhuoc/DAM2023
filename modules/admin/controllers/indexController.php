<?php

function construct()
{
    load('helper', 'url');
    load('helper', 'format');
    load('lib', 'validation');
    load_model('index');
    if (!(isset($_SESSION['is_login']) && (($_SESSION['role'] === 'admin') || ($_SESSION['role'] === 'editor')))) {
        redirect();
    }
}

function indexAction()
{
    load_view('index');
}

function addCategoryAction()
{
    global $name, $error, $success;
    $list_cat = get_list_cat();
    foreach ($list_cat as $item) {
        $category[$item['id']] = $item['name'];
    }
    $data['category'] = $category;
    $data['list_cat'] = $list_cat;
    if (isset($_POST['btn'])) {
        $error = array();
        $success = array();
        if (empty($_POST['name'])) {
            $error['name'] = "Không được để trống danh mục";
        } else {
            $name = $_POST['name'];
        }

        if (empty($error)) {
            $data_cate = array(
                'name' => $name
            );
            $add_cate = add_category($data_cate);
            if ($add_cate) {
                $success['add_cate'] = "Thêm danh mục thành công";
            } else {
                $error['add_cate'] = "Thêm danh mục thất bại";
            }
        }
    }
    load_view('category', $data);
}

function showProductsAction()
{
    $list_products = get_list_product();
    $list_cat = get_list_cat();
    foreach ($list_cat as $item) {
        $category[$item['id']] = $item['name'];
    }
    $data['category'] = $category;
    $data['list_product'] = $list_products;
    load_view('products', $data);
}

function addProductAction()
{
    global $name_product, $price, $price_sale, $category, $description, $detail, $error, $success;
    $list_cat = get_list_cat();
    foreach ($list_cat as $item) {
        $category_get_name[$item['id']] = $item['name'];
    }
    $data['category_get_name'] = $category_get_name;
    $data['list_cat'] = $list_cat;
    if (isset($_POST['add_product'])) {
        $error = array();
        $success = array();
        $upload_dir = "public/uploads/";
        $description = $_POST['description'];
        $detail = $_POST['detail'];
        // Check name product
        if (empty($_POST['name_product'])) {
            $error['name_product'] = 'Không để trống tên sản phẩm!';
        } else {
            if (!(strlen($_POST['name_product']) >= 1 && strlen($_POST['name_product']) <= 255)) {
                $error['name_product'] = 'Tên sản phẩm quá dài!';
            } else {
                $name_product = $_POST['name_product'];
            }
        }
        // Check price
        if (empty($_POST['price'])) {
            $error['price'] = 'Không để trống giá sản phẩm!';
        } else {
            if (!is_numeric($_POST['price'])) {
                $error['price'] = 'Giá vui lòng nhập số!';
            } else {
                $price = $_POST['price'];
            }
        }
        //check price sale
        if (empty($_POST['price_sale'])) {
            $error['price_sale'] = 'Không để trống giá sản phẩm!';
        } else {
            if (!is_numeric($_POST['price_sale'])) {
                $error['price_sale'] = 'Giá vui lòng nhập số!';
            } else {
                $price_sale = $_POST['price_sale'];
            }
        }
        // Check category
        if ($_POST['category'] == '') {
            $error['category'] = 'Không để trống danh mục sản phẩm!';
        } else {
            $category = $_POST['category'];
        }
        //Check image
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
            $data_product = array(
                'title' => $name_product,
                'description' => $description,
                'price' => $price,
                'price_sale' => $price_sale,
                'images' => $upload_file,
                'detail' => $detail,
                'cate_id' => $category,
            );
            move_uploaded_file($_FILES['myfile']['tmp_name'], $upload_file);
            $add_product = add_product($data_product);
            if ($add_product) {
                $success['add_product'] = "Thêm sản phẩm thành công";
            } else {
                $error['add_product'] = "Thêm sản phẩm thất bại";
            }
        }
    }
    load_view('addProduct', $data);
}

function updateProductAction()
{
    global $name_product, $price, $price_sale, $category, $description, $detail, $error, $success;
    $id = (int)$_GET['id'];
    $list_cat = get_list_cat();
    $item = get_product_by_id($id);
    $name_product = $item['title'];
    $price = $item['price'];
    $price_sale = $item['price_sale'];
    $image = $item['images'];
    $category = $item['cate_id'];
    $description = $item['description'];
    $detail = $item['detail'];
    foreach ($list_cat as $item) {
        $category_get_name[$item['id']] = $item['name'];
    }
    $data['image'] = $image;
    $data['category_get_name'] = $category_get_name;
    $data['list_cat'] = $list_cat;
    if (isset($_POST['add_product'])) {
        $error = array();
        $success = array();
        $upload_dir = "public/uploads/";
        $description = $_POST['description'];
        $detail = $_POST['detail'];
        // Check name product
        if (empty($_POST['name_product'])) {
            $error['name_product'] = 'Không để trống tên sản phẩm!';
        } else {
            if (!(strlen($_POST['name_product']) >= 1 && strlen($_POST['name_product']) <= 255)) {
                $error['name_product'] = 'Tên sản phẩm quá dài!';
            } else {
                $name_product = $_POST['name_product'];
            }
        }
        // Check price
        if (empty($_POST['price'])) {
            $error['price'] = 'Không để trống giá sản phẩm!';
        } else {
            if (!is_numeric($_POST['price'])) {
                $error['price'] = 'Giá vui lòng nhập số!';
            } else {
                $price = $_POST['price'];
            }
        }
        //check price sale
        if (empty($_POST['price_sale'])) {
            $error['price_sale'] = 'Không để trống giá sản phẩm!';
        } else {
            if (!is_numeric($_POST['price_sale'])) {
                $error['price_sale'] = 'Giá vui lòng nhập số!';
            } else {
                $price_sale = $_POST['price_sale'];
            }
        }
        // Check category
        if ($_POST['category'] == '') {
            $error['category'] = 'Không để trống danh mục sản phẩm!';
        } else {
            $category = $_POST['category'];
        }
        //Check image
        $upload_file = $upload_dir . basename($_FILES['myfile']['name']);
        #Xử lý upload đúng file ảnh
        $type_allow = array('png', 'jpg', 'gif', 'jpeg', '');
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
            if ($upload_file == $upload_dir) {
                $upload_file = $image;
            } else {
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
                move_uploaded_file($_FILES['myfile']['tmp_name'], $upload_file);
            }
            $data_product = array(
                'title' => $name_product,
                'description' => $description,
                'price' => $price,
                'price_sale' => $price_sale,
                'images' => $upload_file,
                'detail' => $detail,
                'cate_id' => $category,
            );
            $update_product = update_product($data_product, $id);
            if ($update_product) {
                $success['add_product'] = "Sửa sản phẩm thành công";
            } else {
                $error['add_product'] = "Sửa sản phẩm thất bại";
            }
        }
    }
    load_view('updateProduct', $data);
}

function deleteProductAction()
{
    $id = (int)$_GET['id'];
    delete_product_by_id($id);
    redirect("?mod=admin&action=showProducts");
}

//========================
// USERS
//========================

function showUsersAction()
{
    $list_user = get_list_user();
    $data['list_user'] = $list_user;
    load_view('users', $data);
}

function addUserAction()
{
    global $error, $full_name, $name_login, $password, $email, $success;
    $email = null;
    if (isset($_POST['register'])) {
        $upload_dir = "public/uploads/avartar/";
        $error = array();
        $success = array();
        $role = $_POST['role'];
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
                    'role' => $role,
                );
                move_uploaded_file($_FILES['myfile']['tmp_name'], $upload_file);
                $add_user = add_user($data);
                if ($add_user) {
                    $success['add_user'] = "Thêm người dùng thành công";
                } else {
                    $error['add_user'] = "Thêm người dùng thất bại";
                }
            } else {
                $error['account'] = "Email hoặc username đã tồn tại trên hệ thống!";
            }
        }
    }
    load_view('addUser');
}

function updateUserAction()
{
    global $error, $full_name, $name_login, $password, $email, $role, $success;
    $email = null;
    $id = (int)$_GET['id'];
    $item = get_user_by_id($id);
    $full_name = $item['fullname'];
    $name_login = $item['username'];
    $email = $item['email'];
    $avartar = $item['avartar'];
    $role = $item['role'];
    $data['avartar'] = $avartar;
    if (isset($_POST['register'])) {
        $upload_dir = "public/uploads/avartar/";
        $error = array();
        $success = array();
        $role = $_POST['role'];
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
        $type_allow = array('png', 'jpg', 'gif', 'jpeg', '');
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
            if ((user_exist_email($email) && ($_POST['email'] != $item['email'])) || (user_exist_username($name_login) && ($_POST['name_login'] != $item['username']))) {
                $error['account'] = "Email hoặc username đã tồn tại trên hệ thống!";
            } else {
                if ($upload_file == $upload_dir) {
                    $upload_file = $avartar;
                } else {
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
                    move_uploaded_file($_FILES['myfile']['tmp_name'], $upload_file);
                }
                $data_user = array(
                    'username' => $name_login,
                    'password' => md5($password),
                    'email' => $email,
                    'avartar' => $upload_file,
                    'fullname' => $full_name,
                    'role' => $role,
                );
                $update_user = update_user($data_user, $id);
                if ($update_user) {
                    $success['update_user'] = "Chỉnh sửa người dùng thành công";
                } else {
                    $error['update_user'] = "Chỉnh sửa người dùng thất bại";
                }
            }
        }
    }
    load_view('updateUser', $data);
}

function deleteUserAction()
{
    $id = (int)$_GET['id'];
    delete_user_by_id($id);
    redirect("?mod=admin&action=showUsers");
}
