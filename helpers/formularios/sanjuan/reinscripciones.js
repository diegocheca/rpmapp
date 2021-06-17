import * as yup from 'yup';
import Observations from './observaciones';

const yupSquema = yup.object({
    // dni
    dni: yup.number().required('Debes ingresar un dni.'),
    observacion_dni: yup.string().oneOf(["aprobado","rechazado","sin evaluar"]).required('Debes seleccionar una opción'),
    observacion_comentario_dni: yup.string().min(2, 'Debes ingresar más de 2 caracteres').max(50, 'Debes ingresar menos de 50 caracteres').when("observacion_dni", { is: "rechazado", then: yup.string().required('Debes ingresar un comentario.') }),
    //  nombre
    nombre: yup.string().required('Debes ingresar un nombre.'),
    observacion_nombre: yup.string().oneOf(["aprobado","rechazado","sin evaluar"]).required('Debes seleccionar una opción'),
    observacion_comentario_nombre: yup.string().min(2, 'Debes ingresar más de 2 caracteres').max(50, 'Debes ingresar menos de 50 caracteres').when("observacion_nombre", { is: "rechazado", then: yup.string().required('Debes ingresar un comentario.') }),
    // cargo
    cargo: yup.string().required('Debes ingresar un cargo.'),
    observacion_cargo: yup.string().oneOf(["aprobado","rechazado","sin evaluar"]).required('Debes seleccionar una opción'),
    observacion_comentario_cargo: yup.string().min(2, 'Debes ingresar más de 2 caracteres').max(50, 'Debes ingresar menos de 50 caracteres').when("observacion_cargo", { is: "rechazado", then: yup.string().required('Debes ingresar un comentario.') }),
    // estado
    estado: yup.string().required('Debes ingresar un estado.'),
    observacion_estado: yup.string().oneOf(["aprobado","rechazado","sin evaluar"]).required('Debes seleccionar una opción'),
    observacion_comentario_estado: yup.string().min(2, 'Debes ingresar más de 2 caracteres').max(50, 'Debes ingresar menos de 50 caracteres').when("observacion_estado", { is: "rechazado", then: yup.string().required('Debes ingresar un comentario.') }),
    // prospeccion
    observacion_prospeccion: yup.string().oneOf(["aprobado","rechazado","sin evaluar"]).required('Debes seleccionar una opción'),
    observacion_comentario_prospeccion: yup.string().min(2, 'Debes ingresar más de 2 caracteres').max(50, 'Debes ingresar menos de 50 caracteres').when("observacion_prospeccion", { is: "rechazado", then: yup.string().required('Debes ingresar un comentario.') }),
    // prospeccion
    observacion_prospeccion: yup.string().oneOf(["aprobado","rechazado","sin evaluar"]).required('Debes seleccionar una opción'),
    observacion_comentario_prospeccion: yup.string().min(2, 'Debes ingresar más de 2 caracteres').max(50, 'Debes ingresar menos de 50 caracteres').when("observacion_prospeccion", { is: "rechazado", then: yup.string().required('Debes ingresar un comentario.') }),
    // explotacion
    observacion_explotación: yup.string().oneOf(["aprobado","rechazado","sin evaluar"]).required('Debes seleccionar una opción'),
    observacion_comentario_explotación: yup.string().min(2, 'Debes ingresar más de 2 caracteres').max(50, 'Debes ingresar menos de 50 caracteres').when("observacion_explotación", { is: "rechazado", then: yup.string().required('Debes ingresar un comentario.') }),
    // desarrollo
    observacion_desarrollo: yup.string().oneOf(["aprobado","rechazado","sin evaluar"]).required('Debes seleccionar una opción'),
    observacion_comentario_desarrollo: yup.string().min(2, 'Debes ingresar más de 2 caracteres').max(50, 'Debes ingresar menos de 50 caracteres').when("observacion_desarrollo", { is: "rechazado", then: yup.string().required('Debes ingresar un comentario.') }),
    // exploracion
    observacion_exploracion: yup.string().oneOf(["aprobado","rechazado","sin evaluar"]).required('Debes seleccionar una opción'),
    observacion_comentario_exploracion: yup.string().min(2, 'Debes ingresar más de 2 caracteres').max(50, 'Debes ingresar menos de 50 caracteres').when("observacion_exploracion", { is: "rechazado", then: yup.string().required('Debes ingresar un comentario.') }),
    // porcentaje_venta_provincia
    porcentaje_venta_provincia: yup.number().required('Debes ingresar un porcentaje.'),
    observacion_porcentaje_venta_provincia: yup.string().oneOf(["aprobado","rechazado","sin evaluar"]).required('Debes seleccionar una opción'),
    observacion_comentario_porcentaje_venta_provincia: yup.string().min(2, 'Debes ingresar más de 2 caracteres').max(50, 'Debes ingresar menos de 50 caracteres').when("observacion_porcentaje_venta_provincia", { is: "rechazado", then: yup.string().required('Debes ingresar un comentario.') }),
    // porcentaje_venta_provincia
    porcentaje_venta_provincia: yup.number().required('Debes ingresar un porcentaje.'),
    observacion_porcentaje_venta_provincia: yup.string().oneOf(["aprobado","rechazado","sin evaluar"]).required('Debes seleccionar una opción'),
    observacion_comentario_porcentaje_venta_provincia: yup.string().min(2, 'Debes ingresar más de 2 caracteres').max(50, 'Debes ingresar menos de 50 caracteres').when("observacion_porcentaje_venta_provincia", { is: "rechazado", then: yup.string().required('Debes ingresar un comentario.') }),
    // porcentaje_venta_otras_provincias
    porcentaje_venta_otras_provincias: yup.number().required('Debes ingresar un porcentaje.'),
    observacion_porcentaje_venta_otras_provincias: yup.string().oneOf(["aprobado","rechazado","sin evaluar"]).required('Debes seleccionar una opción'),
    observacion_comentario_porcentaje_venta_otras_provincias: yup.string().min(2, 'Debes ingresar más de 2 caracteres').max(50, 'Debes ingresar menos de 50 caracteres').when("observacion_porcentaje_venta_otras_provincias", { is: "rechazado", then: yup.string().required('Debes ingresar un comentario.') }),
    // porcentaje_exportado
    porcentaje_exportado: yup.number().required('Debes ingresar un porcentaje.'),
    observacion_porcentaje_exportado: yup.string().oneOf(["aprobado","rechazado","sin evaluar"]).required('Debes seleccionar una opción'),
    observacion_comentario_porcentaje_exportado: yup.string().min(2, 'Debes ingresar más de 2 caracteres').max(50, 'Debes ingresar menos de 50 caracteres').when("observacion_porcentaje_exportado", { is: "rechazado", then: yup.string().required('Debes ingresar un comentario.') }),
    // // personal_perm_profesional
    // personal_perm_profesional: yup.number().required('Debes ingresar un porcentaje.'),
    // observacion_personal_perm_profesional: yup.string().oneOf(["aprobado","rechazado","sin evaluar"]).required('Debes seleccionar una opción'),
    // observacion_comentario_personal_perm_profesional: yup.string().min(2, 'Debes ingresar más de 2 caracteres').max(50, 'Debes ingresar menos de 50 caracteres').when("observacion_personal_perm_profesional", { is: "rechazado", then: yup.string().required('Debes ingresar un comentario.') }),
    // // personal_perm_operarios
    // personal_perm_operarios: yup.number().required('Debes ingresar un porcentaje.'),
    // observacion_personal_perm_operarios: yup.string().oneOf(["aprobado","rechazado","sin evaluar"]).required('Debes seleccionar una opción'),
    // observacion_comentario_personal_perm_operarios: yup.string().min(2, 'Debes ingresar más de 2 caracteres').max(50, 'Debes ingresar menos de 50 caracteres').when("observacion_personal_perm_operarios", { is: "rechazado", then: yup.string().required('Debes ingresar un comentario.') }),
    // // personal_perm_otros
    // personal_perm_otros: yup.number().required('Debes ingresar un porcentaje.'),
    // observacion_personal_perm_otros: yup.string().oneOf(["aprobado","rechazado","sin evaluar"]).required('Debes seleccionar una opción'),
    // observacion_comentario_personal_perm_otros: yup.string().min(2, 'Debes ingresar más de 2 caracteres').max(50, 'Debes ingresar menos de 50 caracteres').when("observacion_personal_perm_otros", { is: "rechazado", then: yup.string().required('Debes ingresar un comentario.') }),
    // // personal_trans_operarios
    // personal_trans_operarios: yup.number().required('Debes ingresar un porcentaje.'),
    // observacion_personal_trans_operarios: yup.string().oneOf(["aprobado","rechazado","sin evaluar"]).required('Debes seleccionar una opción'),
    // observacion_comentario_personal_trans_operarios: yup.string().min(2, 'Debes ingresar más de 2 caracteres').max(50, 'Debes ingresar menos de 50 caracteres').when("observacion_personal_trans_operarios", { is: "rechazado", then: yup.string().required('Debes ingresar un comentario.') }),
    // // personal_trans_administrativos
    // personal_trans_administrativos: yup.number().required('Debes ingresar un porcentaje.'),
    // observacion_personal_trans_administrativos: yup.string().oneOf(["aprobado","rechazado","sin evaluar"]).required('Debes seleccionar una opción'),
    // observacion_comentario_personal_trans_administrativos: yup.string().min(2, 'Debes ingresar más de 2 caracteres').max(50, 'Debes ingresar menos de 50 caracteres').when("observacion_personal_trans_administrativos", { is: "rechazado", then: yup.string().required('Debes ingresar un comentario.') }),
    //  // personal_trans_otros
    //  personal_trans_otros: yup.number().required('Debes ingresar un porcentaje.'),
    //  observacion_personal_trans_otros: yup.string().oneOf(["aprobado","rechazado","sin evaluar"]).required('Debes seleccionar una opción'),
    //  observacion_comentario_personal_trans_otros: yup.string().min(2, 'Debes ingresar más de 2 caracteres').max(50, 'Debes ingresar menos de 50 caracteres').when("observacion_personal_trans_otros", { is: "rechazado", then: yup.string().required('Debes ingresar un comentario.') }),


});

class Reinscripciones {
    constructor({ ...schema }) {
        this.form = this.getFormSchema(schema);
    }

    getFormSchema(schema) {
        return [
            // row 1
            {
                widthResponsive: 'md:flex-row', //flex
                // columns
                body: [
                    //  col 1
                    {
                        title: 'Datos Personales',
                        width: 'md:w-2/6', //flex
                        columns: 'grid-cols-1', //grid
                        columnsResponsive: '',
                        inputs: [
                            {
                                label: 'DNI',
                                value: schema.dni,
                                type: 'number',
                                name: 'dni',
                                observation: new Observations({schema, name: 'dni'}).observations
                            },
                            {
                                label: 'NOMBRE',
                                value: schema.nombre,
                                type: 'text',
                                name: 'nombre',
                                observation: new Observations({schema, name: 'nombre'}).observations

                            },
                            {
                                label: 'CARGO',
                                value: schema.cargo,
                                type: 'text',
                                name: 'cargo',
                                observation: new Observations({schema, name: 'cargo'}).observations

                            },
                            {
                                label: 'ESTADO',
                                value: schema.estado,
                                type: 'text',
                                name: 'estado',
                                observation: new Observations({schema, name: 'estado'}).observations

                            }
                        ]
                    },
                    //  col 2
                    {
                        title: 'Labores desarrolladas',
                        width: 'md:w-2/6',
                        columns: 'grid-cols-1',
                        columnsResponsive: '',
                        inputs: [
                            {
                                label: 'Prospección',
                                value: schema.prospeccion? true : false,
                                type: 'checkbox',
                                name: 'prospeccion',
                                observation: new Observations({schema, name: 'prospeccion'}).observations

                            },
                            {
                                label: 'Explotación',
                                value: schema.explotacion? true : false,
                                type: 'checkbox',
                                name: 'explotacion',
                                observation: new Observations({schema, name: 'explotación'}).observations

                            },
                            {
                                label: 'Desarrollo',
                                value: schema.desarrollo? true : false,
                                type: 'checkbox',
                                name: 'desarrollo',
                                observation: new Observations({schema, name: 'desarrollo'}).observations

                            },
                            {
                                label: 'Exploración',
                                value: schema.explotacion? true : false,
                                type: 'checkbox',
                                name: 'exploracion',
                                observation: new Observations({schema, name: 'exploracion'}).observations

                            }
                        ]
                    },
                    //  col 3
                    {
                        title: 'Porcentajes de venta',
                        width: 'md:w-2/6',
                        columns: 'grid-cols-1',
                        columnsResponsive: '',
                        inputs: [
                            {
                                label: 'Porcentaje a la provincia',
                                value: schema.porcentaje_venta_provincia,
                                type: 'number',
                                name: 'porcentaje_venta_provincia',
                                observation: new Observations({schema, name: 'porcentaje_venta_provincia'}).observations

                            },
                            {
                                label: 'Porcentaje a otras provincias',
                                value: schema.porcentaje_venta_otras_provincias,
                                type: 'number',
                                name: 'porcentaje_venta_otras_provincias',
                                observation: new Observations({schema, name: 'porcentaje_venta_otras_provincias'}).observations

                            },
                            {
                                label: 'Porcentaje exportado',
                                value: schema.porcentaje_exportado,
                                type: 'number',
                                name: 'porcentaje_exportado',
                                observation: new Observations({schema, name: 'porcentaje_exportado'}).observations

                           }
                        ]
                    },
                ]
            },
            // row 2
            {
                widthResponsive: 'flex-row',
                body: [
                    //  col 1
                    {
                        title: 'Personal ocupado',
                        width: '',
                        columns: 'grid-cols-1',
                        columnsResponsive: 'lg:grid-cols-2',
                        inputs: [
                            {
                                label: 'Profesional Técnico Permanente',
                                value: schema.personal_perm_profesional,
                                type: 'text',
                                name: 'personal_perm_profesional',
                                observation: new Observations({schema, name: 'personal_perm_profesional'}).observations

                            },
                            {
                                label: 'Operarios y Obreros Permanente',
                                value: schema.personal_perm_operarios ,
                                type: 'text',
                                name: 'personal_perm_operarios',
                                observation: new Observations({schema, name: 'personal_perm_operarios'}).observations
                            },
                            {
                                label: 'Administrativo Permanente',
                                value: schema.personal_perm_administrativos,
                                type: 'text',
                                name: 'personal_perm_administrativos',
                                observation: new Observations({schema, name: 'personal_perm_administrativos'}).observations
                            },
                            {
                                label: 'Otros Permanente',
                                value: schema.personal_perm_otros,
                                type: 'text',
                                name: 'personal_perm_otros',
                                observation: new Observations({schema, name: 'personal_perm_otros'}).observations
                            },
                             {
                                label: 'Profesional Transitorio',
                                value: schema.personal_trans_profesional,
                                type: 'text',
                                name: 'personal_trans_profesional',
                                observation: new Observations({schema, name: 'personal_trans_profesional'}).observations
                            },
                            {
                                label: 'Operarios y Obreros Transitorio',
                                value: schema.personal_trans_operarios ,
                                type: 'text',
                                name: 'personal_trans_operarios',
                                observation: new Observations({schema, name: 'personal_trans_operarios'}).observations
                            },
                            {
                                label: 'Administrativo Transitorio',
                                value: schema.personal_trans_administrativos,
                                type: 'text',
                                name: 'personal_trans_administrativos',
                                observation: new Observations({schema, name: 'personal_trans_administrativos'}).observations
                            },
                            {
                                label: 'Otros Transitorio',
                                value: schema.personal_trans_otros,
                                type: 'text',
                                name: 'personal_trans_otros',
                                observation: new Observations({schema, name: 'personal_trans_otros'}).observations
                            }
                        ]
                    },
                    // {
                    //     title: 'Labores desarrolladas',
                    //     width: 'md:w-1/5',
                    //     columns: 'grid-cols-3',
                    //     inputs: [
                    //         {
                    //             label: 'Prospección',
                    //             value: schema.prospeccion,
                    //             type: 'checkbox',
                    //             name: 'prospeccion',

                    //         },
                    //         {
                    //             label: 'Explotación',
                    //             value: schema.explotacion,
                    //             type: 'checkbox',
                    //             name: 'explotacion',

                    //         },
                    //         {
                    //             label: 'Desarrollo',
                    //             value: schema.desarrollo,
                    //             type: 'checkbox',
                    //             name: 'desarrollo',

                    //        },
                    //         {
                    //             label: 'Exploración',
                    //             value: schema.explotacion,
                    //             type: 'checkbox',
                    //             name: 'exploracion',

                    //         }
                    //     ]
                    // },
                    // {
                    //     title: 'Porcentajes de venta',
                    //     width: 'md:w-2/5',
                    //     columns: 'grid-cols-3',
                    //     inputs: [
                    //         {
                    //             label: 'Porcentaje a la provincia',
                    //             value: schema.porcentaje_venta_provincia,
                    //             type: 'number',
                    //             name: 'porcentaje_venta_provincia',

                    //         },
                    //         {
                    //             label: 'Porcentaje a otras provincias',
                    //             value: schema.porcentaje_venta_otras_provincias,
                    //             type: 'number',
                    //             name: 'porcentaje_venta_otras_provincias',

                    //         },
                    //         {
                    //             label: 'Porcentaje exportado',
                    //             value: schema.porcentaje_exportado,
                    //             type: 'number',
                    //             name: 'porcentaje_exportado',

                    //         }
                    //     ]
                    // },
                ]
            }
        ]
    }

}

export {
    yupSquema,
    Reinscripciones
}
