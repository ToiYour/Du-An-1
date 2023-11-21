        <!-- breadcrumb-area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Xem lịch sử mua hàng</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->

        <!-- main-content-wrap start -->
        <div class="main-content-wrap section-ptb lagin-and-register-page">
            <div class="container">
                <div class="row">
                    <?php include_once 'sidebar-account.php' ?>
                    <div class="col-8">
                        <nav class="flex-grow ">
                            <div class="nav nav-tabs " id="nav-tab" role="tablist">
                                <button class="nav-link flex-fill text-dark active px-1" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all" aria-selected="true">Tất cả</button>
                                <button class="nav-link flex-fill text-dark px-1" id="nav-cho-thanh-toan-tab" data-bs-toggle="tab" data-bs-target="#nav-cho-thanh-toan" type="button" role="tab" aria-controls="nav-cho-thanh-toan" aria-selected="false">Chờ thanh toán</button>
                                <button class="nav-link flex-fill text-dark px-1" id="nav-van-chuyen-tab" data-bs-toggle="tab" data-bs-target="#nav-van-chuyen" type="button" role="tab" aria-controls="nav-van-chuyen" aria-selected="false">Vận chuyển</button>
                                <button class="nav-link flex-fill text-dark px-1" id="nav-cho-giao-tab" data-bs-toggle="tab" data-bs-target="#nav-cho-giao" type="button" role="tab" aria-controls="nav-cho-giao" aria-selected="false">Chờ giao hàng</button>
                                <button class="nav-link flex-fill text-dark px-1" id="nav-hoan-thanh-tab" data-bs-toggle="tab" data-bs-target="#nav-hoan-thanh" type="button" role="tab" aria-controls="nav-hoan-thanh" aria-selected="false">Hoàn thành</button>
                                <button class="nav-link flex-fill text-dark px-1" id="nav-huy-tab" data-bs-toggle="tab" data-bs-target="#nav-huy" type="button" role="tab" aria-controls="nav-huy" aria-selected="false">Đã huỷ</button>
                                <button class="nav-link flex-fill text-dark px-1" id="nav-tra-hang-tab" data-bs-toggle="tab" data-bs-target="#nav-tra-hang" type="button" role="tab" aria-controls="nav-tra-hang" aria-selected="false">Trả hàng/Hoàn tiền</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <!-- All -->
                            <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab" tabindex="0">
                                <div class="card py-4">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <div class="p-3 bg-secondary my-2" style="--bs-bg-opacity: .09;">
                                                    <div class="d-flex justify-content-between align-items-end border-bottom pb-2 mb-1">
                                                        <div class="d-flex">
                                                            <img src="assets/images/product/01.webp" alt="" style="width: 80px; height: 80px; object-fit: cover;">
                                                            <div class="ms-2">
                                                                <h5 class="m-0">Đồng hồ</h5>
                                                                <p class="m-0 text-black-50">Phân loại: Đồng hồ
                                                                    Casio-Vàng,L
                                                                </p>
                                                                <p>x1</p>
                                                            </div>
                                                        </div>
                                                        <p class="text-danger">481.615đ</p>
                                                    </div>
                                                    <div class="float-end"><button type="button" class="btn btn-bordered btn-style-1 px-1 py-2" style="font-size: 12px;">Huỷ
                                                            đơn
                                                            hàng</button></div>
                                                </div>
                                            </tr>
                                            <tr>
                                                <div class="p-3 bg-secondary my-2" style="--bs-bg-opacity: .09;">
                                                    <div class="d-flex justify-content-between align-items-end border-bottom pb-2 mb-1">
                                                        <div class="d-flex">
                                                            <img src="assets/images/product/01.webp" alt="" style="width: 80px; height: 80px; object-fit: cover;">
                                                            <div class="ms-2">
                                                                <h5 class="m-0">Đồng hồ</h5>
                                                                <p class="m-0 text-black-50">Phân loại: Đồng hồ
                                                                    Casio-Vàng,L
                                                                </p>
                                                                <p>x1</p>
                                                            </div>
                                                        </div>
                                                        <p class="text-danger">481.615đ</p>
                                                    </div>
                                                    <div class="float-end"><button type="button" class="btn btn-bordered btn-style-1 px-1 py-2" style="font-size: 12px;">Huỷ
                                                            đơn
                                                            hàng</button></div>
                                                </div>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Chờ thanh toán -->
                            <div class="tab-pane fade" id="nav-cho-thanh-toan" role="tabpanel" aria-labelledby="nav-cho-thanh-toan-tab" tabindex="0">Chờ thanh toán</div>
                            <!-- Vận chuyển -->
                            <div class="tab-pane fade" id="nav-van-chuyen" role="tabpanel" aria-labelledby="nav-van-chuyen-tab" tabindex="0">Vận chuyển</div>
                            <!-- Chờ giao hàng -->
                            <div class="tab-pane fade" id="nav-cho-giao" role="tabpanel" aria-labelledby="nav-cho-giao-tab" tabindex="0">Chờ giao hàng</div>
                            <!-- Hoàn thành -->
                            <div class="tab-pane fade" id="nav-hoan-thanh" role="tabpanel" aria-labelledby="nav-hoan-thanh-tab" tabindex="0">Hoàn thành</div>
                            <!-- Đã huỷ -->
                            <div class="tab-pane fade" id="nav-huy" role="tabpanel" aria-labelledby="nav-huy-tab" tabindex="0">Đã huỷ</div>
                            <!-- Trả hàng -->
                            <div class="tab-pane fade" id="nav-tra-hang" role="tabpanel" aria-labelledby="nav-tra-hang-tab" tabindex="0">Trả hàng</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- main-content-wrap end -->