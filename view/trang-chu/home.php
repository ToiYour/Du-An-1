<?php
include_once 'slide.php';
include_once 'banner-best-deal.php';
$product_new = san_pham_select_product_new();
$product_seller = san_pham_select_best_seller(); ?>
<!-- Product Area Start -->
<div class="product-area section-pb section-pt-30">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <ul class="nav product-tab-menu" role="tablist">
                    <li class="product-tab-item nav-item active">
                        <a class="product-tab__link active" id="nav-featured-tab" data-bs-toggle="tab"
                            href="#nav-featured" role="tab" aria-selected="true">Sản phẩm mới</a>
                    </li>

                    <li class="product-tab__item nav-item">
                        <a class="product-tab__link" id="nav-bestseller-tab" data-bs-toggle="tab" href="#nav-bestseller"
                            role="tab" aria-selected="false">Sản phẩm bán chạy</a>
                    </li>

                </ul>
            </div>
        </div>

        <div class="tab-content product-tab__content" id="product-tabContent">
            <div class="tab-pane fade show active" id="nav-featured" role="tabpanel">
                <div class="product-carousel-group">
                    <div class="row product-active-row-4">
                        <?php foreach ($product_new as $value) : ?>
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="primary-image"
                                            src="assets/images/product/<?php echo $value['hinh_anh'] ?>" alt="" />
                                    </a>
                                    <div class="label-product label_new">Mới</div>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i
                                                class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i
                                                class="icon-heart"></i></a>
                                        <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalCenter"><i
                                                class="icon-magnifier icons"></i></a>
                                    </div>

                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name">
                                        <a
                                            href="?act=product-details&id=<?php echo  $value['id_san_pham'] ?>"><?php echo  $value['ten_san_pham'] ?></a>
                                    </h4>
                                    <div class="price-box">
                                        <span class="new-price"><?php echo number_format($value['gia_ban']) ?>đ</span>

                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>


            <div class="tab-pane fade" id="nav-bestseller" role="tabpanel">
                <div class="product-carousel-group">
                    <div class="row product-active-row-4">
                        <?php foreach ($product_seller as $value) : ?>
                        <div class="col-lg-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mt-30">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img class="primary-image"
                                            src="assets/images/product/<?php echo $value['hinh_anh'] ?>" alt="" />
                                    </a>
                                    <div class="label-product label_new">Mới</div>
                                    <div class="action-links">
                                        <a href="cart.html" class="cart-btn" title="Add to Cart"><i
                                                class="icon-basket-loaded"></i></a>
                                        <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i
                                                class="icon-heart"></i></a>
                                        <a href="#" class="quick-view" title="Quick View" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalCenter"><i
                                                class="icon-magnifier icons"></i></a>
                                    </div>

                                </div>
                                <div class="product-caption">
                                    <h4 class="product-name">
                                        <a
                                            href="?act=product-details&id=<?php echo  $value['id_san_pham'] ?>"><?php echo  $value['ten_san_pham'] ?></a>
                                    </h4>
                                    <div class="price-box">
                                        <span class="new-price"><?php echo number_format($value['gia_ban']) ?>đ</span>

                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Product Area End -->

<!-- letast blog area Start -->
<div class="letast-blog-area section-pb">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="singel-latest-blog">
                    <div class="aritcles-content">
                        <div class="author-name">

                            đăng bởi: <a href="#"> Nguyễn Huy Tới</a> - 30 Oct 2019
                        </div>
                        <h4>
                            <a href="blog-details.html" class="articles-name">
                                Ruiz Watch là một trong những trang web hay nhất
                                đã truy cập các trang web xem
                                và thế giới</a>
                        </h4>
                    </div>
                    <div class="articles-image">
                        <a href="blog-details.html">
                            <img src="assets/images/blog/blog-01.jpg" alt="" />
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="singel-latest-blog">
                    <div class="aritcles-content">
                        <div class="author-name">
                            đăng bởi: <a href="#"> Nguyễn Huy Tới</a> - 20 Oct 2019
                        </div>
                        <h4>
                            <a href="blog-details.html" class="articles-name">Đánh giá Ruiz Watch và đồng hồ phổ biến
                                nhất
                                & đồng hồ
                                blog nghiêm túc
                            </a>
                        </h4>
                    </div>
                    <div class="articles-image">
                        <a href="blog-details.html">
                            <img src="assets/images/blog/blog-02.jpg" alt="" />
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="singel-latest-blog">
                    <div class="aritcles-content">
                        <div class="author-name">
                            đăng bởi: <a href="#"> Nguyễn Huy Tới</a> - 13 Oct 2019
                        </div>
                        <a href="blog-details.html" class="articles-name">Kết nối với thế giới: Giới thiệu
                            G-Sốc
                            MTG-B1000-1A</a>
                    </div>
                    <div class="articles-image">
                        <a href="blog-details.html">
                            <img src="assets/images/blog/blog-03.jpg" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- letast blog area End -->