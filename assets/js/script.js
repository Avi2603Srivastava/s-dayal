$(document).ready(function () {
  $('.webMainMenu li a').on('click', function () {
    localStorage.setItem('menuName', $(this).text());
  });
  $('.yearDropdown').hide();
  $('.initiateYearDropdown').on('click', function () {
    $('.yearDropdown').slideToggle(200);
    if ($('.yearDropdown li:first').text().trim() !== 'Select Years') {
      $('.yearDropdown').prepend('<li data-val="0">Select Years</li>');
    }
  });
  $('.yearDropdown').on('click', 'li', function () {
    $('.initiateYearDropdown').text($(this).text()).attr('data-val', $(this).attr('data-val'));
    $('.yearDropdown').slideToggle(200);
    if ($('.yearDropdown li:first').text().trim() !== 'Select Years') {
      $('.yearDropdown').prepend('<li data-val="0">Select Years</li>');
    }
  });
  $(document).on('click', function (e) {
    var dropdown = $('.yearDropdown');
    var initiateYearDropdown = $('.initiateYearDropdown');
    if (!dropdown.is(e.target) && !initiateYearDropdown.is(e.target) && dropdown.has(e.target).length === 0) {
      dropdown.slideUp(200);
    }
  });
  $('.dropdown-custom').hover(
    function () {
    },
    function () {
      $('.yearDropdown').slideUp(200);
    }
  );


  let typingTimer;
  const doneTypingInterval = 10000;
  $(".searchInput").on("keyup", function () {
    clearTimeout(typingTimer);
    var from = $(this).attr('from');
    var furl = from == "blog" ? "../searchData.php" : "searchData.php";
    var searchParam = from == "blog" ? "blogSearchParam" : "gallerySearchParam";
    $(".searchBox").show();
    $(".finalSearchData").empty().append('<li><a href="javascript:void(0)">Searching...</a></li>');

    var str = $(".searchInput").val().trim();
    if (str !== "" && str !== undefined && str !== null && str.length >= 3) {
      if (searchParam == "blogSearchParam") {
        $.ajax({
          url: furl,
          type: "POST",
          data: { blogSearchParam: str },
          success: function (res) {
            if (res !== "" && res !== undefined && res !== null) {
              $(".finalSearchData").empty().append(res);
              $(".searchBox").show();
            } else {
              $(".finalSearchData").empty().append('<li><a href="javascript:void(0)">No Result Found...</a></li>');
              $(".searchBox").show();
            }
          },
          error: function (error) {
            console.log(error);
          },
        });
      } else if (searchParam == "gallerySearchParam") {
        $.ajax({
          url: furl,
          type: "POST",
          data: { gallerySearchParam: str },
          success: function (res) {
            if (res !== "" && res !== undefined && res !== null) {
              $(".finalSearchData").empty().append(res);
              $(".searchBox").show();
            } else {
              $(".finalSearchData").empty().append('<li><a href="javascript:void(0)">No Result Found...</a></li>');
              $(".searchBox").show();
            }
          },
          error: function (error) {
            console.log(error);
          },
        });
      }
    } else {
      $(".searchBox").hide();
      $(".finalSearchData").empty().append('<li><a href="javascript:void(0)">Searching...</a></li>');
    }
  });
  $(".searchInput").on("keydown", function () {
    clearTimeout(typingTimer);
    $(".searchBox").hide();
    $(".finalSearchData").empty().append('<li><a href="javascript:void(0)">Searching...</a></li>');
  });
});
// slider scripts start and submenu code
document.addEventListener("DOMContentLoaded", function () {
  let currentPath = window.location.pathname.split('/').pop();
  let menuLinks = document.querySelectorAll("#leftSideMenu a");
  let menuMobileLinks = document.querySelectorAll("#navbarSupportedContent .navigation  a");

  menuLinks.forEach(link => {
    if (link.getAttribute("href") === currentPath) {
      link.classList.add("active-leftPage");

      // Get the closest parent <ul> (submenu)
      let activeLi = document.querySelector(".active-leftPage");
      if (activeLi && activeLi.parentNode.parentNode.classList.contains("leftMenu-drop")) {
        activeLi.parentNode.parentNode.style.display = "block";
        activeLi.parentNode.parentNode.parentNode.classList.add("leftMenuBtnActive");
      }
    }
  });

  menuMobileLinks.forEach(link => {
    if (link.getAttribute("href") === currentPath) {
      link.classList.add("active-leftPage");
      $('.active-leftPage').parent().parent().slideDown()
      $('.active-leftPage').parent().parent().parent().find('.dropdown-btn').addClass('open');
      $('.current ul').slideDown(500);
    }
  });

});
$(".link").on("click", function () {
  var $submenu_first = $(this).next(".submenu");
  var $arrow_first = $(this).find(".arrow-up");
  if ($submenu_first.is(":visible")) {
    $submenu_first.slideUp();
    $arrow_first.css("transform", "rotate(0deg)");
  } else {
    $(".submenu").slideUp();
    $submenu_first.slideDown();
    $arrow_first.css("transform", "rotate(180deg)");
  }
});

$(".link_second").on("click", function () {
  var $submenu = $(this).next(".submenu_second");
  var $arrow = $(this).find(".arrow-up-second");
  if ($submenu.is(":visible")) {
    $submenu.slideUp();
    $arrow.css("transform", "rotate(0deg)");
  } else {
    $(".submenu_second").slideUp();
    $submenu.slideDown();
    $arrow.css("transform", "rotate(180deg)");
  }
});

// slider scripts end

!(function (e) {
  "use strict";
  function t() {
    if (
      e(".industries-covered .outer-box").length &&
      e(window).width() >= 1200
    ) {
      var t = (e(window).width() - 1200) / 2;
      e(".industries-covered .outer-box").css("margin-right", t);
    }
  }
  function n() {
    if (e(".main-header").length) {
      var t = e(window).scrollTop(),
        n = e(".main-header"),
        a = e(".scroll-to-top"),
        o = e(".main-header .sticky-header");
      t > 300
        ? (n.addClass("fixed-header"),
          o.addClass("animated slideInDown"),
          a.fadeIn(300))
        : (n.removeClass("fixed-header"),
          o.removeClass("animated slideInDown"),
          a.fadeOut(300));
    }
  }
  if (
    (t(),
      e(".time-countdown").length &&
      e(".time-countdown").each(function () {
        var t = e(this),
          n = e(this).data("countdown");
        t.countdown(n, function (t) {
          e(this).html(
            t.strftime(
              '<div class="counter-column"><span class="count">%D</span>Days</div> <div class="counter-column"><span class="count">%H</span>Hours</div>  <div class="counter-column"><span class="count">%M</span>Minutes</div>  <div class="counter-column"><span class="count">%S</span>Seconds</div>'
            )
          );
        });
      }),
      e(".preloader-close").length &&
      e(".preloader-close").on("click", function () {
        e(".loader-wrap").delay(200).fadeOut(500);
      }),
      (function (t) {
        var n = document.createElement("li");
        n.classList.add("home-icon");
        var a = document.createElement("a");
        a.href = "#";
        var o = document.createElement("img");
        (o.src =
          "https://resources.edunexttechnologies.com/web-data/modern-academy/images/home-icon-n.png"),
          (o.alt = "Home Logo"),
          a.appendChild(o),
          n.appendChild(a);
        var s = document.getElementsByClassName("addHome");
        if (s.length > 0)
          for (var i = 0; i < s.length; i++) {
            var l = n.cloneNode(!0);
            s[i].insertBefore(l, s[i].firstChild);
          }
        let r = window.location.href.split("/").reverse()[0];
        t.find("li").each(function () {
          let t = e(this).find("a");
          e(t).attr("href") == r && e(this).addClass("current");
        }),
          t.children("li").each(function () {
            e(this).find(".current").length && e(this).addClass("current");
          }),
          "" == r && t.find("li").eq(0).addClass("current");
      })(e(".main-menu").find(".navigation")),
      e(window).scroll(function () {
        e(this).scrollTop() > 700
          ? e(".home-menu").removeClass("menuup")
          : e(".home-menu").addClass("menuup");
      }),
      n(),
      e(".main-header li.dropdown ul").length &&
      e(".main-header .navigation li.dropdown").append(
        '<div class="dropdown-btn"><span class="fa fa-angle-right"></span></div>'
      ),
      e(".hidden-sidebar").length)
  ) {
    var a = e(".sidemenu-nav-toggler"),
      o = e(".hidden-sidebar"),
      s = e(".nav-overlay"),
      i = e(".hidden-sidebar-close");
    function t() {
      TweenMax.to(o, 0.6, {
        force3D: !1,
        left: "-480px",
        ease: Expo.easeInOut,
      }),
        o.addClass("close-sidebar"),
        s.fadeOut(500);
    }
    a.on("click", function () {
      o.hasClass("close-sidebar")
        ? (TweenMax.to(o, 0.6, {
          force3D: !1,
          left: "0",
          ease: Expo.easeInOut,
        }),
          o.removeClass("close-sidebar"),
          s.fadeIn(500))
        : t();
    }),
      s.on("click", function () {
        t();
      }),
      i.on("click", function () {
        t();
      });
  }
  if (e(".nav-overlay").length) {
    var l = e(".nav-overlay .cursor"),
      r = e(".nav-overlay .cursor-follower"),
      c = 0,
      d = 0,
      u = 0,
      p = 0;
    TweenMax.to({}, 0.016, {
      repeat: -1,
      onRepeat: function () {
        (c += (u - c) / 9),
          (d += (p - d) / 9),
          TweenMax.set(r, { css: { left: c - 22, top: d - 22 } }),
          TweenMax.set(l, { css: { left: u, top: p } });
      },
    }),
      e(document).on("mousemove", function (e) {
        var t = window.pageYOffset || document.documentElement.scrollTop;
        (u = e.pageX), (p = e.pageY - t);
      }),
      e("button, a").on("mouseenter", function () {
        l.addClass("active"), r.addClass("active");
      }),
      e("button, a").on("mouseleave", function () {
        l.removeClass("active"), r.removeClass("active");
      }),
      e(".nav-overlay").on("mouseenter", function () {
        l.addClass("close-cursor"), r.addClass("close-cursor");
      }),
      e(".nav-overlay").on("mouseleave", function () {
        l.removeClass("close-cursor"), r.removeClass("close-cursor");
      });
  }
  if (e(".mobile-menu").length) {
    e(".mobile-menu .menu-box").niceScroll({
      cursorborder: "none",
      cursorborderradius: "0px",
      touchbehavior: !0,
      bouncescroll: !1,
      scrollspeed: 120,
      mousescrollstep: 90,
      horizrailenabled: !0,
      preservenativescrolling: !0,
      cursordragontouch: !0,
    });
    var h = e(".main-header .nav-outer .main-menu").html();
    e(".mobile-menu .menu-box .menu-outer").append(h),
      e(".sticky-header .main-menu").append(h),
      e(".mobile-menu li.dropdown").on("click", function (event) {
        event.stopPropagation();
        let menuThis = e(this);
        if (menuThis.hasClass('subMenu')) {
          menuThis.children('.sub-menu').slideToggle(500);
          menuThis.children('.dropdown-btn').toggleClass("open");
          return false;
        } else {
          e(".mobile-menu li.dropdown").not(menuThis).children('.dropdown-btn').removeClass("open");
          e(".mobile-menu li.dropdown").not(menuThis).children('ul').slideUp(500);
          menuThis.children('.dropdown-btn').toggleClass("open");
          menuThis.children('ul').slideToggle(500);
        }
      });
    e(".mobile-menu li.dropdown a").on("click", function (event) {
      let parentLi = e(this).closest('li');
      let href = parentLi.children('a').attr('href');
      window.open(href, '_top');
    });
    e(".mobile-nav-toggler").on("click", function () {
      e("body").addClass("mobile-menu-visible");
    }),
      e(
        ".mobile-menu .menu-backdrop,.mobile-menu .close-btn,.scroll-nav li a"
      ).on("click", function () {
        e("body").removeClass("mobile-menu-visible");
      });
  }
  e(".side-menu").length &&
    (e(".side-menu .menu-box").niceScroll({
      cursorborder: "none",
      cursorborderradius: "0px",
      touchbehavior: !0,
      bouncescroll: !1,
      scrollspeed: 120,
      mousescrollstep: 90,
      horizrailenabled: !0,
      preservenativescrolling: !0,
      cursordragontouch: !0,
    }),
      e(".side-menu li.dropdown .dropdown-btn").on("click", function () {
        e(this).toggleClass("open"), e(this).prev("ul").slideToggle(500);
      }),
      e("body").addClass("side-menu-visible"),
      e(".side-nav-toggler").on("click", function () {
        e("body").addClass("side-menu-visible");
      }),
      e(".side-menu .side-menu-resize").on("click", function () {
        e("body").toggleClass("side-menu-visible");
      }),
      e(".main-header .mobile-nav-toggler-two").on("click", function () {
        e("body").addClass("side-menu-visible-s2");
      }),
      e(".main-header .side-menu-overlay").on("click", function () {
        e("body").removeClass("side-menu-visible-s2");
      })),
    e("#search-popup").length &&
    (e(".search-toggler").on("click", function () {
      e("#search-popup").addClass("popup-visible");
    }),
      e(document).keydown(function (t) {
        27 === t.keyCode && e("#search-popup").removeClass("popup-visible");
      }),
      e(".close-search,.search-popup .overlay-layer").on("click", function () {
        e("#search-popup").removeClass("popup-visible");
      }));

  function b() {
    if (e(".sortable-masonry").length) {
      var t = e(window),
        n = e(".sortable-masonry .items-container"),
        a = e(".filter-btns");
      n.isotope({
        filter: ".all",
        animationOptions: { duration: 500, easing: "linear" },
      }),
        a.find("li").on("click", function () {
          var t = e(this).attr("data-filter");
          try {
            n.isotope({
              filter: t,
              animationOptions: { duration: 500, easing: "linear", queue: !1 },
            });
          } catch (e) { }
          return !1;
        }),
        t.on("resize", function () {
          var e = a.find("li.active").attr("data-filter");
          n.isotope({
            filter: e,
            animationOptions: { duration: 500, easing: "linear", queue: !1 },
          }),
            n.isotope();
        });
      var o = e(".filter-btns li");
      o.on("click", function () {
        var t = e(this);
        t.hasClass("active") || (o.removeClass("active"), t.addClass("active"));
      }),
        n.isotope("on", "layoutComplete", function (t, n) {
          t = n.length;
          e(".filters .count").html(t);
        });
    }
  }
  if (
    (e(".languages").click(function () {
      e(".languages ul").show();
    }),
      e(".languages ul").mouseleave(function () {
        e(".languages ul").hide();
      }),
      e(".languages li a").click(function () {
        e(".languages li a").removeClass("sel"), e(this).addClass("sel");
        var t = e(this).text(),
          n = t.substring(0, 2);
        e(".languages .current").html(n),
          e(".languages .current").attr("title", t),
          e(".languages .hover").html(t);
      }),
      e(".price-range-slider").length &&
      (e(".price-range-slider").slider({
        range: !0,
        min: 10,
        max: 200,
        values: [10, 99],
        slide: function (t, n) {
          e("input.property-amount").val(n.values[0] + " - " + n.values[1]);
        },
      }),
        e("input.property-amount").val(
          e(".price-range-slider").slider("values", 0) +
          " - $" +
          e(".price-range-slider").slider("values", 1)
        )),
      e(".lazy-image").length &&
      new LazyLoad({
        elements_selector: ".lazy-image",
        load_delay: 0,
        threshold: 300,
      }),
      e(".theme_carousel").length &&
      e(".theme_carousel").each(function (t) {
        var n = {},
          a = e(this).data("options");
        e.extend(n, a), e(this).owlCarousel(n);
      }),
      e(".count-bar").length &&
      e(".count-bar").appear(
        function () {
          var t = e(this),
            n = t.data("percent");
          e(t).css("width", n).addClass("counted");
        },
        { accY: -50 }
      ),
      e(".quantity-spinner").length &&
      e("input.quantity-spinner").TouchSpin({ verticalbuttons: !0 }),
      e(".count-box").length &&
      e(".count-box").appear(
        function () {
          var t = e(this),
            n = t.find(".count-text").attr("data-stop"),
            a = parseInt(t.find(".count-text").attr("data-speed"), 10);
          t.hasClass("counted") ||
            (t.addClass("counted"),
              e({ countNum: t.find(".count-text").text() }).animate(
                { countNum: n },
                {
                  duration: a,
                  easing: "linear",
                  step: function () {
                    t.find(".count-text").text(Math.floor(this.countNum));
                  },
                  complete: function () {
                    t.find(".count-text").text(this.countNum);
                  },
                }
              ));
        },
        { accY: 0 }
      ),
      e(".tabs-box").length &&
      e(".tabs-box .tab-buttons .tab-btn").on("click", function (t) {
        t.preventDefault();
        var n = e(e(this).attr("data-tab"));
        if (e(n).is(":visible")) return !1;
        n
          .parents(".tabs-box")
          .find(".tab-buttons")
          .find(".tab-btn")
          .removeClass("active-btn"),
          e(this).addClass("active-btn"),
          n.parents(".tabs-box").find(".tabs-content").find(".tab").fadeOut(0),
          n
            .parents(".tabs-box")
            .find(".tabs-content")
            .find(".tab")
            .removeClass("active-tab"),
          e(n).fadeIn(300),
          e(n).addClass("active-tab");
      }),
      e(".accordion-box").length &&
      e(".accordion-box").on("click", ".acc-btn", function () {
        var t = e(this).parents(".accordion-box"),
          n = e(this).parents(".accordion");
        if (
          (!0 !== e(this).hasClass("active") &&
            e(t).find(".accordion .acc-btn").removeClass("active"),
            e(this).next(".acc-content").is(":visible"))
        )
          return !1;
        e(this).addClass("active"),
          e(t).children(".accordion").removeClass("active-block"),
          e(t).find(".accordion").children(".acc-content").slideUp(300),
          n.addClass("active-block"),
          e(this).next(".acc-content").slideDown(300);
      }),
      e(".lightbox-image").length &&
      e(".lightbox-image").fancybox({
        openEffect: "fade",
        closeEffect: "fade",
        helpers: { media: {} },
      }),
      b(),
      e(".testimonial-carousel").length)
  )
    if (
      (e(".project-tab").length &&
        e(".project-tab .project-tab-btns .p-tab-btn").on(
          "click",
          function (t) {
            t.preventDefault();
            var n = e(e(this).attr("data-tab"));
            if (e(n).hasClass("actve-tab")) return !1;
            e(".project-tab .project-tab-btns .p-tab-btn").removeClass(
              "active-btn"
            ),
              e(this).addClass("active-btn"),
              e(".project-tab .p-tabs-content .p-tab").removeClass(
                "active-tab"
              ),
              e(n).addClass("active-tab");
          }
        ),
        e(".single-image-carousel").length)
    )
      (function f() {
        if (e(".isotope-block").length) e(".isotope-block").isotope();
      })(
        e(".project-tab").length &&
        e(".project-tab .project-tab-btns .p-tab-btn").on(
          "click",
          function (t) {
            t.preventDefault();
            var n = e(e(this).attr("data-tab"));
            if (e(n).hasClass("actve-tab")) return !1;
            e(".project-tab .project-tab-btns .p-tab-btn").removeClass(
              "active-btn"
            ),
              e(this).addClass("active-btn"),
              e(".project-tab .p-tabs-content .p-tab").removeClass(
                "active-tab"
              ),
              e(n).addClass("active-tab");
          }
        ),
        f(),
        e(".progress-levels .progress-box .bar-fill").length &&
        e(".progress-box .bar-fill").each(function () {
          var t = e(this).attr("data-percent");
          e(this).css("width", t + "%"),
            e(this)
              .children(".percent")
              .html(t + "%");
        }),
        e(".scroll-to-target").length &&
        e(".scroll-to-target").on("click", function () {
          var t = e(this).attr("data-target");
          e("html, body").animate({ scrollTop: e(t).offset().top }, 1500);
        }),
        e(".ajax-sub-form").length > 0 &&
        (e(".ajax-sub-form").ajaxChimp({
          language: "es",
          url: "https://gmail.us17.list-manage.com/subscribe/post?u=8a43765a655b07d21fa500e4e&amp;id=2eda0a58a7",
        }),
          (e.ajaxChimp.translations.es = {
            submit: "Submitting...",
            0: "Thanks for your subscription",
            1: "Please enter a valid email",
            2: "An email address must contain a single @",
            3: "The domain portion of the email address is invalid (the portion after the @: )",
            4: "The username portion of the email address is invalid (the portion before the @: )",
            5: "This email address looks fake or invalid. Please enter a real email address",
          })),
        e(".dropdown-menu a.dropdown-toggle").length &&
        e(".dropdown-menu a.dropdown-toggle").on("click", function (t) {
          return (
            e(this).closest(".dropdown").hasClass("show") ||
            e(this)
              .closest(".dropdown")
              .first()
              .find(".show")
              .removeClass("show"),
            e(this).closest(".dropdown").toggleClass("show"),
            e(this)
              .parents("li.nav-item.dropdown.show")
              .on("hidden.bs.dropdown", function (t) {
                e(".dropdown-submenu .show").removeClass("show");
              }),
            !1
          );
        }),
        e(".wow").length
      ) &&
        new WOW({
          boxClass: "wow",
          animateClass: "animated",
          offset: 0,
          mobile: !0,
          live: !0,
        }).init();
  e(".scroll-nav").length && e(".scroll-nav ul").onePageNav(),
    e(window).on("resize", function () {
      t();
    }),
    jQuery(window).on("scroll", function () {
      n();
    }),
    jQuery(window).on("load", function () {
      e(".loader-wrap").length && e(".loader-wrap").delay(1e3).fadeOut(500),
        TweenMax.to(e(".loader-wrap .overlay"), 1.2, {
          force3D: !0,
          left: "100%",
          ease: Expo.easeInOut,
        }),
        b(),
        e(".banner-slider").length > 0 &&
        new Swiper(".banner-slider", {
          preloadImages: !1,
          loop: !0,
          grabCursor: !0,
          centeredSlides: !1,
          resistance: !0,
          resistanceRatio: 0.6,
          speed: 1400,
          spaceBetween: 0,
          parallax: !1,
          effect: "slide",
          autoplay: { delay: 3e3, disableOnInteraction: !1 },
          pagination: { el: ".banner-slider-pagination", clickable: !0 },
          navigation: {
            nextEl: ".banner-slider-button-next",
            prevEl: ".banner-slider-button-prev",
          },
        });
    });
})(window.jQuery);
