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
                    title: 'Datos',
                    width: 'lg:w-full', //flex
                    columns: 'grid-cols-1', //grid
                    columnsResponsive: 'lg:grid-cols-2', //inside card
                    img: '/images/laborales.png',
                    inputs: [
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
                        {
                        },
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
                                            validation = validation && element.size <= 1000000; // 10MB
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
                                            validation = validation && [fileAccept.PDF.value].includes(element.type);
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
                                            validation = validation && element.size <= 1000000; // 10MB
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
        // row 2
        {
            widthResponsive: 'flex-row', //flex
            // columns
            body: [
                //  col 1
                {
                    title: 'Sustancias minerales que insuatralizan',
                    width: '', //flex
                    columns: 'grid-cols-1', //grid
                    columnsResponsive: '', //inside card
                    img: '/images/laborales.png',
                    inputs: [
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
                                        dni2: yup.string().required('Debes ingresar un dni'),

                                    })
                                )
                                .strict(),
                        },
                    ]
                },

            ]
        },
        // row 3 UBICACION
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
                            searchable: true,
                            placeholder: 'Selecciona una opción',
                            validations: yup.object().when('provinciaSelect', {
                                is: value => _.isEmpty(value) || !value,
                                then: yup.object().required('Debes elegir un elemento').nullable()
                            }),
                            observation: new Observations({schema, name: 'select', evaluate}).observations
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
                            searchable: true,
                            placeholder: 'Selecciona una opción',
                            validations: yup.object().when('departamentoSelect', {
                                is: value => _.isEmpty(value) || !value,
                                then: yup.object().required('Debes elegir un elemento').nullable()
                            }),
                            observation: new Observations({schema, name: 'select', evaluate}).observations
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
                            searchable: true,
                            placeholder: 'Selecciona una opción',
                            validations: yup.object().when('localidadSelect', {
                                is: value => _.isEmpty(value) || !value,
                                then: yup.object().required('Debes elegir un elemento').nullable()
                            }),
                            observation: new Observations({schema, name: 'select', evaluate}).observations
                        },
                    ]
                },

            ]
        },
    ]
}



