/**
 * Theme: Lunoz - Admin & Dashboard Template
 * Author: Myra Studio
 * File: Main Js
 */

!(function (t) {
  "use strict";
  t("#side-menu").metisMenu(),
    t("#vertical-menu-btn").on("click", function () {
      t("body").toggleClass("enable-vertical-menu");
    }),
    t(".menu-overlay").on("click", function () {
      t("body").removeClass("enable-vertical-menu");
    }),
    t("#sidebar-menu a").each(function () {
      var a = window.location.href.split(/[?#]/)[0];
      this.href == a &&
        (t(this).addClass("active"),
        t(this).parent().addClass("mm-active"),
        t(this).parent().parent().addClass("mm-show"),
        t(this).parent().parent().prev().addClass("mm-active"),
        t(this).parent().parent().parent().addClass("mm-active"),
        t(this).parent().parent().parent().parent().addClass("mm-show"),
        t(this)
          .parent()
          .parent()
          .parent()
          .parent()
          .parent()
          .addClass("mm-active"));
    }),
    t(function () {
      t('[data-toggle="tooltip"]').tooltip();
    }),
    t(function () {
      t('[data-toggle="popover"]').popover();
    }),
    Waves.init();
})(jQuery);
// Toast Message
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
// check Forms
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
//
// Cập nhập trạng thái đơn hàng
var id_don_hang;
var that;
$(document).on("click", ".order-btn button", function () {
  that = $(this);
  id_don_hang = $(this).val();
  $.post(
    "view/don-hang/popup.php",
    {
      id_don_hang: id_don_hang,
    },
    function (data, textStatus, jqXHR) {
      $(".modal-body select").html(data);
    }
  );
});
$(".modal-footer").on("click", ".btn.btn-primary", function () {
  let trang_thai_don = $(".modal-body .form-control")
    .prop("selected", true)
    .val();
  $.post(
    "view/don-hang/update.php",
    {
      trang_thai_don: trang_thai_don,
      id_don_hang: id_don_hang,
    },
    function (data, textStatus, jqXHR) {
      $(that).closest("tr").find(".badge.badge-pill.badge-info").html(data);
      alert("Cập nhập trạng thái thành công");
    }
  );
});
