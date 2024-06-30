<script setup>
import { Head, Link } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { RiAddLine } from "@remixicon/vue";
import { RiMoreFill } from "@remixicon/vue";
const props = defineProps(["users"]);
</script>

<template>
    <Head title="User List" />

    <AdminLayout>
        <section class="bg-gray-50 dark:bg-gray-900 p-2">
            <div class="mx-auto">
                <!-- Start coding here -->
                <div
                    class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden"
                >
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4"
                    >
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center">
                                <label for="simple-search" class="sr-only"
                                    >Search</label
                                >
                                <div class="relative w-full">
                                    <div
                                        class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
                                    >
                                        <svg
                                            aria-hidden="true"
                                            class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                            fill="currentColor"
                                            viewbox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </div>
                                    <input
                                        type="text"
                                        id="simple-search"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Search"
                                        required=""
                                    />
                                </div>
                            </form>
                        </div>
                        <div
                            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0"
                        >
                            <Link
                                :href="route('users.create')"
                                class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                            >
                                <RiAddLine class="mr-1" />
                                Add product
                            </Link>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table
                            class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                        >
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                            >
                                <tr>
                                    <th scope="col" class="px-4 py-3">Name</th>
                                    <th scope="col" class="px-4 py-3">Email</th>
                                    <th scope="col" class="px-4 py-3">Phone</th>
                                    <th scope="col" class="px-4 py-3">Role</th>
                                    <th scope="col" class="px-4 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="user in users.data"
                                    key="user.id"
                                    class="border-b dark:border-gray-700"
                                >
                                    <th
                                        scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                    >
                                        {{ user.name }}
                                    </th>
                                    <td class="px-4 py-3">{{ user.email }}</td>
                                    <td class="px-4 py-3">{{ user.phone }}</td>
                                    <td class="px-4 py-3">{{ user.role }}</td>
                                    <td class="px-4 py-3">{{ user.status }}</td>
                                    <td
                                        class="px-4 py-3 flex items-center justify-end"
                                    >
                                        <button
                                            :id="`action-dropdown-${user.id}`"
                                            :data-dropdown-toggle="`action-toggle-dropdown-${user.id}`"
                                            class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none"
                                            type="button"
                                        >
                                            <RiMoreFill />
                                        </button>
                                        <div
                                            :id="`action-toggle-dropdown-${user.id}`"
                                            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow"
                                        >
                                            <ul
                                                class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                :aria-labelledby="`action-dropdown-${user.id}`"
                                            >
                                                <li>
                                                    <a
                                                        href="#"
                                                        class="block py-2 px-4 hover:bg-gray-100"
                                                        >Show</a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        href="#"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                                        >Edit</a
                                                    >
                                                </li>
                                            </ul>
                                            <div class="py-1">
                                                <a
                                                    href="#"
                                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                                    >Delete</a
                                                >
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <nav
                        class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                        aria-label="Table navigation"
                    >
                        <span
                            class="text-sm font-normal text-gray-500 dark:text-gray-400"
                        >
                            Showing
                            <span
                                class="font-semibold text-gray-900 dark:text-white"
                            >
                                {{ users.from }}-{{ users.to }}
                            </span>
                            of
                            <span
                                class="font-semibold text-gray-900 dark:text-white"
                            >
                                {{ users.total }}
                            </span>
                        </span>
                        <ul class="inline-flex items-stretch -space-x-px">
                            <li
                                v-for="(link, index) in users.links"
                                :key="index"
                            >
                                <a
                                    :href="link.url ? link.url : '#'"
                                    class="flex items-center justify-center px-2 lg:px-3 h-6 lg:h-8 leading-tight border"
                                    :class="[
                                        link.active
                                            ? '!text-gray-50 bg-indigo-600  border-indigo-700 hover:bg-indigo-500'
                                            : 'text-gray-500 border-gray-300 hover:bg-gray-100 hover:text-gray-700',
                                        !link.url ? 'cursor-not-allowed' : '',
                                    ]"
                                    :disabled="!link.url ? 'disabled' : ''"
                                    :preserveScroll="true"
                                    v-html="link.label"
                                >
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
    </AdminLayout>
</template>
