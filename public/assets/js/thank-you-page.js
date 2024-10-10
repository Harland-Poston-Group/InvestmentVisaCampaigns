/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/thank-you-page.js ***!
  \****************************************/
$(document).ready(function () {
  // AJAX fake request
  $("#preferred-contact-time").on('submit', function (e) {
    e.preventDefault();
    console.log('test');
    $(".form-elements").fadeOut();
    $(".preferred-time-contact").fadeIn();
  });
});
/******/ })()
;