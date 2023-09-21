<template>
    {{ usePage().ziggy }}
    <div class="d-flex justify-between">
        <h3 class="font-semibold text-lg text-gray-700">My Bikes</h3>
        <v-btn variant="flat">Delete all</v-btn>
    </div>
    <v-table>
        <thead>
            <tr>
                <th class="text-left">Name</th>
                <th class="text-left">Brand</th>
                <th class="text-left">Model</th>
                <th class="text-left">Year</th>
                <th class="text-left">Serial Number</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="bike in usePage().props.bikes" :key="bike.id">
                <td>{{ bike.bike_name }}</td>
                <td>{{ bike.brand }}</td>
                <td>{{ bike.model }}</td>
                <td>{{ bike.year }}</td>
                <td>{{ bike.serial_number }}</td>
                <td>{{ bike.id }}</td>
                <td>
                    <v-btn
                        variant="text"
                        icon="mdi-trash-can-outline"
                        color="blue-lighten-2"
                    />
                    <v-btn
                        variant="text"
                        icon="mdi-pencil-outline"
                        color="blue-lighten-2"
                        @click="openEditBkeDialog(bike)"
                    />
                </td>
            </tr>
        </tbody>
    </v-table>
    <UpdateBikeForm
        v-model="isDialogVisible"
        :bike="currentBike"
        @close="closeEditBikeDialog"
    />
</template>

<script>
import { usePage } from "@inertiajs/vue3";
import UpdateBikeForm from "./UpdateBikeForm.vue";

export default {
    components: { usePage, UpdateBikeForm },
    data() {
        return {
            isDialogVisible: false,
            currentBike: null,
        };
    },
    methods: {
        usePage,
        openEditBkeDialog(bike) {
            this.isDialogVisible = true;
            this.currentBike = bike;
        },
        closeEditBikeDialog() {
            this.isDialogVisible = false; // Close the dialog by changing isDialogVisible
        },
    },
};
</script>
