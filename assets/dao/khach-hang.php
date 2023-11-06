<?php
require_once 'pdo.php';
include_once 'toast-message.php';
function user_insert($ho_ten, $ten_dang_nhap, $mat_khau, $email, $vai_tro)
{
    $sql = "INSERT INTO user(ho_ten, ten_dang_nhap, mat_khau, email, vai_tro) VALUES (?,?,?,?,?)";
    pdo_execute($sql, $ho_ten, $ten_dang_nhap, $mat_khau, $email, $vai_tro);
    showSuccessToast('Bạn đã đăng ký tài khoản thành công!');
}
function user_login($user, $password)
{
    $sql = "SELECT * FROM user WHERE ten_dang_nhap = ?  AND mat_khau = ?";
    $login = pdo_query_one($sql, $user, $password);
    if ($login != false) {
        $_SESSION['login'] = $login;
    }
    return $login;
}
function user_logout()
{
    if (isset($_SESSION['login'])) {
        unset($_SESSION['login']);
    }
}
function user_tim_pass($ten_dang_nhap, $email)
{
    $sql = "SELECT * FROM user WHERE ma_kh = ?  AND email = ?";
    $searchPass = pdo_query_one($sql, $ten_dang_nhap, $email);
    return $searchPass;
}
function user_update($ma_kh,  $ho_ten, $email, $mat_khau, $hinh, $kich_hoat, $vai_tro)
{
    $sql = "UPDATE user SET ho_ten=?,email=?,hinh_anh=?, mat_khau=? kich_hoat=?,vai_tro=? WHERE ma_kh=?";
    pdo_execute($sql,  $ho_ten, $email, $hinh, $mat_khau, $kich_hoat == 1, $vai_tro == 1, $ma_kh);
    return true;
}

function user_delete($ma_kh)
{
    $sql = "DELETE FROM user  WHERE ma_kh=?";
    if (is_array($ma_kh)) {
        foreach ($ma_kh as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $ma_kh);
    }
}

function user_select_all()
{
    $sql = "SELECT * FROM user";
    return pdo_query($sql);
}

function user_select_by_id($ma_kh)
{
    $sql = "SELECT * FROM user WHERE ma_kh=?";
    return pdo_query_one($sql, $ma_kh);
}

function user_exist($ma_kh)
{
    $sql = "SELECT count(*) FROM user WHERE $ma_kh=?";
    return pdo_query_value($sql, $ma_kh) > 0;
}

function user_select_by_role($vai_tro)
{
    $sql = "SELECT * FROM user WHERE vai_tro=?";
    return pdo_query($sql, $vai_tro);
}

function user_change_password($ma_kh, $mat_khau_moi)
{
    $sql = "UPDATE user SET mat_khau=? WHERE ma_kh=?";
    pdo_execute($sql, $mat_khau_moi, $ma_kh);
}
