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
        // select: true
    },
    {
        name: 'calidad',
        value: null,
    },
    {
        name: 'observaciones',
        value: null,
    },
    // si existen evaluaciones, se debe mantener este elemento sin modificar
    {
        name: 'row_evaluacion',
        value: null,
        comment: null
    }
]

const childProduccionAnual =[
    [
        {
            label: '',
            value: '',
            type: inputsTypes.NUMBER,
            name: 'production',
        }
    ]
]

const childComercializacion = [
    [
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
            name: 'firma',
        },
        {
            label: '',
            value: '',
            type: inputsTypes.TEXT,
            name: 'destino',
        },
    ]
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

export async function getFormSchema({ ...schema }, action, dataForm, productors) {
    const departamentos = await axios.get(`/paises/departamentos/74`);
    const minerales = await axios.get(`/minerales/getMinerals`);
    const productor = !schema.id_productor? productors : productors.find( e=> schema.id_productor === e.value );
    const minas = !schema.id_productor? undefined : await axios.get(`/productores/getProductorMina/${productor.value}`);
    const id_departamento = !schema.id_departamento? undefined : departamentos.data.find( e=> schema.id_departamento === e.value );
    const localidades = !schema.id_departamento? undefined : await axios.get(`/paises/localidades/${id_departamento.value}`);
    const id_localidad = !schema.id_localidad || !localidades? undefined : localidades.data.find( e=> schema.id_localidad === e.value );
    const listMinerales = !schema.productos? [] : minerales.data.filter( e1=> schema.productos.find( e2=> e2.nombre_mineral == e1.value) );


console.log(schema);
    // name => unique
    // icons => https://heroicons.com/ => svg d=""
    schema =  [
        {
            icon: 'M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z',
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
                            width: 'w-3/4', //flex
                            columns: 'grid-cols-1', //grid
                            columnsResponsive: 'lg:grid-cols-1', //inside card
                            // infoCard: ''
                           // img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Productor',
                                    value: schema?.id_productor? productor : undefined,
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
                                {
                                    label: 'Mina',
                                    value: !minas? undefined : minas.data.find( e=> schema.id_mina == e.value ),
                                    type: inputsTypes.SELECT,
                                    // get axios
                                    // async: true,
                                    // asyncUrl: '/paises/localidades',
                                    // inputDepends: [''],
                                    // inputClearDepends: [''],
                                    isLoading: false,
                                    //
                                    options: !minas? [] : minas.data,
                                    name: 'id_mina',
                                    multiple: false,
                                    closeOnSelect: true,
                                    searchable: false,
                                    placeholder: 'Selecciona una opción',
                                    validations: yup.object().when('minaSelect', {
                                        is: value => _.isEmpty(value) || !value,
                                        then: yup.object().required('Debes elegir un elemento').nullable()
                                    }),
                                    observation: new Observations({schema, name: 'id_mina', action}).observations
                                },
                                {
                                    label: 'Departamento',
                                    value: schema?.id_departamento? id_departamento : undefined,
                                    type: inputsTypes.SELECT,
                                    // get axios
                                    async: true,
                                    asyncUrl: '/paises/localidades',
                                    inputDepends: ['id_localidad'],
                                    inputClearDepends: ['id_localidad'],
                                    isLoading: false,
                                    //
                                    options: departamentos.data,
                                    name: 'id_departamento',
                                    multiple: false,
                                    closeOnSelect: true,
                                    searchable: false,
                                    placeholder: 'Selecciona una opción',
                                    validations: yup.object().when('departamentoSelect', {
                                        is: value => _.isEmpty(value) || !value,
                                        then: yup.object().required('Debes elegir un elemento').nullable()
                                    }),
                                    observation: new Observations({schema, name: 'id_departamento', action}).observations
                                },
                                {
                                    label: 'Partido',
                                    value: schema?.id_localidad? id_localidad : undefined,
                                    type: inputsTypes.SELECT,
                                    // get axios
                                    async: true,
                                    isLoading: false,
                                    //
                                    options: !localidades?.data? [] : localidades.data,
                                    name: 'id_localidad',
                                    multiple: false,
                                    closeOnSelect: true,
                                    searchable: false,
                                    placeholder: 'Selecciona una opción',
                                    validations: yup.object().when('localidadSelect', {
                                        is: value => _.isEmpty(value) || !value,
                                        then: yup.object().required('Debes elegir un elemento').nullable()
                                    }),
                                    observation: new Observations({schema, name: 'id_localidad', action}).observations
                                },
                                {
                                    label: 'Expediente N°',
                                    value: schema?.expediente,
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
                            width: 'w-3/4', //flex
                            // columns: '', //grid
                            // columnsResponsive: '', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Cielo abierto',
                                    value: schema.cielo_abierto? true : false,
                                    type: inputsTypes.CHECKBOX,
                                    name: 'cielo_abierto',
                                    observation: new Observations({schema, name: 'cielo_abierto', action}).observations

                                },
                                {
                                    label: 'Subterránea',
                                    value: schema.subterranea? true : false,
                                    type: inputsTypes.CHECKBOX,
                                    name: 'subterranea',
                                    observation: new Observations({schema, name: 'subterranea', action}).observations

                                },
                                {
                                    label: 'Manual',
                                    value: schema.manual? true : false,
                                    type: inputsTypes.CHECKBOX,
                                    name: 'manual',
                                    observation: new Observations({schema, name: 'manual', action}).observations

                                },
                                {
                                    label: 'Mecanizada',
                                    value: schema.mecanizada? true : false,
                                    type: inputsTypes.CHECKBOX,
                                    name: 'mecanizada',
                                    observation: new Observations({schema, name: 'mecanizada', action}).observations

                                },
                                {
                                    label: 'Semimecanizada',
                                    value: schema.semimecanizada? true : false,
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
                                    type: inputsTypes.TABLE,
                                    name: "Productos",
                                    typeTable: "horizontal",
                                    addRow: true,
                                    verticalTitle: [],
                                    horizontalTitle: [
                                        'Mineral Extraído',
                                        'Ley',
                                        'Calidad',
                                        'Observaciones'
                                    ],
                                    element: [
                                        [
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
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'ley',
                                                colSpan: '',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'calidad',
                                                colSpan: '',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'observaciones',
                                                colSpan: '',
                                            },
                                            // {
                                            //     colSpan: 'lg:w-5/5',
                                            //     type: 'observation',
                                            //     ...new Observations({schema, name: 'row', action}).observations
                                            // }

                                        ]
                                    ],
                                    observation: new Observations({schema, name: 'Productos', action}).observations,
                                    childrens: getChildrens({ data: schema.productos, selectedChild: childMinerals, listMinerales}),
                                    validations: yup
                                        .array()
                                        .of(
                                            yup.object().shape({
                                                // nombre_mineral: yup.object().when('mineral', {
                                                //     is: value => _.isEmpty(value),
                                                //     then: yup.object().nullable().required('Debes elegir un elemento')
                                                // }),
                                                ley: yup.string().nullable().required('Debes completar este campo'),
                                                calidad: yup.string().nullable().required('Debes completar este campo'),
                                                observaciones: yup.string().required('Debes completar este campo').nullable(),
                                                // direccion_empresa_compradora: yup.string().required('Debes completar este campo').nullable(),
                                                // actividad_empresa_compradora: yup.string().required('Debes completar este campo').nullable(),
                                                row_evaluacion: action == 'evaluate'? yup.string().oneOf(["aprobado", "rechazado", "sin evaluar"], 'Debes seleccionar una opción').nullable().required('Debes seleccionar una opción') : {},
                                                row_comentario: action == 'evaluate'? yup.string().when('observacion_row', { is: "rechazado", then: yup.string().min(5, 'Debes ingresar al menos 5 caracteres').max(50, 'Puedes ingresar hasta 50 caracteres').nullable().required('Debes agregar una observación') }).nullable() : {}
                                            })
                                        )
                                        .strict(),
                                },
                                // {
                                //     label: '',
                                //     type: inputsTypes.LIST,
                                //     name: 'Productos',
                                //     columns: 'grid-cols-1',
                                //     // colSpans + 1
                                //     columnsResponsive: 'lg:grid-cols-3',
                                //     componentDepends: [
                                //         {
                                //             component:'produccion_anual',
                                //             element: 'horizontalTitle',
                                //             titleCell: 'nombre_mineral'
                                //         },
                                //         {
                                //             component:'comercializacion',
                                //             element: 'verticalTitle',
                                //             titleCell: 'nombre_mineral'
                                //         }
                                //     ],
                                //     elements: [
                                //         [
                                //             {
                                //                 label: 'Mineral Extraído',
                                //                 value: {},
                                //                 type: inputsTypes.SELECT,
                                //                 colSpan: '',
                                //                 options: minerales.data,
                                //                 name: 'nombre_mineral',
                                //                 multiple: false,
                                //                 closeOnSelect: true,
                                //                 searchable: false,
                                //                 placeholder: 'Selecciona una opción',
                                //                 componentDepends: [
                                //                     {
                                //                         component:'produccion_anual',
                                //                         element: 'horizontalTitle',
                                //                         titleCell: 'nombre_mineral'
                                //                     },
                                //                     {
                                //                         component:'comercializacion',
                                //                         element: 'verticalTitle',
                                //                         titleCell: 'nombre_mineral'
                                //                     }
                                //                 ],
                                //                 // observation: new Observations({schema, name: 'nombre_mineral', action}).observations
                                //             },
                                //             {
                                //                 label: 'Ley',
                                //                 value: '',
                                //                 type: inputsTypes.TEXT,
                                //                 name: 'ley',
                                //                 colSpan: '',
                                //             },
                                //             {
                                //                 label: 'Calidad',
                                //                 value: '',
                                //                 type: inputsTypes.TEXT,
                                //                 name: 'calidad',
                                //                 colSpan: '',
                                //             },
                                //             {
                                //                 label: 'Observaciones',
                                //                 value: '',
                                //                 type: inputsTypes.TEXT,
                                //                 name: 'observaciones',
                                //                 colSpan: '',
                                //             },
                                //             {
                                //                 colSpan: 'lg:w-5/5',
                                //                 type: 'observation',
                                //                 ...new Observations({schema, name: 'row', action}).observations
                                //             }

                                //         ]
                                //     ],
                                //     childrens: getChildrens({ data: schema.productos, selectedChild: childMinerals, listMinerales}),
                                //     validations: yup
                                //         .array()
                                //         .of(
                                //             yup.object().shape({
                                //                 nombre_mineral: yup.object().when('mineral', {
                                //                     is: value => _.isEmpty(value),
                                //                     then: yup.object().nullable().required('Debes elegir un elemento')
                                //                 }),
                                //                 ley: yup.string().nullable().required('Debes completar este campo'),
                                //                 calidad: yup.string().nullable().required('Debes completar este campo'),
                                //                 observaciones: yup.string().required('Debes completar este campo').nullable(),
                                //                 // direccion_empresa_compradora: yup.string().required('Debes completar este campo').nullable(),
                                //                 // actividad_empresa_compradora: yup.string().required('Debes completar este campo').nullable(),
                                //                 row_evaluacion: action == 'evaluate'? yup.string().oneOf(["aprobado", "rechazado", "sin evaluar"], 'Debes seleccionar una opción').nullable().required('Debes seleccionar una opción') : {},
                                //                 row_comentario: action == 'evaluate'? yup.string().when('observacion_row', { is: "rechazado", then: yup.string().min(5, 'Debes ingresar al menos 5 caracteres').max(50, 'Puedes ingresar hasta 50 caracteres').nullable().required('Debes agregar una observación') }).nullable() : {}
                                //             })
                                //         )
                                //         .strict(),
                                // },
                                {
                                    label: 'Producción Anual',
                                    type: inputsTypes.TABLE,
                                    name: "produccion_anual",
                                    typeTable: "vertical",
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
                                    horizontalTitle: [""],
                                    // element: [
                                    //     childProduccionAnual
                                    //     // [
                                    //     //     {
                                    //     //         label: '',
                                    //     //         value: '',
                                    //     //         type: inputsTypes.NUMBER,
                                    //     //         name: 'production',
                                    //     //     }
                                    //     // ]
                                    // ],
                                    // element: getChildrensTableDepends({ data: schema.productos, key: 'produccion', selectedChild: childProduccionAnual, listMinerales}),
                                    element: _.isEmpty(schema)? childProduccionAnual : getChildrensTableDepends({ data: schema, key: 'produccion', selectedChild: childProduccionAnual, listMinerales}),

                                    observation: new Observations({schema, name: 'produccion_anual', action}).observations,
                                    childrens: getChildrensTableDepends({ data: schema.productos, key: 'produccion', selectedChild: childProduccionAnual, listMinerales}),
                                    validations:
                                        yup
                                        .array()
                                        .of(
                                            yup
                                            .array()
                                            .of(
                                                yup.object().shape({
                                                    production: yup.string().required('Debes completar este campo').nullable()
                                                })
                                            )
                                        )
                                        .strict(),
                                },
                                {
                                    label: 'Comercialización',
                                    type: inputsTypes.TABLE,
                                    name: "comercializacion",
                                    typeTable: "horizontal",
                                    verticalTitle: [],
                                    horizontalTitle: [
                                        'Cantidad mensual',
                                        'Firma compradora',
                                        'Destino'
                                    ],
                                    // element: [
                                    //     [
                                    //         {
                                    //             label: '',
                                    //             value: '',
                                    //             type: inputsTypes.NUMBER,
                                    //             name: 'cantidad',
                                    //         },
                                    //         {
                                    //             label: '',
                                    //             value: '',
                                    //             type: inputsTypes.TEXT,
                                    //             name: 'firma',
                                    //         },
                                    //         {
                                    //             label: '',
                                    //             value: '',
                                    //             type: inputsTypes.TEXT,
                                    //             name: 'destino',
                                    //         },
                                    //     ]
                                    // ],
                                    // element: getChildrensTableDepends({ data: schema.productos, key: 'comercializacion', selectedChild: childComercializacion, listMinerales}),
                                    // element: getChildrensTableDepends({ data: schema, key: 'comercializacion', selectedChild: childComercializacion, listMinerales}),
                                    element: _.isEmpty(schema)? childComercializacion : getChildrensTableDepends({ data: schema, key: 'comercializacion', selectedChild: childComercializacion, listMinerales}),

                                    observation: new Observations({schema, name: 'comercializacion', action}).observations,
                                    validations: yup
                                        .array()
                                        .of(
                                            // yup
                                            // .array()
                                            // .of(
                                                yup.object().shape({
                                                    cantidad: yup.string().nullable().required('Debes completar este campo').min(0, 'No puedes ingresar un valor negativo'),
                                                    firma: yup.string().nullable().required('Debes completar este campo'),
                                                    destino: yup.string().nullable().required('Debes completar este campo'),
                                                })
                                            // )
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
                                    typeTable: "horizontal",
                                    verticalTitle: [
                                        'Explosivos',
                                        'Mechas',
                                        'Detonantes'
                                    ],
                                    horizontalTitle: [
                                        'Nombre',
                                        'Tipo',
                                        'Cantidad mensual',
                                        'Observaciones'
                                    ],
                                    element: [
                                        [
                                            {
                                                label: '',
                                                value: schema?.explosivos?.length > 0? schema.explosivos[0].nombre_explosivo : '',
                                                type: inputsTypes.TEXT,
                                                name: 'nombre_explosivo',
                                            },
                                            {
                                                label: '',
                                                value: schema?.explosivos?.length > 0? schema.explosivos[0].tipo_explosivo : '',
                                                type: inputsTypes.TEXT,
                                                name: 'tipo_explosivo',
                                            },
                                            {
                                                label: '',
                                                value: schema?.explosivos?.length > 0? schema.explosivos[0].cantidad_explosivo : '',
                                                type: inputsTypes.NUMBER,
                                                name: 'cantidad_explosivo',
                                            },
                                            {
                                                label: '',
                                                value: schema?.explosivos?.length > 0? schema.explosivos[0].observaciones_explosivo : '',
                                                type: inputsTypes.TEXT,
                                                name: 'observaciones_explosivo',
                                            },
                                        ],
                                        [
                                            {
                                                label: '',
                                                value: schema?.explosivos?.length > 0? schema.explosivos[1].nombre_explosivo : '',
                                                type: inputsTypes.TEXT,
                                                name: 'nombre_explosivo',
                                            },
                                            {
                                                label: '',
                                                value: schema?.explosivos?.length > 0? schema.explosivos[1].tipo_explosivo : '',
                                                type: inputsTypes.TEXT,
                                                name: 'tipo_explosivo',
                                            },
                                            {
                                                label: '',
                                                value: schema?.explosivos?.length > 0? schema.explosivos[1].cantidad_explosivo : '',
                                                type: inputsTypes.NUMBER,
                                                name: 'cantidad_explosivo',
                                            },
                                            {
                                                label: '',
                                                value: schema?.explosivos?.length > 0? schema.explosivos[1].observaciones_explosivo : '',
                                                type: inputsTypes.TEXT,
                                                name: 'observaciones_explosivo',
                                            },
                                        ],
                                        [
                                            {
                                                label: '',
                                                value: schema?.explosivos?.length > 0? schema.explosivos[2].nombre_explosivo : '',
                                                type: inputsTypes.TEXT,
                                                name: 'nombre_explosivo',
                                            },
                                            {
                                                label: '',
                                                value: schema?.explosivos?.length > 0? schema.explosivos[2].tipo_explosivo : '',
                                                type: inputsTypes.TEXT,
                                                name: 'tipo_explosivo',
                                            },
                                            {
                                                label: '',
                                                value: schema?.explosivos?.length > 0? schema.explosivos[2].cantidad_explosivo : '',
                                                type: inputsTypes.NUMBER,
                                                name: 'cantidad_explosivo',
                                            },
                                            {
                                                label: '',
                                                value: schema?.explosivos?.length > 0? schema.explosivos[2].observaciones_explosivo : '',
                                                type: inputsTypes.TEXT,
                                                name: 'observaciones_explosivo',
                                            },
                                        ],
                                    ],
                                    observation: new Observations({schema, name: 'uso_explosivos', action}).observations,
                                    validations: yup
                                        .array()
                                        .of(
                                            yup.object().shape({
                                                nombre_explosivo: yup.string().nullable().required('Debes completar este campo'),
                                                tipo_explosivo: yup.string().nullable().required('Debes completar este campo'),
                                                cantidad_explosivo: yup.string().nullable().required('Debes completar este campo').min(0, 'No puedes ingresar un valor negativo'),
                                                observaciones_explosivo: yup.string().nullable().required('Debes completar este campo'),
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
            titleStep: 'Polvorín',
            bodyStep: [
                // row 1
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: 'Polvorín',
                            width: 'w-2/4', //flex
                            columns: 'grid-cols-1', //grid
                            columnsResponsive: 'lg:grid-cols-1', //inside card
                            // infoCard: ''
                           // img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Posee polvorín',
                                    value: undefined,
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
                                    validations: yup.object().when('polvorinSelect', {
                                        is: value => _.isEmpty(value) || !value,
                                        then: yup.object().required('Debes elegir un elemento').nullable()
                                    }),
                                    // validations: yup.object().required('Debes elegir una opción').nullable(),
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
            icon: 'M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z',
            bgColorIcon: 'bg-blue-500',
            bgColorProgress: 'bg-blue-300',
            titleStep: 'Personal',
            bodyStep: [
                // row 1
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: 'Cantidad de personal afectado',
                            width: 'w-2/4', //flex
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
            titleStep: 'Combustible',
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
                                    typeTable: "horizontal",
                                    addRow: true,
                                    verticalTitle: [],
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
                                    observation: new Observations({schema, name: 'combustible', action}).observations,
                                    validations: yup
                                        .array()
                                        .of(
                                            yup.object().shape({
                                                nombre: yup.string().nullable().required('Debes completar este campo'),
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
            titleStep: 'Maquinaria',
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
                                    typeTable: "horizontal",
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
                                        ],
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
                                        ],
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
                                        ],
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
            titleStep: 'Anexo 1',
            bodyStep: [
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: 'Anexo 1',
                            width: 'lg:w-full', //flex
                            // columns: '', //grid
                            // columnsResponsive: '', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Personal Afectado a la Mina o Cantera',
                                    type: inputsTypes.TABLE,
                                    name: "anexo1",
                                    typeTable: "horizontal",
                                    addRow: true,
                                    verticalTitle: [],
                                    horizontalTitle: [
                                        'Apellido',
                                        'Nombre',
                                        'DNI',
                                        'Condición',
                                        'Acciones'
                                    ],
                                    element: [
                                        [
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'apellido',
                                            },
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
                                                name: 'dni',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.RADIO,
                                                colSpan: '',
                                                options: [
                                                    { value: 'permanente', label: 'Permanente'},
                                                    { value: 'temporario', label: 'Temporario'},
                                                ],
                                                name: 'condicion',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.REMOVEICON,
                                                colSpan: '',
                                                name: 'remove',
                                            },
                                            // {
                                            //     label: '',
                                            //     value: undefined,
                                            //     type: inputsTypes.SELECT,
                                            //     colSpan: '',
                                            //     options: [
                                            //         { value: 'permanente', label: 'Permanente'},
                                            //         { value: 'Temporario', label: 'Temporario'},
                                            //     ],
                                            //     name: 'condicion',
                                            //     multiple: false,
                                            //     closeOnSelect: true,
                                            //     searchable: false,
                                            //     placeholder: 'Selecciona una opción',
                                            // },
                                        ]
                                    ],
                                    observation: new Observations({schema, name: 'anexo1', action}).observations,
                                    validations: yup
                                        .array()
                                        .of(
                                            yup.object().shape({
                                                apellido: yup.string().nullable().required('Debes completar este campo'),
                                                nombre: yup.string().nullable().required('Debes completar este campo'),
                                                dni: yup.string().nullable().required('Debes completar este campo').min(0, 'No puedes ingresar un valor negativo'),
                                                condicion: yup.string().nullable().required('Debes elegir un elemento'),
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

function getChildrens({data, selectedChild, listMinerales}) {
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
                // clone[i].value = JSON.parse(object[property]);
                clone[i].value = listMinerales[index];
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

function getChildrensTable({data, key, selectedChild, listMinerales}) {
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
                // clone[i].value = JSON.parse(object[property]);
                clone[i].value = listMinerales[index];
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

        newChildrens.push(clone);
    }
    return newChildrens;
}

function getChildrensTableDepends({data, key, selectedChild, listMinerales}) {
    //return
    let child = selectedChild

    if (!data || data.length == 0) {
        return [child];
    }

    let newChildrens = [];
    for (let index = 0; index < data.length; index++) {
        const element = data[index][key];

        let subChildrens = [[]];
        for (let indexE = 0; indexE < element.length; indexE++) {
            const object = element[index];
            let clone = JSON.parse(JSON.stringify(child));
            for (const property in object) {
                const i = clone.findIndex(e => e.name == property);

                if (i == -1) continue;

                if (clone[i].select) {
                    // clone[i].value = JSON.parse(object[property]);
                    clone[i].value = listMinerales[index];
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

            subChildrens[index][indexE] = clone;

        }

        newChildrens[index] = subChildrens;
    }

    return newChildrens;
}


