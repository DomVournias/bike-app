<template v-slot:title>
    <v-card-item class="pl-0 m-0">
        <v-card-title class="text-lg-h4 pb-4">{{ currentTab }}</v-card-title>
        <v-card-subtitle class="text-lg-h6 pb-6">{{
            tabDescription
        }}</v-card-subtitle>
    </v-card-item>
</template>

<script>
import useAuthStore from "../../stores/authStore";
const authStore = useAuthStore();
export default {
    data() {
        console.log(authStore.tab.value);
        return {
            currentTab: authStore.tab.value,
        };
    },
    computed: {
        // currentTab() {
        //     console.log("authHeadervalue", authStore.tab.value);
        //     return authStore.tab.value;
        // },
        tabTitle() {
            return this.currentTab === 0 ? "Sign in" : "Sign up";
        },
        tabDescription() {
            return this.currentTab === 0
                ? "Login to your account to manage your bikes"
                : "Create an account to start managing your bikes";
        },
    },
    watch: {
        "authStore.tab.value"(newTabValue) {
            console.log("authHeader", newTabValue);
        },
    },
};
</script>

<style>
.v-card-item {
    padding: 0;
}
</style>
