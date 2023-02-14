<script setup>
import { Head, Link } from "@inertiajs/vue3";
import Modal from "@/Components/Modal.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { ref } from "vue";

const props = defineProps(["clients"]);
const modal = ref(false);
const currentUser = ref(null);
const handleModal = async (client) => {
    modal.value = true;
    currentUser.value = client;
};

const closeModal = async () => {
    modal.value = false;
    delete currentUser.value;
};
</script>

<template>
    <Head title="Welcome" />

    <div class="min-h-screen bg-gray-100">
        <nav class="bg-white border-b border-gray-100">
            <div class="ax-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="shrink-0 flex items-center">
                            <ApplicationLogo
                                class="block h-9 w-auto fill-current text-gray-800"
                            />
                        </div>
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('cliente.index')"
                            class="text-sm text-gray-700 dark:text-gray-500 underline"
                            >Clientes</Link
                        >

                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="text-sm text-gray-700 dark:text-gray-500 underline"
                                >Log in</Link
                            >

                            <Link
                                :href="route('register')"
                                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline"
                                >Register</Link
                            >
                        </template>
                    </div>
                </div>
            </div>
        </nav>
        <header class="bg-white shadow" v-if="$slots.header">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <slot name="header" />
            </div>
        </header>
        <main>
            <div
                class="mt-4 mx-auto bg-white shadow-sm rounded-lg max-w-5xl p-4 flex flex-col"
            >
                <div class="text-xl font-bold text-gray-700">
                    Listado de clientes
                </div>
            </div>
            <div
                class="mt-4 mx-auto bg-white shadow-md overflow-x-auto rounded-lg max-w-5xl p-4 flex flex-col"
            >
                <table
                    class="w-full text-sm tetx-left text-gray-500 dark:text-gray-400"
                >
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <th scope="col" class="px-6 py-3">Id</th>
                        <th scope="col" class="px-6 py-3">Nombre</th>
                        <th scope="col" class="px-6 py-3">Cedula</th>
                        <th scope="col" class="px-6 py-3">Correo</th>
                        <th scope="col" class="px-6 py-3">Telefono</th>
                        <th scope="col" class="px-6 py-3">Observaciones</th>
                        <th scope="col" class="px-6 py-3">Acciones</th>
                    </thead>
                    <tbody>
                        <tr
                            v-for="client in clients"
                            :class="
                                client.id % 2 === 0
                                    ? 'border-b bg-slate-300 font-semibold text-base text-gray-900'
                                    : 'px-6 py-4 bg-slate-700 text-base  font-semibold text-white whitespace-nowrap'
                            "
                        >
                            <td class="px-6 py-4 whitespace-nowrap" scope="row">
                                {{ client.id }}
                            </td>
                            <td class="px-6 py-4">{{ client.nombre }}</td>
                            <td class="px-6 py-4">{{ client.cedula }}</td>
                            <td class="px-6 py-4">{{ client.email }}</td>
                            <td class="px-6 py-4">{{ client.telefono }}</td>
                            <td class="px-6 py-4">
                                {{ client.observaciones }}
                            </td>
                            <td class="px-6 py-4">
                                <a
                                    @click="() => handleModal(client)"
                                    class="text-blue-400 p-2 cursor-pointer"
                                >
                                    <v-icon name="md-removeredeye" scale="1" />
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <Modal :show="modal">
        <div class="p-4 flex flex-col">
            <div class="w-full flex flex-row-reverse">
                <button
                    class="p-4 w-12 h-12 rounded-full text-indigo-300"
                    @click="closeModal"
                >
                    <v-icon name="md-close" />
                </button>
            </div>
            <div class="mt-4 flex justify-around">
                <div>
                    <div class="p-4">
                        <label
                            for=""
                            class="text-base font-semibold text-gray-500"
                            >Nombre</label
                        >
                        <h2 class="text-xl font-bold text-gray-600">
                            {{ currentUser.nombre }}
                        </h2>
                    </div>

                    <div class="p-4">
                        <label
                            for=""
                            class="text-base font-semibold text-gray-500"
                            >Correo</label
                        >
                        <h2 class="text-xl font-bold text-gray-600">
                            {{ currentUser.email }}
                        </h2>
                    </div>
                </div>

                <div class="mr-12">
                    <div class="p-4">
                        <label
                            for=""
                            class="text-base font-semibold text-gray-500"
                            >Cedula</label
                        >
                        <h2 class="text-xl font-bold text-gray-600">
                            {{ currentUser.cedula }}
                        </h2>
                    </div>

                    <div class="p-4">
                        <label
                            for=""
                            class="text-base font-semibold text-gray-500"
                            >Telefono</label
                        >
                        <h2 class="text-xl font-bold text-gray-600">
                            {{ currentUser.telefono }}
                        </h2>
                    </div>
                </div>
            </div>
            <hr />
            <div
                v-for="service in currentUser.servicios"
                class="p-4 mt-4 mx-10"
            >
                <ol>
                    <li class="text-gray-600 font-semibold text-xl">
                        {{ service.nombre }} -
                        <span class="font-bold text-gray-700">{{
                            service.tipo_servicio === "1"
                                ? "Basico"
                                : "Avanzado"
                        }}</span>
                    </li>
                </ol>
            </div>
        </div>
    </Modal>
</template>
