import * as yup from 'yup';
import Observations from './observaciones';
import inputsTypes from '../../enums/inputsTypes';
import fileAccept from '../../enums/fileAccept';

export function getFormSchema({ ...schema }, evaluate) {
    // name => unique
    return [
        // row 1
        {
            widthResponsive: 'flex-row', //flex
            // columns
            body: [
                //  col 1
                {
                    title: 'Datos Personales',
                    width: '', //flex
                    columns: 'grid-cols-1', //grid
                    columnsResponsive: '', //inside card
                    img: '/images/laborales.png',
                    inputs: [
                        // {
                        //     label: 'DNI',
                        //     value: schema.dni,
                        //     type: inputsTypes.NUMBER,
                        //     name: 'dni',
                        //     validations: yup.string().required('Debes ingresar un dni.'),
                        //     observation: new Observations({schema, name: 'dni', evaluate}).observations
                        // },
                        {
                            label: 'List',
                            type: inputsTypes.LIST,
                            name: 'List',
                            // columns: 'grid-cols-1',
                            // colSpans + 1
                            // columnsResponsive: 'lg:w-2/5',
                            childrens: [ // default value,
                                [{
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
                                },]
                            ],
                            elements: [
                                [
                                    {
                                        label: 'Sustancia',
                                        value: {},
                                        type: inputsTypes.SELECT,
                                        colSpan: 'lg:w-2/5',
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
                                        colSpan: 'lg:w-2/5',
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
                                        label: 'DNI',
                                        value: schema.dni,
                                        type: inputsTypes.NUMBER,
                                        colSpan: 'lg:w-1/5',
                                        name: 'dni2',
                                        // validations: yup.string().required('Debes ingresar un dni'),
                                    },
                                    {
                                        label: 'File',
                                        value: schema.file,
                                        type: inputsTypes.FILE,
                                        name: 'file2',
                                        accept: [fileAccept.PDF.value, fileAccept.DOC.value, fileAccept.IMAGE.value],
                                        acceptLabel: `Archivos admitidos: ${[fileAccept.PDF.label, fileAccept.DOC.label, fileAccept.IMAGE.label].join()}`,
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
                                            then: yup.object().required('Debes elegir un elemento')
                                        }),
                                        mineralSelect: yup.object().when('mineral', {
                                            is: value => _.isEmpty(value),
                                            then: yup.object().required('Debes elegir un elemento')
                                        }),
                                        dni2: yup.string().required('Debes ingresar un dni'),
                                        file2: yup.array().min(1, 'Debes subir al menos un elemento')
                                    })
                                )
                                .strict(),
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
                    title: 'Datos Personales',
                    width: 'lg:w-2/6', //flex
                    columns: 'grid-cols-1', //grid
                    columnsResponsive: '', //inside card
                    img: '/images/laborales.png',
                    inputs: [
                        {
                            label: 'File',
                            value: schema.file,
                            type: inputsTypes.FILE,
                            name: 'file',
                            accept: [fileAccept.PDF.value, fileAccept.DOC.value, fileAccept.IMAGE.value],
                            acceptLabel: `Archivos admitidos: ${[fileAccept.PDF.label, fileAccept.DOC.label, fileAccept.IMAGE.label].join()}`,
                            validations: yup.array().min(1, 'Debes subir al menos un elemento').default([]),
                            observation: new Observations({schema, name: 'file', evaluate}).observations
                        },
                        {
                            label: 'Select',
                            value: [],
                            type: inputsTypes.SELECT,
                            options: [
                                { label: 'Vue.js', value: 'JavaScript' },
                                { label: 'Rails', value: 'Ruby' },
                                { label: 'Sinatra', value: 'Sinatra' },
                                // { label: 'Laravel', value: 'PHP', $isDisabled: true }, // disabled option
                                { label: 'Phoenix', value: 'Elixir' }
                            ],
                            name: 'select',
                            multiple: true,
                            closeOnSelect: true,
                            searchable: true,
                            placeholder: 'Selecciona una opción',
                            validations: yup.array().min(1, 'Debes seleccionar al menos un elemento').default([]),
                            observation: new Observations({schema, name: 'select', evaluate}).observations
                        },
                        {
                            label: 'DNI',
                            value: schema.dni,
                            type: inputsTypes.NUMBER,
                            name: 'dni',
                            validationType: "number",
                            validations: yup.string().required('Debes ingresar un dni'),
                            observation: new Observations({schema, name: 'dni', evaluate}).observations
                        },
                        {
                            label: 'NOMBRE',
                            value: schema.nombre,
                            type: inputsTypes.TEXT,
                            name: 'nombre',
                            validations: yup.string().required('Debes ingresar un nombre'),
                            observation: new Observations({schema, name: 'nombre', evaluate}).observations

                        },
                        {
                            label: 'CARGO',
                            value: schema.cargo,
                            type: inputsTypes.TEXT,
                            name: 'cargo',
                            validations: yup.string().required('Debes ingresar un cargo'),
                            observation: new Observations({schema, name: 'cargo', evaluate}).observations

                        },
                        {
                            label: 'ESTADO',
                            value: schema.estado,
                            type: inputsTypes.TEXT,
                            name: 'estado',
                            validations: yup.string().required('Debes ingresar un estado'),
                            observation: new Observations({schema, name: 'estado', evaluate}).observations

                        }
                    ]
                },
                //  col 2
                {
                    title: 'Labores desarrolladas',
                    width: 'lg:w-2/6',
                    columns: 'grid-cols-1',
                    columnsResponsive: '',
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
                //  col 3
                {
                    title: 'Porcentajes de venta',
                    width: 'lg:w-2/6',
                    columns: 'grid-cols-1',
                    columnsResponsive: '',
                    inputs: [
                        {
                            label: 'Porcentaje a la provincia',
                            value: schema.porcentaje_venta_provincia,
                            type: inputsTypes.NUMBER,
                            name: 'porcentaje_venta_provincia',
                            validations: yup.string().required('Debes ingresar un porcentaje'),
                            observation: new Observations({schema, name: 'porcentaje_venta_provincia', evaluate}).observations

                        },
                        {
                            label: 'Porcentaje a otras provincias',
                            value: schema.porcentaje_venta_otras_provincias,
                            type: inputsTypes.NUMBER,
                            name: 'porcentaje_venta_otras_provincias',
                            validations: yup.string().required('Debes ingresar un porcentaje'),
                            observation: new Observations({schema, name: 'porcentaje_venta_otras_provincias', evaluate}).observations

                        },
                        {
                            label: 'Porcentaje exportado',
                            value: schema.porcentaje_exportado,
                            type: inputsTypes.NUMBER,
                            name: 'porcentaje_exportado',
                            validations: yup.string().required('Debes ingresar un porcentaje'),
                            observation: new Observations({schema, name: 'porcentaje_exportado', evaluate}).observations

                        }
                    ]
                },
            ]
        },
        // row 3
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
                        }
                    ]
                },

            ]
        }
    ]
}



