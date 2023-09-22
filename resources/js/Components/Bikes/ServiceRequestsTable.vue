<template>
    {{ usePage().ziggy }}
    <div class="d-flex justify-between">
        <h3 class="font-semibold text-lg text-gray-700">My Service Requests</h3>
        <!-- <v-btn variant="flat" @click="destroyBikes">Delete all</v-btn> -->
    </div>
    <v-table>
        <thead>
            <tr>
                <th class="text-left">Bike</th>
                <th class="text-left">Service</th>
                <th class="text-left">Cost</th>
                <th class="text-left">Status</th>
                <th class="text-right">Manage</th>
            </tr>
        </thead>
        <tbody v-if="usePage().props.service_requests.length > 0">
            <tr
                v-for="service in usePage().props.service_requests"
                :key="service.id"
            >
                <td>{{ service.bike_name }}</td>
                <td>{{ service.task }}</td>
                <td>
                    {{ service.cost === 0 ? "Not estimated" : service.cost }}
                </td>
                <td>{{ service.done === 0 ? "Pending" : "Finished" }}</td>

                <!-- <td class="flex justify-end">
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
                </td> -->
            </tr>
        </tbody>
        <tbody v-else>
            <tr>
                <td colspan="7" class="text-center">
                    <h3 class="pt-6">You haven't requested a service yet.</h3>
                </td>
            </tr>
        </tbody>
    </v-table>

    <!-- <UpdateBikeForm
        v-model="isDialogVisible"
        :bike="currentBike"
        @close="closeEditBikeDialog"
    /> -->
</template>

<script>
import { router, usePage } from "@inertiajs/vue3";
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
        deleteBike(bike) {
            router.delete("/bikes/" + bike.id);
        },
        destroyBikes() {
            router.delete("/bikes");
        },
    },
};
</script>
