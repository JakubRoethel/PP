export default function megaMenuMobileService() {
    jQuery(function ($) {
      $(document).ready(function () {
        // append plus symbol to every list item that has children
        // $('#mobile-nav .menu-item-has-children').append('<span class="material-symbols-outlined open-menu">expand_more</span>');
  
        // fix non-scrolling overflow issue on mobile devices
        $("#mobile-nav > ul").wrap('<div class="overflow"></div>');
        $(window).on("load resize", function () {
          var vph = $(window).height() - 57; // 57px - height of #mobile-nav
          $(".overflow").css("max-height", vph);
        });
  
        // global variables
        var menu = $(".overflow > ul");
        var bg = $("html, body");
  
        // toggle background scrolling
        function bgScrolling() {
          // if menu has toggled class... *
          if (menu.hasClass("open")) {
            // * disable background scrolling
            bg.css({
              "overflow-y": "hidden",
              height: "auto",
            });
            // if menu does not have toggled class... *
          } else {
            // * enable background scrolling
            bg.css({
              "overflow-y": "visible",
              height: "100%",
            });
          }
        }
  
        // list item click events
        $(".open-menu").on("click", function (e) {
          e.preventDefault();
          console.log("Open menu");
          $(this)
            .closest(".menu-item-wrapper")
            .next(".sub-menu")
            .slideToggle(250);
          console.log($(this).find("ul.sub-menu"));
          $(this).toggleClass("rotate");
        });
      });
    });
  
    const header = document.querySelector(".header");
    const headerOverlay = document.querySelectorAll(".navigation__overlay");
    const minicart = document.querySelector(".mini-cart-container");
    const doc = document.documentElement;
  
    console.log(headerOverlay);
    // window.addEventListener('scroll', () => {
    //   const top = (window.pageYOffset || doc.scrollTop) - (doc.clientTop || 0);
  
    //   if (top > 20) {
    //     header.classList.add('header--scrolled');
    //   } else {
    //     header.classList.remove('header--scrolled');
    //   }
    // });
  
    const burger = document.querySelector(".header__toggle");
  
    burger.addEventListener("click", () => {
      if (header.classList.contains("header--navigation-open")) {
        header.classList.remove("header--navigation-open");
        document.documentElement.classList.remove("noscroll");
      } else {
        header.classList.add("header--navigation-open");
        console.log(document.documentElement);
        document.documentElement.classList.add("noscroll");
      }
    });
  
    // Function to handle the click event
    const handleClick = () => {
      header.classList.remove("header--navigation-open");
      minicart.classList.remove("minicart-show");
      document.documentElement.classList.remove("noscroll");
      console.log("Click");
    };
  
    //handle close icon on menu mobile click
    const close_menu = document.querySelector(".menu-header .close-icon");
  
    close_menu.addEventListener("click", () => {
      console.log("dwqdqqwdw");
      header.classList.remove("header--navigation-open");
      document.documentElement.classList.remove("noscroll");
    });
  
    // Loop through each header overlay and attach the event listener
    headerOverlay.forEach((overlay) => {
      overlay.addEventListener("click", handleClick);
    });
  }
  