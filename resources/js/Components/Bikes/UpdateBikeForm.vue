<template>
    <v-dialog v-model="show" max-width="500px">
        <v-card>
            <v-card-title>Edit {{ bike.model }}</v-card-title>
            <v-card-text>
                <v-form @submit.prevent="submit">
                    <v-text-field
                        v-model="form.bike_name"
                        :placeholder="bike.bike_name"
                        label="Name"
                    ></v-text-field>
                    <v-text-field
                        label="Brand"
                        v-model="form.brand"
                        :placeholder="bike.brand"
                    ></v-text-field>
                    <v-text-field
                        label="Model"
                        v-model="form.model"
                        :placeholder="bike.model"
                    ></v-text-field>
                    <v-text-field
                        label="Year"
                        type="number"
                        v-model="form.year"
                        :placeholder="bike.year"
                    ></v-text-field>
                    <v-text-field
                        label="Serial Number"
                        v-model="form.serial_number"
                        :placeholder="bike.serial_number"
                    ></v-text-field>
                </v-form>
            </v-card-text>
            <v-card-actions>
                <v-btn color="primary" type="submit" @click="submit"
                    >Save</v-btn
                >
                <v-btn color="red" @click.stop="closeEditBikeDialog"
                    >Cancel</v-btn
                >
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>
<script>
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

export default {
    props: {
        visible: Boolean,
        bike: Object,
    },

    setup(props, { emit }) {
        const form = useForm({
            bike_name: props.bike ? props.bike.bike_name : "",
            brand: props.bike ? props.bike.brand : "",
            model: props.bike ? props.bike.model : "",
            year: props.bike ? props.bike.year : "",
            serial_number: props.bike ? props.bike.serial_number : "",
        });

        const show = ref(props.visible);

        const closeEditBikeDialog = () => {
            show.value = false;
            emit("close");
        };

        const submit = () => {
            form.patch(route("bikes.update", { bike: props.bike.id }));
            form.reset("bike_name", "brand", "model", "year", "serial_number");
            show.value = false;
            emit("close");
        };

        return {
            form,
            show,
            submit,
            closeEditBikeDialog,
        };
    },
};
</script>

<style scoped></style>
