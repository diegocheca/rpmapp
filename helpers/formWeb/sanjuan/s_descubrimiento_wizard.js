import * as yup from "yup";
// import Observations from './observaciones';
// import inputsTypes from '../../enums/inputsTypes';
// import fileAccept from '../../enums/fileAccept';
import Observations from "./observaciones";
import inputsTypes from "../../enums/inputsTypes";
import fileAccept from "../../enums/fileAccept";

export function getFormSchema({ ...schema }, evaluate, dataForm) {
    // name => unique
    // icons => https://heroicons.com/ => svg d=""
    return [
        //Datos Solicitud
        {
            icon: "M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z",
            bgColorIcon: "bg-blue-500",
            bgColorProgress: "bg-blue-300",
            titleStep: "Datos Solicitud",
            bodyStep: [
                {
                    widthResponsive: "lg:flex-row", //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: "Solicitud Descubrimiento",
                            width: "lg:w-full", //flex
                            columns: "grid-cols-3", //grid
                            columnsResponsive: "lg:grid-cols-2", //inside card
                            img: "/images/laborales.png",
                            inputs: [
                                //NUMERO DE EXPEDIENTE
                                {
                                    label: "NUMERO DE EXPEDIENTE",
                                    value: schema.num_expediente,
                                    type: inputsTypes.TEXT,
                                    name: "num_expediente",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo"),
                                    observation: new Observations({
                                        schema,
                                        name: "num_expediente",
                                        evaluate,
                                    }).observations,
                                },
                                //PROGRAMA MINIMO DE TRABAJO
                                {
                                    label: "DESCUBRIMIENTO DIRECTO",
                                    value: {},
                                    type: inputsTypes.SELECT,
                                    name: "descubrimiento_directo",
                                    options: [
                                        {
                                            label: "Si",
                                            value: "Si",
                                        },
                                        {
                                            label: "No",
                                            value: "No",
                                        },
                                    ],
                                    validations: yup
                                        .object()
                                        .when("descubrimiento_directoSelect", {
                                            is: (value) => _.isEmpty(value),
                                            then: yup
                                                .object()
                                                .required(
                                                    "Debes elegir un elemento"
                                                ),
                                        }),
                                    observation: new Observations({
                                        schema,
                                        name: "descubrimiento_directo",
                                        evaluate,
                                    }).observations,
                                },
                            ],
                        },
                    ],
                },
            ],
        },
        // Datos Solicitante-Razon Social
        {
            icon: "M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z",
            bgColorIcon: "bg-blue-500",
            bgColorProgress: "bg-blue-300",
            titleStep: "Solicitante",
            bodyStep: [
                //row elija si es persona o razon social
                {
                    widthResponsive: "lg:flex-row", //flex
                    body: [
                        {
                            title: "Tipo de Solicitante",
                            width: "lg:w-full", //flex
                            columns: "grid-cols-1", //grid
                            columnsResponsive: "lg:grid-cols-1", //inside card
                            img: "/images/laborales.png",
                            inputs: [
                                {
                                    label: "¿Es una Persona o Razon Social?",
                                    value: {},
                                    type: inputsTypes.SELECT,
                                    name: "opcion",
                                    options: [
                                        {
                                            label: "Solicitante (Persona)",
                                            value: "Solicitante (Persona)",
                                        },
                                        {
                                            label: "Razon Social",
                                            value: "Razon Social",
                                        },
                                    ],
                                    validations: yup
                                        .object()
                                        .when("opcionSelect", {
                                            is: (value) => _.isEmpty(value),
                                            then: yup
                                                .object()
                                                .required(
                                                    "Debes elegir un elemento"
                                                ),
                                        }),
                                    observation: new Observations({
                                        schema,
                                        name: "opcion",
                                        evaluate,
                                    }).observations,
                                },
                            ],
                        },
                    ],
                },

                // row 1 Datos Solicitante
                {
                    widthResponsive: "lg:flex-row", //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: "Datos de Solicitante",
                            width: "lg:w-full", //flex
                            columns: "grid-cols-1", //grid
                            columnsResponsive: "lg:grid-cols-3", //inside card
                            img: "/images/laborales.png",
                            inputs: [
                                //NOMBRE
                                {
                                    label: "Nombre",
                                    value: schema.nombre, //nombre_razon_social,
                                    type: inputsTypes.TEXT,
                                    name: "nombre_soli",
                                    // validations: yup
                                    //     .string()
                                    //     .required("Debes completar este campo"),
                                    // observation: new Observations({
                                    //     schema,
                                    //     name: "nombre",
                                    //     evaluate,
                                    // }).observations,
                                },
                                //APELLIDO
                                {
                                    label: "Apellido",
                                    value: schema.apellido, //nombre_razon_social,
                                    type: inputsTypes.TEXT,
                                    name: "apellido_soli",
                                    // validations: yup
                                    //     .string()
                                    //     .required("Debes completar este campo"),
                                    // observation: new Observations({
                                    //     schema,
                                    //     name: "apellido",
                                    //     evaluate,
                                    // }).observations,
                                },
                                //RAZON SOCIAL
                                {
                                    label: "Razon Social",
                                    value: schema.nombrers, //nombre_razon_social,
                                    type: inputsTypes.TEXT,
                                    name: "nombrers_soli",
                                    // validations: yup
                                    //     .string()
                                    //     .required("Debes completar este campo"),
                                    // observation: new Observations({
                                    //     schema,
                                    //     name: "nombrers",
                                    //     evaluate,
                                    // }).observations,
                                },
                                //SEXO
                                {
                                    label: "Sexo",
                                    value: {},
                                    type: inputsTypes.SELECT,
                                    name: "sexo_soli",
                                    options: [
                                        {
                                            label: "Femenino",
                                            value: "Femenino",
                                        },
                                        {
                                            label: "Masculino",
                                            value: "Masculino",
                                        },
                                        {
                                            label: "Sin Sexo",
                                            value: "Sin Sexo",
                                        },
                                    ],
                                    // validations: yup
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
                                },
                                //TIPO DOCUMENTO
                                {
                                    label: "Tipo de Documento",
                                    value: {},
                                    type: inputsTypes.SELECT,
                                    async: true,
                                    //asyncUrl: "/tipo_documento",
                                    isLoading: false,
                                    options: dataForm.tipo_documento,
                                    name: "tipo_documento_soli",
                                    multiple: false,
                                    closeOnSelect: true,
                                    searchable: false,
                                    placeholder: "Selecciona una opción",

                                    validations: yup
                                        .object()
                                        .when("tipo_documento_soliSelect", {
                                            is: (value) =>
                                                _.isEmpty(value) || !value,
                                            then: yup
                                                .object()
                                                .required(
                                                    "Debes elegir un elemento"
                                                )
                                                .nullable(),
                                        }),
                                    observation: new Observations({
                                        schema,
                                        name: "tipo_documento_soli",
                                        evaluate,
                                    }).observations,
                                },
                                //DNI
                                {
                                    label: "DNI",
                                    value: schema.dni,
                                    type: inputsTypes.NUMBER,
                                    name: "dni_soli",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo"),
                                    observation: new Observations({
                                        schema,
                                        name: "dni_soli",
                                        evaluate,
                                    }).observations,
                                },
                                //FECHA DE NACIMIENTO
                                {
                                    label: "Fecha de Nacimiento",
                                    value: schema.fecha_nacimiento,
                                    type: inputsTypes.DATE,
                                    name: "fecha_nacimiento_soli",
                                    // validations: yup
                                    //     .string()
                                    //     .required("Debes completar este campo"),
                                    // observation: new Observations({
                                    //     schema,
                                    //     name: "fecha_nacimiento",
                                    //     evaluate,
                                    // }).observations,
                                },
                                //NACIONALIDAD
                                {
                                    label: "Nacionalidad",
                                    value: schema.nacionalidad,
                                    type: inputsTypes.TEXT,
                                    name: "nacionalidad_soli",
                                    // validations: yup
                                    //     .string()
                                    //     .required("Debes completar este campo"),
                                    // observation: new Observations({
                                    //     schema,
                                    //     name: "nacionalidad",
                                    //     evaluate,
                                    // }).observations,
                                },
                                //PROFESION
                                {
                                    label: "Profesión",
                                    value: schema.profesion,
                                    type: inputsTypes.TEXT,
                                    name: "profesion_soli",
                                    // validations: yup
                                    //     .string()
                                    //     .required("Debes completar este campo"),
                                    // observation: new Observations({
                                    //     schema,
                                    //     name: "profesion",
                                    //     evaluate,
                                    // }).observations,
                                },
                                //ESTADO CIVIL
                                {
                                    label: "Estado Civil",
                                    value: {},
                                    type: inputsTypes.SELECT,
                                    name: "estado_civil_soli",
                                    options: [
                                        {
                                            label: "Sin Estado",
                                            value: "Sin Estado",
                                        },
                                        {
                                            label: "Casado",
                                            value: "Casado",
                                        },
                                        {
                                            label: "Divorsiado",
                                            value: "Divorsiado",
                                        },
                                        {
                                            label: "Soltero",
                                            value: "Soltero",
                                        },
                                    ],
                                    // validations: yup
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
                                },
                            ],
                        },
                    ],
                },

                //row 2 Domicilio legal Solicitante
                {
                    widthResponsive: "lg:flex-row", //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: "Domicilio Legal Solicitante",
                            width: "lg:w-full", //flex
                            columns: "grid-cols-1", //grid
                            columnsResponsive: "lg:grid-cols-1", //inside card
                            img: "/images/laborales.png",
                            inputs: [
                                //DOMICILIO LEGAL
                                {
                                    label: "Domicilio",
                                    value: schema.domicilio,
                                    type: inputsTypes.TEXT,
                                    name: "domicilioLegal_soli",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo"),
                                    observation: new Observations({
                                        schema,
                                        name: "domicilioLegal_soli",
                                        evaluate,
                                    }).observations,
                                },
                            ],
                        },
                    ],
                },

                // row 3 Domicilio legal provincia/dpto/localidad
                {
                    widthResponsive: "lg:flex-row", //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: "Domicilio Legal Solicitante",
                            width: "lg:w-full", //flex
                            columns: "grid-cols-1", //grid
                            columnsResponsive: "lg:grid-cols-3", //inside card
                            img: "/images/laborales.png",
                            inputs: [
                                //PROVINCIA
                                {
                                    label: "Provincia ",
                                    value: {},
                                    type: inputsTypes.SELECT,
                                    // get axios
                                    async: true,
                                    asyncUrl: "/paises/departamentos",
                                    inputDepends: ["departamentoLegal_soli"],
                                    inputClearDepends: [
                                        "departamentoLegal_soli",
                                        "localidadLegal_soli",
                                    ],
                                    // isLoading: false,
                                    options: dataForm.provincia,
                                    name: "provinciaLegal_soli",
                                    multiple: false,
                                    closeOnSelect: true,
                                    searchable: false,
                                    placeholder: "Selecciona una opción",
                                    validations: yup
                                        .object()
                                        .when("provinciaLega_solilSelect", {
                                            is: (value) =>
                                                _.isEmpty(value) || !value,
                                            then: yup
                                                .object()
                                                .required(
                                                    "Debes elegir un elemento"
                                                )
                                                .nullable(),
                                        }),
                                    observation: new Observations({
                                        schema,
                                        name: "provinciaLegal_soli",
                                        evaluate,
                                    }).observations,
                                },

                                //DEPARTAMENTO
                                {
                                    label: "Departamento",
                                    value: {},
                                    type: inputsTypes.SELECT,
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
                                    validations: yup
                                        .object()
                                        .when("departamentoLegal_soliSelect", {
                                            is: (value) =>
                                                _.isEmpty(value) || !value,
                                            then: yup
                                                .object()
                                                .required(
                                                    "Debes elegir un elemento"
                                                )
                                                .nullable(),
                                        }),
                                    observation: new Observations({
                                        schema,
                                        name: "departamentoLegal_soli",
                                        evaluate,
                                    }).observations,
                                },
                                //LOCALIDAD
                                {
                                    label: "Localidad",
                                    value: {},
                                    type: inputsTypes.SELECT,
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
                                    validations: yup
                                        .object()
                                        .when("localidadLegal_soliSelect", {
                                            is: (value) =>
                                                _.isEmpty(value) || !value,
                                            then: yup
                                                .object()
                                                .required(
                                                    "Debes elegir un elemento"
                                                )
                                                .nullable(),
                                        }),
                                    observation: new Observations({
                                        schema,
                                        name: "localidadLegal_soli",
                                        evaluate,
                                    }).observations,
                                },
                            ],
                        },
                    ],
                },

                // row 4 Domicilio Real Solicitante
                {
                    widthResponsive: "lg:flex-row", //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: "Domicilio Real Solicitante",
                            width: "lg:w-full", //flex
                            columns: "grid-cols-1", //grid
                            columnsResponsive: "lg:grid-cols-1", //inside card
                            img: "/images/laborales.png",
                            inputs: [
                                //DOMICILIO LEGAL
                                {
                                    label: "Domicilio",
                                    value: schema.domicilio,
                                    type: inputsTypes.TEXT,
                                    name: "domicilio_soli",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo"),
                                    observation: new Observations({
                                        schema,
                                        name: "domicilio_soli",
                                        evaluate,
                                    }).observations,
                                },
                            ],
                        },
                    ],
                },

                //row 5 Domicilio real provincia/dpto/localidad
                {
                    widthResponsive: "lg:flex-row", //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: "Domicilio Real Solicitante",
                            width: "lg:w-full", //flex
                            columns: "grid-cols-1", //grid
                            columnsResponsive: "lg:grid-cols-3", //inside card
                            img: "/images/laborales.png",
                            inputs: [
                                //PROVINCIA
                                {
                                    label: "Provincia ",
                                    value: {},
                                    type: inputsTypes.SELECT,
                                    // get axios
                                    async: true,
                                    asyncUrl: "/paises/departamentos",
                                    inputDepends: ["departamento_soli"],
                                    inputClearDepends: [
                                        "departamento_soli",
                                        "localidad_soli",
                                    ],
                                    // isLoading: false,
                                    //
                                    options: dataForm.provincia,
                                    name: "provincia_soli",
                                    multiple: false,
                                    closeOnSelect: true,
                                    searchable: false,
                                    placeholder: "Selecciona una opción",
                                    validations: yup
                                        .object()
                                        .when("provincia_soliSelect", {
                                            is: (value) =>
                                                _.isEmpty(value) || !value,
                                            then: yup
                                                .object()
                                                .required(
                                                    "Debes elegir un elemento"
                                                )
                                                .nullable(),
                                        }),
                                    observation: new Observations({
                                        schema,
                                        name: "provincia_soli",
                                        evaluate,
                                    }).observations,
                                },

                                //DEPARTAMENTO
                                {
                                    label: "Departamento",
                                    value: {},
                                    type: inputsTypes.SELECT,
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
                                    validations: yup
                                        .object()
                                        .when("departamento_soliSelect", {
                                            is: (value) =>
                                                _.isEmpty(value) || !value,
                                            then: yup
                                                .object()
                                                .required(
                                                    "Debes elegir un elemento"
                                                )
                                                .nullable(),
                                        }),
                                    observation: new Observations({
                                        schema,
                                        name: "departamento_soli",
                                        evaluate,
                                    }).observations,
                                },
                                //LOCALIDAD
                                {
                                    label: "Localidad",
                                    value: {},
                                    type: inputsTypes.SELECT,
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
                                    validations: yup
                                        .object()
                                        .when("localidad_soliSelect", {
                                            is: (value) =>
                                                _.isEmpty(value) || !value,
                                            then: yup
                                                .object()
                                                .required(
                                                    "Debes elegir un elemento"
                                                )
                                                .nullable(),
                                        }),
                                    observation: new Observations({
                                        schema,
                                        name: "localidad_soli",
                                        evaluate,
                                    }).observations,
                                },
                            ],
                        },
                    ],
                },
            ],
        },

        //Representante Legal
        {
            icon: "M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z",
            bgColorIcon: "bg-blue-500",
            bgColorProgress: "bg-blue-300",
            titleStep: "Representante Legal",
            bodyStep: [
                // row 2 Agregar Una persona Repr.Legal
                {
                    widthResponsive: "lg:flex-row", //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: "Representante Legal",
                            width: "lg:w-full", //flex
                            columns: "grid-cols-1", //grid
                            columnsResponsive: "lg:grid-cols-2", //inside card
                            img: "/images/laborales.png",
                            inputs: [
                                //NOMBRE REPRESENTANTE LEGAL
                                {
                                    label: "Nombre",
                                    value: schema.nombre,
                                    type: inputsTypes.TEXT,
                                    name: "nombre_rl_soli",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo"),
                                    observation: new Observations({
                                        schema,
                                        name: "nombre_rl_soli",
                                        evaluate,
                                    }).observations,
                                },
                                //APELLIDO REPRESENTANTE LEGAL
                                {
                                    label: "Apellido",
                                    value: schema.apellido,
                                    type: inputsTypes.TEXT,
                                    name: "apellido_rl_soli",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo"),
                                    observation: new Observations({
                                        schema,
                                        name: "apellido_rl_soli",
                                        evaluate,
                                    }).observations,
                                },

                                //TIPO DE DOCUMENTO
                                {
                                    label: "Tipo de Documento",
                                    value: {},
                                    type: inputsTypes.SELECT,
                                    async: true,
                                    //asyncUrl: "/tipo_documento",
                                    isLoading: false,
                                    options: dataForm.tipo_documento,
                                    name: "tipo_documento_rl_soli",
                                    multiple: false,
                                    closeOnSelect: true,
                                    searchable: false,
                                    placeholder: "Selecciona una opción",

                                    validations: yup
                                        .object()
                                        .when("tipo_documento_rl_soliSelect", {
                                            is: (value) =>
                                                _.isEmpty(value) || !value,
                                            then: yup
                                                .object()
                                                .required(
                                                    "Debes elegir un elemento"
                                                )
                                                .nullable(),
                                        }),
                                    observation: new Observations({
                                        schema,
                                        name: "tipo_documento_rl_soli",
                                        evaluate,
                                    }).observations,
                                },
                                // DNI
                                {
                                    label: "DNI",
                                    value: schema.dni,
                                    type: inputsTypes.NUMBER,
                                    name: "dni_rl_soli",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo"),
                                    observation: new Observations({
                                        schema,
                                        name: "dni_rl_soli",
                                        evaluate,
                                    }).observations,
                                },
                                //DOMICILIO
                                {
                                    label: "Domicilio",
                                    value: schema.domicilio,
                                    type: inputsTypes.TEXT,
                                    name: "domi_rl_soli",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo"),
                                    observation: new Observations({
                                        schema,
                                        name: "domi_rl_soli",
                                        evaluate,
                                    }).observations,
                                },

                                //SEXO
                                {
                                    label: "Sexo",
                                    value: {},
                                    type: inputsTypes.SELECT,
                                    name: "sexoRL_soli",
                                    options: [
                                        {
                                            label: "Femenino",
                                            value: "Femenino",
                                        },
                                        {
                                            label: "Masculino",
                                            value: "Masculino",
                                        },
                                        {
                                            label: "Otros",
                                            value: "Otros",
                                        },
                                    ],
                                    validations: yup
                                        .object()
                                        .when("sexoRL_soliSelect", {
                                            is: (value) => _.isEmpty(value),
                                            then: yup
                                                .object()
                                                .required(
                                                    "Debes elegir un elemento"
                                                ),
                                        }),
                                    observation: new Observations({
                                        schema,
                                        name: "sexoRL_soli",
                                        evaluate,
                                    }).observations,
                                },
                            ],
                        },
                    ],
                },
            ],
        },
    ];
}
