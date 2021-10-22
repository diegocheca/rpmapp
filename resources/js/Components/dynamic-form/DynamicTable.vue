<template>
    <div class="container flex justify-center mx-auto">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="border-b border-gray-200 shadow">
                    <table class="divide-y divide-gray-300 ">
                        <thead class="bg-gray-50">
                            <tr>
                                <th v-if="table.verticalTitle"></th>
                                <th v-for="(title, index) in dataColumns" :key="index" class="px-6 py-2 text-xs text-gray-500">
                                    {{ title }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">
                            <tr class="whitespace-nowrap" v-for="(nameTitle, index2) in table.verticalTitle" :key="index2">
                                <td v-if="table.verticalTitle" class="border-r border-gray-200 shadow px-4">{{ nameTitle }}</td>
                                <td class="px-6 py-4" v-for="(td, index3) in columnsTable" :key="index3">
                                    <div class="text-sm">



                                        <input type="text" class="inp" />

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

                                        <!-- <Field  :value="tr.value" :name="tr.name" :type="tr.type" class="border-0 border-b-2 focus:outline-none focus:border-t-0 text-grey-darkest appearance-none outline-none bg-transparent"  /> -->
<!-- <input class="inp" placeholder="What needs to be done?👻"/> -->
</template>
<script>
import { inject } from 'vue'
export default {
    props: {
        table: {
            type: Array
        },
        columns: {
            type: Array
        },
        rows: {
            type: Array
        }
    },
    // inject: [
    //     'columnsTable'
    // ],
    // data() {
    //     const dataColumns = this.$props.table.horizontalTitle?.length > 0? this.$props.table.horizontalTitle : this.$props.columns

    //     console.log(this.columnsTable.value);
    //     return {
    //         dataColumns
    //     }
    // },
    setup(){
        const columnsTable = inject('columnsTable')
        console.log(columnsTable);
        return {
            columnsTable
        }
    }
    // setup(props) {
    //     const dataColumns = ref(props.table.horizontalTitle?.length > 0? props.table.horizontalTitle : props.columns)
    //     // const dataColumns = props.table.horizontalTitle?.length > 0? props.table.horizontalTitle : props.columns
    //     console.log(dataColumns);
    //     return {
    //         dataColumns
    //     }
    // }
}
</script>
<style lang="scss" scoped>
  .inp {
        border:none;
        border-bottom: 1px solid #1890ff;
        padding: 5px 10px;
        outline: none;
    }

    [placeholder]:focus::-webkit-input-placeholder {
        transition: text-indent 0.4s 0.4s ease;
        text-indent: -100%;
        opacity: 1;
    }
</style>