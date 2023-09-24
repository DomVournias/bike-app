<script>
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

export default {
    props: {
        visible: Boolean,
        serviceRequest: Object,
    },

    setup(props, { emit }) {
        const show = ref(props.visible);

        const closeDialog = () => {
            show.value = false;
            emit("close");
        };

        return {
            show,
            closeDialog,
        };
    },
};
</script>

<template>
    <v-dialog v-model="show" max-width="500px">
        <v-card>
            <v-toolbar
                dark
                :class="{
                    'bg-orange-darken-1': serviceRequest.done === 'Pending',
                    'bg-green-darken-1': serviceRequest.done === 'Completed',
                    'bg-red-darken-1': serviceRequest.done === 'Cancelled',
                }"
            >
                <v-toolbar-title
                    >Request #{{ serviceRequest.id }}
                    <v-chip>
                        {{ serviceRequest.done }}
                    </v-chip>
                </v-toolbar-title>

                <v-toolbar-items>
                    <v-btn icon dark @click.stop="closeDialog">
                        <v-icon>mdi-close</v-icon>
                    </v-btn>
                </v-toolbar-items>
            </v-toolbar>
            <v-list v-if="isAdmin" lines="one" subheader>
                <v-list-item
                    ><span class="flex flex-col opacity-50 text-sm">Name</span
                    ><span>{{ serviceRequest.user.name }}</span></v-list-item
                >
                <v-list-item
                    ><span class="flex flex-col opacity-50 text-sm">Email</span
                    ><span>{{ serviceRequest.user.email }}</span></v-list-item
                >
            </v-list>
            <v-divider class="border-opacity-100" color="info"></v-divider>
            <v-list subheader class="pb-4">
                <v-list-item
                    ><span class="flex flex-col opacity-50 text-md">Bike</span
                    ><span>{{ serviceRequest.bike_name }}</span></v-list-item
                >
                <v-list-item
                    ><span class="flex flex-col opacity-50 text-md"
                        >Service</span
                    ><span>{{ serviceRequest.task }}</span></v-list-item
                >
                <v-list-item
                    ><span class="flex flex-col opacity-50 text-md">Cost</span
                    ><span>{{
                        serviceRequest.cost === 0
                            ? "Not estimated"
                            : serviceRequest.cost + "€"
                    }}</span></v-list-item
                >
            </v-list>

            <!-- <v-card-subtitle
                >by {{ serviceRequest.user.name }} -
                {{ serviceRequest.user.email }}</v-card-subtitle
            > -->
        </v-card>
    </v-dialog>
</template>

<style scoped></style>
