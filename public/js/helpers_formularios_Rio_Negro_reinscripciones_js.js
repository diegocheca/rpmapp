(self["webpackChunk"] = self["webpackChunk"] || []).push([["helpers_formularios_Rio_Negro_reinscripciones_js"],{

/***/ "./helpers/enums/fileAccept.js":
/*!*************************************!*\
  !*** ./helpers/enums/fileAccept.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  DOC: {
    value: [".doc", ".docx", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document"],
    label: "doc"
  },
  AUDIO: {
    value: ["audio/*"],
    label: "audio"
  },
  VIDEO: {
    value: ["video/*"],
    label: "video"
  },
  IMAGE: {
    value: ["image/jpeg", "image/jpg"],
    label: "img"
  },
  PDF: {
    value: ["application/pdf"],
    label: "pdf"
  }
});

/***/ }),

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



/***/ }),

/***/ "./helpers/formularios/Rio Negro/reinscripciones.js":
/*!**********************************************************!*\
  !*** ./helpers/formularios/Rio Negro/reinscripciones.js ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "getFormSchema": () => (/* binding */ getFormSchema)
/* harmony export */ });
/* harmony import */ var yup__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! yup */ "./node_modules/yup/es/index.js");
/* harmony import */ var _observaciones__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./observaciones */ "./helpers/formularios/Rio Negro/observaciones.js");
/* harmony import */ var _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../enums/inputsTypes */ "./helpers/enums/inputsTypes.js");
/* harmony import */ var _enums_fileAccept__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../enums/fileAccept */ "./helpers/enums/fileAccept.js");
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _extends() { _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; }; return _extends.apply(this, arguments); }





function getFormSchema(_ref, evaluate, dataForm) {
  var schema = _extends({}, _ref);

  // name => unique
  return [// row 1
  {
    widthResponsive: 'lg:flex-row',
    //flex
    // columns
    body: [//  col 1
    {
      title: 'Datos de quien completa este formulario',
      width: 'lg:w-full',
      //flex
      columns: 'grid-cols-1',
      //grid
      columnsResponsive: 'lg:grid-cols-3',
      //inside card
      // infoCard: ''
      // img: '/images/laborales.png',
      inputs: [{
        label: 'Nombre y apellido',
        value: schema.nombre,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
        name: 'nombre',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes completar este campo').nullable(),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'nombre',
          evaluate: evaluate
        }).observations
      }, {
        label: 'DNI',
        value: schema.dni,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.NUMBER,
        name: 'dni',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes completar este campo'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'dni',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Cargo en la empresa',
        value: schema.cargo,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
        name: 'cargo',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes completar este campo'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'cargo',
          evaluate: evaluate
        }).observations
      }]
    }]
  }, // row 2
  {
    widthResponsive: 'lg:flex-row',
    //flex
    // columns
    body: [//  col 1
    {
      title: 'Mercado (indicar en que mercados vende su producción)',
      width: 'lg:w-full',
      //flex
      columns: 'grid-cols-1',
      //grid
      columnsResponsive: '',
      //inside card
      // infoCard: ''
      // img: '/images/laborales.png',
      inputs: [{
        label: 'Porcentaje vendido a Provincia',
        value: schema.porcentaje_venta_provincia,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.NUMBER,
        name: 'porcentaje_venta_provincia',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes completar este campo'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'porcentaje_venta_provincia',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Porcentaje vendido a otras Provincias',
        value: schema.porcentaje_venta_otras_provincias,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.NUMBER,
        name: 'porcentaje_venta_otras_provincias',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes completar este campo'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'porcentaje_venta_otras_provincias',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Porcentaje Exportado',
        value: schema.porcentaje_exportado,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.NUMBER,
        name: 'porcentaje_exportado',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes completar este campo'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'porcentaje_exportado',
          evaluate: evaluate
        }).observations
      }]
    }, {
      title: 'Mercado (indicar en que mercados vende su producción)',
      width: 'lg:w-full',
      //flex
      columns: 'grid-cols-1',
      //grid
      columnsResponsive: '',
      //inside card
      // infoCard: ''
      // img: '/images/laborales.png',
      inputs: [{
        label: 'Prospección',
        value: schema.prospeccion ? true : false,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.CHECKBOX,
        name: 'prospeccion',
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'prospeccion',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Explotación',
        value: schema.explotacion ? true : false,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.CHECKBOX,
        name: 'explotacion',
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'explotacion',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Desarrollo',
        value: schema.desarrollo ? true : false,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.CHECKBOX,
        name: 'desarrollo',
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'desarrollo',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Exploración',
        value: schema.explotacion ? true : false,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.CHECKBOX,
        name: 'exploracion',
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'exploracion',
          evaluate: evaluate
        }).observations
      }]
    }]
  }, //  row 3
  {
    widthResponsive: 'flex-row',
    body: [//  col 1
    {
      title: 'Personal ocupado',
      width: '',
      columns: 'grid-cols-1',
      columnsResponsive: 'lg:grid-cols-3',
      img: '/images/laborales.png',
      inputs: [{
        label: 'Profesional Técnico Permanente',
        value: schema.personal_perm_profesional,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.NUMBER,
        name: 'personal_perm_profesional',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes ingresar una cantidad.'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'personal_perm_profesional',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Operarios y Obreros Permanente',
        value: schema.personal_perm_operarios,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.NUMBER,
        name: 'personal_perm_operarios',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes ingresar una cantidad.'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'personal_perm_operarios',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Administrativo Permanente',
        value: schema.personal_perm_administrativos,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.NUMBER,
        name: 'personal_perm_administrativos',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes ingresar una cantidad.'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'personal_perm_administrativos',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Otros Permanente',
        value: schema.personal_perm_otros,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.NUMBER,
        name: 'personal_perm_otros',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes ingresar una cantidad.'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'personal_perm_otros',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Profesional Transitorio',
        value: schema.personal_trans_profesional,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.NUMBER,
        name: 'personal_trans_profesional',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes ingresar una cantidad.'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'personal_trans_profesional',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Operarios y Obreros Transitorio',
        value: schema.personal_trans_operarios,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.NUMBER,
        name: 'personal_trans_operarios',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes ingresar una cantidad.'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'personal_trans_operarios',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Administrativo Transitorio',
        value: schema.personal_trans_administrativos,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.NUMBER,
        name: 'personal_trans_administrativos',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes ingresar una cantidad.'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'personal_trans_administrativos',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Otros Transitorio',
        value: schema.personal_trans_otros,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.NUMBER,
        name: 'personal_trans_otros',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes ingresar una cantidad.'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'personal_trans_otros',
          evaluate: evaluate
        }).observations
      }]
    }]
  }, // row 4
  {
    widthResponsive: 'flex-row',
    //flex
    // columns
    body: [//  col 1
    {
      title: 'Sustancias minerales que insuatralizan',
      width: '',
      //flex
      // columns: '', //grid
      // columnsResponsive: '', //inside card
      img: '/images/laborales.png',
      inputs: [{
        label: '',
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.LIST,
        name: 'Productos',
        columns: 'grid-cols-1',
        // colSpans + 1
        columnsResponsive: 'lg:grid-cols-3',
        childrens: getChildrens(schema.productos),
        elements: [[{
          label: 'Producto Extraído',
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          colSpan: '',
          options: [{
            label: 'Oro',
            value: 'Oro'
          }, {
            label: 'Plata',
            value: 'Plata'
          }, {
            label: 'Cobre',
            value: 'Cobre'
          }, {
            label: 'Hierro',
            value: 'Hierro'
          }, {
            label: 'Cal',
            value: 'Cal'
          }, {
            label: 'Ripio',
            value: 'Ripio'
          }, {
            label: 'Platino',
            value: 'Platino'
          }, {
            label: 'Diamante',
            value: 'Diamante'
          }],
          name: 'nombre_mineral',
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          placeholder: 'Selecciona una opción' // observation: new Observations({schema, name: 'nombre_mineral', evaluate}).observations

        }, {
          label: 'Variedad de',
          value: '',
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: 'variedad',
          colSpan: ''
        }, {
          label: 'Producción',
          value: '',
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.NUMBER,
          name: 'produccion',
          colSpan: ''
        }, {
          label: 'Unidades',
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          colSpan: '',
          options: [{
            label: 'toneladas',
            value: 'toneladas'
          }, {
            label: 'mts 3',
            value: 'mts 3'
          }, {
            label: 'otros',
            value: 'otros'
          }],
          name: 'unidades',
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          placeholder: 'Selecciona una opción'
        }, {
          label: 'Precio de Venta (en $)',
          value: '',
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.NUMBER,
          name: 'precio_venta',
          colSpan: ''
        }, // {
        //     label: 'Empresa compradora',
        //     value: '',
        //     type: inputsTypes.TEXT,
        //     name: 'empresa_compradora',
        //     colSpan: '',
        // },
        // {
        //     label: 'Dirección empresa campradora',
        //     value: '',
        //     type: inputsTypes.TEXT,
        //     name: 'direccion_empresa_compradora',
        //     colSpan: '',
        // },
        // {
        //     label: 'Actividad empresa campradora',
        //     value: '',
        //     type: inputsTypes.TEXT,
        //     name: 'actividad_empresa_compradora',
        //     colSpan: '',
        // },
        _objectSpread({
          colSpan: 'lg:w-5/5',
          type: 'observation'
        }, new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'row',
          evaluate: evaluate
        }).observations)]],
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.array().of(yup__WEBPACK_IMPORTED_MODULE_0__.object().shape({
          variedad: yup__WEBPACK_IMPORTED_MODULE_0__.string().nullable().required('Debes completar este campo'),
          nombre_mineral: yup__WEBPACK_IMPORTED_MODULE_0__.object().when('mineral', {
            is: function is(value) {
              return _.isEmpty(value);
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().nullable().required('Debes elegir un elemento')
          }),
          produccion: yup__WEBPACK_IMPORTED_MODULE_0__.string().nullable().required('Debes completar este campo'),
          unidades: yup__WEBPACK_IMPORTED_MODULE_0__.object().when('unidadesSelect', {
            is: function is(value) {
              return _.isEmpty(value);
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().nullable().required('Debes elegir un elemento')
          }),
          precio_venta: yup__WEBPACK_IMPORTED_MODULE_0__.string().nullable().required('Debes completar este campo'),
          // empresa_compradora: yup.string().required('Debes completar este campo').nullable(),
          // direccion_empresa_compradora: yup.string().required('Debes completar este campo').nullable(),
          // actividad_empresa_compradora: yup.string().required('Debes completar este campo').nullable(),
          row_evaluacion: evaluate ? yup__WEBPACK_IMPORTED_MODULE_0__.string().oneOf(["aprobado", "rechazado", "sin evaluar"]).nullable().required('Debes seleccionar una opción') : {},
          row_comentario: evaluate ? yup__WEBPACK_IMPORTED_MODULE_0__.string().when('observacion_row', {
            is: "rechazado",
            then: yup__WEBPACK_IMPORTED_MODULE_0__.string().min(5, 'Debes ingresar al menos 5 caracteres').max(50, 'Puedes ingresar hasta 50 caracteres').nullable().required('Debes agregar una observación')
          }).nullable() : {}
        })).strict()
      }]
    }]
  }];
}

function getChildrens(data, observation) {
  // los objetos deben tener el mismo orden que en el arreglo de los elementoss
  var child = [// default value,
  {
    // id elemento, solo agregar al primer objeto
    id: null,
    name: 'nombre_mineral',
    value: null,
    // solo necesario para los selects que el valor se ha guardado como un json
    select: true
  }, {
    name: 'variedad',
    value: null
  }, {
    name: 'produccion',
    value: null
  }, {
    name: 'unidades',
    value: null,
    select: true
  }, {
    name: 'precio_venta',
    value: null
  }, // {
  //     name: 'empresa_compradora',
  //     value: null,
  // },
  // {
  //     name: 'direccion_empresa_compradora',
  //     value: null,
  // },
  // {
  //     name: 'actividad_empresa_compradora',
  //     value: null,
  // },
  // si existen evaluaciones, se debe mantener este elemento sin modificar
  {
    name: 'row_evaluacion',
    value: null,
    comment: null
  }];

  if (!data || data.length == 0) {
    return [child];
  }

  var newChildrens = [];

  for (var index = 0; index < data.length; index++) {
    var object = data[index];
    var clone = JSON.parse(JSON.stringify(child));

    var _loop = function _loop(property) {
      var i = clone.findIndex(function (e) {
        return e.name == property;
      });
      if (i == -1) return "continue";

      if (clone[i].select) {
        clone[i].value = JSON.parse(object[property]);
      } else {
        clone[i].value = object[property];
      }

      if (typeof clone[i].id !== 'undefined') {
        clone[i].id = object["id"];
      }
    };

    for (var property in object) {
      var _ret = _loop(property);

      if (_ret === "continue") continue;
    } // set result observation
    // let obs = clone.find(e => e.name == 'row_evaluacion');
    // if (obs) {
    //     const obsSave = observation.find(e => e.id == clone[0].id);
    //     if (obsSave) {
    //         obs.value = obsSave.row_evaluacion;
    //         obs.comment = obsSave.row_comentario
    //     }
    // }
    // if (clone[0].row_evaluacion) {
    //     observation[obs]
    // }
    // console.log(clone);


    newChildrens.push(clone);
  } // newChildrens.push({
  //     name: 'observacion_row',
  //     value: null,
  // });


  return newChildrens;
}

/***/ })

}]);