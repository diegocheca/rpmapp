(self["webpackChunk"] = self["webpackChunk"] || []).push([["helpers_formularios_Rio_Negro_observaciones_js"],{

/***/ "./helpers/formularios/Rio Negro/observaciones.js":
/*!********************************************************!*\
  !*** ./helpers/formularios/Rio Negro/observaciones.js ***!
  \********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Observaciones)
/* harmony export */ });
/* harmony import */ var _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../enums/inputsTypes */ "./helpers/enums/inputsTypes.js");
/* harmony import */ var yup__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! yup */ "./node_modules/yup/es/index.js");
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }




var Observaciones = /*#__PURE__*/function () {
  function Observaciones(data) {
    _classCallCheck(this, Observaciones);

    this.observations = this.getFormSchema(data);
  }

  _createClass(Observaciones, [{
    key: "getFormSchema",
    value: function getFormSchema(data) {
      console.log(data);
      if (data.action == 'create') return {};
      return {
        name: "".concat(data.name, "_evaluacion"),
        value: data.schema["".concat(data.name, "_evaluacion")],
        options: [{
          label: 'Si',
          value: 'aprobado',
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_0__.default.RADIO
        }, {
          label: 'No',
          value: 'rechazado',
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_0__.default.RADIO
        }, {
          label: 'Sin evaluar',
          value: 'sin evaluar',
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_0__.default.RADIO
        }],
        validations: data.action == 'evaluate' ? yup__WEBPACK_IMPORTED_MODULE_1__.string().oneOf(["aprobado", "rechazado", "sin evaluar"], 'Debes seleccionar una opción').required('Debes seleccionar una opción').nullable() : null,
        comment: {
          label: 'OBSERVACIÓN',
          value: data.schema["".concat(data.name, "_comentario")],
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_0__.default.TEXTAREA,
          name: "".concat(data.name, "_comentario"),
          validationType: "string",
          validations: yup__WEBPACK_IMPORTED_MODULE_1__.string().when("observacion_".concat(data.name), {
            is: "rechazado",
            then: yup__WEBPACK_IMPORTED_MODULE_1__.string().min(5, 'Debes ingresar al menos 5 caracteres').max(50, 'Puedes ingresar hasta 50 caracteres').required('Debes agregar una observación')
          }).nullable()
        }
      };
    }
  }]);

  return Observaciones;
}();



/***/ })

}]);