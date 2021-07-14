<<<<<<< HEAD
import * as yup from 'yup';
import Observations from './observaciones';
import inputsTypes from '../../enums/inputsTypes';
import fileAccept from '../../enums/fileAccept';
=======
import * as yup from "yup";
// import Observations from './observaciones';
// import inputsTypes from '../../enums/inputsTypes';
// import fileAccept from '../../enums/fileAccept';
import Observations from "./observaciones";
import inputsTypes from "../../enums/inputsTypes";
import fileAccept from "../../enums/fileAccept";
>>>>>>> fa9c44ce57b85f81e29c4681475b450468ac2e5d

export function getFormSchema({ ...schema }, evaluate, dataForm) {
    // name => unique
    // icons => https://heroicons.com/ => svg d=""
    return [
        //Datos Solicitante
        {
<<<<<<< HEAD
            icon: 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
            bgColorIcon: 'bg-blue-500',
            bgColorProgress: 'bg-blue-300',
            titleStep: 'Solicitante',
=======
            icon: "M19 10h2a1 1 0 0 1 0 2h-2v2a1 1 0 0 1-2 0v-2h-2a1 1 0 0 1 0-2h2V8a1 1 0 0 1 2 0v2zM9 12A5 5 0 1 1 9 2a5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm8 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H7a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h5a5 5 0 0 1 5 5v2z",
            bgColorIcon: "bg-blue-500",
            bgColorProgress: "bg-blue-300",
            titleStep: "SOLICITANTE",
>>>>>>> fa9c44ce57b85f81e29c4681475b450468ac2e5d
            bodyStep: [
                // row 1
                {
                    widthResponsive: "lg:flex-row", //flex
                    // columns
                    body: [
                        //  col 1
                        {
<<<<<<< HEAD
                            title: 'Datos Personales',
                            width: 'lg:w-full', //flex
                            columns: 'grid-cols-1', //grid
                            columnsResponsive: 'lg:grid-cols-3', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                //nombre
                                {
                                    label: 'Nombre',
                                    value: schema.nombre,
                                    type: inputsTypes.TEXT,
                                    name: 'nombre',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'nombre', evaluate}).observations

=======
                            title: "Datos de Solicitante",
                            width: "lg:w-full", //flex
                            columns: "grid-cols-1", //grid
                            columnsResponsive: "lg:grid-cols-3", //inside card
                            img: "/images/laborales.png",
                            inputs: [
                                // {
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
                                    value: schema.dni, //nombre_razon_social,
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
                                {
                                    label: "Apellidos",
                                    value: schema.apellidos, //nombre_razon_social,
                                    type: inputsTypes.TEXT,
                                    name: "apellidos",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo"),
                                    observation: new Observations({
                                        schema,
                                        name: "apellidos",
                                        evaluate,
                                    }).observations,
                                },
                                {
                                    label: "Nombres",
                                    value: schema.apellidos, //nombre_razon_social,
                                    type: inputsTypes.TEXT,
                                    name: "nombres",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo"),
                                    observation: new Observations({
                                        schema,
                                        name: "nombres",
                                        evaluate,
                                    }).observations,
                                },
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
                                // {
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
                            ],
                        },
                    ],
                },
            ],
        },
        {
            icon: "M19 10h2a1 1 0 0 1 0 2h-2v2a1 1 0 0 1-2 0v-2h-2a1 1 0 0 1 0-2h2V8a1 1 0 0 1 2 0v2zM9 12A5 5 0 1 1 9 2a5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm8 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H7a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h5a5 5 0 0 1 5 5v2z",
            bgColorIcon: "bg-blue-500",
            bgColorProgress: "bg-blue-300",
            titleStep: "REPRESENTANTE LEGAL",
            bodyStep: [
                // row 1
                {
                    widthResponsive: "lg:flex-row", //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: "Datos Persona",
                            width: "lg:w-full", //flex
                            columns: "grid-cols-1", //grid
                            columnsResponsive: "lg:grid-cols-2", //inside card
                            img: "/images/laborales.png",
                            inputs: [
                                {
                                    label: "Email",
                                    value: schema.email,
                                    type: inputsTypes.EMAIL,
                                    name: "email",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo")
                                        .email(
                                            "El formato ingresado no es válido"
                                        ),
                                    observation: new Observations({
                                        schema,
                                        name: "email",
                                        evaluate,
                                    }).observations,
>>>>>>> fa9c44ce57b85f81e29c4681475b450468ac2e5d
                                },
                                //apellido
                                {
<<<<<<< HEAD
                                    label: 'Apellido',
                                    value: schema.apellido,
                                    type: inputsTypes.TEXT,
                                    name: 'apellido',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'apellido', evaluate}).observations

=======
                                    label: "Contraseña",
                                    value: schema.password,
                                    type: inputsTypes.PASSWORD,
                                    name: "password",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo")
                                        .min(
                                            8,
                                            "Debes ingresar al menos 8 caracteres"
                                        ),
                                    observation: new Observations({
                                        schema,
                                        name: "password",
                                        evaluate,
                                    }).observations,
>>>>>>> fa9c44ce57b85f81e29c4681475b450468ac2e5d
                                },
                                //sexo
                                {
<<<<<<< HEAD
                                    label: 'Sexo',
                                    value: schema.sexo,
                                    type: inputsTypes.TEXT,
                                    name: 'sexo',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'sexo', evaluate}).observations

=======
                                    label: "Confirmar contraseña",
                                    value: schema.repeatPassword,
                                    type: inputsTypes.PASSWORD,
                                    name: "repeatPassword",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo")
                                        .oneOf(
                                            [yup.ref("password")],
                                            "Las contraseñas deben ser iguales"
                                        ),
                                    observation: new Observations({
                                        schema,
                                        name: "repeatPassword",
                                        evaluate,
                                    }).observations,
>>>>>>> fa9c44ce57b85f81e29c4681475b450468ac2e5d
                                },
                                //tipo de dni
                                {
<<<<<<< HEAD
                                    label: 'Tipo de DNI',
                                    value: schema.tipo_dni,
                                    type: inputsTypes.SELECT, 
                                    placeholder: 'Selecciona una opción',                                  
                                    options:[
                                        {
                                            label: 'Documento Unico',
                                            value: 'documento_unico',
                                        },
                                        {
                                            label: 'Pasaporte',
                                            value: 'Pasaporte',
                                        }
                                    ],                                    
                                    name: 'tipo_dni',
                                   // validations: yup.string().required('Debes completar este campo'),
                                   // observation: new Observations({schema, name: 'tipo_dni', evaluate}).observations
                                    
                                },
                                //numero de dni
                                {
                                    label: 'Numero de Documento',
                                    value: schema.numero_dni,
                                    type: inputsTypes.TEXT,
                                    // type: inputsTypes.SELECT,
                                    name: 'numero_dni',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'tipo_dni', evaluate}).observations

=======
                                    label: "Nombre o razón social",
                                    value: schema.nombre_razon_social,
                                    type: inputsTypes.TEXT,
                                    name: "nombre_razon_social",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo"),
                                    observation: new Observations({
                                        schema,
                                        name: "nombre_razon_social",
                                        evaluate,
                                    }).observations,
>>>>>>> fa9c44ce57b85f81e29c4681475b450468ac2e5d
                                },
                                
                                                            
                               
                               //fecha de nacimiento
                                {
<<<<<<< HEAD
                                    label: 'Fecha de Nacimiento',
                                    value: schema.fecha_nacimiento,
                                    type: inputsTypes.DATE,
                                    name: 'fecha_nacimiento',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'fecha_nacimiento', evaluate}).observations

=======
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
>>>>>>> fa9c44ce57b85f81e29c4681475b450468ac2e5d
                                },
                                //nacionalidad
                                {
<<<<<<< HEAD
                                    label: 'Nacionalidad',
                                    value: schema.nacionalidad,
                                    type: inputsTypes.TEXT,
                                    name: 'nacionalidad',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'nacionalidad', evaluate}).observations

=======
                                    label: "Nombre de la mina, cantera, explotación y/o establecimiento",
                                    value: schema.nombre_mina,
                                    type: inputsTypes.TEXT,
                                    name: "nombre_mina",
                                    validations: yup
                                        .string()
                                        .required("Debes completar este campo"),
                                    observation: new Observations({
                                        schema,
                                        name: "nombre_mina",
                                        evaluate,
                                    }).observations,
>>>>>>> fa9c44ce57b85f81e29c4681475b450468ac2e5d
                                },
                                //Estado Civil
                                {
<<<<<<< HEAD
                                    label: 'Estado Civil',
                                    value: schema.estado_civil,
                                    type: inputsTypes.SELECT,
                                    name: 'estado_civil',
                                     options:[
                                        {
                                            label: 'Soltero',
                                            value: 'Soltero',
                                        },
                                        {
                                            label: 'Casado',
                                            value: 'Casado',
                                        },
                                        {
                                            label: 'Divorsiado',
                                            value: 'Divorsiado',
                                        }
                                    ],
                                    // validations: yup.string().required('Debes completar este campo'),
                                    // observation: new Observations({schema, name: 'estado_civil', evaluate}).observations

=======
                                    // inputColsSpan: 'lg:col-span-2',
                                    label: "Certificado de inscripción en AFIP (CUIT)",
                                    value: schema.cuit,
                                    type: inputsTypes.FILE,
                                    name: "cuit",
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
                                        name: "cuit",
                                        evaluate,
                                    }).observations,
>>>>>>> fa9c44ce57b85f81e29c4681475b450468ac2e5d
                                },
                                //profesion
                                {
<<<<<<< HEAD
                                    label: 'Profesión',
                                    value: schema.profesion,
                                    type: inputsTypes.TEXT,
                                    name: 'profesion',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'profesion', evaluate}).observations

                                }, 
                            ]
=======
                                    // inputColsSpan: 'lg:col-span-2',
                                    label: "Copia escritura del inmueble",
                                    helpInfo:
                                        "Si la posesión es veinteñal se debe acompañar con el certificado correspondiente",
                                    value: schema.escritura,
                                    type: inputsTypes.FILE,
                                    name: "escritura",
                                    accept: [
                                        fileAccept.PDF.value,
                                        fileAccept.IMAGE.value,
                                    ],
                                    acceptLabel: `Archivos admitidos: ${[
                                        fileAccept.PDF.label,
                                        fileAccept.IMAGE.label,
                                    ].join()}`,
                                    maxSize: "Tamaño maximo por archivo: 10MB",
                                    multiple: true,
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
                                            name: "ESCRITURA_FILE_SIZE",
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
                                            name: "ESCRITURA_FILE_FORMAT",
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
                                                            ...fileAccept.IMAGE
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
                                        name: "escritura",
                                        evaluate,
                                    }).observations,
                                },
                            ],
>>>>>>> fa9c44ce57b85f81e29c4681475b450468ac2e5d
                        },
                    ],
                },
            ],
        },

<<<<<<< HEAD
        //Datos Representante Legal
        {
            icon: 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
            bgColorIcon: 'bg-blue-500',
            bgColorProgress: 'bg-blue-300',
            titleStep: 'R.L',
=======
        {
            icon: "M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z",
            bgColorIcon: "bg-blue-500",
            bgColorProgress: "bg-blue-300",
            titleStep: "UBICACIÓN DE LA SOLICITUD",
>>>>>>> fa9c44ce57b85f81e29c4681475b450468ac2e5d
            bodyStep: [
                {
                    widthResponsive: "flex-row", //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: "Sustancias minerales que insuatralizan",
                            width: "", //flex
                            columns: "grid-cols-1", //grid
                            columnsResponsive: "", //inside card
                            img: "/images/laborales.png",
                            inputs: [
                                {
                                    label: "List",
                                    type: inputsTypes.LIST,
                                    name: "List",
                                    // columns: 'grid-cols-1',
                                    // colSpans + 1
                                    // columnsResponsive: 'lg:w-2/5',
                                    childrens: [
                                        // default value,
                                        [
                                            {
                                                name: "sustanceSelect",
                                                value: null,
                                            },
                                            {
                                                name: "mineralSelect",
                                                value: null,
                                            },
                                            {
                                                name: "dni",
                                                value: null,
                                            },
                                        ],
                                    ],
                                    elements: [
                                        [
                                            {
                                                label: "Sustancia",
                                                value: {},
                                                type: inputsTypes.SELECT,
                                                colSpan: "lg:w-2/5",
                                                options: [
                                                    {
                                                        label: "Sustancias de aprovechamiento común",
                                                        value: "aprovechamiento_comun",
                                                    },
                                                    {
                                                        label: "Sustancias que se conceden preferentemente al dueño del suelo",
                                                        value: "conceden_preferentemente",
                                                    },
                                                ],
                                                name: "sustanceSelect",
                                                multiple: false,
                                                closeOnSelect: true,
                                                searchable: false,
                                                inputDepends: ["mineralSelect"],
                                                optionsDepends: {
                                                    aprovechamiento_comun: [
                                                        {
                                                            label: "Arenas Metalíferas",
                                                            value: "Arenas Metalíferas",
                                                        },
                                                        {
                                                            label: "Piedras Preciosas",
                                                            value: "Piedras Preciosas",
                                                        },
                                                        {
                                                            label: "Desmontes",
                                                            value: "Desmontes",
                                                        },
                                                        {
                                                            label: "Relaves",
                                                            value: "Relaves",
                                                        },
                                                        {
                                                            label: "Escoriales",
                                                            value: "Escoriales",
                                                        },
                                                    ],
                                                    conceden_preferentemente: [
                                                        {
                                                            label: "Salitres",
                                                            value: "Salitres",
                                                        },
                                                        {
                                                            label: "Salinas",
                                                            value: "Salinas",
                                                        },
                                                        {
                                                            label: "Turberas",
                                                            value: "Turberas",
                                                        },
                                                        {
                                                            label: "Metales no comprendidos en 1° Categ.",
                                                            value: "Metales no comprendidos en 1° Categ.",
                                                        },
                                                        {
                                                            label: "Abrasivos",
                                                            value: "Abrasivos",
                                                        },
                                                        {
                                                            label: "Ocres",
                                                            value: "Ocres",
                                                        },
                                                        {
                                                            label: "Resinas",
                                                            value: "Resinas",
                                                        },
                                                        {
                                                            label: "Esteatitas",
                                                            value: "Esteatitas",
                                                        },
                                                        {
                                                            label: "Baritina",
                                                            value: "Baritina",
                                                        },
                                                        {
                                                            label: "Caparrosas",
                                                            value: "Caparrosas",
                                                        },
                                                        {
                                                            label: "Grafito",
                                                            value: "Grafito",
                                                        },
                                                        {
                                                            label: "Caolí­n",
                                                            value: "Caolí­n",
                                                        },
                                                        {
                                                            label: "Sales Alcalinas o Alcalino Terrosas",
                                                            value: "Sales Alcalinas o Alcalino Terrosas",
                                                        },
                                                        {
                                                            label: "Amianto",
                                                            value: "Amianto",
                                                        },
                                                        {
                                                            label: "Bentonita",
                                                            value: "Bentonita",
                                                        },
                                                        {
                                                            label: "Zeolitas o Minerales Permutantes o Permutíticos",
                                                            value: "Zeolitas o Minerales Permutantes o Permutíticos",
                                                        },
                                                    ],
                                                },
                                                // validations: yup.object().when('sustanceSelect', {
                                                //     is: value => _.isEmpty(value),
                                                //     then: yup.object().required('Debes elegir un elemento')
                                                // }),
                                                placeholder:
                                                    "Selecciona una opción",
                                            },
                                            {
                                                label: "Mineral Explotado",
                                                value: {},
                                                type: inputsTypes.SELECT,
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
                                                placeholder:
                                                    "Selecciona una opción",
                                            },
                                            {
                                                label: "DNI",
                                                value: schema.dni,
                                                type: inputsTypes.NUMBER,
                                                colSpan: "lg:w-1/5",
                                                name: "dni2",
                                                // validations: yup.string().required('Debes ingresar un dni'),
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
                                                sustanceSelect: yup
                                                    .object()
                                                    .when("sustance", {
                                                        is: (value) =>
                                                            _.isEmpty(value),
                                                        then: yup
                                                            .object()
                                                            .required(
                                                                "Debes elegir un elemento"
                                                            )
                                                            .nullable(),
                                                    }),
                                                mineralSelect: yup
                                                    .object()
                                                    .when("mineral", {
                                                        is: (value) =>
                                                            _.isEmpty(value),
                                                        then: yup
                                                            .object()
                                                            .required(
                                                                "Debes elegir un elemento"
                                                            )
                                                            .nullable(),
                                                    }),
                                                dni2: yup
                                                    .string()
                                                    .required(
                                                        "Debes ingresar un dni"
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

        //Ubicacion Solicitud Exploración /Matricula Catastral
        {
            icon: 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
            bgColorIcon: 'bg-blue-500',
            bgColorProgress: 'bg-blue-300',
            titleStep: 'Ubi.y MC',
            bodyStep: [
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: 'Ubicación',
                            width: 'lg:w-full', //flex
                            columns: 'grid-cols-1', //grid
                            columnsResponsive: 'lg:grid-cols-2', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Provincia',
                                    value: {},
                                    type: inputsTypes.SELECT,
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
                                    validations: yup.object().when('provinciaSelect', {
                                        is: value => _.isEmpty(value) || !value,
                                        then: yup.object().required('Debes elegir un elemento').nullable()
                                    }),
                                    observation: new Observations({schema, name: 'provincia', evaluate}).observations
                                },
                                {
                                    label: 'Departamento',
                                    value: {},
                                    type: inputsTypes.SELECT,
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
                                    validations: yup.object().when('departamentoSelect', {
                                        is: value => _.isEmpty(value) || !value,
                                        then: yup.object().required('Debes elegir un elemento').nullable()
                                    }),
                                    observation: new Observations({schema, name: 'departamento', evaluate}).observations
                                },
                                {
                                    label: 'Localidad',
                                    value: {},
                                    type: inputsTypes.SELECT,
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
                                    validations: yup.object().when('localidadSelect', {
                                        is: value => _.isEmpty(value) || !value,
                                        then: yup.object().required('Debes elegir un elemento').nullable()
                                    }),
                                    observation: new Observations({schema, name: 'localidad', evaluate}).observations
                                },
                            ]
                        },

                    ]
                },
            ]
        },
        
        //Coordenadass GaussKruger / Categoria Mineral
        {
<<<<<<< HEAD
            icon: 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
            bgColorIcon: 'bg-blue-500',
            bgColorProgress: 'bg-blue-300',
            titleStep: 'Coord.y Cat.',
=======
            icon: "M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-2.3-8.7l1.3 1.29 3.3-3.3a1 1 0 0 1 1.4 1.42l-4 4a1 1 0 0 1-1.4 0l-2-2a1 1 0 0 1 1.4-1.42z",
            bgColorIcon: "bg-blue-500",
            bgColorProgress: "bg-blue-300",
            titleStep: "PROPIETARIO",
>>>>>>> fa9c44ce57b85f81e29c4681475b450468ac2e5d
            bodyStep: [
                {
                    widthResponsive: "lg:flex-row", //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: "Ubicación",
                            width: "lg:w-full", //flex
                            columns: "grid-cols-1", //grid
                            columnsResponsive: "lg:grid-cols-2", //inside card
                            img: "/images/laborales.png",
                            inputs: [
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
        {
            icon: "M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-2.3-8.7l1.3 1.29 3.3-3.3a1 1 0 0 1 1.4 1.42l-4 4a1 1 0 0 1-1.4 0l-2-2a1 1 0 0 1 1.4-1.42z",
            bgColorIcon: "bg-blue-500",
            bgColorProgress: "bg-blue-300",
            titleStep: "DECLACIÓN JURADA",
            bodyStep: [
                {
                    widthResponsive: "lg:flex-row", //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: "Ubicación",
                            width: "lg:w-full", //flex
                            columns: "grid-cols-1", //grid
                            columnsResponsive: "lg:grid-cols-2", //inside card
                            img: "/images/laborales.png",
                            inputs: [
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
<<<<<<< HEAD

        //Datos Propietario
        {
            icon: 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
            bgColorIcon: 'bg-blue-500',
            bgColorProgress: 'bg-blue-300',
            titleStep: 'Propietario',
            bodyStep: [
                // row 1
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: 'Datos Persona',
                            width: 'lg:w-full', //flex
                            columns: 'grid-cols-1', //grid
                            columnsResponsive: 'lg:grid-cols-2', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Email',
                                    value: schema.email,
                                    type: inputsTypes.EMAIL,
                                    name: 'email',
                                    validations: yup.string().required('Debes completar este campo').email('El formato ingresado no es válido'),
                                    observation: new Observations({schema, name: 'email', evaluate}).observations

                                },
                                {
                                    label: 'Contraseña',
                                    value: schema.password,
                                    type: inputsTypes.PASSWORD,
                                    name: 'password',
                                    validations: yup.string().required('Debes completar este campo').min(8, 'Debes ingresar al menos 8 caracteres'),
                                    observation: new Observations({schema, name: 'password', evaluate}).observations

                                },
                                {
                                    label: 'Confirmar contraseña',
                                    value: schema.repeatPassword,
                                    type: inputsTypes.PASSWORD,
                                    name: 'repeatPassword',
                                    validations: yup
                                        .string()
                                        .required('Debes completar este campo')
                                        .oneOf([yup.ref("password")], "Las contraseñas deben ser iguales"),
                                    observation: new Observations({schema, name: 'repeatPassword', evaluate}).observations

                                },
                                {
                                    label: 'Nombre o razón social',
                                    value: schema.nombre_razon_social,
                                    type: inputsTypes.TEXT,
                                    name: 'nombre_razon_social',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'nombre_razon_social', evaluate}).observations

                                },
                                {
                                    label: 'Domicilio',
                                    value: schema.domicilio,
                                    type: inputsTypes.TEXT,
                                    name: 'domicilio',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'domicilio', evaluate}).observations

                                },
                                {
                                    label: 'Nombre de la mina, cantera, explotación y/o establecimiento',
                                    value: schema.nombre_mina,
                                    type: inputsTypes.TEXT,
                                    name: 'nombre_mina',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'nombre_mina', evaluate}).observations

                                },
                                // {
                                // },
                                {
                                    // inputColsSpan: 'lg:col-span-2',
                                    label: 'Certificado de inscripción en AFIP (CUIT)',
                                    value: schema.cuit,
                                    type: inputsTypes.FILE,
                                    name: 'cuit',
                                    accept: [fileAccept.PDF.value],
                                    acceptLabel: `Archivos admitidos: ${[fileAccept.PDF.label].join()}`,
                                    maxSize: 'Tamaño maximo por archivo: 10MB',
                                    multiple: false,
                                    validations: yup
                                        .array()
                                        .min(1, 'Debes adjuntar al menos un elemento').default([])
                                        .max(1, 'Solo puedes adjuntar hasta 1 archivo')
                                        .test({
                                            name: 'CUIT_SIZE',
                                            exclusive: true,
                                            message: 'Recuerda que cada archivo no debe superar los 10MB',
                                            test: (value) => {
                                                if (!value) return true;
                                                let validation = true;
                                                for (let index = 0; index < value.length; index++) {
                                                    const element = value[index];
                                                    validation = validation && element.size <= 10000000; // 10MB
                                                }
                                                return validation;
                                                // !value || (value && value.size <= 10)
                                            }
                                        })
                                        .test({
                                            name: 'CUIT_FILE_FORMAT',
                                            exclusive: true,
                                            message: 'Hay archivos con extensiones no válidas',
                                            test: (value) => {
                                                if (!value) return true;
                                                let validation = true;
                                                for (let index = 0; index < value.length; index++) {
                                                    const element = value[index];
                                                    validation = validation && [...fileAccept.PDF.value].includes(element.type);
                                                }
                                                return validation;
                                                // return !value || (value && [fileAccept.PDF.value].includes(value.type))
                                            }
                                        }),

                                    observation: new Observations({schema, name: 'cuit', evaluate}).observations
                                },
                                {
                                    // inputColsSpan: 'lg:col-span-2',
                                    label: 'Copia escritura del inmueble',
                                    helpInfo: 'Si la posesión es veinteñal se debe acompañar con el certificado correspondiente',
                                    value: schema.escritura,
                                    type: inputsTypes.FILE,
                                    name: 'escritura',
                                    accept: [fileAccept.PDF.value, fileAccept.IMAGE.value],
                                    acceptLabel: `Archivos admitidos: ${[fileAccept.PDF.label, fileAccept.IMAGE.label].join()}`,
                                    maxSize: 'Tamaño maximo por archivo: 10MB',
                                    multiple: true,
                                    validations: yup
                                        .array()
                                        .min(1, 'Debes adjuntar al menos un elemento').default([])
                                        .max(1, 'Solo puedes adjuntar hasta 1 archivo')
                                        .test({
                                            name: 'ESCRITURA_FILE_SIZE',
                                            exclusive: true,
                                            message: 'Recuerda que cada archivo no debe superar los 10MB',
                                            test: (value) => {
                                                if (!value) return true;
                                                let validation = true;
                                                for (let index = 0; index < value.length; index++) {
                                                    const element = value[index];
                                                    validation = validation && element.size <= 10000000; // 10MB
                                                }
                                                return validation;
                                                // !value || (value && value.size <= 10)
                                            }
                                        })
                                        .test({
                                            name: 'ESCRITURA_FILE_FORMAT',
                                            exclusive: true,
                                            message: 'Hay archivos con extensiones no válidas',
                                            test: (value) => {
                                                if (!value) return true;
                                                let validation = true;

                                                for (let index = 0; index < value.length; index++) {
                                                    const element = value[index];
                                                    validation = validation && [...fileAccept.PDF.value, ...fileAccept.IMAGE.value].includes(element.type);
                                                }
                                                return validation;
                                                // return !value || (value && [fileAccept.PDF.value].includes(value.type))
                                            }
                                        }),

                                    observation: new Observations({schema, name: 'escritura', evaluate}).observations
                                },
                            ]
                        },

                    ]
                },
            ]
        },

        //Declaracion Jurada y Informe Regitro Catastral
        {
            icon: 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
            bgColorIcon: 'bg-blue-500',
            bgColorProgress: 'bg-blue-300',
            titleStep: 'D.J y Inf.Reg.Catas',
            bodyStep: [
                // row 1
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: 'Datos Persona',
                            width: 'lg:w-full', //flex
                            columns: 'grid-cols-1', //grid
                            columnsResponsive: 'lg:grid-cols-2', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Email',
                                    value: schema.email,
                                    type: inputsTypes.EMAIL,
                                    name: 'email',
                                    validations: yup.string().required('Debes completar este campo').email('El formato ingresado no es válido'),
                                    observation: new Observations({schema, name: 'email', evaluate}).observations

                                },
                                {
                                    label: 'Contraseña',
                                    value: schema.password,
                                    type: inputsTypes.PASSWORD,
                                    name: 'password',
                                    validations: yup.string().required('Debes completar este campo').min(8, 'Debes ingresar al menos 8 caracteres'),
                                    observation: new Observations({schema, name: 'password', evaluate}).observations

                                },
                                {
                                    label: 'Confirmar contraseña',
                                    value: schema.repeatPassword,
                                    type: inputsTypes.PASSWORD,
                                    name: 'repeatPassword',
                                    validations: yup
                                        .string()
                                        .required('Debes completar este campo')
                                        .oneOf([yup.ref("password")], "Las contraseñas deben ser iguales"),
                                    observation: new Observations({schema, name: 'repeatPassword', evaluate}).observations

                                },
                                {
                                    label: 'Nombre o razón social',
                                    value: schema.nombre_razon_social,
                                    type: inputsTypes.TEXT,
                                    name: 'nombre_razon_social',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'nombre_razon_social', evaluate}).observations

                                },
                                {
                                    label: 'Domicilio',
                                    value: schema.domicilio,
                                    type: inputsTypes.TEXT,
                                    name: 'domicilio',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'domicilio', evaluate}).observations

                                },
                                {
                                    label: 'Nombre de la mina, cantera, explotación y/o establecimiento',
                                    value: schema.nombre_mina,
                                    type: inputsTypes.TEXT,
                                    name: 'nombre_mina',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'nombre_mina', evaluate}).observations

                                },
                                // {
                                // },
                                {
                                    // inputColsSpan: 'lg:col-span-2',
                                    label: 'Certificado de inscripción en AFIP (CUIT)',
                                    value: schema.cuit,
                                    type: inputsTypes.FILE,
                                    name: 'cuit',
                                    accept: [fileAccept.PDF.value],
                                    acceptLabel: `Archivos admitidos: ${[fileAccept.PDF.label].join()}`,
                                    maxSize: 'Tamaño maximo por archivo: 10MB',
                                    multiple: false,
                                    validations: yup
                                        .array()
                                        .min(1, 'Debes adjuntar al menos un elemento').default([])
                                        .max(1, 'Solo puedes adjuntar hasta 1 archivo')
                                        .test({
                                            name: 'CUIT_SIZE',
                                            exclusive: true,
                                            message: 'Recuerda que cada archivo no debe superar los 10MB',
                                            test: (value) => {
                                                if (!value) return true;
                                                let validation = true;
                                                for (let index = 0; index < value.length; index++) {
                                                    const element = value[index];
                                                    validation = validation && element.size <= 10000000; // 10MB
                                                }
                                                return validation;
                                                // !value || (value && value.size <= 10)
                                            }
                                        })
                                        .test({
                                            name: 'CUIT_FILE_FORMAT',
                                            exclusive: true,
                                            message: 'Hay archivos con extensiones no válidas',
                                            test: (value) => {
                                                if (!value) return true;
                                                let validation = true;
                                                for (let index = 0; index < value.length; index++) {
                                                    const element = value[index];
                                                    validation = validation && [...fileAccept.PDF.value].includes(element.type);
                                                }
                                                return validation;
                                                // return !value || (value && [fileAccept.PDF.value].includes(value.type))
                                            }
                                        }),

                                    observation: new Observations({schema, name: 'cuit', evaluate}).observations
                                },
                                {
                                    // inputColsSpan: 'lg:col-span-2',
                                    label: 'Copia escritura del inmueble',
                                    helpInfo: 'Si la posesión es veinteñal se debe acompañar con el certificado correspondiente',
                                    value: schema.escritura,
                                    type: inputsTypes.FILE,
                                    name: 'escritura',
                                    accept: [fileAccept.PDF.value, fileAccept.IMAGE.value],
                                    acceptLabel: `Archivos admitidos: ${[fileAccept.PDF.label, fileAccept.IMAGE.label].join()}`,
                                    maxSize: 'Tamaño maximo por archivo: 10MB',
                                    multiple: true,
                                    validations: yup
                                        .array()
                                        .min(1, 'Debes adjuntar al menos un elemento').default([])
                                        .max(1, 'Solo puedes adjuntar hasta 1 archivo')
                                        .test({
                                            name: 'ESCRITURA_FILE_SIZE',
                                            exclusive: true,
                                            message: 'Recuerda que cada archivo no debe superar los 10MB',
                                            test: (value) => {
                                                if (!value) return true;
                                                let validation = true;
                                                for (let index = 0; index < value.length; index++) {
                                                    const element = value[index];
                                                    validation = validation && element.size <= 10000000; // 10MB
                                                }
                                                return validation;
                                                // !value || (value && value.size <= 10)
                                            }
                                        })
                                        .test({
                                            name: 'ESCRITURA_FILE_FORMAT',
                                            exclusive: true,
                                            message: 'Hay archivos con extensiones no válidas',
                                            test: (value) => {
                                                if (!value) return true;
                                                let validation = true;

                                                for (let index = 0; index < value.length; index++) {
                                                    const element = value[index];
                                                    validation = validation && [...fileAccept.PDF.value, ...fileAccept.IMAGE.value].includes(element.type);
                                                }
                                                return validation;
                                                // return !value || (value && [fileAccept.PDF.value].includes(value.type))
                                            }
                                        }),

                                    observation: new Observations({schema, name: 'escritura', evaluate}).observations
                                },
                            ]
                        },

                    ]
                },
            ]
        },

    ]
=======
    ];
>>>>>>> fa9c44ce57b85f81e29c4681475b450468ac2e5d
}
