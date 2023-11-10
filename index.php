<?php
session_start();
ob_start();
include_once 'assets/dao/pdo.php';
include_once 'assets/dao/khach-hang.php';
include_once 'assets/dao/toast-message.php';
include_once 'view/header.php';
if (isset($_GET['act']) && $_GET['act']) {
    $act = $_GET['act'];
    switch ($act) {
            // Quản lý user
        case 'login':
            if (isset($_POST['login']) && $_POST['login']) {
                $arr_login = [
                    'ho_ten' => $_POST['user-name'],
                    'password' => $_POST['user-password'],
                ];
                foreach ($arr_login as $key => $value) {
                    if (empty($value)) {
                        $error_login["$key"] = 'Trường dữ liệu không được bỏ trống';
                    }
                }
                if (empty($error_login)) {
                    user_login($arr_login['ho_ten'], $arr_login['password']);
                }
            }
            include_once 'view/trang-chu/login-register.php';
            break;
        case 'register':
            if (isset($_POST['register']) && $_POST['register']) {
                $arr_register = [
                    'ho_ten' => $_POST['ho_ten'],
                    'user-name' => $_POST['user-name'],
                    'user-password' => $_POST['user-password'],
                    'user-email' => $_POST['user-email']
                ];
                foreach ($arr_register as $key => $value) {
                    if (empty($value)) {
                        $error_register["$key"] = 'Trường dữ liệu không được bỏ trống';
                    }
                }
                if (empty($error_register)) {
                    user_insert($arr_register['ho_ten'], $arr_register['user-name'], $arr_register['user-password'], $arr_register['user-email'], 1);
                }
            }
            include_once 'view/trang-chu/login-register.php';
            break;
        case 'setting-user':
            if (isset($_POST['change-user']) && $_POST['change-user']) {
                $login = user_select_by_id($_SESSION['login']['id_kh']);
                $arr_change_user = [
                    'ho_ten' => $_POST['ho_ten'],
                    'ten_dang_nhap' => $_POST['ten_dang_nhap'],
                    'mat_khau' => $_POST['mat_khau'],
                    'email' => $_POST['email'],
                    'phone' => $_POST['phone'],
                    'dia_chi' => $_POST['dia_chi'],
                    'id_kh' => $_POST['id_kh']
                ];
                if ($_FILES['hinh_anh']['size'] <= 0) {
                    $arr_change_user['hinh_anh']['name'] = $login['hinh_anh'];
                } else {
                    $arr_change_user['hinh_anh']['name'] = $_FILES['hinh_anh']['name'];
                    $path_file = 'assets/images/avatar/' . $_FILES['hinh_anh']['name'];
                    move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $path_file);
                }
                foreach ($arr_change_user as $key => $value) {
                    if (empty($value)) {
                        $error_change_user["$key"] = 'Trường dữ liệu không được bỏ trống';
                    }
                }
                if (empty($error_change_user)) {
                    user_update($arr_change_user['id_kh'], $arr_change_user['ho_ten'], $arr_change_user['ten_dang_nhap'], $arr_change_user['mat_khau'], $arr_change_user['email'], $arr_change_user['phone'], $arr_change_user['hinh_anh']['name'], $arr_change_user['dia_chi']);
                    showSuccessToast('Cập nhập thông tin tài khoản thành công!');
                    header('location: index.php?act=setting-user');
                } else {
                    showErrorToast('Bạn phải điền đẩy đủ thông tin!');
                }
            } else
                include_once 'view/trang-chu/quan-ly-user.php';
            break;
        case 'logout':
            user_logout();
            header('location: index.php');
            break;
            // Quản lý user end
    }
} else {
    include_once 'view/trang-chu/home.php';
}
include_once 'view/footer.php';
ob_end_flush();
