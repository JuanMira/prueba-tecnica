<script setup>
import Authenticated from "@/Layouts/AuthenticatedLayout.vue";
import NavLink from "@/Components/NavLink.vue";
import ClientCard from "@/Components/Cliente/ClientCard.vue";
import { Head } from "@inertiajs/vue3";

defineProps(["clients"]);
/**
 * TODO:refactorizar componentes para minimizar la repeticion
 */
</script>

<template>
    <Head title="Cliente" />
    <Authenticated>
        <div
            class="mx-auto max-w-5xl p-4 mt-4 bg-white rounded-lg shadow-sm flex justify-between items-center mb-4"
        >
            <span class="text-xl text-gray-600 font-bold">Clientes</span>
            <a
                :href="route('cliente.create')"
                class="p-2 bg-cyan-600 text-white rounded-md hover:bg-cyan-500 transition-colors"
            >
                Crear nuevo cliente
            </a>
        </div>
        <div class="overflow-y-auto">
            <ClientCard v-for="client in clients" :client="client" />
        </div>
    </Authenticated>
</template>
git
