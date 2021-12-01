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
                                    label: 'Nombre del Propietario, Arrendatario o Razón Social',
                                    value: schema?.id_productor? productor : undefined,
                                    type: inputsTypes.SELECT,
                                    // get axios
                                    inTable: true,
                                    async: true,
                                    asyncUrl: '/productores/getProductorMina',
                                    inputDepends: ['minas.id_mina'],
                                    inputClearDepends: ['minas.id_mina'],
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
                                //         {label: 'Sociedad Anónima', value: 'Sociedad Anónima'},
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
                                //     placeholder: 'Selecciona una opción',
                                //     validations: yup.object().when('tipoSociedadSelect', {
                                //         is: value => _.isEmpty(value) || !value,
                                //         then: yup.object().required('Debes elegir un elemento').nullable()
                                //     }),
                                //     observation: new Observations({schema, name: 'tipo_sociedad_productor', action}).observations
                                // },
                                {
                                    label: 'Datos de las minas o canteras que se explotan',
                                    type: inputsTypes.TABLE,
                                    name: "minas",
                                    typeTable: "horizontal",
                                    addRow: true,
                                    verticalTitle: [],
                                    horizontalTitle: [
                                        'Nombre Yacimiento o Cantera',
                                        'Mineral o Roca Explotados',
                                        'Formas de Explotación',
                                        'Calidad del Producto Explotado',
                                        'Toneladas Brutas Extraídas',
                                        'Acciones'
                                    ],
                                    element: getChildrensTable({
                                        data: [],
                                        // data: schema.equipos,
                                        selectedChild: [
                                            {
                                                label: '',
                                                value: undefined,
                                                type: inputsTypes.SELECT,
                                                isLoading: false,
                                                options: getOptions({schema}),
                                                name: 'id_mina',
                                                multiple: false,
                                                isLoading: false,
                                                closeOnSelect: true,
                                                searchable: false,
                                                placeholder: 'Selecciona una opción',
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
                                                placeholder: 'Selecciona una opción',
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
                            title: 'Equipos - Maquinarias',
                            width: 'md:w-1/4', //flex
                            // columns: '', //grid
                            // columnsResponsive: '', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Compresores',
                                    value: schema.volumen_total,
                                    type: inputsTypes.NUMBER,
                                    name: 'compresores',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'compresores', action}).observations
                                },
                                {
                                    label: 'Grupos Electrógenos',
                                    value: schema.precio_venta,
                                    type: inputsTypes.NUMBER,
                                    name: 'grupo_electrogeno',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'grupo_electrogeno', action}).observations
                                },
                                {
                                    label: 'Camiones Mineraleros',
                                    value: schema.precio_venta,
                                    type: inputsTypes.NUMBER,
                                    name: 'camion_mineralero',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'camion_mineralero', action}).observations
                                },
                                {
                                    label: 'Cargadoras frontales u otras',
                                    value: schema.volumen_comercializado,
                                    type: inputsTypes.NUMBER,
                                    name: 'cargadora_frontal',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'cargadora_frontal', action}).observations
                                },
                                {
                                    label: 'Equipos de ventilación',
                                    value: schema.volumen_comercializado,
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
                                    label: 'Martillos Neumáticos Picadores',
                                    value: schema.volumen_acopiado,
                                    type: inputsTypes.NUMBER,
                                    name: 'martillo_neumatico',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'martillo_neumatico', action}).observations
                                },
                                {
                                    label: 'Vías Decauville (Mts.)',
                                    value: schema.volumen_descarte,
                                    type: inputsTypes.NUMBER,
                                    name: 'via_decauville',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'via_decauville', action}).observations
                                },
                                {
                                    label: 'Vagonetas',
                                    value: schema.capacidad,
                                    type: inputsTypes.NUMBER,
                                    name: 'vagoneta',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'vagoneta', action}).observations
                                },
                                {
                                    label: 'Bombas de Desagote',
                                    value: schema.capacidad,
                                    type: inputsTypes.NUMBER,
                                    name: 'bomba_desagote',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'bomba_desagote', action}).observations
                                },
                                {
                                    label: 'Taller Equipado',
                                    value: schema.capacidad,
                                    type: inputsTypes.NUMBER,
                                    name: 'taller_equipado',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'taller_equipado', action}).observations
                                },
                            ]
                        },
                        {
                            title: 'Formas de explotación',
                            width: 'md:w-1/4', //flex
                            // columns: '', //grid
                            // columnsResponsive: '', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Manual',
                                    // value: schema.prospeccion? true : false,
                                    value: schema.explosivos?.length > 0? true : false,
                                    type: inputsTypes.CHECKBOX,
                                    labelOn: "SI",
                                    labelOff: "NO",
                                    name: 'manual',
                                    observation: new Observations({schema, name: 'manual', action}).observations
                                },
                                {
                                    label: 'Semimecanizada',
                                    // value: schema.prospeccion? true : false,
                                    value: schema.explosivos?.length > 0? true : false,
                                    type: inputsTypes.CHECKBOX,
                                    labelOn: "SI",
                                    labelOff: "NO",
                                    name: 'semimecanizada',
                                    observation: new Observations({schema, name: 'semimecanizada', action}).observations
                                },
                                {
                                    label: 'Mecanizada',
                                    // value: schema.prospeccion? true : false,
                                    value: schema.explosivos?.length > 0? true : false,
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
            titleStep: 'Comercialización',
            bodyStep: [
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: 'Datos de Comercialización',
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
                                    verticalTitle: [],
                                    horizontalTitle: [
                                        'Nombre',
                                        'Variedad y Calidad',
                                        'Tamaño o Granul.',
                                        'Ley Valor',
                                        'Ley Tipo',
                                        'Toneladas',
                                        'Precio Venta Boca Mina por Tn.',
                                        'Existencias No Vendidas al 31/12',
                                        'Acciones'
                                    ],
                                    element: getChildrensTable({
                                        data: [],
                                        // data: schema.equipos,
                                        selectedChild: [
                                            {
                                                label: '',
                                                value: id_mineral,
                                                type: inputsTypes.SELECT,
                                                isLoading: false,
                                                options: minerales.data,
                                                name: 'id_productos',
                                                multiple: false,
                                                isLoading: false,
                                                closeOnSelect: true,
                                                searchable: false,
                                                placeholder: 'Selecciona una opción',
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
                                                id_productos: yup.object().when('mineralSelect', {
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
            infoStep: 'Especificar las etapas de transporte desde Mina hasta el lugar de consumo incluyendo en cada etapa los costos de carga y descarga (Si bien el productor generalmente no efectúa todas las etapas de transporte se le solicita la información al respecto que sea de su conocimiento). Agregar diversas alternativas si las hay.',
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
                                        data: [],
                                        // data: schema.equipos,
                                        selectedChild: [
                                            {
                                                label: '',
                                                value: id_mineral,
                                                type: inputsTypes.SELECT,
                                                isLoading: false,
                                                options: minerales.data,
                                                name: 'id_productos',
                                                multiple: false,
                                                isLoading: false,
                                                closeOnSelect: true,
                                                searchable: false,
                                                placeholder: 'Selecciona una opción',
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
                                                id_productos: yup.object().when('mineralSelect', {
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
            titleStep: 'Producción',
            bodyStep: [
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: 'Destino de la producción',
                            width: 'w-full', //flex
                            // columns: '', //grid
                            // columnsResponsive: '', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: '',
                                    type: inputsTypes.TABLE,
                                    name: "producción",
                                    typeTable: "horizontal",
                                    addRow: true,
                                    verticalTitle: [],
                                    horizontalTitle: [
                                        'Nombre del Producto Vendido',
                                        'Lugar de Consumo',
                                        'Nombre o Razón Social de Firma Compradora',
                                        'Domicilio Comprador',
                                        'Actividad Comprador',
                                        'Acciones'
                                    ],
                                    element: getChildrensTable({
                                        data: [],
                                        // data: schema.equipos,
                                        selectedChild: [
                                            {
                                                label: '',
                                                value: id_mineral,
                                                type: inputsTypes.SELECT,
                                                isLoading: false,
                                                options: minerales.data,
                                                name: 'id_productos',
                                                multiple: false,
                                                isLoading: false,
                                                closeOnSelect: true,
                                                searchable: false,
                                                placeholder: 'Selecciona una opción',
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
                                                id_productos: yup.object().when('mineralSelect', {
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
            infoStep: 'Deberá computarse el promedio anual de personas que trabajan.',
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
                                    label: 'Técnicos',
                                    value: schema.personal_perm_tecnicos ,
                                    type: inputsTypes.NUMBER,
                                    name: 'personal_perm_tecnicos',
                                    validations: yup.string().required('Debes ingresar una cantidad.'),
                                    observation: new Observations({schema, name: 'personal_perm_operarios', action}).observations
                                },
                                {
                                    label: 'Obreros',
                                    value: schema.personal_perm_operarios,
                                    type: inputsTypes.NUMBER,
                                    name: 'personal_perm_operarios',
                                    validations: yup.string().required('Debes ingresar una cantidad.'),
                                    observation: new Observations({schema, name: 'personal_perm_tecnicos', action}).observations
                                },
                                {
                                    label: 'Otros',
                                    value: schema.personal_perm_otros,
                                    type: inputsTypes.NUMBER,
                                    name: 'personal_perm_otros',
                                    validations: yup.string().required('Debes ingresar una cantidad.'),
                                    observation: new Observations({schema, name: 'personal_perm_tecnicos', action}).observations
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
                                    label: 'Ubicación',
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
                                    label: 'Cantidad de meses que trabaja en el año',
                                    value: schema.personal_perm_operarios ,
                                    type: inputsTypes.NUMBER,
                                    name: 'meses_trabajo',
                                    validations: yup.string().required('Debes ingresar una cantidad.'),
                                    observation: new Observations({schema, name: 'meses_trabajo', action}).observations
                                },
                                {
                                    label: 'Razones',
                                    value: '',
                                    type: inputsTypes.RADIO,
                                    colSpan: '',
                                    options: [
                                        { value: 'climatica', label: 'Climática'},
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

            if (clone[i].select) {
                // clone[i].value = JSON.parse(object[property]);
                clone[i].value = listMinerales[index];
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
            clone[obsIndex].value = object["evaluacion"];
            clone[obsIndex].comment.value = object["comentario"];
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
