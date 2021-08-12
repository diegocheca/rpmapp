require('./bootstrap');

// Import modules...
import { createApp, h } from 'vue';
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import Vue3Autocounter from 'vue3-autocounter';


import  Vue from  'vue'  ;

import Saludo from "./Pages/MisComponentes/saludo";

//Vue.component('saludo', require('./Pages/MisComponentes/saludo').default);

const el = document.getElementById('app');

createApp({
    render: () =>
        h(InertiaApp, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) => require(`./Pages/${name}`).default,
        }),
})
    .mixin({ methods: { route } })
    .use(InertiaPlugin)
    .component('vue3-autocounter', Vue3Autocounter)
    .mount(el);

InertiaProgress.init({ color: '#4B5563' });

