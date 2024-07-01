<script setup>
import { ref } from "vue";
import { Head, Link, router } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { RiArrowLeftLine } from "@remixicon/vue";

const props = defineProps(["user"]);
const user = ref(props.user.data);
</script>

<template>
    <Head title="Show User" />

    <AdminLayout>
        <section class="bg-gray-50 dark:bg-gray-900 p-2">
            <div class="mx-auto">
                <!-- Start coding here -->
                <div
                    class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg overflow-hidden"
                >
                    <div class="flex items-center justify-between px-4 py-3">
                        <h5
                            class="text-xl font-bold leading-none text-gray-900"
                        >
                            Create User
                        </h5>
                        <Link
                            :href="route('users.index')"
                            class="px-4 py-2 text-sm font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-md text-center"
                        >
                            <RiArrowLeftLine class="mr-1" />
                            Base
                        </Link>
                    </div>

                    <hr />

                    <div class="p-2 my-2">
                        <div class="relative overflow-x-auto">
                            <table
                                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
                            >
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                                >
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Attributes
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Value
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                                    >
                                        <th
                                            scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                        >
                                            Name
                                        </th>
                                        <td class="px-6 py-4">{{ user.name }}</td>
                                    </tr>
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                                    >
                                        <th
                                            scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                        >
                                            Email
                                        </th>
                                        <td class="px-6 py-4">{{ user.email }}</td>
                                    </tr>
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                                    >
                                        <th
                                            scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                        >
                                            Phone
                                        </th>
                                        <td class="px-6 py-4">{{ user.phone }}</td>
                                    </tr>
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                                    >
                                        <th
                                            scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                        >
                                            Role
                                        </th>
                                        <td class="px-6 py-4">{{ user.role }}</td>
                                    </tr>
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                                    >
                                        <th
                                            scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                        >
                                            Status
                                        </th>
                                        <td class="px-6 py-4">{{ user.status }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </AdminLayout>
</template>
