<script setup>
import { router } from '@inertiajs/vue3';

    function delteItem(id) {
        router.delete(`/expanse/delete/${id}`, {
            onError: (errors) => {
                console.log(errors);
            },
            onSuccess: () => {
                console.log('Item deleted successfully');
            },
        });
    }
    defineProps({
        expanses: {
            type: Object,
            required: true,
        },
    });
</script>

<template>
    <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="grid gap-1 md:grid-cols-1" >
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="table-light p-4 bg-gray-50 text-gray-500 dark:bg-gray-900 dark:text-gray-300">
                            <tr>
                                <th class="p-4">Title</th>
                                <th class="p-4">Amount</th>
                                <th class="p-4">Short Description</th>
                                <th class="p-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(expanse, index) in expanses" :key="index">
                                <td class="p-4">{{ expanse.title }}</td>
                                <td class="p-4">{{ expanse.amount }}</td>
                                <td class="p-4">{{ expanse.short_description }}</td>
                                <td class="p-4">
                                    <a class="p-2 bg-blue-300 text-blue-900 rounded-xl opacity-90 cursor-pointer">Edit</a> | <a @click="delteItem(expanse.id)" class="p-2 bg-red-400 text-red-900 rounded-xl opacity-90 cursor-pointer">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</template>
