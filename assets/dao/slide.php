<?php
include_once 'pdo.php';

function slide_insert($bo_suu_tap, $mo_ta, $hinh_anh, $year)
{
    $sql = "INSERT INTO slide(bo_suu_tap, mo_ta, hinh_anh, year) VALUES(?,?,?,?)";
    pdo_execute($sql, $bo_suu_tap, $mo_ta, $hinh_anh);
}

function slide_update($id, $bo_suu_tap, $mo_ta, $hinh_anh, $year)
{
    $sql = "UPDATE slide SET bo_suu_tap = ?, mo_ta = ?, hinh_anh = ?, year = ? WHERE id=?";
    pdo_execute($sql,  $bo_suu_tap, $mo_ta, $hinh_anh, $year, $id);
}

function slide_delete($id)
{
    $sql = "DELETE FROM slide WHERE id=?";
    if (is_array($id)) {
        foreach ($id as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $id);
    }
    return true;
}

function slide_select_all()
{
    $sql = "SELECT * FROM slide";
    return pdo_query($sql);
}

function slide_select_by_id($id)
{
    $sql = "SELECT * FROM slide WHERE id=?";
    return pdo_query_one($sql, $id);
}
