import * as yup from 'yup';
import Observations from './observaciones';
import inputsTypes from '../../enums/inputsTypes';
import fileAccept from '../../enums/fileAccept';

const childMinerals =[ // default value,
    {
        // id elemento, solo agregar al primer objeto
        id: null,
        name: 'nombre_mineral',
        value: null,
        // solo necesario para los selects que el valor se ha guardado como un json
        select: true
    },
    {
        name: 'ley',
        value: null,
        // solo necesario para los selects que el valor se ha guardado como un json
        select: true
    },
    {
        name: 'calidad',
        value: null,
    },
    {
        name: 'observaciones',
        value: null,
    },
    // {
    //     name: 'empresa_compradora',
    //     value: null,
    // },
    // {
    //     name: 'direccion_empresa_compradora',
    //     value: null,
    // },
    // {
    //     name: 'actividad_empresa_compradora',
    //     value: null,
    // },

    // si existen evaluaciones, se debe mantener este elemento sin modificar
    {
        name: 'row_evaluacion',
        value: null,
        comment: null
    }
]

// const childMinerals =[ // default value,
//     {
//         // id elemento, solo agregar al primer objeto
//         id: null,
//         name: 'mes',
//         value: 'Enero',
//         // solo necesario para los selects que el valor se ha guardado como un json
//         select: true
//     },
//     {
//         name: 'variedad',
//         value: null,
//     },
//     {
//         name: 'produccion',
//         value: null,
//     },
//     {
//         name: 'unidades',
//         value: null,
//         select: true
//     },
//     {
//         name: 'precio_venta',
//         value: null,
//     },
//     // {
//     //     name: 'empresa_compradora',
//     //     value: null,
//     // },
//     // {
//     //     name: 'direccion_empresa_compradora',
//     //     value: null,
//     // },
//     // {
//     //     name: 'actividad_empresa_compradora',
//     //     value: null,
//     // },

//     // si existen evaluaciones, se debe mantener este elemento sin modificar
//     {
//         name: 'row_evaluacion',
//         value: null,
//         comment: null
//     }
// ]

let schema;

export async function getFormSchema({ ...schema }, action, dataForm) {
    const departamentos = await axios.get(`/paises/departamentos/74`);
    const minerales = await axios.get(`/minerales/getMinerals`);

    // name => unique
    // icons => https://heroicons.com/ => svg d=""
    schema =  [
        {
            icon: 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
            bgColorIcon: 'bg-blue-500',
            bgColorProgress: 'bg-blue-300',
            titleStep: 'Producción',
            bodyStep: [
                // row 1
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: 'Producción primaria',
                            width: 'lg:w-2/4', //flex
                            columns: 'grid-cols-1', //grid
                            columnsResponsive: 'lg:grid-cols-1', //inside card
                            // infoCard: ''
                           // img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Departamento',
                                    value: undefined,
                                    type: inputsTypes.SELECT,
                                    // get axios
                                    async: true,
                                    asyncUrl: '/paises/localidades',
                                    inputDepends: ['localidad'],
                                    inputClearDepends: ['localidad'],
                                    isLoading: false,
                                    //
                                    options: departamentos.data,
                                    name: 'departamento',
                                    multiple: false,
                                    closeOnSelect: true,
                                    searchable: false,
                                    placeholder: 'Selecciona una opción',
                                    validations: yup.object().when('departamentoSelect', {
                                        is: value => _.isEmpty(value) || !value,
                                        then: yup.object().required('Debes elegir un elemento').nullable()
                                    }),
                                    observation: new Observations({schema, name: 'departamento', action}).observations
                                },
                                {
                                    label: 'Partido',
                                    value: undefined,
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
                                    observation: new Observations({schema, name: 'localidad', action}).observations
                                },
                                {
                                    label: 'Expediente N°',
                                    value: schema.cargo,
                                    type: inputsTypes.TEXT,
                                    name: 'expediente',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'expediente', action}).observations

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
            titleStep: 'Explotación',
            bodyStep: [
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: 'Explotación',
                            width: 'lg:w-3/4', //flex
                            // columns: '', //grid
                            // columnsResponsive: '', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Cielo abierto',
                                    value: schema.prospeccion? true : false,
                                    type: inputsTypes.CHECKBOX,
                                    name: 'cielo_abierto',
                                    observation: new Observations({schema, name: 'cielo_abierto', action}).observations

                                },
                                {
                                    label: 'Subterránea',
                                    value: schema.prospeccion? true : false,
                                    type: inputsTypes.CHECKBOX,
                                    name: 'subterranea',
                                    observation: new Observations({schema, name: 'subterranea', action}).observations

                                },
                                {
                                    label: 'Manual',
                                    value: schema.prospeccion? true : false,
                                    type: inputsTypes.CHECKBOX,
                                    name: 'manual',
                                    observation: new Observations({schema, name: 'manual', action}).observations

                                },
                                {
                                    label: 'Mecanizada',
                                    value: schema.prospeccion? true : false,
                                    type: inputsTypes.CHECKBOX,
                                    name: 'mecanizada',
                                    observation: new Observations({schema, name: 'mecanizada', action}).observations

                                },
                                {
                                    label: 'Semimecanizada',
                                    value: schema.prospeccion? true : false,
                                    type: inputsTypes.CHECKBOX,
                                    name: 'semimecanizada',
                                    observation: new Observations({schema, name: 'semimecanizada', action}).observations

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
            titleStep: 'Minerales',
            bodyStep: [
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: 'Minerales',
                            width: 'lg:w-3/4', //flex
                            // columns: '', //grid
                            // columnsResponsive: '', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: '',
                                    type: inputsTypes.LIST,
                                    name: 'minerales',
                                    columns: 'grid-cols-1',
                                    // colSpans + 1
                                    columnsResponsive: 'lg:grid-cols-3',
                                    componentDepends: [
                                        {
                                            component:'produccion_anual',
                                            element: 'horizontalTitle',
                                            titleCell: 'nombre_mineral'
                                        },
                                        {
                                            component:'comercializacion',
                                            element: 'verticalTitle',
                                            titleCell: 'nombre_mineral'
                                        }
                                    ],
                                    childrens: getChildrens(schema.productos, childMinerals),
                                    elements: [
                                        [
                                            {
                                                label: 'Mineral Extraído',
                                                value: {},
                                                type: inputsTypes.SELECT,
                                                colSpan: '',
                                                options: minerales.data,
                                                name: 'nombre_mineral',
                                                multiple: false,
                                                closeOnSelect: true,
                                                searchable: false,
                                                placeholder: 'Selecciona una opción',
                                                componentDepends: [
                                                    {
                                                        component:'produccion_anual',
                                                        element: 'horizontalTitle',
                                                        titleCell: 'nombre_mineral'
                                                    },
                                                    {
                                                        component:'comercializacion',
                                                        element: 'verticalTitle',
                                                        titleCell: 'nombre_mineral'
                                                    }
                                                ],
                                                // observation: new Observations({schema, name: 'nombre_mineral', action}).observations
                                            },
                                            {
                                                label: 'Ley',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'ley',
                                                colSpan: '',
                                            },
                                            {
                                                label: 'Calidad',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'calidad',
                                                colSpan: '',
                                            },
                                            {
                                                label: 'Observaciones',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'observaciones',
                                                colSpan: '',
                                            },
                                            {
                                                colSpan: 'lg:w-5/5',
                                                type: 'observation',
                                                ...new Observations({schema, name: 'row', action}).observations
                                            }

                                        ]
                                    ],
                                    validations: yup
                                        .array()
                                        .of(
                                            yup.object().shape({
                                                variedad: yup.string().nullable().required('Debes completar este campo'),
                                                nombre_mineral: yup.object().when('mineral', {
                                                    is: value => _.isEmpty(value),
                                                    then: yup.object().nullable().required('Debes elegir un elemento')
                                                }),
                                                produccion: yup.string().nullable().required('Debes completar este campo'),
                                                unidades: yup.object().when('unidadesSelect', {
                                                        is: value => _.isEmpty(value),
                                                        then: yup.object().nullable().required('Debes elegir un elemento')
                                                }),
                                                precio_venta: yup.string().nullable().required('Debes completar este campo'),
                                                // empresa_compradora: yup.string().required('Debes completar este campo').nullable(),
                                                // direccion_empresa_compradora: yup.string().required('Debes completar este campo').nullable(),
                                                // actividad_empresa_compradora: yup.string().required('Debes completar este campo').nullable(),
                                                row_evaluacion: action == 'evaluate'? yup.string().oneOf(["aprobado", "rechazado", "sin evaluar"], 'Debes seleccionar una opción').nullable().required('Debes seleccionar una opción') : {},
                                                row_comentario: action == 'evaluate'? yup.string().when('observacion_row', { is: "rechazado", then: yup.string().min(5, 'Debes ingresar al menos 5 caracteres').max(50, 'Puedes ingresar hasta 50 caracteres').nullable().required('Debes agregar una observación') }).nullable() : {}
                                            })
                                        )
                                        .strict(),
                                },
                                {
                                    label: 'Producción Anual',
                                    type: inputsTypes.TABLE,
                                    name: "produccion_anual",
                                    verticalTitle: [
                                        'Enero',
                                        'Febrero',
                                        'Marzo',
                                        'Abril',
                                        'Mayo',
                                        'Junio',
                                        'Julio',
                                        'Agosto',
                                        'Septiembre',
                                        'Octubre',
                                        'Noviembre',
                                        'Diciembre'
                                    ],
                                    horizontalTitle: [],
                                    element: [
                                        [
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.NUMBER,
                                                name: 'production',
                                            }
                                        ]
                                    ],
                                    observation: new Observations({schema, name: 'production', action}).observations,
                                    validations: yup
                                        .array()
                                        .of(
                                            yup.object().shape({
                                                production: yup.string().nullable().required('Debes completar este campo')
                                            })
                                        )
                                        .strict(),
                                },
                                {
                                    label: 'Comercialización',
                                    type: inputsTypes.TABLE,
                                    name: "comercializacion",
                                    verticalTitle: [],
                                    horizontalTitle: [
                                        'Cantidad mensual',
                                        'Firma compradora',
                                        'Destino'
                                    ],
                                    element: [
                                        [
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'marca',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.NUMBER,
                                                name: 'cantidad',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'observaciones',
                                            },
                                        ]
                                    ],
                                    // observation: new Observations({schema, name: 'production', action}).observations,
                                    validations: yup
                                        .array()
                                        .of(
                                            yup.object().shape({
                                                marca: yup.string().nullable().required('Debes completar este campo'),
                                                cantidad: yup.string().nullable().required('Debes completar este campo').min(0, 'No puedes ingresar un valor negativo'),
                                                observaciones: yup.string().nullable().required('Debes completar este campo'),
                                            })
                                        )
                                        .strict(),
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
            titleStep: 'Explosivos',
            bodyStep: [
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: 'Uso de explosivos',
                            width: 'lg:w-3/4', //flex
                            // columns: '', //grid
                            // columnsResponsive: '', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: '',
                                    type: inputsTypes.TABLE,
                                    name: "uso_explosivos",
                                    verticalTitle: [
                                        'Explosivos',
                                        'Mechas',
                                        'Detonantes'
                                    ],
                                    horizontalTitle: [
                                        // '',
                                        'Nombre',
                                        'Tipo',
                                        'Cantidad mensual',
                                        'Observaciones'
                                    ],
                                    element: [
                                        [
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'nombre',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'tipo',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.NUMBER,
                                                name: 'cantidad',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'observaciones',
                                            },
                                        ]
                                    ],
                                    // observation: new Observations({schema, name: 'production', action}).observations,
                                    validations: yup
                                        .array()
                                        .of(
                                            yup.object().shape({
                                                production: yup.string().nullable().required('Debes completar este campo'),
                                                tipo: yup.string().nullable().required('Debes completar este campo'),
                                                cantidad: yup.string().nullable().required('Debes completar este campo').min(0, 'No puedes ingresar un valor negativo'),
                                                observaciones: yup.string().nullable().required('Debes completar este campo'),
                                            })
                                        )
                                        .strict(),
                                },
                            ]
                        },
                    ]
                },
            ]
        },
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
                            title: 'Polvorín',
                            width: 'lg:w-2/4', //flex
                            columns: 'grid-cols-1', //grid
                            columnsResponsive: 'lg:grid-cols-1', //inside card
                            // infoCard: ''
                           // img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Posee polvorín',
                                    value: {},
                                    type: inputsTypes.SELECT,
                                    options: [
                                        {label: 'SI', value: 'si'},
                                        {label: 'NO', value: 'no'}
                                    ],
                                    name: 'polvorin',
                                    multiple: false,
                                    closeOnSelect: true,
                                    searchable: false,
                                    placeholder: 'Selecciona una opción',
                                    // validations: yup.object().when('polvorinSelect', {
                                    //     is: value => _.isEmpty(value) || !value,
                                    //     then: yup.object().required('Debes elegir un elemento').nullable()
                                    // }),
                                    validations: yup.object().required('Debes elegir una opción').nullable(),
                                    observation: new Observations({schema, name: 'polvorin', action}).observations
                                },
                                {
                                    label: 'Ubicación',
                                    value: '',
                                    type: inputsTypes.TEXT,
                                    name: 'ubicacion',
                                    validations: yup.string().when("polvorin", {
                                        is: value => value?.value === 'si',
                                        then: yup
                                          .string()
                                          .required("Debes completar este campo si se utiliza polvorín").nullable()
                                    }),
                                    observation: new Observations({schema, name: 'ubicacion', action}).observations
                                },
                                {
                                    label: 'Dimensiones',
                                    value: '',
                                    type: inputsTypes.NUMBER,
                                    name: 'dimensiones',
                                    validations: yup.string().when("polvorin", {
                                        is: value => value?.value === 'si',
                                        then: yup
                                          .string()
                                          .required("Debes completar este campo si se utiliza polvorín").nullable()
                                    }),
                                    observation: new Observations({schema, name: 'dimensiones', action}).observations

                                }
                            ]
                        },

                    ]
                },
            ]
        },
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
                            title: 'Cantidad de personal afectado',
                            width: 'lg:w-2/4', //flex
                            columns: 'grid-cols-1', //grid
                            columnsResponsive: 'lg:grid-cols-1', //inside card
                            // infoCard: ''
                           // img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Permanente (en letra)',
                                    value: '',
                                    type: inputsTypes.TEXT,
                                    name: 'personal_permanente',
                                    validations: yup.string().required('Debes completar este campo').nullable(),
                                    observation: new Observations({schema, name: 'personal_permanente', action}).observations
                                },
                                {
                                    label: 'Temporario (en letra)',
                                    value: '',
                                    type: inputsTypes.TEXT,
                                    name: 'temporario',
                                    validations: yup.string().required('Debes completar este campo').nullable(),
                                    observation: new Observations({schema, name: 'temporario', action}).observations
                                },
                                {
                                    label: 'Total (en letra)',
                                    value: '',
                                    type: inputsTypes.TEXT,
                                    name: 'total',
                                    validations: yup.string().required('Debes completar este campo').nullable(),
                                    observation: new Observations({schema, name: 'total', action}).observations
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
            titleStep: 'Producción',
            bodyStep: [
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: 'Combustible utilizado',
                            width: 'lg:w-3/4', //flex
                            // columns: '', //grid
                            // columnsResponsive: '', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: '',
                                    type: inputsTypes.TABLE,
                                    name: "combustible",
                                    verticalTitle: ['','','',''],
                                    horizontalTitle: [
                                        'Combustible',
                                        'Tipo',
                                        'Cantidad mensual',
                                        'Observaciones'
                                    ],
                                    element: [
                                        [
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'combustible',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'tipo',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.NUMBER,
                                                name: 'cantidad',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'observaciones',
                                            },
                                        ]
                                    ],
                                    // observation: new Observations({schema, name: 'production', action}).observations,
                                    validations: yup
                                        .array()
                                        .of(
                                            yup.object().shape({
                                                production: yup.string().nullable().required('Debes completar este campo'),
                                                tipo: yup.string().nullable().required('Debes completar este campo'),
                                                cantidad: yup.string().nullable().required('Debes completar este campo').min(0, 'No puedes ingresar un valor negativo'),
                                                observaciones: yup.string().nullable().required('Debes completar este campo'),
                                            })
                                        )
                                        .strict(),
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
            titleStep: 'Producción',
            bodyStep: [
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: 'Combustible utilizado',
                            width: 'lg:w-3/4', //flex
                            // columns: '', //grid
                            // columnsResponsive: '', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: '',
                                    type: inputsTypes.TABLE,
                                    name: "combustible",
                                    verticalTitle: ['','','',''],
                                    horizontalTitle: [
                                        'Combustible',
                                        'Tipo',
                                        'Cantidad mensual',
                                        'Observaciones'
                                    ],
                                    element: [
                                        [
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'combustible',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'tipo',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.NUMBER,
                                                name: 'cantidad',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'observaciones',
                                            },
                                        ]
                                    ],
                                    // observation: new Observations({schema, name: 'production', action}).observations,
                                    validations: yup
                                        .array()
                                        .of(
                                            yup.object().shape({
                                                production: yup.string().nullable().required('Debes completar este campo'),
                                                tipo: yup.string().nullable().required('Debes completar este campo'),
                                                cantidad: yup.string().nullable().required('Debes completar este campo').min(0, 'No puedes ingresar un valor negativo'),
                                                observaciones: yup.string().nullable().required('Debes completar este campo'),
                                            })
                                        )
                                        .strict(),
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
            titleStep: 'Producción',
            bodyStep: [
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: 'Equipos, maquinarias y herramientas',
                            width: 'lg:w-3/4', //flex
                            // columns: '', //grid
                            // columnsResponsive: '', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: '',
                                    type: inputsTypes.TABLE,
                                    name: "equipos",
                                    verticalTitle: [
                                        'COMPRESORES',
                                        'MARTILLOS',
                                        'OTRAS HERRAMIENTAS'
                                    ],
                                    horizontalTitle: [
                                        'Marca',
                                        'Cantidad',
                                        'Observaciones'
                                    ],
                                    element: [
                                        [
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'marca',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.NUMBER,
                                                name: 'cantidad',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'observaciones',
                                            },
                                        ]
                                    ],
                                    // observation: new Observations({schema, name: 'production', action}).observations,
                                    validations: yup
                                        .array()
                                        .of(
                                            yup.object().shape({
                                                marca: yup.string().nullable().required('Debes completar este campo'),
                                                cantidad: yup.string().nullable().required('Debes completar este campo').min(0, 'No puedes ingresar un valor negativo'),
                                                observaciones: yup.string().nullable().required('Debes completar este campo'),
                                            })
                                        )
                                        .strict(),
                                },
                            ]
                        },
                    ]
                },
            ]
        },

    ]

    return schema
}

function getChildrens(data, selectedChild) {
    // los objetos deben tener el mismo orden que en el arreglo de los elementoss
    // let child =[ // default value,
    //     {
    //         // id elemento, solo agregar al primer objeto
    //         id: null,
    //         name: 'nombre_mineral',
    //         value: null,
    //         // solo necesario para los selects que el valor se ha guardado como un json
    //         select: true
    //     },
    //     {
    //         name: 'variedad',
    //         value: null,
    //     },
    //     {
    //         name: 'produccion',
    //         value: null,
    //     },
    //     {
    //         name: 'unidades',
    //         value: null,
    //         select: true
    //     },
    //     {
    //         name: 'precio_venta',
    //         value: null,
    //     },
    //     // {
    //     //     name: 'empresa_compradora',
    //     //     value: null,
    //     // },
    //     // {
    //     //     name: 'direccion_empresa_compradora',
    //     //     value: null,
    //     // },
    //     // {
    //     //     name: 'actividad_empresa_compradora',
    //     //     value: null,
    //     // },

    //     // si existen evaluaciones, se debe mantener este elemento sin modificar
    //     {
    //         name: 'row_evaluacion',
    //         value: null,
    //         comment: null
    //     }
    // ]

    let child = selectedChild

    if (!data || data.length == 0) {
        return [child];
    }

    let newChildrens = [];
    for (let index = 0; index < data.length; index++) {
        const object = data[index];
        let clone = JSON.parse(JSON.stringify(child));
        for (const property in object) {
            const i = clone.findIndex(e => e.name == property);

            if (i == -1) continue;

            if (clone[i].select) {
                clone[i].value = JSON.parse(object[property]);
            } else {
                clone[i].value = object[property];
            }
            if (typeof clone[i].id !== 'undefined') {
                clone[i].id = object["id"];
            }


        }

        // set result observation
        const obsIndex = clone.findIndex(e => e.name == 'row_evaluacion');
        if (obsIndex > -1) {
            clone[obsIndex].value = object["value"];
            clone[obsIndex].comment = object["comment"];
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
        newChildrens.push(clone);
    }

    // newChildrens.push({
    //     name: 'observacion_row',
    //     value: null,
    // });

    return newChildrens;
}



