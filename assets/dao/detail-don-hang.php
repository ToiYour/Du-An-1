<?php
include_once 'pdo.php';
include_once 'gio-hang.php';
function detail_order_insert_by_khach_hang($id_kh, $id_don_hang)
{
    $tmp  = "SELECT id_chi_tiet_san_pham,so_luong FROM gio_hang WHERE id_kh = ?";
    $result = pdo_query($tmp, $id_kh);
    $sql = "INSERT INTO chi_tiet_don_hang(id_don_hang, id_chi_tiet_san_pham, so_luong) VALUES (?,?,?)";
    if (is_array($result)) {
        foreach ($result as $value) {
            pdo_execute($sql, $id_don_hang,  $value['id_chi_tiet_san_pham'], $value['so_luong']);
            detail_san_pham_update_soLuong($value['id_chi_tiet_san_pham'], $value['so_luong']);
        }
    }
    $del_gio_hang = "DELETE FROM gio_hang WHERE id_kh = ?";
    pdo_execute($del_gio_hang, $id_kh);
}
