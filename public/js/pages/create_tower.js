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
/******/ 	return __webpack_require__(__webpack_require__.s = 7);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pages/create_tower.js":
/*!********************************************!*\
  !*** ./resources/js/pages/create_tower.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

jQuery(function () {
  Codebase.helpers(['flatpickr', 'datepicker']);
});
jQuery(function () {
  var _rules;

  var _token = document.querySelector("meta[name='csrf-token']").getAttribute("content");

  jQuery.validator.addMethod("date", function (date, element) {
    return this.optional(element) || date.match(/^\d{4}-((0\d)|(1[012]))-(([012]\d)|3[01])$/);
  }, "Please specify a valid date");

  var gettowername = function gettowername() {
    return {
      tower_name: document.querySelector("#tower_name").value
    };
  };

  jQuery('#create').validate({
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
    submitHandler: function submitHandler(form, event) {
      event.preventDefault();
      console.log({
        event: event
      });
      form.submit(); // do other things for a valid form
      // form.submit();
    },
    rules: (_rules = {
      tower_owner: "required",
      tower_name: {
        //checkIfTowerNameExists: true,
        required: true,
        minlength: 3,
        remote: {
          url: "/towers/checkiftowernameexists",
          type: "post",
          headers: {
            'X-CSRF-TOKEN': _token
          },
          data: {
            tower_name: function tower_name() {
              return document.querySelector("#tower_name").value;
            }
          }
        }
      },
      ncc_identity: {
        required: true,
        minlength: 3,
        remote: {
          url: "/towers/checkifnccidentityexists",
          type: "post",
          headers: {
            'X-CSRF-TOKEN': _token
          },
          data: {
            ncc_identity: function ncc_identity() {
              return $("#ncc_identity").val();
            }
          }
        }
      },
      address: {
        required: true,
        minlength: 3
      },
      state: "required",
      lga: "required",
      longitude: {
        required: true,
        type: 'post',
        remote: {
          url: '/towers/checkduplicategeoposition',
          headers: {
            'X-CSRF-TOKEN': _token
          },
          data: {
            latitude: function latitude() {
              return document.querySelector("#latitude").value;
            },
            longitude: function longitude() {
              return document.querySelector("#longitude").value;
            }
          }
        }
      },
      latitude: {
        required: true,
        type: 'post',
        remote: {
          url: '/towers/checkduplicategeoposition',
          headers: {
            'X-CSRF-TOKEN': _token
          },
          data: {
            latitude: function latitude() {
              return document.querySelector("#latitude").value;
            },
            longitude: function longitude() {
              return document.querySelector("#longitude").value;
            }
          }
        }
      },
      landlord_name: {
        required: true,
        minlength: 3
      },
      contact_number: "required",
      tower_type: "required",
      no_of_sections: "required"
    }, _defineProperty(_rules, "no_of_sections", {
      minlength: 1,
      required: true
    }), _defineProperty(_rules, "tower_height", {
      minlength: 1,
      required: true
    }), _defineProperty(_rules, "date_of_erection", {
      date: true,
      required: true
    }), _defineProperty(_rules, "main_power", "required"), _defineProperty(_rules, "first_backup", "required"), _defineProperty(_rules, "secon_backup", "required"), _rules),
    messages: {
      tower_owner: 'Please select a value!',
      tower_name: {
        minlength: "Minimun length of three characters required",
        remote: "Tower exists"
      },
      ncc_identity: {
        minlength: "Minimun length of three characters required",
        remote: "this ncc identity exists!"
      },
      address: {
        minlength: "Minimun length of three characters required"
      },
      longitude: {
        remote: "This cordinate exist"
      },
      latitude: {
        remote: "This cordinate exist"
      },
      state: 'Please select a value!',
      lga: 'Please select a value!',
      landlord_name: {
        minlength: "Minimun length of three characters required"
      },
      tower_type: "Please select a value!",
      date_of_erection: {
        date: "enter a valid format"
      }
    }
  });
  var input = document.querySelector("#contact_number"),
      errorMsg = document.querySelector("#error-msg"),
      validMsg = document.querySelector("#valid-msg"); // here, the index maps to the error code returned from getValidationError - see readme

  var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"]; // initialise plugin

  var iti = window.intlTelInput(input, {
    utilsScript: "../js/plugins/intlTelInput/utils.js"
  });
  iti.setCountry("ng");

  var reset = function reset() {
    input.classList.remove("error");
    errorMsg.innerHTML = "";
    errorMsg.classList.add("hide");
    validMsg.classList.add("hide");
  }; // on blur: validate


  input.addEventListener('blur', function () {
    reset();

    if (input.value.trim()) {
      if (iti.isValidNumber()) {
        validMsg.classList.remove("hide");
      } else {
        input.classList.add("error");
        var errorCode = iti.getValidationError();
        errorMsg.innerHTML = errorMap[errorCode];
        errorMsg.classList.remove("hide");
      }
    }
  }); // on keyup / change flag: reset

  input.addEventListener('change', reset);
  input.addEventListener('keyup', reset);
  var statedropdown = document.querySelector("#state");
  var lga = document.querySelector("#lga");
  var lgaid = document.querySelector("#lga_id");

  var getlgabystate = function getlgabystate() {
    var e = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;

    try {
      var stateid = statedropdown.options[statedropdown.selectedIndex].value; // console.log(stateid);

      if (+stateid > 0) {
        lga.innerHTML = "";
        lga.parentNode.classList.add("open");
        var defaultoption = document.createElement("option");
        +lgaid.value > 0 ? "" : defaultoption.text = "Select LGA";
        lga.options.add(defaultoption, 0);
        fetch("../api/lgabystateid/".concat(stateid)).then(function (response) {
          return response.json();
        }).then(function (data) {
          return data.forEach(function (val, index) {
            var option = document.createElement("option");
            option.text = val.name;
            option.value = val.id;
            option.selected = +option.value === +lgaid.value ? true : false;
            lga.options.add(option, ++index);
          });
        });
      }
    } catch (ex) {
      console.log(ex);
    }
  };

  statedropdown.addEventListener("change", getlgabystate);
  getlgabystate();
});

/***/ }),

/***/ 7:
/*!**************************************************!*\
  !*** multi ./resources/js/pages/create_tower.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\ncctowerapp\resources\js\pages\create_tower.js */"./resources/js/pages/create_tower.js");


/***/ })

/******/ });