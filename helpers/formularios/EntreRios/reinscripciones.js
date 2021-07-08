import * as yup from 'yup';
import Observations from './observaciones';
import inputsTypes from '../../enums/inputsTypes';
import fileAccept from '../../enums/fileAccept';

export function getFormSchema({ ...schema }, evaluate, dataForm) {
    // name => unique
    return [
        // row 1
        {
            widthResponsive: 'lg:flex-row', //flex
            // columns
            body: [
                //  col 1
                {
                    title: 'Datos de quien completa este formulario',
                    width: 'lg:w-full', //flex
                    columns: 'grid-cols-1', //grid
                    columnsResponsive: 'lg:grid-cols-3', //inside card
                    // infoCard: ''
                   // img: '/images/laborales.png',
                    inputs: [
                        {
                            label: 'Nombre y apellido',
                            value: schema.nombre,
                            type: inputsTypes.TEXT,
                            name: 'nombre',
                            validations: yup.string().required('Debes completar este campo'),
                            observation: new Observations({schema, name: 'nombre', evaluate}).observations

                        },
                        {
                            label: 'DNI',
                            value: schema.dni,
                            type: inputsTypes.NUMBER,
                            name: 'dni',
                            validations: yup.string().required('Debes completar este campo'),
                            observation: new Observations({schema, name: 'dni', evaluate}).observations

                        },
                        {
                            label: 'Cargo en la empresa',
                            value: schema.cargo,
                            type: inputsTypes.TEXT,
                            name: 'cargo',
                            validations: yup.string().required('Debes completar este campo'),
                            observation: new Observations({schema, name: 'cargo', evaluate}).observations

                        },
                    ]
                },

            ]
        },
        // row 2
        {
            widthResponsive: 'lg:flex-row', //flex
            // columns
            body: [
                //  col 1
                {
                    title: 'Mercado (indicar en que mercados vende su producción)',
                    width: 'lg:w-full', //flex
                    columns: 'grid-cols-1', //grid
                    columnsResponsive: '', //inside card
                    // infoCard: ''
                   // img: '/images/laborales.png',
                    inputs: [
                        {
                            label: 'Porcentaje vendido a Provincia',
                            value: schema.porcentaje_venta_provincia,
                            type: inputsTypes.NUMBER,
                            name: 'porcentaje_venta_provincia',
                            validations: yup.string().required('Debes completar este campo'),
                            observation: new Observations({schema, name: 'porcentaje_venta_provincia', evaluate}).observations

                        },
                        {
                            label: 'Porcentaje vendido a otras Provincias',
                            value: schema.porcentaje_venta_otras_provincias,
                            type: inputsTypes.NUMBER,
                            name: 'porcentaje_venta_otras_provincias',
                            validations: yup.string().required('Debes completar este campo'),
                            observation: new Observations({schema, name: 'porcentaje_venta_otras_provincias', evaluate}).observations

                        },
                        {
                            label: 'Porcentaje Exportado',
                            value: schema.porcentaje_exportado,
                            type: inputsTypes.NUMBER,
                            name: 'porcentaje_exportado',
                            validations: yup.string().required('Debes completar este campo'),
                            observation: new Observations({schema, name: 'porcentaje_exportado', evaluate}).observations

                        },
                    ]
                },
                {
                    title: 'Mercado (indicar en que mercados vende su producción)',
                    width: 'lg:w-full', //flex
                    columns: 'grid-cols-1', //grid
                    columnsResponsive: '', //inside card
                    // infoCard: ''
                   // img: '/images/laborales.png',
                    inputs: [
                        {
                            label: 'Prospección',
                            value: schema.prospeccion? true : false,
                            type: inputsTypes.CHECKBOX,
                            name: 'prospeccion',
                            observation: new Observations({schema, name: 'prospeccion', evaluate}).observations

                        },
                        {
                            label: 'Explotación',
                            value: schema.explotacion? true : false,
                            type: inputsTypes.CHECKBOX,
                            name: 'explotacion',
                            observation: new Observations({schema, name: 'explotación', evaluate}).observations

                        },
                        {
                            label: 'Desarrollo',
                            value: schema.desarrollo? true : false,
                            type: inputsTypes.CHECKBOX,
                            name: 'desarrollo',
                            observation: new Observations({schema, name: 'desarrollo', evaluate}).observations

                        },
                        {
                            label: 'Exploración',
                            value: schema.explotacion? true : false,
                            type: inputsTypes.CHECKBOX,
                            name: 'exploracion',
                            observation: new Observations({schema, name: 'exploracion', evaluate}).observations

                        }
                    ]
                },

            ]
        },
        //  row 3
        {
            widthResponsive: 'flex-row',
            body: [
                //  col 1
                {
                    title: 'Personal ocupado',
                    width: '',
                    columns: 'grid-cols-1',
                    columnsResponsive: 'lg:grid-cols-3',
                    img: '/images/laborales.png',
                    inputs: [
                        {
                            label: 'Profesional Técnico Permanente',
                            value: schema.personal_perm_profesional,
                            type: inputsTypes.NUMBER,
                            name: 'personal_perm_profesional',
                            validations: yup.string().required('Debes ingresar una cantidad.'),
                            observation: new Observations({schema, name: 'personal_perm_profesional', evaluate}).observations

                        },
                        {
                            label: 'Operarios y Obreros Permanente',
                            value: schema.personal_perm_operarios ,
                            type: inputsTypes.NUMBER,
                            name: 'personal_perm_operarios',
                            validations: yup.string().required('Debes ingresar una cantidad.'),
                            observation: new Observations({schema, name: 'personal_perm_operarios', evaluate}).observations
                        },
                        {
                            label: 'Administrativo Permanente',
                            value: schema.personal_perm_administrativos,
                            type: inputsTypes.NUMBER,
                            name: 'personal_perm_administrativos',
                            validations: yup.string().required('Debes ingresar una cantidad.'),
                            observation: new Observations({schema, name: 'personal_perm_administrativos', evaluate}).observations
                        },
                        {
                            label: 'Otros Permanente',
                            value: schema.personal_perm_otros,
                            type: inputsTypes.NUMBER,
                            name: 'personal_perm_otros',
                            validations: yup.string().required('Debes ingresar una cantidad.'),
                            observation: new Observations({schema, name: 'personal_perm_otros', evaluate}).observations
                        },
                        {
                            label: 'Profesional Transitorio',
                            value: schema.personal_trans_profesional,
                            type: inputsTypes.NUMBER,
                            name: 'personal_trans_profesional',
                            validations: yup.string().required('Debes ingresar una cantidad.'),
                            observation: new Observations({schema, name: 'personal_trans_profesional', evaluate}).observations
                        },
                        {
                            label: 'Operarios y Obreros Transitorio',
                            value: schema.personal_trans_operarios ,
                            type: inputsTypes.NUMBER,
                            name: 'personal_trans_operarios',
                            validations: yup.string().required('Debes ingresar una cantidad.'),
                            observation: new Observations({schema, name: 'personal_trans_operarios', evaluate}).observations
                        },
                        {
                            label: 'Administrativo Transitorio',
                            value: schema.personal_trans_administrativos,
                            type: inputsTypes.NUMBER,
                            name: 'personal_trans_administrativos',
                            validations: yup.string().required('Debes ingresar una cantidad.'),
                            observation: new Observations({schema, name: 'personal_trans_administrativos', evaluate}).observations
                        },
                        {
                            label: 'Otros Transitorio',
                            value: schema.personal_trans_otros,
                            type: inputsTypes.NUMBER,
                            name: 'personal_trans_otros',
                            validations: yup.string().required('Debes ingresar una cantidad.'),
                            observation: new Observations({schema, name: 'personal_trans_otros', evaluate}).observations
                        },

                    ]
                },

            ]
        },
        // row 4
        {
            widthResponsive: 'flex-row', //flex
            // columns
            body: [
                //  col 1
                {
                    title: 'Sustancias minerales que insuatralizan',
                    width: '', //flex
                    // columns: '', //grid
                    // columnsResponsive: '', //inside card
                    img: '/images/laborales.png',
                    inputs: [
                        {
                            label: 'List',
                            type: inputsTypes.LIST,
                            name: 'List',
                            columns: 'grid-cols-1',
                            // colSpans + 1
                            columnsResponsive: 'lg:grid-cols-3',
                            childrens: [ // default value,
                                [
                                    {
                                        name: 'sustanceSelect',
                                        value: null,
                                    },
                                    {
                                        name: 'mineralSelect',
                                        value: null,
                                    },
                                    {
                                        name: 'dni',
                                        value: null,
                                    },
                                    {
                                        name: 'produccion',
                                        value: null,
                                    },
                                    {
                                        name: 'unidades',
                                        value: null,
                                    },
                                    {
                                        name: 'precio_venta',
                                        value: null,
                                    },
                                    {
                                        name: 'empresa_compradora',
                                        value: null,
                                    },
                                    {
                                        name: 'direccion_empresa_compradora',
                                        value: null,
                                    },
                                    {
                                        name: 'actividad_empresa_compradora',
                                        value: null,
                                    },
                                ]
                            ],
                            elements: [
                                [
                                    {
                                        label: 'Sustancia',
                                        value: {},
                                        type: inputsTypes.SELECT,
                                        colSpan: '',
                                        options: [
                                            {
                                                label: 'Sustancias de aprovechamiento común',
                                                value: 'aprovechamiento_comun',
                                            },
                                            {
                                                label: 'Sustancias que se conceden preferentemente al dueño del suelo',
                                                value: 'conceden_preferentemente',
                                            }
                                        ],
                                        name: 'sustanceSelect',
                                        multiple: false,
                                        closeOnSelect: true,
                                        searchable: false,
                                        inputDepends: ['mineralSelect'],
                                        optionsDepends:
                                            {
                                                aprovechamiento_comun : [
                                                    {
                                                        label: 'Arenas Metalíferas',
                                                        value: 'Arenas Metalíferas'
                                                    },
                                                    {
                                                        label: 'Piedras Preciosas',
                                                        value: 'Piedras Preciosas'
                                                    },
                                                    {
                                                        label: 'Desmontes',
                                                        value: 'Desmontes'
                                                    },
                                                    {
                                                        label: 'Relaves',
                                                        value: 'Relaves'
                                                    },
                                                    {
                                                        label: 'Escoriales',
                                                        value: 'Escoriales'
                                                    },
                                                ],
                                                conceden_preferentemente: [
                                                    {
                                                        label: 'Salitres',
                                                        value: 'Salitres'
                                                    },
                                                    {
                                                        label: 'Salinas',
                                                        value: 'Salinas'
                                                    },
                                                    {
                                                        label: 'Turberas',
                                                        value: 'Turberas'
                                                    },
                                                    {
                                                        label: 'Metales no comprendidos en 1° Categ.',
                                                        value: 'Metales no comprendidos en 1° Categ.'
                                                    },
                                                    {
                                                        label: 'Abrasivos',
                                                        value: 'Abrasivos'
                                                    },
                                                    {
                                                        label: 'Ocres',
                                                        value: 'Ocres'
                                                    },
                                                    {
                                                        label: 'Resinas',
                                                        value: 'Resinas'
                                                    },
                                                    {
                                                        label: 'Esteatitas',
                                                        value: 'Esteatitas'
                                                    },
                                                    {
                                                        label: 'Baritina',
                                                        value: 'Baritina'
                                                    },
                                                    {
                                                        label: 'Caparrosas',
                                                        value: 'Caparrosas'
                                                    },
                                                    {
                                                        label: 'Grafito',
                                                        value: 'Grafito'
                                                    },
                                                    {
                                                        label: 'Caolí­n',
                                                        value: 'Caolí­n'
                                                    },
                                                    {
                                                        label: 'Sales Alcalinas o Alcalino Terrosas',
                                                        value: 'Sales Alcalinas o Alcalino Terrosas'
                                                    },
                                                    {
                                                        label: 'Amianto',
                                                        value: 'Amianto'
                                                    },
                                                    {
                                                        label: 'Bentonita',
                                                        value: 'Bentonita'
                                                    },
                                                    {
                                                        label: 'Zeolitas o Minerales Permutantes o Permutíticos',
                                                        value: 'Zeolitas o Minerales Permutantes o Permutíticos'
                                                    },
                                                ]
                                            }
                                        ,
                                        // validations: yup.object().when('sustanceSelect', {
                                        //     is: value => _.isEmpty(value),
                                        //     then: yup.object().required('Debes elegir un elemento')
                                        // }),
                                        placeholder: 'Selecciona una opción',

                                    },
                                    {
                                        label: 'Mineral Explotado',
                                        value: {},
                                        type: inputsTypes.SELECT,
                                        colSpan: '',
                                        options: [],
                                        name: 'mineralSelect',
                                        inputDepends: [],
                                        multiple: false,
                                        closeOnSelect: true,
                                        searchable: true,
                                        // validations: yup.object().when('mineralSelect', {
                                        //     is: value => _.isEmpty(value),
                                        //     then: yup.object().required('Debes elegir un elemento')
                                        // }),
                                        placeholder: 'Selecciona una opción',
                                    },
                                    {
                                        label: 'Producción',
                                        value: schema.produccion,
                                        type: inputsTypes.NUMBER,
                                        name: 'produccion',
                                        colSpan: '',
                                    },
                                    {
                                        label: 'Unidades',
                                        value: {},
                                        type: inputsTypes.SELECT,
                                        colSpan: '',
                                        options: [
                                            {
                                                label: 'toneladas',
                                                value: 'toneladas',
                                            },
                                            {
                                                label: 'mts 3',
                                                value: 'mts 3',
                                            },
                                            {
                                                label: 'otros',
                                                value: 'otros',
                                            }
                                        ],
                                        name: 'unidades',
                                        multiple: false,
                                        closeOnSelect: true,
                                        searchable: false,
                                        placeholder: 'Selecciona una opción',

                                    },
                                    {
                                        label: 'Precio de Venta (en $)',
                                        value: '',
                                        type: inputsTypes.NUMBER,
                                        name: 'precio_venta',
                                        colSpan: '',
                                    },
                                    {
                                        label: 'Empresa compradora',
                                        value: '',
                                        type: inputsTypes.TEXT,
                                        name: 'empresa_compradora',
                                        colSpan: '',
                                    },
                                    {
                                        label: 'Dirección empresa campradora',
                                        value: '',
                                        type: inputsTypes.TEXT,
                                        name: 'direccion_empresa_compradora',
                                        colSpan: '',
                                    },
                                    {
                                        label: 'Actividad empresa campradora',
                                        value: '',
                                        type: inputsTypes.TEXT,
                                        name: 'actividad_empresa_compradora',
                                        colSpan: '',
                                    },
                                    {
                                        colSpan: 'lg:w-5/5',
                                        observation: new Observations({schema, name: 'row-', evaluate}).observations
                                    }

                                ]
                            ],
                            validations: yup
                                .array()
                                .of(
                                    yup.object().shape({
                                        sustanceSelect: yup.object().when('sustance', {
                                            is: value => _.isEmpty(value),
                                            then: yup.object().required('Debes elegir un elemento').nullable()
                                        }),
                                        mineralSelect: yup.object().when('mineral', {
                                            is: value => _.isEmpty(value),
                                            then: yup.object().required('Debes elegir un elemento').nullable()
                                        }),
                                        produccion: yup.string().required('Debes completar este campo'),
                                        unidades: yup.object().when('mineral', {
                                                is: value => _.isEmpty(value),
                                                then: yup.object().required('Debes elegir un elemento').nullable()
                                        }),
                                        precio_venta: yup.string().required('Debes completar este campo'),
                                        empresa_compradora: yup.string().required('Debes completar este campo'),
                                        direccion_empresa_compradora: yup.string().required('Debes completar este campo'),
                                        actividad_empresa_compradora: yup.string().required('Debes completar este campo'),
                                    })
                                )
                                .strict(),
                        },
                    ]
                },

            ]
        },

    ]
}



