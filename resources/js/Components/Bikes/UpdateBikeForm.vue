<script setup>
import { useForm, usePage } from "@inertiajs/vue3";

const $page = usePage();

const form = useForm({
    bike_name: "",
    brand: "",
    model: "",
    year: null,
    serial_number: "",
});

const submit = () => {
    console.log(usePage());
    // form.post(route("bikes.update", { bike: $page.props.bike.id }));
    form.reset("bike_name", "brand", "model", "year", "serial_number");
};
</script>
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
                <v-btn color="red" @click.stop="show = false">Cancel</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
export default {
    props: {
        visible: Boolean,
        bike: Object,
    },

    computed: {
        show: {
            get() {
                return this.visible;
            },
            set(value) {
                if (!value) {
                    this.$emit("close");
                }
            },
        },
    },
};
</script>

<style scoped></style>
