<div class="product-description-area section-pt">
    <div class="row">
        <div class="col-lg-12">
            <div class="product-details-tab">
                <ul role="tablist" class="nav">
                    <li class="active" role="presentation">
                        <a data-bs-toggle="tab" role="tab" href="#description" class="active">Bình luận</a>
                    </li>
                    <li role="presentation">
                        <a data-bs-toggle="tab" role="tab" href="#reviews">Đánh giá</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="product_details_tab_content tab-content">
                <!-- Start Single Content -->
                <div class="product_tab_content tab-pane active" id="description" role="tabpanel">
                    <div class="product_description_wrap  mt-30">
                        <div class="product_desc mb-30">
                            <!-- Gửi bình luận -->
                            <?php if (isset($_SESSION['login'])) : ?>
                                <div class="write-comment mb-5">
                                    <div class="d-flex position-relative mb-1">
                                        <img src="assets/images/avatar/<?php echo (!empty($_SESSION['login']['hinh_anh'])) ? $_SESSION['login']['hinh_anh'] : 'no-avatar.jpg' ?>" alt="" style="width: 40px; height: 40px; border-radius: 50%;">
                                        <div class="form-floating" style="width: 100%;">
                                            <textarea class="form-control ms-2 " placeholder="Leave a comment here" id="floatingTextarea" style="width: 100%; overflow: hidden; resize: none;"></textarea>
                                            <label for="floatingTextarea">Viết bình luận...</label>
                                        </div>
                                    </div>
                                    <button type="button" class="btn-comment btn btn-info px-2 py-0 float-end mt-1 fw-normal " style="display: none; border:none; color: #333;">Bình luận</button>
                                </div>
                            <?php endif; ?>
                            <!-- Danh sách comment -->
                            <div class="list-comment">

                            </div>

                        </div>
                    </div>
                    <!-- End Single Content -->
                    <!-- Start Single Content -->
                    <div class="product_tab_content tab-pane" id="reviews" role="tabpanel">
                        <div class="review_address_inner mt-30">
                            <!-- Start Single Review -->
                            <div class="pro_review">
                                <div class="review_thumb">
                                    <img alt="review images" src="assets/images/other/reviewer-60x60.jpg">
                                </div>
                                <div class="review_details">
                                    <div class="review_info mb-10">
                                        <ul class="product-rating d-flex mb-10">
                                            <li><span class="icon-star"></span></li>
                                            <li><span class="icon-star"></span></li>
                                            <li><span class="icon-star"></span></li>
                                            <li><span class="icon-star"></span></li>
                                            <li><span class="icon-star"></span></li>
                                        </ul>
                                        <h5>Admin - <span> November 19, 2019</span></h5>

                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin in viverra ex,
                                        vitae vestibulum arcu. Duis sollicitudin metus sed lorem commodo, eu dapibus
                                        libero interdum. Morbi convallis viverra erat, et aliquet orci congue vel.
                                        Integer in odio enim. Pellentesque in dignissim leo. Vivamus varius ex sit
                                        amet quam tincidunt iaculis.</p>
                                </div>
                            </div>
                            <!-- End Single Review -->
                        </div>
                        <!-- Start RAting Area -->
                        <div class="rating_wrap mt-50">
                            <h5 class="rating-title-1">Add a review </h5>
                            <p>Your email address will not be published. Required fields are marked *</p>
                            <h6 class="rating-title-2">Your Rating</h6>
                            <div class="rating_list">
                                <div class="review_info mb-10">
                                    <ul class="product-rating d-flex mb-10">
                                        <li><span class="icon-star"></span></li>
                                        <li><span class="icon-star"></span></li>
                                        <li><span class="icon-star"></span></li>
                                        <li><span class="icon-star"></span></li>
                                        <li><span class="icon-star"></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End RAting Area -->
                        <div class="comments-area comments-reply-area">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="#" class="comment-form-area">
                                        <div class="row comment-input">
                                            <div class="col-md-6 comment-form-author mt-15">
                                                <label>Name <span class="required">*</span></label>
                                                <input type="text" required="required" name="Name">
                                            </div>
                                            <div class="col-md-6 comment-form-email mt-15">
                                                <label>Email <span class="required">*</span></label>
                                                <input type="text" required="required" name="email">
                                            </div>
                                        </div>
                                        <div class="comment-form-comment mt-15">
                                            <label>Comment</label>
                                            <textarea class="comment-notes" required="required"></textarea>
                                        </div>
                                        <div class="comment-form-submit mt-15">
                                            <input type="submit" value="Submit" class="comment-submit">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Content -->
                </div>
            </div>
        </div>
    </div>
</div>