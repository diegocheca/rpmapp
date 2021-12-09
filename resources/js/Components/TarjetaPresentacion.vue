<style>
/* Add this shadow in tailwind.config.js */
.neumorphism-shadow {
  box-shadow: -4px -4px 10px rgb(255, 255, 255),
    4px 4px 10px rgba(0, 0, 0, 0.219);
}
/* Rotate chevron in collapsing */
[data-bs-toggle="collapse"][aria-expanded="true"] span:nth-child(3) svg {
  transform: rotate(-90deg);
}

/* For bootstrap collapse plugin */
.fade {
  transition: opacity 0.15s linear;
}
.fade:not(.show) {
  opacity: 0;
}
.collapse:not(.show) {
  display: none;
}
.collapsing {
  height: 0;
  overflow: hidden;
  transition: height 0.35s ease;
}
@media (prefers-reduced-motion: reduce) {
  .collapsing {
    transition: none;
  }
  .fade {
    transition: none;
  }
}
/* fixed github link. this stuff also should be applied throw config file  */
.github-link:hover {
  box-shadow: inset -4px -4px 10px rgb(255, 255, 255),
    inset 4px 4px 10px rgba(0, 0, 0, 0.219);
}
.github-link:hover > svg,
.github-link:focus > svg {
  transform: scale(0.95);
}
</style>

<template>
  <div
    :class="clase_sup"
    class="
      flex
      items-center
      justify-center
      flex-shrink-0
      px-4
      py-2
      mx-4
      rounded-lg
      neumorphism-shadow
    "
  >
    <img
      class="h-8 w-8 rounded-full object-cover"
      :src="logoSrc"
      :alt="logoAlt"
    />
    <span
      :class="clase_inf"
      class="mt-2 px-4 py-1 rounded-md text-xl font-semibold tracking-wider"
      >{{ titulo }}</span
    >
    <span
      v-if="ClaroOscuro == 'oscuro'"
      class="
        font-mono font-semibold
        uppercase
        ml-4
        bg-blue-500
        text-white 
        text-base
        tracking-wider
        rounded-xl
        border-2
        shadow-lg
        w-full
        py-1
        px-3
      "
    >
      {{ subtitulo }}
    </span>
    <span
      v-if="ClaroOscuro == 'claro'"
      class="
        font-mono font-semibold
        uppercase
        ml-4
        bg-white
        border-indigo-400
        text-base
        tracking-wider
        rounded-xl
        border-2
        shadow-lg
        w-full
        py-1
        px-3
      "
    >
      {{ subtitulo }}
    </span>
  </div>
</template>
<script>
export default {
  props: [
    "clase_sup",
    "clase_inf",
    "logoSrc",
    "logoAlt",
    "titulo",
    "subtitulo",
    "ClaroOscuro",
  ],
};
</script>
