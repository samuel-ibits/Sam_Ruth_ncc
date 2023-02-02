/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pages/be_forms_wizard.js":
/*!***********************************************!*\
  !*** ./resources/js/pages/be_forms_wizard.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/*
 *  Document   : be_forms_wizard.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Form Wizard Page
 */
var BeFormWizard =
/*#__PURE__*/
function () {
  function BeFormWizard() {
    _classCallCheck(this, BeFormWizard);
  }

  _createClass(BeFormWizard, null, [{
    key: "initWizardDefaults",

    /*
     * Init Wizard defaults
     *
     */
    value: function initWizardDefaults() {
      jQuery.fn.bootstrapWizard.defaults.tabClass = 'nav nav-tabs';
      jQuery.fn.bootstrapWizard.defaults.nextSelector = '[data-wizard="next"]';
      jQuery.fn.bootstrapWizard.defaults.previousSelector = '[data-wizard="prev"]';
      jQuery.fn.bootstrapWizard.defaults.firstSelector = '[data-wizard="first"]';
      jQuery.fn.bootstrapWizard.defaults.lastSelector = '[data-wizard="last"]';
      jQuery.fn.bootstrapWizard.defaults.finishSelector = '[data-wizard="finish"]';
      jQuery.fn.bootstrapWizard.defaults.backSelector = '[data-wizard="back"]';
    }
    /*
     * Init simple wizard, for more examples you can check out https://github.com/VinceG/twitter-bootstrap-wizard
     *
     */

  }, {
    key: "initWizardSimple",
    value: function initWizardSimple() {
      jQuery('.js-wizard-simple').bootstrapWizard();
    }
    /*
     * Init wizards with validation, for more examples you can check out
     * https://github.com/VinceG/twitter-bootstrap-wizard and https://github.com/jzaefferer/jquery-validation
     *
     */

    /*
     * Init functionality
     *
     */

  }, {
    key: "init",
    value: function init() {
      this.initWizardDefaults();
      this.initWizardSimple();
    }
  }]);

  return BeFormWizard;
}(); // Initialize when page loads
// jQuery(() => { BeFormWizard.init(); });

/***/ }),

/***/ 5:
/*!*****************************************************!*\
  !*** multi ./resources/js/pages/be_forms_wizard.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\ncctowerapp\resources\js\pages\be_forms_wizard.js */"./resources/js/pages/be_forms_wizard.js");


/***/ })

/******/ });