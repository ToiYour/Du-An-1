<?php
session_start();
ob_start();
include_once 'view/header.php';
include_once 'view/sidebar.php';
if (isset($_GET['act']) && $_GET['act']) {
  $act = $_GET['act'];
  switch ($act) {
      // Quản lý danh mục start
    case 'adddm':
      include_once 'view/danh-muc/add.php';
      break;
    case 'listdm':
      include_once 'view/danh-muc/list.php';
      break;
      // Quản lý danh mục end

      // Quản lý sản phẩm
    case 'addsp':
      include_once 'view/san-pham/add.php';
      break;
    case 'listsp':
      include_once 'view/san-pham/list.php';
      break;
    case 'list-detail':
      include_once 'view/san-pham/list-detail.php';
      break;
      // Quản lý sản phẩm end

      // Quản lý khách hàng
    case 'addkh':
      include_once 'view/user/add.php';
      break;
    case 'listkh':
      include_once 'view/user/list.php';
      break;
    case 'history-mh':
      include_once 'view/user/history-mh.php';
      break;
      // Quản lý khách hàng end

      // Quản lý bình luận
    case 'list-comment':
      include_once 'view/binh-luan/list.php';
      break;
    case 'detail-comment':
      include_once 'view/binh-luan/detail.php';
      break;
      // Quản lý bình luận end

      // Quản lý đánh giá
    case 'list-danh-gia':
      include_once 'view/danh-gia/list.php';
      break;
    case 'detail-danh-gia':
      include_once 'view/danh-gia/detail.php';
      break;
  }
} else {
  include_once 'view/home.php';
}
include_once 'view/footer.php';
ob_end_flush();
