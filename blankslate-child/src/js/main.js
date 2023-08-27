import megaMenuService from "./modules/mega-menu";
import megaMenuMobileService from "./modules/mega-menu-mobile";
import swiperService from "./modules/swiper-objects";
import gMapsService from "./modules/googlemaps";
import AOS from "aos";
import Splide from '@splidejs/splide';
import { AutoScroll } from '@splidejs/splide-extension-auto-scroll';

// megaMenuService();
megaMenuMobileService();
swiperService();
gMapsService();
AOS.init();



//search logic
jQuery(document).ready(function ($) {
    // Toggle search input when search icon is clicked
    $(".search-toggle").click(function (e) {
      e.preventDefault();
      $(".right-side-nav").addClass("menu-down");
      $(".right-side-nav").removeClass("menu-up");
    });
  
    $(".close-search-icon").click(function (e) {
      e.preventDefault();
      $(".right-side-nav").addClass("menu-up");
      $(".right-side-nav").removeClass("menu-down");
  
      setTimeout(function() {
          $(".right-side-nav").removeClass("menu-up");
      }, 1000); // Timeout duration in milliseconds
  });
  
  
  });



  const header = document.querySelector('.header');
  const headerOverlay = document.querySelector('.navigation__overlay');
  const doc = document.documentElement;
  console.log("Test geaderJS");
  window.addEventListener('scroll', () => {
    const top = (window.pageYOffset || doc.scrollTop) - (doc.clientTop || 0);

    if (top > 20) {
      header.classList.add('header--scrolled');
    } else {
      header.classList.remove('header--scrolled');
    }
  });
 

  new Splide(".splide", {
    type: "loop",
    perPage: 4,
    focus: "center",
    autoWidth: true,
    // drag: "free",
    autoScroll: {
      speed: 0.5,
      pauseOnHover: false,
    },
    pagination : false, // disable pagination
    arrows     : false, // disbale arrows
    breakpoints: {
    
    },
  }).mount( { AutoScroll });
  


  document.addEventListener('om.Scripts.init', function(event) {
    event.detail.Scripts.enabled.fonts.googleFonts = false;
});









  