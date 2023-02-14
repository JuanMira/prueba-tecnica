<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    nombre: "",
    cedula: "",
    email: "",
    telefono: "",
});

</script>
<template>
    <AuthenticatedLayout>
        <div class="mx-auto max-w-3xl rounded-lg bg-white shadow-sm mt-4 p-4">
            <h2 class="text-lg font-bold text-gray-600">Crear nuevo cliente</h2>
            <hr class="mt-4" />
            <div class="mt-4">
                <form @submit.prevent="form.post(route('cliente.store'), {
                    onSuccess: ()=> form.reset()                  
                })">
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
                            >Cedula</label
                        >
                        <input
                            type="text"
                            v-model="form.cedula"
                            class="block mt-2 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        />
                        <InputError
                            :message="form.errors.message"
                            class="mt-2"
                        />
                    </div>

                    <div class="mt-4">
                        <label for="" class="text-gray-500 font-semibold"
                            >Correo</label
                        >
                        <input
                            type="text"
                            v-model="form.email"
                            class="block mt-2 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        />
                        <InputError
                            :message="form.errors.message"
                            class="mt-2"
                        />
                    </div>

                    <div class="mt-4">
                        <label for="" class="text-gray-500 font-semibold"
                            >Telefono:</label
                        >
                        <input
                            type="text"
                            v-model="form.telefono"
                            class="block mt-2 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        />
                        <InputError
                            :message="form.errors.message"
                            class="mt-2"
                        />
                    </div>

                    <div class="mt-4 flex flex-row-reverse items-center">
                        <PrimaryButton class="ml-4"> Guardar </PrimaryButton>
                        <a :href="route('cliente.index')" class="hover:underline">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
