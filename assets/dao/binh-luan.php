<?php
require_once 'pdo.php';

function binh_luan_insert($ma_kh, $ma_hh, $noi_dung, $ngay_bl)
{
    $sql = "INSERT INTO binh_luan(ma_kh, ma_hh, noi_dung, ngay_bl) VALUES (?,?,?,?)";
    pdo_execute($sql, $ma_kh, $ma_hh, $noi_dung, $ngay_bl);
}

function binh_luan_update($ma_bl, $ma_kh, $ma_hh, $noi_dung, $ngay_bl)
{
    $sql = "UPDATE binh_luan SET ma_kh=?,ma_hh=?,noi_dung=?,ngay_bl=? WHERE ma_bl=?";
    pdo_execute($sql, $ma_kh, $ma_hh, $noi_dung, $ngay_bl, $ma_bl);
}

function binh_luan_delete($ma_bl)
{
    $sql = "DELETE FROM binh_luan WHERE ma_bl=?";
    if (is_array($ma_bl)) {
        foreach ($ma_bl as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $ma_bl);
    }
}
function binh_luan_select_thong_ke_all()
{
    $sql = "SELECT binh_luan.ma_hh, hang_hoa.ten_hh, SUM(1) AS 'tong_binh_luan', MIN(`ngay_bl`) AS 'moi_nhat', MAX(`ngay_bl`) AS 'cu_nhat' FROM binh_luan JOIN hang_hoa ON binh_luan.ma_hh = hang_hoa.ma_hh GROUP BY binh_luan.ma_hh, hang_hoa.ten_hh";
    return pdo_query($sql);
}
function binh_luan_select_all()
{
    $sql = "SELECT * FROM binh_luan ORDER BY ngay_bl DESC";
    return pdo_query($sql);
}
function binh_luan_count_by_id($ma_hh)
{
    $sql = "SELECT COUNT(*) FROM binh_luan WHERE ma_hh = ?";
    return pdo_query_count($sql, $ma_hh);
}
function binh_luan_select_by_id($ma_bl)
{
    $sql = "SELECT * FROM binh_luan WHERE ma_bl=?";
    return pdo_query_one($sql, $ma_bl);
}

function binh_luan_exist($ma_bl)
{
    $sql = "SELECT count(*) FROM binh_luan WHERE ma_bl=?";
    return pdo_query_value($sql, $ma_bl) > 0;
}
//-------------------------------//
function binh_luan_select_by_hang_hoa($ma_hh)
{
    $sql = "SELECT * FROM binh_luan JOIN khach_hang ON khach_hang.ma_kh = binh_luan.ma_kh WHERE ma_hh = ? ORDER BY ngay_bl DESC ";
    return pdo_query($sql, $ma_hh);
}