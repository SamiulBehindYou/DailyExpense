<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import Create from './Create.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Expanses',
        href: '/expanses',
    },
];
</script>

<template>
    <Head title="Expanses" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <Create />
    </AppLayout>
</template>
