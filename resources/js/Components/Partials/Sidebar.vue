<script setup lang="ts">
import { Link } from "@inertiajs/vue3";
import { RiLogoutBoxLine } from "@remixicon/vue";
import { RiPieChartLine } from "@remixicon/vue";
import { RiFileTextLine } from "@remixicon/vue";
import { RiGroupLine } from "@remixicon/vue";
</script>

<template>
    <aside
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidenav"
        id="drawer-navigation"
    >
        <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
            <ul class="space-y-2">
                <li>
                    <Link
                        :href="route('dashboard')"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                    >
                        <RiPieChartLine />
                        <span class="ml-3">Dashboard</span>
                    </Link>
                </li>
                <li>
                    <Link
                        :href="route('users.index')"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                    >
                        <RiGroupLine />
                        <span class="flex-1 ml-3 whitespace-nowrap">Users</span>
                    </Link>
                </li>
                <li>
                    <button
                        type="button"
                        class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-pages"
                        data-collapse-toggle="dropdown-pages"
                    >
                        <RiFileTextLine />
                        <span class="flex-1 ml-3 text-left whitespace-nowrap"
                            >Pages</span
                        >
                        <svg
                            aria-hidden="true"
                            class="w-6 h-6"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </button>
                    <ul id="dropdown-pages" class="hidden py-2 space-y-2">
                        <li>
                            <a
                                href="#"
                                class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                                >Settings</a
                            >
                        </li>
                        <li>
                            <a
                                href="#"
                                class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                                >Kanban</a
                            >
                        </li>
                        <li>
                            <a
                                href="#"
                                class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                                >Calendar</a
                            >
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Bottom Logout -->
        <div
            class="hidden absolute bottom-0 left-0 justify-start p-4 space-x-4 w-full lg:flex bg-white dark:bg-gray-800 z-20"
        >
            <Link
                :href="route('logout')"
                method="post"
                as="button"
                class="flex items-center w-full p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100"
            >
                <RiLogoutBoxLine class="mr-1" />
                Log Out
            </Link>
        </div>
    </aside>
</template>
