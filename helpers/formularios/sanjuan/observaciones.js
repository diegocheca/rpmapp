export default class Observaciones {
    constructor(data) {
        this.observations = this.getFormSchema(data);
    }

    getFormSchema(data) {
        return {
            options: [
                {
                    label: 'Si',
                    value: 'aprobado',
                    type: 'radio',
                    name: `observacion_${data.name}`,

                },
                {
                    label: 'No',
                    value: 'rechazado',
                    type: 'radio',
                    name: `observacion_${data.name}`,

                },
                {
                    label: 'Sin evaluar',
                    value: 'sin evaluar',
                    type: 'radio',
                    name: `observacion_${data.name}`,

                }
            ],
            comment:  {
                label: 'OBSERVACIÓN',
                value: '',
                type: 'textarea',
                name: `observacion_comentario_${data.name}`,

            }
        }
    }
}
