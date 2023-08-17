export default function swiperService() {
  var swiper1 = new Swiper(".swiper", {
    effect: "slide",
    grabCursor: true,
    centeredSlides: false,
    slidesPerView: "1",
    spaceBetween: 0,
    loop: true,
    // autoplay: {
    //   delay: 3000,
    // },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });

  var swiper2 = new Swiper(".swiper_featured_content", {
    effect: "slide",
    grabCursor: true,
    centeredSlides: false,
    slidesPerView: "5",
    spaceBetween: 40,
    loop: true,
    slidesOffsetBefore: 0,
    slidesOffsetAfter: 0,
    breakpoints: {
      // when window width is >= 320px
      320: {
        spaceBetween: 20,
        slidesPerView: 1.5,
        // grid: {
        //   rows: 2, // your amount of slides
        //   fill: "row",
        // },
      },
      // when window width is >= 640px
      740: {
        slidesPerView: 2.5,
        spaceBetween: 40,
      },
      1200: {
        slidesPerView: 4,
        spaceBetween: 40,
      },
    },
    // autoplay: {
    //   delay: 3000,
    // },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });

  var swiper3 = new Swiper(".posts-slider-new-articles", {
    effect: "slide",
    grabCursor: true,
    centeredSlides: false,
    slidesPerView: "1.4",
    spaceBetween: 20,
    loop: true,
    // autoplay: {
    //   delay: 3000,
    // },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });

  var swiper2 = new Swiper(".related-posts-swiper", {
    effect: "slide",
    grabCursor: true,
    centeredSlides: false,
    spaceBetween: 40,
    loop: true,
    slidesOffsetBefore: 0,
    slidesOffsetAfter: 0,
    breakpoints: {
      // when window width is >= 320px
      320: {
        spaceBetween: 20,
        slidesPerView: 1.5,
        // grid: {
        //   rows: 2, // your amount of slides
        //   fill: "row",
        // },
      },
      // when window width is >= 640px
      740: {
        slidesPerView: 2.5,
        spaceBetween: 40,
      },
      1200: {
        slidesPerView: 4,
        spaceBetween: 40,
      },
    },
    // autoplay: {
    //   delay: 3000,
    // },
    
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
  
}
