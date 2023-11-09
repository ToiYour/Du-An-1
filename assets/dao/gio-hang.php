<?php
require_once 'pdo.php';

function gio_hang_insert($id_kh, $id_san_pham, $so_luong)
{
    $sql = "INSERT INTO gio_hang(id_kh, id_san_pham, so_luong) VALUES (?, ?, ?)";
    pdo_execute($sql, $id_kh, $id_san_pham, $so_luong);
}
function gio_hang_select_all()
{
    $sql = "SELECT * FROM gio_hang JOIN san_pham ON gio_hang.id_san_pham = san_pham.id_san_pham";
    return pdo_query($sql);
}
function  gio_hang_select_by_id($id_san_pham)
{
    $sql = "SELECT * FROM gio_hang WHERE id_san_pham=?";
    return pdo_query_one($sql, $id_san_pham);
}
function  gio_hang_delete($id)
{
    $sql = "DELETE FROM `gio_hang` WHERE id=?";
    return pdo_execute($sql, $id);
}
function gio_hang_sum_by_id_kh($id_kh)
{
    $sql = "SELECT SUM(gio_hang.so_luong*san_pham.don_gia) AS tong_gia FROM gio_hang JOIN san_pham ON gio_hang.id_san_pham = san_pham.id_san_pham WHERE gio_hang.id_kh = 'ht03';";
    return pdo_query_value($sql);
}
function gio_hang_select_count_sum_by_id_kh($id_kh)
{
    $sql = "SELECT SUM(so_luong) FROM gio_hang WHERE id_kh = ?";
    return pdo_query_value($sql, $id_kh);
}
function gio_hang_exist($id_san_pham)
{
    $sql = "SELECT count(*) FROM gio_hang WHERE id_san_pham=?";
    return pdo_query_value($sql, $id_san_pham) > 0;
}
function gio_hang_update_so_luong($so_luong, $id_san_pham)
{
    $sql = "UPDATE gio_hang SET so_luong=? WHERE id_san_pham=?";
    pdo_execute($sql, $so_luong, $id_san_pham);
}
