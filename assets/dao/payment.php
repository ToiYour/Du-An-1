<?php
include_once 'pdo.php';
function payment_insert($id_don_hang, $amount, $payment_method, $payment_status)
{
    $sql = "INSERT INTO payment(id_don_hang, amount, payment_method, payment_status) VALUES (?,?,?,?)";
    pdo_execute($sql, $id_don_hang, $amount, $payment_method, $payment_status);
}
