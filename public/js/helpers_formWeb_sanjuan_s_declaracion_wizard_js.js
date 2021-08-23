(self["webpackChunk"] = self["webpackChunk"] || []).push([["helpers_formWeb_sanjuan_s_declaracion_wizard_js"],{

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

/***/ "./helpers/formWeb/sanjuan/observaciones.js":
/*!**************************************************!*\
  !*** ./helpers/formWeb/sanjuan/observaciones.js ***!
  \**************************************************/
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

// import inputsTypes from "../../enums/inputsTypes";



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



/***/ }),

/***/ "./helpers/formWeb/sanjuan/s_declaracion_wizard.js":
/*!*********************************************************!*\
  !*** ./helpers/formWeb/sanjuan/s_declaracion_wizard.js ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "getFormSchema": () => (/* binding */ getFormSchema)
/* harmony export */ });
/* harmony import */ var yup__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! yup */ "./node_modules/yup/es/index.js");
/* harmony import */ var _observaciones__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./observaciones */ "./helpers/formWeb/sanjuan/observaciones.js");
/* harmony import */ var _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../enums/inputsTypes */ "./helpers/enums/inputsTypes.js");
/* harmony import */ var _enums_fileAccept__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../enums/fileAccept */ "./helpers/enums/fileAccept.js");
function _extends() { _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; }; return _extends.apply(this, arguments); }

 // import Observations from './observaciones';
// import inputsTypes from '../../enums/inputsTypes';
// import fileAccept from '../../enums/fileAccept';




function getFormSchema(_ref, evaluate, dataForm) {
  var schema = _extends({}, _ref);

  // name => unique
  // icons => https://heroicons.com/ => svg d=""
  return [//Datos Solicitante
  {
    icon: "M19 10h2a1 1 0 0 1 0 2h-2v2a1 1 0 0 1-2 0v-2h-2a1 1 0 0 1 0-2h2V8a1 1 0 0 1 2 0v2zM9 12A5 5 0 1 1 9 2a5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm8 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H7a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h5a5 5 0 0 1 5 5v2z",
    bgColorIcon: "bg-blue-500",
    bgColorProgress: "bg-blue-300",
    titleStep: "SOLICITANTE",
    bodyStep: [// row 1
    {
      widthResponsive: "lg:flex-row",
      //flex
      // columns
      body: [//  col 1
      {
        title: "Datos de Solicitante",
        width: "lg:w-full",
        //flex
        columns: "grid-cols-1",
        //grid
        columnsResponsive: "lg:grid-cols-3",
        //inside card
        img: "/images/laborales.png",
        inputs: [// {
        //     label: "Email",
        //     value: schema.email,
        //     type: inputsTypes.EMAIL,
        //     name: "email",
        //     validations: yup
        //         .string()
        //         .required("Debes completar este campo")
        //         .email(
        //             "El formato ingresado no es válido"
        //         ),
        //     observation: new Observations({
        //         schema,
        //         name: "email",
        //         evaluate,
        //     }).observations,
        // },
        // {
        //     label: "Contraseña",
        //     value: schema.password,
        //     type: inputsTypes.PASSWORD,
        //     name: "password",
        //     validations: yup
        //         .string()
        //         .required("Debes completar este campo")
        //         .min(
        //             8,
        //             "Debes ingresar al menos 8 caracteres"
        //         ),
        //     observation: new Observations({
        //         schema,
        //         name: "password",
        //         evaluate,
        //     }).observations,
        // },
        // {
        //     label: "Confirmar contraseña",
        //     value: schema.repeatPassword,
        //     type: inputsTypes.PASSWORD,
        //     name: "repeatPassword",
        //     validations: yup
        //         .string()
        //         .required("Debes completar este campo")
        //         .oneOf(
        //             [yup.ref("password")],
        //             "Las contraseñas deben ser iguales"
        //         ),
        //     observation: new Observations({
        //         schema,
        //         name: "repeatPassword",
        //         evaluate,
        //     }).observations,
        // },
        {
          label: "DNI",
          value: schema.dni,
          //nombre_razon_social,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.NUMBER,
          name: "dni",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "dni",
            evaluate: evaluate
          }).observations
        }, {
          label: "Apellidos",
          value: schema.apellidos,
          //nombre_razon_social,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: "apellidos",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "apellidos",
            evaluate: evaluate
          }).observations
        }, {
          label: "Nombres",
          value: schema.apellidos,
          //nombre_razon_social,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: "nombres",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "nombres",
            evaluate: evaluate
          }).observations
        } // {
        //     label: "Nombre de la mina, cantera, explotación y/o establecimiento",
        //     value: schema.nombre_mina,
        //     type: inputsTypes.TEXT,
        //     name: "nombre_mina",
        //     validations: yup
        //         .string()
        //         .required("Debes completar este campo"),
        //     observation: new Observations({
        //         schema,
        //         name: "nombre_mina",
        //         evaluate,
        //     }).observations,
        // },
        // // {
        // // },
        // {
        //     // inputColsSpan: 'lg:col-span-2',
        //     label: "Certificado de inscripción en AFIP (CUIT)",
        //     value: schema.cuit,
        //     type: inputsTypes.FILE,
        //     name: "cuit",
        //     accept: [fileAccept.PDF.value],
        //     acceptLabel: `Archivos admitidos: ${[
        //         fileAccept.PDF.label,
        //     ].join()}`,
        //     maxSize: "Tamaño maximo por archivo: 10MB",
        //     multiple: false,
        //     validations: yup
        //         .array()
        //         .min(
        //             1,
        //             "Debes adjuntar al menos un elemento"
        //         )
        //         .default([])
        //         .max(
        //             1,
        //             "Solo puedes adjuntar hasta 1 archivo"
        //         )
        //         .test({
        //             name: "CUIT_SIZE",
        //             exclusive: true,
        //             message:
        //                 "Recuerda que cada archivo no debe superar los 10MB",
        //             test: (value) => {
        //                 if (!value) return true;
        //                 let validation = true;
        //                 for (
        //                     let index = 0;
        //                     index < value.length;
        //                     index++
        //                 ) {
        //                     const element =
        //                         value[index];
        //                     validation =
        //                         validation &&
        //                         element.size <=
        //                             10000000; // 10MB
        //                 }
        //                 return validation;
        //                 // !value || (value && value.size <= 10)
        //             },
        //         })
        //         .test({
        //             name: "CUIT_FILE_FORMAT",
        //             exclusive: true,
        //             message:
        //                 "Hay archivos con extensiones no válidas",
        //             test: (value) => {
        //                 if (!value) return true;
        //                 let validation = true;
        //                 for (
        //                     let index = 0;
        //                     index < value.length;
        //                     index++
        //                 ) {
        //                     const element =
        //                         value[index];
        //                     validation =
        //                         validation &&
        //                         [
        //                             ...fileAccept.PDF
        //                                 .value,
        //                         ].includes(
        //                             element.type
        //                         );
        //                 }
        //                 return validation;
        //                 // return !value || (value && [fileAccept.PDF.value].includes(value.type))
        //             },
        //         }),
        //     observation: new Observations({
        //         schema,
        //         name: "cuit",
        //         evaluate,
        //     }).observations,
        // },
        // {
        //     // inputColsSpan: 'lg:col-span-2',
        //     label: "Copia escritura del inmueble",
        //     helpInfo:
        //         "Si la posesión es veinteñal se debe acompañar con el certificado correspondiente",
        //     value: schema.escritura,
        //     type: inputsTypes.FILE,
        //     name: "escritura",
        //     accept: [
        //         fileAccept.PDF.value,
        //         fileAccept.IMAGE.value,
        //     ],
        //     acceptLabel: `Archivos admitidos: ${[
        //         fileAccept.PDF.label,
        //         fileAccept.IMAGE.label,
        //     ].join()}`,
        //     maxSize: "Tamaño maximo por archivo: 10MB",
        //     multiple: true,
        //     validations: yup
        //         .array()
        //         .min(
        //             1,
        //             "Debes adjuntar al menos un elemento"
        //         )
        //         .default([])
        //         .max(
        //             1,
        //             "Solo puedes adjuntar hasta 1 archivo"
        //         )
        //         .test({
        //             name: "ESCRITURA_FILE_SIZE",
        //             exclusive: true,
        //             message:
        //                 "Recuerda que cada archivo no debe superar los 10MB",
        //             test: (value) => {
        //                 if (!value) return true;
        //                 let validation = true;
        //                 for (
        //                     let index = 0;
        //                     index < value.length;
        //                     index++
        //                 ) {
        //                     const element =
        //                         value[index];
        //                     validation =
        //                         validation &&
        //                         element.size <=
        //                             10000000; // 10MB
        //                 }
        //                 return validation;
        //                 // !value || (value && value.size <= 10)
        //             },
        //         })
        //         .test({
        //             name: "ESCRITURA_FILE_FORMAT",
        //             exclusive: true,
        //             message:
        //                 "Hay archivos con extensiones no válidas",
        //             test: (value) => {
        //                 if (!value) return true;
        //                 let validation = true;
        //                 for (
        //                     let index = 0;
        //                     index < value.length;
        //                     index++
        //                 ) {
        //                     const element =
        //                         value[index];
        //                     validation =
        //                         validation &&
        //                         [
        //                             ...fileAccept.PDF
        //                                 .value,
        //                             ...fileAccept.IMAGE
        //                                 .value,
        //                         ].includes(
        //                             element.type
        //                         );
        //                 }
        //                 return validation;
        //                 // return !value || (value && [fileAccept.PDF.value].includes(value.type))
        //             },
        //         }),
        //     observation: new Observations({
        //         schema,
        //         name: "escritura",
        //         evaluate,
        //     }).observations,
        // },
        ]
      }]
    }, //row 2 Domicilio
    {
      widthResponsive: "lg:flex-row",
      //flex
      // columns
      body: [//  col 1
      {
        title: "",
        width: "lg:w-full",
        //flex
        columns: "grid-cols-1",
        //grid
        columnsResponsive: "lg:grid-cols-1",
        //inside card
        img: "/images/laborales.png",
        inputs: [{
          label: "Domicilio",
          value: schema.domicilio,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: "domicilio",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "domicilio",
            evaluate: evaluate
          }).observations
        }]
      }]
    }, // row 3
    {
      widthResponsive: "lg:flex-row",
      //flex
      // columns
      body: [//  col 1
      {
        title: "",
        width: "lg:w-full",
        //flex
        columns: "grid-cols-1",
        //grid
        columnsResponsive: "lg:grid-cols-3",
        //inside card
        img: "/images/laborales.png",
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
          searchable: false,
          placeholder: 'Selecciona una opción',
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when('provinciaSelect', {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required('Debes elegir un elemento').nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: 'provincia',
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
          searchable: false,
          placeholder: 'Selecciona una opción',
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when('departamentoSelect', {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required('Debes elegir un elemento').nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: 'departamento',
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
          searchable: false,
          placeholder: 'Selecciona una opción',
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when('localidadSelect', {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required('Debes elegir un elemento').nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: 'localidad',
            evaluate: evaluate
          }).observations
        }]
      }]
    }]
  }, {
    icon: "M19 10h2a1 1 0 0 1 0 2h-2v2a1 1 0 0 1-2 0v-2h-2a1 1 0 0 1 0-2h2V8a1 1 0 0 1 2 0v2zM9 12A5 5 0 1 1 9 2a5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm8 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H7a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h5a5 5 0 0 1 5 5v2z",
    bgColorIcon: "bg-blue-500",
    bgColorProgress: "bg-blue-300",
    titleStep: "REPRESENTANTE LEGAL",
    bodyStep: [// row 1
    {
      widthResponsive: "lg:flex-row",
      //flex
      // columns
      body: [//  col 1
      {
        title: "Datos Persona",
        width: "lg:w-full",
        //flex
        columns: "grid-cols-1",
        //grid
        columnsResponsive: "lg:grid-cols-2",
        //inside card
        img: "/images/laborales.png",
        inputs: [{
          label: "Email",
          value: schema.email,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.EMAIL,
          name: "email",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo").email("El formato ingresado no es válido"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "email",
            evaluate: evaluate
          }).observations
        }, //apellido
        {
          label: 'Apellido',
          value: schema.apellido,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: 'apellido',
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes completar este campo'),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: 'apellido',
            evaluate: evaluate
          }).observations
        }, //sexo
        {
          label: 'Sexo',
          value: schema.sexo,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: 'sexo',
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes completar este campo'),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: 'sexo',
            evaluate: evaluate
          }).observations
        }, //tipo de dni
        {
          label: 'Tipo de DNI',
          value: schema.tipo_dni,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          placeholder: 'Selecciona una opción',
          options: [{
            label: 'Documento Unico',
            value: 'documento_unico'
          }, {
            label: 'Pasaporte',
            value: 'Pasaporte'
          }],
          name: 'tipo_dni' // validations: yup.string().required('Debes completar este campo'),
          // observation: new Observations({schema, name: 'tipo_dni', evaluate}).observations

        }, //numero de dni
        {
          label: 'Numero de Documento',
          value: schema.numero_dni,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          // type: inputsTypes.SELECT,
          name: 'numero_dni',
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes completar este campo'),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: 'tipo_dni',
            evaluate: evaluate
          }).observations
        }, //fecha de nacimiento
        {
          label: 'Fecha de Nacimiento',
          value: schema.fecha_nacimiento,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.DATE,
          name: 'fecha_nacimiento',
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes completar este campo'),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: 'fecha_nacimiento',
            evaluate: evaluate
          }).observations
        }, //nacionalidad
        {
          label: 'Nacionalidad',
          value: schema.nacionalidad,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: 'nacionalidad',
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes completar este campo'),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: 'nacionalidad',
            evaluate: evaluate
          }).observations
        }, //Estado Civil
        {
          label: 'Estado Civil',
          value: schema.estado_civil,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          name: 'estado_civil',
          options: [{
            label: 'Soltero',
            value: 'Soltero'
          }, {
            label: 'Casado',
            value: 'Casado'
          }, {
            label: 'Divorsiado',
            value: 'Divorsiado'
          }] // validations: yup.string().required('Debes completar este campo'),
          // observation: new Observations({schema, name: 'estado_civil', evaluate}).observations

        }, //profesion
        {
          label: 'Profesión',
          value: schema.profesion,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: 'profesion',
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required('Debes completar este campo'),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: 'profesion',
            evaluate: evaluate
          }).observations
        }]
      }]
    }]
  }, {
    icon: "M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z",
    bgColorIcon: "bg-blue-500",
    bgColorProgress: "bg-blue-300",
    titleStep: "UBICACIÓN DE LA SOLICITUD",
    bodyStep: [{
      widthResponsive: "flex-row",
      //flex
      // columns
      body: [//  col 1
      {
        title: "Sustancias minerales que insuatralizan",
        width: "",
        //flex
        columns: "grid-cols-1",
        //grid
        columnsResponsive: "",
        //inside card
        img: "/images/laborales.png",
        inputs: [{
          label: "List",
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.LIST,
          name: "List",
          // columns: 'grid-cols-1',
          // colSpans + 1
          // columnsResponsive: 'lg:w-2/5',
          childrens: [// default value,
          [{
            name: "sustanceSelect",
            value: null
          }, {
            name: "mineralSelect",
            value: null
          }, {
            name: "dni",
            value: null
          }]],
          elements: [[{
            label: "Sustancia",
            value: {},
            type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
            colSpan: "lg:w-2/5",
            options: [{
              label: "Sustancias de aprovechamiento común",
              value: "aprovechamiento_comun"
            }, {
              label: "Sustancias que se conceden preferentemente al dueño del suelo",
              value: "conceden_preferentemente"
            }],
            name: "sustanceSelect",
            multiple: false,
            closeOnSelect: true,
            searchable: false,
            inputDepends: ["mineralSelect"],
            optionsDepends: {
              aprovechamiento_comun: [{
                label: "Arenas Metalíferas",
                value: "Arenas Metalíferas"
              }, {
                label: "Piedras Preciosas",
                value: "Piedras Preciosas"
              }, {
                label: "Desmontes",
                value: "Desmontes"
              }, {
                label: "Relaves",
                value: "Relaves"
              }, {
                label: "Escoriales",
                value: "Escoriales"
              }],
              conceden_preferentemente: [{
                label: "Salitres",
                value: "Salitres"
              }, {
                label: "Salinas",
                value: "Salinas"
              }, {
                label: "Turberas",
                value: "Turberas"
              }, {
                label: "Metales no comprendidos en 1° Categ.",
                value: "Metales no comprendidos en 1° Categ."
              }, {
                label: "Abrasivos",
                value: "Abrasivos"
              }, {
                label: "Ocres",
                value: "Ocres"
              }, {
                label: "Resinas",
                value: "Resinas"
              }, {
                label: "Esteatitas",
                value: "Esteatitas"
              }, {
                label: "Baritina",
                value: "Baritina"
              }, {
                label: "Caparrosas",
                value: "Caparrosas"
              }, {
                label: "Grafito",
                value: "Grafito"
              }, {
                label: "Caolí­n",
                value: "Caolí­n"
              }, {
                label: "Sales Alcalinas o Alcalino Terrosas",
                value: "Sales Alcalinas o Alcalino Terrosas"
              }, {
                label: "Amianto",
                value: "Amianto"
              }, {
                label: "Bentonita",
                value: "Bentonita"
              }, {
                label: "Zeolitas o Minerales Permutantes o Permutíticos",
                value: "Zeolitas o Minerales Permutantes o Permutíticos"
              }]
            },
            // validations: yup.object().when('sustanceSelect', {
            //     is: value => _.isEmpty(value),
            //     then: yup.object().required('Debes elegir un elemento')
            // }),
            placeholder: "Selecciona una opción"
          }, {
            label: "Mineral Explotado",
            value: {},
            type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
            colSpan: "lg:w-2/5",
            options: [],
            name: "mineralSelect",
            inputDepends: [],
            multiple: false,
            closeOnSelect: true,
            searchable: false,
            // validations: yup.object().when('mineralSelect', {
            //     is: value => _.isEmpty(value),
            //     then: yup.object().required('Debes elegir un elemento')
            // }),
            placeholder: "Selecciona una opción"
          }, {
            label: "DNI",
            value: schema.dni,
            type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.NUMBER,
            colSpan: "lg:w-1/5",
            name: "dni2" // validations: yup.string().required('Debes ingresar un dni'),

          }, {
            colSpan: "lg:w-5/5",
            observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
              schema: schema,
              name: "row-",
              evaluate: evaluate
            }).observations
          }]],
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.array().of(yup__WEBPACK_IMPORTED_MODULE_0__.object().shape({
            sustanceSelect: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("sustance", {
              is: function is(value) {
                return _.isEmpty(value);
              },
              then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento").nullable()
            }),
            mineralSelect: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("mineral", {
              is: function is(value) {
                return _.isEmpty(value);
              },
              then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento").nullable()
            }),
            dni2: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes ingresar un dni")
          })).strict()
        }]
      }]
    }]
  }, //Ubicacion Solicitud Exploración /Matricula Catastral
  {
    icon: 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
    bgColorIcon: 'bg-blue-500',
    bgColorProgress: 'bg-blue-300',
    titleStep: 'Ubi.y MC',
    bodyStep: [{
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
          searchable: false,
          placeholder: 'Selecciona una opción',
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when('provinciaSelect', {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required('Debes elegir un elemento').nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: 'provincia',
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
          searchable: false,
          placeholder: 'Selecciona una opción',
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when('departamentoSelect', {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required('Debes elegir un elemento').nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: 'departamento',
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
          searchable: false,
          placeholder: 'Selecciona una opción',
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when('localidadSelect', {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required('Debes elegir un elemento').nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: 'localidad',
            evaluate: evaluate
          }).observations
        }]
      }]
    }]
  }, //Coordenadass GaussKruger / Categoria Mineral
  {
    icon: "M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-2.3-8.7l1.3 1.29 3.3-3.3a1 1 0 0 1 1.4 1.42l-4 4a1 1 0 0 1-1.4 0l-2-2a1 1 0 0 1 1.4-1.42z",
    bgColorIcon: "bg-blue-500",
    bgColorProgress: "bg-blue-300",
    titleStep: "PROPIETARIO",
    bodyStep: [{
      widthResponsive: "lg:flex-row",
      //flex
      // columns
      body: [//  col 1
      {
        title: "Ubicación",
        width: "lg:w-full",
        //flex
        columns: "grid-cols-1",
        //grid
        columnsResponsive: "lg:grid-cols-2",
        //inside card
        img: "/images/laborales.png",
        inputs: [{
          label: "Provincia",
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          // get axios
          async: true,
          asyncUrl: "/paises/departamentos",
          inputDepends: ["departamento"],
          inputClearDepends: ["departamento", "localidad"],
          // isLoading: false,
          //
          options: dataForm.provincia,
          name: "provincia",
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          placeholder: "Selecciona una opción",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("provinciaSelect", {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento").nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "provincia",
            evaluate: evaluate
          }).observations
        }, {
          label: "Departamento",
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          // get axios
          async: true,
          asyncUrl: "/paises/localidades",
          inputDepends: ["localidad"],
          inputClearDepends: ["localidad"],
          isLoading: false,
          //
          options: [],
          name: "departamento",
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          placeholder: "Selecciona una opción",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("departamentoSelect", {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento").nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "departamento",
            evaluate: evaluate
          }).observations
        }, {
          label: "Localidad",
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          // get axios
          async: true,
          isLoading: false,
          //
          options: [],
          name: "localidad",
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          placeholder: "Selecciona una opción",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("localidadSelect", {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento").nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "localidad",
            evaluate: evaluate
          }).observations
        }]
      }]
    }]
  }, {
    icon: "M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-2.3-8.7l1.3 1.29 3.3-3.3a1 1 0 0 1 1.4 1.42l-4 4a1 1 0 0 1-1.4 0l-2-2a1 1 0 0 1 1.4-1.42z",
    bgColorIcon: "bg-blue-500",
    bgColorProgress: "bg-blue-300",
    titleStep: "DECLACIÓN JURADA",
    bodyStep: [{
      widthResponsive: "lg:flex-row",
      //flex
      // columns
      body: [//  col 1
      {
        title: "Ubicación",
        width: "lg:w-full",
        //flex
        columns: "grid-cols-1",
        //grid
        columnsResponsive: "lg:grid-cols-2",
        //inside card
        img: "/images/laborales.png",
        inputs: [{
          label: "Provincia",
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          // get axios
          async: true,
          asyncUrl: "/paises/departamentos",
          inputDepends: ["departamento"],
          inputClearDepends: ["departamento", "localidad"],
          // isLoading: false,
          //
          options: dataForm.provincia,
          name: "provincia",
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          placeholder: "Selecciona una opción",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("provinciaSelect", {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento").nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "provincia",
            evaluate: evaluate
          }).observations
        }, {
          label: "Departamento",
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          // get axios
          async: true,
          asyncUrl: "/paises/localidades",
          inputDepends: ["localidad"],
          inputClearDepends: ["localidad"],
          isLoading: false,
          //
          options: [],
          name: "departamento",
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          placeholder: "Selecciona una opción",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("departamentoSelect", {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento").nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "departamento",
            evaluate: evaluate
          }).observations
        }, {
          label: "Localidad",
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          // get axios
          async: true,
          isLoading: false,
          //
          options: [],
          name: "localidad",
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          placeholder: "Selecciona una opción",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("localidadSelect", {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento").nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "localidad",
            evaluate: evaluate
          }).observations
        }]
      }]
    }]
  }];
}

/***/ })

}]);