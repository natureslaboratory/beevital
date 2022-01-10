/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./scripts/src/classes/FAQ.ts":
/*!************************************!*\
  !*** ./scripts/src/classes/FAQ.ts ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Question__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Question */ "./scripts/src/classes/Question.ts");
var __read = (undefined && undefined.__read) || function (o, n) {
    var m = typeof Symbol === "function" && o[Symbol.iterator];
    if (!m) return o;
    var i = m.call(o), r, ar = [], e;
    try {
        while ((n === void 0 || n-- > 0) && !(r = i.next()).done) ar.push(r.value);
    }
    catch (error) { e = { error: error }; }
    finally {
        try {
            if (r && !r.done && (m = i["return"])) m.call(i);
        }
        finally { if (e) throw e.error; }
    }
    return ar;
};
var __spreadArray = (undefined && undefined.__spreadArray) || function (to, from, pack) {
    if (pack || arguments.length === 2) for (var i = 0, l = from.length, ar; i < l; i++) {
        if (ar || !(i in from)) {
            if (!ar) ar = Array.prototype.slice.call(from, 0, i);
            ar[i] = from[i];
        }
    }
    return to.concat(ar || Array.prototype.slice.call(from));
};

var Faq = /** @class */ (function () {
    function Faq(node) {
        this.questions = [];
        this.node = node;
        var questions = node.getElementsByClassName("schema-faq-section");
        for (var i = 0; i < questions.length; i++) {
            var question = questions[i];
            this.questions = __spreadArray(__spreadArray([], __read(this.questions), false), [new _Question__WEBPACK_IMPORTED_MODULE_0__["default"](question)], false);
        }
        this.attachEventListeners();
    }
    Faq.prototype.closeAllMenus = function () {
        this.questions.forEach(function (q) {
            q.hide();
        });
    };
    Faq.prototype.attachEventListeners = function () {
        this.questions.forEach(function (q) {
            q.question.addEventListener("click", function (e) {
                q.isShowing ? q.hide() : q.show();
            });
        });
    };
    return Faq;
}());
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Faq);


/***/ }),

/***/ "./scripts/src/classes/Question.ts":
/*!*****************************************!*\
  !*** ./scripts/src/classes/Question.ts ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
var Question = /** @class */ (function () {
    function Question(node) {
        this.node = node;
        var answers = this.node.getElementsByClassName("schema-faq-answer");
        if (answers) {
            this.answer = answers[0];
        }
        // adds chevron
        this.chevron = document.createElement("i");
        this.chevron.className = "far fa-chevron-down";
        this.question = this.node.getElementsByClassName("schema-faq-question")[0];
        var questionContainer = document.createElement("div");
        questionContainer.className = "schema-faq-question-container";
        questionContainer.appendChild(this.question);
        questionContainer.appendChild(this.chevron);
        this.node.insertBefore(questionContainer, this.answer);
    }
    Object.defineProperty(Question.prototype, "isShowing", {
        get: function () {
            if (this.answer.style.maxHeight) {
                return true;
            }
            return false;
        },
        enumerable: false,
        configurable: true
    });
    Question.prototype.show = function () {
        this.answer.style.transition = "".concat(this.answer.scrollHeight / 4 + 150, "ms");
        this.answer.style.maxHeight = "".concat(this.answer.scrollHeight, "px");
        this.answer.style.marginBottom = "1rem";
        this.chevron.style.transform = 'rotate(180deg)';
    };
    Question.prototype.hide = function () {
        this.answer.style.maxHeight = null;
        this.answer.style.marginBottom = "-1rem";
        this.chevron.style.transform = 'rotate(0deg)';
    };
    return Question;
}());
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Question);


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
/************************************************************************/
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
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!******************************!*\
  !*** ./scripts/src/index.ts ***!
  \******************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _classes_FAQ__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./classes/FAQ */ "./scripts/src/classes/FAQ.ts");

// get faq container
var faqContainers = Array.from(document.getElementsByClassName("schema-faq"));
faqContainers.forEach(function (c) {
    new _classes_FAQ__WEBPACK_IMPORTED_MODULE_0__["default"](c);
});
// create instances of question (has method hide/show)
// add event listeners for click for opening/closing

})();

/******/ })()
;
//# sourceMappingURL=index.js.map