<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import Create from './Create.vue';
import Table from './Table.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Expanses',
        href: '/expanses',
    },
];

defineProps({
    expanses: {
        type: Object,
        // default: () => [],
        required: true,
    },
});


</script>

<template>
    <Head title="Expanses" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <Create />

        <Table :expanses="expanses" />
    </AppLayout>
</template>
