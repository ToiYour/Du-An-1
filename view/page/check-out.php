 <?php
    if (isset($_SESSION['login'])) {
        $product_checkout = gio_hang_select_all($_SESSION['login']['id_kh']);
        $sum_checkout = gio_hang_checkout($_SESSION['login']['id_kh']);
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
                     <li class="breadcrumb-item active">Thanh toán</li>
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
                 <div class="col-lg-6 col-md-6">
                     <!-- billing-details-wrap start -->
                     <div class="billing-details-wrap">
                         <form action="#">
                             <h3 class="shoping-checkboxt-title" style="color: #c89979;"><i class="fas fa-map-marker-alt"></i>Địa chỉ
                                 nhận
                                 hàng</h3>
                             <div class="row">
                                 <div class="col-lg-6">
                                     <p class="single-form-row">
                                         <label>Họ và tên<span class="required">*</span></label>
                                         <input type="text" name="ho_ten" value="<?php echo (isset($_SESSION['login'])) ? $_SESSION['login']['ho_ten'] : '' ?>">
                                     </p>
                                 </div>
                                 <div class="col-lg-6">
                                     <p class="single-form-row">
                                         <label>Số điện thoại<span class="required">*</span></label>
                                         <input type="text" name="phone" value="<?php echo (isset($_SESSION['login'])) ? $_SESSION['login']['phone'] : '' ?>">
                                     </p>
                                 </div>
                                 <div class="col-lg-12">
                                     <div class="single-form-row">
                                         <label>Tỉnh thành<span class="required">*</span></label>
                                         <div class="">
                                             <select id="city">
                                                 <option value="" selected>Chọn tỉnh thành</option>
                                             </select>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-lg-12 mb-20">
                                     <div class="single-form-row">
                                         <label>Quận huyện<span class="required">*</span></label>
                                         <div class="">
                                             <select id="district">
                                                 <option value="" selected>Chọn quận huyện</option>
                                             </select>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-lg-12">
                                     <div class="single-form-row">
                                         <label>Phường xã<span class="required">*</span></label>
                                         <div class="">
                                             <select id="ward" style="width: 100;">
                                                 <option value="" selected>Chọn phường xã</option>
                                             </select>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-lg-12">
                                     <p class="single-form-row m-0">
                                         <label>Ghi chú đặt hàng</label>
                                         <textarea placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ: địa chỉ cụ thể, thời gian nhận trong ngày..." class="checkout-mess" rows="2" cols="5"></textarea>
                                     </p>
                                 </div>
                             </div>
                         </form>
                     </div>
                     <!-- billing-details-wrap end -->
                 </div>
                 <div class="col-lg-6 col-md-6">
                     <!-- your-order-wrapper start -->
                     <div class="your-order-wrapper">
                         <h3 class="shoping-checkboxt-title" style="color: #c89979;">Đơn hàng của bạn</h3>
                         <!-- your-order-wrap start-->
                         <div class="your-order-wrap rounded">
                             <!-- your-order-table start -->
                             <div class="your-order-table table-responsive">
                                 <table>
                                     <thead>
                                         <tr>
                                             <th class="product-name">Sản phẩm</th>
                                             <th class="product-total">Tổng</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php foreach ($product_checkout as $value) : ?>
                                             <tr class="cart_item">
                                                 <td class="product-name">
                                                     <?php echo $value['ten_san_pham'] ?> <strong class="product-quantity">
                                                         ×
                                                         <?php echo $value['so_luong'] ?></strong>
                                                 </td>
                                                 <td class="product-total">
                                                     <span class="amount"><?php echo number_format($value['price']) ?>đ</span>
                                                 </td>
                                             </tr>
                                         <?php endforeach; ?>
                                     </tbody>
                                     <tfoot>
                                         <tr class="order-total">
                                             <th class="fw-semibold">Tổng số đơn
                                                 hàng(<?php echo (isset($sum_checkout['tong_sl'])) ? $sum_checkout['tong_sl'] : 0 ?>)
                                             </th>
                                             <td><strong><span class="amount"><?php echo (isset($sum_checkout['tong_gia'])) ? number_format($sum_checkout['tong_gia']) : 0 ?>đ</span></strong>
                                             </td>
                                         </tr>
                                     </tfoot>
                                 </table>
                             </div>
                             <!-- your-order-table end -->

                             <!-- your-order-wrap end -->
                             <div class="payment-method">
                                 <div class="payment-accordion">
                                     <!-- ACCORDION START -->
                                     <h5>Phương thức thanh toán</h5>
                                     <div class="payment-content">
                                         <div class="d-flex align-items-center mb-1">
                                             <img src="assets/images/icon/cod.png" alt="" style="width:30px; height:30px; object-fit: cover;">
                                             <label for="shipcod">Thanh toán khi nhận hàng</label>
                                             <input type="radio" id="shipcod" class="mx-2" name="payment" value="shipcod">
                                         </div>
                                         <div class="d-flex align-items-center">
                                             <img src="assets/images/icon/bank.png" alt="" style="width:30px; height:30px; object-fit: cover;">
                                             <label for="atm">Thẻ ATM nội địa</label>
                                             <input type="radio" id="atm" class="mx-2" name="payment" value="atm">
                                         </div>
                                     </div>
                                     <!-- ACCORDION END -->
                                 </div>
                                 <div class="order-button-payment">
                                     <input type="submit" value="Đặt hàng" />
                                 </div>
                             </div>
                             <!-- your-order-wrapper start -->

                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- checkout-details-wrapper end -->
     </div>
 </div>
 <!-- main-content-wrap end -->