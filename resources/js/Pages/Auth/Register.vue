<template>
  <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
    <inertia-link
      :href="route('login')"
      class="
        relative
        flex flex-row
        items-center
        h-11
        focus:outline-none
        text-gray-600
        hover:text-blue-800
        pr-6
      "
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-6 w-6"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
        />
      </svg>
      <span class="ml-1">Ingresar</span>
    </inertia-link>
  </div>
  <jet-authentication-card>
    <template #logo>
      <jet-authentication-card-logo />
    </template>

    <jet-validation-errors class="mb-4" />

    <form @submit.prevent="submit">
      <div>
        <jet-label for="name" value="Nombre y Apellido / Razon Social" />
        <jet-input
          id="name"
          type="text"
          class="mt-1 block w-full"
          v-model="form.name"
          required
          autofocus
          autocomplete="name"
        />
      </div>
      <div class="mt-4">
        <jet-label for="provincia" value="Provincia" />
        <!-- <jet-input
                    id="provincia"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="provincia"
                /> -->
        <!-- <div class="relative inline-flex self-center"> -->
        <select
          id="provincia"
          v-model="form.id_provincia"
          @change="namepro($event)"
          required
          class="
            mt-1
            block
            w-full
            rounded
            text-gray-700
            border-gray-300
            focus:border-blue-500
            focus:border-blue-300
            focus:border-opacity-25
            focus:border-4
            pr-10
            bg-white
          "
        >
          <option>Seleccione Provincia...</option>
          <option
            v-for="prov in lista_provincias"
            v-bind:key="prov.id"
            :value="prov.id"
          >
            {{ prov.nombre }}
          </option>
        </select>
        <!-- </div> -->
      </div>
      <div class="mt-4">
        <jet-label for="email" value="Email" />
        <jet-input
          id="email"
          type="email"
          class="mt-1 block w-full"
          v-model="form.email"
          required
        />
      </div>

      <div class="mt-4">
        <jet-label for="password" value="Contraseña" />
        <jet-input
          id="password"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password"
          required
          autocomplete="new-password"
        />
      </div>

      <div class="mt-4">
        <jet-label for="password_confirmation" value="Confirmar Contraseña" />
        <jet-input
          id="password_confirmation"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password_confirmation"
          required
          autocomplete="new-password"
        />
      </div>

      <div
        class="mt-4"
        v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature"
      >
        <jet-label for="terms">
          <div class="flex items-center">
            <jet-checkbox
              name="terms"
              id="terms"
              v-model:checked="form.terms"
            />

            <div class="ml-2">
              I agree to the
              <a
                target="_blank"
                :href="route('terms.show')"
                class="underline text-sm text-gray-600 hover:text-gray-900"
                >Terms of Service</a
              >
              and
              <a
                target="_blank"
                :href="route('policy.show')"
                class="underline text-sm text-gray-600 hover:text-gray-900"
                >Privacy Policy</a
              >
            </div>
          </div>
        </jet-label>
      </div>

      <div class="flex items-center justify-end mt-4">
        <inertia-link
          :href="route('login')"
          class="underline text-sm text-gray-600 hover:text-gray-900"
        >
          Ya se encuentra registrado?
        </inertia-link>

        <jet-button
          class="ml-4"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Registrarse
        </jet-button>
      </div>
    </form>
  </jet-authentication-card>
</template>

<script>
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetCheckbox from "@/Jetstream/Checkbox";
import JetLabel from "@/Jetstream/Label";
import JetValidationErrors from "@/Jetstream/ValidationErrors";

export default {
  components: {
    JetAuthenticationCard,
    JetAuthenticationCardLogo,
    JetButton,
    JetInput,
    JetCheckbox,
    JetLabel,
    JetValidationErrors,
  },

  data() {
    return {
      lista_provincias: [],
      form: this.$inertia.form({
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
        terms: false,
        // id_provincia: 70, // San Juan
        id_provincia: "Seleccione Provincia...",
        provincia: "",
      }),
      idSelPro: 10,
    };
  },

  methods: {
    async namepro(v) {
      var nameprovincia = "";
      await axios
        .get("/datos/provincia" + "/" + v.target.value)
        .then(function (response) {
          nameprovincia = response.data[0].nombre;
        });
      this.form.provincia = nameprovincia;
      // console.log("Valor3: ", nameprovincia);
    },
    submit() {
      this.form.post(this.route("register"), {
        onFinish: () => this.form.reset("password", "password_confirmation"),
      });
    },
  },
  mounted() {
    let self = this;
    //voy a buscar las provincias
    this.$nextTick(() => {
      axios
        .get("/api/datos/traer_provincias")
        .then(function (response) {
          // console.log("las provincias son:\n");
          self.lista_provincias = response.data;
          // console.log(self.lista_provincias);
        })
        .catch(function (error) {
          console.log(error);
        });
    });
  },
};
</script>