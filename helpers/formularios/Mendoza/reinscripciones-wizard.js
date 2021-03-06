import * as yup from 'yup';
import Observations from './observaciones';
import inputsTypes from '../../enums/inputsTypes';

let schemaJson;

export async function getFormSchema({ ...schema }, action, dataForm, productors) {
    const departamentos = await axios.get(`/paises/departamentos/46`);
    const minerales = await axios.get(`/minerales/getMinerals`);
    const id_mineral = !schema.nombre_mineral? undefined : minerales.data.find( e=> schema.nombre_mineral == e.value );
    const productor = !schema.id_productor? productors : productors.find( e=> schema.id_productor === e.value );
    const minas = !schema.id_productor? undefined : await axios.get(`/productores/getProductorMina/${productor.value}`);
    const id_departamento = !schema.id_departamento? undefined : departamentos.data.find( e=> schema.id_departamento == e.value );
    const localidades = !schema.id_departamento? undefined : await axios.get(`/paises/localidades/${id_departamento.value}`);
    const id_localidad = !schema.id_localidad || !localidades? undefined : localidades.data.find( e=> schema.id_localidad == e.value );
    // const listMinerales = !schema.productos? [] : minerales.data.filter( e1=> schema.productos.find( e2=> e2.nombre_mineral == e1.value) );
    // name => unique
    // icons => https://heroicons.com/ => svg d=""
    // console.log(schema);
    schemaJson =  [
        {
            icon: 'M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z',
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
                            title: 'Datos del productor minero',
                            width: 'w-full', //flex
                            columns: 'grid-cols-1', //grid
                            columnsResponsive: 'lg:grid-cols-1', //inside card
                            // infoCard: ''
                           // img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Nombre del Propietario, Arrendatario o Raz??n Social',
                                    value: schema?.id_productor? productor : undefined,
                                    type: inputsTypes.SELECT,
                                    // get axios
                                    inTable: true,
                                    async: true,
                                    asyncUrl: '/productores/getProductorMina',
                                    inputDepends: ['productos.id_mina'],
                                    inputClearDepends: ['productos.id_mina'],
                                    isLoading: false,
                                    //
                                    options: productors,
                                    name: 'id_productor',
                                    multiple: false,
                                    closeOnSelect: true,
                                    searchable: false,
                                    placeholder: 'Selecciona una opci??n',
                                    validations: yup.object().when('productorSelect', {
                                        is: value => _.isEmpty(value) || !value,
                                        then: yup.object().required('Debes elegir un elemento').nullable()
                                    }),
                                    observation: new Observations({schema, name: 'id_productor', action}).observations
                                },
                                // {
                                //     label: 'Domicilio',
                                //     value: schema.dimensiones,
                                //     type: inputsTypes.TEXT,
                                //     name: 'domicilio',
                                //     validations: yup.string().required('Debes completar este campo'),
                                //     observation: new Observations({schema, name: 'domicilio', action}).observations

                                // },
                                // {
                                //     label: 'Tipo de sociedad',
                                //     value: schema?.id_productor? productor : undefined,
                                //     type: inputsTypes.SELECT,
                                //     options: [
                                //         {label: 'Individual', value: 'Individual'},
                                //         {label: 'Sociedad An??nima', value: 'Sociedad An??nima'},
                                //         {label: 'Sociedad Colectiva', value: 'Sociedad Colectiva'},
                                //         {label: 'En Comandita', value: 'En Comandita'},
                                //         {label: 'De Capital e Industria', value: 'De Capital e Industria'},
                                //         {label: 'De Responsabilidad Limitada', value: 'De Responsabilidad Limitada'},
                                //         {label: 'Cooperativa en Comandita por Acciones', value: 'Cooperativa en Comandita por Acciones'},
                                //         {label: 'Mixta', value: 'Mixta'},
                                //         {label: 'De Hecho', value: 'De Hecho'},
                                //         {label: 'otra', value: 'otra'},
                                //     ],
                                //     name: 'tipo_sociedad',
                                //     multiple: false,
                                //     closeOnSelect: true,
                                //     searchable: false,
                                //     placeholder: 'Selecciona una opci??n',
                                //     validations: yup.object().when('tipoSociedadSelect', {
                                //         is: value => _.isEmpty(value) || !value,
                                //         then: yup.object().required('Debes elegir un elemento').nullable()
                                //     }),
                                //     observation: new Observations({schema, name: 'tipo_sociedad_productor', action}).observations
                                // },
                                {
                                    label: 'Datos de las minas o canteras que se explotan',
                                    type: inputsTypes.TABLE,
                                    name: "productos",
                                    typeTable: "horizontal",
                                    addRow: true,
                                    verticalTitle: [],
                                    horizontalTitle: [
                                        'Nombre Yacimiento o Cantera',
                                        'Mineral o Roca Explotados',
                                        'Formas de Explotaci??n',
                                        'Calidad del Producto Explotado',
                                        'Toneladas Brutas Extra??das',
                                        'Acciones'
                                    ],
                                    // componentDepends: [
                                    //     "comercializacion.nombre_mineral",
                                    //     "transporte.nombre_mineral",
                                    //     "produccion.nombre_mineral",
                                    // ],
                                    element: getChildrensTable({
                                        data: schema.productos,
                                        selectedChild: [
                                            {
                                                label: '',
                                                value: undefined,
                                                type: inputsTypes.SELECT,
                                                isLoading: false,
                                                options: minas?.data ?? getOptions({schema}),
                                                name: 'id_mina',
                                                multiple: false,
                                                isLoading: false,
                                                closeOnSelect: true,
                                                searchable: false,
                                                placeholder: 'Selecciona una opci??n',
                                                // parent: 'id_productor',
                                                id: '',
                                            },
                                            {
                                                label: '',
                                                value: id_mineral,
                                                type: inputsTypes.SELECT,
                                                isLoading: false,
                                                options: minerales.data,
                                                name: 'nombre_mineral',
                                                multiple: false,
                                                isLoading: false,
                                                closeOnSelect: true,
                                                searchable: false,
                                                placeholder: 'Selecciona una opci??n',
                                                // componentDepends: [
                                                //     "comercializacion.nombre_mineral",
                                                //     "transporte.nombre_mineral",
                                                //     "produccion.nombre_mineral",
                                                // ],
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'explotacion',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'calidad',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.NUMBER,
                                                name: 'capacidad',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.REMOVEICON,
                                                colSpan: '',
                                                name: 'remove',
                                            },
                                            {
                                                type: 'observation',
                                                ...new Observations({schema, name: 'row', action}).observations
                                            }
                                        ],
                                        action
                                    }),
                                    // observation: new Observations({schema, name: 'equipos', action}).observations,
                                    validations: yup
                                        .array()
                                        .of(
                                            yup.object().shape({
                                                id_mina: yup.object().when('idMinaSelect', {
                                                    is: value => _.isEmpty(value) || !value,
                                                    then: yup.object().required('Debes elegir un elemento').nullable()
                                                }).nullable(),
                                                nombre_mineral: yup.object().when('mineralSelect', {
                                                    is: value => _.isEmpty(value) || !value,
                                                    then: yup.object().required('Debes elegir un elemento').nullable()
                                                }).nullable(),
                                                explotacion: yup.string().nullable().required('Debes completar este campo'),
                                                calidad: yup.string().nullable().required('Debes completar este campo'),
                                                capacidad: yup.string().nullable().required('Debes completar este campo'),
                                            })
                                        )
                                        .strict(),
                                },
                            ]
                        },
                    ]
                },
                // {
                //     widthResponsive: 'lg:flex-row', //flex
                //     // columns
                //     body: [
                //         //  col 1
                //         {
                //             title: 'Datos del productor minero',
                //             width: 'w-full', //flex
                //             columns: 'grid-cols-1', //grid
                //             columnsResponsive: 'lg:grid-cols-1', //inside card
                //             // infoCard: ''
                //            // img: '/images/laborales.png',
                //             inputs: [
                //                 {
                //                     label: 'Producto que se destino al consumo propio y/o comercializado',
                //                     type: inputsTypes.TABLE,
                //                     name: "comercializacion",
                //                     typeTable: "horizontal",
                //                     addRow: true,
                //                     componentParentDepends: "productos.nombre_mineral",
                //                     verticalTitle: [],
                //                     horizontalTitle: [
                //                         'Nombre',
                //                         'Variedad y Calidad',
                //                         'Tama??o o Granul.',
                //                         'Ley Valor',
                //                         'Ley Tipo',
                //                         'Toneladas',
                //                         'Precio Venta Boca Mina por Tn.',
                //                         'Existencias No Vendidas al 31/12',
                //                         'Acciones'
                //                     ],
                //                     element: getChildrensTable({
                //                         data: schema.comercializacion,
                //                         selectedChild: [
                //                             {
                //                                 label: '',
                //                                 value: undefined,
                //                                 type: inputsTypes.SELECT,
                //                                 isLoading: false,
                //                                 options: minerales.data,
                //                                 name: 'nombre_mineral',
                //                                 multiple: false,
                //                                 isLoading: false,
                //                                 closeOnSelect: true,
                //                                 searchable: false,
                //                                 placeholder: 'Selecciona una opci??n',
                //                                 id: '',
                //                             },
                //                             {
                //                                 label: '',
                //                                 value: '',
                //                                 type: inputsTypes.TEXT,
                //                                 name: 'variedad_calidad',
                //                             },
                //                             {
                //                                 label: '',
                //                                 value: '',
                //                                 type: inputsTypes.NUMBER,
                //                                 name: 'granul',
                //                             },
                //                             {
                //                                 label: '',
                //                                 value: '',
                //                                 type: inputsTypes.TEXT,
                //                                 name: 'ley_tipo',
                //                             },
                //                             {
                //                                 label: '',
                //                                 value: '',
                //                                 type: inputsTypes.TEXT,
                //                                 name: 'ley_valor',
                //                             },
                //                             {
                //                                 label: '',
                //                                 value: '',
                //                                 type: inputsTypes.NUMBER,
                //                                 name: 'cantidad',
                //                             },
                //                             {
                //                                 label: '',
                //                                 value: '',
                //                                 type: inputsTypes.NUMBER,
                //                                 name: 'precio_venta',
                //                             },
                //                             {
                //                                 label: '',
                //                                 value: '',
                //                                 type: inputsTypes.NUMBER,
                //                                 name: 'no_vendido',
                //                             },
                //                             {
                //                                 label: '',
                //                                 value: '',
                //                                 type: inputsTypes.REMOVEICON,
                //                                 colSpan: '',
                //                                 name: 'remove',
                //                             },
                //                             {
                //                                 type: 'observation',
                //                                 ...new Observations({schema, name: 'row', action}).observations
                //                             }
                //                         ],
                //                         action
                //                     }),
                //                     // observation: new Observations({schema, name: 'equipos', action}).observations,
                //                     validations: yup
                //                         .array()
                //                         .of(
                //                             yup.object().shape({
                //                                 nombre_mineral: yup.object().when('mineralSelect', {
                //                                     is: value => _.isEmpty(value) || !value,
                //                                     then: yup.object().required('Debes elegir un elemento').nullable()
                //                                 }).nullable(),
                //                                 variedad_calidad: yup.string().nullable().required('Debes completar este campo'),
                //                                 granul: yup.string().nullable().required('Debes completar este campo'),
                //                                 ley_tipo: yup.string().nullable().required('Debes completar este campo'),
                //                                 ley_valor: yup.string().nullable().required('Debes completar este campo'),
                //                                 cantidad: yup.string().nullable().required('Debes completar este campo'),
                //                                 precio_venta: yup.string().nullable().required('Debes completar este campo'),
                //                                 no_vendido: yup.string().nullable().required('Debes completar este campo'),
                //                             })
                //                         )
                //                         .strict(),
                //                 },
                //             ]
                //         },
                //     ]
                // },
                // {
                //     widthResponsive: 'lg:flex-row', //flex
                //     // columns
                //     body: [
                //         //  col 1
                //         {
                //             title: 'Datos sobre transporte',
                //             width: 'w-full', //flex
                //             // columns: '', //grid
                //             // columnsResponsive: '', //inside card
                //             img: '/images/laborales.png',
                //             inputs: [
                //                 {
                //                     label: '',
                //                     type: inputsTypes.TABLE,
                //                     name: "transporte",
                //                     componentParentDepends: "productos",
                //                     typeTable: "horizontal",
                //                     addRow: true,
                //                     verticalTitle: [],
                //                     horizontalTitle: [
                //                         'Nombre del Producto Transportado',
                //                         'Desde',
                //                         'Hasta',
                //                         'Distancia (Km.)',
                //                         'Medio de Transporte Usado',
                //                         'Costo de Flete ($/Tn.)',
                //                         'Acciones'
                //                     ],
                //                     element: getChildrensTable({
                //                         data: schema.transporte,
                //                         selectedChild: [
                //                             {
                //                                 label: '',
                //                                 value: undefined,
                //                                 type: inputsTypes.SELECT,
                //                                 isLoading: false,
                //                                 options: minerales.data,
                //                                 name: 'nombre_mineral',
                //                                 multiple: false,
                //                                 isLoading: false,
                //                                 closeOnSelect: true,
                //                                 searchable: false,
                //                                 placeholder: 'Selecciona una opci??n',
                //                                 id: '',
                //                             },
                //                             {
                //                                 label: '',
                //                                 value: '',
                //                                 type: inputsTypes.TEXT,
                //                                 name: 'desde',
                //                             },
                //                             {
                //                                 label: '',
                //                                 value: '',
                //                                 type: inputsTypes.TEXT,
                //                                 name: 'hasta',
                //                             },
                //                             {
                //                                 label: '',
                //                                 value: '',
                //                                 type: inputsTypes.NUMBER,
                //                                 name: 'distancia',
                //                             },
                //                             {
                //                                 label: '',
                //                                 value: '',
                //                                 type: inputsTypes.TEXT,
                //                                 name: 'medio_transporte',
                //                             },
                //                             {
                //                                 label: '',
                //                                 value: '',
                //                                 type: inputsTypes.NUMBER,
                //                                 name: 'coste_flete',
                //                             },
                //                             {
                //                                 label: '',
                //                                 value: '',
                //                                 type: inputsTypes.REMOVEICON,
                //                                 colSpan: '',
                //                                 name: 'remove',
                //                             },
                //                             {
                //                                 type: 'observation',
                //                                 ...new Observations({schema, name: 'row', action}).observations
                //                             }
                //                         ],
                //                         action
                //                     }),
                //                     // observation: new Observations({schema, name: 'equipos', action}).observations,
                //                     validations: yup
                //                         .array()
                //                         .of(
                //                             yup.object().shape({
                //                                 nombre_mineral: yup.object().when('mineralSelect', {
                //                                     is: value => _.isEmpty(value) || !value,
                //                                     then: yup.object().required('Debes elegir un elemento').nullable()
                //                                 }).nullable(),
                //                                 desde: yup.string().nullable().required('Debes completar este campo'),
                //                                 hasta: yup.string().nullable().required('Debes completar este campo'),
                //                                 distancia: yup.string().nullable().required('Debes completar este campo'),
                //                                 medio_transporte: yup.string().nullable().required('Debes completar este campo'),
                //                                 coste_flete: yup.string().nullable().required('Debes completar este campo'),
                //                             })
                //                         )
                //                         .strict(),
                //                 },
                //             ]
                //         },
                //     ]
                // },
                // {
                //     widthResponsive: 'lg:flex-row', //flex
                //     // columns
                //     body: [
                //         //  col 1
                //         {
                //             title: 'Destino de la producci??n',
                //             width: 'w-full', //flex
                //             // columns: '', //grid
                //             // columnsResponsive: '', //inside card
                //             img: '/images/laborales.png',
                //             inputs: [
                //                 {
                //                     label: '',
                //                     type: inputsTypes.TABLE,
                //                     name: "produccion",
                //                     componentParentDepends: "productos",
                //                     typeTable: "horizontal",
                //                     addRow: true,
                //                     verticalTitle: [],
                //                     horizontalTitle: [
                //                         'Nombre del Producto Vendido',
                //                         'Lugar de Consumo',
                //                         'Nombre o Raz??n Social de Firma Compradora',
                //                         'Domicilio Comprador',
                //                         'Actividad Comprador',
                //                         'Acciones'
                //                     ],
                //                     element: getChildrensTable({
                //                         data: schema.produccion,
                //                         selectedChild: [
                //                             {
                //                                 label: '',
                //                                 value: undefined,
                //                                 type: inputsTypes.SELECT,
                //                                 isLoading: false,
                //                                 options: minerales.data,
                //                                 name: 'nombre_mineral',
                //                                 multiple: false,
                //                                 isLoading: false,
                //                                 closeOnSelect: true,
                //                                 searchable: false,
                //                                 placeholder: 'Selecciona una opci??n',
                //                                 id: '',
                //                             },
                //                             {
                //                                 label: '',
                //                                 value: '',
                //                                 type: inputsTypes.TEXT,
                //                                 name: 'lugar_consumo',
                //                             },
                //                             {
                //                                 label: '',
                //                                 value: '',
                //                                 type: inputsTypes.TEXT,
                //                                 name: 'razon_social_comprador',
                //                             },
                //                             {
                //                                 label: '',
                //                                 value: '',
                //                                 type: inputsTypes.TEXT,
                //                                 name: 'domicilio',
                //                             },
                //                             {
                //                                 label: '',
                //                                 value: '',
                //                                 type: inputsTypes.TEXT,
                //                                 name: 'actividad',
                //                             },
                //                             {
                //                                 label: '',
                //                                 value: '',
                //                                 type: inputsTypes.REMOVEICON,
                //                                 colSpan: '',
                //                                 name: 'remove',
                //                             },
                //                             {
                //                                 type: 'observation',
                //                                 ...new Observations({schema, name: 'row', action}).observations
                //                             }
                //                         ],
                //                         action
                //                     }),
                //                     // observation: new Observations({schema, name: 'equipos', action}).observations,
                //                     validations: yup
                //                         .array()
                //                         .of(
                //                             yup.object().shape({
                //                                 nombre_mineral: yup.object().when('mineralSelect', {
                //                                     is: value => _.isEmpty(value) || !value,
                //                                     then: yup.object().required('Debes elegir un elemento').nullable()
                //                                 }).nullable(),
                //                                 lugar_consumo: yup.string().nullable().required('Debes completar este campo'),
                //                                 razon_social_comprador: yup.string().nullable().required('Debes completar este campo'),
                //                                 domicilio: yup.string().nullable().required('Debes completar este campo'),
                //                                 actividad: yup.string().nullable().required('Debes completar este campo'),
                //                             })
                //                         )
                //                         .strict(),
                //                 },
                //             ]
                //         },
                //     ]
                // },
            ]
        },
        {
            icon: 'M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z',
            bgColorIcon: 'bg-blue-500',
            bgColorProgress: 'bg-blue-300',
            titleStep: 'Explotaci??n',
            bodyStep: [
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: 'Equipos - Maquinarias',
                            width: 'md:w-1/4', //flex
                            // columns: '', //grid
                            // columnsResponsive: '', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Compresores',
                                    value: schema.compresores,
                                    type: inputsTypes.NUMBER,
                                    name: 'compresores',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'compresores', action}).observations
                                },
                                {
                                    label: 'Grupos Electr??genos',
                                    value: schema.grupo_electrogeno,
                                    type: inputsTypes.NUMBER,
                                    name: 'grupo_electrogeno',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'grupo_electrogeno', action}).observations
                                },
                                {
                                    label: 'Camiones Mineraleros',
                                    value: schema.camion_mineralero,
                                    type: inputsTypes.NUMBER,
                                    name: 'camion_mineralero',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'camion_mineralero', action}).observations
                                },
                                {
                                    label: 'Cargadoras frontales u otras',
                                    value: schema.cargadora_frontal,
                                    type: inputsTypes.NUMBER,
                                    name: 'cargadora_frontal',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'cargadora_frontal', action}).observations
                                },
                                {
                                    label: 'Equipos de ventilaci??n',
                                    value: schema.equipo_ventilacion,
                                    type: inputsTypes.NUMBER,
                                    name: 'equipo_ventilacion',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'equipo_ventilacion', action}).observations
                                },
                            ]
                        },
                        {
                            title: 'Equipos - Maquinarias',
                            width: 'md:w-1/4', //flex
                            // columns: '', //grid
                            // columnsResponsive: '', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Martillos Neum??ticos Picadores',
                                    value: schema.martillo_neumatico,
                                    type: inputsTypes.NUMBER,
                                    name: 'martillo_neumatico',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'martillo_neumatico', action}).observations
                                },
                                {
                                    label: 'V??as Decauville (Mts.)',
                                    value: schema.via_decauville,
                                    type: inputsTypes.NUMBER,
                                    name: 'via_decauville',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'via_decauville', action}).observations
                                },
                                {
                                    label: 'Vagonetas',
                                    value: schema.vagoneta,
                                    type: inputsTypes.NUMBER,
                                    name: 'vagoneta',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'vagoneta', action}).observations
                                },
                                {
                                    label: 'Bombas de Desagote',
                                    value: schema.bomba_desagote,
                                    type: inputsTypes.NUMBER,
                                    name: 'bomba_desagote',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'bomba_desagote', action}).observations
                                },
                                {
                                    label: 'Taller Equipado',
                                    value: schema.taller_equipado,
                                    type: inputsTypes.NUMBER,
                                    name: 'taller_equipado',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'taller_equipado', action}).observations
                                },
                            ]
                        },
                        {
                            title: 'Formas de explotaci??n',
                            width: 'md:w-1/4', //flex
                            // columns: '', //grid
                            // columnsResponsive: '', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Manual',
                                    // value: schema.prospeccion? true : false,
                                    value: schema.manual > 0? true : false,
                                    type: inputsTypes.CHECKBOX,
                                    labelOn: "SI",
                                    labelOff: "NO",
                                    name: 'manual',
                                    observation: new Observations({schema, name: 'manual', action}).observations
                                },
                                {
                                    label: 'Semimecanizada',
                                    // value: schema.prospeccion? true : false,
                                    value: schema.semimecanizada > 0? true : false,
                                    type: inputsTypes.CHECKBOX,
                                    labelOn: "SI",
                                    labelOff: "NO",
                                    name: 'semimecanizada',
                                    observation: new Observations({schema, name: 'semimecanizada', action}).observations
                                },
                                {
                                    label: 'Mecanizada',
                                    // value: schema.prospeccion? true : false,
                                    value: schema.mecanizada > 0? true : false,
                                    type: inputsTypes.CHECKBOX,
                                    labelOn: "SI",
                                    labelOff: "NO",
                                    name: 'mecanizada',
                                    observation: new Observations({schema, name: 'mecanizada', action}).observations
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
            titleStep: 'Comercializaci??n',
            bodyStep: [
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: 'Datos de Comercializaci??n',
                            width: 'w-full', //flex
                            // columns: '', //grid
                            // columnsResponsive: '', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Producto que se destino al consumo propio y/o comercializado',
                                    type: inputsTypes.TABLE,
                                    name: "comercializacion",
                                    typeTable: "horizontal",
                                    addRow: true,
                                    componentParentDepends: "productos.nombre_mineral",
                                    verticalTitle: [],
                                    horizontalTitle: [
                                        'Nombre',
                                        'Variedad y Calidad',
                                        'Tama??o o Granul.',
                                        'Ley Valor',
                                        'Ley Tipo',
                                        'Toneladas',
                                        'Precio Venta Boca Mina por Tn.',
                                        'Existencias No Vendidas al 31/12',
                                        'Acciones'
                                    ],
                                    element: getChildrensTable({
                                        data: schema.comercializacion,
                                        selectedChild: [
                                            {
                                                label: '',
                                                value: undefined,
                                                type: inputsTypes.SELECT,
                                                isLoading: false,
                                                options: minerales.data,
                                                name: 'nombre_mineral',
                                                multiple: false,
                                                isLoading: false,
                                                closeOnSelect: true,
                                                searchable: false,
                                                placeholder: 'Selecciona una opci??n',
                                                id: '',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'variedad_calidad',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.NUMBER,
                                                name: 'granul',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'ley_tipo',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'ley_valor',
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
                                                type: inputsTypes.NUMBER,
                                                name: 'precio_venta',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.NUMBER,
                                                name: 'no_vendido',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.REMOVEICON,
                                                colSpan: '',
                                                name: 'remove',
                                            },
                                            {
                                                type: 'observation',
                                                ...new Observations({schema, name: 'row', action}).observations
                                            }
                                        ],
                                        action
                                    }),
                                    // observation: new Observations({schema, name: 'equipos', action}).observations,
                                    validations: yup
                                        .array()
                                        .of(
                                            yup.object().shape({
                                                nombre_mineral: yup.object().when('mineralSelect', {
                                                    is: value => _.isEmpty(value) || !value,
                                                    then: yup.object().required('Debes elegir un elemento').nullable()
                                                }).nullable(),
                                                variedad_calidad: yup.string().nullable().required('Debes completar este campo'),
                                                granul: yup.string().nullable().required('Debes completar este campo'),
                                                ley_tipo: yup.string().nullable().required('Debes completar este campo'),
                                                ley_valor: yup.string().nullable().required('Debes completar este campo'),
                                                cantidad: yup.string().nullable().required('Debes completar este campo'),
                                                precio_venta: yup.string().nullable().required('Debes completar este campo'),
                                                no_vendido: yup.string().nullable().required('Debes completar este campo'),
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
            titleStep: 'Transporte',
            infoStep: 'Especificar las etapas de transporte desde Mina hasta el lugar de consumo incluyendo en cada etapa los costos de carga y descarga (Si bien el productor generalmente no efect??a todas las etapas de transporte se le solicita la informaci??n al respecto que sea de su conocimiento). Agregar diversas alternativas si las hay.',
            bodyStep: [
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: 'Datos sobre transporte',
                            width: 'w-full', //flex
                            // columns: '', //grid
                            // columnsResponsive: '', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: '',
                                    type: inputsTypes.TABLE,
                                    name: "transporte",
                                    componentParentDepends: "productos",
                                    typeTable: "horizontal",
                                    addRow: true,
                                    verticalTitle: [],
                                    horizontalTitle: [
                                        'Nombre del Producto Transportado',
                                        'Desde',
                                        'Hasta',
                                        'Distancia (Km.)',
                                        'Medio de Transporte Usado',
                                        'Costo de Flete ($/Tn.)',
                                        'Acciones'
                                    ],
                                    element: getChildrensTable({
                                        data: schema.transporte,
                                        selectedChild: [
                                            {
                                                label: '',
                                                value: undefined,
                                                type: inputsTypes.SELECT,
                                                isLoading: false,
                                                options: minerales.data,
                                                name: 'nombre_mineral',
                                                multiple: false,
                                                isLoading: false,
                                                closeOnSelect: true,
                                                searchable: false,
                                                placeholder: 'Selecciona una opci??n',
                                                id: '',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'desde',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'hasta',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.NUMBER,
                                                name: 'distancia',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'medio_transporte',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.NUMBER,
                                                name: 'coste_flete',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.REMOVEICON,
                                                colSpan: '',
                                                name: 'remove',
                                            },
                                            {
                                                type: 'observation',
                                                ...new Observations({schema, name: 'row', action}).observations
                                            }
                                        ],
                                        action
                                    }),
                                    // observation: new Observations({schema, name: 'equipos', action}).observations,
                                    validations: yup
                                        .array()
                                        .of(
                                            yup.object().shape({
                                                nombre_mineral: yup.object().when('mineralSelect', {
                                                    is: value => _.isEmpty(value) || !value,
                                                    then: yup.object().required('Debes elegir un elemento').nullable()
                                                }).nullable(),
                                                desde: yup.string().nullable().required('Debes completar este campo'),
                                                hasta: yup.string().nullable().required('Debes completar este campo'),
                                                distancia: yup.string().nullable().required('Debes completar este campo'),
                                                medio_transporte: yup.string().nullable().required('Debes completar este campo'),
                                                coste_flete: yup.string().nullable().required('Debes completar este campo'),
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
            titleStep: 'Producci??n',
            bodyStep: [
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: 'Destino de la producci??n',
                            width: 'w-full', //flex
                            // columns: '', //grid
                            // columnsResponsive: '', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: '',
                                    type: inputsTypes.TABLE,
                                    name: "produccion",
                                    componentParentDepends: "productos",
                                    typeTable: "horizontal",
                                    addRow: true,
                                    verticalTitle: [],
                                    horizontalTitle: [
                                        'Nombre del Producto Vendido',
                                        'Lugar de Consumo',
                                        'Nombre o Raz??n Social de Firma Compradora',
                                        'Domicilio Comprador',
                                        'Actividad Comprador',
                                        'Acciones'
                                    ],
                                    element: getChildrensTable({
                                        data: schema.produccion,
                                        selectedChild: [
                                            {
                                                label: '',
                                                value: undefined,
                                                type: inputsTypes.SELECT,
                                                isLoading: false,
                                                options: minerales.data,
                                                name: 'nombre_mineral',
                                                multiple: false,
                                                isLoading: false,
                                                closeOnSelect: true,
                                                searchable: false,
                                                placeholder: 'Selecciona una opci??n',
                                                id: '',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'lugar_consumo',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'razon_social_comprador',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'domicilio',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'actividad',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.REMOVEICON,
                                                colSpan: '',
                                                name: 'remove',
                                            },
                                            {
                                                type: 'observation',
                                                ...new Observations({schema, name: 'row', action}).observations
                                            }
                                        ],
                                        action
                                    }),
                                    // observation: new Observations({schema, name: 'equipos', action}).observations,
                                    validations: yup
                                        .array()
                                        .of(
                                            yup.object().shape({
                                                nombre_mineral: yup.object().when('mineralSelect', {
                                                    is: value => _.isEmpty(value) || !value,
                                                    then: yup.object().required('Debes elegir un elemento').nullable()
                                                }).nullable(),
                                                lugar_consumo: yup.string().nullable().required('Debes completar este campo'),
                                                razon_social_comprador: yup.string().nullable().required('Debes completar este campo'),
                                                domicilio: yup.string().nullable().required('Debes completar este campo'),
                                                actividad: yup.string().nullable().required('Debes completar este campo'),
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
            icon: 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
            bgColorIcon: 'bg-blue-500',
            bgColorProgress: 'bg-blue-300',
            titleStep: 'Personal',
            infoStep: 'Deber?? computarse el promedio anual de personas que trabajan.',
            bodyStep: [
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: 'Datos Personal Ocupado Anual',
                            width: 'lg:w-1/3',
                            columns: 'grid-cols-1', //grid
                            columnsResponsive: 'lg:grid-cols-1', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Profesionales',
                                    value: schema.personal_perm_profesional,
                                    type: inputsTypes.NUMBER,
                                    name: 'personal_perm_profesional',
                                    validations: yup.string().required('Debes ingresar una cantidad.'),
                                    observation: new Observations({schema, name: 'personal_perm_profesional', action}).observations

                                },
                                {
                                    label: 'T??cnicos',
                                    value: schema.personal_perm_tecnicos ,
                                    type: inputsTypes.NUMBER,
                                    name: 'personal_perm_tecnicos',
                                    validations: yup.string().required('Debes ingresar una cantidad.'),
                                    observation: new Observations({schema, name: 'personal_perm_tecnicos', action}).observations
                                },
                                {
                                    label: 'Obreros',
                                    value: schema.personal_perm_operarios,
                                    type: inputsTypes.NUMBER,
                                    name: 'personal_perm_operarios',
                                    validations: yup.string().required('Debes ingresar una cantidad.'),
                                    observation: new Observations({schema, name: 'personal_perm_operarios', action}).observations
                                },
                                {
                                    label: 'Otros',
                                    value: schema.personal_perm_otros,
                                    type: inputsTypes.NUMBER,
                                    name: 'personal_perm_otros',
                                    validations: yup.string().required('Debes ingresar una cantidad.'),
                                    observation: new Observations({schema, name: 'personal_perm_otros', action}).observations
                                },
                            ]
                        },
                        {
                            title: '',
                            width: 'lg:w-1/3',
                            columns: 'grid-cols-1', //grid
                            columnsResponsive: 'lg:grid-cols-1', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Campamento',
                                    value: schema.personal_perm_profesional,
                                    type: inputsTypes.NUMBER,
                                    name: 'campamento',
                                    validations: yup.string().required('Debes ingresar una cantidad.'),
                                    observation: new Observations({schema, name: 'campamento', action}).observations

                                },
                                {
                                    label: 'Ubicaci??n',
                                    value: schema.personal_perm_operarios ,
                                    type: inputsTypes.TEXT,
                                    name: 'ubicacion',
                                    validations: yup.string().required('Debes ingresar una cantidad.'),
                                    observation: new Observations({schema, name: 'ubicacion', action}).observations
                                },
                                {
                                    label: 'Vivienda',
                                    value: schema.personal_perm_tecnicos,
                                    type: inputsTypes.NUMBER,
                                    name: 'vivienda',
                                    validations: yup.string().required('Debes ingresar una cantidad.'),
                                    observation: new Observations({schema, name: 'vivienda', action}).observations
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
            titleStep: 'Tabajo anual',
            bodyStep: [
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: '',
                            width: 'lg:w-3/4', //flex
                            // columns: '', //grid
                            // columnsResponsive: '', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Cantidad de meses que trabaja en el a??o',
                                    value: schema.meses_trabajo ,
                                    type: inputsTypes.NUMBER,
                                    name: 'meses_trabajo',
                                    validations: yup.string().required('Debes ingresar una cantidad.'),
                                    observation: new Observations({schema, name: 'meses_trabajo', action}).observations
                                },
                                {
                                    label: 'Razones',
                                    value: schema.razones_meses_trabajo,
                                    type: inputsTypes.RADIO,
                                    colSpan: '',
                                    options: [
                                        { value: 'climatica', label: 'Clim??tica'},
                                        { value: 'mercado', label: 'Mercado'},
                                    ],
                                    name: 'razones_meses_trabajo',
                                    observation: new Observations({schema, name: 'razones_meses_trabajo', action}).observations
                                },
                            ]
                        },
                    ]
                },
            ]
        },
    ]

    return schemaJson
}

function getOptions({data}) {
    return []
}

function getChildrensTable({data, key, selectedChild, listMinerales, action}) {
    let child = selectedChild

    if (!data || data.length == 0) {
        child = child.filter(e => e.type != "observation");
        return [child];
    }

    let newChildrens = [];
    for (let index = 0; index < data.length; index++) {
        const object = data[index];
        let clone = JSON.parse(JSON.stringify(child));
        for (const property in object) {
            const i = clone.findIndex(e => e.name == property);

            if (i == -1) continue;

            if (clone[i].type == 'select') {
                // clone[i].value = JSON.parse(object[property]);
                // clone[i].value = listMinerales[index];
                clone[i].value = clone[i].options.find( e => object[property] == e.value );
                clone[i].disabled = object["evaluacion"] == "aprobado";

            } else {
                clone[i].value = object[property];
                clone[i].disabled = object["evaluacion"] == "aprobado";
            }
            if (typeof clone[i].id !== 'undefined') {
                clone[i].id = object["id"];
            }
        }

        // set result observation
        const obsIndex = clone.findIndex(e => e.name == 'row_evaluacion');
        if (obsIndex > -1) {

            clone[obsIndex].value = object["value"] ?? object["evaluacion"];
            clone[obsIndex].comment.value = object["comment"] ?? object["comentario"];
        }

        if(action == 'evaluate') {
            clone = clone.filter(e => e.name != 'remove');
        } else {
            clone = clone.filter(e => e.name != 'row_evaluacion');
            // if(object["evaluacion"] == "rechazado") {
                clone.push({
                    type: "comment",
                    value: object["comentario"]
                });
            // }
            if(object["evaluacion"] == "aprobado") {
                clone = clone.filter(e => e.name != 'remove');
            }
        }

        newChildrens.push(clone);
    }
    return newChildrens;
}