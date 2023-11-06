<?php
require_once 'pdo.php';

function gio_hang_insert($ma_kh, $ma_hh, $so_luong)
{
    $sql = "INSERT INTO gio_hang(ma_kh, ma_hh, so_luong) VALUES (?, ?, ?)";
    pdo_execute($sql, $ma_kh, $ma_hh, $so_luong);
}
function gio_hang_select_all()
{
    $sql = "SELECT * FROM gio_hang JOIN hang_hoa ON gio_hang.ma_hh = hang_hoa.ma_hh";
    return pdo_query($sql);
}
function  gio_hang_select_by_id($ma_hh)
{
    $sql = "SELECT * FROM gio_hang WHERE ma_hh=?";
    return pdo_query_one($sql, $ma_hh);
}
function  gio_hang_delete($id)
{
    $sql = "DELETE FROM `gio_hang` WHERE id=?";
    return pdo_execute($sql, $id);
}
function gio_hang_sum_by_ma_kh($ma_kh)
{
    $sql = "SELECT SUM(gio_hang.so_luong*hang_hoa.don_gia) AS tong_gia FROM gio_hang JOIN hang_hoa ON gio_hang.ma_hh = hang_hoa.ma_hh WHERE gio_hang.ma_kh = 'ht03';";
    return pdo_query_value($sql);
}
function gio_hang_select_count_sum_by_ma_kh($ma_kh)
{
    $sql = "SELECT SUM(so_luong) FROM gio_hang WHERE ma_kh = ?";
    return pdo_query_value($sql, $ma_kh);
}
function gio_hang_exist($ma_hh)
{
    $sql = "SELECT count(*) FROM gio_hang WHERE ma_hh=?";
    return pdo_query_value($sql, $ma_hh) > 0;
}
function gio_hang_update_so_luong($so_luong, $ma_hh)
{
    $sql = "UPDATE gio_hang SET so_luong=? WHERE ma_hh=?";
    pdo_execute($sql, $so_luong, $ma_hh);
}
