<?php
require_once 'pdo.php';

function thong_ke_hang_hoa()
{
    $sql = "SELECT loai_hang.ma_loai, loai_hang.ten_loai,"
        . " COUNT(*) so_luong,"
        . " MIN(hang_hoa.don_gia) gia_min,"
        . " MAX(hang_hoa.don_gia) gia_max,"
        . " AVG(hang_hoa.don_gia) gia_avg"
        . " FROM hang_hoa "
        . " JOIN loai_hang ON loai_hang.ma_loai=hang_hoa.ma_loai "
        . " GROUP BY loai_hang.ma_loai, loai_hang.ten_loai";
    return pdo_query($sql);
}

function thong_ke_binh_luan()
{
    $sql = "SELECT hang_hoa.ma_hh, hang_hoa.ten_hh,"
        . " COUNT(*) so_luong,"
        . " MIN(binh_luan.ngay_bl) cu_nhat,"
        . " MAX(binh_luan.ngay_bl) moi_nhat"
        . " FROM binh_luan  "
        . " JOIN hang_hoa  ON hang_hoa.ma_hh=binh_luan.ma_hh "
        . " GROUP BY hang_hoa.ma_hh, hang_hoa.ten_hh"
        . " HAVING so_luong > 0";
    return pdo_query($sql);
}
