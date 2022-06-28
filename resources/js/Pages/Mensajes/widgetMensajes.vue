<template>
    <div class="flex min-h-screen items-center justify-center p-10 bg-white">
        <div class="container grid max-w-screen-xl gap-8 lg:grid-cols-2 lg:grid-rows-2">
            <div class="row-span-2 flex flex-col rounded-md border border-slate-200">
            <div class="h-1/2 flex-1"><img src="https://d33wubrfki0l68.cloudfront.net/c43307b88fb814366e4f3a181c788796cba83faa/4c05c/new/landing/omnichannel.png" class="w-full object-cover object-right-top" alt="omnichannel" /></div>
            <div class="p-10">
                <h3 class="text-xl font-medium text-gray-700">Mensajes de la Administración</h3>
                <div class="col-start-1 col-end-8 p-3 rounded-lg">
                    <br>
                    <div class="flex flex-row items-center">
                    <div
                        class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0"
                    >
                        A
                    </div>
                    <div
                        class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl"
                    >
                        <div>
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Vel ipsa commodi illum saepe numquam maxime
                        asperiores voluptate sit, minima perspiciatis.
                        </div>
                    </div>
                    </div>
                    <br>
                    <div class="flex flex-row items-center">
                    <div
                        class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0"
                    >
                        A
                    </div>
                    <div
                        class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl"
                    >
                        <div>
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Vel ipsa commodi illum saepe numquam maxime
                        asperiores voluptate sit, minima perspiciatis.
                        </div>
                    </div>
                    </div>
                    <br>
                    <div class="flex flex-row items-center">
                    <div
                        class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0"
                    >
                        A
                    </div>
                    <div
                        class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl"
                    >
                        <div>
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Vel ipsa commodi illum saepe numquam maxime
                        asperiores voluptate sit, minima perspiciatis.
                        </div>
                    </div>
                    </div>
                </div>
                <a href="" class="mt-2 inline-flex text-sky-500">Ver mas →</a>
            </div>
            </div>
            <div class="flex rounded-md border border-slate-200">
            <div class="flex-1 p-10">
                <h3 class="text-xl font-medium text-gray-700">Mnesajes de Usuarios</h3>
                
                <br>
                    <div class="flex flex-row items-center">
                    <div
                        class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0"
                    >
                        A
                    </div>
                    <div
                        class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl"
                    >
                        <div>
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Vel ipsa commodi illum saepe numquam maxime
                        asperiores voluptate sit, minima perspiciatis.
                        </div>
                    </div>
                    </div>
                    <br>
                    <div class="flex flex-row items-center">
                    <div
                        class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0"
                    >
                        A
                    </div>
                    <div
                        class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl"
                    >
                        <div>
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Vel ipsa commodi illum saepe numquam maxime
                        asperiores voluptate sit, minima perspiciatis.
                        </div>
                    </div>
                    </div>
                    <br>
                    <div class="flex flex-row items-center">
                    <div
                        class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0"
                    >
                        A
                    </div>
                    <div
                        class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl"
                    >
                        <div>
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Vel ipsa commodi illum saepe numquam maxime
                        asperiores voluptate sit, minima perspiciatis.
                        </div>
                    </div>
                    </div>

                <a href="" class="mt-2 inline-flex text-sky-500">Ver más →</a>
            </div>

            <div class="relative hidden h-full w-1/3 overflow-hidden lg:block">
                <div class="absolute inset-0">
                <img src="https://d33wubrfki0l68.cloudfront.net/e5290c26cc1703e54e0afe3d1472046098ecd819/53775/new/landing/live-chat.png" class="h-full w-full object-cover object-left-top" alt="" />
                </div>
            </div>
            </div>
            <div class="flex rounded-md border border-slate-200">
            <div class="flex-1 p-10">
                <h3 class="text-xl font-medium text-gray-700">Respond faster, with automated chatbots</h3>
                
                <a href="" class="mt-2 inline-flex text-sky-500">Read More →</a>
            </div>

            <div class="relative hidden h-full w-1/3 overflow-hidden lg:block">
                <div class="absolute inset-0">
                <img src="https://d33wubrfki0l68.cloudfront.net/1205a454c4b64452a51930c9b0043f8db9ff8271/d202e/new/landing/chat-bot.png" class="h-full w-full object-cover object-left-top" alt="" />
                </div>
            </div>
            </div>
        </div>
    </div>
</template>



<script>
import AppLayout from "@/Layouts/AppLayout";
import pusherjs from "pusher-js";

export default {
  components: {
    AppLayout,
    pusherjs
  },
  /*Pusher.logToConsole = true;

    var pusher = new Pusher('e64884deb5ec6e2c06cd', {
      cluster: 'us2'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      app.messages.push(JSON.stringify(data));
    });*/

  // props: {
  //   errors: Object,
  // },
  data() {
    return {
      open:false,
      messages:[]
    };
  },
  methods: {
    
    validate_inputs(){
        let errors = '';
    }
  },
};
</script>


