"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["helpers_formularios_Catamarca_reinscripciones_js"],{

/***/ "./helpers/enums/fileAccept.js":
/*!*************************************!*\
  !*** ./helpers/enums/fileAccept.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

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

/***/ "./helpers/formularios/Catamarca/observaciones.js":
/*!********************************************************!*\
  !*** ./helpers/formularios/Catamarca/observaciones.js ***!
  \********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

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
      console.log(data.schema);
      console.log(data.schema["".concat(data.name, "_comentario")]);
      if (data.action == 'create') return {};
      return {
        name: "".concat(data.name, "_evaluacion"),
        value: data.schema["".concat(data.name, "_evaluacion")],
        options: [{
          label: 'Si',
          value: 'aprobado',
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_0__["default"].RADIO
        }, {
          label: 'No',
          value: 'rechazado',
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_0__["default"].RADIO
        }, {
          label: 'Sin evaluar',
          value: 'sin evaluar',
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_0__["default"].RADIO
        }],
        validations: data.action == 'evaluate' ? yup__WEBPACK_IMPORTED_MODULE_1__.string().oneOf(["aprobado", "rechazado", "sin evaluar"], 'Debes seleccionar una opción').required('Debes seleccionar una opción').nullable() : null,
        comment: {
          label: 'OBSERVACIÓN',
          value: data.schema["".concat(data.name, "_comentario")],
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_0__["default"].TEXTAREA,
          name: "".concat(data.name, "_comentario"),
          validationType: "string",
          validations: yup__WEBPACK_IMPORTED_MODULE_1__.string().when("".concat(data.name, "_evaluacion"), {
            is: "rechazado",
            then: yup__WEBPACK_IMPORTED_MODULE_1__.string().min(5, 'Debes ingresar al menos 5 caracteres').max(50, 'Puedes ingresar hasta 50 caracteres').required('Debes agregar una observación').nullable()
          }).nullable()
        }
      };
    }
  }]);

  return Observaciones;
}();



/***/ }),

/***/ "./helpers/formularios/Catamarca/reinscripciones.js":
/*!**********************************************************!*\
  !*** ./helpers/formularios/Catamarca/reinscripciones.js ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "getFormSchema": () => (/* binding */ getFormSchema)
/* harmony export */ });
/* harmony import */ var yup__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! yup */ "./node_modules/yup/es/index.js");
/* harmony import */ var _observaciones__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./observaciones */ "./helpers/formularios/Catamarca/observaciones.js");
/* harmony import */ var _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../enums/inputsTypes */ "./helpers/enums/inputsTypes.js");
/* harmony import */ var _enums_fileAccept__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../enums/fileAccept */ "./helpers/enums/fileAccept.js");
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
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__["default"].TEXT,
        name: 'nombre',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes completar este campo'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__["default"]({
          schema: schema,
          name: 'nombre',
          evaluate: evaluate
        }).observations
      }, {
        label: 'DNI',
        value: schema.dni,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__["default"].NUMBER,
        name: 'dni',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes completar este campo'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__["default"]({
          schema: schema,
          name: 'dni',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Cargo en la empresa',
        value: schema.cargo,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__["default"].TEXT,
        name: 'cargo',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes completar este campo'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__["default"]({
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
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__["default"].NUMBER,
        name: 'porcentaje_venta_provincia',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes completar este campo'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__["default"]({
          schema: schema,
          name: 'porcentaje_venta_provincia',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Porcentaje vendido a otras Provincias',
        value: schema.porcentaje_venta_otras_provincias,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__["default"].NUMBER,
        name: 'porcentaje_venta_otras_provincias',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes completar este campo'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__["default"]({
          schema: schema,
          name: 'porcentaje_venta_otras_provincias',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Porcentaje Exportado',
        value: schema.porcentaje_exportado,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__["default"].NUMBER,
        name: 'porcentaje_exportado',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes completar este campo'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__["default"]({
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
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__["default"].CHECKBOX,
        name: 'prospeccion',
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__["default"]({
          schema: schema,
          name: 'prospeccion',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Explotación',
        value: schema.explotacion ? true : false,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__["default"].CHECKBOX,
        name: 'explotacion',
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__["default"]({
          schema: schema,
          name: 'explotación',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Desarrollo',
        value: schema.desarrollo ? true : false,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__["default"].CHECKBOX,
        name: 'desarrollo',
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__["default"]({
          schema: schema,
          name: 'desarrollo',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Exploración',
        value: schema.explotacion ? true : false,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__["default"].CHECKBOX,
        name: 'exploracion',
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__["default"]({
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
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__["default"].NUMBER,
        name: 'personal_perm_profesional',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes ingresar una cantidad.'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__["default"]({
          schema: schema,
          name: 'personal_perm_profesional',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Operarios y Obreros Permanente',
        value: schema.personal_perm_operarios,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__["default"].NUMBER,
        name: 'personal_perm_operarios',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes ingresar una cantidad.'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__["default"]({
          schema: schema,
          name: 'personal_perm_operarios',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Administrativo Permanente',
        value: schema.personal_perm_administrativos,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__["default"].NUMBER,
        name: 'personal_perm_administrativos',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes ingresar una cantidad.'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__["default"]({
          schema: schema,
          name: 'personal_perm_administrativos',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Otros Permanente',
        value: schema.personal_perm_otros,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__["default"].NUMBER,
        name: 'personal_perm_otros',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes ingresar una cantidad.'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__["default"]({
          schema: schema,
          name: 'personal_perm_otros',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Profesional Transitorio',
        value: schema.personal_trans_profesional,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__["default"].NUMBER,
        name: 'personal_trans_profesional',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes ingresar una cantidad.'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__["default"]({
          schema: schema,
          name: 'personal_trans_profesional',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Operarios y Obreros Transitorio',
        value: schema.personal_trans_operarios,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__["default"].NUMBER,
        name: 'personal_trans_operarios',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes ingresar una cantidad.'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__["default"]({
          schema: schema,
          name: 'personal_trans_operarios',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Administrativo Transitorio',
        value: schema.personal_trans_administrativos,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__["default"].NUMBER,
        name: 'personal_trans_administrativos',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes ingresar una cantidad.'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__["default"]({
          schema: schema,
          name: 'personal_trans_administrativos',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Otros Transitorio',
        value: schema.personal_trans_otros,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__["default"].NUMBER,
        name: 'personal_trans_otros',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes ingresar una cantidad.'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__["default"]({
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
        label: 'List',
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__["default"].LIST,
        name: 'List',
        columns: 'grid-cols-1',
        // colSpans + 1
        columnsResponsive: 'lg:grid-cols-3',
        childrens: [// default value,
        [{
          name: 'sustanceSelect',
          value: null
        }, {
          name: 'mineralSelect',
          value: null
        }, {
          name: 'dni',
          value: null
        }, {
          name: 'produccion',
          value: null
        }, {
          name: 'unidades',
          value: null
        }, {
          name: 'precio_venta',
          value: null
        }, {
          name: 'empresa_compradora',
          value: null
        }, {
          name: 'direccion_empresa_compradora',
          value: null
        }, {
          name: 'actividad_empresa_compradora',
          value: null
        }]],
        elements: [[{
          label: 'Sustancia',
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__["default"].SELECT,
          colSpan: '',
          options: [{
            label: 'Sustancias de aprovechamiento común',
            value: 'aprovechamiento_comun'
          }, {
            label: 'Sustancias que se conceden preferentemente al dueño del suelo',
            value: 'conceden_preferentemente'
          }],
          name: 'sustanceSelect',
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          inputDepends: ['mineralSelect'],
          optionsDepends: {
            aprovechamiento_comun: [{
              label: 'Arenas Metalíferas',
              value: 'Arenas Metalíferas'
            }, {
              label: 'Piedras Preciosas',
              value: 'Piedras Preciosas'
            }, {
              label: 'Desmontes',
              value: 'Desmontes'
            }, {
              label: 'Relaves',
              value: 'Relaves'
            }, {
              label: 'Escoriales',
              value: 'Escoriales'
            }],
            conceden_preferentemente: [{
              label: 'Salitres',
              value: 'Salitres'
            }, {
              label: 'Salinas',
              value: 'Salinas'
            }, {
              label: 'Turberas',
              value: 'Turberas'
            }, {
              label: 'Metales no comprendidos en 1° Categ.',
              value: 'Metales no comprendidos en 1° Categ.'
            }, {
              label: 'Abrasivos',
              value: 'Abrasivos'
            }, {
              label: 'Ocres',
              value: 'Ocres'
            }, {
              label: 'Resinas',
              value: 'Resinas'
            }, {
              label: 'Esteatitas',
              value: 'Esteatitas'
            }, {
              label: 'Baritina',
              value: 'Baritina'
            }, {
              label: 'Caparrosas',
              value: 'Caparrosas'
            }, {
              label: 'Grafito',
              value: 'Grafito'
            }, {
              label: 'Caolí­n',
              value: 'Caolí­n'
            }, {
              label: 'Sales Alcalinas o Alcalino Terrosas',
              value: 'Sales Alcalinas o Alcalino Terrosas'
            }, {
              label: 'Amianto',
              value: 'Amianto'
            }, {
              label: 'Bentonita',
              value: 'Bentonita'
            }, {
              label: 'Zeolitas o Minerales Permutantes o Permutíticos',
              value: 'Zeolitas o Minerales Permutantes o Permutíticos'
            }]
          },
          // validations: yup.object().when('sustanceSelect', {
          //     is: value => _.isEmpty(value),
          //     then: yup.object().required('Debes elegir un elemento')
          // }),
          placeholder: 'Selecciona una opción'
        }, {
          label: 'Mineral Explotado',
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__["default"].SELECT,
          colSpan: '',
          options: [],
          name: 'mineralSelect',
          inputDepends: [],
          multiple: false,
          closeOnSelect: true,
          searchable: true,
          // validations: yup.object().when('mineralSelect', {
          //     is: value => _.isEmpty(value),
          //     then: yup.object().required('Debes elegir un elemento')
          // }),
          placeholder: 'Selecciona una opción'
        }, {
          label: 'Producción',
          value: schema.produccion,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__["default"].NUMBER,
          name: 'produccion',
          colSpan: ''
        }, {
          label: 'Unidades',
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__["default"].SELECT,
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
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__["default"].NUMBER,
          name: 'precio_venta',
          colSpan: ''
        }, {
          label: 'Empresa compradora',
          value: '',
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__["default"].TEXT,
          name: 'empresa_compradora',
          colSpan: ''
        }, {
          label: 'Dirección empresa campradora',
          value: '',
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__["default"].TEXT,
          name: 'direccion_empresa_compradora',
          colSpan: ''
        }, {
          label: 'Actividad empresa campradora',
          value: '',
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__["default"].TEXT,
          name: 'actividad_empresa_compradora',
          colSpan: ''
        }, {
          colSpan: 'lg:w-5/5',
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__["default"]({
            schema: schema,
            name: 'row-',
            evaluate: evaluate
          }).observations
        }]],
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.array().of(yup__WEBPACK_IMPORTED_MODULE_0__.object().shape({
          sustanceSelect: yup__WEBPACK_IMPORTED_MODULE_0__.object().when('sustance', {
            is: function is(value) {
              return _.isEmpty(value);
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required('Debes elegir un elemento').nullable()
          }),
          mineralSelect: yup__WEBPACK_IMPORTED_MODULE_0__.object().when('mineral', {
            is: function is(value) {
              return _.isEmpty(value);
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required('Debes elegir un elemento').nullable()
          }),
          produccion: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes completar este campo'),
          unidades: yup__WEBPACK_IMPORTED_MODULE_0__.object().when('mineral', {
            is: function is(value) {
              return _.isEmpty(value);
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required('Debes elegir un elemento').nullable()
          }),
          precio_venta: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes completar este campo'),
          empresa_compradora: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes completar este campo'),
          direccion_empresa_compradora: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes completar este campo'),
          actividad_empresa_compradora: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes completar este campo')
        })).strict()
      }]
    }]
  }];
}

/***/ })

}]);