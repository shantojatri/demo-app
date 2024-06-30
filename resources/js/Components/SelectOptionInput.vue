<script setup>
import { ref } from "vue";

const model = defineModel({ required: true });
const input = ref(null);
</script>

<template>
    <select
        v-model="model"
        ref="input"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-violet-500 focus:border-violet-500 block w-full p-2.5 mt-1"
    >
        <slot />
    </select>
</template>
