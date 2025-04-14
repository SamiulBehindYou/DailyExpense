<script setup>
    defineProps({
        expanses: {
            type: Object,
            required: true,
        },
    });
</script>

<template>
    <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <table class="table table-striped table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Amount</th>
                                <th>Short Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(expanse, index) in expanses" :key="index">
                                <td>{{ expanse.title }}</td>
                                <td>{{ expanse.amount }}</td>
                                <td>{{ expanse.short_description }}</td>
                                <td>
                                    Edit | Delete
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</template>
