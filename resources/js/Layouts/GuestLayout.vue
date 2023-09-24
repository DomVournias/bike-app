<template>
    <div class="flex bg-black">
        <div :class="backgroundClass"></div>
        <div class="w-1/2">
            <div
                class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"
            >
                <div class="flex flex-col justify-center items-center">
                    <Link href="/">
                        <ApplicationLogo
                            size="36"
                            class="w-20 h-20 fill-current text-gray-500"
                        />
                    </Link>
                    <h3 class="font-bold text-black text-3xl opacity-80">
                        {{ title }}
                    </h3>
                </div>

                <div
                    class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
                >
                    <slot />
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.custom-background-login {
    background-image: url("./../../../assets/images/bike.jpg");
}
.custom-background-register {
    background-image: url("./../../../assets/images/bike3.jpg");
}
.custom-background {
    background-size: cover;
    background-position: center;
}
</style>

<script>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

import { Link, usePage } from "@inertiajs/vue3";

export default {
    components: { usePage, Link, ApplicationLogo },
    methods: { usePage },
    computed: {
        title() {
            const page = usePage();
            if (page.props.ziggy.location === "http://localhost/register") {
                return "Register";
            } else {
                return "Login";
            }
        },
        backgroundClass() {
            const page = usePage();
            if (page.props.ziggy.location === "http://localhost/register") {
                return "w-1/2 custom-background-register custom-background";
            } else {
                return "w-1/2 custom-background-login custom-background ";
            }
        },
    },
};
</script>
