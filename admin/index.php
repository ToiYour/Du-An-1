<?php
session_start();
ob_start();
include_once '../assets/dao/pdo.php';
include_once '../assets/dao/loai.php';
include_once '../assets/dao/toast-message.php';
include_once 'view/header.php';
include_once 'view/sidebar.php';
if (isset($_GET['act']) && $_GET['act']) {
  $act = $_GET['act'];
  switch ($act) {
      // Quản lý danh mục start
    case 'adddm':
      if (isset($_POST['add-dm']) && $_POST['add-dm']) {
        $ten_danh_muc = $_POST['ten_danh_muc'];
        if (!empty($ten_danh_muc)) {
          loai_insert($ten_danh_muc);
          showSuccessToast('Bạn đã thêm danh mục sản phẩm thành công!');
        }
      }
      include_once 'view/danh-muc/add.php';
      break;
    case 'listdm':
      $list_danh_muc = loai_select_all();
      include_once 'view/danh-muc/list.php';
      break;
    case 'update-dm':
      if (isset($_GET['id-dm'])) {
        $danh_muc_one = loai_select_by_id($_GET['id-dm']);
      }
      if (isset($_POST['update-dm']) && $_POST['update-dm']) {
        $ten_danh_muc = $_POST['ten_danh_muc'];
        $id_danh_muc =  $_POST['id_danh_muc'];
        if (!empty($ten_danh_muc)) {
          loai_update($id_danh_muc, $ten_danh_muc);
          showSuccessToast('Bạn đã sửa danh mục sản phẩm thành công!');
          $list_danh_muc = loai_select_all();
          include_once 'view/danh-muc/list.php';
        }
      } else
        include_once 'view/danh-muc/update.php';
      break;
    case 'delete-dm':
      // Xoá 1
      if (isset($_GET['id-dm'])) {
        loai_delete($_GET['id-dm']);
        showSuccessToast('Bạn đã xoá danh mục sản phẩm thành công!');
        $list_danh_muc = loai_select_all();
        include_once 'view/danh-muc/list.php';
      }
      if (isset($_POST['delete-dm'])) {
        loai_delete($_POST['checkAll']);
        showSuccessToast('Bạn đã xoá danh mục sản phẩm thành công!');
        $list_danh_muc = loai_select_all();
        include_once 'view/danh-muc/list.php';
      }
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
