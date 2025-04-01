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

eval("__webpack_require__.r(__webpack_exports__);\nNotify = function Notify(text, callback, close_callback, style) {\n  var time = '10000';\n  var $container = $('#notifications');\n  var icon = '<i class=\"fa fa-info-circle info-icon\"></i>';\n  if (typeof style == 'undefined') style = 'warning';\n  var html = $('<div class=\"alert alert-' + style + '  hide\">' + icon + \" \" + text + '</div>');\n\n  // $('<a>',{\n  // \ttext: '×',\n  // \tclass: 'button close',\n  // \tstyle: 'padding-left: 10px;',\n  // \thref: '#',\n  // \tclick: function(e){\n  // \t\te.preventDefault()\n  // \t\tclose_callback && close_callback()\n  // \t\tremove_notice()\n  // \t}\n  // }).prependTo(html)\n\n  $container.prepend(html);\n  html.removeClass('hide').hide().fadeIn('slow');\n  function remove_notice() {\n    html.stop().fadeOut('slow').remove();\n  }\n  var timer = setInterval(remove_notice, time);\n  $(html).hover(function () {\n    clearInterval(timer);\n  }, function () {\n    timer = setInterval(remove_notice, time);\n  });\n  html.on('click', function () {\n    clearInterval(timer);\n    callback && callback();\n    remove_notice();\n  });\n};//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvbm90aWZ5LmpzIiwibWFwcGluZ3MiOiI7QUFBQUEsTUFBTSxHQUFHLFNBQVRBLE1BQU1BLENBQVlDLElBQUksRUFBRUMsUUFBUSxFQUFFQyxjQUFjLEVBQUVDLEtBQUssRUFBRTtFQUV4RCxJQUFJQyxJQUFJLEdBQUcsT0FBTztFQUNsQixJQUFJQyxVQUFVLEdBQUdDLENBQUMsQ0FBQyxnQkFBZ0IsQ0FBQztFQUNwQyxJQUFJQyxJQUFJLEdBQUcsNkNBQTZDO0VBRXhELElBQUksT0FBT0osS0FBSyxJQUFJLFdBQVcsRUFBR0EsS0FBSyxHQUFHLFNBQVM7RUFFbkQsSUFBSUssSUFBSSxHQUFHRixDQUFDLENBQUMsMEJBQTBCLEdBQUdILEtBQUssR0FBRyxVQUFVLEdBQUdJLElBQUksR0FBSSxHQUFHLEdBQUdQLElBQUksR0FBRyxRQUFRLENBQUM7O0VBRTdGO0VBQ0E7RUFDQTtFQUNBO0VBQ0E7RUFDQTtFQUNBO0VBQ0E7RUFDQTtFQUNBO0VBQ0E7O0VBRUFLLFVBQVUsQ0FBQ0ksT0FBTyxDQUFDRCxJQUFJLENBQUM7RUFDeEJBLElBQUksQ0FBQ0UsV0FBVyxDQUFDLE1BQU0sQ0FBQyxDQUFDQyxJQUFJLENBQUMsQ0FBQyxDQUFDQyxNQUFNLENBQUMsTUFBTSxDQUFDO0VBRTlDLFNBQVNDLGFBQWFBLENBQUEsRUFBRztJQUN4QkwsSUFBSSxDQUFDTSxJQUFJLENBQUMsQ0FBQyxDQUFDQyxPQUFPLENBQUMsTUFBTSxDQUFDLENBQUNDLE1BQU0sQ0FBQyxDQUFDO0VBQ3JDO0VBRUEsSUFBSUMsS0FBSyxHQUFJQyxXQUFXLENBQUNMLGFBQWEsRUFBRVQsSUFBSSxDQUFDO0VBRTdDRSxDQUFDLENBQUNFLElBQUksQ0FBQyxDQUFDVyxLQUFLLENBQUMsWUFBVTtJQUN2QkMsYUFBYSxDQUFDSCxLQUFLLENBQUM7RUFDckIsQ0FBQyxFQUFFLFlBQVU7SUFDWkEsS0FBSyxHQUFHQyxXQUFXLENBQUNMLGFBQWEsRUFBRVQsSUFBSSxDQUFDO0VBQ3pDLENBQUMsQ0FBQztFQUVGSSxJQUFJLENBQUNhLEVBQUUsQ0FBQyxPQUFPLEVBQUUsWUFBWTtJQUM1QkQsYUFBYSxDQUFDSCxLQUFLLENBQUM7SUFDcEJoQixRQUFRLElBQUlBLFFBQVEsQ0FBQyxDQUFDO0lBQ3RCWSxhQUFhLENBQUMsQ0FBQztFQUNoQixDQUFDLENBQUM7QUFHSCxDQUFDIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2pzL25vdGlmeS5qcz9iMmI5Il0sInNvdXJjZXNDb250ZW50IjpbIk5vdGlmeSA9IGZ1bmN0aW9uKHRleHQsIGNhbGxiYWNrLCBjbG9zZV9jYWxsYmFjaywgc3R5bGUpIHtcblxuXHR2YXIgdGltZSA9ICcxMDAwMCc7XG5cdHZhciAkY29udGFpbmVyID0gJCgnI25vdGlmaWNhdGlvbnMnKTtcblx0dmFyIGljb24gPSAnPGkgY2xhc3M9XCJmYSBmYS1pbmZvLWNpcmNsZSBpbmZvLWljb25cIj48L2k+JztcblxuXHRpZiAodHlwZW9mIHN0eWxlID09ICd1bmRlZmluZWQnICkgc3R5bGUgPSAnd2FybmluZydcblxuXHR2YXIgaHRtbCA9ICQoJzxkaXYgY2xhc3M9XCJhbGVydCBhbGVydC0nICsgc3R5bGUgKyAnICBoaWRlXCI+JyArIGljb24gKyAgXCIgXCIgKyB0ZXh0ICsgJzwvZGl2PicpO1xuXG5cdC8vICQoJzxhPicse1xuXHQvLyBcdHRleHQ6ICfDlycsXG5cdC8vIFx0Y2xhc3M6ICdidXR0b24gY2xvc2UnLFxuXHQvLyBcdHN0eWxlOiAncGFkZGluZy1sZWZ0OiAxMHB4OycsXG5cdC8vIFx0aHJlZjogJyMnLFxuXHQvLyBcdGNsaWNrOiBmdW5jdGlvbihlKXtcblx0Ly8gXHRcdGUucHJldmVudERlZmF1bHQoKVxuXHQvLyBcdFx0Y2xvc2VfY2FsbGJhY2sgJiYgY2xvc2VfY2FsbGJhY2soKVxuXHQvLyBcdFx0cmVtb3ZlX25vdGljZSgpXG5cdC8vIFx0fVxuXHQvLyB9KS5wcmVwZW5kVG8oaHRtbClcblxuXHQkY29udGFpbmVyLnByZXBlbmQoaHRtbClcblx0aHRtbC5yZW1vdmVDbGFzcygnaGlkZScpLmhpZGUoKS5mYWRlSW4oJ3Nsb3cnKVxuXG5cdGZ1bmN0aW9uIHJlbW92ZV9ub3RpY2UoKSB7XG5cdFx0aHRtbC5zdG9wKCkuZmFkZU91dCgnc2xvdycpLnJlbW92ZSgpXG5cdH1cblxuXHR2YXIgdGltZXIgPSAgc2V0SW50ZXJ2YWwocmVtb3ZlX25vdGljZSwgdGltZSk7XG5cblx0JChodG1sKS5ob3ZlcihmdW5jdGlvbigpe1xuXHRcdGNsZWFySW50ZXJ2YWwodGltZXIpO1xuXHR9LCBmdW5jdGlvbigpe1xuXHRcdHRpbWVyID0gc2V0SW50ZXJ2YWwocmVtb3ZlX25vdGljZSwgdGltZSk7XG5cdH0pO1xuXG5cdGh0bWwub24oJ2NsaWNrJywgZnVuY3Rpb24gKCkge1xuXHRcdGNsZWFySW50ZXJ2YWwodGltZXIpXG5cdFx0Y2FsbGJhY2sgJiYgY2FsbGJhY2soKVxuXHRcdHJlbW92ZV9ub3RpY2UoKVxuXHR9KTtcblxuXG59XG5cbiJdLCJuYW1lcyI6WyJOb3RpZnkiLCJ0ZXh0IiwiY2FsbGJhY2siLCJjbG9zZV9jYWxsYmFjayIsInN0eWxlIiwidGltZSIsIiRjb250YWluZXIiLCIkIiwiaWNvbiIsImh0bWwiLCJwcmVwZW5kIiwicmVtb3ZlQ2xhc3MiLCJoaWRlIiwiZmFkZUluIiwicmVtb3ZlX25vdGljZSIsInN0b3AiLCJmYWRlT3V0IiwicmVtb3ZlIiwidGltZXIiLCJzZXRJbnRlcnZhbCIsImhvdmVyIiwiY2xlYXJJbnRlcnZhbCIsIm9uIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/notify.js\n");

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