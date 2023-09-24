<script>
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

export default {
    props: {
        visible: Boolean,
        serviceRequest: Object,
    },

    setup(props, { emit }) {
        const form = useForm({
            cost: 0,
            done: "Completed",
        });

        const show = ref(props.visible);

        const closeDialog = () => {
            show.value = false;
            emit("close");
        };

        const submit = () => {
            form.patch(
                route("serviceRequest.update", {
                    serviceRequest: props.serviceRequest.id,
                })
            );
            form.reset("cost");
            show.value = false;
            emit("close");
        };

        return {
            form,
            show,
            submit,
            closeDialog,
        };
    },
};
</script>

<template>
    <v-dialog v-model="show" max-width="500px">
        <v-card>
            <v-card-title>Estimate Service Request</v-card-title>

            <v-card-text>
                <v-form @submit.prevent="submit">
                    <span>Cost</span>
                    <v-text-field
                        type="number"
                        v-model="form.cost"
                        class="w-2/12"
                    ></v-text-field>
                </v-form>
            </v-card-text>
            <v-card-actions>
                <v-btn color="primary" type="submit" @click="submit"
                    >Update</v-btn
                >
                <v-btn color="red" @click.stop="closeDialog">Cancel</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<style scoped></style>
