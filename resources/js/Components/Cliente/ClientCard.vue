<script setup>
defineProps(["client"]);
</script>
<template>
    <div
        class="mx-auto bg-white shadow-sm rounded-lg max-w-5xl p-4 flex justify-between"
    >
        <div class="flex flex-col">
            <span class="text-lg font-semibold text-gray-600">{{
                client.nombre
            }}</span>
            <span class="text-sm font-medium text-gray-500">{{ client.email }}</span>
        </div>
    </div>
</template>
