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

const childProduccionAnual =[ // default value,
    {
        label: '',
        value: '',
        type: inputsTypes.NUMBER,
        name: 'cantidad',
    }
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

let schema;

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


// console.log(schema);
    // name => unique
    // icons => https://heroicons.com/ => svg d=""
    schema =  [
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
                            title: 'Datos de la Cantera, Mina o Manifestación',
                            width: 'w-2/5', //flex
                            columns: 'grid-cols-1', //grid
                            columnsResponsive: 'lg:grid-cols-1', //inside card
                            // infoCard: ''
                           // img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'N° de expediente',
                                    value: schema.expediente,
                                    type: inputsTypes.TEXT,
                                    name: 'expediente',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'expediente', action}).observations
                                },
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
                                    value: !minas? undefined : minas.data.find( e=> schema.id_mina === e.value ),
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
                                    label: 'Mineral Extraído',
                                    value: id_mineral,
                                    type: inputsTypes.SELECT,
                                    colSpan: '',
                                    options: minerales.data,
                                    name: 'nombre_mineral',
                                    multiple: false,
                                    closeOnSelect: true,
                                    searchable: true,
                                    placeholder: 'Selecciona una opción',
                                    validations: yup.object().when('mineralSelect', {
                                        is: value => _.isEmpty(value) || !value,
                                        then: yup.object().required('Debes elegir un elemento').nullable()
                                    }),
                                    observation: new Observations({schema, name: 'nombre_mineral', action}).observations
                                },
                                {
                                    label: 'Superficie de concesión',
                                    value: schema.dimensiones,
                                    type: inputsTypes.TEXT,
                                    name: 'dimensiones',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'dimensiones', action}).observations

                                },
                                {
                                    label: 'Reserva',
                                    value: schema.reserva,
                                    type: inputsTypes.TEXT,
                                    name: 'reserva',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'reserva', action}).observations

                                },
                                {
                                    label: 'Vida útil',
                                    value: schema.vida_util,
                                    type: inputsTypes.NUMBER,
                                    name: 'vida_util',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'vida_util', action}).observations

                                },
                            ]
                        },
                        {
                            title: 'Datos de la Cantera, Mina o Manifestación',
                            width: 'w-2/5', //flex
                            columns: 'grid-cols-1', //grid
                            columnsResponsive: 'lg:grid-cols-1', //inside card
                            // infoCard: ''
                           // img: '/images/laborales.png',
                            inputs: [
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
                                    label: 'Distrito',
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
                                    label: 'Fecha de concesión',
                                    value: schema.fecha_concesion,
                                    type: inputsTypes.DATE,
                                    name: 'fecha_concesion',
                                    validations: yup.date().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'fecha_concesion', action}).observations

                                },
                                {
                                    label: 'Años de concesión',
                                    value: schema.anios_concesion,
                                    type: inputsTypes.NUMBER,
                                    name: 'anios_concesion',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'anios_concesion', action}).observations

                                },
                                {
                                    label: 'Fecha inicio de la explotación',
                                    value: schema.inicio_explotacion,
                                    type: inputsTypes.DATE,
                                    name: 'inicio_explotacion',
                                    validations: yup.date().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'inicio_explotacion', action}).observations

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
                            title: 'Producción anual',
                            width: 'w-2/5', //flex
                            // columns: '', //grid
                            // columnsResponsive: '', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Volumen Total aprox. explotado (m², m³) o Peso Total aprox. explotado (Tn o Kg)',
                                    value: schema.volumen_total,
                                    type: inputsTypes.NUMBER,
                                    name: 'volumen_total',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'volumen_total', action}).observations
                                },
                                {
                                    label: 'Valor unitario de mineral (Peso o  Volumen)',
                                    value: schema.precio_venta,
                                    type: inputsTypes.NUMBER,
                                    name: 'precio_venta',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'precio_venta', action}).observations
                                },
                                {
                                    label: 'Volumen o Peso Comercializado',
                                    value: schema.volumen_comercializado,
                                    type: inputsTypes.NUMBER,
                                    name: 'volumen_comercializado',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'volumen_comercializado', action}).observations
                                },
                            ]
                        },
                        {
                            title: 'Producción anual',
                            width: 'w-2/5', //flex
                            // columns: '', //grid
                            // columnsResponsive: '', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Volumen o Peso de Acopiado aproximado',
                                    value: schema.volumen_acopiado,
                                    type: inputsTypes.NUMBER,
                                    name: 'volumen_acopiado',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'volumen_acopiado', action}).observations
                                },
                                {
                                    label: 'Volumen o Peso descarte aproximado',
                                    value: schema.volumen_descarte,
                                    type: inputsTypes.NUMBER,
                                    name: 'volumen_descarte',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'volumen_descarte', action}).observations
                                },
                                {
                                    label: 'Capacidad de Producción mensual o anual',
                                    value: schema.capacidad,
                                    type: inputsTypes.NUMBER,
                                    name: 'capacidad',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'capacidad', action}).observations
                                },
                                // {
                                //     label: 'Procesamiento del mineral (tratamiento realizado en cantera o mina)',
                                //     value: schema.cargo,
                                //     type: inputsTypes.TEXTAREA,
                                //     name: 'procesamiento_mineral',
                                //     validations: yup.string().required('Debes completar este campo'),
                                //     observation: new Observations({schema, name: 'procesamiento_mineral', action}).observations
                                // },
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
            titleStep: 'Procesamiento',
            bodyStep: [
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: 'Procesamiento del mineral (tratamiento realizado en cantera o mina)',
                            width: 'w-3/4', //flex
                            // columns: '', //grid
                            // columnsResponsive: '', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: '',
                                    value: schema.procesamiento_mineral,
                                    type: inputsTypes.TEXTAREA,
                                    name: 'procesamiento_mineral',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'procesamiento_mineral', action}).observations
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
            titleStep: 'Maquinarias',
            bodyStep: [
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: 'Maquinarias ocupadas en el Año declarado',
                            width: 'w-3/4', //flex
                            // columns: '', //grid
                            // columnsResponsive: '', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: '',
                                    type: inputsTypes.TABLE,
                                    name: "equipos",
                                    typeTable: "horizontal",
                                    addRow: true,
                                    verticalTitle: [],
                                    horizontalTitle: [
                                        'Nombre',
                                        'Acciones'
                                    ],
                                    element: getChildrensTable({
                                        data: schema.equipos,
                                        selectedChild: [
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'nombre',
                                                id: '',
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
                                        action,
                                        schema
                                    }),
                                    // observation: new Observations({schema, name: 'equipos', action}).observations,
                                    validations: yup
                                        .array()
                                        .of(
                                            yup.object().shape({
                                                nombre: yup.string().nullable().required('Debes completar este campo'),
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
            bodyStep: [
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: 'Personal Ocupado Anual',
                            width: 'lg:w-2/4',
                            columns: 'grid-cols-1', //grid
                            columnsResponsive: 'lg:grid-cols-1', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Permanente',
                                    value: schema.personal_perm_profesional,
                                    type: inputsTypes.NUMBER,
                                    name: 'personal_perm_profesional',
                                    validations: yup.string().required('Debes ingresar una cantidad.'),
                                    observation: new Observations({schema, name: 'personal_perm_profesional', action}).observations

                                },
                                {
                                    label: 'Operarios Permanente',
                                    value: schema.personal_perm_operarios ,
                                    type: inputsTypes.NUMBER,
                                    name: 'personal_perm_operarios',
                                    validations: yup.string().required('Debes ingresar una cantidad.'),
                                    observation: new Observations({schema, name: 'personal_perm_operarios', action}).observations
                                },
                                {
                                    label: 'Técnicos Permanente',
                                    value: schema.personal_perm_tecnicos,
                                    type: inputsTypes.NUMBER,
                                    name: 'personal_perm_tecnicos',
                                    validations: yup.string().required('Debes ingresar una cantidad.'),
                                    observation: new Observations({schema, name: 'personal_perm_tecnicos', action}).observations
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
                                    label: 'Si no efectuó operaciones con explosivos (Art. 139°), debe seleccionar "NO"',
                                    // value: schema.prospeccion? true : false,
                                    value: schema.explosivos?.length > 0? true : false,
                                    type: inputsTypes.CHECKBOX,
                                    labelOn: "SI",
                                    labelOff: "NO",
                                    name: 'uso_explosivos',
                                    hiddenComponent: [
                                        {
                                            component:   "permiso_anmac",
                                            value: false
                                        },
                                        {
                                            component:   "explosivos",
                                            value: false
                                        }
                                    ],
                                    // observation: new Observations({schema, name: 'prospeccion', action}).observations
                                    // validations: yup.boolean().required(),
                                },
                                {
                                    label: 'N° permiso ANMac',
                                    value: schema.permiso_anmac,
                                    type: inputsTypes.TEXT,
                                    name: 'permiso_anmac',
                                    hidden: schema.explosivos?.length > 0? false : true,
                                    // validations: yup.string().required('Debes completar este campo'),
                                    validations: yup.string().when('uso_explosivos', {
                                        is: true,
                                        then: yup.string().required('Debes completar este campo')
                                    }),

                                    observation: new Observations({schema, name: 'permiso_anmac', action}).observations
                                },
                                {
                                    label: '',
                                    type: inputsTypes.TABLE,
                                    name: "explosivos",
                                    hidden: schema.explosivos?.length > 0? false : true,
                                    addRow: true,
                                    typeTable: "horizontal",
                                    verticalTitle: [],
                                    horizontalTitle: [
                                        'Tipo',
                                        'Cantidad mensual',
                                        'Almacenamiento',
                                        'Acciones'
                                    ],
                                    element: getChildrensTable({
                                        data: schema.explosivos,
                                        selectedChild: [
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'tipo_explosivo',
                                                id: '',
                                            },
                                            {
                                                label: '',
                                                value:'',
                                                type: inputsTypes.NUMBER,
                                                name: 'cantidad_explosivo',
                                            },
                                            {
                                                label: '',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'almacenamiento_explosivo',
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
                                        action,
                                        schema
                                    }),
                                    // observation: new Observations({schema, name: 'explosivos', action}).observations,
                                    validations: yup
                                        .array()
                                        .of(
                                            yup.object().shape({
                                                tipo_explosivo: yup.string().nullable().required('Debes completar este campo'),
                                                cantidad_explosivo: yup.string().nullable().required('Debes completar este campo').transform(v => v === ''? null : v),
                                                almacenamiento_explosivo: yup.string().nullable().required('Debes completar este campo'),
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

function getChildrensTable({data, key, selectedChild, listMinerales, action, schema}) {
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

function getRowsTable(dataSchema, rowsTable) {

    if(dataSchema.length == 0 || !dataSchema ) return rowsTable;
    // console.log(dataSchema);
}

function getChildrensTableDepends({data, key, selectedChild, listMinerales}) {
    return
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


