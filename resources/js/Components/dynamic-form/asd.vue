<template>
  <div>
    <h1>vee-validate form wizard</h1>
    <Form
      @submit="nextStep"
      :validation-schema="currentSchema"
    >
      <template v-if="currentStep === 0">
        <label for="name">Name</label>
        <Field name="name" id="name" v-model="formValues.name" />
        <ErrorMessage name="name" />

        <label for="email">Email</label>
        <Field
          name="email"
          id="email"
          type="email"
          v-model="formValues.email"
        />
        <ErrorMessage name="email" />
      </template>

      <template v-if="currentStep === 1">
        <label for="password">Password</label>
        <Field
          name="password"
          type="password"
          id="password"
          v-model="formValues.password"
        />
        <ErrorMessage name="password" />

        <label for="confirmation">Confirm Password</label>
        <Field
          name="confirmPassword"
          type="password"
          id="confirmation"
          v-model="formValues.password"
        />
        <ErrorMessage name="confirmPassword" />
      </template>

      <template v-if="currentStep === 2">
        <label for="address">Address</label>
        <Field
          as="textarea"
          name="address"
          id="address"
          v-model="formValues.address"
        />
        <ErrorMessage name="address" />

        <label for="postalCode">Postal Code</label>
        <Field
          name="postalCode"
          id="postalCode"
          v-model="formValues.postalCode"
        />
        <ErrorMessage name="postalCode" />
      </template>

      <template v-if="currentStep === 3">
        <label for="terms">Agree to terms and conditions</label>
        <Field
          name="terms"
          type="checkbox"
          id="terms"
          :value="true"
          v-model="formValues.terms"
        />
        <ErrorMessage name="terms" />
      </template>

      <button v-if="currentStep !== 0" type="button" @click="prevStep">
        Previous
      </button>

      <button v-if="currentStep !== 3" type="submit">Next</button>

      <button v-if="currentStep === 3" type="submit">Finish</button>
    </Form>
  </div>
</template>

<script>
import { Form, Field, ErrorMessage } from "vee-validate";
import * as yup from "yup";
import { ref, reactive, computed } from "vue";

export default {
  name: "App",
  components: {
    Form,
    Field,
    ErrorMessage,
  },
  setup: () => {
    const currentStep = ref(0);
    // since vee-validate removes values from the values object once the fields are unmounted
    // we would need to accumlate them manually
    const formValues = reactive({});

    const schemas = [
      yup.object({
        name: yup.string().required(),
        email: yup.string().required().email(),
      }),
      yup.object({
        password: yup.string().required().min(6),
        confirmPassword: yup
          .string()
          .required()
          .min(6)
          .oneOf([yup.ref("password")], "Passwords must match"),
      }),
      yup.object({
        address: yup.string().required(),
        postalCode: yup
          .string()
          .required()
          .matches(/^[0-9]+$/, "Must be numeric"),
      }),
      yup.object({
        terms: yup.bool().required().equals([true]),
      }),
    ];

    const currentSchema = computed(() => {
      return schemas[currentStep.value];
    });

    function nextStep(values) {
      if (currentStep.value === 3) {
        console.log("Done: ", JSON.stringify(formValues, null, 2));
        return;
      }

      // accumlate the form values with the values from previous steps
      Object.assign(formValues, values);
      console.log("Current values: ");
      console.log(JSON.stringify(formValues, null, 2));
      currentStep.value++;
    }

    function prevStep() {
      if (currentStep.value <= 0) {
        return;
      }

      currentStep.value--;
    }

    return {
      currentStep,
      currentSchema,
      prevStep,
      formValues,
      nextStep,
    };
  },
};
</script>

<style scoped>
#app {
  font-family: Arial, Helvetica, sans-serif;
  max-width: 500px;
  padding-bottom: 100px;
}

input {
  display: block;
}

span {
  display: block;
  margin-bottom: 20px;
}

label {
  display: block;
  margin-top: 20px;
}

button {
  display: block;
  margin-top: 10px;
}

button[type="submit"] {
  margin-top: 10px;
}

form {
  padding: 20px;
  border: 1px solid black;
}

p {
  font-size: 14px;
}
</style>
