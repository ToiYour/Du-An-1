<?php
include_once '../dao/gio-hang.php';
include_once '../dao/don-hang.php';
include_once '../dao/detail-don-hang.php';
include_once '../dao/payment.php';
date_default_timezone_set("Asia/Ho_Chi_Minh");
if (isset($_POST['id_kh'])) {
    $date = date('Y-m-d H:i:s');
    don_hang_insert($_POST['id_don_hang'], $_POST['id_kh'], $_POST['phone'], $_POST['dia_chi_giao'], 1,  $date,  $date, 'Thanh toán khi nhận hàng', $_POST['note']);
    detail_order_insert_by_khach_hang($_POST['id_kh'], $_POST['id_don_hang']);
    payment_insert($_POST['id_don_hang'], $_POST['total_price'], 'Thanh toán khi nhận hàng', 0);
}
