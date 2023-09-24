<script setup>
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    errors: Object,
    bikes: Array,
});

const form = useForm({
    task: "",
    bike_id: "",
    bike_name: "",
    bike: null,
    done: "Pending",
    cost: 0,
});

const submit = () => {
    form.bike_id = form.bike.id;
    form.bike_name = form.bike.bike_name;
    // console.log(form);
    form.post(route("service-request.store"));
    form.reset("bike_name", "bike_id", "task", "bike", "done", "cost");
};
</script>
<template>
    <div>
        <h3 class="font-semibold text-lg text-gray-700 pb-4">
            Request a Service
        </h3>
        <v-form @submit.prevent="submit">
            <v-select
                label="Bike for Service"
                :items="props.bikes"
                :item-props="itemProps"
                v-model="form.bike"
                variant="outlined"
                class="capitalize"
                :error-messages="errors.bike_name"
            ></v-select>
            <v-textarea
                v-model="form.task"
                counter
                :rules="rules"
                label="Description"
                variant="outlined"
                auto-grow
                rows="11"
                row-height="15"
                :error-messages="errors.task"
            ></v-textarea>
        </v-form>
        <div class="flex items-center justify-end pt-4">
            <v-btn type="submit" @click="submit" color="primary justify-end">
                Request
            </v-btn>
        </div>
    </div>
</template>

<script>
export default {
    data: () => ({
        rules: [(v) => v.length <= 100 || "Max 100 characters"],
    }),
    methods: {
        itemProps(item) {
            return {
                title: item.bike_name,
                subtitle: item.year,
                id: item.id,
            };
        },
    },
};
</script>

<style></style>
