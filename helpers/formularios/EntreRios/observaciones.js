import inputsTypes from "../../enums/inputsTypes";
import * as yup from "yup";

export default class Observaciones {
    constructor(data) {
        this.observations = this.getFormSchema(data);
    }

    getFormSchema(data) {
        if (!data.evaluate) return {};

        return {
            name: `${data.name}_evaluacion`,
            value: data.revisionData? data.revisionData[`${data.name}_evaluacion`] : '',
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
            validations : yup.string().oneOf(["aprobado","rechazado","sin evaluar"]).required('Debes seleccionar una opción'),
            comment:  {
                label: 'OBSERVACIÓN',
                value: data.revisionData? data.revisionData[`${data.name}_comentario`] : '',
                type: inputsTypes.TEXTAREA,
                name: `${data.name}_comentario`,
                validationType: "string",
                validations: yup.string().when(`observacion_${data.name}`, { is: "rechazado", then: yup.string().min(5, 'Debes ingresar al menos 5 caracteres').max(50, 'Puedes ingresar hasta 50 caracteres').required('Debes agregar una observación') }),
            }
        }
    }
}
