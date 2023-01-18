"use strict";
/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
(self["webpackChunkAutoakademia"] = self["webpackChunkAutoakademia"] || []).push([["print"],{

/***/ "./js/modal/fadeIn.js":
/*!****************************!*\
  !*** ./js/modal/fadeIn.js ***!
  \****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (__WEBPACK_DEFAULT_EXPORT__)\n/* harmony export */ });\n/* harmony import */ var _toggleActiveClass__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./toggleActiveClass */ \"./js/modal/toggleActiveClass.js\");\n\n\nfunction fadeElementIn(element, activeClass) {\n  var stopScrolling = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : false;\n  (0,_toggleActiveClass__WEBPACK_IMPORTED_MODULE_0__[\"default\"])(element, activeClass);\n\n  if (stopScrolling) {\n    document.body.style.height = \"100vh\";\n    document.body.style.overflow = \"hidden\";\n  }\n\n  element.animate([{\n    opacity: 0,\n    transform: \"translateY(100px)\"\n  }, {\n    opacity: 1,\n    transform: \"translateY(0)\"\n  }], {\n    duration: 300,\n    fill: \"forwards\"\n  });\n}\n\n/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (fadeElementIn);\n\n//# sourceURL=webpack://Autoakademia/./js/modal/fadeIn.js?");

/***/ }),

/***/ "./js/modal/fadeOut.js":
/*!*****************************!*\
  !*** ./js/modal/fadeOut.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (__WEBPACK_DEFAULT_EXPORT__)\n/* harmony export */ });\n/* harmony import */ var _toggleActiveClass__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./toggleActiveClass */ \"./js/modal/toggleActiveClass.js\");\n\n\nfunction fadeElementOut(element, activeClass) {\n  var stopScrolling = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : false;\n\n  if (stopScrolling) {\n    document.body.style.height = \"unset\";\n    document.body.style.overflow = \"unset\";\n  }\n\n  element.animate([{\n    opacity: 1,\n    transform: \"translateY(0)\"\n  }, {\n    opacity: 0,\n    transform: \"translateY(100px)\"\n  }], {\n    duration: 300,\n    fill: \"forwards\"\n  });\n  setTimeout(function () {\n    (0,_toggleActiveClass__WEBPACK_IMPORTED_MODULE_0__[\"default\"])(element, activeClass);\n  }, 300);\n}\n\n/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (fadeElementOut);\n\n//# sourceURL=webpack://Autoakademia/./js/modal/fadeOut.js?");

/***/ }),

/***/ "./js/modal/toggleActiveClass.js":
/*!***************************************!*\
  !*** ./js/modal/toggleActiveClass.js ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (__WEBPACK_DEFAULT_EXPORT__)\n/* harmony export */ });\nfunction toggleActiveClass(element, activeClass) {\n  element.classList.toggle(activeClass);\n}\n\n/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (toggleActiveClass);\n\n//# sourceURL=webpack://Autoakademia/./js/modal/toggleActiveClass.js?");

/***/ })

}]);