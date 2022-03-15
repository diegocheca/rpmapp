<template>
    <DatePicker v-model="date" @dayclick="click()"
        :from-date="new Date()"
        :attributes="attributes" />

</template>

<script>
    import 'v-calendar/dist/style.css';
    import { Calendar, DatePicker } from 'v-calendar';
    export default {
        components: {
            Calendar,
            DatePicker,
        },
        setup() {
            const click =() => {
                alert("CLICK!!!!!")
            }
            const attributes = [
                {
                    dot: true,
                    dates: [
                        new Date(2022, 2, 1), // Jan 1st
                        new Date(2022, 2, 10), // Jan 10th
                        new Date(2022, 2, 22), // Jan 22nd
                    ],
                },
                {
                    dot: 'red',
                    dates: [
                        new Date(2022, 2, 14), // Jan 4th
                        new Date(2022, 2, 10), // Jan 10th
                        new Date(2022, 2, 15), // Jan 15th
                    ],
                },
                {
                    dot: 'green',
                    dates: [
                        new Date(2022, 2, 14), // Jan 4th
                        new Date(2022, 2, 10), // Jan 10th
                        new Date(2022, 2, 15), // Jan 15th
                    ],
                },
                  {
                    dot: 'orange',
                    dates: [
                        new Date(2022, 2, 4), // Jan 4th
                        new Date(2022, 2, 10), // Jan 10th
                        new Date(2022, 2, 15), // Jan 15th
                    ],
                },
                {
                    dot: {
                        style: {
                            "background-color": 'brown',
                        }
                    },
                    dates: [
                        new Date(2022, 2, 12), // Jan 12th
                        new Date(2022, 2, 26), // Jan 26th
                        new Date(2022, 2, 15), // Jan 15th
                    ],
                }
            ]
            return {
                date: new Date(),
                attributes,
                click,
            };
        },
    }
</script>
