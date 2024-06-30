<script setup lang="ts">
import { onMounted } from "vue";
import { initFlowbite } from "flowbite";
import Navbar from "@/Components/Partials/Navbar.vue";
import Sidebar from "@/Components/Partials/Sidebar.vue";

// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
});
</script>

<template>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <!-- Navbar -->
        <Navbar />

        <!-- Sidebar -->
        <Sidebar />

        <main class="p-4 md:ml-64 min-h-screen pt-20">
            <slot />
        </main>
    </div>
</template>
