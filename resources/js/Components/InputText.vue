<template>
  <div>
    <label
      class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
      >{{ titulo }}</label
    >
    <div class="flex items-stretch w-full mb-4 relative">
      <div class="flex">
        <span
          class="
            flex
            items-center
            leading-normal
            bg-grey-lighter
            border-1
            rounded-r-none
            border border-r-0 border-blue-300
            px-3
            whitespace-no-wrap
            text-grey-dark text-sm
            w-12
            h-10
            bg-blue-300
            justify-center
            items-center
            text-xl
            rounded-lg
            text-white
          "
        >
          <svg
            v-if="tipo === 'text'"
            cxmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6"
            fill="none"
            viewBox="-1 0 24 24"
            stroke="currentColor"
          >
            <path
              d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"
            ></path>
          </svg>
          <svg
            v-else
            cxmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6"
            fill="none"
            viewBox="-1 0 24 24"
            stroke="currentColor"
          >
            <path
              d="M18.303,4.742l-1.454-1.455c-0.171-0.171-0.475-0.171-0.646,0l-3.061,3.064H2.019c-0.251,0-0.457,0.205-0.457,0.456v9.578c0,0.251,0.206,0.456,0.457,0.456h13.683c0.252,0,0.457-0.205,0.457-0.456V7.533l2.144-2.146C18.481,5.208,18.483,4.917,18.303,4.742 M15.258,15.929H2.476V7.263h9.754L9.695,9.792c-0.057,0.057-0.101,0.13-0.119,0.212L9.18,11.36h-3.98c-0.251,0-0.457,0.205-0.457,0.456c0,0.253,0.205,0.456,0.457,0.456h4.336c0.023,0,0.899,0.02,1.498-0.127c0.312-0.077,0.55-0.137,0.55-0.137c0.08-0.018,0.155-0.059,0.212-0.118l3.463-3.443V15.929z M11.241,11.156l-1.078,0.267l0.267-1.076l6.097-6.091l0.808,0.808L11.241,11.156z"
            ></path>
          </svg>
        </span>
      </div>
      <input
        class="
          flex-shrink flex-grow flex-auto
          leading-normal
          w-px
          flex-1
          border border-l-0
          h-10
          border-grey-light
          rounded-lg rounded-l-none
          px-3
          relative
          focus:border-blue focus:shadow
        "
        :type="tipo"
        :placeholder="placeholder"
        :value="value"
        @input="cambio_input($event.target.value)"
      />
    </div>
  </div>
</template>
<script>
export default {
  props: ["titulo", "tipo", "placeholder", "value"],
  data() {
    return {
      //   tipo: "text",
      //   placeholder: "Complete con texto",
      //   titulo: this.$props.titulo,
    };
  },
  methods: {
    cambio_input(value) {
      this.$emit("ValueInput", value);
    },
  },
};
</script>