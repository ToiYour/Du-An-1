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
include_once '../assets/dao/khach-hang.php';
include_once '../assets/dao/binh-luan.php';
include_once '../assets/dao/don-hang.php';
include_once '../assets/dao/danh-gia.php';
include_once '../assets/dao/giam-gia.php';
include_once '../assets/dao/thong-ke.php';
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
        detail_san_pham_delete_none($_GET['id']);
        showSuccessToast('Xoá chi tiết sản phẩm thành công!');
      }
      if (isset($_POST['delete-detail-sp'])) {
        $id_san_pham = $_POST['id_san_pham'];
        if (empty($_POST['checkAll'])) {
          showErrorToast('Chưa có mục nào được chọn!');
        } else {
          detail_san_pham_delete_none($_POST['checkAll']);
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
      if (isset($_POST['addkh']) && $_POST['addkh']) {
        $arr_kh = [
          'ho_ten' => $_POST['ho_ten'],
          'ten_dang_nhap' => $_POST['ten_dang_nhap'],
          'mat_khau' => $_POST['mat_khau'],
          'email' => $_POST['email'],
          'phone' => $_POST['phone'],
          'hinh_anh' => $_FILES['hinh_anh'],
          'dia_chi' => $_POST['dia_chi'],
          'kich_hoat' => $_POST['kich_hoat'],
          'id_roles' => $_POST['id_roles']
        ];
        foreach ($arr_kh as $key => $value) {
          if (empty($value)) {
            $error_kh["$key"] = 'Trường dữ liệu không được bỏ trống';
          }
        }
        if (empty($error_kh)) {
          $path_file = '../assets/images/avatar/' . $arr_kh['hinh_anh']['name'];
          move_uploaded_file($arr_kh['hinh_anh']['tmp_name'], $path_file);
          user_insert($arr_kh['ho_ten'], $arr_kh['ten_dang_nhap'], $arr_kh['mat_khau'], $arr_kh['email'], $arr_kh['phone'], $arr_kh['hinh_anh']['name'], 1, $arr_kh['dia_chi'], $arr_kh['kich_hoat'], 1, $arr_kh['id_roles']);
        }
      }
      include_once 'view/user/add.php';
      break;
      // add khách hàng end
    case 'update-kh':
      if (isset($_POST['update-kh']) && $_POST['update-kh']) {
        $history_kh = user_select_by_id($_POST['id_kh']);
        $arr_kh = [
          'ho_ten' => $_POST['ho_ten'],
          'ten_dang_nhap' => $_POST['ten_dang_nhap'],
          'mat_khau' => $_POST['mat_khau'],
          'email' => $_POST['email'],
          'phone' => $_POST['phone'],
          'dia_chi' => $_POST['dia_chi'],
          'kich_hoat' => $_POST['kich_hoat'],
          'id_roles' => $_POST['id_roles']
        ];
        if ($_FILES['hinh_anh']['size'] <= 0) {
          $arr_kh['hinh_anh']['name'] = $history_kh['hinh_anh'];
        } else {
          $arr_kh['hinh_anh']['name'] = $_FILES['hinh_anh']['name'];
          $path_file = '../assets/images/avatar/' . $_FILES['hinh_anh']['name'];
          move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $path_file);
        }
        foreach ($arr_kh as $key => $value) {
          if (empty($value)) {
            $error_kh["$key"] = 'Trường dữ liệu không được bỏ trống';
          }
        }
        if (empty($error_kh)) {
          user_update($_POST['id_kh'], $arr_kh['ho_ten'], $arr_kh['ten_dang_nhap'], $arr_kh['mat_khau'], $arr_kh['email'], $arr_kh['phone'], $arr_kh['hinh_anh']['name'], $history_kh['trang_thai'], $arr_kh['dia_chi'], $arr_kh['kich_hoat'], 1, $arr_kh['id_roles']);
          showSuccessToast('Sửa thông tin khách hàng thành công!');
          include_once 'view/user/list.php';
        }
      } else
        include_once 'view/user/update.php';
      break;
      // update khách hàng end
    case 'delete-kh':
      if (isset($_GET['id'])) {
        user_delete_none($_GET['id']);
        showSuccessToast('Xoá khách hàng thành công!');
      }
      if (isset($_POST['delete-kh'])) {
        if (empty($_POST['checkAll'])) {
          showErrorToast('Chưa có mục nào được chọn');
        } else {
          user_delete_none($_POST['checkAll']);
          showSuccessToast('Xoá khách hàng thành công!');
        }
      }
      include_once 'view/user/list.php';
      break;
      // delete khách hàng end
    case 'listkh':
      include_once 'view/user/list.php';
      break;
    case 'history-mh':
      include_once 'view/user/history-mh.php';
      break;
      // lịch sửa mua hàng end
    case 'detail-history-mh':
      include_once 'view/user/detail-history-mh.php';
      break;
      // chi tiết lịch sử mua hàng end
      // Quản lý khách hàng end

      // Quản lý bình luận
    case 'list-comment':
      include_once 'view/binh-luan/list.php';
      break;
      // danh sách bình luận end
    case 'detail-comment':
      include_once 'view/binh-luan/detail.php';
      break;
      // chi tiết bình luận end
    case 'delete-binhluan':
      if (isset($_GET['id'])) {
        binh_luan_delete_none($_GET['id']);
        showSuccessToast('Xoá bình luận thành công!');
        header('location: index.php?act=detail-comment&id=' . $_GET['idsp']);
      }
      if (isset($_POST['delete-binhluan'])) {
        if (empty($_POST['checkAll'])) {
          showErrorToast('Chưa có mục nào được chọn');
          header('location: index.php?act=detail-comment&id=' . $_POST['id_san_pham']);
        } else {
          binh_luan_delete_none($_POST['checkAll']);
          showSuccessToast('Xoá khách hàng thành công!');
          header('location: index.php?act=detail-comment&id=' . $_POST['id_san_pham']);
        }
      }
      break;
      // Quản lý bình luận end

      // Quản lý đánh giá
    case 'list-danh-gia':
      include_once 'view/danh-gia/list.php';
      break;
    case 'detail-danh-gia':
      include_once 'view/danh-gia/detail.php';
      break;
    case 'delete-danhgia':
      if (isset($_GET['id'])) {
        danh_gia_delete_none($_GET['id']);
        header('location: index.php?act=detail-danh-gia&id=' . $_GET['idsp']);
        showSuccessToast('Xoá đánh giá thành công!');
      }
      if (isset($_POST['delete-danhgia'])) {
        if (empty($_POST['checkAll'])) {
          showErrorToast('Chưa có mục nào được chọn');
          header('location: index.php?act=detail-danh-gia&id=' . $_POST['id_san_pham']);
        } else {
          danh_gia_delete_none($_POST['checkAll']);
          header('location: index.php?act=detail-danh-gia&id=' . $_POST['id_san_pham']);
          showSuccessToast('Xoá khách hàng thành công!');
        }
      }
      break;
      // Quản lý đánh giá end
    case 'add-gg':
      if (isset($_POST['addgg']) && $_POST['addgg']) {
        $arr_gg = [
          'code' => $_POST['code'],
          'giam_gia' => $_POST['giam_gia'],
          'so_luong' => $_POST['so_luong'],
          'ngay_het_han' => $_POST['ngay_het_han']
        ];
        foreach ($arr_gg as $key => $value) {
          if (empty($value)) {
            $error_gg["$key"] = 'Trường dữ liệu không được bỏ trống';
          }
        }
        if (empty($error_gg)) {
          giam_gia_insert($arr_gg['code'], $arr_gg['giam_gia'], $arr_gg['so_luong'], $arr_gg['ngay_het_han']);
          showSuccessToast('Thêm mã giảm giá thành công!');
        }
      }
      include_once 'view/giam-gia/add.php';
      break;
    case 'list-gg':
      include_once 'view/giam-gia/list.php';
      break;
    case 'update-gg':
      if (isset($_POST['update-gg']) && $_POST['update-gg']) {
        $arr_gg = [
          'code' => $_POST['code'],
          'giam_gia' => $_POST['giam_gia'],
          'so_luong' => $_POST['so_luong'],
          'ngay_het_han' => $_POST['ngay_het_han']
        ];
        foreach ($arr_gg as $key => $value) {
          if (empty($value)) {
            $error_gg["$key"] = 'Trường dữ liệu không được bỏ trống';
          }
        }
        if (empty($error_gg)) {
          giam_gia_update($_POST['id_ma_giam_gia'], $arr_gg['code'], $arr_gg['giam_gia'], $arr_gg['so_luong'], $arr_gg['ngay_het_han']);
          showSuccessToast('Sửa mã giảm giá thành công!');
          include_once 'view/giam-gia/list.php';
        }
      } else
        include_once 'view/giam-gia/update.php';
      break;
    case 'delete-gg':
      if (isset($_GET['id'])) {
        giam_gia_delete_none($_GET['id']);
        showSuccessToast('Xoá đánh giá thành công!');
      }
      if (isset($_POST['delete-gg'])) {
        if (empty($_POST['checkAll'])) {
          showErrorToast('Chưa có mục nào được chọn');
        } else {
          giam_gia_delete_none($_POST['checkAll']);
          showSuccessToast('Xoá khách hàng thành công!');
        }
      }
      include_once 'view/giam-gia/list.php';
      break;
      // quản lý giảm giá end
      // thống kê start
    case 'thong-ke-dt':
      include_once 'view/thong-ke/doanhthu.php';
      break;
    case 'thong-ke-slspbd':
      include_once 'view/thong-ke/sl-sp-ban-duoc.php';
      break;
    case 'thong-ke-ttdh':
      include_once 'view/thong-ke/tinh-trang.php';
      break;
    case 'thong-ke-bxh':
      include_once 'view/thong-ke/bxh.php';
      break;
  }
} else {
  include_once 'view/home.php';
}
include_once 'view/footer.php';
ob_end_flush();
