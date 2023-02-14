<script setup>
import AutthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    nombre: "",
    tipo_servicio: 1,
    fecha_inicio: "",
    fecha_fin: "",
    observaciones: "",
});
</script>

<template>
    <AutthenticatedLayout>
        <div class="mx-auto max-w-3xl rounded-lg bg-white shadow-sm mt-4 p-4">
            <h2 class="text-lg font-bold text-gray-600">
                Crear nuevo servicio
            </h2>
            <hr class="mt-4" />
            <div class="mt-4">
                <form
                    @submit.prevent="
                        form.post(route('servicio.store'), {
                            onSuccess: () => form.reset(),
                        })
                    "
                >
                    <div>
                        <label for="" class="my-2 text-gray-500 font-semibold"
                            >Nombre</label
                        >
                        <input
                            type="text"
                            v-model="form.nombre"
                            class="block mt-2 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        />
                        <InputError
                            :message="form.errors.message"
                            class="mt-2"
                        />
                    </div>

                    <div class="mt-4">
                        <label for="" class="text-gray-500 font-semibold"
                            >Tipo servicio</label
                        >
                        <section class="flex justify-around">
                            <div class="space-x-4">
                                <label
                                    for=""
                                    class="text-gray-500 font-semibold"
                                    >Basico</label
                                >
                                <input
                                    type="radio"
                                    v-model="form.tipo_servicio"
                                    value="1"
                                />
                            </div>
                            <div class="space-x-4">
                                <label for="" text-gray-500 font-semibold
                                    >Avanzado</label
                                >
                                <input
                                    type="radio"
                                    v-model="form.tipo_servicio"
                                    value="2"
                                />
                            </div>
                        </section>
                        <InputError
                            :message="form.errors.message"
                            class="mt-2"
                        />
                    </div>

                    <div class="mt-4">
                        <label for="" class="text-gray-500 font-semibold"
                            >Fecha inicio</label
                        >
                        <input
                            type="date"
                            v-model="form.fecha_inicio"
                            class="block mt-2 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        />
                        <InputError
                            :message="form.errors.message"
                            class="mt-2"
                        />
                    </div>

                    <div class="mt-4">
                        <label for="" class="text-gray-500 font-semibold"
                            >Fecha final</label
                        >
                        <input
                            type="date"
                            v-model="form.fecha_fin"
                            class="block mt-2 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        />
                        <InputError
                            :message="form.errors.message"
                            class="mt-2"
                        />
                    </div>

                    <div class="mt-4">
                        <label class="text-gray-500 font-semibold"
                            >Observaciones</label
                        >
                        <textarea
                            class="block mt-2 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            v-model="form.observaciones"
                        ></textarea>
                    </div>

                    <div class="mt-4 flex flex-row-reverse items-center">
                        <button
                            class="ml-4 p-2 bg-cyan-600 text-white rounded-md hover:bg-cyan-500 transition-colors"
                        >
                            Guardar
                        </button>
                        <a  class="hover:underline" :href="route('servicio.index')">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </AutthenticatedLayout>
</template>
