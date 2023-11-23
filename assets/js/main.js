(function ($) {
  "use strict";

  /*--
Menu Sticky                                                                                                                                                                                                                                                                                                                                                                                                                                                                     -----------------------------------*/
  var windows = $(window);
  var sticky = $(".header-sticky");

  windows.on("scroll", function () {
    var scroll = windows.scrollTop();
    if (scroll < 300) {
      sticky.removeClass("is-sticky");
    } else {
      sticky.addClass("is-sticky");
    }
  });

  /*--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      Off Canvas
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  -------------------------------------------*/
  $(".off-canvas-btn").on("click", function () {
    $("body").addClass("fix");
    $(".off-canvas-wrapper").addClass("open");
  });

  $(".btn-close-off-canvas,.off-canvas-overlay").on("click", function () {
    $("body").removeClass("fix");
    $(".off-canvas-wrapper").removeClass("open");
  });

  /*-- 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      Countdown Activation 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  ------------------------------------*/
  $("[data-countdown]").each(function () {
    var $this = $(this),
      finalDate = $(this).data("countdown");
    $this.countdown(finalDate, function (event) {
      $this.html(
        event.strftime(
          '<div class="single-countdown"><span class="single-countdown__time">%D</span><span class="single-countdown__text">Days</span></div><div class="single-countdown"><span class="single-countdown__time">%H</span><span class="single-countdown__text">Hours</span></div><div class="single-countdown"><span class="single-countdown__time">%M</span><span class="single-countdown__text">Mins</span></div><div class="single-countdown"><span class="single-countdown__time">%S</span><span class="single-countdown__text">Secs</span></div>'
        )
      );
    });
  });

  /*---
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   Category Menu Active
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  ---------------------------- */
  $(".categories_title").on("click", function () {
    $(this).toggleClass("active");
    $(".categories_menu_toggle").slideToggle("medium");
  });

  $(".categories-more-less").on("click", function () {
    $(".hide-child").slideToggle();
    $(this).toggleClass("rx-change");
  });

  /* ---------------------
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   Category menu
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  --------------------- */
  function categorySubMenuToggle() {
    $(".categories_menu_toggle li.menu_item_children > a").on(
      "click",
      function () {
        if ($(window).width() < 991) {
          $(this).removeAttr("href");
          var element = $(this).parent("li");
          if (element.hasClass("open")) {
            element.removeClass("open");
            element.find("li").removeClass("open");
            element.find("ul").slideUp();
          } else {
            element.addClass("open");
            element.children("ul").slideDown();
            element.siblings("li").children("ul").slideUp();
            element.siblings("li").removeClass("open");
            element.siblings("li").find("li").removeClass("open");
            element.siblings("li").find("ul").slideUp();
          }
        }
      }
    );
    $(".categories_menu_toggle li.menu_item_children > a").append(
      '<span class="expand"></span>'
    );
  }
  categorySubMenuToggle();

  /*-- 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      Responsive Mobile Menu
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  --------------------------------------------------*/
  //Variables
  var $offCanvasNav = $(".mobile-menu"),
    $offCanvasNavSubMenu = $offCanvasNav.find(".dropdown");

  //Add Toggle Button With Off Canvas Sub Menu
  $offCanvasNavSubMenu
    .parent()
    .prepend('<span class="menu-expand"><i></i></span>');

  //Close Off Canvas Sub Menu
  $offCanvasNavSubMenu.slideUp();

  //Category Sub Menu Toggle
  $offCanvasNav.on("click", "li a, li .menu-expand", function (e) {
    var $this = $(this);
    if (
      $this
        .parent()
        .attr("class")
        .match(/\b(menu-item-has-children|has-children|has-sub-menu)\b/) &&
      ($this.attr("href") === "#" || $this.hasClass("menu-expand"))
    ) {
      e.preventDefault();
      if ($this.siblings("ul:visible").length) {
        $this.parent("li").removeClass("active");
        $this.siblings("ul").slideUp();
      } else {
        $this.parent("li").addClass("active");
        $this
          .closest("li")
          .siblings("li")
          .removeClass("active")
          .find("li")
          .removeClass("active");
        $this.closest("li").siblings("li").find("ul:visible").slideUp();
        $this.siblings("ul").slideDown();
      }
    }
  });

  /*--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      Hero Slider
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  --------------------------------------------*/

  var heroSlider = $(".hero-slider-one");
  heroSlider.slick({
    arrows: true,
    autoplay: false,
    autoplaySpeed: 5000,
    dots: false,
    pauseOnFocus: false,
    pauseOnHover: false,
    fade: true,
    infinite: true,
    slidesToShow: 1,
    prevArrow:
      '<button type="button" class="slick-prev"> <i class="fa fa-angle-left"> </i></button>',
    nextArrow:
      '<button type="button" class="slick-next"><i class="fa fa-angle-right"> </i></button>',
    responsive: [
      {
        breakpoint: 767,
        settings: {
          dots: false,
        },
      },
    ],
  });

  /*--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      Product Slider
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  --------------------------------------------*/
  var product_4 = $(".product-active-lg-4");
  product_4.slick({
    dots: false,
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: false,
    prevArrow:
      '<button type="button" class="slick-prev"> <i class="fa fa-angle-left"> </i></button>',
    nextArrow:
      '<button type="button" class="slick-next"><i class="fa fa-angle-right"> </i></button>',
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 479,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });
  /*--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      Product Slider
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  --------------------------------------------*/
  var product_row_4 = $(".product-active-row-4");
  product_row_4.slick({
    dots: false,
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    rows: 2,
    autoplay: false,
    prevArrow:
      '<button type="button" class="slick-prev"> <i class="fa fa-angle-left"> </i></button>',
    nextArrow:
      '<button type="button" class="slick-next"><i class="fa fa-angle-right"> </i></button>',
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 479,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });

  /*-- 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      brand Active Two 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  -----------------------------*/
  var brandActive = $(".our-brand-active");
  brandActive.slick({
    dots: false,
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: false,
    prevArrow: false,
    nextArrow: false,
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 4,
        },
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
        },
      },
      {
        breakpoint: 479,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });
  /*-- 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      Testimonial Two Slider 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  -----------------------------*/
  var testimonialSliderTwo = $(".testimonial-two");
  testimonialSliderTwo.slick({
    arrows: false,
    autoplay: true,
    autoplaySpeed: 7000,
    dots: false,
    pauseOnFocus: false,
    pauseOnHover: false,
    infinite: true,
    slidesToShow: 2,
    slidesToScoll: 1,
    prevArrow: false,
    nextArrow: false,
  });

  /* Product Detals Color */
  $(".watch-color li").on("click", function () {
    $(this).addClass("checked").siblings().removeClass("checked");
  });

  /*---------------------------
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  	Count Down Timer
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  ----------------------------*/
  $("[data-countdown]").each(function () {
    var $this = $(this),
      finalDate = $(this).data("countdown");
    $this.countdown(finalDate, function (event) {
      $this.html(
        event.strftime(
          '<span class="cdown day"><span class="time-count">%-D</span> <p>Days</p></span> <span class="cdown hour"><span class="time-count">%-H</span> <p>Hours</p></span> <span class="cdown minutes"><span class="time-count">%M</span> <p>mins</p></span> <span class="cdown second"><span class="time-count">%S</span> <p>secs</p></span>'
        )
      );
    });
  });

  /*----------
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      price-slider active
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  -------------------------------*/
  $("#price-slider").slider({
    range: true,
    min: 0,
    max: 120,
    values: [20, 115],
    slide: function (event, ui) {
      $("#min-price").val("$" + ui.values[0]);
      $("#max-price").val("$" + ui.values[1]);
    },
  });
  $("#min-price").val("$" + $("#price-slider").slider("values", 0));
  $("#max-price").val("$" + $("#price-slider").slider("values", 1));

  /*--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      Category menu Activation
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  ------------------------------*/
  $(".category-sub-menu li.has-sub > a").on("click", function () {
    $(this).removeAttr("href");
    var element = $(this).parent("li");
    if (element.hasClass("open")) {
      element.removeClass("open");
      element.find("li").removeClass("open");
      element.find("ul").slideUp();
    } else {
      element.addClass("open");
      element.children("ul").slideDown();
      element.siblings("li").children("ul").slideUp();
      element.siblings("li").removeClass("open");
      element.siblings("li").find("li").removeClass("open");
      element.siblings("li").find("ul").slideUp();
    }
  });

  // prodct details slider active
  $(".product-large-slider").slick({
    fade: true,
    arrows: false,
    asNavFor: ".product-nav",
  });

  // product details slider nav active
  $(".product-nav").slick({
    slidesToShow: 4,
    asNavFor: ".product-large-slider",
    centerMode: true,
    centerPadding: 0,
    focusOnSelect: true,
    prevArrow:
      '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
    nextArrow:
      '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
    responsive: [
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 3,
        },
      },
    ],
  });

  // ScrollUp Active
  $(".nice-select").niceSelect();

  // Image zoom effect
  $(".img-zoom").zoom();

  // Fancybox Active
  $('[data-fancybox="images"]').fancybox({
    hash: false,
  });

  /*--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      showlogin toggle function
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  --------------------------*/
  $("#showlogin").on("click", function () {
    $("#checkout-login").slideToggle(500);
  });

  /*--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      showcoupon toggle function
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  --------------------------*/
  $("#showcoupon").on("click", function () {
    $("#checkout-coupon").slideToggle(500);
  });

  /*--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      Checkout 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  --------------------------*/
  $("#chekout-box").on("change", function () {
    $(".account-create").slideToggle("100");
  });

  /*-- 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      Checkout 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  ---------------------------*/
  $("#chekout-box-2").on("change", function () {
    $(".ship-box-info").slideToggle("100");
  });

  /*--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      ScrollUp Active
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  -----------------------------------*/
  $.scrollUp({
    scrollText: '<i class="fa fa-angle-up"></i>',
    easingType: "linear",
    scrollSpeed: 900,
    animation: "fade",
  });
})(jQuery);
// click size
$(document).on(
  "click",
  ".product__color__select label, .shop__sidebar__size label, .product__details__option__size label",
  function () {
    $(
      ".product__color__select label, .shop__sidebar__size label, .product__details__option__size label"
    ).removeClass("active");
    $(this).addClass("active");
  }
);
// click màu
$(document).on("click", ".product__details__option__color label", function () {
  $(".product__details__option__color label").removeClass("active_color");
  $(this).addClass("active_color");
});
//======================================================================Ẩn hiện mật khẩu=====================================================================
let faEyes = document.querySelectorAll(".fa-eye");
let faEyeSlashs = document.querySelectorAll(".fa-eye-slash");
let inputPass = document.querySelectorAll(".js-input-pass");
faEyes.forEach(function (element, number) {
  element.addEventListener("click", function () {
    inputPass[number].type = "password";
    faEyeSlashs[number].style = "display: inline-block";
    element.style = "display: none";
  });
});
faEyeSlashs.forEach(function (element, number) {
  element.addEventListener("click", function () {
    inputPass[number].type = "text";
    faEyes[number].style = "display: inline-block";
    element.style = "display: none";
  });
});
//======================================================================Toast Message=====================================================================

const main = document.getElementById("toast-js");
if (main) {
  const toast = document.querySelector(".toast-js");
  const delay = (3000 / 1000).toFixed(2);
  // Auto remove toast
  const autoRemoveId = setTimeout(function () {
    main.removeChild(toast);
  }, 3000 + 1000);

  // Remove toast when clicked
  toast.onclick = function (e) {
    if (e.target.closest(".toast__close-js")) {
      main.removeChild(toast);
      clearTimeout(autoRemoveId);
    }
  };
  toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;
}
//======================================================================Check Forms=====================================================================
function checkForms() {
  let formsElements = document.getElementById("myForms");
  let formsData = new FormData(formsElements);
  let emtyForms = false;
  formsData.forEach(function (item, index) {
    if (item == null || item == "") {
      formsElements[index].classList.add("is-invalid");
      emtyForms = true;
    } else {
      formsElements[index].classList.add("is-valid");
      formsElements[index].classList.remove("is-invalid");
    }
  });
  return !emtyForms;
}

function checkForms2() {
  let formsElements = document.getElementById("myForms2");
  let formsData = new FormData(formsElements);
  let emtyForms = false;
  formsData.forEach(function (item, index) {
    if (item == null || item == "") {
      formsElements[index].classList.add("is-invalid");
      emtyForms = true;
    } else {
      formsElements[index].classList.add("is-valid");
      formsElements[index].classList.remove("is-invalid");
    }
  });
  return !emtyForms;
}
//======================================================================Popup thêm giỏ hàng=====================================================================
/* .single-product-area => vị trí muốn áp dụng sự kiện
"click", ".quick-view" => khi click vào .quick-view
$(this).attr("href");  => lấy ra href của đối tượng được click
 "assets/dao/popup-product.php", => file sử lý về php & giao diện
 id_san_pham: idSanPham  => name và giá trị để file php nhận $_POST['id_san_pham']
 $(".modal-content").html(data); => .modal-content nơi load data
*/
$(document).on("click", ".single-product-area .quick-view", function () {
  var idSanPham = $(this).attr("href");
  $.post(
    "assets/jquery/popup-product.php",
    { id_san_pham: idSanPham },
    function (data, textStatus, jqXHR) {
      $(".modal-content").html(data);
    }
  );
});
//======================================================================Load số lượng icon cart=====================================================================
function loadSoLuongIconCart() {
  $(document).ready(function () {
    var id_kh = $('.menu-user-hover input[name="id_kh"]').val();
    if (id_kh != undefined) {
      $.post(
        "assets/jquery/so-luong-cart.php",
        {
          id_kh: id_kh,
        },
        function (data, textStatus, jqXHR) {
          $(".cart-total").text(data);
        }
      );
    }
  });
}
loadSoLuongIconCart();
//======================================================================Ấn thêm vào giỏ hàng=====================================================================
$(document).on("click", ".product-details-inner .addCart", function () {
  var id_kh = $('.menu-user-hover input[name="id_kh"]').val();

  if (id_kh != undefined || id_kh != null) {
    var id_san_pham = $(".product-sku").children("span").text();
    var id_size = $(
      '.product__details__option__size input[name="id_size"]:checked'
    ).val();
    var id_mau = $(
      '.product__details__option__color input[name="id_mau"]:checked'
    ).val();
    var so_luong = $('.cart-plus-minus input[name="quantity"]').val();
    if (id_size == undefined || id_mau == undefined) {
      alert("Bạn phải chọn màu và size!");
    } else {
      $.post(
        "assets/jquery/add-cart.php",
        {
          id_san_pham: id_san_pham,
          id_size: id_size,
          id_mau: id_mau,
          so_luong: so_luong,
          id_kh: id_kh,
        },
        function (params) {
          console.log(params);
        }
      );
      loadSoLuongIconCart();
      alert("Thêm thành công");
    }
  } else alert("Bạn phải đăng nhập mới thêm được sản phẩm vào giỏ hàng");
});
//======================================================================Check size sản phẩm còn không=====================================================================
$(document).on(
  "click",
  '.product__details__option__size input[name="id_size"]',
  function () {
    var id_size = $(this).val();
    var id_san_pham = $(".product-sku").children("span").text();
    $.post(
      "assets/jquery/check-size-mau/check-size.php",
      {
        id_san_pham: id_san_pham,
        id_size: id_size,
      },
      function (data, textStatus, jqXHR) {
        if (data == undefined || data == null || data == "") {
          alert("Hiện tại sản phẩm đang hết size này");
        }
      }
    );
  }
);
//======================================================================Check màu sản phẩm còn không=====================================================================
$(document).on(
  "click",
  '.product__details__option__color input[name="id_mau"]',
  function () {
    var id_mau = $(this).val();
    var id_san_pham = $(".product-sku").children("span").text();
    $.post(
      "assets/jquery/check-size-mau/check-mau.php",
      {
        id_san_pham: id_san_pham,
        id_mau: id_mau,
      },
      function (data, textStatus, jqXHR) {
        if (data == undefined || data == null || data == "") {
          alert("Hiện tại sản phẩm đang hết màu này");
        }
      }
    );
  }
);
//======================================================================Check số lượng sản phẩm còn không=====================================================================
$(document).on("input", '.cart-plus-minus input[name="quantity"]', function () {
  var so_luong = $(this).val();
  var id_san_pham = $(".product-sku").children("span").text();
  var id_size = $(
    '.product__details__option__size input[name="id_size"]:checked'
  ).val();
  var id_mau = $(
    '.product__details__option__color input[name="id_mau"]:checked'
  ).val();
  $.post(
    "assets/jquery/check-size-mau/check-soluong.php",
    {
      id_san_pham: id_san_pham,
      id_mau: id_mau,
      id_size: id_size,
    },
    function (data, textStatus, jqXHR) {
      console.table({
        "Id size": id_size,
        "Id màu": id_mau,
        "Id sản phẩm": id_san_pham,
        "Số lượng nhập": so_luong,
        "Số lượng còn trong kho": data,
      });
      if (parseInt(so_luong, 10) > parseInt(data, 10)) {
        console.log("Hello");
        let slTon = data == "" ? 0 : data;
        alert(
          `Hiện tại số lượng còn: ${slTon} sản phẩm đối với sản phẩm có size,màu này`
        );
      }
    }
  );
});
//======================================================================Load giỏ hàng=====================================================================
function loadPageCart() {
  var id_kh = $('.menu-user-hover input[name="id_kh"]').val();
  $.post(
    "assets/jquery/cart.php",
    {
      id_kh: id_kh,
    },
    function (data, textStatus, jqXHR) {
      $(".main-content-wrap.section-ptb.cart-page").html(data);
    }
  );
}
let elementCart = document.querySelector(
  ".main-content-wrap.section-ptb.cart-page"
);
//======================================================================Nếu tồn tại pageCart thì load danh sách sản phẩm giỏ hàng=====================================================================
if (elementCart) {
  loadPageCart();
}
//======================================================================Thay đổi số lượng trong giỏ hàng=====================================================================
$(".main-content-wrap.section-ptb.cart-page").on(
  "input",
  ".quantity .inputQuantity",
  function () {
    var quantity = $(this).val();
    var id_gio_hang = $(this)
      .closest(".cart-form")
      .find('input[name="id_gio_hang"]')
      .val();
    $.post(
      "assets/jquery/cart.php",
      {
        so_luong: quantity,
        id_gio_hang: id_gio_hang,
      },
      function (data, textStatus, jqXHR) {
        loadPageCart();
      }
    );
  }
);
//======================================================================Xoá sản phẩm trong giỏ hàng=====================================================================
$(".main-content-wrap.section-ptb.cart-page").on(
  "click",
  "#delete",
  function (e) {
    e.preventDefault();
    let href = $(this).attr("href");
    $.post(
      "assets/jquery/cart.php",
      {
        delete: href,
      },
      function (data, textStatus, jqXHR) {
        loadPageCart();
        loadSoLuongIconCart();
      }
    );
  }
);
$(".main-content-wrap.section-ptb.cart-page").on(
  "click",
  "#btn-delete",
  function () {
    let inputCheckbox = document.querySelectorAll("input[type=checkbox]");
    let arr_id_gio_hang = [];
    inputCheckbox.forEach(function (item) {
      if (item.checked) {
        console.log(item.value);
        arr_id_gio_hang.push(item.value);
      }
    });
    console.log(arr_id_gio_hang);
    $.post(
      "assets/jquery/cart.php",
      {
        delete: arr_id_gio_hang,
      },
      function (data, textStatus, jqXHR) {
        loadPageCart();
        loadSoLuongIconCart();
      }
    );
  }
);
//======================================================================Call api tỉnh thành Việt Nam=====================================================================
const host = "https://provinces.open-api.vn/api/";
var callAPI = (api) => {
  return axios.get(api).then((response) => {
    renderData(response.data, "city");
  });
};
callAPI("https://provinces.open-api.vn/api/?depth=1");
var callApiDistrict = (api) => {
  return axios.get(api).then((response) => {
    renderData(response.data.districts, "district");
  });
};
var callApiWard = (api) => {
  return axios.get(api).then((response) => {
    renderData(response.data.wards, "ward");
  });
};

var renderData = (array, select) => {
  let row = ' <option disable value="">Chọn</option>';
  array.forEach((element) => {
    row += `<option data-id="${element.code}" value="${element.name}">${element.name}</option>`;
  });
  document.querySelector("#" + select).innerHTML = row;
};

$("#city").change(() => {
  callApiDistrict(
    host + "p/" + $("#city").find(":selected").data("id") + "?depth=2"
  );
});
$("#district").change(() => {
  callApiWard(
    host + "d/" + $("#district").find(":selected").data("id") + "?depth=2"
  );
});
$("#ward").change(() => {});

var diaChi = "";
$(".billing-details-wrap").on("change", "select", function () {
  if ($("#ward").prop("selected", true)) {
    diaChi = "";
    diaChi += $("#city").prop("selected", true).val() + ", ";
    diaChi += $("#district").prop("selected", true).val() + ", ";
    diaChi += $("#ward").prop("selected", true).val();
  }
});
//======================================================================Đặt hàng=====================================================================
$(".payment-content").on("click", "input[name='payment']", function () {
  let that = this.value;
  $(".order-button-payment").on("click", 'input[type="submit"]', function (e) {
    let action = that;
    let id_don_hang = Math.floor(Math.random() * 99999) + 11111;
    let ho_ten = $('.billing-details-wrap input[name="ho_ten"]').val();
    let phone = $('.billing-details-wrap input[name="phone"]').val();
    let note = $(".billing-details-wrap textarea").val();
    let total_quantity = $(".order-total .amount").text();
    let total_price = total_quantity.replace(/[,đ]/g, "");
    switch (action) {
      case "shipcod":
        let id_kh = $('.menu-user-hover input[name="id_kh"]').val();
        $.post(
          "assets/jquery/order.php",
          {
            id_don_hang: id_don_hang,
            id_kh: id_kh,
            dia_chi_giao: diaChi,
            ho_ten: ho_ten,
            phone: phone,
            note: note,
            total_price: total_price,
          },
          function (data, textStatus, jqXHR) {
            alert("Đặt hàng thành công!");
          }
        );
        break;

      default:
        alert("Thao tác thất bại!");
        break;
    }
  });
});
//======================================================================Lịch sử mua hàng=====================================================================
let element_history_cart = $(".history-cart");
if (element_history_cart) {
  let value = $(".history-cart nav .nav-link.active").val();
  var id_kh = $('.menu-user-hover input[name="id_kh"]').val();
  console.log(value);
  $.post(
    "assets/jquery/history-order.php",
    {
      status: value,
      id_kh: id_kh,
    },
    function (data, textStatus, jqXHR) {
      $(".history-cart #nav-tabContent").html(data);
    }
  );
}
$(".history-cart").on("click", ".nav-link.flex-fill", function () {
  let value = $(this).val();
  var id_kh = $('.menu-user-hover input[name="id_kh"]').val();
  console.log(value);
  $.post(
    "assets/jquery/history-order.php",
    {
      status: value,
      id_kh: id_kh,
    },
    function (data, textStatus, jqXHR) {
      if (data == undefined || data == null || data == "") {
        $(".history-cart #nav-tabContent").html(data);
      } else $(".history-cart #nav-tabContent").html(data);
    }
  );
});
