<?php
require_once 'pdo.php';

function binh_luan_insert($id_kh, $id_san_pham, $noi_dung, $ngay_bl)
{
    $sql = "INSERT INTO binh_luan(id_kh, id_san_pham, noi_dung, ngay_bl) VALUES (?,?,?,?)";
    pdo_execute($sql, $id_kh, $id_san_pham, $noi_dung, $ngay_bl);
}

function binh_luan_update($id_binh_luan, $id_kh, $id_san_pham, $noi_dung, $ngay_bl)
{
    $sql = "UPDATE binh_luan SET id_kh=?,id_san_pham=?,noi_dung=?,ngay_bl=? WHERE id_binh_luan=?";
    pdo_execute($sql, $id_kh, $id_san_pham, $noi_dung, $ngay_bl, $id_binh_luan);
}

function binh_luan_delete($id_binh_luan)
{
    $sql = "DELETE FROM binh_luan WHERE id_binh_luan=?";
    if (is_array($id_binh_luan)) {
        foreach ($id_binh_luan as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $id_binh_luan);
    }
}
function binh_luan_select_thong_ke_all()
{
    $sql = "SELECT binh_luan.id_san_pham, hang_hoa.ten_hh, SUM(1) AS 'tong_binh_luan', MIN(`ngay_bl`) AS 'moi_nhat', MAX(`ngay_bl`) AS 'cu_nhat' FROM binh_luan JOIN hang_hoa ON binh_luan.id_san_pham = hang_hoa.id_san_pham GROUP BY binh_luan.id_san_pham, hang_hoa.ten_hh";
    return pdo_query($sql);
}
function binh_luan_select_all()
{
    $sql = "SELECT * FROM binh_luan ORDER BY ngay_bl DESC";
    return pdo_query($sql);
}
function binh_luan_count_by_id($id_san_pham)
{
    $sql = "SELECT COUNT(*) FROM binh_luan WHERE id_san_pham = ?";
    return pdo_query_count($sql, $id_san_pham);
}
function binh_luan_select_by_id($id_binh_luan)
{
    $sql = "SELECT * FROM binh_luan WHERE id_binh_luan=?";
    return pdo_query_one($sql, $id_binh_luan);
}

function binh_luan_exist($id_binh_luan)
{
    $sql = "SELECT count(*) FROM binh_luan WHERE id_binh_luan=?";
    return pdo_query_value($sql, $id_binh_luan) > 0;
}
//-------------------------------//
function binh_luan_select_by_hang_hoa($id_san_pham)
{
    $sql = "SELECT * FROM binh_luan JOIN khach_hang ON khach_hang.id_kh = binh_luan.id_kh WHERE id_san_pham = ? ORDER BY ngay_bl DESC ";
    return pdo_query($sql, $id_san_pham);
}