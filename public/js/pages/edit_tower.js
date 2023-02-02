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
/******/ 	return __webpack_require__(__webpack_require__.s = 8);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/@babel/runtime/regenerator/index.js":
/*!**********************************************************!*\
  !*** ./node_modules/@babel/runtime/regenerator/index.js ***!
  \**********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! regenerator-runtime */ "./node_modules/regenerator-runtime/runtime.js");


/***/ }),

/***/ "./node_modules/regenerator-runtime/runtime.js":
/*!*****************************************************!*\
  !*** ./node_modules/regenerator-runtime/runtime.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/**
 * Copyright (c) 2014-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */

var runtime = (function (exports) {
  "use strict";

  var Op = Object.prototype;
  var hasOwn = Op.hasOwnProperty;
  var undefined; // More compressible than void 0.
  var $Symbol = typeof Symbol === "function" ? Symbol : {};
  var iteratorSymbol = $Symbol.iterator || "@@iterator";
  var asyncIteratorSymbol = $Symbol.asyncIterator || "@@asyncIterator";
  var toStringTagSymbol = $Symbol.toStringTag || "@@toStringTag";

  function wrap(innerFn, outerFn, self, tryLocsList) {
    // If outerFn provided and outerFn.prototype is a Generator, then outerFn.prototype instanceof Generator.
    var protoGenerator = outerFn && outerFn.prototype instanceof Generator ? outerFn : Generator;
    var generator = Object.create(protoGenerator.prototype);
    var context = new Context(tryLocsList || []);

    // The ._invoke method unifies the implementations of the .next,
    // .throw, and .return methods.
    generator._invoke = makeInvokeMethod(innerFn, self, context);

    return generator;
  }
  exports.wrap = wrap;

  // Try/catch helper to minimize deoptimizations. Returns a completion
  // record like context.tryEntries[i].completion. This interface could
  // have been (and was previously) designed to take a closure to be
  // invoked without arguments, but in all the cases we care about we
  // already have an existing method we want to call, so there's no need
  // to create a new function object. We can even get away with assuming
  // the method takes exactly one argument, since that happens to be true
  // in every case, so we don't have to touch the arguments object. The
  // only additional allocation required is the completion record, which
  // has a stable shape and so hopefully should be cheap to allocate.
  function tryCatch(fn, obj, arg) {
    try {
      return { type: "normal", arg: fn.call(obj, arg) };
    } catch (err) {
      return { type: "throw", arg: err };
    }
  }

  var GenStateSuspendedStart = "suspendedStart";
  var GenStateSuspendedYield = "suspendedYield";
  var GenStateExecuting = "executing";
  var GenStateCompleted = "completed";

  // Returning this object from the innerFn has the same effect as
  // breaking out of the dispatch switch statement.
  var ContinueSentinel = {};

  // Dummy constructor functions that we use as the .constructor and
  // .constructor.prototype properties for functions that return Generator
  // objects. For full spec compliance, you may wish to configure your
  // minifier not to mangle the names of these two functions.
  function Generator() {}
  function GeneratorFunction() {}
  function GeneratorFunctionPrototype() {}

  // This is a polyfill for %IteratorPrototype% for environments that
  // don't natively support it.
  var IteratorPrototype = {};
  IteratorPrototype[iteratorSymbol] = function () {
    return this;
  };

  var getProto = Object.getPrototypeOf;
  var NativeIteratorPrototype = getProto && getProto(getProto(values([])));
  if (NativeIteratorPrototype &&
      NativeIteratorPrototype !== Op &&
      hasOwn.call(NativeIteratorPrototype, iteratorSymbol)) {
    // This environment has a native %IteratorPrototype%; use it instead
    // of the polyfill.
    IteratorPrototype = NativeIteratorPrototype;
  }

  var Gp = GeneratorFunctionPrototype.prototype =
    Generator.prototype = Object.create(IteratorPrototype);
  GeneratorFunction.prototype = Gp.constructor = GeneratorFunctionPrototype;
  GeneratorFunctionPrototype.constructor = GeneratorFunction;
  GeneratorFunctionPrototype[toStringTagSymbol] =
    GeneratorFunction.displayName = "GeneratorFunction";

  // Helper for defining the .next, .throw, and .return methods of the
  // Iterator interface in terms of a single ._invoke method.
  function defineIteratorMethods(prototype) {
    ["next", "throw", "return"].forEach(function(method) {
      prototype[method] = function(arg) {
        return this._invoke(method, arg);
      };
    });
  }

  exports.isGeneratorFunction = function(genFun) {
    var ctor = typeof genFun === "function" && genFun.constructor;
    return ctor
      ? ctor === GeneratorFunction ||
        // For the native GeneratorFunction constructor, the best we can
        // do is to check its .name property.
        (ctor.displayName || ctor.name) === "GeneratorFunction"
      : false;
  };

  exports.mark = function(genFun) {
    if (Object.setPrototypeOf) {
      Object.setPrototypeOf(genFun, GeneratorFunctionPrototype);
    } else {
      genFun.__proto__ = GeneratorFunctionPrototype;
      if (!(toStringTagSymbol in genFun)) {
        genFun[toStringTagSymbol] = "GeneratorFunction";
      }
    }
    genFun.prototype = Object.create(Gp);
    return genFun;
  };

  // Within the body of any async function, `await x` is transformed to
  // `yield regeneratorRuntime.awrap(x)`, so that the runtime can test
  // `hasOwn.call(value, "__await")` to determine if the yielded value is
  // meant to be awaited.
  exports.awrap = function(arg) {
    return { __await: arg };
  };

  function AsyncIterator(generator) {
    function invoke(method, arg, resolve, reject) {
      var record = tryCatch(generator[method], generator, arg);
      if (record.type === "throw") {
        reject(record.arg);
      } else {
        var result = record.arg;
        var value = result.value;
        if (value &&
            typeof value === "object" &&
            hasOwn.call(value, "__await")) {
          return Promise.resolve(value.__await).then(function(value) {
            invoke("next", value, resolve, reject);
          }, function(err) {
            invoke("throw", err, resolve, reject);
          });
        }

        return Promise.resolve(value).then(function(unwrapped) {
          // When a yielded Promise is resolved, its final value becomes
          // the .value of the Promise<{value,done}> result for the
          // current iteration.
          result.value = unwrapped;
          resolve(result);
        }, function(error) {
          // If a rejected Promise was yielded, throw the rejection back
          // into the async generator function so it can be handled there.
          return invoke("throw", error, resolve, reject);
        });
      }
    }

    var previousPromise;

    function enqueue(method, arg) {
      function callInvokeWithMethodAndArg() {
        return new Promise(function(resolve, reject) {
          invoke(method, arg, resolve, reject);
        });
      }

      return previousPromise =
        // If enqueue has been called before, then we want to wait until
        // all previous Promises have been resolved before calling invoke,
        // so that results are always delivered in the correct order. If
        // enqueue has not been called before, then it is important to
        // call invoke immediately, without waiting on a callback to fire,
        // so that the async generator function has the opportunity to do
        // any necessary setup in a predictable way. This predictability
        // is why the Promise constructor synchronously invokes its
        // executor callback, and why async functions synchronously
        // execute code before the first await. Since we implement simple
        // async functions in terms of async generators, it is especially
        // important to get this right, even though it requires care.
        previousPromise ? previousPromise.then(
          callInvokeWithMethodAndArg,
          // Avoid propagating failures to Promises returned by later
          // invocations of the iterator.
          callInvokeWithMethodAndArg
        ) : callInvokeWithMethodAndArg();
    }

    // Define the unified helper method that is used to implement .next,
    // .throw, and .return (see defineIteratorMethods).
    this._invoke = enqueue;
  }

  defineIteratorMethods(AsyncIterator.prototype);
  AsyncIterator.prototype[asyncIteratorSymbol] = function () {
    return this;
  };
  exports.AsyncIterator = AsyncIterator;

  // Note that simple async functions are implemented on top of
  // AsyncIterator objects; they just return a Promise for the value of
  // the final result produced by the iterator.
  exports.async = function(innerFn, outerFn, self, tryLocsList) {
    var iter = new AsyncIterator(
      wrap(innerFn, outerFn, self, tryLocsList)
    );

    return exports.isGeneratorFunction(outerFn)
      ? iter // If outerFn is a generator, return the full iterator.
      : iter.next().then(function(result) {
          return result.done ? result.value : iter.next();
        });
  };

  function makeInvokeMethod(innerFn, self, context) {
    var state = GenStateSuspendedStart;

    return function invoke(method, arg) {
      if (state === GenStateExecuting) {
        throw new Error("Generator is already running");
      }

      if (state === GenStateCompleted) {
        if (method === "throw") {
          throw arg;
        }

        // Be forgiving, per 25.3.3.3.3 of the spec:
        // https://people.mozilla.org/~jorendorff/es6-draft.html#sec-generatorresume
        return doneResult();
      }

      context.method = method;
      context.arg = arg;

      while (true) {
        var delegate = context.delegate;
        if (delegate) {
          var delegateResult = maybeInvokeDelegate(delegate, context);
          if (delegateResult) {
            if (delegateResult === ContinueSentinel) continue;
            return delegateResult;
          }
        }

        if (context.method === "next") {
          // Setting context._sent for legacy support of Babel's
          // function.sent implementation.
          context.sent = context._sent = context.arg;

        } else if (context.method === "throw") {
          if (state === GenStateSuspendedStart) {
            state = GenStateCompleted;
            throw context.arg;
          }

          context.dispatchException(context.arg);

        } else if (context.method === "return") {
          context.abrupt("return", context.arg);
        }

        state = GenStateExecuting;

        var record = tryCatch(innerFn, self, context);
        if (record.type === "normal") {
          // If an exception is thrown from innerFn, we leave state ===
          // GenStateExecuting and loop back for another invocation.
          state = context.done
            ? GenStateCompleted
            : GenStateSuspendedYield;

          if (record.arg === ContinueSentinel) {
            continue;
          }

          return {
            value: record.arg,
            done: context.done
          };

        } else if (record.type === "throw") {
          state = GenStateCompleted;
          // Dispatch the exception by looping back around to the
          // context.dispatchException(context.arg) call above.
          context.method = "throw";
          context.arg = record.arg;
        }
      }
    };
  }

  // Call delegate.iterator[context.method](context.arg) and handle the
  // result, either by returning a { value, done } result from the
  // delegate iterator, or by modifying context.method and context.arg,
  // setting context.delegate to null, and returning the ContinueSentinel.
  function maybeInvokeDelegate(delegate, context) {
    var method = delegate.iterator[context.method];
    if (method === undefined) {
      // A .throw or .return when the delegate iterator has no .throw
      // method always terminates the yield* loop.
      context.delegate = null;

      if (context.method === "throw") {
        // Note: ["return"] must be used for ES3 parsing compatibility.
        if (delegate.iterator["return"]) {
          // If the delegate iterator has a return method, give it a
          // chance to clean up.
          context.method = "return";
          context.arg = undefined;
          maybeInvokeDelegate(delegate, context);

          if (context.method === "throw") {
            // If maybeInvokeDelegate(context) changed context.method from
            // "return" to "throw", let that override the TypeError below.
            return ContinueSentinel;
          }
        }

        context.method = "throw";
        context.arg = new TypeError(
          "The iterator does not provide a 'throw' method");
      }

      return ContinueSentinel;
    }

    var record = tryCatch(method, delegate.iterator, context.arg);

    if (record.type === "throw") {
      context.method = "throw";
      context.arg = record.arg;
      context.delegate = null;
      return ContinueSentinel;
    }

    var info = record.arg;

    if (! info) {
      context.method = "throw";
      context.arg = new TypeError("iterator result is not an object");
      context.delegate = null;
      return ContinueSentinel;
    }

    if (info.done) {
      // Assign the result of the finished delegate to the temporary
      // variable specified by delegate.resultName (see delegateYield).
      context[delegate.resultName] = info.value;

      // Resume execution at the desired location (see delegateYield).
      context.next = delegate.nextLoc;

      // If context.method was "throw" but the delegate handled the
      // exception, let the outer generator proceed normally. If
      // context.method was "next", forget context.arg since it has been
      // "consumed" by the delegate iterator. If context.method was
      // "return", allow the original .return call to continue in the
      // outer generator.
      if (context.method !== "return") {
        context.method = "next";
        context.arg = undefined;
      }

    } else {
      // Re-yield the result returned by the delegate method.
      return info;
    }

    // The delegate iterator is finished, so forget it and continue with
    // the outer generator.
    context.delegate = null;
    return ContinueSentinel;
  }

  // Define Generator.prototype.{next,throw,return} in terms of the
  // unified ._invoke helper method.
  defineIteratorMethods(Gp);

  Gp[toStringTagSymbol] = "Generator";

  // A Generator should always return itself as the iterator object when the
  // @@iterator function is called on it. Some browsers' implementations of the
  // iterator prototype chain incorrectly implement this, causing the Generator
  // object to not be returned from this call. This ensures that doesn't happen.
  // See https://github.com/facebook/regenerator/issues/274 for more details.
  Gp[iteratorSymbol] = function() {
    return this;
  };

  Gp.toString = function() {
    return "[object Generator]";
  };

  function pushTryEntry(locs) {
    var entry = { tryLoc: locs[0] };

    if (1 in locs) {
      entry.catchLoc = locs[1];
    }

    if (2 in locs) {
      entry.finallyLoc = locs[2];
      entry.afterLoc = locs[3];
    }

    this.tryEntries.push(entry);
  }

  function resetTryEntry(entry) {
    var record = entry.completion || {};
    record.type = "normal";
    delete record.arg;
    entry.completion = record;
  }

  function Context(tryLocsList) {
    // The root entry object (effectively a try statement without a catch
    // or a finally block) gives us a place to store values thrown from
    // locations where there is no enclosing try statement.
    this.tryEntries = [{ tryLoc: "root" }];
    tryLocsList.forEach(pushTryEntry, this);
    this.reset(true);
  }

  exports.keys = function(object) {
    var keys = [];
    for (var key in object) {
      keys.push(key);
    }
    keys.reverse();

    // Rather than returning an object with a next method, we keep
    // things simple and return the next function itself.
    return function next() {
      while (keys.length) {
        var key = keys.pop();
        if (key in object) {
          next.value = key;
          next.done = false;
          return next;
        }
      }

      // To avoid creating an additional object, we just hang the .value
      // and .done properties off the next function object itself. This
      // also ensures that the minifier will not anonymize the function.
      next.done = true;
      return next;
    };
  };

  function values(iterable) {
    if (iterable) {
      var iteratorMethod = iterable[iteratorSymbol];
      if (iteratorMethod) {
        return iteratorMethod.call(iterable);
      }

      if (typeof iterable.next === "function") {
        return iterable;
      }

      if (!isNaN(iterable.length)) {
        var i = -1, next = function next() {
          while (++i < iterable.length) {
            if (hasOwn.call(iterable, i)) {
              next.value = iterable[i];
              next.done = false;
              return next;
            }
          }

          next.value = undefined;
          next.done = true;

          return next;
        };

        return next.next = next;
      }
    }

    // Return an iterator with no values.
    return { next: doneResult };
  }
  exports.values = values;

  function doneResult() {
    return { value: undefined, done: true };
  }

  Context.prototype = {
    constructor: Context,

    reset: function(skipTempReset) {
      this.prev = 0;
      this.next = 0;
      // Resetting context._sent for legacy support of Babel's
      // function.sent implementation.
      this.sent = this._sent = undefined;
      this.done = false;
      this.delegate = null;

      this.method = "next";
      this.arg = undefined;

      this.tryEntries.forEach(resetTryEntry);

      if (!skipTempReset) {
        for (var name in this) {
          // Not sure about the optimal order of these conditions:
          if (name.charAt(0) === "t" &&
              hasOwn.call(this, name) &&
              !isNaN(+name.slice(1))) {
            this[name] = undefined;
          }
        }
      }
    },

    stop: function() {
      this.done = true;

      var rootEntry = this.tryEntries[0];
      var rootRecord = rootEntry.completion;
      if (rootRecord.type === "throw") {
        throw rootRecord.arg;
      }

      return this.rval;
    },

    dispatchException: function(exception) {
      if (this.done) {
        throw exception;
      }

      var context = this;
      function handle(loc, caught) {
        record.type = "throw";
        record.arg = exception;
        context.next = loc;

        if (caught) {
          // If the dispatched exception was caught by a catch block,
          // then let that catch block handle the exception normally.
          context.method = "next";
          context.arg = undefined;
        }

        return !! caught;
      }

      for (var i = this.tryEntries.length - 1; i >= 0; --i) {
        var entry = this.tryEntries[i];
        var record = entry.completion;

        if (entry.tryLoc === "root") {
          // Exception thrown outside of any try block that could handle
          // it, so set the completion value of the entire function to
          // throw the exception.
          return handle("end");
        }

        if (entry.tryLoc <= this.prev) {
          var hasCatch = hasOwn.call(entry, "catchLoc");
          var hasFinally = hasOwn.call(entry, "finallyLoc");

          if (hasCatch && hasFinally) {
            if (this.prev < entry.catchLoc) {
              return handle(entry.catchLoc, true);
            } else if (this.prev < entry.finallyLoc) {
              return handle(entry.finallyLoc);
            }

          } else if (hasCatch) {
            if (this.prev < entry.catchLoc) {
              return handle(entry.catchLoc, true);
            }

          } else if (hasFinally) {
            if (this.prev < entry.finallyLoc) {
              return handle(entry.finallyLoc);
            }

          } else {
            throw new Error("try statement without catch or finally");
          }
        }
      }
    },

    abrupt: function(type, arg) {
      for (var i = this.tryEntries.length - 1; i >= 0; --i) {
        var entry = this.tryEntries[i];
        if (entry.tryLoc <= this.prev &&
            hasOwn.call(entry, "finallyLoc") &&
            this.prev < entry.finallyLoc) {
          var finallyEntry = entry;
          break;
        }
      }

      if (finallyEntry &&
          (type === "break" ||
           type === "continue") &&
          finallyEntry.tryLoc <= arg &&
          arg <= finallyEntry.finallyLoc) {
        // Ignore the finally entry if control is not jumping to a
        // location outside the try/catch block.
        finallyEntry = null;
      }

      var record = finallyEntry ? finallyEntry.completion : {};
      record.type = type;
      record.arg = arg;

      if (finallyEntry) {
        this.method = "next";
        this.next = finallyEntry.finallyLoc;
        return ContinueSentinel;
      }

      return this.complete(record);
    },

    complete: function(record, afterLoc) {
      if (record.type === "throw") {
        throw record.arg;
      }

      if (record.type === "break" ||
          record.type === "continue") {
        this.next = record.arg;
      } else if (record.type === "return") {
        this.rval = this.arg = record.arg;
        this.method = "return";
        this.next = "end";
      } else if (record.type === "normal" && afterLoc) {
        this.next = afterLoc;
      }

      return ContinueSentinel;
    },

    finish: function(finallyLoc) {
      for (var i = this.tryEntries.length - 1; i >= 0; --i) {
        var entry = this.tryEntries[i];
        if (entry.finallyLoc === finallyLoc) {
          this.complete(entry.completion, entry.afterLoc);
          resetTryEntry(entry);
          return ContinueSentinel;
        }
      }
    },

    "catch": function(tryLoc) {
      for (var i = this.tryEntries.length - 1; i >= 0; --i) {
        var entry = this.tryEntries[i];
        if (entry.tryLoc === tryLoc) {
          var record = entry.completion;
          if (record.type === "throw") {
            var thrown = record.arg;
            resetTryEntry(entry);
          }
          return thrown;
        }
      }

      // The context.catch method must only be called with a location
      // argument that corresponds to a known catch block.
      throw new Error("illegal catch attempt");
    },

    delegateYield: function(iterable, resultName, nextLoc) {
      this.delegate = {
        iterator: values(iterable),
        resultName: resultName,
        nextLoc: nextLoc
      };

      if (this.method === "next") {
        // Deliberately forget the last sent value so that we don't
        // accidentally pass it on to the delegate.
        this.arg = undefined;
      }

      return ContinueSentinel;
    }
  };

  // Regardless of whether this script is executing as a CommonJS module
  // or not, return the runtime object so that we can declare the variable
  // regeneratorRuntime in the outer scope, which allows this module to be
  // injected easily by `bin/regenerator --include-runtime script.js`.
  return exports;

}(
  // If this script is executing as a CommonJS module, use module.exports
  // as the regeneratorRuntime namespace. Otherwise create a new empty
  // object. Either way, the resulting object will be used to initialize
  // the regeneratorRuntime variable at the top of this file.
   true ? module.exports : undefined
));

try {
  regeneratorRuntime = runtime;
} catch (accidentalStrictMode) {
  // This module should not be running in strict mode, so the above
  // assignment should always work unless something is misconfigured. Just
  // in case runtime.js accidentally runs in strict mode, we can escape
  // strict mode using a global Function call. This could conceivably fail
  // if a Content Security Policy forbids using Function, but in that case
  // the proper solution is to fix the accidental strict mode problem. If
  // you've misconfigured your bundler to force strict mode and applied a
  // CSP to forbid Function, and you're not willing to fix either of those
  // problems, please detail your unique predicament in a GitHub issue.
  Function("r", "regeneratorRuntime = r")(runtime);
}


/***/ }),

/***/ "./resources/js/pages/edit_tower.js":
/*!******************************************!*\
  !*** ./resources/js/pages/edit_tower.js ***!
  \******************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);


function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

jQuery(function () {
  try {
    Codebase.helpers(['flatpickr', 'datepicker']);

    var resettenant = document.querySelector("#resettenant"),
        _token = document.querySelector("meta[name='csrf-token']").getAttribute("content"),
        tower = document.querySelector("#tower_id"),
        towerid = tower.value,
        nextButton = document.querySelector(".next-button"),
        previousButton = document.querySelector(".previous-button"),
        activeTab = document.querySelector(".nav-tabs .active"),
        contactnumber = document.querySelector("#contact_number"),
        errorMsg = document.querySelector("#error-msg"),
        validMsg = document.querySelector("#valid-msg"),
        statedropdown = document.querySelector("#state"),
        lga = document.querySelector("#lga"),
        lgaid = document.querySelector("#lga_id"),
        resetinsurance = document.querySelector("#resetinsurance"),
        insurancetab = document.querySelector("#insurance-tab"),
        AddInsurance = document.querySelector("#AddInsurance"),
        AddTenant = document.querySelector("#AddTenant"),
        insurancecompany = document.querySelector("#insurance_company"),
        insurancepolicy = document.querySelector("#insurance_policy"),
        insurancelimit = document.querySelector("#insurance_limit"),
        insurancepremium = document.querySelector("#insurance_premium"),
        insuranceexpirydate = document.querySelector("#insurance_expiry_date"),
        edittowerinsurancebutton = document.querySelectorAll('.edit-tower-insurance'),
        edittowertenantbutton = document.querySelectorAll('.edit-tower-tenant'),
        saveinsurance = document.querySelector('.add-insurance'),
        savetenant = document.querySelector('.add-tenant'),
        insuranceform = document.querySelector('.insurance-form'),
        deletetowerinsuranceforms = document.querySelectorAll('.delete-tower-insurance-form'),
        deletetowertenantforms = document.querySelectorAll('.delete-tower-tenant-form'),
        _insurancemethod = document.querySelector('#_insurancemethod'),
        _tenantmethod = document.querySelector('#_tenantmethod'),
        searchtenantname = document.querySelector("#search_tenant_name"),
        searchantennamake = document.querySelector("#search_antenna_make"),
        searchantennamodel = document.querySelector("#search_antenna_model"),
        hiddentenantname = document.querySelector("#tenant_name"),
        hiddenantennamake = document.querySelector("#antenna_make"),
        hiddenantennamodel = document.querySelector("#antenna_model"),
        insuranceaccordion = document.querySelector('#insurance_accordion'),
        tenantaccordion = document.querySelector('#tenant_accordion_body'),
        antennatype = document.querySelector('#antenna_type'),
        configuration = document.querySelector('#configuration'),
        tenantform = document.querySelector(".tenant-form"),
        maintenanceform = document.querySelector(".maintenance-form"),
        searchmaintenanceagentname = document.querySelector("#search_maintenance_agent_name"),
        searchmaintenanceaengineername = document.querySelector("#search_maintenance_engineer_name"),
        hiddenmaintenanceengineername = document.querySelector("#maintenance_engineer_name"),
        hiddenmaintenanceagentname = document.querySelector("#maintenance_agent_name"),
        maintenanceschedule = document.querySelector("#maintenance_schedule"),
        addmaintenancetower = document.querySelector("#add_maintenance_tower"),
        resetmaintenance = document.querySelector("#resetmaintenance"),
        auditform = document.querySelector(".audit-information"),
        agentncclicence = document.querySelector("#agent_ncc_licence"),
        searchauditagentname = document.querySelector("#search_audit_agent_name"),
        hiddenauditagentname = document.querySelector("#audit_agent_name"),
        audittypes = document.querySelectorAll(".audit_type"),
        auditschedule = document.querySelector("#audit_schedule"),
        saveaudit = document.querySelector(".add-audit"),
        _auditmethod = document.querySelector("#auditmethod"),
        edittowerauditbutton = document.querySelectorAll('.edit-tower-audit'),
        resetaudit = document.querySelector("#resetaudit"),
        auditaccordion = document.querySelector('#audit_accordion_body'),
        AddAudit = document.querySelector('#AddAudit'),
        powersuppliertypes = document.querySelectorAll(".power-supplier-type"),
        powersuppliers = document.querySelectorAll(".power-supplier"),
        powersuppliersinput = document.querySelectorAll(".power-supplier-input"),
        powersupplierskey = document.querySelectorAll(".power-supplier-key"),
        formatDate = function formatDate(date) {
      try {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();
        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;
        return [year, month, day].join('-');
      } catch (error) {}
    },
        PopulateTowerInsurance = function PopulateTowerInsurance(data) {
      try {
        insuranceform.action = "/towers/".concat(data.id, "/updatetowerinsurance?tab=step2");
        insuranceform.querySelectorAll('.form-group').forEach(function (formgroup) {
          return formgroup.classList.remove('is-invalid');
        });
        _insurancemethod.name = "_method";
        _insurancemethod.value = "PUT"; //console.log(insurancecompany);

        insurancecompany.options.forEach(function (option) {
          return option.value == data['insurance_company_id'] ? option.selected = true : "";
        });
        insurancepolicy.options.forEach(function (option) {
          return option.value == data['insurance_policy_id'] ? option.selected = true : "";
        });
        insurancelimit.options.forEach(function (option) {
          return option.value == data['insurance_limit_id'] ? option.selected = true : "";
        });
        insurancepremium.value = data['insurancepremium'];
        insurancepremium.parentNode.classList.add("open");
        insuranceexpirydate.parentNode.classList.add("open");
        var insuranceexpirydates = jQuery(insuranceexpirydate).flatpickr({
          altInput: true,
          altFormat: "F j, Y",
          dateFormat: "Y-m-d",
          defaultDate: formatDate(data['expires_at'])
        });
        AddInsurance.textContent = "Edit Insurance";
        saveinsurance.textContent = "Update";
        jQuery('#insurance_accordion').collapse('show');
      } catch (error) {}
    },
        PopulateTowerTenant = function PopulateTowerTenant(data) {
      try {
        tenantform.action = "/towers/".concat(data.id, "/updatetenanttower?tab=step3");
        tenantform.querySelectorAll('.form-group').forEach(function (formgroup) {
          return formgroup.classList.remove('is-invalid');
        });
        _tenantmethod.name = "_method";
        _tenantmethod.value = "PUT"; //console.log(insurancecompany);

        antennatype.options.forEach(function (option) {
          return option.value == data['antenna_type_id'] ? option.selected = true : "";
        });
        hiddenantennamodel.value = data['antenna_model_id'];
        searchantennamodel.value = data['antennamodel']['name'];
        hiddenantennamake.value = data['antenna_make_id'];
        searchantennamake.value = data['antennamake']['name'];
        hiddentenantname.value = data['tenant_id'];
        searchtenantname.value = data['tenant']['name'];
        configuration.value = data['configuration'];
        antennatype.parentNode.classList.add("open");
        configuration.parentNode.classList.add("open");
        AddTenant.textContent = "Edit Tenant";
        savetenant.textContent = "Update";
        jQuery(tenantaccordion).collapse('show');
      } catch (error) {}
    },
        PopulateTowerAudit = function PopulateTowerAudit(data) {
      try {
        auditform.action = "/towers/".concat(data.id, "/updatetowerauditschedule?tab=step5");
        auditform.querySelectorAll('.form-group').forEach(function (formgroup) {
          return formgroup.classList.remove('is-invalid');
        });
        _auditmethod.name = "_method";
        _auditmethod.value = "PUT"; // console.log(insurancecompany);
        // debugger

        audittypes.forEach(function (audittypeoption) {
          audittypeoption.checked = false;
          var auditagenttoweraudittypeid = audittypeoption.parentElement.querySelector('.auditagenttoweraudittypeid');
          auditagenttoweraudittypeid.value = 0;
          data.auditagenttoweraudittypes.forEach(function (auditagenttoweraudittype) {
            +audittypeoption.value === auditagenttoweraudittype.audittype.id ? function () {
              audittypeoption.checked = true;
              auditagenttoweraudittypeid.value = auditagenttoweraudittype.id;
            }() : "";
          });
        });
        hiddenauditagentname.value = data['audit_agent_id'];
        searchauditagentname.value = data['auditagent']['name'];
        auditschedule.parentNode.classList.add("open");
        var auditscheduledate = jQuery(auditschedule).flatpickr({
          altInput: true,
          altFormat: "F j, Y",
          dateFormat: "Y-m-d",
          defaultDate: formatDate(data['audit_date'])
        }); // audittypes.value = await data['configuration'];
        //

        searchauditagentname.parentNode.classList.add("open");
        AddAudit.textContent = "Edit Audit Information";
        saveaudit.textContent = "Update Audit Information";
        jQuery(auditaccordion).collapse('show');
      } catch (error) {}
    },
        GetTowerInsranceById =
    /*#__PURE__*/
    function () {
      var _ref = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee(insurancecompanytowerid) {
        var response;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _context.prev = 0;
                _context.next = 3;
                return fetch("/api/towers/gettowerinsurancebyid/".concat(insurancecompanytowerid));

              case 3:
                response = _context.sent;
                return _context.abrupt("return", response.json());

              case 7:
                _context.prev = 7;
                _context.t0 = _context["catch"](0);

              case 9:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, null, [[0, 7]]);
      }));

      return function GetTowerInsranceById(_x) {
        return _ref.apply(this, arguments);
      };
    }(),
        GetTowerTenantById =
    /*#__PURE__*/
    function () {
      var _ref2 = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2(tenanttowerid) {
        var response;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                _context2.prev = 0;
                _context2.next = 3;
                return fetch("/api/towers/gettenanttowerbyid/".concat(tenanttowerid));

              case 3:
                response = _context2.sent;
                return _context2.abrupt("return", response.json());

              case 7:
                _context2.prev = 7;
                _context2.t0 = _context2["catch"](0);

              case 9:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2, null, [[0, 7]]);
      }));

      return function GetTowerTenantById(_x2) {
        return _ref2.apply(this, arguments);
      };
    }(),
        GetTowerAuditById =
    /*#__PURE__*/
    function () {
      var _ref3 = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee3(audittowerid) {
        var response;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee3$(_context3) {
          while (1) {
            switch (_context3.prev = _context3.next) {
              case 0:
                _context3.prev = 0;
                _context3.next = 3;
                return fetch("/api/towers/getauditagenttowerbyid/".concat(audittowerid));

              case 3:
                response = _context3.sent;
                return _context3.abrupt("return", response.json());

              case 7:
                _context3.prev = 7;
                _context3.t0 = _context3["catch"](0);

              case 9:
              case "end":
                return _context3.stop();
            }
          }
        }, _callee3, null, [[0, 7]]);
      }));

      return function GetTowerAuditById(_x3) {
        return _ref3.apply(this, arguments);
      };
    }(),
        EditTowerInsurance =
    /*#__PURE__*/
    function () {
      var _ref4 = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee4(e) {
        var insurancecompanytowerid, towerinsurance;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee4$(_context4) {
          while (1) {
            switch (_context4.prev = _context4.next) {
              case 0:
                e.preventDefault();
                _context4.prev = 1;
                insurancecompanytowerid = e.currentTarget.querySelector("input[type='hidden']").value;
                _context4.next = 5;
                return GetTowerInsranceById(insurancecompanytowerid);

              case 5:
                towerinsurance = _context4.sent;
                _context4.t0 = PopulateTowerInsurance;
                _context4.next = 9;
                return towerinsurance;

              case 9:
                _context4.t1 = _context4.sent;
                (0, _context4.t0)(_context4.t1);
                _context4.next = 15;
                break;

              case 13:
                _context4.prev = 13;
                _context4.t2 = _context4["catch"](1);

              case 15:
              case "end":
                return _context4.stop();
            }
          }
        }, _callee4, null, [[1, 13]]);
      }));

      return function EditTowerInsurance(_x4) {
        return _ref4.apply(this, arguments);
      };
    }(),
        EditTowerTenant =
    /*#__PURE__*/
    function () {
      var _ref5 = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee5(e) {
        var tenanttowerid, towertenant;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee5$(_context5) {
          while (1) {
            switch (_context5.prev = _context5.next) {
              case 0:
                e.preventDefault();
                _context5.prev = 1;
                tenanttowerid = e.currentTarget.querySelector("input[type='hidden']").value;
                _context5.next = 5;
                return GetTowerTenantById(tenanttowerid);

              case 5:
                towertenant = _context5.sent;
                _context5.t0 = PopulateTowerTenant;
                _context5.next = 9;
                return towertenant;

              case 9:
                _context5.t1 = _context5.sent;
                (0, _context5.t0)(_context5.t1);
                _context5.next = 15;
                break;

              case 13:
                _context5.prev = 13;
                _context5.t2 = _context5["catch"](1);

              case 15:
              case "end":
                return _context5.stop();
            }
          }
        }, _callee5, null, [[1, 13]]);
      }));

      return function EditTowerTenant(_x5) {
        return _ref5.apply(this, arguments);
      };
    }(),
        EditTowerAudit =
    /*#__PURE__*/
    function () {
      var _ref6 = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee6(e) {
        var tenantauditid, toweraudit;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee6$(_context6) {
          while (1) {
            switch (_context6.prev = _context6.next) {
              case 0:
                e.preventDefault();
                _context6.prev = 1;
                tenantauditid = e.currentTarget.querySelector("input[type='hidden']").value;
                _context6.next = 5;
                return GetTowerAuditById(tenantauditid);

              case 5:
                toweraudit = _context6.sent;
                _context6.t0 = PopulateTowerAudit;
                _context6.next = 9;
                return toweraudit;

              case 9:
                _context6.t1 = _context6.sent;
                (0, _context6.t0)(_context6.t1);
                _context6.next = 15;
                break;

              case 13:
                _context6.prev = 13;
                _context6.t2 = _context6["catch"](1);

              case 15:
              case "end":
                return _context6.stop();
            }
          }
        }, _callee6, null, [[1, 13]]);
      }));

      return function EditTowerAudit(_x6) {
        return _ref6.apply(this, arguments);
      };
    }(),
        getlgabystate = function getlgabystate() {
      var e = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;

      try {
        var stateid = statedropdown.options[statedropdown.selectedIndex].value; // console.log(stateid);

        if (+stateid > 0) {
          lga.innerHTML = "";
          lga.parentNode.classList.add("open");
          var defaultoption = document.createElement("option");
          +lgaid.value > 0 ? "" : defaultoption.text = "Select LGA";
          lga.options.add(defaultoption, 0);
          fetch("/api/lgabystateid/".concat(stateid)).then(function (response) {
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
    },
        GetPowerSuppliersByPowerSourceType =
    /*#__PURE__*/
    function () {
      var _ref7 = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee7(e) {
        var selectedPowerSupplierTypeHTML, selectedPowerSupplierTypeId, selectedPowerSupplierTypeIndex, selectedPowerSupplier, selectedPowerSupplierInput, selectedPowerSupplierkey, selectedPowerSourceType, selectedPowerSourceTypeText, selectedPowerSourceTypeid, defaultoption;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee7$(_context7) {
          while (1) {
            switch (_context7.prev = _context7.next) {
              case 0:
                try {
                  // debugger
                  selectedPowerSupplierTypeHTML = e.currentTarget;
                  selectedPowerSupplierTypeId = selectedPowerSupplierTypeHTML.id;
                  selectedPowerSupplierTypeIndex = +selectedPowerSupplierTypeId.split("-")[1];
                  selectedPowerSupplier = powersuppliers[+selectedPowerSupplierTypeIndex];
                  selectedPowerSupplierInput = powersuppliersinput[+selectedPowerSupplierTypeIndex];
                  selectedPowerSupplierkey = powersupplierskey[+selectedPowerSupplierTypeIndex];
                  selectedPowerSupplier.removeAttribute('disabled');
                  selectedPowerSupplierInput.removeAttribute('disabled');
                  selectedPowerSupplierInput.setAttribute("name", "");
                  selectedPowerSupplier.setAttribute("name", "");
                  selectedPowerSupplierInput.classList.remove('hide');
                  selectedPowerSupplier.classList.remove('hide');
                  selectedPowerSourceType = powersuppliertypes[selectedPowerSupplierTypeIndex].options[selectedPowerSupplierTypeHTML.selectedIndex]; // debugger

                  selectedPowerSourceTypeText = selectedPowerSourceType.text;

                  if (selectedPowerSourceTypeText.toLowerCase() !== "others") {
                    selectedPowerSupplier.setAttribute("name", "power_supplier[".concat(selectedPowerSupplierkey.value, "]"));
                    selectedPowerSupplierInput.setAttribute('disabled', 'disabled');
                    selectedPowerSupplierInput.classList.add('hide');
                    selectedPowerSourceTypeid = selectedPowerSourceType.value;
                    selectedPowerSupplier.parentNode.classList.add("open");
                    defaultoption = document.createElement("option");
                    defaultoption.text = "Select ".concat(selectedPowerSourceType.text);
                    fetch("/api/powers/getpowersuppliersbypowersuppliertypeid/".concat(selectedPowerSourceTypeid)).then(function (response) {
                      return response.json();
                    }).then(function (data) {
                      return data.forEach(function (val, index) {
                        // debugger
                        if (index === 0) {
                          selectedPowerSupplier.innerHTML = "";
                          defaultoption.text = "Select ".concat(selectedPowerSourceType.text);
                        }

                        var option = document.createElement("option");
                        option.text = val.name;
                        option.value = val.id;
                        selectedPowerSupplier.options.add(option, ++index);
                      });
                    });
                  } else {
                    selectedPowerSupplier.setAttribute('disabled', 'disabled');
                    selectedPowerSupplier.classList.add('hide');
                    selectedPowerSupplierInput.setAttribute("name", "power_supplier[".concat(selectedPowerSupplierkey.value, "]"));
                  }
                } catch (error) {
                  console.error({
                    error: error
                  });
                }

              case 1:
              case "end":
                return _context7.stop();
            }
          }
        }, _callee7);
      }));

      return function GetPowerSuppliersByPowerSourceType(_x7) {
        return _ref7.apply(this, arguments);
      };
    }(),
        SearchTenant =
    /*#__PURE__*/
    function () {
      var _ref8 = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee8(term) {
        var search;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee8$(_context8) {
          while (1) {
            switch (_context8.prev = _context8.next) {
              case 0:
                _context8.prev = 0;
                _context8.next = 3;
                return fetch("/api/tenants/searchtenantbyname/".concat(term));

              case 3:
                search = _context8.sent;
                return _context8.abrupt("return", search.json());

              case 7:
                _context8.prev = 7;
                _context8.t0 = _context8["catch"](0);

              case 9:
              case "end":
                return _context8.stop();
            }
          }
        }, _callee8, null, [[0, 7]]);
      }));

      return function SearchTenant(_x8) {
        return _ref8.apply(this, arguments);
      };
    }(),
        SearchAntennaMake =
    /*#__PURE__*/
    function () {
      var _ref9 = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee9(term) {
        var search;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee9$(_context9) {
          while (1) {
            switch (_context9.prev = _context9.next) {
              case 0:
                _context9.prev = 0;
                _context9.next = 3;
                return fetch("/api/antennas/searchantennamakebyname/".concat(term));

              case 3:
                search = _context9.sent;
                return _context9.abrupt("return", search.json());

              case 7:
                _context9.prev = 7;
                _context9.t0 = _context9["catch"](0);

              case 9:
              case "end":
                return _context9.stop();
            }
          }
        }, _callee9, null, [[0, 7]]);
      }));

      return function SearchAntennaMake(_x9) {
        return _ref9.apply(this, arguments);
      };
    }(),
        SearchAntennaModel =
    /*#__PURE__*/
    function () {
      var _ref10 = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee10(term) {
        var search;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee10$(_context10) {
          while (1) {
            switch (_context10.prev = _context10.next) {
              case 0:
                _context10.prev = 0;
                _context10.next = 3;
                return fetch("/api/antennas/searchantennamodelbyname/".concat(term));

              case 3:
                search = _context10.sent;
                return _context10.abrupt("return", search.json());

              case 7:
                _context10.prev = 7;
                _context10.t0 = _context10["catch"](0);

              case 9:
              case "end":
                return _context10.stop();
            }
          }
        }, _callee10, null, [[0, 7]]);
      }));

      return function SearchAntennaModel(_x10) {
        return _ref10.apply(this, arguments);
      };
    }(),
        SearchMaintenanceAgent =
    /*#__PURE__*/
    function () {
      var _ref11 = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee11(term) {
        var search;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee11$(_context11) {
          while (1) {
            switch (_context11.prev = _context11.next) {
              case 0:
                _context11.prev = 0;
                _context11.next = 3;
                return fetch("/api/maintenances/searchmaintenanceagentbyname/".concat(term));

              case 3:
                search = _context11.sent;
                return _context11.abrupt("return", search.json());

              case 7:
                _context11.prev = 7;
                _context11.t0 = _context11["catch"](0);

              case 9:
              case "end":
                return _context11.stop();
            }
          }
        }, _callee11, null, [[0, 7]]);
      }));

      return function SearchMaintenanceAgent(_x11) {
        return _ref11.apply(this, arguments);
      };
    }(),
        SearchMaintenanceEngineer =
    /*#__PURE__*/
    function () {
      var _ref12 = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee12(term) {
        var search;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee12$(_context12) {
          while (1) {
            switch (_context12.prev = _context12.next) {
              case 0:
                _context12.prev = 0;
                _context12.next = 3;
                return fetch("/api/maintenances/searchmaintenanceengineerbynameandagentid/".concat(term, "/").concat(hiddenmaintenanceagentname.value));

              case 3:
                search = _context12.sent;
                return _context12.abrupt("return", search.json());

              case 7:
                _context12.prev = 7;
                _context12.t0 = _context12["catch"](0);

              case 9:
              case "end":
                return _context12.stop();
            }
          }
        }, _callee12, null, [[0, 7]]);
      }));

      return function SearchMaintenanceEngineer(_x12) {
        return _ref12.apply(this, arguments);
      };
    }(),
        SearcAuditAgent =
    /*#__PURE__*/
    function () {
      var _ref13 = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee13(term) {
        var search;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee13$(_context13) {
          while (1) {
            switch (_context13.prev = _context13.next) {
              case 0:
                _context13.prev = 0;
                _context13.next = 3;
                return fetch("/api/audits/searchauditagentbyname/".concat(term));

              case 3:
                search = _context13.sent;
                return _context13.abrupt("return", search.json());

              case 7:
                _context13.prev = 7;
                _context13.t0 = _context13["catch"](0);

              case 9:
              case "end":
                return _context13.stop();
            }
          }
        }, _callee13, null, [[0, 7]]);
      }));

      return function SearcAuditAgent(_x13) {
        return _ref13.apply(this, arguments);
      };
    }(),
        insuranceformvalidation = !jQuery(insuranceform) ? "" : jQuery(insuranceform).validate({
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
        event.preventDefault(); // console.log({
        //     event
        // })
        // form.submit();
        // do other things for a valid form

        form.submit();
      },
      rules: {
        add_insurance_tower: {
          required: true,
          digits: true
        },
        insurance_company: "required",
        insurance_limit: "required",
        insurance_policy: "required",
        insurance_premium: {
          required: true,
          number: true
        },
        insurance_expiry_date: {
          date: true,
          required: true
        }
      },
      messages: {
        insurance_expiry_date: {
          date: "Please use the right date format"
        }
      }
    }),
        tenantformvalidation = !jQuery(tenantform) ? "" : jQuery(tenantform).validate({
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
      submitHandler: function () {
        var _submitHandler = _asyncToGenerator(
        /*#__PURE__*/
        _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee14(form, event) {
          return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee14$(_context14) {
            while (1) {
              switch (_context14.prev = _context14.next) {
                case 0:
                  event.preventDefault(); // console.log({
                  //     event
                  // })
                  // form.submit();
                  // do other things for a valid form

                  _context14.next = 3;
                  return form.submit();

                case 3:
                case "end":
                  return _context14.stop();
              }
            }
          }, _callee14);
        }));

        function submitHandler(_x14, _x15) {
          return _submitHandler.apply(this, arguments);
        }

        return submitHandler;
      }(),
      rules: {
        search_tenant_name: "required",
        search_antenna_model: "required",
        search_antenna_make: "required",
        antenna_type: "required",
        configuration: "required"
      }
    }),
        maintenanceformvalidation = !jQuery(maintenanceform) ? "" : jQuery(maintenanceform).validate({
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
      submitHandler: function () {
        var _submitHandler2 = _asyncToGenerator(
        /*#__PURE__*/
        _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee15(form, event) {
          return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee15$(_context15) {
            while (1) {
              switch (_context15.prev = _context15.next) {
                case 0:
                  event.preventDefault();
                  _context15.next = 3;
                  return form.submit();

                case 3:
                case "end":
                  return _context15.stop();
              }
            }
          }, _callee15);
        }));

        function submitHandler(_x16, _x17) {
          return _submitHandler2.apply(this, arguments);
        }

        return submitHandler;
      }(),
      rules: {
        search_maintenance_engineer_name: "required",
        search_maintenance_agent_name: "required",
        agent_ncc_licence: "required",
        maintenance_schedule: "required"
      }
    }),
        auditformvalidation = !jQuery(auditform) ? "" : jQuery(auditform).validate({
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
      submitHandler: function () {
        var _submitHandler3 = _asyncToGenerator(
        /*#__PURE__*/
        _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee16(form, event) {
          return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee16$(_context16) {
            while (1) {
              switch (_context16.prev = _context16.next) {
                case 0:
                  event.preventDefault();
                  _context16.next = 3;
                  return form.submit();

                case 3:
                case "end":
                  return _context16.stop();
              }
            }
          }, _callee16);
        }));

        function submitHandler(_x18, _x19) {
          return _submitHandler3.apply(this, arguments);
        }

        return submitHandler;
      }(),
      rules: {
        search_audit_agent_name: "required",
        audit_schedule: "required",
        audit_type: "required"
      }
    });

    jQuery(auditschedule) ? jQuery(auditschedule).flatpickr({
      altInput: true,
      altFormat: "F j, Y",
      dateFormat: "Y-m-d",
      defaultDate: formatDate(auditschedule.value)
    }) : "";

    if (activeTab) {
      var activeParentTab = activeTab.parentElement;

      if (activeParentTab) {
        if (activeParentTab.nextElementSibling) {
          if (nextButton) {
            nextButton.addEventListener("click", function (e) {
              return window.location.href = activeParentTab.nextElementSibling.querySelector(".nav-link").href;
            });
          }
        } else {
          nextButton.style.display = "none";
        }

        if (activeParentTab.previousElementSibling) {
          if (previousButton) {
            previousButton.addEventListener("click", function (e) {
              return window.location.href = activeParentTab.previousElementSibling.querySelector(".nav-link").href;
            });
          }
        } else {
          previousButton.style.display = "none";
        }
      }
    }

    jQuery.validator.addMethod("date", function (date, element) {
      return this.optional(element) || date.match(/^\d{4}-((0\d)|(1[012]))-(([012]\d)|3[01])$/);
    }, "Please specify a valid date");

    if (jQuery('#profile')) {
      var _rules;

      jQuery('#profile').validate({
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
          event.preventDefault(); // console.log({
          //     event
          // })

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
                  return $("#tower_name").val();
                },
                towerid: towerid
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
                },
                towerid: towerid
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
            remote: {
              type: 'post',
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
                },
                towerid: towerid
              }
            }
          },
          latitude: {
            required: true,
            remote: {
              type: 'post',
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
                },
                towerid: towerid
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
        }), _rules),
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
    }

    if (contactnumber) {
      // here, the index maps to the error code returned from getValidationError - see readme
      var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"]; // initialise plugin

      var iti = window.intlTelInput(contactnumber, {
        utilsScript: "../../js/plugins/intlTelInput/utils.js"
      });
      iti.setCountry("ng");

      var reset = function reset() {
        contactnumber.classList.remove("error");
        errorMsg.innerHTML = "";
        errorMsg.classList.add("hide");
        validMsg.classList.add("hide");
      }; // on blur: validate


      contactnumber.addEventListener('blur', function () {
        reset();

        if (contactnumber.value.trim()) {
          if (iti.isValidNumber()) {
            validMsg.classList.remove("hide");
          } else {
            contactnumber.classList.add("error");
            var errorCode = iti.getValidationError();
            errorMsg.innerHTML = errorMap[errorCode];
            errorMsg.classList.remove("hide");
          }
        }
      }); // on keyup / change flag: reset

      contactnumber.addEventListener('change', reset);
      contactnumber.addEventListener('keyup', reset);
    }

    if (statedropdown) {
      statedropdown.addEventListener("change", getlgabystate);
    }

    if (deletetowerinsuranceforms) {
      deletetowerinsuranceforms.forEach(function (deletetowerinsuranceform) {
        return jQuery(deletetowerinsuranceform).validate({
          ignore: [],
          submitHandler: function submitHandler(form, event) {
            event.preventDefault();
            var conf = confirm("Are you sure you want to delete?");
            conf ? form.submit() : "";
          },
          rules: {
            delete_tower: {
              digits: true,
              required: true
            },
            delete_insurance_company: {
              digits: true,
              required: true
            }
          }
        });
      });
    }

    if (deletetowertenantforms) {
      deletetowertenantforms.forEach(function (deletetowertenantform) {
        return jQuery(deletetowertenantform).validate({
          ignore: [],
          submitHandler: function submitHandler(form, event) {
            event.preventDefault();
            var conf = confirm("Are you sure you want to delete?");
            conf ? form.submit() : "";
          },
          rules: {
            delete_tower: {
              digits: true,
              required: true
            },
            delete_tenant: {
              digits: true,
              required: true
            }
          }
        });
      });
    }

    if (edittowerinsurancebutton) {
      edittowerinsurancebutton.forEach(function (btn) {
        return btn.addEventListener("click", EditTowerInsurance);
      });
    }

    if (edittowertenantbutton) {
      edittowertenantbutton.forEach(function (btn) {
        return btn.addEventListener("click", EditTowerTenant);
      });
    }

    if (edittowerauditbutton) {
      edittowerauditbutton.forEach(function (btn) {
        return btn.addEventListener("click", EditTowerAudit);
      });
    }

    if (jQuery(insuranceaccordion)) {
      if (AddInsurance) {
        AddInsurance.addEventListener("click", function (e) {
          return jQuery(insuranceaccordion).collapse("show");
        });
      }

      if (resetinsurance) {
        resetinsurance.addEventListener("click", function (e) {
          return jQuery(insuranceaccordion).collapse("hide");
        });
      }

      jQuery(insuranceaccordion).on('show.bs.collapse', function (e) {// do something...
      });
      jQuery(insuranceaccordion).on('hide.bs.collapse', function (e) {
        // debugger
        _insurancemethod.name = "";
        _insurancemethod.value = "";
        insuranceform.action = "towers/addtowerinsurance/".concat(towerid, "?tab=step2"); // do something...

        AddInsurance.textContent = "Add Insurance";
        saveinsurance.textContent = "Save";
        insurancecompany.selectedIndex = 0;
        insurancepolicy.selectedIndex = 0;
        insurancelimit.selectedIndex = 0;
        insurancepremium.value = "";
        var insuranceexpirydates = jQuery(insuranceexpirydate).flatpickr({
          altInput: true,
          altFormat: "F j, Y",
          dateFormat: "Y-m-d"
        }); // console.log({insuranceformvalidation});

        insuranceformvalidation.resetForm();
        insuranceform.querySelectorAll('.form-group').forEach(function (formgroup) {
          return formgroup.classList.remove('is-invalid');
        }); // insuranceform.innerHTML = children;
        // console.log(children);
        // children.forEach(child => insuranceform.appendChild(child));
      });
    }

    if (jQuery(auditaccordion)) {
      if (AddAudit) {
        AddAudit.addEventListener("click", function (e) {
          return jQuery(auditaccordion).collapse("show");
        });
      }

      if (resetaudit) {
        resetaudit.addEventListener("click", function (e) {
          return jQuery(auditaccordion).collapse("hide");
        });
      }

      jQuery(auditaccordion).on('show.bs.collapse', function (e) {});
      jQuery(auditaccordion).on('hide.bs.collapse', function (e) {
        // debugger
        _auditmethod.name = "";
        _auditmethod.value = "";
        auditform.action = "towers/addtowerauditschedule/".concat(towerid, "?tab=step5");
        AddAudit.textContent = "Add Audit Schedule";
        saveaudit.textContent = "Save Audit Schedule";
        audittypes.forEach(function (audittype) {
          return audittype.checked = false;
        });
        searchauditagentname.value = "";
        hiddenauditagentname.value = 0;
        var auditscheduledate = jQuery(auditschedule).flatpickr({
          altInput: true,
          altFormat: "F j, Y",
          dateFormat: "Y-m-d"
        }); // console.log({insuranceformvalidation});

        auditformvalidation.resetForm();
        auditform.querySelectorAll('.form-group').forEach(function (formgroup) {
          return formgroup.classList.remove('is-invalid');
        }); // insuranceform.innerHTML = children;
        // console.log(children);
        // children.forEach(child => insuranceform.appendChild(child));
      });
    }

    if (jQuery(tenantaccordion)) {
      if (AddTenant) {
        AddTenant.addEventListener("click", function (e) {
          return jQuery(tenantaccordion).collapse("show");
        });
      }

      if (resettenant) {
        resettenant.addEventListener("click", function (e) {
          return jQuery(tenantaccordion).collapse("hide");
        });
      }

      jQuery(tenantaccordion).on('hide.bs.collapse', function (e) {
        _tenantmethod.name = "";
        _tenantmethod.value = "";
        tenantform.action = "towers/addtowertenant/".concat(towerid, "?tab=step3");
        AddTenant.textContent = "Add Tenant";
        savetenant.textContent = "Save";
        searchantennamake.value = "";
        searchantennamodel.value = "";
        searchtenantname.value = "";
        hiddenantennamake.value = 0;
        hiddenantennamodel.value = 0;
        hiddenantennamake.value = 0;
        antennatype.selectedIndex = 0;
        configuration.value = "";
        tenantformvalidation.resetForm();
        tenantform.querySelectorAll('.form-group').forEach(function (formgroup) {
          return formgroup.classList.remove('is-invalid');
        });
      });
    }

    if (searchtenantname) {
      $(searchtenantname).autoComplete({
        source: function () {
          var _source = _asyncToGenerator(
          /*#__PURE__*/
          _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee17(term, suggest) {
            var tenant, tenentname;
            return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee17$(_context17) {
              while (1) {
                switch (_context17.prev = _context17.next) {
                  case 0:
                    hiddentenantname.value = 0;
                    _context17.next = 3;
                    return SearchTenant(term);

                  case 3:
                    tenant = _context17.sent;
                    _context17.next = 6;
                    return tenant.map(function (result) {
                      return {
                        id: result.id,
                        value: result.name,
                        label: result.name
                      };
                    });

                  case 6:
                    tenentname = _context17.sent;
                    _context17.t0 = suggest;
                    _context17.next = 10;
                    return tenentname;

                  case 10:
                    _context17.t1 = _context17.sent;
                    (0, _context17.t0)(_context17.t1);

                  case 12:
                  case "end":
                    return _context17.stop();
                }
              }
            }, _callee17);
          }));

          function source(_x20, _x21) {
            return _source.apply(this, arguments);
          }

          return source;
        }(),
        minChars: 2,
        onSelect: function () {
          var _onSelect = _asyncToGenerator(
          /*#__PURE__*/
          _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee18(event, term, item, result) {
            return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee18$(_context18) {
              while (1) {
                switch (_context18.prev = _context18.next) {
                  case 0:
                    // debugger;
                    console.log(result);
                    _context18.next = 3;
                    return result.id;

                  case 3:
                    hiddentenantname.value = _context18.sent;

                  case 4:
                  case "end":
                    return _context18.stop();
                }
              }
            }, _callee18);
          }));

          function onSelect(_x22, _x23, _x24, _x25) {
            return _onSelect.apply(this, arguments);
          }

          return onSelect;
        }()
      });
    }

    if (searchantennamake) {
      $(searchantennamake).autoComplete({
        source: function () {
          var _source2 = _asyncToGenerator(
          /*#__PURE__*/
          _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee19(term, suggest) {
            var antenna, antennamake;
            return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee19$(_context19) {
              while (1) {
                switch (_context19.prev = _context19.next) {
                  case 0:
                    hiddenantennamake.value = 0;
                    _context19.next = 3;
                    return SearchAntennaMake(term);

                  case 3:
                    antenna = _context19.sent;
                    _context19.next = 6;
                    return antenna.map(function (result) {
                      return {
                        id: result.id,
                        value: result.name,
                        label: result.name
                      };
                    });

                  case 6:
                    antennamake = _context19.sent;
                    _context19.t0 = suggest;
                    _context19.next = 10;
                    return antennamake;

                  case 10:
                    _context19.t1 = _context19.sent;
                    (0, _context19.t0)(_context19.t1);

                  case 12:
                  case "end":
                    return _context19.stop();
                }
              }
            }, _callee19);
          }));

          function source(_x26, _x27) {
            return _source2.apply(this, arguments);
          }

          return source;
        }(),
        minChars: 2,
        onSelect: function () {
          var _onSelect2 = _asyncToGenerator(
          /*#__PURE__*/
          _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee20(event, term, item, result) {
            return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee20$(_context20) {
              while (1) {
                switch (_context20.prev = _context20.next) {
                  case 0:
                    // debugger;
                    console.log(item);
                    _context20.next = 3;
                    return result.id;

                  case 3:
                    hiddenantennamake.value = _context20.sent;

                  case 4:
                  case "end":
                    return _context20.stop();
                }
              }
            }, _callee20);
          }));

          function onSelect(_x28, _x29, _x30, _x31) {
            return _onSelect2.apply(this, arguments);
          }

          return onSelect;
        }()
      });
    }

    if (searchantennamodel) {
      $(searchantennamodel).autoComplete({
        source: function () {
          var _source3 = _asyncToGenerator(
          /*#__PURE__*/
          _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee21(term, suggest) {
            var antenna, antennamake;
            return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee21$(_context21) {
              while (1) {
                switch (_context21.prev = _context21.next) {
                  case 0:
                    hiddenantennamodel.value = 0;
                    _context21.next = 3;
                    return SearchAntennaModel(term);

                  case 3:
                    antenna = _context21.sent;
                    _context21.next = 6;
                    return antenna.map(function (result) {
                      return {
                        id: result.id,
                        value: result.name,
                        label: result.name
                      };
                    });

                  case 6:
                    antennamake = _context21.sent;
                    _context21.t0 = suggest;
                    _context21.next = 10;
                    return antennamake;

                  case 10:
                    _context21.t1 = _context21.sent;
                    (0, _context21.t0)(_context21.t1);

                  case 12:
                  case "end":
                    return _context21.stop();
                }
              }
            }, _callee21);
          }));

          function source(_x32, _x33) {
            return _source3.apply(this, arguments);
          }

          return source;
        }(),
        minChars: 2,
        onSelect: function () {
          var _onSelect3 = _asyncToGenerator(
          /*#__PURE__*/
          _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee22(event, term, item, result) {
            return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee22$(_context22) {
              while (1) {
                switch (_context22.prev = _context22.next) {
                  case 0:
                    // debugger;
                    console.log(item);
                    _context22.next = 3;
                    return result.id;

                  case 3:
                    hiddenantennamake.value = _context22.sent;

                  case 4:
                  case "end":
                    return _context22.stop();
                }
              }
            }, _callee22);
          }));

          function onSelect(_x34, _x35, _x36, _x37) {
            return _onSelect3.apply(this, arguments);
          }

          return onSelect;
        }()
      });
    }

    if (searchmaintenanceagentname) {
      $(searchmaintenanceagentname).autoComplete({
        source: function () {
          var _source4 = _asyncToGenerator(
          /*#__PURE__*/
          _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee23(term, suggest) {
            var maintenanceagent, maintenanceagentname;
            return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee23$(_context23) {
              while (1) {
                switch (_context23.prev = _context23.next) {
                  case 0:
                    hiddenmaintenanceagentname.value = 0;
                    agentncclicence.removeAttribute("readonly");
                    _context23.next = 4;
                    return SearchMaintenanceAgent(term);

                  case 4:
                    maintenanceagent = _context23.sent;
                    _context23.next = 7;
                    return maintenanceagent.map(function (result) {
                      return {
                        id: result.id,
                        value: result.name,
                        label: result.name,
                        ncc_licence: result.ncc_licence
                      };
                    });

                  case 7:
                    maintenanceagentname = _context23.sent;
                    _context23.t0 = suggest;
                    _context23.next = 11;
                    return maintenanceagentname;

                  case 11:
                    _context23.t1 = _context23.sent;
                    (0, _context23.t0)(_context23.t1);

                  case 13:
                  case "end":
                    return _context23.stop();
                }
              }
            }, _callee23);
          }));

          function source(_x38, _x39) {
            return _source4.apply(this, arguments);
          }

          return source;
        }(),
        minChars: 2,
        renderItem: function renderItem(item, search, index) {
          // escape special characters
          search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
          var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
          return '<div class="autocomplete-suggestion" data-pos = "' + index + '" data-val="' + item.value + '">' + item.label.replace(re, "<b>$1</b>") + "<br><small>".concat(item.ncc_licence, "<small>") + '</div>';
        },
        onSelect: function () {
          var _onSelect4 = _asyncToGenerator(
          /*#__PURE__*/
          _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee24(event, term, item, result) {
            return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee24$(_context24) {
              while (1) {
                switch (_context24.prev = _context24.next) {
                  case 0:
                    debugger;
                    console.log(item);
                    _context24.next = 4;
                    return result.id;

                  case 4:
                    hiddenmaintenanceagentname.value = _context24.sent;
                    _context24.next = 7;
                    return result.ncc_licence;

                  case 7:
                    agentncclicence.value = _context24.sent;
                    agentncclicence.setAttribute("readonly", true);

                  case 9:
                  case "end":
                    return _context24.stop();
                }
              }
            }, _callee24);
          }));

          function onSelect(_x40, _x41, _x42, _x43) {
            return _onSelect4.apply(this, arguments);
          }

          return onSelect;
        }()
      });
    }

    var initiateMaintenance = function initiateMaintenance() {
      if (!searchmaintenanceaengineername.value) {
        $(searchmaintenanceaengineername).autoComplete({
          source: function () {
            var _source5 = _asyncToGenerator(
            /*#__PURE__*/
            _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee25(term, suggest) {
              var maintenanceengineer, maintenanceengineername;
              return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee25$(_context25) {
                while (1) {
                  switch (_context25.prev = _context25.next) {
                    case 0:
                      hiddenmaintenanceengineername.value = 0;
                      _context25.next = 3;
                      return SearchMaintenanceEngineer(term);

                    case 3:
                      maintenanceengineer = _context25.sent;
                      _context25.next = 6;
                      return maintenanceengineer.map(function (result) {
                        return {
                          id: result.id,
                          value: result.name,
                          label: result.name,
                          maintenanceagent: result.maintenanceagent.name
                        };
                      });

                    case 6:
                      maintenanceengineername = _context25.sent;
                      _context25.t0 = suggest;
                      _context25.next = 10;
                      return maintenanceengineername;

                    case 10:
                      _context25.t1 = _context25.sent;
                      (0, _context25.t0)(_context25.t1);

                    case 12:
                    case "end":
                      return _context25.stop();
                  }
                }
              }, _callee25);
            }));

            function source(_x44, _x45) {
              return _source5.apply(this, arguments);
            }

            return source;
          }(),
          minChars: 2,
          renderItem: function renderItem(item, search, index) {
            // escape special characters
            search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
            var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
            return '<div class="autocomplete-suggestion" data-pos = "' + index + '" data-val="' + item.value + '">' + item.label.replace(re, "<b>$1</b>") + "<br><small>".concat(item.maintenanceagent, "<small>") + '</div>';
          },
          onSelect: function () {
            var _onSelect5 = _asyncToGenerator(
            /*#__PURE__*/
            _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee26(event, term, item, result) {
              return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee26$(_context26) {
                while (1) {
                  switch (_context26.prev = _context26.next) {
                    case 0:
                      // debugger;
                      console.log(item);
                      _context26.next = 3;
                      return result.id;

                    case 3:
                      hiddenmaintenanceagentname.value = _context26.sent;

                    case 4:
                    case "end":
                      return _context26.stop();
                  }
                }
              }, _callee26);
            }));

            function onSelect(_x46, _x47, _x48, _x49) {
              return _onSelect5.apply(this, arguments);
            }

            return onSelect;
          }()
        });
      }
    };

    initiateMaintenance();

    if (resetmaintenance) {
      resetmaintenance.addEventListener('click', function (e) {
        e.preventDefault();

        try {
          var _maintenancemethod = maintenanceform.querySelector("input[name='_method']"),
              updatemaintenance = document.querySelector('.btn-update-maintenance');

          updatemaintenance.textContent = "Save maintenance information";
          updatemaintenance.classList.remove("ml-auto", "mr-3", "btn-update-maintenance");
          updatemaintenance.classList.add("m-auto");
          searchauditagentname.value = "";
          hiddenauditagentname.value = "";
          searchmaintenanceaengineername.removeAttribute("readonly");
          hiddenmaintenanceengineername.value = 0;
          searchmaintenanceaengineername.value = "";
          searchmaintenanceagentname.value = "";
          maintenanceschedule.selectedIndex = 0, agentncclicence.value = "";
          maintenanceformvalidation.resetForm();
          maintenanceform.querySelectorAll('.form-group').forEach(function (formgroup) {
            return formgroup.classList.remove('is-invalid');
          });
          maintenanceform.action = "/towers/addtowermaintenance/".concat(addmaintenancetower.value);
          maintenanceform.removeChild(_maintenancemethod);
          resetmaintenance.parentElement.removeChild(resetmaintenance);
          initiateMaintenance();
        } catch (error) {}
      });
    }

    if (searchauditagentname) {
      $(searchauditagentname).autoComplete({
        source: function () {
          var _source6 = _asyncToGenerator(
          /*#__PURE__*/
          _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee27(term, suggest) {
            var auditagent, auditagentname;
            return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee27$(_context27) {
              while (1) {
                switch (_context27.prev = _context27.next) {
                  case 0:
                    hiddenmaintenanceengineername.value = 0;
                    _context27.next = 3;
                    return SearcAuditAgent(term);

                  case 3:
                    auditagent = _context27.sent;
                    _context27.next = 6;
                    return auditagent.map(function (result) {
                      return {
                        id: result.id,
                        value: result.name,
                        label: result.name
                      };
                    });

                  case 6:
                    auditagentname = _context27.sent;
                    _context27.t0 = suggest;
                    _context27.next = 10;
                    return auditagentname;

                  case 10:
                    _context27.t1 = _context27.sent;
                    (0, _context27.t0)(_context27.t1);

                  case 12:
                  case "end":
                    return _context27.stop();
                }
              }
            }, _callee27);
          }));

          function source(_x50, _x51) {
            return _source6.apply(this, arguments);
          }

          return source;
        }(),
        minChars: 2,
        onSelect: function () {
          var _onSelect6 = _asyncToGenerator(
          /*#__PURE__*/
          _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee28(event, term, item, result) {
            return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee28$(_context28) {
              while (1) {
                switch (_context28.prev = _context28.next) {
                  case 0:
                    // debugger;
                    console.log(item);
                    _context28.next = 3;
                    return result.id;

                  case 3:
                    hiddenauditagentname.value = _context28.sent;

                  case 4:
                  case "end":
                    return _context28.stop();
                }
              }
            }, _callee28);
          }));

          function onSelect(_x52, _x53, _x54, _x55) {
            return _onSelect6.apply(this, arguments);
          }

          return onSelect;
        }()
      });
    }

    if (powersuppliertypes) {
      // debugger
      powersuppliertypes.forEach(function (btn) {
        return btn.addEventListener("change", GetPowerSuppliersByPowerSourceType);
      });
    }
  } catch (error) {
    console.error({
      error: error
    });
  }
});

/***/ }),

/***/ 8:
/*!************************************************!*\
  !*** multi ./resources/js/pages/edit_tower.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\ncctowerapp\resources\js\pages\edit_tower.js */"./resources/js/pages/edit_tower.js");


/***/ })

/******/ });