<template>
    {{ usePage().ziggy }}
    <div class="d-flex justify-between">
        <h3 class="font-semibold text-lg text-gray-700">My Bikes</h3>
        <v-btn variant="flat" @click="destroyBikes">Delete all</v-btn>
    </div>
    <v-table>
        <thead>
            <tr>
                <th class="text-left">Name</th>
                <th class="text-left">Brand</th>
                <th class="text-left">Model</th>
                <th class="text-left">Year</th>
                <th class="text-left">Serial Number</th>
                <th class="text-right">Manage</th>
            </tr>
        </thead>
        <tbody v-if="usePage().props.bikes.data.length > 0">
            <tr v-for="bike in usePage().props.bikes.data" :key="bike.id">
                <td>{{ bike.bike_name }}</td>
                <td>{{ bike.brand }}</td>
                <td>{{ bike.model }}</td>
                <td>{{ bike.year }}</td>
                <td>{{ bike.serial_number }}</td>
                <td class="flex justify-end">
                    <v-btn
                        variant="text"
                        icon="mdi-trash-can-outline"
                        color="blue-lighten-2"
                        @click="deleteBike(bike)"
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
        <tbody v-else>
            <tr>
                <td colspan="7" class="text-center">
                    <h3 class="pt-6">
                        You don't have any bikes in your list yet.
                    </h3>
                </td>
            </tr>
        </tbody>
    </v-table>
    <Pagination :items="usePage().props.bikes" />
    <UpdateBikeForm
        v-model="isDialogVisible"
        :bike="currentBike"
        @close="closeEditBikeDialog"
    />
</template>

<script>
import { router, usePage } from "@inertiajs/vue3";
import UpdateBikeForm from "./UpdateBikeForm.vue";
import Pagination from "../Pagination.vue";

export default {
    components: { usePage, UpdateBikeForm, Pagination },
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
        deleteBike(bike) {
            router.delete("/bikes/" + bike.id);
        },
        destroyBikes() {
            router.delete("/bikes");
        },
    },
};
</script>
