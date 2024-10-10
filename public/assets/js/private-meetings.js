/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************************!*\
  !*** ./resources/js/private-meetings.js ***!
  \******************************************/
$(document).ready(function () {
  // Check if the user is in a mobile screen
  function isMobile() {
    if ($("body").width() < 762) {
      return true;
    } else {
      return false;
    }
  }
  var bottomFormContainer = $("#slide-up-form-container");
  $(".performance-talk-to-us").on("click", function () {
    if (isMobile()) {
      bottomFormContainer.animate({
        top: "0px"
      }, 200);
    } else {
      var formContainerWidth = bottomFormContainer.width();
      var calculatedLeft = $(window).width() / 2 - formContainerWidth / 2;
      bottomFormContainer.animate({
        top: "25px",
        left: calculatedLeft
      }, 200);
    }
  });
  $("#slide-up-form-container .close-button").on("click", function () {
    bottomFormContainer.animate({
      top: "100%"
    }, 200);
  });

  /* TOPIC ITEMS CODE SECTION */
  // $(".topic-item").on("mouseover", function(){

  //     let currentHeight = $(this).height();

  //     $(this).find('.topic-title').stop().fadeOut(1);
  //     $(this).find('.content').stop().fadeIn(200);
  //     $(this).find('.topic-icon').stop().fadeOut(50);
  //     $(this).css('height', currentHeight);

  // }).on("mouseleave", function(){

  //     $(this).find('.topic-title').stop().fadeIn(1);
  //     $(this).find('.content').stop().fadeOut(100);
  //     $(this).find('.topic-icon').stop().fadeIn(50);
  //     $(this).css('height', 'unset');

  // });

  // Revamped way of animating the items as the previous one was bugged
  var hoverTimeout, revertTimeout;
  $(".topic-item").on("mouseover", function () {
    clearTimeout(revertTimeout); // Clear any pending revert timeout

    var $this = $(this);
    var currentHeight = $this.height();

    // Apply the active class
    $this.addClass('active');
    $this.find('.topic-title').stop().fadeOut(1);
    $this.find('.content').stop().fadeIn(200);
    $this.find('.topic-icon').stop().fadeOut(50);
    $this.css('height', currentHeight);

    // Set a timeout to revert after 3 seconds if not hovered
    revertTimeout = setTimeout(function () {
      if (!$this.is(':hover')) {
        $this.removeClass('active');
        $this.find('.topic-title').stop().fadeIn(1);
        $this.find('.content').stop().fadeOut(100);
        $this.find('.topic-icon').stop().fadeIn(50);
        $this.css('height', 'unset');
      }
    }, 3000);
  }).on("mouseleave", function () {
    clearTimeout(revertTimeout); // Clear the revert timeout on mouse leave

    var $this = $(this);

    // Check if we are still hovering and set a timeout to keep active state if still hovered
    hoverTimeout = setTimeout(function () {
      if (!$this.is(':hover')) {
        $this.removeClass('active');
        $this.find('.topic-title').stop().fadeIn(1);
        $this.find('.content').stop().fadeOut(100);
        $this.find('.topic-icon').stop().fadeIn(50);
        $this.css('height', 'unset');
      }
    }, 3000);
  });

  /* END OF TOPIC ITEMS CODE SECTION
    /* Banner Text Slider */
  if ($(".banner-text-slider").length) {
    var testimonial_slide = new Splide('.banner-text-slider', {
      type: 'loop',
      perPage: 1,
      perMove: 1,
      autoplay: true,
      interval: 3500,
      speed: '500',
      easing: 'ease',
      arrows: false,
      pagination: false,
      // Appending the pagination buttons to a specific element
      // pagination: '#testimonial-slider-container',
      breakpoints: {
        991: {
          perPage: 1
        }
      }
      // autoWidth: true,
    }).mount();

    // Adaptar a height do container ao tamanho de cada slider dado que há testimonials com tamanhos diferentes no website
    testimonial_slide.on('mounted moved', function () {
      // If we are on mobile, adapt the slider height on each slider move
      if ($(window).width() < 991) {
        var active_slide_height = $(".banner-text-slider .is-visible").outerHeight();

        // console.log(active_slide_height);

        $(".banner-text-slider .splide__list").css("height", active_slide_height + "px");
      }
    });
  }
});
/******/ })()
;