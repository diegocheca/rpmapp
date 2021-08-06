
export function createYupSchema(schema, config, evaluate) {
    const action = evaluate;
   // console.log(action);
    for (let index = 0; index < config.body.length; index++) {
        const inputs = config.body[index].inputs;

        for (let index2 = 0; index2 < inputs.length; index2++) {
            const element = inputs[index2];

            const { name, validations = {} } = element;

            // if (element.elements) {
            //     for (let subElementIndex = 0; subElementIndex < element.elements.length; subElementIndex++) {
            //         const subElement = element.elements[subElementIndex];

            //         for (let index = 0; index < subElement.length; index++) {
            //             const subElement2 = subElement[index];

            //             if (_.isEmpty(subElement2.validations)) continue;

            //             schema[subElement2.name] = subElement2.validations;
            //         }
            //     }
            // } else {
                if (!_.isEmpty(element.observation)) {
                    const observationComment = element.observation.comment;
                    const observationOptions = element.observation;

                    schema[observationComment.name] = observationComment.validations;
                    schema[observationOptions.name] = observationOptions.validations;
                }

                if (_.isEmpty(validations)) continue;

                schema[name] = validations;
            // }

        }

    }
    // delete schema['undefined'];
// console.log(schema);
    return schema;
}

export function createYupStepSchema(schema, config, evaluate) {
    const action = evaluate;

    for (let indexS = 0; indexS < config.bodyStep.length; indexS++) {
        for (let index = 0; index < config.bodyStep[indexS].body.length; index++) {
            const inputs = config.bodyStep[indexS].body[index].inputs;

            for (let index2 = 0; index2 < inputs.length; index2++) {
                const element = inputs[index2];

                const { name, validations = {} } = element;

                if (!_.isEmpty(element.observation)) {
                    const observationComment = element.observation.comment;
                    const observationOptions = element.observation;

                    schema[observationComment.name] = observationComment.validations;
                    schema[observationOptions.name] = observationOptions.validations;
                }

                if (_.isEmpty(validations)) continue;

                schema[name] = validations;

            }

        }
    }
// console.log(schema);
    return schema;
}
