<template>
    <jet-dialog-modal :show="showCalendarModal" @close="showCalendarModal = !showCalendarModal" max-width="lg">
        <template #title>
                {{modal_tittle}}
        </template>
        <template #content>
            <div class="relative flex flex-col w-full flex-grow bg-gray-200">
                <div class="flex-1 overflow-y-auto bg-white w-full">
                    <div v-if="calendarEventsToday.length == 0" class="w-full flex flex-row justify-center items-center text-gray-400 px-6"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p> No hay eventos para el día de hoy</p>
                    </div>
                    <table v-else class="min-w-max w-full table-auto">
                        <tbody class="text-gray-600 text-sm font-light">
                            <tr v-for="(item, index) in calendarEventsToday" :key="index">
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span class="text-sm font-semibold text-gray-900">{{item.razonsocial}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span class="ml-2 text-sm font-semibold text-red-900 bg-red-200 rounded-full leading-none px-2 py-1">{{item.motivo}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <jet-nav-link :href="route('inbox.id', {id: item.id})">
                                             <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                        </jet-nav-link>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </template>
        <template #footer>
            <button class="px-4 py-2 rounded-md text-sm font-medium border shadow focus:outline-none focus:ring transition text-gray-600 bg-gray-50 border-gray-200 hover:bg-gray-100 active:bg-gray-200 focus:ring-gray-300" @click="showCalendarModal = !showCalendarModal">
                    Cancelar
            </button>
        </template>
    </jet-dialog-modal>
    <DatePicker v-model="currentDay" @dayclick="openModalCalendar"
        :from-date="new Date()"
        :attributes="attributes"
    />
</template>

<script setup>
    import 'v-calendar/dist/style.css';
    import { Calendar, DatePicker } from 'v-calendar';
    import { reactive, ref, computed, onMounted } from "vue";
    import moment from 'moment';
    import JetDialogModal from '../Jetstream/DialogModal.vue'
    import JetNavLink from "@/Jetstream/NavLink";


    let showCalendarModal = ref(false);
    const { calendarEvents } = defineProps(['calendarEvents'])
    const modal_tittle = 'Notificaciones'
    const modal_body = reactive({})
    const currentDay = ref(new Date())
    let calendarEventsToday = ref([])

    const openModalCalendar =(day) => {
        calendarEventsToday.value = calendarEvents['iiaDia'].filter(element => moment(element.fecha_vencimiento).format("DD MM YYYY") == moment(day.id).format("DD MM YYYY")).map(element => {
            return {
                ...element,
                motivo: "Vencimiento IIA DIA"
            }
        })
        showCalendarModal.value = true
    }

    const getEventsCalendar = () => {
        const dates = calendarEvents['iiaDia'].map(element => moment(element.fecha_vencimiento).format())
        return {
            dot: true,
            dates,
            key: 'today',
        }
    }

    const attributes = reactive([getEventsCalendar()])
</script>
<style>
    .vc-container {
        width: 100%;
    }
</style>