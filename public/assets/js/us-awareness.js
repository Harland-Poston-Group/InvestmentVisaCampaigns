/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/us-awareness.js ***!
  \**************************************/
$(document).ready(function () {
  // Check if the user is in a mobile screen
  function isMobile() {
    if ($("body").width() < 762) {
      return true;
    } else {
      return false;
    }
  }
  if ($("#form-container-element-banner").length > 0) {
    if (isMobile()) {
      var movableForm = $("#form-container-element-banner");
      movableForm.insertAfter('#banner-video-section');
    }
  }
});
/******/ })()
;