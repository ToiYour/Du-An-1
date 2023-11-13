<?php
require_once 'pdo.php';
include_once 'toast-message.php';
function total_price($id_don_hang)
{
    $sql = "SELECT chi_tiet_don_hang.id_don_hang, SUM(chi_tiet_san_pham.gia_ban * chi_tiet_don_hang.so_luong) AS total_price FROM chi_tiet_don_hang JOIN chi_tiet_san_pham ON chi_tiet_don_hang.id_chi_tiet_san_pham = chi_tiet_san_pham.id_chi_tiet_san_pham WHERE chi_tiet_don_hang.id_don_hang = ? GROUP BY chi_tiet_don_hang.id_don_hang, chi_tiet_san_pham.id_chi_tiet_san_pham";
    $result = pdo_query($sql, $id_don_hang);
    $price = 0;
    foreach ($result as $value) {
        $price += $value['total_price'];
    }
    return number_format($price);
}
function don_hang_select()
{
    $sql = "SELECT * FROM don_hang JOIN user ON don_hang.id_kh = user.id_kh";
    return pdo_query($sql);
}
function don_hang_sum($id_don_hang)
{
    $sql = "SELECT SUM(so_luong) FROM chi_tiet_don_hang WHERE id_don_hang = ?";
    return pdo_query_count($sql, $id_don_hang);
}
function don_hang_detail($id_don_hang)
{
    $sql = "SELECT chi_tiet_don_hang.id_chi_tiet_don_hang,san_pham.ten_san_pham,chi_tiet_don_hang.so_luong,chi_tiet_san_pham.gia_ban,size.kich_thuoc,size.size,mau.mau,SUM(chi_tiet_don_hang.so_luong * chi_tiet_san_pham.gia_ban) AS 'total_price' FROM `chi_tiet_don_hang` JOIN chi_tiet_san_pham ON chi_tiet_don_hang.id_chi_tiet_san_pham = chi_tiet_san_pham.id_chi_tiet_san_pham JOIN size ON chi_tiet_san_pham.id_size = size.id_size JOIN mau ON chi_tiet_san_pham.id_mau = mau.id_mau JOIN san_pham ON chi_tiet_san_pham.id_san_pham = san_pham.id_san_pham WHERE id_don_hang = ? GROUP BY chi_tiet_don_hang.id_chi_tiet_don_hang,san_pham.ten_san_pham,chi_tiet_don_hang.so_luong,chi_tiet_san_pham.gia_ban,size.kich_thuoc,mau.mau;";
    return pdo_query($sql, $id_don_hang);
}
