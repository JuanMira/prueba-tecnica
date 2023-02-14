<script setup>
import AutthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link } from "@inertiajs/vue3";
defineProps(["services"]);
</script>
<template>
    <AutthenticatedLayout>
        <div
            class="mx-auto max-w-5xl p-4 mt-4 bg-white rounded-lg shadow-sm flex justify-between items-center mb-4"
        >
            <span class="text-xl text-gray-600 font-bold">Servicios</span>
            <a
                :href="route('servicio.create')"
                class="p-2 bg-cyan-600 text-white rounded-md hover:bg-cyan-500 transition-colors"
            >
                Crear nuevo servicio
            </a>
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
                    <th scope="col" class="px-6 py-3">Tipo de servicio</th>
                    <th scope="col" class="px-6 py-3">Fecha Inicial</th>
                    <th scope="col" class="px-6 py-3">Fecha Final</th>
                    <th scope="col" class="px-6 py-3">Observaciones</th>
                    <th scope="col" class="px-6 py-3">acciones</th>
                </thead>
                <tr
                    v-for="service in services"
                    :class="
                        service.id % 2 === 0
                            ? 'border-b bg-slate-300 font-semibold text-base text-gray-900'
                            : 'px-6 py-4 bg-slate-700 text-base  font-semibold text-white whitespace-nowrap'
                    "
                >
                    <td class="px-6 py-4 whitespace-nowrap" scope="row">{{ service.id }}</td>
                    <td class="px-6 py-4">{{ service.nombre }}</td>
                    <td class="px-6 py-4">
                        {{
                            service.tipo_servicio === "1"
                                ? "Basico"
                                : "Avanzado"
                        }}
                    </td>
                    <td class="px-6 py-4">{{ service.fecha_inicio }}</td>
                    <td class="px-6 py-4">{{ service.fecha_fin }}</td>
                    <td class="px-6 py-4">{{ service.observaciones }}</td>
                    <td class="px-6 py-4 space-x-4">
                        <a
                            :href="route('servicio.edit', service)"
                            class="cursor-pointer text-cyan-600"
                        >
                            <v-icon name="md-modeeditoutline-round" scale="1" />
                        </a>
                        <Link
                            :href="route('servicio.destroy', service)"
                            class="cursor-pointer text-red-600"
                            method="DELETE"
                        >
                            <v-icon name="md-deleteforever" scale="1" />
                        </Link>
                    </td>
                </tr>
            </table>
        </div>
    </AutthenticatedLayout>
</template>
