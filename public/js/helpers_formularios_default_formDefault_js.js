"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["helpers_formularios_default_formDefault_js"],{

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

/***/ "./helpers/formularios/default/formDefault.js":
/*!****************************************************!*\
  !*** ./helpers/formularios/default/formDefault.js ***!
  \****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "getFormSchema": () => (/* binding */ getFormSchema)
/* harmony export */ });
/* harmony import */ var yup__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! yup */ "./node_modules/yup/es/index.js");
/* harmony import */ var _observacionesDefault__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./observacionesDefault */ "./helpers/formularios/default/observacionesDefault.js");
/* harmony import */ var _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../enums/inputsTypes */ "./helpers/enums/inputsTypes.js");
/* harmony import */ var _enums_fileAccept__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../enums/fileAccept */ "./helpers/enums/fileAccept.js");
function _extends() { _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; }; return _extends.apply(this, arguments); }

//*******************************************************************************/
//*******************************************************************************/
//
//  NO EDIT!!!!!! NO DELETE!!!!!!!
//
//*******************************************************************************/
//*******************************************************************************/




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
      title: 'Sustancias minerales que insuatralizan',
      width: '',
      //flex
      // columns: '', //grid
      // columnsResponsive: '', //inside card
      img: '/images/laborales.png',
      inputs: [{
        label: 'List',
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.LIST,
        name: 'List',
        columns: 'grid-cols-1',
        // colSpans + 1
        columnsResponsive: 'lg:grid-cols-3',
        childrens: getChildrens(schema.productos),
        elements: [[{
          label: 'Sustancia',
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          colSpan: '',
          options: [{
            label: 'Sustancias de aprovechamiento común',
            value: 'aprovechamiento_comun'
          }, {
            label: 'Sustancias que se conceden preferentemente al dueño del suelo',
            value: 'conceden_preferentemente'
          }],
          name: 'variedad',
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          inputDepends: ['nombre_mineral'],
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
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          colSpan: '',
          options: [],
          name: 'nombre_mineral',
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
        } // {
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
        // {
        //     colSpan: 'lg:w-5/5',
        //     observation: new Observations({schema, name: 'row-', evaluate}).observations
        // }
        ]],
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.array().of(yup__WEBPACK_IMPORTED_MODULE_0__.object().shape({
          variedad: yup__WEBPACK_IMPORTED_MODULE_0__.object().when('sustance', {
            is: function is(value) {
              return _.isEmpty(value);
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required('Debes elegir un elemento').nullable()
          }),
          nombre_mineral: yup__WEBPACK_IMPORTED_MODULE_0__.object().when('mineral', {
            is: function is(value) {
              return _.isEmpty(value);
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required('Debes elegir un elemento').nullable()
          }),
          produccion: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes completar este campo').nullable(),
          unidades: yup__WEBPACK_IMPORTED_MODULE_0__.object().when('unidadesSelect', {
            is: function is(value) {
              return _.isEmpty(value);
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required('Debes elegir un elemento').nullable()
          }),
          precio_venta: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes completar este campo').nullable() // empresa_compradora: yup.string().required('Debes completar este campo').nullable(),
          // direccion_empresa_compradora: yup.string().required('Debes completar este campo').nullable(),
          // actividad_empresa_compradora: yup.string().required('Debes completar este campo').nullable(),

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
        observation: new _observacionesDefault__WEBPACK_IMPORTED_MODULE_1__.default({
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
        placeholder: 'Selecciona una opción',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.array().min(1, 'Debes seleccionar al menos un elemento')["default"]([]),
        observation: new _observacionesDefault__WEBPACK_IMPORTED_MODULE_1__.default({
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
        observation: new _observacionesDefault__WEBPACK_IMPORTED_MODULE_1__.default({
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
        observation: new _observacionesDefault__WEBPACK_IMPORTED_MODULE_1__.default({
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
        observation: new _observacionesDefault__WEBPACK_IMPORTED_MODULE_1__.default({
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
        observation: new _observacionesDefault__WEBPACK_IMPORTED_MODULE_1__.default({
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
        label: 'Prospección',
        value: schema.prospeccion ? true : false,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.CHECKBOX,
        name: 'prospeccion',
        observation: new _observacionesDefault__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'prospeccion',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Explotación',
        value: schema.explotacion ? true : false,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.CHECKBOX,
        name: 'explotacion',
        observation: new _observacionesDefault__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'explotación',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Desarrollo',
        value: schema.desarrollo ? true : false,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.CHECKBOX,
        name: 'desarrollo',
        observation: new _observacionesDefault__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'desarrollo',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Exploración',
        value: schema.explotacion ? true : false,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.CHECKBOX,
        name: 'exploracion',
        observation: new _observacionesDefault__WEBPACK_IMPORTED_MODULE_1__.default({
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
        observation: new _observacionesDefault__WEBPACK_IMPORTED_MODULE_1__.default({
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
        observation: new _observacionesDefault__WEBPACK_IMPORTED_MODULE_1__.default({
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
        observation: new _observacionesDefault__WEBPACK_IMPORTED_MODULE_1__.default({
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
        label: 'Profesional Técnico Permanente',
        value: schema.personal_perm_profesional,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.NUMBER,
        name: 'personal_perm_profesional',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes ingresar una cantidad.'),
        observation: new _observacionesDefault__WEBPACK_IMPORTED_MODULE_1__.default({
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
        observation: new _observacionesDefault__WEBPACK_IMPORTED_MODULE_1__.default({
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
        observation: new _observacionesDefault__WEBPACK_IMPORTED_MODULE_1__.default({
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
        observation: new _observacionesDefault__WEBPACK_IMPORTED_MODULE_1__.default({
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
        observation: new _observacionesDefault__WEBPACK_IMPORTED_MODULE_1__.default({
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
        observation: new _observacionesDefault__WEBPACK_IMPORTED_MODULE_1__.default({
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
        observation: new _observacionesDefault__WEBPACK_IMPORTED_MODULE_1__.default({
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
        observation: new _observacionesDefault__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'personal_trans_otros',
          evaluate: evaluate
        }).observations
      }, {
        inputColsSpan: 'col-span-2',
        label: 'Certificado de inscripción en AFIP (CUIT)',
        helpInfo: 'asdadasd',
        value: schema.cuit,
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.FILE,
        name: 'cuit',
        accept: [_enums_fileAccept__WEBPACK_IMPORTED_MODULE_3__.default.PDF.value],
        acceptLabel: "Archivos admitidos: ".concat([_enums_fileAccept__WEBPACK_IMPORTED_MODULE_3__.default.PDF.label].join()),
        maxSize: '10MB',
        multiple: false,
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.array().min(1, 'Debes adjuntar al menos un elemento')["default"]([]).test({
          name: 'FILE_SIZE',
          exclusive: true,
          message: 'Recuerda que cada archivo no debe superar los 10MB',
          test: function test(value) {
            if (!value) return true;
            var validation = true;

            for (var index = 0; index < value.length; index++) {
              var element = value[index];
              validation = validation && element.size <= 1000000; // 10MB
            }

            return validation; // !value || (value && value.size <= 10)
          }
        }).test({
          name: 'FILE_FORMAT',
          exclusive: true,
          message: 'Hay archivos con extensiones no válidas',
          test: function test(value) {
            if (!value) return true;
            var validation = true;

            for (var index = 0; index < value.length; index++) {
              var element = value[index];
              validation = validation && [_enums_fileAccept__WEBPACK_IMPORTED_MODULE_3__.default.PDF.value].includes(element.type);
            }

            return validation; // return !value || (value && [fileAccept.PDF.value].includes(value.type))
          }
        }),
        observation: new _observacionesDefault__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'cuit',
          evaluate: evaluate
        }).observations
      }]
    }]
  }, // row 3 UBICACION
  {
    widthResponsive: 'lg:flex-row',
    //flex
    // columns
    body: [//  col 1
    {
      title: 'Ubicación',
      width: 'lg:w-full',
      //flex
      columns: 'grid-cols-1',
      //grid
      columnsResponsive: 'lg:grid-cols-2',
      //inside card
      img: '/images/laborales.png',
      inputs: [{
        label: 'Provincia',
        value: {},
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
        // get axios
        async: true,
        asyncUrl: '/paises/departamentos',
        inputDepends: ['departamento'],
        inputClearDepends: ['departamento', 'localidad'],
        // isLoading: false,
        //
        options: dataForm.provincia,
        name: 'provincia',
        multiple: false,
        closeOnSelect: true,
        searchable: true,
        placeholder: 'Selecciona una opción',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when('provinciaSelect', {
          is: function is(value) {
            return _.isEmpty(value) || !value;
          },
          then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required('Debes elegir un elemento').nullable()
        }),
        observation: new _observacionesDefault__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'select',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Departamento',
        value: {},
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
        // get axios
        async: true,
        asyncUrl: '/paises/localidades',
        inputDepends: ['localidad'],
        inputClearDepends: ['localidad'],
        isLoading: false,
        //
        options: [],
        name: 'departamento',
        multiple: false,
        closeOnSelect: true,
        searchable: true,
        placeholder: 'Selecciona una opción',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when('departamentoSelect', {
          is: function is(value) {
            return _.isEmpty(value) || !value;
          },
          then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required('Debes elegir un elemento').nullable()
        }),
        observation: new _observacionesDefault__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'select',
          evaluate: evaluate
        }).observations
      }, {
        label: 'Localidad',
        value: {},
        type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
        // get axios
        async: true,
        isLoading: false,
        //
        options: [],
        name: 'localidad',
        multiple: false,
        closeOnSelect: true,
        searchable: true,
        placeholder: 'Selecciona una opción',
        validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when('localidadSelect', {
          is: function is(value) {
            return _.isEmpty(value) || !value;
          },
          then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required('Debes elegir un elemento').nullable()
        }),
        observation: new _observacionesDefault__WEBPACK_IMPORTED_MODULE_1__.default({
          schema: schema,
          name: 'select',
          evaluate: evaluate
        }).observations
      }]
    }]
  }];
}

function getChildrens(data) {
  var child = [// default value,
  {
    name: 'variedad',
    value: null
  }, {
    name: 'nombre_mineral',
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
      clone[i].value = object[property];
    };

    for (var property in object) {
      var _ret = _loop(property);

      if (_ret === "continue") continue;
    }

    newChildrens.push(clone);
  }

  return newChildrens;
}

/***/ }),

/***/ "./helpers/formularios/default/observacionesDefault.js":
/*!*************************************************************!*\
  !*** ./helpers/formularios/default/observacionesDefault.js ***!
  \*************************************************************/
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

//*******************************************************************************/
//*******************************************************************************/
//
//  NO EDIT!!!!!! NO DELETE!!!!!!!
//
//*******************************************************************************/
//*******************************************************************************/



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
          validations: yup__WEBPACK_IMPORTED_MODULE_1__.string().oneOf(["aprobado", "rechazado", "sin evaluar"]).required('Debes seleccionar una opción')
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
          label: 'OBSERVACIÓN',
          value: '',
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_0__.default.TEXTAREA,
          name: "observacion_comentario_".concat(data.name),
          validationType: "string",
          validations: yup__WEBPACK_IMPORTED_MODULE_1__.string().when("observacion_".concat(data.name), {
            is: "rechazado",
            then: yup__WEBPACK_IMPORTED_MODULE_1__.string().min(5, 'Debes ingresar al menos 5 caracteres').max(50, 'Puedes ingresar hasta 50 caracteres').required('Debes agregar una observación')
          })
        }
      };
    }
  }]);

  return Observaciones;
}();



/***/ })

}]);