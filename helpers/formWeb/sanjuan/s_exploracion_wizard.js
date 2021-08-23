import * as yup from "yup";
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
                            title: "Solicitud",
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

                                //PLAZO SOLICITADO
                                {
                                    label: "PLAZO SOLICITADO (días)",
                                    value: schema.plazo_soli,
                                    type: inputsTypes.TEXT,
                                    name: "plazo_soli",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo"),
                                    observation: new Observations({
                                        schema,
                                        name: "plazo_soli",
                                        evaluate,
                                    }).observations,
                                },

                                //PERIODO DE TRABAJO
                                {
                                    label: "PERIODO DE TRABAJO",
                                    value: {},
                                    type: inputsTypes.SELECT,
                                    name: "periodo",
                                    options: [
                                        {
                                            label: "Todo el Año",
                                            value: "Todo el Año",
                                        },
                                        {
                                            label: "Meses",
                                            value: "Meses",
                                        },
                                        {
                                            label: "Días",
                                            value: "Días",
                                        },
                                    ],
                                    validations: yup
                                        .object()
                                        .when("periodoSelect", {
                                            is: (value) => _.isEmpty(value),
                                            then: yup
                                                .object()
                                                .required(
                                                    "Debes elegir un elemento"
                                                ),
                                        }),
                                    observation: new Observations({
                                        schema,
                                        name: "periodo",
                                        evaluate,
                                    }).observations,
                                },
                                //PROGRAMA MINIMO DE TRABAJO
                                {
                                    label: "ADJUNTA PROG. MINIMO DE TRABAJO",
                                    value: {},
                                    type: inputsTypes.SELECT,
                                    name: "programa_adjunto",
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
                                        .when("programa_adjuntoSelect", {
                                            is: (value) => _.isEmpty(value),
                                            then: yup
                                                .object()
                                                .required(
                                                    "Debes elegir un elemento"
                                                ),
                                        }),
                                    observation: new Observations({
                                        schema,
                                        name: "programa_adjunto",
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
                                    name: "nombre",
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
                                    name: "apellido",
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
                                    name: "nombrers",
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
                                    name: "sexo",
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
                                    name: "tipo_documento",
                                    multiple: false,
                                    closeOnSelect: true,
                                    searchable: false,
                                    placeholder: "Selecciona una opción",

                                    validations: yup
                                        .object()
                                        .when("tipo_documentoSelect", {
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
                                        name: "tipo_documento",
                                        evaluate,
                                    }).observations,
                                },

                                //DNI
                                {
                                    label: "DNI",
                                    value: schema.dni,
                                    type: inputsTypes.NUMBER,
                                    name: "dni",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo"),
                                    observation: new Observations({
                                        schema,
                                        name: "dni",
                                        evaluate,
                                    }).observations,
                                },
                                //FECHA DE NACIMIENTO
                                {
                                    label: "Fecha de Nacimiento",
                                    value: schema.fecha_nacimiento,
                                    type: inputsTypes.DATE,
                                    name: "fecha_nacimiento",
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
                                    name: "nacionalidad",
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
                                    name: "profesion",
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
                                    name: "estado_civil",
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
                                    name: "domicilioLegal",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo"),
                                    observation: new Observations({
                                        schema,
                                        name: "domicilioLegal",
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
                                    inputDepends: ["departamentoLegal"],
                                    inputClearDepends: [
                                        "departamentoLegal",
                                        "localidadLegal",
                                    ],
                                    // isLoading: false,
                                    options: dataForm.provincia,
                                    name: "provinciaLegal",
                                    multiple: false,
                                    closeOnSelect: true,
                                    searchable: false,
                                    placeholder: "Selecciona una opción",
                                    validations: yup
                                        .object()
                                        .when("provinciaLegalSelect", {
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
                                        name: "provinciaLegal",
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
                                    validations: yup
                                        .object()
                                        .when("departamentoLegalSelect", {
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
                                        name: "departamentoLegal",
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
                                    name: "localidadLegal",
                                    multiple: false,
                                    closeOnSelect: true,
                                    searchable: false,
                                    placeholder: "Selecciona una opción",
                                    validations: yup
                                        .object()
                                        .when("localidadLegalSelect", {
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
                                        name: "localidadLegal",
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
                                    name: "domicilio",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo"),
                                    observation: new Observations({
                                        schema,
                                        name: "domicilio",
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
                                    inputDepends: ["departamento"],
                                    inputClearDepends: [
                                        "departamento",
                                        "localidad",
                                    ],
                                    // isLoading: false,
                                    //
                                    options: dataForm.provincia,
                                    name: "provincia",
                                    multiple: false,
                                    closeOnSelect: true,
                                    searchable: false,
                                    placeholder: "Selecciona una opción",
                                    validations: yup
                                        .object()
                                        .when("provinciaSelect", {
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
                                        name: "provincia",
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
                                    validations: yup
                                        .object()
                                        .when("departamentoSelect", {
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
                                        name: "departamento",
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
                                    name: "localidad",
                                    multiple: false,
                                    closeOnSelect: true,
                                    searchable: false,
                                    placeholder: "Selecciona una opción",
                                    validations: yup
                                        .object()
                                        .when("localidadSelect", {
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
                                        name: "localidad",
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
                                    name: "nombre_rl",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo"),
                                    observation: new Observations({
                                        schema,
                                        name: "nombre_rl",
                                        evaluate,
                                    }).observations,
                                },
                                //APELLIDO REPRESENTANTE LEGAL
                                {
                                    label: "Apellido",
                                    value: schema.apellido,
                                    type: inputsTypes.TEXT,
                                    name: "apellido_rl",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo"),
                                    observation: new Observations({
                                        schema,
                                        name: "apellido_rl",
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
                                    name: "tipo_documento_rl",
                                    multiple: false,
                                    closeOnSelect: true,
                                    searchable: false,
                                    placeholder: "Selecciona una opción",

                                    validations: yup
                                        .object()
                                        .when("tipo_documento_rlSelect", {
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
                                        name: "tipo_documento_rl",
                                        evaluate,
                                    }).observations,
                                },
                                // DNI
                                {
                                    label: "DNI",
                                    value: schema.dni,
                                    type: inputsTypes.NUMBER,
                                    name: "dni_rl",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo"),
                                    observation: new Observations({
                                        schema,
                                        name: "dni_rl",
                                        evaluate,
                                    }).observations,
                                },
                                //DOMICILIO
                                {
                                    label: "Domicilio",
                                    value: schema.domicilio,
                                    type: inputsTypes.TEXT,
                                    name: "domi_rl",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo"),
                                    observation: new Observations({
                                        schema,
                                        name: "domi_rl",
                                        evaluate,
                                    }).observations,
                                },

                                //SEXO
                                {
                                    label: "Sexo",
                                    value: {},
                                    type: inputsTypes.SELECT,
                                    name: "sexoRL",
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
                                        .when("sexoSelect", {
                                            is: (value) => _.isEmpty(value),
                                            then: yup
                                                .object()
                                                .required(
                                                    "Debes elegir un elemento"
                                                ),
                                        }),
                                    observation: new Observations({
                                        schema,
                                        name: "sexoRL",
                                        evaluate,
                                    }).observations,
                                },
                            ],
                        },
                    ],
                },
            ],
        },

        // Coordenadass GaussKruger / Categoria Mineral
        {
            icon: "M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z",
            bgColorIcon: "bg-blue-500",
            bgColorProgress: "bg-blue-300",
            titleStep: "Coordenadass GaussKruger Y Matricula Catastral",
            bodyStep: [
                //row categoria y mineral
                {
                    widthResponsive: "flex-row", //flex
                    body: [
                        //  col 1
                        {
                            title: "Categoria Mineral",
                            width: "", //flex
                            columns: "grid-cols-2", //grid
                            columnsResponsive: "", //inside card
                            img: "/images/laborales.png",
                            inputs: [
                                //CATEGORIA
                                {
                                    label: "CATEGORIA",
                                    value: {},
                                    type: inputsTypes.SELECT,
                                    name: "categoria",
                                    options: [
                                        {
                                            label: "Primera",
                                            value: "Primera",
                                        },
                                        {
                                            label: "Segunda",
                                            value: "Segunda",
                                        },
                                    ],
                                    validations: yup
                                        .object()
                                        .when("categoriaSelect", {
                                            is: (value) => _.isEmpty(value),
                                            then: yup
                                                .object()
                                                .required(
                                                    "Debes elegir un elemento"
                                                ),
                                        }),
                                    observation: new Observations({
                                        schema,
                                        name: "categoria",
                                        evaluate,
                                    }).observations,
                                },
                                //MINERAL

                                {
                                    label: "Mineral",
                                    value: {},
                                    type: inputsTypes.SELECT,
                                    async: true,

                                    isLoading: false,
                                    options: dataForm.mineral,
                                    name: "mineral",
                                    multiple: false,
                                    closeOnSelect: true,
                                    searchable: false,
                                    placeholder: "Selecciona una opción",

                                    validations: yup
                                        .object()
                                        .when("mineralSelect", {
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
                                        name: "mineral",
                                        evaluate,
                                    }).observations,
                                },

                                // ESTADO TERRENO
                                {
                                    label: "ESTADO TERRENO",
                                    value: {},
                                    type: inputsTypes.SELECT,
                                    async: true,
                                    isLoading: false,
                                    options: dataForm.estado_terreno,
                                    name: "estado_terreno",
                                    multiple: false,
                                    closeOnSelect: true,
                                    searchable: false,
                                    placeholder: "Selecciona una opción",

                                    validations: yup
                                        .object()
                                        .when("estado_terrenoSelect", {
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
                                        name: "estado_terreno",
                                        evaluate,
                                    }).observations,
                                },

                                //SUPERFICIE HECTARIAS
                                {
                                    label: "SUP. HECTARIAS",
                                    value: schema.sup_hectarias,
                                    type: inputsTypes.TEXT,
                                    name: "sup_hectarias",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo"),
                                    observation: new Observations({
                                        schema,
                                        name: "sup_hectarias",
                                        evaluate,
                                    }).observations,
                                },
                            ],
                        },
                    ],
                },

                //Row Matricula Catastral
                {
                    widthResponsive: "flex-row", //flex
                    body: [
                        //  col 1
                        {
                            title: "Matricula Catastral",
                            width: "", //flex
                            columns: "grid-cols-2", //grid
                            columnsResponsive: "", //inside card
                            img: "/images/laborales.png",
                            inputs: [
                                //NE_X
                                {
                                    label: "NE_X",
                                    value: schema.ne_x,
                                    type: inputsTypes.TEXT,
                                    name: "ne_x",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo"),
                                    observation: new Observations({
                                        schema,
                                        name: "ne_x",
                                        evaluate,
                                    }).observations,
                                },
                                //NE_Y
                                {
                                    label: "NE_Y",
                                    value: schema.ne_y,
                                    type: inputsTypes.TEXT,
                                    name: "ne_y",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo"),
                                    observation: new Observations({
                                        schema,
                                        name: "ne_y",
                                        evaluate,
                                    }).observations,
                                },

                                //SO_X
                                {
                                    label: "SO_X",
                                    value: schema.so_x,
                                    type: inputsTypes.TEXT,
                                    name: "so_x",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo"),
                                    observation: new Observations({
                                        schema,
                                        name: "so_x",
                                        evaluate,
                                    }).observations,
                                },

                                //SO_Y
                                {
                                    label: "SO_Y",
                                    value: schema.so_y,
                                    type: inputsTypes.TEXT,
                                    name: "so_y",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo"),
                                    observation: new Observations({
                                        schema,
                                        name: "so_y",
                                        evaluate,
                                    }).observations,
                                },
                            ],
                        },
                    ],
                },

                //row Coordenadas GaussKruger
                {
                    widthResponsive: "flex-row", //flex
                    body: [
                        //  col 1
                        {
                            title: "Coordenadass GaussKruger",
                            width: "", //flex
                            columns: "grid-cols-1", //grid
                            columnsResponsive: "", //inside card
                            img: "/images/laborales.png",
                            inputs: [
                                {
                                    label: "",
                                    type: inputsTypes.LIST,
                                    name: "List",
                                    // columns: 'grid-cols-1',
                                    // colSpans + 1
                                    // columnsResponsive: 'lg:w-2/5',
                                    childrens: [
                                        // default value,
                                        [
                                            {
                                                name: "x",
                                                value: null,
                                            },
                                            {
                                                name: "y",
                                                value: null,
                                            },
                                        ],
                                    ],

                                    elements: [
                                        [
                                            //LABEL X
                                            {
                                                label: "X",
                                                value: schema.y,
                                                type: inputsTypes.TEXT,
                                                colSpan: "lg:w-2/5",
                                                name: "x",
                                                multiple: false,
                                                closeOnSelect: true,
                                                searchable: false,
                                                validations: yup
                                                    .string()
                                                    .required(
                                                        "Debes completar este campo"
                                                    ),
                                                observation: new Observations({
                                                    schema,
                                                    name: "x",
                                                    evaluate,
                                                }).observations,

                                                // validations: yup.object().when('sustanceSelect', {
                                                //     is: value => _.isEmpty(value),
                                                //     then: yup.object().required('Debes elegir un elemento')
                                                // }),
                                                //placeholder: 'Selecciona una opción',
                                            },
                                            //LABEL Y
                                            {
                                                label: "Y",
                                                value: schema.y,
                                                type: inputsTypes.TEXT,
                                                colSpan: "lg:w-2/5",
                                                name: "y",
                                                multiple: false,
                                                closeOnSelect: true,
                                                searchable: false,
                                                validations: yup
                                                    .string()
                                                    .required(
                                                        "Debes completar este campo"
                                                    ),
                                                observation: new Observations({
                                                    schema,
                                                    name: "y",
                                                    evaluate,
                                                }).observations,
                                                // validations: yup.object().when('mineralSelect', {
                                                //     is: value => _.isEmpty(value),
                                                //     then: yup.object().required('Debes elegir un elemento')
                                                // }),
                                                // placeholder: 'Selecciona una opción',
                                            },

                                            {
                                                colSpan: "lg:w-5/5",
                                                observation: new Observations({
                                                    schema,
                                                    name: "row-",
                                                    evaluate,
                                                }).observations,
                                            },
                                        ],
                                    ],
                                    validations: yup
                                        .array()
                                        .of(
                                            yup.object().shape({
                                                // sustanceSelect: yup.object().when('sustance', {
                                                //     is: value => _.isEmpty(value),
                                                //     then: yup.object().required('Debes elegir un elemento').nullable()
                                                // }),

                                                // mineralSelect: yup.object().when('mineral', {
                                                //     is: value => _.isEmpty(value),
                                                //     then: yup.object().required('Debes elegir un elemento').nullable()
                                                // }),

                                                x: yup
                                                    .string()
                                                    .required(
                                                        "Debes ingresar una coordenada"
                                                    ),
                                                y: yup
                                                    .string()
                                                    .required(
                                                        "Debes ingresaruna coordenada"
                                                    ),
                                            })
                                        )
                                        .strict(),
                                },
                            ],
                        },
                    ],
                },
            ],
        },

        //Datos Propietario
        {
            icon: "M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z",
            bgColorIcon: "bg-blue-500",
            bgColorProgress: "bg-blue-300",
            titleStep: "Datos Propietario",
            bodyStep: [
                {
                    widthResponsive: "lg:flex-row", //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: "Propietario",
                            width: "lg:w-full", //flex
                            columns: "grid-cols-3", //grid
                            columnsResponsive: "lg:grid-cols-2", //inside card
                            img: "/images/laborales.png",
                            inputs: [
                                //NOMBRE
                                {
                                    label: "Nombre",
                                    value: schema.nombre, //nombre_razon_social,

                                    type: inputsTypes.TEXT,
                                    name: "nombre_prop",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo"),
                                    observation: new Observations({
                                        schema,
                                        name: "nombre_prop",
                                        evaluate,
                                    }).observations,
                                },
                                //APELLIDO
                                {
                                    label: "Apellido",
                                    value: schema.apellido_prop, //nombre_razon_social,
                                    type: inputsTypes.TEXT,
                                    name: "apellido_prop",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo"),
                                    observation: new Observations({
                                        schema,
                                        name: "apellido_prop",
                                        evaluate,
                                    }).observations,
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
                                    name: "tipo_documento",
                                    multiple: false,
                                    closeOnSelect: true,
                                    searchable: false,
                                    placeholder: "Selecciona una opción",

                                    validations: yup
                                        .object()
                                        .when("tipo_documentoSelect", {
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
                                        name: "tipo_documento",
                                        evaluate,
                                    }).observations,
                                },

                                //DNI
                                {
                                    label: "DNI",
                                    value: schema.dni_prop,
                                    type: inputsTypes.NUMBER,
                                    name: "dni_prop",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo"),
                                    observation: new Observations({
                                        schema,
                                        name: "dni_prop",
                                        evaluate,
                                    }).observations,
                                },

                                //PROVINCIA
                                {
                                    label: "Provincia",
                                    value: {},
                                    type: inputsTypes.SELECT,
                                    // get axios
                                    async: true,
                                    asyncUrl: "/paises/departamentos",
                                    inputDepends: ["departamento"],
                                    inputClearDepends: [
                                        "departamento",
                                        "localidad",
                                    ],
                                    // isLoading: false,
                                    //
                                    options: dataForm.provincia,
                                    name: "prov_prop",
                                    multiple: false,
                                    closeOnSelect: true,
                                    searchable: false,
                                    placeholder: "Selecciona una opción",
                                    validations: yup
                                        .object()
                                        .when("prov_propSelect", {
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
                                        name: "prov_prop",
                                        evaluate,
                                    }).observations,
                                },

                                //DOMICILIO
                                {
                                    label: "Domicilio",
                                    value: schema.domi_prop,
                                    type: inputsTypes.TEXT,
                                    name: "domi_prop",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo"),
                                    observation: new Observations({
                                        schema,
                                        name: "domi_prop",
                                        evaluate,
                                    }).observations,
                                },
                            ],
                        },
                    ],
                },
            ],
        },

        //Declaracion Jurada y Informe Registro Catastral
        {
            icon: "M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z",
            bgColorIcon: "bg-blue-500",
            bgColorProgress: "bg-blue-300",
            titleStep: "Declaracion Jurada y Informe Registro Catastral",
            bodyStep: [
                // row 1 carga de codumentacion
                {
                    widthResponsive: "lg:flex-row", //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: "CARGA DE DOCUMENTACIÓN",
                            width: "lg:w-full", //flex
                            columns: "grid-cols-1", //grid
                            columnsResponsive: "lg:grid-cols-2", //inside card
                            img: "/images/laborales.png",
                            inputs: [
                                // DECLARACIÓN JURADA
                                {
                                    label: "DECLARACIÓN JURADA",
                                    value: schema.declaracion,
                                    type: inputsTypes.FILE,
                                    name: "declaracion",
                                    accept: [fileAccept.PDF.value],
                                    acceptLabel: `Archivos admitidos: ${[
                                        fileAccept.PDF.label,
                                    ].join()}`,
                                    maxSize: "Tamaño maximo por archivo: 10MB",
                                    multiple: false,
                                    validations: yup
                                        .array()
                                        .min(
                                            1,
                                            "Debes adjuntar al menos un elemento"
                                        )
                                        .default([])
                                        .max(
                                            1,
                                            "Solo puedes adjuntar hasta 1 archivo"
                                        )
                                        .test({
                                            name: "CUIT_SIZE",
                                            exclusive: true,
                                            message:
                                                "Recuerda que cada archivo no debe superar los 10MB",
                                            test: (value) => {
                                                if (!value) return true;
                                                let validation = true;
                                                for (
                                                    let index = 0;
                                                    index < value.length;
                                                    index++
                                                ) {
                                                    const element =
                                                        value[index];
                                                    validation =
                                                        validation &&
                                                        element.size <=
                                                            10000000; // 10MB
                                                }
                                                return validation;
                                                // !value || (value && value.size <= 10)
                                            },
                                        })
                                        .test({
                                            name: "CUIT_FILE_FORMAT",
                                            exclusive: true,
                                            message:
                                                "Hay archivos con extensiones no válidas",
                                            test: (value) => {
                                                if (!value) return true;
                                                let validation = true;
                                                for (
                                                    let index = 0;
                                                    index < value.length;
                                                    index++
                                                ) {
                                                    const element =
                                                        value[index];
                                                    validation =
                                                        validation &&
                                                        [
                                                            ...fileAccept.PDF
                                                                .value,
                                                        ].includes(
                                                            element.type
                                                        );
                                                }
                                                return validation;
                                                // return !value || (value && [fileAccept.PDF.value].includes(value.type))
                                            },
                                        }),

                                    observation: new Observations({
                                        schema,
                                        name: "declaracion",
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
