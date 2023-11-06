<?php
include_once 'pdo.php';
function display_insert($so_san_pham)
{
    $sql = "INSERT INTO giao_dien(so_san_pham) VALUES(?)";
    pdo_execute($sql, $so_san_pham);
}
function display_update($so_san_pham)
{
    $sql = "UPDATE giao_dien SET so_san_pham=?";
    pdo_execute($sql, $so_san_pham);
}
function display_select()
{
    $sql = "SELECT * FROM giao_dien WHERE ?";
    return pdo_query_one($sql, 1);
}
