<script setup>
import { router } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';


    const form = useForm({
        title: '',
        amount: '',
        short_description: '',
    });
    const showModalEdit = ref(false);

    function editModal(expanse){
        showModalEdit.value = true;
        form.title = expanse.title;
        form.amount = expanse.amount;
        form.short_description = expanse.short_description;
        form.id = expanse.id;
    }

    function submitEdit() {
        form.put(`/expanse/${form.id}`, {
            onError: (errors) => {
                console.log(errors);
            },
            onSuccess: () => {
                console.log('Item updated successfully');
                showModalEdit.value = false;
            },
        });
    }

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
                                <a @click="editModal(expanse)" class="p-2 bg-blue-300 text-blue-900 rounded-xl opacity-90 cursor-pointer">Edit</a> | <a @click="delteItem(expanse.id)" class="p-2 bg-red-400 text-red-900 rounded-xl opacity-90 cursor-pointer">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <transition name="fade">
        <div
        v-if="showModalEdit"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
        >
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md  dark:text-white  dark:bg-black">
            <h3 class="text-lg font-semibold mb-4">Edit Expanse</h3>

            <form @submit.prevent="submitEdit" class="space-y-4">
            <div>
                <label class="block text-sm">Expasne title</label>
                <input v-model="form.title" type="text" class="w-full border p-2 rounded dark:text-white  dark:bg-black" />
                <span v-if="form.errors.title" class="text-red-500 text-sm">{{ form.errors.title }}</span>
            </div>

            <div>
                <label class="block text-sm">Amount</label>
                <input v-model="form.amount" type="number" class="w-full border p-2 rounded dark:text-white  dark:bg-black" />
                <span v-if="form.errors.amount" class="text-red-500 text-sm">{{ form.errors.amount }}</span>
            </div>

            <div>
                <label class="block text-sm">Amount</label>
                <!-- <input v-model="form.amount" type="number" class="w-full border p-2 rounded" />
                <span v-if="form.errors.amount" class="text-red-500 text-sm">{{ form.errors.amount }}</span> -->

                <textarea v-model="form.short_description" name="short_description" id="" class="w-full border p-2 rounded dark:text-white  dark:bg-black"></textarea>
                <span v-if="form.errors.short_description" class="text-red-500 text-sm">{{ form.errors.short_description }}</span>
            </div>

            <div class="flex justify-end gap-2">
                <button @click="showModalEdit = false" type="button" class="px-4 py-2 bg-gray-500 rounded">
                Cancel
                </button>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">
                Save Changes
                </button>
            </div>
            </form>
        </div>
        </div>
    </transition>
</template>


<style scoped>
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.3s ease;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
}
</style>

