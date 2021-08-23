(self["webpackChunk"] = self["webpackChunk"] || []).push([["helpers_formWeb_sanjuan_s_descubrimiento_wizard_js"],{

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

/***/ "./helpers/formWeb/sanjuan/s_descubrimiento_wizard.js":
/*!************************************************************!*\
  !*** ./helpers/formWeb/sanjuan/s_descubrimiento_wizard.js ***!
  \************************************************************/
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
  return [//Datos Solicitud
  {
    icon: "M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z",
    bgColorIcon: "bg-blue-500",
    bgColorProgress: "bg-blue-300",
    titleStep: "Datos Solicitud",
    bodyStep: [{
      widthResponsive: "lg:flex-row",
      //flex
      // columns
      body: [//  col 1
      {
        title: "Solicitud Descubrimiento",
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
        }, //PROGRAMA MINIMO DE TRABAJO
        {
          label: "DESCUBRIMIENTO DIRECTO",
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          name: "descubrimiento_directo",
          options: [{
            label: "Si",
            value: "Si"
          }, {
            label: "No",
            value: "No"
          }],
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("descubrimiento_directoSelect", {
            is: function is(value) {
              return _.isEmpty(value);
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento")
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "descubrimiento_directo",
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
    titleStep: "Solicitante",
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
        columnsResponsive: "lg:grid-cols-3",
        //inside card
        img: "/images/laborales.png",
        inputs: [//NOMBRE
        {
          label: "Nombre",
          value: schema.nombre,
          //nombre_razon_social,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: "nombre_soli" // validations: yup
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
          name: "apellido_soli" // validations: yup
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
          name: "nombrers_soli" // validations: yup
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
          name: "sexo_soli",
          options: [{
            label: "Femenino",
            value: "Femenino"
          }, {
            label: "Masculino",
            value: "Masculino"
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
          name: "tipo_documento_soli",
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          placeholder: "Selecciona una opción",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("tipo_documento_soliSelect", {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento").nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "tipo_documento_soli",
            evaluate: evaluate
          }).observations
        }, //DNI
        {
          label: "DNI",
          value: schema.dni,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.NUMBER,
          name: "dni_soli",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "dni_soli",
            evaluate: evaluate
          }).observations
        }, //FECHA DE NACIMIENTO
        {
          label: "Fecha de Nacimiento",
          value: schema.fecha_nacimiento,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.DATE,
          name: "fecha_nacimiento_soli" // validations: yup
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
          name: "nacionalidad_soli" // validations: yup
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
          name: "profesion_soli" // validations: yup
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
          name: "estado_civil_soli",
          options: [{
            label: "Sin Estado",
            value: "Sin Estado"
          }, {
            label: "Casado",
            value: "Casado"
          }, {
            label: "Divorsiado",
            value: "Divorsiado"
          }, {
            label: "Soltero",
            value: "Soltero"
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
          name: "domicilioLegal_soli",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "domicilioLegal_soli",
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
        columnsResponsive: "lg:grid-cols-3",
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
          inputDepends: ["departamentoLegal_soli"],
          inputClearDepends: ["departamentoLegal_soli", "localidadLegal_soli"],
          // isLoading: false,
          options: dataForm.provincia,
          name: "provinciaLegal_soli",
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          placeholder: "Selecciona una opción",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("provinciaLega_solilSelect", {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento").nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "provinciaLegal_soli",
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
          inputDepends: ["localidadLegal_soli"],
          inputClearDepends: ["localidadLegal_soli"],
          isLoading: false,
          //
          options: [],
          name: "departamentoLegal_soli",
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          placeholder: "Selecciona una opción",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("departamentoLegal_soliSelect", {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento").nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "departamentoLegal_soli",
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
          name: "localidadLegal_soli",
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          placeholder: "Selecciona una opción",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("localidadLegal_soliSelect", {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento").nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "localidadLegal_soli",
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
          name: "domicilio_soli",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "domicilio_soli",
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
        columnsResponsive: "lg:grid-cols-3",
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
          inputDepends: ["departamento_soli"],
          inputClearDepends: ["departamento_soli", "localidad_soli"],
          // isLoading: false,
          //
          options: dataForm.provincia,
          name: "provincia_soli",
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          placeholder: "Selecciona una opción",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("provincia_soliSelect", {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento").nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "provincia_soli",
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
          inputDepends: ["localidad_soli"],
          inputClearDepends: ["localidad_soli"],
          isLoading: false,
          //
          options: [],
          name: "departamento_soli",
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          placeholder: "Selecciona una opción",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("departamento_soliSelect", {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento").nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "departamento_soli",
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
          name: "localidad_soli",
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          placeholder: "Selecciona una opción",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("localidad_soliSelect", {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento").nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "localidad_soli",
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
    titleStep: "Representante Legal",
    bodyStep: [// row 2 Agregar Una persona Repr.Legal
    {
      widthResponsive: "lg:flex-row",
      //flex
      // columns
      body: [//  col 1
      {
        title: "Representante Legal",
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
          name: "nombre_rl_soli",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "nombre_rl_soli",
            evaluate: evaluate
          }).observations
        }, //APELLIDO REPRESENTANTE LEGAL
        {
          label: "Apellido",
          value: schema.apellido,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: "apellido_rl_soli",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "apellido_rl_soli",
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
          name: "tipo_documento_rl_soli",
          multiple: false,
          closeOnSelect: true,
          searchable: false,
          placeholder: "Selecciona una opción",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("tipo_documento_rl_soliSelect", {
            is: function is(value) {
              return _.isEmpty(value) || !value;
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento").nullable()
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "tipo_documento_rl_soli",
            evaluate: evaluate
          }).observations
        }, // DNI
        {
          label: "DNI",
          value: schema.dni,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.NUMBER,
          name: "dni_rl_soli",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "dni_rl_soli",
            evaluate: evaluate
          }).observations
        }, //DOMICILIO
        {
          label: "Domicilio",
          value: schema.domicilio,
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.TEXT,
          name: "domi_rl_soli",
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.string().required("Debes completar este campo"),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "domi_rl_soli",
            evaluate: evaluate
          }).observations
        }, //SEXO
        {
          label: "Sexo",
          value: {},
          type: _enums_inputsTypes__WEBPACK_IMPORTED_MODULE_2__.default.SELECT,
          name: "sexoRL_soli",
          options: [{
            label: "Femenino",
            value: "Femenino"
          }, {
            label: "Masculino",
            value: "Masculino"
          }, {
            label: "Otros",
            value: "Otros"
          }],
          validations: yup__WEBPACK_IMPORTED_MODULE_0__.object().when("sexoRL_soliSelect", {
            is: function is(value) {
              return _.isEmpty(value);
            },
            then: yup__WEBPACK_IMPORTED_MODULE_0__.object().required("Debes elegir un elemento")
          }),
          observation: new _observaciones__WEBPACK_IMPORTED_MODULE_1__.default({
            schema: schema,
            name: "sexoRL_soli",
            evaluate: evaluate
          }).observations
        }]
      }]
    }]
  }];
}

/***/ })

}]);