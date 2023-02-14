<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, router } from "@inertiajs/vue3";
import { useForm, usePage } from "@inertiajs/vue3";
import { toRefs } from "vue";

const props = defineProps(["client",'services']);

const form = useForm({
    servicio_id: "",
    cliente_id:"",
});

const submit = () => {
    
    form.cliente_id = usePage().props.client.id
    form.post(route("serviceClient.store"));    
}

</script>

<template>
    <Head :title="client.nombre"></Head>

    <AuthenticatedLayout>
        <div
            class="mx-auto bg-white shadow-sm rounded-lg max-w-5xl p-4 flex flex-col mt-4"
        >
            <div class="flex">
                <div class="flex ml-12 flex-col">
                    <span class="w-52 h-52 rounded-full bg-gray-500"></span>
                </div>
                <div class="flex w-full mx-auto flex-col ml-6 mt-4 p-4">
                    <div class="text-xl font-bold text-gray-700">
                        Informacion
                    </div>

                    <div class="flex justify-between">
                        <div class="flex flex-col justify-between mt-4">
                            <div class="flex flex-col mt-4">
                                <span class="text-lg">
                                    {{ client.nombre }}
                                </span>
                                <span class="text-sm text-gray-500">
                                    Nombre
                                </span>
                            </div>

                            <div class="flex flex-col col-end-2 mt-4">
                                <span class="text-lg">
                                    {{ client.cedula }}
                                </span>
                                <span class="text-sm text-gray-500">
                                    Cedula
                                </span>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between mt-4">
                            <div class="flex flex-col">
                                <span class="text-lg">
                                    {{ client.email }}
                                </span>
                                <span class="text-sm text-gray-500">
                                    Correo
                                </span>
                            </div>

                            <div class="flex flex-col">
                                <span class="text-lg">
                                    {{ client.telefono }}
                                </span>
                                <span class="text-sm text-gray-500">
                                    Telefono
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="mx-auto bg-white shadow-sm rounded-lg max-w-5xl p-4 flex flex-col mt-4"
        >
            <div class="grid grid-cols-2 divide-x">
                <div class="p-4 flex-grow max-w-lg">
                    <div class="mb-4">
                        <span class="text-gray-600 text-xl font-bold"
                            >Servicios</span
                        >
                    </div>

                    <div class="overflow-y-auto max-h-48 mb-4 flex flex-col">
                        <div class="h-56 overflow-y-auto">
                            <div v-for="service in client.servicios">
                                {{ service.nombre }}
                            </div>
                        </div>
                    </div>
                    <div>
                       
                    </div>
                </div>
                <div class="p-4">
                    <div class="mb-4">
                        <span class="text-gray-600 text-xl font-bold"
                            >Agregar un servicio</span
                        >
                    </div>

                    <form action="" @submit.prevent="submit">
                        <select name="" id="" class="mr-4 w-full" v-model="form.servicio_id">
                            <option>Select here</option>
                            <option v-for="service in services" :value="service.id"> {{ service.nombre }} </option>
                        </select>
                        <button
                            class="bg-cyan-600 text-white p-4 mt-4 rounded-md"
                        >
                            Agregar
                        </button>
                    </form>
                    <div class="overflow-y-auto max-h-48 mb-4 flex flex-col">
                        <div class="h-56"></div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script>
export default {
    
};
</script>
