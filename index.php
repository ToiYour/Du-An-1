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
                    $login = user_login($arr_login['ho_ten'], $arr_login['password']);
                    header('location: index.php');
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
                    user_insert($arr_register['ho_ten'], $arr_register['user-name'], $arr_register['user-password'], $arr_register['user-email'], 0);
                }
            }
            include_once 'view/trang-chu/login-register.php';
            break;
        case 'logout':
            user_logout();
            header('location: index.php');
            break;
    }
} else {
    include_once 'view/trang-chu/home.php';
}
include_once 'view/footer.php';
ob_end_flush();
