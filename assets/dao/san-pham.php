<?php
require_once 'pdo.php';

function hang_hoa_insert($ten_san_pham, $don_gia, $giam_gia, $hinh_anh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta)
{
    $sql = "INSERT INTO hang_hoa(ten_san_pham, don_gia, giam_gia, hinh_anh, ma_loai, dac_biet, so_luot_xem, ngay_nhap, mo_ta) VALUES (?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql, $ten_san_pham, $don_gia, $giam_gia, $hinh_anh, $ma_loai, $dac_biet == 1, $so_luot_xem, $ngay_nhap, $mo_ta);
}

function hang_hoa_update($ma_hh, $ten_san_pham, $don_gia, $giam_gia, $hinh_anh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta)
{
    $sql = "UPDATE hang_hoa SET ten_san_pham=?,don_gia=?,giam_gia=?,hinh_anh=?,ma_loai=?,dac_biet=?,so_luot_xem=?,ngay_nhap=?,mo_ta=? WHERE ma_hh=?";
    pdo_execute($sql, $ten_san_pham, $don_gia, $giam_gia, $hinh_anh, $ma_loai, $dac_biet == 1, $so_luot_xem, $ngay_nhap, $mo_ta, $ma_hh);
}

function hang_hoa_delete($ma_hh)
{
    $sql = "DELETE FROM hang_hoa WHERE  ma_hh=?";
    if (is_array($ma_hh)) {
        foreach ($ma_hh as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $ma_hh);
    }
}

function hang_hoa_select_all()
{
    $sql = "SELECT * FROM hang_hoa";
    return pdo_query($sql);
}

function hang_hoa_select_by_id($ma_hh)
{
    $sql = "SELECT * FROM hang_hoa WHERE ma_hh=?";
    return pdo_query_one($sql, $ma_hh);
}

function hang_hoa_exist($ma_hh)
{
    $sql = "SELECT count(*) FROM hang_hoa WHERE ma_hh=?";
    return pdo_query_value($sql, $ma_hh) > 0;
}
function hang_hoa_count()
{
    $sql = "SELECT count(*) FROM hang_hoa ";
    return pdo_query_count($sql);
}
function hang_hoa_count_by_ma_hh($ma_loai)
{
    $sql = "SELECT count(*) FROM hang_hoa WHERE ma_loai = ?";
    return pdo_query_count($sql, $ma_loai);
}
function hang_hoa_tang_so_luot_xem($ma_hh)
{
    $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh=?";
    pdo_execute($sql, $ma_hh);
}
function hang_hoa_select_top_table($start, $end, $table)
{
    $sql = "SELECT * FROM hang_hoa ORDER BY $table  LIMIT $start, $end";
    return pdo_query($sql);
}
function hang_hoa_select_top_table_by_loai($start, $end, $table, $ma_loai)
{
    $sql = "SELECT * FROM hang_hoa WHERE ma_loai = ? ORDER BY $table  LIMIT $start, $end";
    return pdo_query($sql, $ma_loai);
}
function hang_hoa_select_don_gia($min, $max)
{
    $sql = "SELECT * FROM `hang_hoa` WHERE `don_gia` BETWEEN ? AND ?;";
    return pdo_query($sql, $min, $max);
}
function hang_hoa_select_top10()
{
    $sql = "SELECT * FROM hang_hoa WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 10";
    return pdo_query($sql);
}
function hang_hoa_select_top1()
{
    $sql = "SELECT * FROM hang_hoa  ORDER BY giam_gia DESC LIMIT 1";
    return pdo_query_one($sql);
}
function hang_hoa_select_dac_biet()
{
    $sql = "SELECT * FROM hang_hoa WHERE dac_biet=1";
    return pdo_query($sql);
}

function hang_hoa_select_by_loai($ma_loai)
{
    $sql = "SELECT * FROM hang_hoa WHERE ma_loai=?";
    return pdo_query($sql, $ma_loai);
}

function hang_hoa_select_keyword($keyword)
{
    $sql = "SELECT * FROM hang_hoa " . " JOIN loai_hang  ON loai_hang.ma_loai=hang_hoa.ma_loai " . " WHERE ten_san_pham LIKE ? OR ten_loai LIKE ?";
    return pdo_query($sql, '%' . $keyword . '%', '%' . $keyword . '%');
}

function hang_hoa_select_page()
{
    if (!isset($_SESSION['page_no'])) {
        $_SESSION['page_no'] = 0;
    }
    if (!isset($_SESSION['page_count'])) {
        $row_count = pdo_query_value("SELECT count(*) FROM hang_hoa");
        $_SESSION['page_count'] = ceil($row_count / 10.0);
    }
    if (exist_param("page_no")) {
        $_SESSION['page_no'] = $_REQUEST['page_no'];
    }
    if ($_SESSION['page_no'] < 0) {
        $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
    }
    if ($_SESSION['page_no'] >= $_SESSION['page_count']) {
        $_SESSION['page_no'] = 0;
    }
    $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh LIMIT " . $_SESSION['page_no'] . ", 10";
    return pdo_query($sql);
}
