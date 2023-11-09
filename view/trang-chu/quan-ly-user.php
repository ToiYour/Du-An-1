<?php
if (isset($_SESSION['login'])) {
    $login = user_select_by_id($_SESSION['login']['id_kh']);
}
?>
<div class="main-content mb-3">
    <div class="page-content py-4 ">
        <div class="container">
            <!-- start page title -->
            <div class="row my-3">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Tài khoản của tôi</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Tài khoản của tôi</a>
                                </li>
                                <li class="breadcrumb-item active">Thông tin tài khoản</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title shadow-none bg-light rounded p-3">
                                <img src="assets/images/avatar/<?php echo empty($login['hinh_anh']) ? 'no-avatar.jpg' : $login['hinh_anh'] ?>"
                                    alt="" width="40px" height="40px" style="border-radius: 50%; object-fit: cover;">
                                <span class="px-2 fw-normal"><?php echo $login['ho_ten'] ?></span>
                            </div>
                            <h5>Tên đăng nhập: <span class="fw-lighter"><?php echo $login['ten_dang_nhap'] ?></span>
                            </h5>
                            <h5>Email: <span class="fw-lighter"><?php echo $login['email'] ?></span></h5>
                            <h5>Số điện thoại: <span class="fw-lighter"><?php echo $login['phone'] ?></span>
                            </h5>
                            <h5>Email: <span class="fw-lighter"><?php echo $login['email'] ?></span></h5>
                            <h5>Địa chỉ: <span class="fw-lighter"><?php echo $login['dia_chi'] ?></span>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Sửa thông tin</h4>
                            <form action="?act=setting-user" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ho_ten">Họ tên</label>
                                            <input type="text" id="ho_ten" class="form-control" placeholder="Họ tên"
                                                value="<?php echo $login['ho_ten'] ?>" name="ho_ten">
                                        </div>
                                        <div class="form-group">
                                            <label for="tenDN">Tên đăng nhập</label>
                                            <input type="text" id="tenDN" class="form-control"
                                                placeholder="Tên đăng nhập"
                                                value="<?php echo $login['ten_dang_nhap'] ?>" name="ten_dang_nhap">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Mật khẩu</label>
                                            <input type="text" id="password" class="form-control" placeholder="Mật khẩu"
                                                value="<?php echo $login['mat_khau'] ?>" name="mat_khau">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" class="form-control" placeholder="Nhập Email"
                                                value="<?php echo $login['email'] ?>" name="email">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Số điện thoại</label>
                                            <input type="text" id="phone" class="form-control"
                                                placeholder="Nhập Số điện thoại" value="<?php echo $login['phone'] ?>"
                                                name="phone">
                                        </div>
                                        <div class="form-group">
                                            <label for="img">Hình ảnh</label>
                                            <input type="file" id="img" class="form-control" name="hinh_anh">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Địa chỉ</label>
                                            <input type="text" id="address" class="form-control"
                                                placeholder="Nhập Địa chỉ" value="<?php echo $login['dia_chi'] ?>"
                                                name="dia_chi">
                                        </div>

                                    </div>
                                </div>

                                <div class="float-right mt-3">
                                    <input type="text" hidden value="<?php echo $login['id_kh'] ?>" name="id_kh">
                                    <input type="submit" class="btn btn-success" value="Cập nhập" name="change-user">
                                </div>
                            </form>
                        </div>
                        <!-- end card-body-->
                    </div>
                </div>
            </div>

            <!-- end page title -->

        </div>
    </div>
</div>