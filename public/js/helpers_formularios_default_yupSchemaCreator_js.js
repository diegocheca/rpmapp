(self["webpackChunk"] = self["webpackChunk"] || []).push([["helpers_formularios_default_yupSchemaCreator_js"],{

/***/ "./helpers/formularios/default/yupSchemaCreator.js":
/*!*********************************************************!*\
  !*** ./helpers/formularios/default/yupSchemaCreator.js ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "createYupSchema": () => (/* binding */ createYupSchema)
/* harmony export */ });
function createYupSchema(schema, config, evaluate) {
  var action = evaluate; // console.log(action);

  for (var index = 0; index < config.body.length; index++) {
    var inputs = config.body[index].inputs;

    for (var index2 = 0; index2 < inputs.length; index2++) {
      var element = inputs[index2];
      var name = element.name,
          _element$validations = element.validations,
          validations = _element$validations === void 0 ? {} : _element$validations; // if (element.elements) {
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
        var observationComment = element.observation.comment;
        var observationOptions = element.observation.options[0];
        schema[observationComment.name] = observationComment.validations;
        schema[observationOptions.name] = observationOptions.validations;
      }

      if (_.isEmpty(validations)) continue;
      schema[name] = validations; // }
    }
  } // console.log(schema);


  return schema;
}

/***/ })

}]);