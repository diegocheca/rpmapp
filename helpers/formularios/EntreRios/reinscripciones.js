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
                            validations: yup.string().required('Debes completar este campo').nullable(),
                            observation: new Observations({schema, name: 'nombre', evaluate, revisionData : dataForm.revisionData}).observations

                        },
                        {
                            label: 'DNI',
                            value: schema.dni,
                            type: inputsTypes.NUMBER,
                            name: 'dni',
                            validations: yup.string().required('Debes completar este campo'),
                            observation: new Observations({schema, name: 'dni', evaluate, revisionData : dataForm.revisionData}).observations

                        },
                        {
                            label: 'Cargo en la empresa',
                            value: schema.cargo,
                            type: inputsTypes.TEXT,
                            name: 'cargo',
                            validations: yup.string().required('Debes completar este campo'),
                            observation: new Observations({schema, name: 'cargo', evaluate, revisionData : dataForm.revisionData}).observations

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
                            observation: new Observations({schema, name: 'porcentaje_venta_provincia', evaluate, revisionData : dataForm.revisionData}).observations

                        },
                        {
                            label: 'Porcentaje vendido a otras Provincias',
                            value: schema.porcentaje_venta_otras_provincias,
                            type: inputsTypes.NUMBER,
                            name: 'porcentaje_venta_otras_provincias',
                            validations: yup.string().required('Debes completar este campo'),
                            observation: new Observations({schema, name: 'porcentaje_venta_otras_provincias', evaluate, revisionData : dataForm.revisionData}).observations

                        },
                        {
                            label: 'Porcentaje Exportado',
                            value: schema.porcentaje_exportado,
                            type: inputsTypes.NUMBER,
                            name: 'porcentaje_exportado',
                            validations: yup.string().required('Debes completar este campo'),
                            observation: new Observations({schema, name: 'porcentaje_exportado', evaluate, revisionData : dataForm.revisionData}).observations

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
                            observation: new Observations({schema, name: 'prospeccion', evaluate, revisionData : dataForm.revisionData}).observations

                        },
                        {
                            label: 'Explotación',
                            value: schema.explotacion? true : false,
                            type: inputsTypes.CHECKBOX,
                            name: 'explotacion',
                            observation: new Observations({schema, name: 'explotacion', evaluate, revisionData : dataForm.revisionData}).observations

                        },
                        {
                            label: 'Desarrollo',
                            value: schema.desarrollo? true : false,
                            type: inputsTypes.CHECKBOX,
                            name: 'desarrollo',
                            observation: new Observations({schema, name: 'desarrollo', evaluate, revisionData : dataForm.revisionData}).observations

                        },
                        {
                            label: 'Exploración',
                            value: schema.explotacion? true : false,
                            type: inputsTypes.CHECKBOX,
                            name: 'exploracion',
                            observation: new Observations({schema, name: 'exploracion', evaluate, revisionData : dataForm.revisionData}).observations

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
                            observation: new Observations({schema, name: 'personal_perm_profesional', evaluate, revisionData : dataForm.revisionData}).observations

                        },
                        {
                            label: 'Operarios y Obreros Permanente',
                            value: schema.personal_perm_operarios ,
                            type: inputsTypes.NUMBER,
                            name: 'personal_perm_operarios',
                            validations: yup.string().required('Debes ingresar una cantidad.'),
                            observation: new Observations({schema, name: 'personal_perm_operarios', evaluate, revisionData : dataForm.revisionData}).observations
                        },
                        {
                            label: 'Administrativo Permanente',
                            value: schema.personal_perm_administrativos,
                            type: inputsTypes.NUMBER,
                            name: 'personal_perm_administrativos',
                            validations: yup.string().required('Debes ingresar una cantidad.'),
                            observation: new Observations({schema, name: 'personal_perm_administrativos', evaluate, revisionData : dataForm.revisionData}).observations
                        },
                        {
                            label: 'Otros Permanente',
                            value: schema.personal_perm_otros,
                            type: inputsTypes.NUMBER,
                            name: 'personal_perm_otros',
                            validations: yup.string().required('Debes ingresar una cantidad.'),
                            observation: new Observations({schema, name: 'personal_perm_otros', evaluate, revisionData : dataForm.revisionData}).observations
                        },
                        {
                            label: 'Profesional Transitorio',
                            value: schema.personal_trans_profesional,
                            type: inputsTypes.NUMBER,
                            name: 'personal_trans_profesional',
                            validations: yup.string().required('Debes ingresar una cantidad.'),
                            observation: new Observations({schema, name: 'personal_trans_profesional', evaluate, revisionData : dataForm.revisionData}).observations
                        },
                        {
                            label: 'Operarios y Obreros Transitorio',
                            value: schema.personal_trans_operarios ,
                            type: inputsTypes.NUMBER,
                            name: 'personal_trans_operarios',
                            validations: yup.string().required('Debes ingresar una cantidad.'),
                            observation: new Observations({schema, name: 'personal_trans_operarios', evaluate, revisionData : dataForm.revisionData}).observations
                        },
                        {
                            label: 'Administrativo Transitorio',
                            value: schema.personal_trans_administrativos,
                            type: inputsTypes.NUMBER,
                            name: 'personal_trans_administrativos',
                            validations: yup.string().required('Debes ingresar una cantidad.'),
                            observation: new Observations({schema, name: 'personal_trans_administrativos', evaluate, revisionData : dataForm.revisionData}).observations
                        },
                        {
                            label: 'Otros Transitorio',
                            value: schema.personal_trans_otros,
                            type: inputsTypes.NUMBER,
                            name: 'personal_trans_otros',
                            validations: yup.string().required('Debes ingresar una cantidad.'),
                            observation: new Observations({schema, name: 'personal_trans_otros', evaluate, revisionData : dataForm.revisionData}).observations
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
                            childrens: getChildrens(schema.productos),
                            elements: [
                                [
                                    {
                                        label: 'Producto Extraído',
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
                                            // {
                                            //     label: 'Oro',
                                            //     value: 'Oro',
                                            // },
                                            // {
                                            //     label: 'Plata',
                                            //     value: 'Plata',
                                            // },
                                            // {
                                            //     label: 'Cobre',
                                            //     value: 'Cobre',
                                            // },
                                            // {
                                            //     label: 'Hierro',
                                            //     value: 'Hierro',
                                            // },
                                            // {
                                            //     label: 'Cal',
                                            //     value: 'Cal',
                                            // },
                                            // {
                                            //     label: 'Ripio',
                                            //     value: 'Ripio',
                                            // },
                                            // {
                                            //     label: 'Platino',
                                            //     value: 'Platino',
                                            // },
                                            // {
                                            //     label: 'Diamante',
                                            //     value: 'Diamante',
                                            // }
                                        ],
                                        name: 'nombre_mineral',
                                        multiple: false,
                                        closeOnSelect: true,
                                        searchable: false,
                                        placeholder: 'Selecciona una opción',
                                        // observation: new Observations({schema, name: 'nombre_mineral', evaluate, revisionData : dataForm.revisionData}).observations
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
                                        ...new Observations({schema, name: 'row', evaluate, revisionData : dataForm.revisionData}).observations
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
                                        row_evaluacion: evaluate? yup.string().oneOf(["aprobado", "rechazado", "sin evaluar"]).nullable().required('Debes seleccionar una opción') : {},
                                        row_comentario: evaluate? yup.string().when('observacion_row', { is: "rechazado", then: yup.string().min(5, 'Debes ingresar al menos 5 caracteres').max(50, 'Puedes ingresar hasta 50 caracteres').nullable().required('Debes agregar una observación') }).nullable() : {}
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

function getChildrens(data) {
    // los objetos deben tener el mismo orden que en el arreglo de los elementoss
    let child =[ // default value,
        {
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
        {
            name: 'observacion_row',
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
                clone[i].value = JSON.parse(object[property]);
            } else {
                clone[i].value = object[property];
            }
        }
        console.log(clone);
        newChildrens.push(clone);
    }

    // newChildrens.push({
    //     name: 'observacion_row',
    //     value: null,
    // });

    return newChildrens;
}

