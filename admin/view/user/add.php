<div class="main-content">
    <div class="page-content pt-4 ">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Quản lý khách hàng</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Quản lý khách hàng</a>
                                </li>
                                <li class="breadcrumb-item active">Thêm khách hàng</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thêm khách hàng</h4>
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ho_ten">Họ tên</label>
                                            <input type="text" id="ho_ten" class="form-control" placeholder="Họ tên">
                                        </div>
                                        <div class="form-group">
                                            <label for="tenDN">Tên đăng nhập</label>
                                            <input type="text" id="tenDN" class="form-control" placeholder="Tên đăng nhập">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Mật khẩu</label>
                                            <input type="text" id="password" class="form-control" placeholder="Mật khẩu">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" class="form-control" placeholder="Nhập Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Số điện thoại</label>
                                            <input type="text" id="phone" class="form-control" placeholder="Nhập Số điện thoại">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="img">Hình ảnh</label>
                                            <input type="file" id="img" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Địa chỉ</label>
                                            <input type="text" id="address" class="form-control" placeholder="Nhập Địa chỉ">
                                        </div>
                                        <div class="form-group">
                                            <label for="kich_hoat">Kích hoạt</label>
                                            <select name="" id="kich_hoat" class="form-control">
                                                <option value="">Khoá</option>
                                                <option value="">Kích hoạt</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="vai_tro">Vai trò</label>
                                            <select name="" id="vai_tro" class="form-control">
                                                <option value="">Khách hàng</option>
                                                <option value="">Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="float-right">
                                    <a href="?act=listkh" class="btn btn-outline-success">Danh sách khách hàng</a>
                                    <input type="submit" class="btn btn-success" value="Thêm khách hàng">
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
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">2023 © Nguyễn Huy Tới.</div>
                <div class="col-sm-6">
                    <div class="text-sm-right d-none d-sm-block">
                        Quản lý Website
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>