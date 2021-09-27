<template>
    <div class="container mx-auto">
        <div :class="bigClass">
            <!-- LEFT PART -->
            <div class="flex flex-col lg:ml-14 xl:ml-28 max-w-sm lg:max-w-xl z-10">
                <h4 class="text-4xl text-center md:text-left font-bold text-white md:pb-2">
                    {{$props.bigLabel}}
                </h4>
                <p class="text-center md:text-left text-white opacity-70 md:pb-6">
                    {{mediumLabel}} 
                </p>
            </div>
            <!-- RIGHT PART -->
            <div class="pt-8 md:pt-0 justify-center lg:ml-auto z-10">
                <!-- Contribuer -->
                <a href="#" target="_blank" v-if="$props.type==='error'"
                    :class="buttonClass">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z" />
                            </svg>
                    <span>
                        Deshacer
                    </span>
                </a>
                <a href="#" target="_blank" v-if="$props.type==='success'"
                    :class="buttonClass">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    <span>
                        Ver
                    </span>
                </a>
            </div>
            <!-- ATTENTION -->
            <p class="pt-8 text-xs block md:hidden z-10 text-white">
                    consectetur adipiscing elit
            </p>
            <!-- DÉCORATION -->
            <div :class="decorationClass"></div>
        </div>
    </div>
</template>
<script>
export default {
    props: [
        'bigLabel', 
        'mediumLabel',
        'type'
        ],
        data() {
            return {
                bigClass : '',
                buttonClass: '',
                decorationClass: '',

            }
        },
        methods:{
            start(){
                if(this.$props.type === 'error')
                {
                    this.bigClass = 'rounded-lg bg-red-300 text-white p-8 my-12 flex flex-col md:flex-row space-between items-center justify-between relative overflow-hidden';
                    this.buttonClass='flex items-center px-8 py-4 text-center text-sm text-red-300 uppercase bg-white font-display rounded-full transition duration-200 hover:bg-red-600 hover:text-white';
                    this.decorationClass='absolute bg-red-400 opacity-60 w-96 h-96 -top-10 -right-16 md:w-[800px] md:h-[800px] md:left-[45%] md:top-[-150%] rounded-full shadow-2xl z-0';

                }
                if(this.$props.type === 'success')
                {
                    this.bigClass = 'rounded-lg bg-green-300 text-white p-8 my-12 flex flex-col md:flex-row space-between items-center justify-between relative overflow-hidden';
                    this.buttonClass='flex items-center px-8 py-4 text-center text-sm text-green-300 uppercase bg-white font-display rounded-full transition duration-200 hover:bg-green-600 hover:text-white';
                    this.decorationClass='absolute bg-green-400 opacity-60 w-96 h-96 -top-10 -right-16 md:w-[800px] md:h-[800px] md:left-[45%] md:top-[-150%] rounded-full shadow-2xl z-0';

                }
                
            }
        },
        mounted(){
            this.start();
        },

};
</script>