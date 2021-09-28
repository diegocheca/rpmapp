"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["helpers_formWeb_sanjuan_s_exploracion_wizard_js"],{

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

/***/ "./helpers/formWeb/sanjuan/observaciones.js":
/*!**************************************************!*\
  !*** ./helpers/formWeb/sanjuan/observaciones.js ***!
  \**************************************************/
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

/***/ "./helpers/formWeb/sanjuan/s_exploracion_wizard.js":
/*!*********************************************************!*\
  !*** ./helpers/formWeb/sanjuan/s_exploracion_wizard.js ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "getFormSchema": () => (/* binding */ getFormSchema)
/* harmony export */ });
/* harmony import */ var yup__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! yup */ "./node_modules/yup/es/index.js");
/* harmony import */ var _observaciones__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./observaciones */ "./helpers/formWeb/sanjuan/observaciones.js");
/* harmony import */ var _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../enums/inputsTypes */ "./helpers/enums/inputsTypes.js");
/* harmony import */ var _enums_fileAccept__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../enums/fileAccept */ "./helpers/enums/fileAccept.js");
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _extends() { _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; }; return _extends.apply(this, arguments); }





function getFormSchema(_ref, evaluate, dataForm) {
  var schema = _extends({}, _ref);

  // name => unique
  // icons => https://heroicons.com/ => svg d=""
  return [//Datos Solicitud
  {
    icon: "M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z",
    bgColorIcon: "bg-blue-500",
    bgColorProgress: "bg-blue-300",
    titleStep: "Datos Solicitud ",
    bodyStep: [//row Solicitud
    {
      widthResponsive: "lg:flex-row",
      //flex
      // columns
      body: [//  Solicitud de Exploracion
      {
        title: "Datos Solicitud",
        width: "lg:w-full",
        //flex
        columns: "grid-cols-3",
        //grid
        columnsResponsive: "lg:grid-cols-2",
        //inside card
        img: "/images/laborales.png",
        inputs: [//NUMERO DE EXPEDIENTE
        {
          label: "NUMERO DE EXPEDIENTE",
          value: schema.num_expediente,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: "num_expediente",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "num_expediente",
            evaluate: evaluate
          }).observations
        }, //PLAZO SOLICITADO
        {
          label: "PLAZO SOLICITADO (días)",
          value: schema.plazo_soli,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: "plazo_soli",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "plazo_soli",
            evaluate: evaluate
          }).observations
        }, //PERIODO DE TRABAJO
        {
          label: "PERIODO DE TRABAJO",
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          name: "periodo",
          options: [{
            label: "Todo el Año",
            value: "Todo el Año"
          }, {
            label: "Meses",
            value: "Meses"
          }, {
            label: "Días",
            value: "Días"
          }],
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("periodoSelect", {
            is: function is(value) {
              return _.isEmpty(value);
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento")
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "periodo",
            evaluate: evaluate
          }).observations
        }, //PROGRAMA MINIMO DE TRABAJO
        {
          label: "ADJUNTA PROG. MINIMO DE TRABAJO",
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          name: "programa_adjunto",
          options: [{
            label: "Si",
            value: "Si"
          }, {
            label: "No",
            value: "No"
          }],
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("programa_adjuntoSelect", {
            is: function is(value) {
              return _.isEmpty(value);
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento")
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "programa_adjunto",
            evaluate: evaluate
          }).observations
        }]
      }]
    }]
  }, // Datos Solicitante-Razon Social
  {
    icon: "M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z",
    bgColorIcon: "bg-blue-500",
    bgColorProgress: "bg-blue-300",
    titleStep: "Datos Solicitante",
    bodyStep: [//row elija si es persona o razon social
    {
      widthResponsive: "lg:flex-row",
      //flex
      body: [{
        title: "Tipo de Solicitante",
        width: "lg:w-full",
        //flex
        columns: "grid-cols-1",
        //grid
        columnsResponsive: "lg:grid-cols-1",
        //inside card
        img: "/images/laborales.png",
        inputs: [{
          label: "¿Es una Persona o Razon Social?",
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          name: "opcion",
          options: [{
            label: "Solicitante (Persona)",
            value: "Solicitante (Persona)"
          }, {
            label: "Razon Social",
            value: "Razon Social"
          }],
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("opcionSelect", {
            is: function is(value) {
              return _.isEmpty(value);
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento")
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "opcion",
            evaluate: evaluate
          }).observations
        }]
      }]
    }, // row 1 Datos Solicitante
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
        columnsResponsive: "lg:grid-cols-2",
        //inside card
        img: "/images/laborales.png",
        inputs: [//NOMBRE
        {
          label: "Nombre",
          value: schema.nombre,
          //nombre_razon_social,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: "nombre" // validations: yup
          //     .string()
          //     .required("Debes completar este campo"),
          // observation: new Observations({
          //     schema,
          //     name: "nombre",
          //     evaluate,
          // }).observations,

        }, //APELLIDO
        {
          label: "Apellido",
          value: schema.apellido,
          //nombre_razon_social,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: "apellido" // validations: yup
          //     .string()
          //     .required("Debes completar este campo"),
          // observation: new Observations({
          //     schema,
          //     name: "apellido",
          //     evaluate,
          // }).observations,

        }, //RAZON SOCIAL
        {
          label: "Razon Social",
          value: schema.nombrers,
          //nombre_razon_social,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: "nombrers" // validations: yup
          //     .string()
          //     .required("Debes completar este campo"),
          // observation: new Observations({
          //     schema,
          //     name: "nombrers",
          //     evaluate,
          // }).observations,

        }, //SEXO
        {
          label: "Sexo",
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          name: "sexo",
          options: [{
            label: "Femenino",
            value: "Femenino"
          }, {
            label: "Masculino",
            value: "Masculino"
          }, {
            label: "Otros",
            value: "Otros"
          }, {
            label: "Sin Sexo",
            value: "Sin Sexo"
          }] // validations: yup
          //     .object()
          //     .when("sexoSelect", {
          //         is: (value) => _.isEmpty(value),
          //         then: yup
          //             .object()
          //             .required(
          //                 "Debes elegir un elemento"
          //             ),
          //     }),
          // observation: new Observations({
          //     schema,
          //     name: "sexo",
          //     evaluate,
          // }).observations,

        }, //TIPO DOCUMENTO
        {
          label: "Tipo de Documento",
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          async: true,
          //asyncUrl: "/tipo_documento",
          isLoading: false,
          options: dataForm.tipo_documento,
          name: "tipo_documento",
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          placeholder: "Selecciona una opción",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("tipo_documentoSelect", {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento").nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "tipo_documento",
            evaluate: evaluate
          }).observations
        }, //DNI
        {
          label: "DNI",
          value: schema.dni,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.NUMBER,
          name: "dni",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "dni",
            evaluate: evaluate
          }).observations
        }, //FECHA DE NACIMIENTO
        {
          label: "Fecha de Nacimiento",
          value: schema.fecha_nacimiento,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.DATE,
          name: "fecha_nacimiento" // validations: yup
          //     .string()
          //     .required("Debes completar este campo"),
          // observation: new Observations({
          //     schema,
          //     name: "fecha_nacimiento",
          //     evaluate,
          // }).observations,

        }, //NACIONALIDAD
        {
          label: "Nacionalidad",
          value: schema.nacionalidad,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: "nacionalidad" // validations: yup
          //     .string()
          //     .required("Debes completar este campo"),
          // observation: new Observations({
          //     schema,
          //     name: "nacionalidad",
          //     evaluate,
          // }).observations,

        }, //PROFESION
        {
          label: "Profesión",
          value: schema.profesion,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: "profesion" // validations: yup
          //     .string()
          //     .required("Debes completar este campo"),
          // observation: new Observations({
          //     schema,
          //     name: "profesion",
          //     evaluate,
          // }).observations,

        }, //ESTADO CIVIL
        {
          label: "Estado Civil",
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          name: "estado_civil",
          options: [{
            label: "Soltero",
            value: "Soltero"
          }, {
            label: "Casado",
            value: "Casado"
          }, {
            label: "Divorsiado",
            value: "Divorsiado"
          }, {
            label: "Sin Estado",
            value: "Sin Estado"
          }] // validations: yup
          //     .object()
          //     .when("estado_civilSelect", {
          //         is: (value) => _.isEmpty(value),
          //         then: yup
          //             .object()
          //             .required(
          //                 "Debes elegir un elemento"
          //             ),
          //     }),
          // observation: new Observations({
          //     schema,
          //     name: "estado_civil",
          //     evaluate,
          // }).observations,

        }]
      }]
    }, //row 2 Domicilio legal Solicitante
    {
      widthResponsive: "lg:flex-row",
      //flex
      // columns
      body: [//  col 1
      {
        title: "Domicilio Legal Solicitante",
        width: "lg:w-full",
        //flex
        columns: "grid-cols-1",
        //grid
        columnsResponsive: "lg:grid-cols-1",
        //inside card
        img: "/images/laborales.png",
        inputs: [//DOMICILIO LEGAL
        {
          label: "Domicilio",
          value: schema.domicilio,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: "domicilioLegal",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "domicilioLegal",
            evaluate: evaluate
          }).observations
        }]
      }]
    }, // row 3 Domicilio legal provincia/dpto/localidad
    {
      widthResponsive: "lg:flex-row",
      //flex
      // columns
      body: [//  col 1
      {
        title: "Domicilio Legal Solicitante",
        width: "lg:w-full",
        //flex
        columns: "grid-cols-1",
        //grid
        columnsResponsive: "lg:grid-cols-1",
        //inside card
        img: "/images/laborales.png",
        inputs: [//PROVINCIA
        {
          label: "Provincia Legal",
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          // get axios
          async: true,
          asyncUrl: "/paises/departamentos",
          inputDepends: ["departamentoLegal"],
          inputClearDepends: ["departamentoLegal", "localidadLegal"],
          // isLoading: false,
          options: dataForm.provincia,
          name: "provinciaLegal",
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          placeholder: "Selecciona una opción",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("provinciaLegalSelect", {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento").nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "provinciaLegal",
            evaluate: evaluate
          }).observations
        }, //DEPARTAMENTO
        {
          label: "Departamento",
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          // get axios
          async: true,
          asyncUrl: "/paises/localidades",
          inputDepends: ["localidadLegal"],
          inputClearDepends: ["localidadLegal"],
          isLoading: false,
          //
          options: [],
          name: "departamentoLegal",
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          placeholder: "Selecciona una opción",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("departamentoLegalSelect", {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento").nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "departamentoLegal",
            evaluate: evaluate
          }).observations
        }, //LOCALIDAD
        {
          label: "Localidad",
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          // get axios
          async: true,
          isLoading: false,
          //
          options: [],
          name: "localidadLegal",
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          placeholder: "Selecciona una opción",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("localidadLegalSelect", {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento").nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "localidadLegal",
            evaluate: evaluate
          }).observations
        }]
      }]
    }, // row 4 Domicilio Real Solicitante
    {
      widthResponsive: "lg:flex-row",
      //flex
      // columns
      body: [//  col 1
      {
        title: "Domicilio Real Solicitante",
        width: "lg:w-full",
        //flex
        columns: "grid-cols-1",
        //grid
        columnsResponsive: "lg:grid-cols-1",
        //inside card
        img: "/images/laborales.png",
        inputs: [//DOMICILIO LEGAL
        {
          label: "Domicilio",
          value: schema.domicilio,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: "domicilio",
          // validations: yup
          //     .string()
          //     .required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "domicilio",
            evaluate: evaluate
          }).observations
        }]
      }]
    }, //row 5 Domicilio real provincia/dpto/localidad
    {
      widthResponsive: "lg:flex-row",
      //flex
      // columns
      body: [//  col 1
      {
        title: "Domicilio Real Solicitante",
        width: "lg:w-full",
        //flex
        columns: "grid-cols-1",
        //grid
        columnsResponsive: "lg:grid-cols-2",
        //inside card
        img: "/images/laborales.png",
        inputs: [//PROVINCIA
        {
          label: "Provincia ",
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          // get axios
          async: true,
          asyncUrl: "/paises/departamentos",
          inputDepends: ["departamento"],
          inputClearDepends: ["departamento", "localidad"],
          // isLoading: false,
          options: dataForm.provincia,
          name: "provincia",
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          placeholder: "Selecciona una opción",
          // validations: yup
          //     .object()
          //     .when("provinciaSelect", {
          //         is: (value) =>
          //             _.isEmpty(value) || !value,
          //         then: yup
          //             .object()
          //             .required(
          //                 "Debes elegir un elemento"
          //             )
          //             .nullable(),
          //     }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "provincia",
            evaluate: evaluate
          }).observations
        }, //DEPARTAMENTO
        {
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
          // validations: yup
          //     .object()
          //     .when("departamentoSelect", {
          //         is: (value) =>
          //             _.isEmpty(value) || !value,
          //         then: yup
          //             .object()
          //             .required(
          //                 "Debes elegir un elemento"
          //             )
          //             .nullable(),
          //     }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "departamento",
            evaluate: evaluate
          }).observations
        }, //LOCALIDAD
        {
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
          // validations: yup
          //     .object()
          //     .when("localidadSelect", {
          //         is: (value) =>
          //             _.isEmpty(value) || !value,
          //         then: yup
          //             .object()
          //             .required(
          //                 "Debes elegir un elemento"
          //             )
          //             .nullable(),
          //     }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "localidad",
            evaluate: evaluate
          }).observations
        }]
      }]
    }]
  }, //Representante Legal
  {
    icon: "M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z",
    bgColorIcon: "bg-blue-500",
    bgColorProgress: "bg-blue-300",
    titleStep: "Datos Representante Legal",
    bodyStep: [// row 2 Agregar Una persona Repr.Legal
    {
      widthResponsive: "lg:flex-row",
      //flex
      // columns
      body: [//  col 1
      {
        title: "Datos Representante Legal",
        width: "lg:w-full",
        //flex
        columns: "grid-cols-1",
        //grid
        columnsResponsive: "lg:grid-cols-2",
        //inside card
        img: "/images/laborales.png",
        inputs: [//NOMBRE REPRESENTANTE LEGAL
        {
          label: "Nombre",
          value: schema.nombre,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: "nombre_rl",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "nombre_rl",
            evaluate: evaluate
          }).observations
        }, //APELLIDO REPRESENTANTE LEGAL
        {
          label: "Apellido",
          value: schema.apellido,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: "apellido_rl",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "apellido_rl",
            evaluate: evaluate
          }).observations
        }, //TIPO DE DOCUMENTO
        {
          label: "Tipo de Documento",
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          async: true,
          //asyncUrl: "/tipo_documento",
          isLoading: false,
          options: dataForm.tipo_documento,
          name: "tipo_documento_rl",
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          placeholder: "Selecciona una opción",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("tipo_documento_rlSelect", {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento").nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "tipo_documento_rl",
            evaluate: evaluate
          }).observations
        }, // DNI
        {
          label: "DNI",
          value: schema.dni,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.NUMBER,
          name: "dni_rl",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "dni_rl",
            evaluate: evaluate
          }).observations
        }, //DOMICILIO
        {
          label: "Domicilio",
          value: schema.domicilio,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: "domi_rl",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "domi_rl",
            evaluate: evaluate
          }).observations
        }, //SEXO
        {
          label: "Sexo",
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          name: "sexoRL",
          options: [{
            label: "Femenino",
            value: "Femenino"
          }, {
            label: "Masculino",
            value: "Masculino"
          }, {
            label: "Otros",
            value: "Otros"
          }, {
            label: "Sin Sexo",
            value: "Sin Sexo"
          }],
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("sexoSelect", {
            is: function is(value) {
              return _.isEmpty(value);
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento")
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "sexoRL",
            evaluate: evaluate
          }).observations
        }]
      }]
    }]
  }, // Datos Terreno / Coordenadass Gauss-Krüger / Matricula Catastral
  {
    icon: "M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z",
    bgColorIcon: "bg-blue-500",
    bgColorProgress: "bg-blue-300",
    titleStep: "Coordenadas Gauss-Krüger Y Matricula Catastral",
    bodyStep: [//row Datos terreno
    {
      widthResponsive: "flex-row",
      //flex
      body: [//  col 1
      {
        title: "Datos Terreno",
        width: "",
        //flex
        columns: "grid-cols-2",
        //grid
        columnsResponsive: "lg:grid-cols-2",
        //inside card
        img: "/images/laborales.png",
        inputs: [// ESTADO TERRENO
        {
          label: "ESTADO TERRENO",
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          async: true,
          isLoading: false,
          options: dataForm.estado_terreno,
          name: "estado_terreno",
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          placeholder: "Selecciona una opción",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("estado_terrenoSelect", {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento").nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "estado_terreno",
            evaluate: evaluate
          }).observations
        }, //SUPERFICIE HECTARIAS
        {
          label: "SUP. HECTARIAS",
          value: schema.sup_hectarias,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: "sup_hectarias",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "sup_hectarias",
            evaluate: evaluate
          }).observations
        }, //PROVINCIA
        {
          label: "Provincia ",
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          // get axios
          async: true,
          asyncUrl: "/paises/departamentos",
          inputDepends: ["dpto_explo"],
          inputClearDepends: ["dpto_explo", "loc_explo"],
          // isLoading: false,
          options: dataForm.provincia,
          name: "prov_explo",
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          placeholder: "Selecciona una opción",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("prov_exploSelect", {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento").nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "prov_explo",
            evaluate: evaluate
          }).observations
        }, //DEPARTAMENTO
        {
          label: "Departamento",
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          // get axios
          async: true,
          asyncUrl: "/paises/localidades",
          inputDepends: ["loc_explo"],
          inputClearDepends: ["loc_explo"],
          isLoading: false,
          //
          options: [],
          name: "dpto_explo",
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          placeholder: "Selecciona una opción",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("dpto_exploSelect", {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento").nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "dpto_explo",
            evaluate: evaluate
          }).observations
        }, //LOCALIDAD
        {
          label: "Localidad",
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          // get axios
          async: true,
          isLoading: false,
          //
          options: [],
          name: "loc_explo",
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          placeholder: "Selecciona una opción",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("loc_exploSelect", {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento").nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "loc_explo",
            evaluate: evaluate
          }).observations
        }, //PARAJE
        {
          label: "PARAJE",
          value: schema.num_expediente,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: "paraje1",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "paraje1",
            evaluate: evaluate
          }).observations
        }]
      }]
    }, //Row Matricula Catastral
    {
      widthResponsive: "flex-row",
      //flex
      body: [//  col 1
      {
        title: "Datos Matricula Catastral",
        width: "",
        //flex
        columns: "grid-cols-2",
        //grid
        columnsResponsive: "lg:grid-cols-2",
        //inside card
        img: "/images/laborales.png",
        inputs: [//NE_X
        {
          label: "NE_X",
          value: schema.ne_x,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: "ne_x",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "ne_x",
            evaluate: evaluate
          }).observations
        }, //NE_Y
        {
          label: "NE_Y",
          value: schema.ne_y,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: "ne_y",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "ne_y",
            evaluate: evaluate
          }).observations
        }, //SO_X
        {
          label: "SO_X",
          value: schema.so_x,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: "so_x",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "so_x",
            evaluate: evaluate
          }).observations
        }, //SO_Y
        {
          label: "SO_Y",
          value: schema.so_y,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: "so_y",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "so_y",
            evaluate: evaluate
          }).observations
        }]
      }]
    }, //row Coordenadas Gauss-Krüger
    {
      widthResponsive: "flex-row",
      //flex
      body: [//  col 1
      {
        title: "Datos Coordenadass Gauss-Krüger",
        width: "",
        //flex
        columns: "grid-cols-1",
        //grid
        columnsResponsive: "",
        //inside card
        img: "/images/laborales.png",
        inputs: [{
          label: "",
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.LIST,
          name: "List",
          // columns: 'grid-cols-1',
          // colSpans + 1
          // columnsResponsive: 'lg:w-2/5',
          childrens: [// default value,
          [{
            name: "x",
            value: null
          }, {
            name: "y",
            value: null
          }]],
          elements: [[//LABEL X
          {
            label: "X",
            value: schema.y,
            type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
            colSpan: "lg:w-2/5",
            name: "x",
            multiple: false,
            closeOnSelect: true,
            searchable: false,
            validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
            observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
              schema: schema,
              name: "x",
              evaluate: evaluate
            }).observations // validations: yup.object().when('sustanceSelect', {
            //     is: value => _.isEmpty(value),
            //     then: yup.object().required('Debes elegir un elemento')
            // }),
            //placeholder: 'Selecciona una opción',

          }, //LABEL Y
          {
            label: "Y",
            value: schema.y,
            type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
            colSpan: "lg:w-2/5",
            name: "y",
            multiple: false,
            closeOnSelect: true,
            searchable: false,
            validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
            observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
              schema: schema,
              name: "y",
              evaluate: evaluate
            }).observations // validations: yup.object().when('mineralSelect', {
            //     is: value => _.isEmpty(value),
            //     then: yup.object().required('Debes elegir un elemento')
            // }),
            // placeholder: 'Selecciona una opción',

          }, {
            colSpan: "lg:w-5/5",
            observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
              schema: schema,
              name: "row-",
              evaluate: evaluate
            }).observations
          }]],
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.array().of(yup__WEBPACK_IMPORTED_MODULE_0__.object().shape({
            // sustanceSelect: yup.object().when('sustance', {
            //     is: value => _.isEmpty(value),
            //     then: yup.object().required('Debes elegir un elemento').nullable()
            // }),
            // mineralSelect: yup.object().when('mineral', {
            //     is: value => _.isEmpty(value),
            //     then: yup.object().required('Debes elegir un elemento').nullable()
            // }),
            x: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes ingresar una coordenada"),
            y: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes ingresaruna coordenada")
          })).strict()
        }]
      }]
    }]
  }, //Datos Propietario
  {
    icon: "M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z",
    bgColorIcon: "bg-blue-500",
    bgColorProgress: "bg-blue-300",
    titleStep: "Datos Propietario",
    bodyStep: [{
      widthResponsive: "lg:flex-row",
      //flex
      // columns
      body: [//  col 1
      {
        title: "Datos Propietario",
        width: "lg:w-full",
        //flex
        columns: "grid-cols-3",
        //grid
        columnsResponsive: "lg:grid-cols-2",
        //inside card
        img: "/images/laborales.png",
        inputs: [//NOMBRE
        {
          label: "Nombre",
          value: schema.nombre,
          //nombre_razon_social,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: "nombre_prop",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "nombre_prop",
            evaluate: evaluate
          }).observations
        }, //APELLIDO
        {
          label: "Apellido",
          value: schema.apellido_prop,
          //nombre_razon_social,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: "apellido_prop",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "apellido_prop",
            evaluate: evaluate
          }).observations
        }, //TIPO DOCUMENTO
        {
          label: "Tipo de Documento",
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          async: true,
          //asyncUrl: "/tipo_documento",
          isLoading: false,
          options: dataForm.tipo_documento,
          name: "tipo_documento",
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          placeholder: "Selecciona una opción",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("tipo_documentoSelect", {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento").nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "tipo_documento",
            evaluate: evaluate
          }).observations
        }, //DNI
        {
          label: "DNI",
          value: schema.dni_prop,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.NUMBER,
          name: "dni_prop",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "dni_prop",
            evaluate: evaluate
          }).observations
        }, //PROVINCIA
        {
          label: "Provincia",
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          // get axios
          async: true,
          asyncUrl: "/paises/departamentos",
          // inputDepends: ["departamento"],
          // inputClearDepends: [
          //     "departamento",
          //     "localidad",
          // ],
          // isLoading: false,
          //
          options: dataForm.provincia,
          name: "prov_prop",
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          placeholder: "Selecciona una opción",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("prov_propSelect", {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento").nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "prov_prop",
            evaluate: evaluate
          }).observations
        }, //DOMICILIO
        {
          label: "Domicilio",
          value: schema.domi_prop,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: "domi_prop",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "domi_prop",
            evaluate: evaluate
          }).observations
        }]
      }]
    }]
  }, //Declaracion Jurada y Informe Registro Catastral
  {
    icon: "M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z",
    bgColorIcon: "bg-blue-500",
    bgColorProgress: "bg-blue-300",
    titleStep: "Declaración Jurada y Informe Registro Catastral",
    bodyStep: [// row 1 carga de codumentacion
    {
      widthResponsive: "lg:flex-row",
      //flex
      // columns
      body: [//  col 1
      {
        title: "CARGA DE DOCUMENTACIÓN",
        width: "lg:w-full",
        //flex
        columns: "grid-cols-1",
        //grid
        columnsResponsive: "lg:grid-cols-2",
        //inside card
        img: "/images/laborales.png",
        inputs: [// DECLARACIÓN JURADA
        {
          label: "DECLARACIÓN JURADA",
          value: schema.declaracion,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.FILE,
          name: "declaracion",
          accept: [_enums_fileAccept__WEBPACK_IMPORTED_MODULE_3__.default.PDF.value],
          acceptLabel: "Archivos admitidos: ".concat([_enums_fileAccept__WEBPACK_IMPORTED_MODULE_3__.default.PDF.label].join()),
          maxSize: "Tamaño maximo por archivo: 10MB",
          multiple: false,
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.array().min(1, "Debes adjuntar al menos un elemento")["default"]([]).max(1, "Solo puedes adjuntar hasta 1 archivo").test({
            name: "CUIT_SIZE",
            exclusive: true,
            message: "Recuerda que cada archivo no debe superar los 10MB",
            test: function test(value) {
              if (!value) return true;
              var validation = true;

              for (var index = 0; index < value.length; index++) {
                var element = value[index];
                validation = validation && element.size <= 10000000; // 10MB
              }

              return validation; // !value || (value && value.size <= 10)
            }
          }).test({
            name: "CUIT_FILE_FORMAT",
            exclusive: true,
            message: "Hay archivos con extensiones no válidas",
            test: function test(value) {
              if (!value) return true;
              var validation = true;

              for (var index = 0; index < value.length; index++) {
                var element = value[index];
                validation = validation && _toConsumableArray(_enums_fileAccept__WEBPACK_IMPORTED_MODULE_3__.default.PDF.value).includes(element.type);
              }

              return validation; // return !value || (value && [fileAccept.PDF.value].includes(value.type))
            }
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "declaracion",
            evaluate: evaluate
          }).observations
        }]
      }]
    }]
  }];
}

/***/ })

}]);