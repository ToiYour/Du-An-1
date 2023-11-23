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
    ?>
 <!-- breadcrumb-area start -->
 <div class="breadcrumb-area">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <!-- breadcrumb-list start -->
                 <ul class="breadcrumb-list">
                     <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                     <li class="breadcrumb-item active">Hoàn thành thanh toán</li>
                 </ul>
                 <!-- breadcrumb-list end -->
             </div>
         </div>
     </div>
 </div>
 <!-- breadcrumb-area end -->
 <!-- main-content-wrap start -->
 <div class="main-content-wrap section-ptb checkout-page">
     <div class="container">
         <!-- checkout-details-wrapper start -->
         <div class="checkout-details-wrapper">
             <div class="row">
                 <div class="col-lg-6 col-md-6 mx-auto">
                     <!-- your-order-wrapper start -->
                     <div class=" p-5">
                         <!-- your-order-wrap start-->
                         <div class=" border rounded px-5 pb-3">
                             <div class="d-flex justify-content-center">
                                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="96px" height="96px">
                                     <path fill="#c8e6c9"
                                         d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z" />
                                     <path fill="#4caf50"
                                         d="M34.586,14.586l-13.57,13.586l-5.602-5.586l-2.828,2.828l8.434,8.414l16.395-16.414L34.586,14.586z" />
                                 </svg>
                             </div>
                             <h5 class="text-success text-center fw-semibold">Cảm ơn bạn. Đơn hàng của bạn đã nhận.</h5>
                             <ul class="fw-semibold">
                                 <li>Mã đơn hàng: <span class="fw-light"><?php echo $_POST['id_don_hang'] ?></span></li>
                                 <li>Số điện thoại: <span class="fw-light"><?php echo $_POST['phone'] ?></span></li>
                                 <li>Địa chỉ giao: <span class="fw-light"><?php echo $_POST['dia_chi_giao'] ?></span>
                                 </li>
                                 <li>Ngày: <span class="fw-light"><?php echo $date ?></span></li>
                                 <li>Tổng cộng: <span
                                         class="fw-light "></span><?php echo number_format($_POST['total_price']) ?>đ</span>
                                 </li>
                                 <li>Phương thức thanh toán: <span class="fw-light">Thanh toán khi nhận hàng</span>
                                 </li>
                             </ul>
                             <div class="row mt-3">
                                 <?php if (isset($_POST['id_kh'])):?>
                                 <a href="?act=history-carts"
                                     class="btn btn-outline-success px-2 py-1 justify-content-center">Xem đơn
                                     hàng</a>
                                 <?php endif?>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- checkout-details-wrapper end -->
     </div>
 </div>
 <!-- main-content-wrap end -->