<script setup>
import DropdownLink from "@/Components/DropdownLink.vue";
import { Link } from "@inertiajs/vue3";
const props = defineProps(["client"]);

// funcion que administra el evento click del boton delete
const handleDelete = async () => {
    // dialogo de pregunta correspondiente al cliente seleccionado
    const choice = confirm(
        `¿Deseas eliminar? al cliente ${props.client.nombre}?`
    );
    if (choice) {
        route("cliente.destroy", props.client);
    }
};
</script>
<template>
    <div
        class="mx-auto bg-white shadow-sm rounded-lg max-w-5xl p-4 flex justify-between items-center"
    >
        <div class="flex flex-col">
            <span class="text-lg font-semibold text-gray-600">{{
                client.nombre
            }}</span>
            <span class="text-sm font-medium text-gray-500">{{
                client.email
            }}</span>
        </div>

        <div class="flex">
            <div>
                <a
                    :href="route('cliente.edit', client.id)"
                    class="rounded-full p-2 text-cyan-600"
                >
                    <v-icon name="md-modeeditoutline-round" scale="1" />
                </a>
            </div>

            <div>
                <a
                    :href="route('cliente.show', client)"
                    class="rounded-full p-2 text-blue-400"
                >
                    <v-icon name="md-removeredeye" scale="1" />
                </a>
            </div>

            <div>
                <Link
                    as="a"
                    method="delete"
                    :href="route('cliente.destroy', client)"
                    class="rounded-full p-2 text-red-600 cursor-pointer"
                >
                    <v-icon name="md-deleteforever" scale="1" />
                </Link>
            </div>
        </div>
    </div>
</template>
