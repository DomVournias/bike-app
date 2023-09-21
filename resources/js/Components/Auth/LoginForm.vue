<template v-slot:text>
    <form @submit.prevent="login" class="form">
        <v-text-field
            v-model="email"
            :rules="emailRules"
            :error-messages="emailErrorMessage"
            type="email"
            label="E-mail"
            variant="underlined"
            required
        />
        <v-text-field
            v-model="password"
            :rules="passwordRules"
            :error-messages="passwordErrorMessage"
            type="password"
            name="password"
            label="Password"
            variant="underlined"
            required
        />
    </form>
</template>

<style>
.form {
    gap: 15px;
    display: grid;
}
</style>

<script>
import useAuthStore from "../../stores/authStore";

export default {
    data() {
        return {
            email: useAuthStore.email,
            password: useAuthStore.password,
            emailErrorMessage: useAuthStore.emailErrorMessage,
            passwordErrorMessage: useAuthStore.passwordErrorMessage,
            passwordVisible: useAuthStore.passwordVisible,
        };
    },
    computed: {
        emailRules: () => useAuthStore.emailRules,
        passwordRules: () => useAuthStore.passwordRules,
    },
    methods: {
        login() {
            useAuthStore.login();
        },
    },
};
</script>
