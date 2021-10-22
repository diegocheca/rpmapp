<template>
  <div class="">{{ asd.nro1 }}</div>
  <button class="bg-blue-500 text-white px-7 py-3 rounded-md" @click="sum">GGG</button>
</template>


<script>
import { Inertia } from '@inertiajs/inertia'
import AppLayout from "@/Layouts/AppLayout";
import ChartBarM from '@/Components/charts/barminerales'
import JetDialogModal from '@/Jetstream/DialogModal';
import JetButton from '@/Jetstream/Button'
import { reactive, ref, toRefs } from '@vue/reactivity';

export default {
  props: {
    reinscripciones: Array,
  },
  components: {
    AppLayout,
    ChartBarM,
    JetDialogModal,
    JetButton
  },
 setup() {
    const asd = reactive({
        nro1: 0,
        nro2: 0
    });

    const sum = () => {
        console.log(asd);
        asd.nro1.value++
    }

    return {
        asd,
        sum
    }
 }
};
</script>
