<script setup>
import { reactive } from "vue";
import { Head, Link, router } from "@inertiajs/vue3";
import { useToast } from "vue-toastification";
import { formStatusOptions, formRoleOptions, formRoleOptionsForAdmin } from "@/Constants/commonConstant";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import SelectOptionInput from "@/Components/SelectOptionInput.vue";
import { RiArrowLeftLine } from "@remixicon/vue";

const toast = useToast();

const userParams = reactive({
    name: null,
    email: null,
    phone: null,
    status: null,
    role: null,
    password: null,
    password_confirmation: null,
});

function createUserHandler() {
    router.post(route("users.store"), userParams, {
        onSuccess: () => toast.success("User created successfully"),
    });
}
</script>

<template>
    <Head title="Create User" />

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
                        <form
                            @submit.prevent="createUserHandler"
                            class="shadow-md sm:rounded-lg p-2 m-5 border border-gray-300"
                        >
                            <div class="p-4">
                                <div class="mb-2.5">
                                    <InputLabel for="name" value="Name" />
                                    <TextInput
                                        v-model="userParams.name"
                                        id="name"
                                        type="text"
                                        class="mt-1 block w-full"
                                        autofocus
                                        placeholder="Enter your name..."
                                    />
                                    <InputError
                                        class="mt-1"
                                        :message="$page.props.errors.name"
                                    />
                                </div>

                                <div class="mb-2.5 grid grid-cols-2 gap-x-4">
                                    <div class="col-span-1">
                                        <InputLabel for="email" value="Email" />
                                        <TextInput
                                            v-model="userParams.email"
                                            id="email"
                                            type="email"
                                            class="mt-1 block w-full"
                                            placeholder="Enter your email..."
                                        />
                                        <InputError
                                            class="mt-1"
                                            :message="$page.props.errors.email"
                                        />
                                    </div>
                                    <div class="col-span-1">
                                        <InputLabel for="phone" value="Phone" />
                                        <TextInput
                                            v-model="userParams.phone"
                                            id="phone"
                                            type="text"
                                            class="mt-1 block w-full"
                                            placeholder="Enter phone number..."
                                        />
                                        <InputError
                                            class="mt-1"
                                            :message="
                                                $page.props.errors.category
                                            "
                                        />
                                    </div>
                                </div>

                                <div class="mb-2.5 grid grid-cols-2 gap-x-4">
                                    <div class="col-span-1">
                                        <InputLabel
                                            for="role"
                                            value="Select a role"
                                        />
                                        <SelectOptionInput
                                            v-model="userParams.role"
                                            id="role"
                                            v-if="$page.props.auth.user.role ==='super-admin'"
                                        >
                                            <option
                                                v-for="(
                                                    option, key
                                                ) in formRoleOptions"
                                                :key="key"
                                                :value="option.value"
                                            >
                                                {{ option.label }}
                                            </option>
                                        </SelectOptionInput>
                                        <SelectOptionInput
                                            v-model="userParams.role"
                                            id="role"
                                            v-else
                                        >
                                            <option
                                                v-for="(
                                                    option, key
                                                ) in formRoleOptionsForAdmin"
                                                :key="key"
                                                :value="option.value"
                                            >
                                                {{ option.label }}
                                            </option>
                                        </SelectOptionInput>
                                        <InputError
                                            class="mt-1"
                                            :message="$page.props.errors.role"
                                        />
                                    </div>

                                    <div class="col-span-1">
                                        <InputLabel
                                            for="status"
                                            value="Select a status"
                                        />
                                        <SelectOptionInput
                                            v-model="userParams.status"
                                            id="status"
                                        >
                                            <option
                                                v-for="(
                                                    option, key
                                                ) in formStatusOptions"
                                                :key="key"
                                                :value="option.value"
                                            >
                                                {{ option.label }}
                                            </option>
                                        </SelectOptionInput>
                                        <InputError
                                            class="mt-1"
                                            :message="$page.props.errors.status"
                                        />
                                    </div>
                                </div>

                                <div class="mb-2.5">
                                    <InputLabel
                                        for="password"
                                        value="Password"
                                    />
                                    <TextInput
                                        v-model="userParams.password"
                                        id="password"
                                        type="password"
                                        class="mt-1 block w-full"
                                        placeholder="Enter password..."
                                    />
                                    <InputError
                                        class="mt-1"
                                        :message="$page.props.errors.password"
                                    />
                                </div>

                                <div class="mb-2.5">
                                    <InputLabel
                                        for="password_confirmation"
                                        value="Confirm Password"
                                    />
                                    <TextInput
                                        v-model="
                                            userParams.password_confirmation
                                        "
                                        id="password_confirmation"
                                        type="password"
                                        class="mt-1 block w-full"
                                        placeholder="Enter confirm password..."
                                    />
                                    <InputError
                                        class="mt-1"
                                        :message="$page.props.errors.name"
                                    />
                                </div>

                                <div class="mt-3">
                                    <button
                                        type="submit"
                                        class="text-white bg-violet-600 hover:bg-violet-500 focus:ring-1 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                                    >
                                        Submit
                                    </button>

                                    <Link
                                        :href="route('users.index')"
                                        as="button"
                                        class="text-black bg-gray-200 hover:bg-gray-100 focus:ring-1 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ms-4"
                                    >
                                        Cancel
                                    </Link>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </AdminLayout>
</template>
