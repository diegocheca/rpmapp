<template>
<div>
    <div class="grid gap-4" :class="[item.columns, item.columnsResponsive]">
        <div v-for="(element, indexElement) in item.elements" :key="indexElement">
            <label for="item.name" class="mb-2 uppercase text-md text-grey-darkest">{{element.label}} :</label>
            <VueMultiselect v-model="element.value" :id="element" :options="element.options" :multiple="element.multiple" :close-on-select="element.closeOnSelect" :searchable="element.searchable" :placeholder="element.placeholder" label="label" track-by="value" selectLabel="Presiona para seleccionar" deselectLabel="Presiona para quitarlo" @select="getOptions" @remove="removeOptions">
            </VueMultiselect>

        </div>
    </div>
    <div class="flex justify-center pt-9">
        <button type="button" class="bg-blue-500 hover:bg-blue-800 rounded text-white px-2 py-1" @click="addRow">+ Agregar registro</button>
    </div>

</div>
</template>

<script>
import VueMultiselect from 'vue-multiselect'

export default {
    components: {
        VueMultiselect
    },
    props: [
        'item'
    ],
    data() {
        return {
            subElements: []
        }
    },
    methods: {
        getOptions(value, id) {
            console.log(id);
            const elementChange = this.item.elements.find(e => e.name == id);

            if(elementChange.inputDepends) {
                for (let index = 0; index < elementChange.inputDepends.length; index++) {
                    const elementDepends = elementChange.inputDepends[index];
                    const options = elementChange.optionsDepends[value.value];
                    const indexDepends = this.item.elements.findIndex(e => e.name == elementDepends);
                    this.item.elements[indexDepends].options = options;
                    this.item.elements[indexDepends].value = null
                }
            }
        },
        removeOptions(value, id) {
           const elementChange = this.item.elements.find(e => e.name == id);
           if(elementChange.inputDepends) {
                for (let index = 0; index < elementChange.inputDepends.length; index++) {
                    const elementDepends = elementChange.inputDepends[index];
                    const indexDepends = this.item.elements.findIndex(e => e.name == elementDepends);
                    this.item.elements[indexDepends].options = [];

                }
           }
        },
        addRow() {
            // const new = this.item
        }
    },
}
</script>
