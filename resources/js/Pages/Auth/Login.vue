<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div class="opacity-50 pb-2">
                <p class="text-sm">email: admin@admin.com</p>
                <p class="text-sm">password: adminadmin</p>
            </div>
            <div>
                <v-text-field
                    v-model="form.email"
                    type="email"
                    label="Email"
                    variant="underlined"
                    color="primary"
                    required
                    autofocus
                    autocomplete="email"
                />

                <InputError :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <v-text-field
                    v-model="form.password"
                    type="password"
                    label="Password"
                    variant="underlined"
                    color="primary"
                    required
                    autofocus
                    autocomplete="current-password"
                />

                <InputError :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Forgot your password?
                </Link>

                <PrimaryButton
                    class="ml-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Log in
                </PrimaryButton>
            </div>
        </form>
        <span class="text-sm opacity-70"
            >Don't have an account?
            <Link :href="route('register')" class="text-black font-bold"
                >Register</Link
            ></span
        >
    </GuestLayout>
</template>
