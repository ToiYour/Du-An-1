<?php
session_start();
ob_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");
$ngay_nhap_str = '11/11/2023 09:51:02';
include_once '../assets/dao/pdo.php';
include_once '../assets/dao/loai.php';
include_once '../assets/dao/san-pham.php';
include_once '../assets/dao/size.php';
include_once '../assets/dao/mau.php';
include_once '../assets/dao/roles.php';
include_once '../assets/dao/detail-san-pham.php';
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
      // end thêm danh mục
    case 'listdm':
      $list_danh_muc = loai_select_all();
      include_once 'view/danh-muc/list.php';
      break;
      //end list danh mục
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
      // end update danh mục
    case 'delete-dm':
      // Xoá 1
      if (isset($_GET['id-dm'])) {
        san_pham_delete_by_danh_muc_none($_GET['id-dm']);
        loai_delete_none($_GET['id-dm']);
        showSuccessToast('Bạn đã xoá danh mục sản phẩm thành công!');
      }
      if (isset($_POST['delete-dm'])) {
        if (empty($_POST['checkAll'])) {
          showErrorToast('Chưa có mục nào được chọn!');
        } else {
          san_pham_delete_by_danh_muc_none($_POST['checkAll']);
          loai_delete_none($_POST['checkAll']);
          showSuccessToast('Bạn đã xoá danh mục sản phẩm thành công!');
        }
      }
      include_once 'view/danh-muc/list.php';
      break;
      // end delete danh mục
      // Quản lý danh mục end

      // Quản lý sản phẩm
    case 'addsp':
      if (isset($_POST['add-sp'])) {
        $arr_sp = [
          'ten_san_pham' => $_POST['ten_san_pham'],
          'mo_ta' => $_POST['mo_ta'],
          'hinh_anh' => $_FILES['hinh_anh'],
          'ngay_nhap' => date('Y-m-d H:i:s', strtotime($ngay_nhap_str)),
          'id_danh_muc' => $_POST['id_danh_muc']
        ];
        foreach ($arr_sp as $key => $value) {
          if (empty($value)) {
            $error_sp["$key"] = 'Trường dữ liệu không được bỏ trống';
          }
        }
        if (empty($error_sp)) {
          $path_file = '../assets/images/product/' . $arr_sp['hinh_anh']['name'];
          move_uploaded_file($arr_sp['hinh_anh']['tmp_name'], $path_file);
          san_pham_insert($arr_sp['ten_san_pham'], $arr_sp['mo_ta'], $arr_sp['hinh_anh']['name'], 0, $arr_sp['ngay_nhap'], $arr_sp['id_danh_muc']);
          showSuccessToast('Thêm sản phẩm thành công!');
        }
      }
      include_once 'view/san-pham/add.php';
      break;
      // end add sản phẩm
    case 'update-sp':
      if (isset($_POST['update-sp'])) {
        $history_sp = san_pham_select_by_id($_POST['id_san_pham']);
        $arr_sp = [
          'ten_san_pham' => $_POST['ten_san_pham'],
          'mo_ta' => $_POST['mo_ta'],
          'id_danh_muc' => $_POST['id_danh_muc']
        ];
        if ($_FILES['hinh_anh']['size'] <= 0) {
          $arr_sp['hinh_anh']['name'] = $history_sp['hinh_anh'];
        } else {
          $arr_sp['hinh_anh']['name'] = $_FILES['hinh_anh']['name'];
          $path_file = '../assets/images/product/' . $_FILES['hinh_anh']['name'];
          move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $path_file);
        }
        foreach ($arr_sp as $key => $value) {
          if (empty($value)) {
            $error_sp["$key"] = 'Trường dữ liệu không được bỏ trống';
          }
        }
        if (empty($error_sp)) {
          san_pham_update($_POST['id_san_pham'], $arr_sp['ten_san_pham'], $arr_sp['mo_ta'], $arr_sp['hinh_anh']['name'], $history_sp['luot_xem'], $arr_sp['id_danh_muc']);
          showSuccessToast('Sửa sản phẩm thành công!');
          include_once 'view/san-pham/list.php';
        }
      } else
        include_once 'view/san-pham/update.php';
      break;
      // end update
    case 'delete-sp':
      if (isset($_POST['delete-dm'])) {
        if (empty($_POST['checkAll'])) {
          showErrorToast('Chưa có mục nào được chọn!');
        } else {
          san_pham_delete_none($_POST['checkAll']);
          showSuccessToast('Xoá sản phẩm thành công!');
        }
      }
      if (isset($_GET['id'])) {
        san_pham_delete_none($_GET['id']);
        showSuccessToast('Xoá sản phẩm thành công!');
      }
      include_once 'view/san-pham/list.php';
      break;
      // end delete sản phẩm
    case 'listsp':
      include_once 'view/san-pham/list.php';
      break;
      // Detail sản phẩm
    case 'add-detail-sp':
      if (isset($_POST['add-detail-sp']) && $_POST['add-detail-sp']) {
        $arr_detail_sp = [
          'gia_nhap' => $_POST['gia_nhap'],
          'gia_ban' => $_POST['gia_ban'],
          'so_luong' => $_POST['so_luong'],
          'ngay_nhap' => date('Y-m-d H:i:s', strtotime($ngay_nhap_str)),
          'id_san_pham' => $_POST['id_san_pham'],
          'id_size' => $_POST['id_size'],
          'id_mau' => $_POST['id_mau']
        ];
        foreach ($arr_detail_sp as $key => $value) {
          if (empty($value)) {
            $error_detail_sp["$key"] = 'Trường dữ liệu không được bỏ trống';
          }
        }
        if (empty($error_detail_sp)) {
          detail_san_pham_insert($arr_detail_sp['gia_nhap'], $arr_detail_sp['gia_ban'], $arr_detail_sp['so_luong'], $arr_detail_sp['ngay_nhap'], $arr_detail_sp['id_san_pham'], $arr_detail_sp['id_size'], $arr_detail_sp['id_mau']);
          showSuccessToast('Thêm chi tiết sản phẩm thành công!');
        }
      }
      include_once 'view/san-pham/add-detail.php';
      break;
      // end add detail sản phẩm
    case 'update-detail-sp':
      if (isset($_POST['update-detail-sp']) && $_POST['update-detail-sp']) {
        $arr_detail_sp = [
          'gia_nhap' => $_POST['gia_nhap'],
          'gia_ban' => $_POST['gia_ban'],
          'so_luong' => $_POST['so_luong'],
          'id_san_pham' => $_POST['id_san_pham'],
          'id_size' => $_POST['id_size'],
          'id_mau' => $_POST['id_mau']
        ];
        foreach ($arr_detail_sp as $key => $value) {
          if (empty($value)) {
            $error_detail_sp["$key"] = 'Trường dữ liệu không được bỏ trống';
          }
        }
        if (empty($error_detail_sp)) {
          detail_san_pham_update($_POST['id_chi_tiet_san_pham'], $arr_detail_sp['gia_nhap'], $arr_detail_sp['gia_ban'], $arr_detail_sp['so_luong'], $arr_detail_sp['id_san_pham'], $arr_detail_sp['id_size'], $arr_detail_sp['id_mau']);
          showSuccessToast('Sửa chi tiết sản phẩm thành công!');
          header('location: index.php?act=list-detail&id=' . $arr_detail_sp['id_san_pham']);
        }
      } else
        include_once 'view/san-pham/update-detail.php';
      break;
      // end update detail sản phẩm
    case 'delete-detail-sp':
      if (isset($_GET['id'])) {
        $id_san_pham = $_GET['idsp'];
        detail_san_pham_delete($_GET['id']);
        showSuccessToast('Xoá chi tiết sản phẩm thành công!');
      }
      if (isset($_POST['delete-detail-sp'])) {
        $id_san_pham = $_POST['id_san_pham'];
        if (empty($_POST['checkAll'])) {
          showErrorToast('Chưa có mục nào được chọn!');
        } else {
          detail_san_pham_delete($_POST['checkAll']);
          showSuccessToast('Xoá chi tiết sản phẩm thành công!');
        }
      }
      header('location: index.php?act=list-detail&id=' . $id_san_pham);
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
