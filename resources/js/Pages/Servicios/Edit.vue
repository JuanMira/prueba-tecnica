<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps(['service']);
const form = useForm({
    nombre: props.service.nombre,
    tipo_servicio: props.service.tipo_servicio,
    fecha_inicio: props.service.fecha_inicio,
    fecha_fin: props.service.fecha_fin,
    observaciones: props.service.observaciones,
});
</script>

<template>
    <AuthenticatedLayout>
        <div class="mx-auto max-w-3xl rounded-lg bg-white shadow-sm mt-4 p-4">
            <h2 class="text-lg font-bold text-gray-600">
                Crear nuevo servicio
            </h2>
            <hr class="mt-4" />
            <div class="mt-4">
                <form
                    @submit.prevent="
                        form.put(route('servicio.update', service), {
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
                        <section>
                            <div>
                                <label for="">Basico</label>
                                <input
                                    type="radio"
                                    v-model="form.tipo_servicio"
                                    value="1"
                                />
                            </div>
                            <div>
                                <label for="">Avanzado</label>
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
                        <span>cancelar</span>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
