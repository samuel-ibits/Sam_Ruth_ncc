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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pages/be_forms_validation.js":
/*!***************************************************!*\
  !*** ./resources/js/pages/be_forms_validation.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/*
 *  Document   : be_forms_validation.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Form Validation Page
 */
// jQuery Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
var BeFormValidation =
/*#__PURE__*/
function () {
  function BeFormValidation() {
    _classCallCheck(this, BeFormValidation);
  }

  _createClass(BeFormValidation, null, [{
    key: "initValidationBootstrap",

    /*
     * Init Bootstrap Forms Validation
     *
     */
    value: function initValidationBootstrap() {
      jQuery('.js-validation-bootstrap').validate({
        ignore: [],
        errorClass: 'invalid-feedback animated fadeInDown',
        errorElement: 'div',
        errorPlacement: function errorPlacement(error, e) {
          jQuery(e).parents('.form-group > div').append(error);
        },
        highlight: function highlight(e) {
          jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
        },
        success: function success(e) {
          jQuery(e).closest('.form-group').removeClass('is-invalid');
          jQuery(e).remove();
        },
        rules: {
          'val-username': {
            required: true,
            minlength: 3
          },
          'val-email': {
            required: true,
            email: true
          },
          'val-password': {
            required: true,
            minlength: 5
          },
          'val-confirm-password': {
            required: true,
            equalTo: '#val-password'
          },
          'val-select2': {
            required: true
          },
          'val-select2-multiple': {
            required: true,
            minlength: 2
          },
          'val-suggestions': {
            required: true,
            minlength: 5
          },
          'val-skill': {
            required: true
          },
          'val-currency': {
            required: true,
            currency: ['$', true]
          },
          'val-website': {
            required: true,
            url: true
          },
          'val-phoneus': {
            required: true,
            phoneUS: true
          },
          'val-digits': {
            required: true,
            digits: true
          },
          'val-number': {
            required: true,
            number: true
          },
          'val-range': {
            required: true,
            range: [1, 5]
          },
          'val-terms': {
            required: true
          }
        },
        messages: {
          'val-username': {
            required: 'Please enter a username',
            minlength: 'Your username must consist of at least 3 characters'
          },
          'val-email': 'Please enter a valid email address',
          'val-password': {
            required: 'Please provide a password',
            minlength: 'Your password must be at least 5 characters long'
          },
          'val-confirm-password': {
            required: 'Please provide a password',
            minlength: 'Your password must be at least 5 characters long',
            equalTo: 'Please enter the same password as above'
          },
          'val-select2': 'Please select a value!',
          'val-select2-multiple': 'Please select at least 2 values!',
          'val-suggestions': 'What can we do to become better?',
          'val-skill': 'Please select a skill!',
          'val-currency': 'Please enter a price!',
          'val-website': 'Please enter your website!',
          'val-phoneus': 'Please enter a US phone!',
          'val-digits': 'Please enter only digits!',
          'val-number': 'Please enter a number!',
          'val-range': 'Please enter a number between 1 and 5!',
          'val-terms': 'You must agree to the service terms!'
        }
      });
    }
    /*
     * Init Material Forms Validation
     *
     */

  }, {
    key: "initValidationMaterial",
    value: function initValidationMaterial() {
      jQuery('.js-validation-material').validate({
        ignore: [],
        errorClass: 'invalid-feedback animated fadeInDown',
        errorElement: 'div',
        errorPlacement: function errorPlacement(error, e) {
          jQuery(e).parents('.form-group').append(error);
        },
        highlight: function highlight(e) {
          jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
        },
        success: function success(e) {
          jQuery(e).closest('.form-group').removeClass('is-invalid');
          jQuery(e).remove();
        },
        rules: {
          'val-username2': {
            required: true,
            minlength: 3
          },
          'val-email2': {
            required: true,
            email: true
          },
          'val-password2': {
            required: true,
            minlength: 5
          },
          'val-confirm-password2': {
            required: true,
            equalTo: '#val-password2'
          },
          'val-select22': {
            required: true
          },
          'val-select2-multiple2': {
            required: true,
            minlength: 2
          },
          'val-suggestions2': {
            required: true,
            minlength: 5
          },
          'val-skill2': {
            required: true
          },
          'val-currency2': {
            required: true,
            currency: ['$', true]
          },
          'val-website2': {
            required: true,
            url: true
          },
          'val-phoneus2': {
            required: true,
            phoneUS: true
          },
          'val-digits2': {
            required: true,
            digits: true
          },
          'val-number2': {
            required: true,
            number: true
          },
          'val-range2': {
            required: true,
            range: [1, 5]
          },
          'val-terms2': {
            required: true
          }
        },
        messages: {
          'val-username2': {
            required: 'Please enter a username',
            minlength: 'Your username must consist of at least 3 characters'
          },
          'val-email2': 'Please enter a valid email address',
          'val-password2': {
            required: 'Please provide a password',
            minlength: 'Your password must be at least 5 characters long'
          },
          'val-confirm-password2': {
            required: 'Please provide a password',
            minlength: 'Your password must be at least 5 characters long',
            equalTo: 'Please enter the same password as above'
          },
          'val-select22': 'Please select a value!',
          'val-select2-multiple2': 'Please select at least 2 values!',
          'val-suggestions2': 'What can we do to become better?',
          'val-skill2': 'Please select a skill!',
          'val-currency2': 'Please enter a price!',
          'val-website2': 'Please enter your website!',
          'val-phoneus2': 'Please enter a US phone!',
          'val-digits2': 'Please enter only digits!',
          'val-number2': 'Please enter a number!',
          'val-range2': 'Please enter a number between 1 and 5!',
          'val-terms2': 'You must agree to the service terms!'
        }
      });
    }
    /*
     * Init functionality
     *
     */

  }, {
    key: "init",
    value: function init() {
      this.initValidationBootstrap();
      this.initValidationMaterial(); // Init Validation on Select2 change

      jQuery('.js-select2').on('change', function (e) {
        jQuery(e.currentTarget).valid();
      });
    }
  }]);

  return BeFormValidation;
}(); // Initialize when page loads


jQuery(function () {
  BeFormValidation.init();
});

/***/ }),

/***/ 4:
/*!*********************************************************!*\
  !*** multi ./resources/js/pages/be_forms_validation.js ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\ncctowerapp\resources\js\pages\be_forms_validation.js */"./resources/js/pages/be_forms_validation.js");


/***/ })

/******/ });