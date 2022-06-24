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
                                    label: 'Nombre y apellido',
                                    value: schema.nombre,
                                    type: inputsTypes.TEXT,
                                    name: 'nombre',
                                    validations: yup.string().required('Debes completar este campo').nullable(),
                                    observation: new Observations({schema, name: 'nombre', action}).observations

                                },
                                {
                                    label: 'DNI',
                                    value: schema.dni,
                                    type: inputsTypes.NUMBER,
                                    name: 'dni',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'dni', action}).observations

                                },
                                {
                                    label: 'Cargo en la empresa',
                                    value: schema.cargo,
                                    type: inputsTypes.TEXT,
                                    name: 'cargo',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'cargo', action}).observations

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
            titleStep: 'Mercado',
            bodyStep: [
                {
                    widthResponsive: 'lg:flex-row', //flex
                    // columns
                    body: [
                        //  col 1
                        {
                            title: 'Mercado (indicar en que mercados vende su producción)',
                            width: 'lg:w-2/4', //flex
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
                                    observation: new Observations({schema, name: 'porcentaje_venta_provincia', action}).observations

                                },
                                {
                                    label: 'Porcentaje vendido a otras Provincias',
                                    value: schema.porcentaje_venta_otras_provincias,
                                    type: inputsTypes.NUMBER,
                                    name: 'porcentaje_venta_otras_provincias',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'porcentaje_venta_otras_provincias', action}).observations

                                },
                                {
                                    label: 'Porcentaje Exportado',
                                    value: schema.porcentaje_exportado,
                                    type: inputsTypes.NUMBER,
                                    name: 'porcentaje_exportado',
                                    validations: yup.string().required('Debes completar este campo'),
                                    observation: new Observations({schema, name: 'porcentaje_exportado', action}).observations

                                },
                            ]
                        },
                        {
                            title: 'Mercado (indicar en que mercados vende su producción)',
                            width: 'lg:w-2/4', //flex
                            columns: 'grid-cols-1', //grid
                            columnsResponsive: '', //inside card
                            // infoCard: ''
                           // img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Prospección',
                                    value: schema.prospeccion? true : false,
                                    type: inputsTypes.CHECKBOX,
                                    labelOn: "SI",
                                    labelOff: "NO",
                                    name: 'prospeccion',
                                    observation: new Observations({schema, name: 'prospeccion', action}).observations

                                },
                                {
                                    label: 'Explotación',
                                    value: schema.explotacion? true : false,
                                    type: inputsTypes.CHECKBOX,
                                    labelOn: "SI",
                                    labelOff: "NO",
                                    name: 'explotacion',
                                    observation: new Observations({schema, name: 'explotacion', action}).observations

                                },
                                {
                                    label: 'Desarrollo',
                                    value: schema.desarrollo? true : false,
                                    type: inputsTypes.CHECKBOX,
                                    labelOn: "SI",
                                    labelOff: "NO",
                                    name: 'desarrollo',
                                    observation: new Observations({schema, name: 'desarrollo', action}).observations

                                },
                                {
                                    label: 'Exploración',
                                    value: schema.explotacion? true : false,
                                    type: inputsTypes.CHECKBOX,
                                    labelOn: "SI",
                                    labelOff: "NO",
                                    name: 'exploracion',
                                    observation: new Observations({schema, name: 'exploracion', action}).observations

                                }
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
                            title: 'Personal ocupado',
                            width: 'lg:w-2/4',
                            columns: 'grid-cols-1',
                            columnsResponsive: 'lg:grid-cols-2', // lg:grid-cols-3
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Profesional Técnico Permanente',
                                    value: schema.personal_perm_profesional,
                                    type: inputsTypes.NUMBER,
                                    name: 'personal_perm_profesional',
                                    validations: yup.string().required('Debes ingresar una cantidad.'),
                                    observation: new Observations({schema, name: 'personal_perm_profesional', action}).observations

                                },
                                {
                                    label: 'Operarios y Obreros Permanente',
                                    value: schema.personal_perm_operarios ,
                                    type: inputsTypes.NUMBER,
                                    name: 'personal_perm_operarios',
                                    validations: yup.string().required('Debes ingresar una cantidad.'),
                                    observation: new Observations({schema, name: 'personal_perm_operarios', action}).observations
                                },
                                {
                                    label: 'Administrativo Permanente',
                                    value: schema.personal_perm_administrativos,
                                    type: inputsTypes.NUMBER,
                                    name: 'personal_perm_administrativos',
                                    validations: yup.string().required('Debes ingresar una cantidad.'),
                                    observation: new Observations({schema, name: 'personal_perm_administrativos', action}).observations
                                },
                                {
                                    label: 'Otros Permanente',
                                    value: schema.personal_perm_otros,
                                    type: inputsTypes.NUMBER,
                                    name: 'personal_perm_otros',
                                    validations: yup.string().required('Debes ingresar una cantidad.'),
                                    observation: new Observations({schema, name: 'personal_perm_otros', action}).observations
                                },
                                {
                                    label: 'Profesional Transitorio',
                                    value: schema.personal_trans_profesional,
                                    type: inputsTypes.NUMBER,
                                    name: 'personal_trans_profesional',
                                    validations: yup.string().required('Debes ingresar una cantidad.'),
                                    observation: new Observations({schema, name: 'personal_trans_profesional', action}).observations
                                },
                                {
                                    label: 'Operarios y Obreros Transitorio',
                                    value: schema.personal_trans_operarios ,
                                    type: inputsTypes.NUMBER,
                                    name: 'personal_trans_operarios',
                                    validations: yup.string().required('Debes ingresar una cantidad.'),
                                    observation: new Observations({schema, name: 'personal_trans_operarios', action}).observations
                                },
                                {
                                    label: 'Administrativo Transitorio',
                                    value: schema.personal_trans_administrativos,
                                    type: inputsTypes.NUMBER,
                                    name: 'personal_trans_administrativos',
                                    validations: yup.string().required('Debes ingresar una cantidad.'),
                                    observation: new Observations({schema, name: 'personal_trans_administrativos', action}).observations
                                },
                                {
                                    label: 'Otros Transitorio',
                                    value: schema.personal_trans_otros,
                                    type: inputsTypes.NUMBER,
                                    name: 'personal_trans_otros',
                                    validations: yup.string().required('Debes ingresar una cantidad.'),
                                    observation: new Observations({schema, name: 'personal_trans_otros', action}).observations
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
                            title: 'Datos y destino de la producción',
                            width: 'w-3/4', //flex
                            // columns: '', //grid
                            // columnsResponsive: '', //inside card
                            img: '/images/laborales.png',
                            inputs: [
                                {
                                    label: 'Si no se produjo ningún mineral, debe seleccionar "NO"',
                                    // value: schema.prospeccion? true : false,
                                    value: !schema.cantidad_productos? false : true,
                                    type: inputsTypes.CHECKBOX,
                                    labelOn: "SI",
                                    labelOff: "NO",
                                    name: 'production_checkbox',
                                    hiddenComponent: [
                                        {
                                            component:   "Productos",
                                            value: false
                                        }
                                    ],
                                    // observation: new Observations({schema, name: 'prospeccion', action}).observations
                                    // validations: yup.boolean().required(),
                                },
                                {
                                    label: '',
                                    type: inputsTypes.LIST,
                                    name: 'Productos',
                                    columns: 'grid-cols-1',
                                    hidden: !schema.cantidad_productos? true : false,
                                    // colSpans + 1
                                    columnsResponsive: 'lg:grid-cols-3',
                                    childrens: getChildrens(schema.productos),
                                    elements: [
                                        [
                                            {
                                                label: 'Producto Extraído',
                                                value: {},
                                                type: inputsTypes.SELECT,
                                                colSpan: '',
                                                options: minerales.data,
                                                name: 'nombre_mineral',
                                                multiple: false,
                                                closeOnSelect: true,
                                                searchable: true,
                                                placeholder: 'Selecciona una opción',
                                                // observation: new Observations({schema, name: 'nombre_mineral', action}).observations
                                            },
                                            {
                                                label: 'Variedad de',
                                                value: '',
                                                type: inputsTypes.TEXT,
                                                name: 'variedad',
                                                colSpan: '',
                                            },
                                            {
                                                label: 'Producción',
                                                value: '',
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
                                            // {
                                            //     label: 'Empresa compradora',
                                            //     value: '',
                                            //     type: inputsTypes.TEXT,
                                            //     name: 'empresa_compradora',
                                            //     colSpan: '',
                                            // },
                                            // {
                                            //     label: 'Dirección empresa campradora',
                                            //     value: '',
                                            //     type: inputsTypes.TEXT,
                                            //     name: 'direccion_empresa_compradora',
                                            //     colSpan: '',
                                            // },
                                            // {
                                            //     label: 'Actividad empresa campradora',
                                            //     value: '',
                                            //     type: inputsTypes.TEXT,
                                            //     name: 'actividad_empresa_compradora',
                                            //     colSpan: '',
                                            // },
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
                            ]
                        },
                    ]
                },
            ]
        },
    ]
}

function getChildrens(data, observation) {
    // los objetos deben tener el mismo orden que en el arreglo de los elementoss
    let child =[ // default value,
        {
            // id elemento, solo agregar al primer objeto
            id: null,
            name: 'nombre_mineral',
            value: null,
            // solo necesario para los selects que el valor se ha guardado como un json
            select: true
        },
        {
            name: 'variedad',
            value: null,
        },
        {
            name: 'produccion',
            value: null,
        },
        {
            name: 'unidades',
            value: null,
            select: true
        },
        {
            name: 'precio_venta',
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
                clone[i].value = {
                    label: property,
                    value: object[property]
                }

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

function setValue(value, name, schema) {
   return schema[name] = value;
}


