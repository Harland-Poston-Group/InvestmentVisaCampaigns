/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/ebook.js ***!
  \*******************************/
$(document).ready(function () {
  var formBackgroundElement = $(".form-background-container");

  // Open form on download button click
  $(".open-form").on("click", function () {
    formBackgroundElement.css({
      'left': 0
    });

    // formBackgroundElement.animate(
    //     { left: 0 },
    //     600,  // duration in milliseconds
    //     function() {
    //         // alert("Animation complete!");
    //         formBackgroundElement.addClass( 'active');
    //     }
    // );

    setTimeout(function () {
      formBackgroundElement.addClass('active');
    }, 400);
  });
  $(".close-modal").on("click", function () {
    formBackgroundElement.css({
      'left': '100%'
    });
    formBackgroundElement.removeClass('active');
  });
  formBackgroundElement.on("click", function (e) {
    formBackgroundElement.css({
      'left': '100%'
    });
    formBackgroundElement.removeClass('active');
  });

  // Avoid event propagation
  $('.generic-form-container').on("click", function (e) {
    e.stopPropagation(); // Stop the event from propagating further
  });

  // Form submission
  $("#ebook-form").on("submit", function (e) {
    e.preventDefault(); // Prevent the default form submission

    // Redirect to the desired URL
    // window.location.href = "/assets/ebooks/USInvestorsGuide_PH_2024.pdf";

    var ebookCampaign = '#usa';
    window.location.href = "/ebook/thank-you-for-your-download" + ebookCampaign;
  });

  // If we're actually in the eBooks Thank You Page
  if ($('body').hasClass('ebook-thank-you-page')) {
    var hash = window.location.hash;

    // console.log(hash);

    if (hash === '#usa') {
      var hiddenElement = document.createElement('a');
      hiddenElement.href = '/assets/ebooks/USInvestorsGuide_PH_2024.pdf'; // Direct URL to the PDF file
      hiddenElement.target = '_blank';
      hiddenElement.download = 'USInvestorsGuide_PH_2024.pdf'; // Filename to suggest for the download
      hiddenElement.click();
    }
  }
});
/******/ })()
;