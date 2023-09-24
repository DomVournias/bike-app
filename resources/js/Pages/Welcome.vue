<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
    >
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div
                class="flex flex-col items-center justify-center text-white opacity-70"
            >
                <ApplicationLogo size="70" />
                <p class="w-[60%] pt-6 text-center">
                    A web app to request cost estimations for bike services,
                    built with Laravel 10, Inertia and Vue 3.
                </p>
            </div>

            <div class="mt-16 flex gap-6 justify-center items-center">
                <div v-if="canLogin" class="">
                    <Link
                        v-if="$page.props.auth.user"
                        :href="route('dashboard')"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >Dashboard</Link
                    >

                    <template v-else>
                        <div class="flex gap-6">
                            <Link
                                :href="route('login')"
                                class="border-2 py-2 px-6 rounded-md font-semibold text-white opacity-80 hover:opacity-100 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                                >Log in</Link
                            >

                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="border-2 py-2 px-6 rounded-md font-semibold text-white opacity-80 hover:opacity-100 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                                >Register</Link
                            >
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>
