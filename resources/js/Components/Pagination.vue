<template>
    <div
        v-if="items.links.length > 3"
        class="flex pt-8 items-center justify-center"
    >
        <div class="flex flex-wrap -mb-1">
            <template v-for="(link, key) in items.links">
                <div
                    v-if="link.url === null"
                    :key="key"
                    class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded"
                    v-html="link.label"
                />
                <Link
                    v-else
                    class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-gray-400 focus:border-indigo-500 focus:text-indigo-500"
                    :class="{ 'bg-gray-400': link.active }"
                    :href="link.url"
                    v-html="link.label"
                />
            </template>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    props: {
        items: Object,
    },

    components: { Link },
};
</script>

<style scoped></style>
