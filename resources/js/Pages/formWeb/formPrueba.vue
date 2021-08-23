<template>
    <!-- <div>
        <h1>Hola</h1>
        {{
            hasAnyPermission([
                "web.solicitudes.index",
                "web.solicitudes.create",
            ])
        }}
    </div> -->
    <app-layout>
        <div>
            <div
                v-if="
                    hasAnyPermission([
                        'web.solicitudes.index',
                        'web.solicitudes.create',
                    ])
                "
            >
                <inertia-link
                    :href="route('admin.users.index')"
                    class="
                        flex-shrink-0
                        bg-blue-500
                        text-white text-base
                        font-semibold
                        py-2
                        px-4
                        rounded-lg
                        shadow-md
                        focus:outline-none
                        focus:ring-2
                        focus:ring-blue-500
                        focus:ring-offset-2
                        focus:ring-offset-blue-200
                    "
                    type="button"
                >
                    volver
                </inertia-link>
            </div>
            <inertia-link
                :href="route('admin.users.index')"
                class="
                    flex-shrink-0
                    bg-blue-500
                    text-white text-base
                    font-semibold
                    py-2
                    px-4
                    rounded-lg
                    shadow-md
                    focus:outline-none
                    focus:ring-2
                    focus:ring-blue-500
                    focus:ring-offset-2
                    focus:ring-offset-blue-200
                "
                type="button"
            >
                Otra forma de volver
            </inertia-link>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayoutAdmin";
export default {
    components: {
        AppLayout,
    },
};
</script>
