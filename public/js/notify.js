/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/notify.js":
/*!********************************!*\
  !*** ./resources/js/notify.js ***!
  \********************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\nNotify = function Notify(text, callback, close_callback, style) {\n  var time = '10000';\n  var $container = $('#notifications');\n  var icon = '<i class=\"fa fa-info-circle info-icon\"></i>';\n  if (typeof style == 'undefined') style = 'warning';\n  var html = $('<div class=\"alert alert-' + style + '  hide\">' + icon + \" \" + text + '</div>');\n\n  // $('<a>',{\n  // \ttext: '×',\n  // \tclass: 'button close',\n  // \tstyle: 'padding-left: 10px;',\n  // \thref: '#',\n  // \tclick: function(e){\n  // \t\te.preventDefault()\n  // \t\tclose_callback && close_callback()\n  // \t\tremove_notice()\n  // \t}\n  // }).prependTo(html)\n\n  $container.prepend(html);\n  html.removeClass('hide').hide().fadeIn('slow');\n  function remove_notice() {\n    html.stop().fadeOut('slow').remove();\n  }\n  var timer = setInterval(remove_notice, time);\n  $(html).hover(function () {\n    clearInterval(timer);\n  }, function () {\n    timer = setInterval(remove_notice, time);\n  });\n  html.on('click', function () {\n    clearInterval(timer);\n    callback && callback();\n    remove_notice();\n  });\n};//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvbm90aWZ5LmpzIiwibWFwcGluZ3MiOiI7QUFBQUEsTUFBTSxHQUFHLFNBQVRBLE1BQU1BLENBQVlDLElBQUksRUFBRUMsUUFBUSxFQUFFQyxjQUFjLEVBQUVDLEtBQUssRUFBRTtFQUV4RCxJQUFJQyxJQUFJLEdBQUcsT0FBTztFQUNsQixJQUFJQyxVQUFVLEdBQUdDLENBQUMsQ0FBQyxnQkFBZ0IsQ0FBQztFQUNwQyxJQUFJQyxJQUFJLEdBQUcsNkNBQTZDO0VBRXhELElBQUksT0FBT0osS0FBSyxJQUFJLFdBQVcsRUFBR0EsS0FBSyxHQUFHLFNBQVM7RUFFbkQsSUFBSUssSUFBSSxHQUFHRixDQUFDLENBQUMsMEJBQTBCLEdBQUdILEtBQUssR0FBRyxVQUFVLEdBQUdJLElBQUksR0FBSSxHQUFHLEdBQUdQLElBQUksR0FBRyxRQUFRLENBQUM7O0VBRTdGO0VBQ0E7RUFDQTtFQUNBO0VBQ0E7RUFDQTtFQUNBO0VBQ0E7RUFDQTtFQUNBO0VBQ0E7O0VBRUFLLFVBQVUsQ0FBQ0ksT0FBTyxDQUFDRCxJQUFJLENBQUM7RUFDeEJBLElBQUksQ0FBQ0UsV0FBVyxDQUFDLE1BQU0sQ0FBQyxDQUFDQyxJQUFJLENBQUMsQ0FBQyxDQUFDQyxNQUFNLENBQUMsTUFBTSxDQUFDO0VBRTlDLFNBQVNDLGFBQWFBLENBQUEsRUFBRztJQUN4QkwsSUFBSSxDQUFDTSxJQUFJLENBQUMsQ0FBQyxDQUFDQyxPQUFPLENBQUMsTUFBTSxDQUFDLENBQUNDLE1BQU0sQ0FBQyxDQUFDO0VBQ3JDO0VBRUEsSUFBSUMsS0FBSyxHQUFJQyxXQUFXLENBQUNMLGFBQWEsRUFBRVQsSUFBSSxDQUFDO0VBRTdDRSxDQUFDLENBQUNFLElBQUksQ0FBQyxDQUFDVyxLQUFLLENBQUMsWUFBVTtJQUN2QkMsYUFBYSxDQUFDSCxLQUFLLENBQUM7RUFDckIsQ0FBQyxFQUFFLFlBQVU7SUFDWkEsS0FBSyxHQUFHQyxXQUFXLENBQUNMLGFBQWEsRUFBRVQsSUFBSSxDQUFDO0VBQ3pDLENBQUMsQ0FBQztFQUVGSSxJQUFJLENBQUNhLEVBQUUsQ0FBQyxPQUFPLEVBQUUsWUFBWTtJQUM1QkQsYUFBYSxDQUFDSCxLQUFLLENBQUM7SUFDcEJoQixRQUFRLElBQUlBLFFBQVEsQ0FBQyxDQUFDO0lBQ3RCWSxhQUFhLENBQUMsQ0FBQztFQUNoQixDQUFDLENBQUM7QUFHSCxDQUFDIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2pzL25vdGlmeS5qcz9iMmI5Il0sInNvdXJjZXNDb250ZW50IjpbIk5vdGlmeSA9IGZ1bmN0aW9uKHRleHQsIGNhbGxiYWNrLCBjbG9zZV9jYWxsYmFjaywgc3R5bGUpIHtcclxuXHJcblx0dmFyIHRpbWUgPSAnMTAwMDAnO1xyXG5cdHZhciAkY29udGFpbmVyID0gJCgnI25vdGlmaWNhdGlvbnMnKTtcclxuXHR2YXIgaWNvbiA9ICc8aSBjbGFzcz1cImZhIGZhLWluZm8tY2lyY2xlIGluZm8taWNvblwiPjwvaT4nO1xyXG5cclxuXHRpZiAodHlwZW9mIHN0eWxlID09ICd1bmRlZmluZWQnICkgc3R5bGUgPSAnd2FybmluZydcclxuXHJcblx0dmFyIGh0bWwgPSAkKCc8ZGl2IGNsYXNzPVwiYWxlcnQgYWxlcnQtJyArIHN0eWxlICsgJyAgaGlkZVwiPicgKyBpY29uICsgIFwiIFwiICsgdGV4dCArICc8L2Rpdj4nKTtcclxuXHJcblx0Ly8gJCgnPGE+Jyx7XHJcblx0Ly8gXHR0ZXh0OiAnw5cnLFxyXG5cdC8vIFx0Y2xhc3M6ICdidXR0b24gY2xvc2UnLFxyXG5cdC8vIFx0c3R5bGU6ICdwYWRkaW5nLWxlZnQ6IDEwcHg7JyxcclxuXHQvLyBcdGhyZWY6ICcjJyxcclxuXHQvLyBcdGNsaWNrOiBmdW5jdGlvbihlKXtcclxuXHQvLyBcdFx0ZS5wcmV2ZW50RGVmYXVsdCgpXHJcblx0Ly8gXHRcdGNsb3NlX2NhbGxiYWNrICYmIGNsb3NlX2NhbGxiYWNrKClcclxuXHQvLyBcdFx0cmVtb3ZlX25vdGljZSgpXHJcblx0Ly8gXHR9XHJcblx0Ly8gfSkucHJlcGVuZFRvKGh0bWwpXHJcblxyXG5cdCRjb250YWluZXIucHJlcGVuZChodG1sKVxyXG5cdGh0bWwucmVtb3ZlQ2xhc3MoJ2hpZGUnKS5oaWRlKCkuZmFkZUluKCdzbG93JylcclxuXHJcblx0ZnVuY3Rpb24gcmVtb3ZlX25vdGljZSgpIHtcclxuXHRcdGh0bWwuc3RvcCgpLmZhZGVPdXQoJ3Nsb3cnKS5yZW1vdmUoKVxyXG5cdH1cclxuXHJcblx0dmFyIHRpbWVyID0gIHNldEludGVydmFsKHJlbW92ZV9ub3RpY2UsIHRpbWUpO1xyXG5cclxuXHQkKGh0bWwpLmhvdmVyKGZ1bmN0aW9uKCl7XHJcblx0XHRjbGVhckludGVydmFsKHRpbWVyKTtcclxuXHR9LCBmdW5jdGlvbigpe1xyXG5cdFx0dGltZXIgPSBzZXRJbnRlcnZhbChyZW1vdmVfbm90aWNlLCB0aW1lKTtcclxuXHR9KTtcclxuXHJcblx0aHRtbC5vbignY2xpY2snLCBmdW5jdGlvbiAoKSB7XHJcblx0XHRjbGVhckludGVydmFsKHRpbWVyKVxyXG5cdFx0Y2FsbGJhY2sgJiYgY2FsbGJhY2soKVxyXG5cdFx0cmVtb3ZlX25vdGljZSgpXHJcblx0fSk7XHJcblxyXG5cclxufVxyXG5cclxuIl0sIm5hbWVzIjpbIk5vdGlmeSIsInRleHQiLCJjYWxsYmFjayIsImNsb3NlX2NhbGxiYWNrIiwic3R5bGUiLCJ0aW1lIiwiJGNvbnRhaW5lciIsIiQiLCJpY29uIiwiaHRtbCIsInByZXBlbmQiLCJyZW1vdmVDbGFzcyIsImhpZGUiLCJmYWRlSW4iLCJyZW1vdmVfbm90aWNlIiwic3RvcCIsImZhZGVPdXQiLCJyZW1vdmUiLCJ0aW1lciIsInNldEludGVydmFsIiwiaG92ZXIiLCJjbGVhckludGVydmFsIiwib24iXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/notify.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/notify.js"](0, __webpack_exports__, __webpack_require__);
/******/ 	
/******/ })()
;