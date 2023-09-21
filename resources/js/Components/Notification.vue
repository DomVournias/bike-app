<template>
    <div
        class="max-w-xs bg-green-500 text-sm text-white rounded-md shadow-lg mb-3 ml-3"
        role="alert"
    >
        <div class="flex p-4 justify-start items-center gap-2 font-semibold">
            <v-icon icon="mdi-check-circle-outline"></v-icon>
            {{ message }}
        </div>
    </div>
</template>

<script>
export default {
    props: {
        message: String,
    },
    mounted() {
        setTimeout(() => {
            this.$page.props.flash.message = null;
        }, 2000);
    },
};
</script>
