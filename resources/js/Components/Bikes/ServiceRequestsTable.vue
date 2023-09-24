<template>
    {{ usePage().ziggy }}
    <div class="d-flex justify-between">
        <h3 class="font-semibold text-lg text-gray-700">
            {{ title }}
        </h3>
    </div>
    <v-table>
        <thead>
            <tr>
                <th v-if="isAdmin" class="text-left">Request</th>
                <th v-if="isAdmin" class="text-left">Customer</th>
                <th v-if="!isAdmin" class="text-left">Bike</th>
                <th v-if="!isAdmin" class="text-left">Service</th>
                <th class="text-left">Cost</th>
                <th class="text-left">Status</th>
                <th v-if="showCancel || showEdit" class="text-right">Manage</th>
            </tr>
        </thead>
        <tbody v-if="usePage().props.service_requests.data.length > 0">
            <tr
                v-for="service in usePage().props.service_requests.data"
                :key="service.id"
            >
                <td v-if="isAdmin" class="opacity-80">#{{ service.id }}</td>
                <td v-if="isAdmin" class="opacity-80">
                    {{ service.user.email }}
                </td>
                <td v-if="!isAdmin">{{ service.bike_name }}</td>
                <td v-if="!isAdmin" class="truncate">{{ service.task }}</td>
                <td>
                    {{
                        service.cost === 0
                            ? "Not estimated"
                            : service.cost + "€"
                    }}
                </td>
                <td
                    :class="{
                        'text-orange-400': service.done === 'Pending',
                        'text-lime-600': service.done === 'Completed',
                        'text-red-500': service.done === 'Cancelled',
                    }"
                >
                    {{ service.done }}
                </td>

                <td class="flex justify-end">
                    <v-btn
                        v-if="showCancel"
                        :disabled="
                            service.done === 'Cancelled' ||
                            service.done === 'Completed'
                        "
                        variant="text"
                        icon="mdi-cancel"
                        color="blue-lighten-2"
                        @click="updateRequestStatus(service, 'Cancelled')"
                    />
                    <v-btn
                        v-if="showEdit"
                        :disabled="
                            service.done === 'Cancelled' ||
                            service.done === 'Completed'
                        "
                        variant="text"
                        icon="mdi-currency-eur"
                        color="blue-lighten-2"
                        @click="openDialog(service, 'isUpdateDialogVisible')"
                    />

                    <v-btn
                        v-if="showView"
                        variant="text"
                        icon="mdi-eye-outline"
                        color="blue-lighten-2"
                        @click="openDialog(service, 'isViewDialogVisible')"
                    />
                </td>
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
    <Pagination :items="usePage().props.service_requests" />
    <UpdateServiceRequestForm
        v-model="isUpdateDialogVisible"
        :serviceRequest="currentServiceRequest"
        @close="closeUpdateDialog"
    />
    <ViewServiceRequest
        v-model="isViewDialogVisible"
        :serviceRequest="currentServiceRequest"
        @close="closeViewDialog"
        :isAdmin="isAdmin"
    />
</template>

<script>
import { router, usePage } from "@inertiajs/vue3";
import UpdateServiceRequestForm from "./UpdateServiceRequestForm.vue";
import ViewServiceRequest from "./ViewServiceRequest.vue";
import Pagination from "../Pagination.vue";

export default {
    props: {
        isAdmin: Boolean,
        showView: Boolean,
        showEdit: Boolean,
        showCancel: Boolean,
        title: String,
    },
    components: {
        usePage,
        UpdateServiceRequestForm,
        ViewServiceRequest,
        Pagination,
    },
    data() {
        return {
            isUpdateDialogVisible: false,
            isViewDialogVisible: false,
            currentServiceRequest: null,
        };
    },
    methods: {
        usePage,
        updateRequestStatus(serviceRequest, status) {
            this.$inertia.put(
                route("service-requests.updateStatus", {
                    serviceRequest: serviceRequest.id,
                    status: status,
                })
            );
        },
        openDialog(serviceRequest, type) {
            this[type] = true;
            this.currentServiceRequest = serviceRequest;
        },
        closeUpdateDialog() {
            this.isUpdateDialogVisible = false;
        },
        closeViewDialog() {
            this.isViewDialogVisible = false;
        },
    },
};
</script>

<style scoped>
.truncate {
    max-width: 300px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>
