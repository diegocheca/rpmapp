<template>
  <div
    class="
      fixed
      bottom-0
      right-0
      w-16
      h-16
      mr-24
      mb-20
      md:mr-12 md:mb-8
      cursor-pointer
      z-10
    "
    @click="show = !show"
  >
    <svg
      xmlns="http://www.w3.org/2000/svg"
      class="h-28 w-28 md:h-20 md:w-20 fill-current text-indigo-500"
      :class="[show ? 'transform rotate-45' : '']"
      viewBox="0 0 20 20"
      fill="currentColor"
    >
      <path
        fill-rule="evenodd"
        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
        clip-rule="evenodd"
      />
    </svg>
  </div>
  <div
    v-show="show"
    class="
      fixed
      flex flex-col flex-wrap
      space-y-2
      bottom-0
      right-0
      mr-12
      mb-36
      md:mb-32
      z-10
    "
  >
    <button
      v-for="(item, index) in buttons.modal"
      :key="index"
      @click="handleClick({ item, index })"
      class="
        text-center
        bg-green-500
        hover:bg-green-800
        rounded-full
        text-white
        px-3
        py-2
      "
    >
      {{ item.label }}
    </button>
    <template v-for="(item, index) in buttons.links" :key="index">
      <a
        v-if="item.ver"
        class="text-center rounded-full text-white px-3 py-2"
        :class="item.color"
        :href="item.url"
      >
        {{ item.label }}
      </a>
    </template>
  </div>
</template>
<script>
export default {
  props: {
    buttons: {
      type: Object,
      require: true,
    },
  },
  emits: ["showModal"],

  data() {
    return {
      show: false,
    };
  },
  methods: {
    handleClick(data) {
      this.$emit("showModal", { show: !data.show, index: data.index });
      this.show = false;
    },
  },
};
</script>