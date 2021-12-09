import inputsTypes from "../../enums/inputsTypes";
import * as yup from "yup";

export default class Observaciones {
    constructor(data) {
        this.observations = this.getFormSchema(data);
    }

    getFormSchema(data) {
        if (data.action == 'create') return {};

        const obsReturn = {
            name: `${data.name}_evaluacion`,
            value: data.schema[`${data.name}_evaluacion`],
            options: [
                {
                    label: 'Si',
                    value: 'aprobado',
                    type: inputsTypes.RADIO,

                },
                {
                    label: 'No',
                    value: 'rechazado',
                    type: inputsTypes.RADIO,

                },
                {
                    label: 'Sin evaluar',
                    value: 'sin evaluar',
                    type: inputsTypes.RADIO,
                }
            ],
            validations: data.action == 'evaluate' ? yup.string().oneOf(["aprobado", "rechazado", "sin evaluar"], 'Debes seleccionar una opción').required('Debes seleccionar una opción').nullable() : null,
            comment:  {
                label: 'OBSERVACIÓN',
                value: data.schema[`${data.name}_comentario`],
                type: inputsTypes.TEXTAREA,
                name: `${data.name}_comentario`,
                validationType: "string",
                validations:
                    yup
                    .string()
                    .when(`${data.name}_evaluacion`, {
                        is: "rechazado",
                        then:
                        yup
                        .string()
                        .min(5, 'Debes ingresar al menos 5 caracteres')
                        .max(50, 'Puedes ingresar hasta 50 caracteres')
                        .required('Debes agregar una observación')
                        .nullable()
                    })
                    .nullable(),
            }
        }
        // console.log(obsReturn);
        return obsReturn;
    }
}
