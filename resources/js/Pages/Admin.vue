<template>
    <Head title="Service Requests" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Admin Panel
            </h2>
        </template>
        <div class="max-w-7xl px-4 d-flex flex-col mx-auto py-8 gap-6">
            <div class="bg-white px-8 py-6 rounded-lg">
                <ServiceRequestsTable
                    :isAdmin="true"
                    :showEdit="true"
                    :showCancel="true"
                    :showView="true"
                    :title="'All Service Requests'"
                />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import CreateBikeForm from "@/Components/Bikes/CreateBikeForm.vue";
import { Head, usePage } from "@inertiajs/vue3";
import ServiceRequestsTable from "@/Components/Bikes/ServiceRequestsTable.vue";
import CreateServiceRequest from "@/Components/Bikes/CreateServiceRequest.vue";

export default {
    components: {
        Head,
        AuthenticatedLayout,
        CreateBikeForm,
        ServiceRequestsTable,
        CreateServiceRequest,
    },
    props: {
        bikes: Array,
    },
};
</script>
