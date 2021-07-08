// import inputsTypes from "../../enums/inputsTypes";
import inputsTypes from "../../enums/inputsTypes";
import * as yup from "yup";

export default class Observaciones {
    constructor(data) {
        this.observations = this.getFormSchema(data);
    }

    getFormSchema(data) {
        if (!data.evaluate) return {};

        return {
            options: [
                {
                    label: 'Si',
                    value: 'aprobado',
                    type: inputsTypes.RADIO,
                    name: `observacion_${data.name}`,
                    validations : yup.string().oneOf(["aprobado","rechazado","sin evaluar"]).required('Debes seleccionar una opción'),
                },
                {
                    label: 'No',
                    value: 'rechazado',
                    type: inputsTypes.RADIO,
                    name: `observacion_${data.name}`,

                },
                {
                    label: 'Sin evaluar',
                    value: 'sin evaluar',
                    type: inputsTypes.RADIO,
                    name: `observacion_${data.name}`,

                }
            ],
            comment:  {
                label: 'OBSERVACIÓN',
                value: '',
                type: inputsTypes.TEXTAREA,
                name: `observacion_comentario_${data.name}`,
                validationType: "string",
                validations: yup.string().when(`observacion_${data.name}`, { is: "rechazado", then: yup.string().min(5, 'Debes ingresar al menos 5 caracteres').max(50, 'Puedes ingresar hasta 50 caracteres').required('Debes agregar una observación') }),
            }
        }
    }
}
