import * as yup from 'yup';
import Observations from './observaciones';
import inputsTypes from '../../enums/inputsTypes';
import fileAccept from '../../enums/fileAccept';

export async function getFormSchema({ ...schema }, action, dataForm, productors) {

    const productor = !schema.id_productor? productors : productors.find( e=> schema.id_productor === e.value );
    const minas = !schema.id_productor? undefined : await axios.get(`/productores/getProductorMina/${productor.value}`);
    const minerales = await axios.get(`/minerales/getMinerals`);

    // name => unique
    // icons => https://heroicons.com/ => svg d=""
    return [
        {
            icon: 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
            bgColorIcon: 'bg-blue-500',
            bgColorProgress: 'bg-blue-300',
            titleStep: 'Datos',
            bodyStep: [
                // row 1
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: 'Datos de quien completa este formulario',
                            width: 'lg:w-2/4', //flex
                            columns: 'grid-cols-1', //grid
                            columnsResponsive: 'lg:grid-cols-1', //inside card
                            // infoCard: ''
                           // img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Datos del representante legal',
                                    value: schema.nombre,
                                    type: inputsTypes.TEXT,
                                    name: 'nombre',
                                    validations: yup.string().required('Debes completar este campo').nullable(),
                                    observation: new Observations({schema, name: 'nombre', action}).observations

                                },
                                {
                                    label: 'cuit- cuil',
                                    value: schema.dni,
                                    type: inputsTypes.NUMBER,
                                    name: 'dni',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'dni', action}).observations

                                },
                                {
                                    label: 'Correo electrónico',
                                    value: schema.email,
                                    type: inputsTypes.TEXT,
                                    name: 'email',
                                    // validations: yup.string().matches(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/).required('Debes completar este campo'),
                                    validations: yup.string().email().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'email', action}).observations

                                },
                                {
                                    label: 'Teléfono',
                                    value: schema.telefono,
                                    type: inputsTypes.TEXT,
                                    name: 'telefono',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'telefono', action}).observations

                                },
                                {
                                    label: 'Domicilio en provincia de Salta',
                                    value: schema.domicilio_provincia,
                                    type: inputsTypes.TEXT,
                                    name: 'domicilio_provincia',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'domicilio_provincia', action}).observations

                                },
                                {
                                    label: 'Domicilio administración',
                                    value: schema.domicilio_administracion,
                                    type: inputsTypes.TEXT,
                                    name: 'domicilio_administracion',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'domicilio_administracion', action}).observations

                                },
                                {
                                    label: 'Productor',
                                    value: schema.id_productor? productor : undefined,
                                    type: inputsTypes.SELECT,
                                    // get axios
                                    async: true,
                                    asyncUrl: '/productores/getProductorMina',
                                    inputDepends: ['id_mina'],
                                    inputClearDepends: ['id_mina'],
                                    isLoading: false,
                                    //
                                    options: productors,
                                    name: 'id_productor',
                                    multiple: false,
                                    closeOnSelect: true,
                                    searchable: false,
                                    placeholder: 'Selecciona una opción',
                                    validations: yup.object().when('productorSelect', {
                                        is: value => _.isEmpty(value) || !value,
                                        then: yup.object().required('Debes elegir un elemento').nullable()
                                    }),
                                    observation: new Observations({schema, name: 'id_productor', action}).observations
                                },
                                // {
                                //     label: 'Mina',
                                //     value: !minas? undefined : minas.data.find( e=> schema.id_mina == e.value ),
                                //     type: inputsTypes.SELECT,
                                //     isLoading: false,
                                //     options: !minas? [] : minas.data,
                                //     name: 'id_mina',
                                //     multiple: false,
                                //     closeOnSelect: true,
                                //     searchable: false,
                                //     placeholder: 'Selecciona una opción',
                                //     validations: yup.object().when('minaSelect', {
                                //         is: value => _.isEmpty(value) || !value,
                                //         then: yup.object().required('Debes elegir un elemento').nullable()
                                //     }),
                                //     observation: new Observations({schema, name: 'id_mina', action}).observations
                                // },
                                // {
                                //     // inputColsSpan: 'lg:col-span-2',
                                //     label: 'cargo',
                                //     value: schema.cargo,
                                //     type: inputsTypes.FILE,
                                //     name: 'cargo',
                                //     accept: [fileAccept.PDF.value],
                                //     acceptLabel: `Archivos admitidos: ${[fileAccept.PDF.label].join()}`,
                                //     maxSize: 'Tamaño maximo por archivo: 10MB',
                                //     multiple: false,
                                //     validations: yup
                                //         .array()
                                //         .default([schema.cargo])
                                //         .min(1, 'Debes adjuntar al menos un elemento')
                                //         .max(1, 'Solo puedes adjuntar hasta 1 archivo')
                                //         .test({
                                //             name: 'CUIT_SIZE',
                                //             exclusive: true,
                                //             message: 'Recuerda que cada archivo no debe superar los 10MB',
                                //             test: (value) => {
                                //                 if (!value || value[0] == schema.cargo)
                                //                     return true;
                                //                 let validation = true;
                                //                 for (let index = 0; index < value.length; index++) {
                                //                     const element = value[index];
                                //                     validation = validation && element.size <= 1000000; // 10MB
                                //                 }
                                //                 return validation;
                                //                 // !value || (value && value.size <= 10)
                                //             }
                                //         })
                                //         .test({
                                //             name: 'CUIT_FILE_FORMAT',
                                //             exclusive: true,
                                //             message: 'Hay archivos con extensiones no válidas',
                                //             test: (value) => {
                                //                 if (!value) return true;
                                //                 let validation = true;
                                //                 for (let index = 0; index < value.length; index++) {
                                //                     const element = value[index];
                                //                     let last;

                                //                     if(!element.type) {
                                //                         const nameFile = (element instanceof File)? (element.type == ""? element.name : element) : element
                                //                         const typeArray = nameFile.split('.');
                                //                         [last] = typeArray.slice(-1);

                                //                     } else {
                                //                         last = element.type
                                //                     }
                                //                     validation = validation && [...fileAccept.PDF.value].includes(last);
                                //                 }
                                //                 return validation;
                                //                 // return !value || (value && [fileAccept.PDF.value].includes(value.type))
                                //             }
                                //         }),
                                //     observation: new Observations({schema, name: 'cargo', action}).observations
                                // },
                            ]
                        },

                    ]
                },
            ]
        },
        {
            icon: 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
            bgColorIcon: 'bg-blue-500',
            bgColorProgress: 'bg-blue-300',
            titleStep: 'Minas',
            bodyStep: [
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        {
                            title: 'De las minas completar',
                            width: 'lg:w-full', //flex
                            // columns: '', //grid
                            // columnsResponsive: '', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: '',
                                    type: inputsTypes.TABLE,
                                    name: "Productos",
                                    typeTable: "horizontal",
                                    addRow: true,
                                    verticalTitle: [],
                                    horizontalTitle: [
                                        'Expte. de la Mina',
                                        'Sustancias que se exploran',
                                        'Derechos sobre la misma',
                                        'Nombre de la Mina',
                                        'Ubicación',
                                        'Superficie de la Mina',
                                        'Etapa de la exploración Superficial/Avanzada',
                                        'Nº de Resolución de Aprobación del Informe de Impacto Ambiental'
                                    ],
                                    element: _.isEmpty(schema)? [
                                        [
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'expediente',
                                                colSpan: '',
                                            },
                                            {
                                                label: '',
                                                value: {},
                                                type: inputsTypes.SELECT,
                                                colSpan: '',
                                                options: minerales.data,
                                                name: 'nombre_mineral',
                                                multiple: false,
                                                closeOnSelect: true,
                                                searchable: false,
                                                placeholder: 'Selecciona una opción',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'derecho',
                                                colSpan: '',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'sustancia',
                                                colSpan: '',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'ubicacion',
                                                colSpan: '',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'superficie',
                                                colSpan: '',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'etapa',
                                                colSpan: '',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'resolucion',
                                                colSpan: '',
                                            },
                                            {
                                                colSpan: 'lg:w-5/5',
                                                type: 'observation',
                                                ...new Observations({schema, name: 'row', action}).observations
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.REMOVEICON,
                                                colSpan: '',
                                                name: 'remove',
                                            }

                                        ],
                                    ] : getChildrens({ data: schema.productos, key: 'Productos', selectedChild: [
                                        [
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'expediente',
                                                colSpan: '',
                                            },
                                            {
                                                label: '',
                                                value: {},
                                                type: inputsTypes.SELECT,
                                                colSpan: '',
                                                options: minerales.data,
                                                name: 'nombre_mineral',
                                                multiple: false,
                                                closeOnSelect: true,
                                                searchable: false,
                                                placeholder: 'Selecciona una opción',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'derecho',
                                                colSpan: '',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'sustancia',
                                                colSpan: '',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'ubicacion',
                                                colSpan: '',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'superficie',
                                                colSpan: '',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'etapa',
                                                colSpan: '',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'resolucion',
                                                colSpan: '',
                                            },
                                            {
                                                colSpan: 'lg:w-5/5',
                                                type: 'observation',
                                                ...new Observations({schema, name: 'row', action}).observations
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.REMOVEICON,
                                                colSpan: '',
                                                name: 'remove',
                                            }

                                        ]
                                    ], minerales, action}),


                                    // observation: new Observations({schema, name: 'Productos', action}).observations,
                                    childrens: _.isEmpty(schema)? [
                                        [
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'expediente',
                                                colSpan: '',
                                            },
                                            {
                                                label: '',
                                                value: {},
                                                type: inputsTypes.SELECT,
                                                colSpan: '',
                                                options: minerales.data,
                                                name: 'nombre_mineral',
                                                multiple: false,
                                                closeOnSelect: true,
                                                searchable: false,
                                                placeholder: 'Selecciona una opción',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'derecho',
                                                colSpan: '',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'sustancia',
                                                colSpan: '',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'ubicacion',
                                                colSpan: '',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'superficie',
                                                colSpan: '',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'etapa',
                                                colSpan: '',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'resolucion',
                                                colSpan: '',
                                            },
                                            {
                                                colSpan: 'lg:w-5/5',
                                                type: 'observation',
                                                ...new Observations({schema, name: 'row', action}).observations
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.REMOVEICON,
                                                colSpan: '',
                                                name: 'remove',
                                            }

                                        ],
                                    ] : getChildrens({ data: schema.productos, key: 'Productos', selectedChild: [
                                        [
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'expediente',
                                                colSpan: '',
                                            },
                                            {
                                                label: '',
                                                value: {},
                                                type: inputsTypes.SELECT,
                                                colSpan: '',
                                                options: minerales.data,
                                                name: 'nombre_mineral',
                                                multiple: false,
                                                closeOnSelect: true,
                                                searchable: false,
                                                placeholder: 'Selecciona una opción',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'derecho',
                                                colSpan: '',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'sustancia',
                                                colSpan: '',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'ubicacion',
                                                colSpan: '',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'superficie',
                                                colSpan: '',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'etapa',
                                                colSpan: '',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'resolucion',
                                                colSpan: '',
                                            },
                                            {
                                                colSpan: 'lg:w-5/5',
                                                type: 'observation',
                                                ...new Observations({schema, name: 'row', action}).observations
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.REMOVEICON,
                                                colSpan: '',
                                                name: 'remove',
                                            }

                                        ]
                                    ], minerales, action}),
                                    validations: yup
                                        .array()
                                        .of(
                                            yup.object().shape({
                                                nombre_mineral: yup.object().when('mineral', {
                                                    is: value => _.isEmpty(value),
                                                    then: yup.object().nullable().required('Debes elegir un elemento')
                                                }),
                                                expediente: yup.string().nullable().required('Debes completar este campo'),
                                                // nombre_mineral: yup.string().nullable().required('Debes completar este campo'),
                                                derecho: yup.string().nullable().required('Debes completar este campo'),
                                                sustancia: yup.string().nullable().required('Debes completar este campo'),
                                                ubicacion: yup.string().nullable().required('Debes completar este campo'),
                                                superficie: yup.string().nullable().required('Debes completar este campo'),
                                                etapa: yup.string().nullable().required('Debes completar este campo'),
                                                resolucion: yup.string().nullable().required('Debes completar este campo'),
                                                row_evaluacion: action == 'evaluate'? yup.string().oneOf(["aprobado", "rechazado", "sin evaluar"], 'Debes seleccionar una opción').nullable().required('Debes seleccionar una opción') : {},
                                                row_comentario: action == 'evaluate'? yup.string().when('observacion_row', { is: "rechazado", then: yup.string().min(5, 'Debes ingresar al menos 5 caracteres').max(50, 'Puedes ingresar hasta 50 caracteres').nullable().required('Debes agregar una observación') }).nullable() : {}
                                            })
                                        )
                                        .strict(),
                                }
                            ]
                         },
                        //  col 1
                        // {
                        //     title: 'Mercado (indicar en que mercados vende su producción)',
                        //     width: 'lg:w-2/4', //flex
                        //     columns: 'grid-cols-1', //grid
                        //     columnsResponsive: '', //inside card
                        //     // infoCard: ''
                        //    // img: '/images/laborales.png',
                        //     inputs: [
                        //         {
                        //             label: 'Porcentaje vendido a Provincia',
                        //             value: schema.porcentaje_venta_provincia,
                        //             type: inputsTypes.NUMBER,
                        //             name: 'porcentaje_venta_provincia',
                        //             validations: yup.string().required('Debes completar este campo'),
                        //             observation: new Observations({schema, name: 'porcentaje_venta_provincia', action}).observations

                        //         },
                        //         {
                        //             label: 'Porcentaje vendido a otras Provincias',
                        //             value: schema.porcentaje_venta_otras_provincias,
                        //             type: inputsTypes.NUMBER,
                        //             name: 'porcentaje_venta_otras_provincias',
                        //             validations: yup.string().required('Debes completar este campo'),
                        //             observation: new Observations({schema, name: 'porcentaje_venta_otras_provincias', action}).observations

                        //         },
                        //         {
                        //             label: 'Porcentaje Exportado',
                        //             value: schema.porcentaje_exportado,
                        //             type: inputsTypes.NUMBER,
                        //             name: 'porcentaje_exportado',
                        //             validations: yup.string().required('Debes completar este campo'),
                        //             observation: new Observations({schema, name: 'porcentaje_exportado', action}).observations

                        //         },
                        //     ]
                        // },
                        // {
                        //     title: 'Mercado (indicar en que mercados vende su producción)',
                        //     width: 'lg:w-2/4', //flex
                        //     columns: 'grid-cols-1', //grid
                        //     columnsResponsive: '', //inside card
                        //     // infoCard: ''
                        //    // img: '/images/laborales.png',
                        //     inputs: [
                        //         {
                        //             label: 'Prospección',
                        //             value: schema.prospeccion? true : false,
                        //             type: inputsTypes.CHECKBOX,
                        //             labelOn: "SI",
                        //             labelOff: "NO",
                        //             name: 'prospeccion',
                        //             observation: new Observations({schema, name: 'prospeccion', action}).observations

                        //         },
                        //         {
                        //             label: 'Explotación',
                        //             value: schema.explotacion? true : false,
                        //             type: inputsTypes.CHECKBOX,
                        //             labelOn: "SI",
                        //             labelOff: "NO",
                        //             name: 'explotacion',
                        //             observation: new Observations({schema, name: 'explotacion', action}).observations

                        //         },
                        //         {
                        //             label: 'Desarrollo',
                        //             value: schema.desarrollo? true : false,
                        //             type: inputsTypes.CHECKBOX,
                        //             labelOn: "SI",
                        //             labelOff: "NO",
                        //             name: 'desarrollo',
                        //             observation: new Observations({schema, name: 'desarrollo', action}).observations

                        //         },
                        //         {
                        //             label: 'Exploración',
                        //             value: schema.explotacion? true : false,
                        //             type: inputsTypes.CHECKBOX,
                        //             labelOn: "SI",
                        //             labelOff: "NO",
                        //             name: 'exploracion',
                        //             observation: new Observations({schema, name: 'exploracion', action}).observations

                        //         }
                        //     ]
                        // },

                    ]
                },
            ]
        },
        {
            icon: 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
            bgColorIcon: 'bg-blue-500',
            bgColorProgress: 'bg-blue-300',
            titleStep: 'Inversiones',
            bodyStep: [
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: 'Inversiones fijas realizadas destinadas a la exploración en el periodo anual anterior',
                            width: 'lg:w-2/4',
                            columns: 'grid-cols-1',
                            columnsResponsive: 'lg:grid-cols-2', // lg:grid-cols-3
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Laboreos mineros',
                                    value: schema.laboreos_mineros,
                                    type: inputsTypes.NUMBER,
                                    name: 'laboreos_mineros',
                                    validations: yup.string().required('Debes ingresar una cantidad.'),
                                    observation: new Observations({schema, name: 'laboreos_mineros', action}).observations

                                },
                                {
                                    label: 'Maquinarias y herramientas',
                                    value: schema.maquinarias_herramientas ,
                                    type: inputsTypes.NUMBER,
                                    name: 'maquinarias_herramientas',
                                    validations: yup.string().required('Debes ingresar una cantidad.'),
                                    observation: new Observations({schema, name: 'maquinarias_herramientas', action}).observations
                                },
                                {
                                    label: 'Campamento y plantas',
                                    value: schema.campamento,
                                    type: inputsTypes.NUMBER,
                                    name: 'campamento',
                                    validations: yup.string().required('Debes ingresar una cantidad.'),
                                    observation: new Observations({schema, name: 'campamento', action}).observations
                                },
                                {
                                    label: 'Huellas mineras/caminos',
                                    value: schema.huellas_mineras_caminos,
                                    type: inputsTypes.NUMBER,
                                    name: 'huellas_mineras_caminos',
                                    validations: yup.string().required('Debes ingresar una cantidad.'),
                                    observation: new Observations({schema, name: 'huellas_mineras_caminos', action}).observations
                                },
                                {
                                    label: 'Recursos humanos/mano de obra',
                                    value: schema.recurso_humano,
                                    type: inputsTypes.NUMBER,
                                    name: 'recurso_humano',
                                    validations: yup.string().required('Debes ingresar una cantidad.'),
                                    observation: new Observations({schema, name: 'recurso_humano', action}).observations
                                },
                                {
                                    label: 'Otros',
                                    value: schema.otros ,
                                    type: inputsTypes.NUMBER,
                                    name: 'otros',
                                    validations: yup.string().required('Debes ingresar una cantidad.'),
                                    observation: new Observations({schema, name: 'otros', action}).observations
                                }
                            ]
                        },

                    ]
                },
            ]
        },
        {
            icon: 'M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z',
            bgColorIcon: 'bg-blue-500',
            bgColorProgress: 'bg-blue-300',
            titleStep: 'Responsable Técnico',
            bodyStep: [
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: 'Datos del responsable técnico de la exploración',
                            width: 'lg:w-2/4', //flex
                            columns: 'grid-cols-1', //grid
                            columnsResponsive: 'lg:grid-cols-1',
                             //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Nombre y apellido',
                                    value: schema.nombre_apellido_responsable,
                                    type: inputsTypes.TEXT,
                                    name: 'nombre_apellido_responsable',
                                    validations: yup.string().required('Debes completar este campo').nullable(),
                                    observation: new Observations({schema, name: 'nombre_apellido_responsable', action}).observations

                                },
                                {
                                    label: 'Documento de identidad',
                                    value: schema.documento_identidad_responsable,
                                    type: inputsTypes.NUMBER,
                                    name: 'documento_identidad_responsable',
                                    validations: yup.string().required('Debes completar este campo').nullable(),
                                    observation: new Observations({schema, name: 'documento_identidad_responsable', action}).observations

                                },
                                {
                                    label: 'Título y nuúmero de matrícula',
                                    value: schema.titulo_matricula_responsable,
                                    type: inputsTypes.TEXT,
                                    name: 'titulo_matricula_responsable',
                                    validations: yup.string().required('Debes completar este campo').nullable(),
                                    observation: new Observations({schema, name: 'titulo_matricula_responsable', action}).observations

                                },
                            ]
                        },
                    ]
                },
            ]
        },
        {
            icon: 'M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z',
            bgColorIcon: 'bg-blue-500',
            bgColorProgress: 'bg-blue-300',
            titleStep: 'Legal',
            bodyStep: [
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: '',
                            width: 'w-3/4', //flex
                            // columns: '', //grid
                            // columnsResponsive: '', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Inscriptos en la ley de inversiones mineras N°24196',
                                    value: schema.inscripcion_ley_24196,
                                    type: inputsTypes.TEXT,
                                    name: 'inscripcion_ley_24196',
                                    validations: yup.string().required('Debes completar este campo').nullable(),
                                    observation: new Observations({schema, name: 'inscripcion_ley_24196', action}).observations

                                },
                                {
                                    label: 'Uso de explosivos o voladuras en general',
                                    value: schema.uso_explosivos,
                                    type: inputsTypes.TEXT,
                                    name: 'uso_explosivos',
                                    validations: yup.string().required('Debes completar este campo').nullable(),
                                    observation: new Observations({schema, name: 'uso_explosivos', action}).observations

                                },
                                {
                                    label: 'Tipo de propiedad del yacimiento',
                                    value: schema.titulo_matricula_responsable,
                                    type: inputsTypes.TEXT,
                                    name: 'titulo_matricula_responsable',
                                    validations: yup.string().required('Debes completar este campo').nullable(),
                                    observation: new Observations({schema, name: 'titulo_matricula_responsable', action}).observations

                                },
                            ]
                        },
                    ]
                },
            ]
        },
        {
            icon: 'M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z',
            bgColorIcon: 'bg-blue-500',
            bgColorProgress: 'bg-blue-300',
            titleStep: 'Documentación',
            bodyStep: [
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: 'Documentación a acompañar',
                            width: 'w-3/4', //flex
                            // columns: '', //grid
                            // columnsResponsive: '', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    inputColsSpan: 'col-span-2',
                                    label: 'Constancia canon y regalías',
                                    value: schema.constancia_canon,
                                    type: inputsTypes.FILE,
                                    name: 'constancia_canon',
                                    accept: [fileAccept.PDF.value],
                                    acceptLabel: `Archivos admitidos: ${[fileAccept.PDF.label].join()}`,
                                    maxSize: 'Tamaño maximo por archivo: 10MB',
                                    multiple: false,
                                    validations: yup
                                        .array()
                                        .default([schema.constancia_canon])
                                        .min(1, 'Debes adjuntar al menos un elemento')
                                        .max(1, 'Solo puedes adjuntar hasta 1 archivo')
                                        .test({
                                            name: 'CANON_SIZE',
                                            exclusive: true,
                                            message: 'Recuerda que cada archivo no debe superar los 10MB',
                                            test: (value) => {
                                                if (!value || value[0] == schema.constancia_canon)
                                                    return true;
                                                let validation = true;
                                                for (let index = 0; index < value.length; index++) {
                                                    const element = value[index];
                                                    validation = validation && element.size <= 1000000; // 10MB
                                                }
                                                return validation;
                                                // !value || (value && value.size <= 10)
                                            }
                                        })
                                        .test({
                                            name: 'CANON_FILE_FORMAT',
                                            exclusive: true,
                                            message: 'Hay archivos con extensiones no válidas',
                                            test: (value) => {
                                                if (!value) return true;
                                                let validation = true;
                                                for (let index = 0; index < value.length; index++) {
                                                    const element = value[index];
                                                    let last;

                                                    if(!element.type) {
                                                        const nameFile = (element instanceof File)? (element.type == ""? element.name : element) : element
                                                        const typeArray = nameFile.split('.');
                                                        [last] = typeArray.slice(-1);

                                                    } else {
                                                        last = element.type
                                                    }
                                                    validation = validation && [...fileAccept.PDF.value].includes(last);
                                                }
                                                return validation;
                                                // return !value || (value && [fileAccept.PDF.value].includes(value.type))
                                            }
                                        }),
                                    observation: new Observations({schema, name: 'constancia_canon', action}).observations
                                },
                                {
                                    inputColsSpan: 'col-span-2',
                                    label: 'Regularización fiscal emitida por la Dirección General de Rentas',
                                    value: schema.regularizacion_fiscal,
                                    type: inputsTypes.FILE,
                                    name: 'regularizacion_fiscal',
                                    accept: [fileAccept.PDF.value],
                                    acceptLabel: `Archivos admitidos: ${[fileAccept.PDF.label].join()}`,
                                    maxSize: 'Tamaño maximo por archivo: 10MB',
                                    multiple: false,
                                    validations: yup
                                        .array()
                                        .default([schema.regularizacion_fiscal])
                                        .min(1, 'Debes adjuntar al menos un elemento')
                                        .max(1, 'Solo puedes adjuntar hasta 1 archivo')
                                        .test({
                                            name: 'REG_FISCAL_SIZE',
                                            exclusive: true,
                                            message: 'Recuerda que cada archivo no debe superar los 10MB',
                                            test: (value) => {
                                                if (!value || value[0] == schema.regularizacion_fiscal)
                                                    return true;
                                                let validation = true;
                                                for (let index = 0; index < value.length; index++) {
                                                    const element = value[index];
                                                    validation = validation && element.size <= 1000000; // 10MB
                                                }
                                                return validation;
                                                // !value || (value && value.size <= 10)
                                            }
                                        })
                                        .test({
                                            name: 'REG_FISCAL_FILE_FORMAT',
                                            exclusive: true,
                                            message: 'Hay archivos con extensiones no válidas',
                                            test: (value) => {
                                                if (!value) return true;
                                                let validation = true;
                                                for (let index = 0; index < value.length; index++) {
                                                    const element = value[index];
                                                    let last;

                                                    if(!element.type) {
                                                        const nameFile = (element instanceof File)? (element.type == ""? element.name : element) : element
                                                        const typeArray = nameFile.split('.');
                                                        [last] = typeArray.slice(-1);

                                                    } else {
                                                        last = element.type
                                                    }
                                                    validation = validation && [...fileAccept.PDF.value].includes(last);
                                                }
                                                return validation;
                                                // return !value || (value && [fileAccept.PDF.value].includes(value.type))
                                            }
                                        }),
                                    observation: new Observations({schema, name: 'regularizacion_fiscal', action}).observations
                                },
                                {
                                    inputColsSpan: 'col-span-2',
                                    label: 'Copia autenticada del contrato social, poderes de los representantes, y último estado contable pasado por ante el Consejo de Ciencias Económicas de la Provincia de Salta',
                                    value: schema.contrato_social,
                                    type: inputsTypes.FILE,
                                    name: 'contrato_social',
                                    accept: [fileAccept.PDF.value],
                                    acceptLabel: `Archivos admitidos: ${[fileAccept.PDF.label].join()}`,
                                    maxSize: 'Tamaño maximo por archivo: 10MB',
                                    multiple: false,
                                    validations: yup
                                        .array()
                                        .default([schema.contrato_social])
                                        .min(1, 'Debes adjuntar al menos un elemento')
                                        .max(1, 'Solo puedes adjuntar hasta 1 archivo')
                                        .test({
                                            name: 'CONT_SOC_SIZE',
                                            exclusive: true,
                                            message: 'Recuerda que cada archivo no debe superar los 10MB',
                                            test: (value) => {
                                                if (!value || value[0] == schema.contrato_social)
                                                    return true;
                                                let validation = true;
                                                for (let index = 0; index < value.length; index++) {
                                                    const element = value[index];
                                                    validation = validation && element.size <= 1000000; // 10MB
                                                }
                                                return validation;
                                                // !value || (value && value.size <= 10)
                                            }
                                        })
                                        .test({
                                            name: 'CONT_SOC_FILE_FORMAT',
                                            exclusive: true,
                                            message: 'Hay archivos con extensiones no válidas',
                                            test: (value) => {
                                                if (!value) return true;
                                                let validation = true;
                                                for (let index = 0; index < value.length; index++) {
                                                    const element = value[index];
                                                    let last;

                                                    if(!element.type) {
                                                        const nameFile = (element instanceof File)? (element.type == ""? element.name : element) : element
                                                        const typeArray = nameFile.split('.');
                                                        [last] = typeArray.slice(-1);

                                                    } else {
                                                        last = element.type
                                                    }
                                                    validation = validation && [...fileAccept.PDF.value].includes(last);
                                                }
                                                return validation;
                                                // return !value || (value && [fileAccept.PDF.value].includes(value.type))
                                            }
                                        }),
                                    observation: new Observations({schema, name: 'contrato_social', action}).observations
                                },
                                {
                                    inputColsSpan: 'col-span-2',
                                    label: 'Listado de maquinarias y vehículos, donde deberá constar la titularidad y dominio',
                                    value: schema.listado_maquinas_vehiculos,
                                    type: inputsTypes.FILE,
                                    name: 'listado_maquinas_vehiculos',
                                    accept: [fileAccept.PDF.value],
                                    acceptLabel: `Archivos admitidos: ${[fileAccept.PDF.label].join()}`,
                                    maxSize: 'Tamaño maximo por archivo: 10MB',
                                    multiple: false,
                                    validations: yup
                                        .array()
                                        .default([schema.listado_maquinas_vehiculos])
                                        .min(1, 'Debes adjuntar al menos un elemento')
                                        .max(1, 'Solo puedes adjuntar hasta 1 archivo')
                                        .test({
                                            name: 'MAQ_VEHI_SIZE',
                                            exclusive: true,
                                            message: 'Recuerda que cada archivo no debe superar los 10MB',
                                            test: (value) => {
                                                if (!value || value[0] == schema.listado_maquinas_vehiculos)
                                                    return true;
                                                let validation = true;
                                                for (let index = 0; index < value.length; index++) {
                                                    const element = value[index];
                                                    validation = validation && element.size <= 1000000; // 10MB
                                                }
                                                return validation;
                                                // !value || (value && value.size <= 10)
                                            }
                                        })
                                        .test({
                                            name: 'MAQ_VEHI_FILE_FORMAT',
                                            exclusive: true,
                                            message: 'Hay archivos con extensiones no válidas',
                                            test: (value) => {
                                                if (!value) return true;
                                                let validation = true;
                                                for (let index = 0; index < value.length; index++) {
                                                    const element = value[index];
                                                    let last;

                                                    if(!element.type) {
                                                        const nameFile = (element instanceof File)? (element.type == ""? element.name : element) : element
                                                        const typeArray = nameFile.split('.');
                                                        [last] = typeArray.slice(-1);

                                                    } else {
                                                        last = element.type
                                                    }
                                                    validation = validation && [...fileAccept.PDF.value].includes(last);
                                                }
                                                return validation;
                                                // return !value || (value && [fileAccept.PDF.value].includes(value.type))
                                            }
                                        }),
                                    observation: new Observations({schema, name: 'listado_maquinas_vehiculos', action}).observations
                                },
                                {
                                    inputColsSpan: 'col-span-2',
                                    label: 'Cantidad de personal afectado a las tareas extractivas o de exploración. Identificación de los responsables de las plantas de tratamiento',
                                    value: schema.personal_permanente,
                                    type: inputsTypes.FILE,
                                    name: 'personal_permanente',
                                    accept: [fileAccept.PDF.value],
                                    acceptLabel: `Archivos admitidos: ${[fileAccept.PDF.label].join()}`,
                                    maxSize: 'Tamaño maximo por archivo: 10MB',
                                    multiple: false,
                                    validations: yup
                                        .array()
                                        .default([schema.personal_permanente])
                                        .min(1, 'Debes adjuntar al menos un elemento')
                                        .max(1, 'Solo puedes adjuntar hasta 1 archivo')
                                        .test({
                                            name: 'PERS_AF_SIZE',
                                            exclusive: true,
                                            message: 'Recuerda que cada archivo no debe superar los 10MB',
                                            test: (value) => {
                                                if (!value || value[0] == schema.personal_permanente)
                                                    return true;
                                                let validation = true;
                                                for (let index = 0; index < value.length; index++) {
                                                    const element = value[index];
                                                    validation = validation && element.size <= 1000000; // 10MB
                                                }
                                                return validation;
                                                // !value || (value && value.size <= 10)
                                            }
                                        })
                                        .test({
                                            name: 'PERS_AF_FILE_FORMAT',
                                            exclusive: true,
                                            message: 'Hay archivos con extensiones no válidas',
                                            test: (value) => {
                                                if (!value) return true;
                                                let validation = true;
                                                for (let index = 0; index < value.length; index++) {
                                                    const element = value[index];
                                                    let last;

                                                    if(!element.type) {
                                                        const nameFile = (element instanceof File)? (element.type == ""? element.name : element) : element
                                                        const typeArray = nameFile.split('.');
                                                        [last] = typeArray.slice(-1);

                                                    } else {
                                                        last = element.type
                                                    }
                                                    validation = validation && [...fileAccept.PDF.value].includes(last);
                                                }
                                                return validation;
                                                // return !value || (value && [fileAccept.PDF.value].includes(value.type))
                                            }
                                        }),
                                    observation: new Observations({schema, name: 'personal_permanente', action}).observations
                                },
                                {
                                    inputColsSpan: 'col-span-2',
                                    label: 'Acreditación del pago de multas impuestas por la Secretaría de Minería que se encuentren firmes y consentidas',
                                    value: schema.pago_multas,
                                    type: inputsTypes.FILE,
                                    name: 'pago_multas',
                                    accept: [fileAccept.PDF.value],
                                    acceptLabel: `Archivos admitidos: ${[fileAccept.PDF.label].join()}`,
                                    maxSize: 'Tamaño maximo por archivo: 10MB',
                                    multiple: false,
                                    validations: yup
                                        .array()
                                        .default([schema.pago_multas])
                                        .min(1, 'Debes adjuntar al menos un elemento')
                                        .max(1, 'Solo puedes adjuntar hasta 1 archivo')
                                        .test({
                                            name: 'MULTAS_SIZE',
                                            exclusive: true,
                                            message: 'Recuerda que cada archivo no debe superar los 10MB',
                                            test: (value) => {
                                                if (!value || value[0] == schema.pago_multas)
                                                    return true;
                                                let validation = true;
                                                for (let index = 0; index < value.length; index++) {
                                                    const element = value[index];
                                                    validation = validation && element.size <= 1000000; // 10MB
                                                }
                                                return validation;
                                                // !value || (value && value.size <= 10)
                                            }
                                        })
                                        .test({
                                            name: 'MULTAS_FILE_FORMAT',
                                            exclusive: true,
                                            message: 'Hay archivos con extensiones no válidas',
                                            test: (value) => {
                                                if (!value) return true;
                                                let validation = true;
                                                for (let index = 0; index < value.length; index++) {
                                                    const element = value[index];
                                                    let last;

                                                    if(!element.type) {
                                                        const nameFile = (element instanceof File)? (element.type == ""? element.name : element) : element
                                                        const typeArray = nameFile.split('.');
                                                        [last] = typeArray.slice(-1);

                                                    } else {
                                                        last = element.type
                                                    }
                                                    validation = validation && [...fileAccept.PDF.value].includes(last);
                                                }
                                                return validation;
                                                // return !value || (value && [fileAccept.PDF.value].includes(value.type))
                                            }
                                        }),
                                    observation: new Observations({schema, name: 'pago_multas', action}).observations
                                },
                            ]
                        },
                    ]
                },
            ]
        },
    ]
}

// function getChildrens(data, observation) {
//     // los objetos deben tener el mismo orden que en el arreglo de los elementoss
//     let child =[ // default value,
//         {
//             // id elemento, solo agregar al primer objeto
//             id: null,
//             name: 'nombre_mineral',
//             value: null,
//             // solo necesario para los selects que el valor se ha guardado como un json
//             select: true
//         },
//         {
//             name: 'variedad',
//             value: null,
//         },
//         {
//             name: 'produccion',
//             value: null,
//         },
//         {
//             name: 'unidades',
//             value: null,
//             select: true
//         },
//         {
//             name: 'precio_venta',
//             value: null,
//         },
//         // {
//         //     name: 'empresa_compradora',
//         //     value: null,
//         // },
//         // {
//         //     name: 'direccion_empresa_compradora',
//         //     value: null,
//         // },
//         // {
//         //     name: 'actividad_empresa_compradora',
//         //     value: null,
//         // },

//         // si existen evaluaciones, se debe mantener este elemento sin modificar
//         {
//             name: 'row_evaluacion',
//             value: null,
//             comment: null
//         }
//     ]

//     if (!data || data.length == 0) {
//         return [child];
//     }

//     let newChildrens = [];
//     for (let index = 0; index < data.length; index++) {
//         const object = data[index];
//         let clone = JSON.parse(JSON.stringify(child));
//         for (const property in object) {
//             const i = clone.findIndex(e => e.name == property);

//             if (i == -1) continue;

//             if (clone[i].select) {
//                 clone[i].value = {
//                     label: property,
//                     value: object[property]
//                 }

//             } else {
//                 clone[i].value = object[property];
//             }
//             if (typeof clone[i].id !== 'undefined') {
//                 clone[i].id = object["id"];
//             }


//         }

//         // set result observation
//         const obsIndex = clone.findIndex(e => e.name == 'row_evaluacion');
//         if (obsIndex > -1) {
//             clone[obsIndex].value = object["value"];
//             clone[obsIndex].comment = object["comment"];
//         }
//         // let obs = clone.find(e => e.name == 'row_evaluacion');
//         // if (obs) {
//         //     const obsSave = observation.find(e => e.id == clone[0].id);
//         //     if (obsSave) {
//         //         obs.value = obsSave.row_evaluacion;
//         //         obs.comment = obsSave.row_comentario
//         //     }
//         // }
//         // if (clone[0].row_evaluacion) {
//         //     observation[obs]

//         // }


//         // console.log(clone);
//         newChildrens.push(clone);
//     }

//     // newChildrens.push({
//     //     name: 'observacion_row',
//     //     value: null,
//     // });

//     return newChildrens;
// }

function setValue(value, name, schema) {
   return schema[name] = value;
}


function getChildrens({data, key, selectedChild, minerales, action}) {
    let child = selectedChild

    if (!data || data.length == 0) {
        return [child];
    }

    // let newChildrens = [];
    let clone = JSON.parse(JSON.stringify(child));
    let clone2 = JSON.parse(JSON.stringify(child));
    for (let index = 0; index < data.length; index++) {
        const object = data[index];
        for (let index2 = 0; index2 < clone[index].length; index2++) {
            // for(const property in clone[index][index2]) {
                // const i = clone[index].findIndex(e => e.name == property);

                // if (i == -1) continue;

                if (clone[index][index2].type == "select") {
                    // clone[index][index2].value = JSON.parse(object[property]);
                    clone[index][index2].value = minerales?.data.find(e => e.value == object[clone[index][index2]['name']]);
                } else if(clone[index][index2].type == "radio") {
                    clone[index][index2].value = object[clone[index][index2]['name']];
                } else {
                    clone[index][index2].value = object[clone[index][index2]['name']];
                }
                if (typeof clone[index][index2].id === 'undefined') {
                    clone[index][index2].id = object["id"];
                }


            // }

            // set result observation
            const obsIndex = clone[index].findIndex(e => e.name == 'row_evaluacion');
            if (obsIndex > -1) {
                clone[index][obsIndex].value = action == 'evaluate'? object["evaluacion"] : object["comentario"] ;
                clone[index][obsIndex].comment.label = object["evaluacion"];
                clone[index][obsIndex].comment.value = object["comentario"];
            }
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
        }
        if(index + 1 < data.length) clone.push(clone2[0]);
    }

    // newChildrens.push({
    //     name: 'observacion_row',
    //     value: null,
    // });

    return clone;
}
