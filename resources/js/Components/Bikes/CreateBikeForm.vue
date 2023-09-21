<script setup>
import { useForm } from "@inertiajs/vue3";
import { computed } from "vue";

const form = useForm({
    bike_name: "",
    brand: "",
    model: "",
    year: "",
    serial_number: "",
});

const isFormEmpty = computed(() => {
    return !form.bike_name || !form.brand || !form.model || !form.serial_number;
});

const submit = () => {
    form.post(route("bikes.store"));
    form.reset("bike_name", "brand", "model", "year", "serial_number");
};
</script>
<template>
    <h3 class="font-semibold text-lg text-gray-700 pb-4">Add Bikes</h3>
    <v-form @submit.prevent="submit">
        <v-text-field
            v-model="form.bike_name"
            type="text"
            label="Name"
            variant="outlined"
            color="primary"
            clearable
            required
            class="testing"
        />
        <v-text-field
            v-model="form.brand"
            type="text"
            label="Brand"
            variant="outlined"
            color="primary"
            clearable
            required
        />
        <v-text-field
            v-model="form.model"
            type="text"
            label="Model"
            variant="outlined"
            color="primary"
            clearable
            required
        />
        <v-text-field
            v-model="form.year"
            type="text"
            label="Year"
            variant="outlined"
            color="primary"
            clearable
            required
        />
        <v-text-field
            v-model="form.serial_number"
            type="text"
            label="Serial number"
            variant="outlined"
            color="primary"
            clearable
            required
        />

        <div class="flex items-center justify-end">
            <v-btn
                class=""
                type="submit"
                :disabled="isFormEmpty"
                color="primary justify-end"
            >
                Add bike
            </v-btn>
        </div>
    </v-form>
</template>

<style scoped></style>
