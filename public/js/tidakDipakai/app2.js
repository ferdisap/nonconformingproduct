/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/CreateChart.js":
/*!*************************************!*\
  !*** ./resources/js/CreateChart.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "CreateChart": () => (/* binding */ CreateChart)
/* harmony export */ });
var CreateChart = 'ferdi'; // export default function CreateChart(){
// }
// export default class CreateChart{
//   labels = [
//     'January',
//     'February',
//     'March',
//     'April',
//     'May',
//     'June',
//   ];
//   data = {
//     labels: this.labels,
//     datasets: [{
//       label: 'My First dataset',
//       backgroundColor: 'rgb(255, 99, 132)',
//       borderColor: 'rgb(255, 99, 132)',
//       data: [0, 10, 5, 2, 20, 30, 45],
//     }]
//   };
//   config = {
//     type: 'line',
//     data: this.data,
//     options: {}
//   };
//   setCtx(elementId){
//     try {
//       this.ctx = document.querySelector('#content').firstChild.shadowRoot.getElementById(elementId).getContext('2d')
//     } catch (e) {
//      try{
//       this.ctx = document.getElementById(elementId).getContext('2d');
//      } catch (e){
//        console.log(e, 'the element id cannot be found')
//      }
//     }
//   }
//   setData() {
//     return this.config;
//   };
//   get renderChart() {
//     return this.chart = new Chart(this.ctx, this.setData());
//   }
//   get destroyChart(){
//     return this.chart.destroy();
//   }
// }

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
  !*** ./resources/js/app2.js ***!
  \******************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _CreateChart_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./CreateChart.js */ "./resources/js/CreateChart.js");
// import {Chart} from './chart.js';
// import Chart from './chart.js';
 // import { Chart, registerables } from './chart.js';
// Chart.register(...registerables);
// var ctx = document.getElementById('myChart1').getContext('2d')
// let chart1 = new CreateChart();
// chart1.setConfiguration();
// chart1.renderChart();
// console.log(CreateChart);
// console.log(chart1)
})();

/******/ })()
;