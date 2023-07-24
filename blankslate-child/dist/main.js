/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/main.js":
/*!************************!*\
  !*** ./src/js/main.js ***!
  \************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modules_mega_menu__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./modules/mega-menu */ "./src/js/modules/mega-menu.js");

(0,_modules_mega_menu__WEBPACK_IMPORTED_MODULE_0__["default"])();
console.log("test");

/***/ }),

/***/ "./src/js/modules/mega-menu.js":
/*!*************************************!*\
  !*** ./src/js/modules/mega-menu.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ megaMenuService)
/* harmony export */ });
function megaMenuService() {
  var handleMouseEnter = function handleMouseEnter(e) {
    if (!e.target.dataset.expand) {
      forceInitialState();
      return;
    }
    console.log("wd2dqdwqdwqdq");
    navsVisited += 1;
    if (navsVisited === 1) {
      expandMenu.classList.add("new--expand");
      menus.forEach(function (menu) {
        return menu.classList.add("first");
      });
      indicator.classList.add("first");
    } else {
      expandMenu.classList.remove("new--expand");
      menus.forEach(function (menu) {
        return menu.classList.remove("first");
      });
      indicator.classList.remove("first");
    }
    navLinks.forEach(function (navLink) {
      if (navLink === e.target) {
        navLink.classList.add("hover");
        currentNav = navLink;
      } else {
        navLink.classList.remove("hover");
      }
    });
    var navLinkCenter = Math.floor(e.target.offsetLeft + e.target.clientWidth / 2);
    indicator.style.transform = "translateX(".concat(navLinkCenter, "px)");
    indicator.style.opacity = "1";
    var targetMenu = document.querySelector("#".concat(e.target.dataset.expand));
    var targetCoords = targetMenu.getBoundingClientRect();
    var targetWidth = targetCoords.width,
      targetHeight = targetCoords.height;

    // expandMenu.style.width = targetWidth + "px";
    expandMenu.style.height = targetHeight + "px";
    var prevMenu = targetMenu.previousElementSibling;
    targetMenu.classList.remove("prev");
    if (prevMenu) {
      prevMenu.classList.add("prev");
    }
    menus.forEach(function (menu) {
      if (menu.id === targetMenu.id) {
        menu.classList.add("active");
      } else {
        menu.classList.remove("active");
      }
    });
    expandMenu.classList.add("expand");
  };
  var handleMouseLeave = function handleMouseLeave(e) {
    if (isMouseOnMenu || e.y > 50) {
      return;
    }
    forceInitialState();
  };
  var forceInitialState = function forceInitialState() {
    expandMenu.classList.remove("expand", "active");
    currentNav.classList.remove("hover");
    menus.forEach(function (menu) {
      return menu.removeAttribute("class");
    });
    indicator.style.opacity = "0";
    currentNav = null;
    navsVisited = 0;
  };
  var expandMenu = document.querySelector(".header__expandMenu");
  console.log(expandMenu);
  var menus = expandMenu.querySelectorAll(".menu__container > *");
  var navLinks = document.querySelectorAll(".nav--link");
  var indicator = document.querySelector(".tip");
  var isMouseOnMenu = false;
  var currentNav;
  var navsVisited = 0;
  var _expandMenu$getBoundi = expandMenu.getBoundingClientRect(),
    menuHeight = _expandMenu$getBoundi.height,
    menuWidth = _expandMenu$getBoundi.width;
  navLinks.forEach(function (navLink) {
    navLink.addEventListener("mouseenter", handleMouseEnter);
  });
  expandMenu.addEventListener("mouseenter", function () {
    if (expandMenu.style.opacity === "1") {
      isMouseOnMenu = true;
    }
  });
  expandMenu.addEventListener("mouseleave", function (e) {
    if (e.y > 70) {
      isMouseOnMenu = false;
      forceInitialState();
    }
  });
  document.querySelector(".nav__links").addEventListener("mouseleave", handleMouseLeave);

  //minicart buttons logic
  jQuery(function ($) {
    $(document).on("click", function (event) {
      if (!$(event.target).closest(".cart-icon-container").length && !$(event.target).closest(".mini-cart-container").length) {
        $(".mini-cart-container").removeClass("minicart-show");
      }
    });
  });
}

/***/ }),

/***/ "./src/css/main.scss":
/*!***************************!*\
  !*** ./src/css/main.scss ***!
  \***************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
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
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/dist/main": 0,
/******/ 			"dist/main": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunkblankslate_child"] = self["webpackChunkblankslate_child"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["dist/main"], () => (__webpack_require__("./src/js/main.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["dist/main"], () => (__webpack_require__("./src/css/main.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;