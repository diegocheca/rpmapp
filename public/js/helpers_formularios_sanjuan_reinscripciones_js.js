"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["helpers_formularios_sanjuan_reinscripciones_js"],{

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

/***/ "./helpers/formularios/sanjuan/observaciones.js":
/*!******************************************************!*\
  !*** ./helpers/formularios/sanjuan/observaciones.js ***!
  \******************************************************/
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
      if (!data.evaluate) return {};
      return {
        options: [{
          label: 'Si',
          value: 'aprobado',
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_0__.default.RADIO,
          name: "observacion_".concat(data.name),
          validations: yup__WEBPACK_IMPORTED_MODULE_1__.string().oneOf(["aprobado", "rechazado", "sin evaluar"]).required('Debes seleccionar una opci??n')
        }, {
          label: 'No',
          value: 'rechazado',
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_0__.default.RADIO,
          name: "observacion_".concat(data.name)
        }, {
          label: 'Sin evaluar',
          value: 'sin evaluar',
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_0__.default.RADIO,
          name: "observacion_".concat(data.name)
        }],
        comment: {
          label: 'OBSERVACI??N',
          value: '',
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_0__.default.TEXTAREA,
          name: "observacion_comentario_".concat(data.name),
          validationType: "string",
          validations: yup__WEBPACK_IMPORTED_MODULE_1__.string().when("observacion_".concat(data.name), {
            is: "rechazado",
            then: yup__WEBPACK_IMPORTED_MODULE_1__.string().min(5, 'Debes ingresar al menos 5 caracteres').max(50, 'Puedes ingresar hasta 50 caracteres').required('Debes agregar una observaci??n')
          })
        }
      };
    }
  }]);

  return Observaciones;
}();



/***/ }),

/***/ "./helpers/formularios/sanjuan/reinscripciones.js":
/*!********************************************************!*\
  !*** ./helpers/formularios/sanjuan/reinscripciones.js ***!
  \********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "getFormSchema": () => (/* binding */ getFormSchema)
/* harmony export */ });
/* harmony import */ var yup__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! yup */ "./node_modules/yup/es/index.js");
/* harmony import */ var _observaciones__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./observaciones */ "./helpers/formularios/sanjuan/observaciones.js");
/* harmony import */ var _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../enums/inputsTypes */ "./helpers/enums/inputsTypes.js");
/* harmony import */ var _enums_fileAccept__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../enums/fileAccept */ "./helpers/enums/fileAccept.js");
function _extends() { _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; }; return _extends.apply(this, arguments); }





function getFormSchema(_ref, evaluate) {
  var schema = _extends({}, _ref);

  // name => unique
  return [// row 1
  {
    widthResponsive: 'flex-row',
    //flex
    // columns
    body: [//  col 1
    {
      title: 'Datos Personales',
      width: '',
      //flex
      columns: 'grid-cols-1',
      //grid
      columnsResponsive: '',
      //inside card
      img: '/images/laborales.png',
      inputs: [// {
      //     label: 'DNI',
      //     value: schema.dni,
      //     type: inputsTypes.NUMBER,
      //     name: 'dni',
      //     validations: yup.string().required('Debes ingresar un dni.'),
      //     observation: new Observations({schema, name: 'dni', evaluate}).observations
      // },
      {
        label: 'List',
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.LIST,
        name: 'List',
        // columns: 'grid-cols-1',
        // colSpans + 1
        // columnsResponsive: 'lg:w-2/5',
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
        }]],
        elements: [[{
          label: 'Sustancia',
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          colSpan: 'lg:w-2/5',
          options: [{
            label: 'Sustancias de aprovechamiento com??n',
            value: 'aprovechamiento_comun'
          }, {
            label: 'Sustancias que se conceden preferentemente al due??o del suelo',
            value: 'conceden_preferentemente'
          }],
          name: 'sustanceSelect',
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          inputDepends: ['mineralSelect'],
          optionsDepends: {
            aprovechamiento_comun: [{
              label: 'Arenas Metal??feras',
              value: 'Arenas Metal??feras'
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
              label: 'Metales no comprendidos en 1?? Categ.',
              value: 'Metales no comprendidos en 1?? Categ.'
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
              label: 'Caol????n',
              value: 'Caol????n'
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
              label: 'Zeolitas o Minerales Permutantes o Permut??ticos',
              value: 'Zeolitas o Minerales Permutantes o Permut??ticos'
            }]
          },
          // validations: yup.object().when('sustanceSelect', {
          //     is: value => _.isEmpty(value),
          //     then: yup.object().required('Debes elegir un elemento')
          // }),
          placeholder: 'Selecciona una opci??n'
        }, {
          label: 'Mineral Explotado',
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          colSpan: 'lg:w-2/5',
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
          placeholder: 'Selecciona una opci??n'
        }, {
          label: 'DNI',
          value: schema.dni,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.NUMBER,
          colSpan: 'lg:w-1/5',
          name: 'dni2' // validations: yup.string().required('Debes ingresar un dni'),

        }, {
          label: 'File',
          value: schema.file,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.FILE,
          name: 'file2',
          accept: [_enums_fileAccept__WEBPACK_IMPORTED_MODULE_3__.default.PDF.value, _enums_fileAccept__WEBPACK_IMPORTED_MODULE_3__.default.DOC.value, _enums_fileAccept__WEBPACK_IMPORTED_MODULE_3__.default.IMAGE.value],
          acceptLabel: "Archivos admitidos: ".concat([_enums_fileAccept__WEBPACK_IMPORTED_MODULE_3__.default.PDF.label, _enums_fileAccept__WEBPACK_IMPORTED_MODULE_3__.default.DOC.label, _enums_fileAccept__WEBPACK_IMPORTED_MODULE_3__.default.IMAGE.label].join())
        }, {
          colSpan: 'lg:w-5/5',
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
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
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required('Debes elegir un elemento')
          }),
          mineralSelect: yup__WEBPACK_IMPORTED_MODULE_0__.object().when('mineral', {
            is: function is(value) {
              return _.isEmpty(value);
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required('Debes elegir un elemento')
          }),
          dni2: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes ingresar un dni'),
          file2: yup__WEBPACK_IMPORTED_MODULE_0__.array().min(1, 'Debes subir al menos un elemento')
        })).strict()
      }]
    }]
  }, // row 2
  {
    widthResponsive: 'lg:flex-row',
    //flex
    // columns
    body: [//  col 1
    {
      title: 'Datos Personales',
      width: 'lg:w-2/6',
      //flex
      columns: 'grid-cols-1',
      //grid
      columnsResponsive: '',
      //inside card
      img: '/images/laborales.png',
      inputs: [{
        label: 'File',
        value: schema.file,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.FILE,
        name: 'file',
        accept: [_enums_fileAccept__WEBPACK_IMPORTED_MODULE_3__.default.PDF.value, _enums_fileAccept__WEBPACK_IMPORTED_MODULE_3__.default.DOC.value, _enums_fileAccept__WEBPACK_IMPORTED_MODULE_3__.default.IMAGE.value],
        acceptLabel: "Archivos admitidos: ".concat([_enums_fileAccept__WEBPACK_IMPORTED_MODULE_3__.default.PDF.label, _enums_fileAccept__WEBPACK_IMPORTED_MODULE_3__.default.DOC.label, _enums_fileAccept__WEBPACK_IMPORTED_MODULE_3__.default.IMAGE.label].join()),
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.array().min(1, 'Debes subir al menos un elemento')["default"]([]),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'file',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Select',
        value: [],
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
        options: [{
          label: 'Vue.js',
          value: 'JavaScript'
        }, {
          label: 'Rails',
          value: 'Ruby'
        }, {
          label: 'Sinatra',
          value: 'Sinatra'
        }, // { label: 'Laravel', value: 'PHP', $isDisabled: true }, // disabled option
        {
          label: 'Phoenix',
          value: 'Elixir'
        }],
        name: 'select',
        multiple: true,
        closeOnSelect: true,
        searchable: true,
        placeholder: 'Selecciona una opci??n',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.array().min(1, 'Debes seleccionar al menos un elemento')["default"]([]),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'select',
          evaluate: evaluate
        }).observations
      }, {
        label: 'DNI',
        value: schema.dni,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.NUMBER,
        name: 'dni',
        validationType: "number",
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes ingresar un dni'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'dni',
          evaluate: evaluate
        }).observations
      }, {
        label: 'NOMBRE',
        value: schema.nombre,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
        name: 'nombre',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes ingresar un nombre'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'nombre',
          evaluate: evaluate
        }).observations
      }, {
        label: 'CARGO',
        value: schema.cargo,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
        name: 'cargo',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes ingresar un cargo'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'cargo',
          evaluate: evaluate
        }).observations
      }, {
        label: 'ESTADO',
        value: schema.estado,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
        name: 'estado',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes ingresar un estado'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'estado',
          evaluate: evaluate
        }).observations
      }]
    }, //  col 2
    {
      title: 'Labores desarrolladas',
      width: 'lg:w-2/6',
      columns: 'grid-cols-1',
      columnsResponsive: '',
      inputs: [{
        label: 'Prospecci??n',
        value: schema.prospeccion ? true : false,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.CHECKBOX,
        name: 'prospeccion',
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'prospeccion',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Explotaci??n',
        value: schema.explotacion ? true : false,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.CHECKBOX,
        name: 'explotacion',
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'explotaci??n',
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
        label: 'Exploraci??n',
        value: schema.explotacion ? true : false,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.CHECKBOX,
        name: 'exploracion',
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'exploracion',
          evaluate: evaluate
        }).observations
      }]
    }, //  col 3
    {
      title: 'Porcentajes de venta',
      width: 'lg:w-2/6',
      columns: 'grid-cols-1',
      columnsResponsive: '',
      inputs: [{
        label: 'Porcentaje a la provincia',
        value: schema.porcentaje_venta_provincia,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.NUMBER,
        name: 'porcentaje_venta_provincia',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes ingresar un porcentaje'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'porcentaje_venta_provincia',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Porcentaje a otras provincias',
        value: schema.porcentaje_venta_otras_provincias,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.NUMBER,
        name: 'porcentaje_venta_otras_provincias',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes ingresar un porcentaje'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'porcentaje_venta_otras_provincias',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Porcentaje exportado',
        value: schema.porcentaje_exportado,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.NUMBER,
        name: 'porcentaje_exportado',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes ingresar un porcentaje'),
        observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'porcentaje_exportado',
          evaluate: evaluate
        }).observations
      }]
    }]
  }, // row 3
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
        label: 'Profesional T??cnico Permanente',
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
  }];
}

/***/ })

}]);