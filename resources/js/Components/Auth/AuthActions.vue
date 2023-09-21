<template v-slot:actions>
    <div class="">
        <v-btn
            block
            rounded="xs"
            elevation="0"
            size="large"
            class="mt-10 bg-black"
            type="submit"
        >
            {{ primaryBtnText }}
        </v-btn>
        <div class="d-flex justify-center align-center mt-6">
            <p class="">{{ tabDescriptionText }}</p>
            <v-btn variant="plain" @click="toggleTab" :ripple="false">{{
                tabBtnText
            }}</v-btn>
        </div>
    </div>
</template>

<script>
import useAuthStore from "../../stores/authStore";

const authStore = useAuthStore();

export default {
    computed: {
        currentTab() {
            return authStore.tab.value;
        },
        primaryBtnText() {
            return this.currentTab === 0 ? "Sign in" : "Sign up";
        },
        tabDescriptionText() {
            return this.currentTab === 0
                ? "Don't have an account?"
                : "Already have an account?";
        },
        tabBtnText() {
            return this.currentTab === 0 ? "Sign up" : "Sign in";
        },
    },

    methods: {
        toggleTab() {
            console.log("toggled", authStore.tab.value);
            authStore.setTab(authStore.tab.value === 0 ? 1 : 0);
        },
    },
};
</script>

<style scoped></style>
