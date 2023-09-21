<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Bike Management
            </h2>
        </template>
        <div class="max-w-7xl px-4 d-flex flex-col mx-auto py-8 gap-6">
            <div class="d-flex gap-6">
                <div class="bg-white px-8 py-6 w-1/2 rounded-lg">
                    <CreateBikeForm :errors="$page.props.errors" />
                </div>
                <div class="bg-white px-8 py-6 w-1/2 rounded-lg">
                    <CreateServiceRequest />
                </div>
            </div>

            <div class="bg-white px-8 py-6 rounded-lg">
                <BikesTable />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import CreateBikeForm from "@/Components/Bikes/CreateBikeForm.vue";
import { Head, usePage } from "@inertiajs/vue3";
import BikesTable from "@/Components/Bikes/BikesTable.vue";
import CreateServiceRequest from "@/Components/Bikes/CreateServiceRequest.vue";

export default {
    components: {
        Head,
        AuthenticatedLayout,
        CreateBikeForm,
        BikesTable,
        CreateServiceRequest,
    },
    props: {
        bikes: Array,
    },
};
</script>
