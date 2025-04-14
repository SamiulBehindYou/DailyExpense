<script setup>
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';

    // function create(){
    //     const form = useForm({
    //         title: '',
    //         amount: '',
    //         short_description: '',
    //     });

    //     form.post('expanses/store', {
    //         onFinish: () => form.reset(),
    //         onError: () => {
    //             console.log('Error');
    //         },
    //         onSuccess: () => {
    //             console.log('Success');
    //         },
    //     });
    // }

    // Create User
    const form = ref({
        title: '',
        amount: '',
        short_description: '',
        errors: {
            title: null,
            amount: null,
            short_description: null,
        },
    });

    const create = () => {
        form.value.errors.title = null;
        form.value.errors.amount = null;
        form.value.errors.short_description = null;

        router.post('expanses/store', form.value, {
            onFinish: () => {
                form.value.title = '';
                form.value.amount = '';
                form.value.short_description = '';
            },
            onError: (errors) => {
                console.log(errors);

                if (errors.title) {
                    form.value.errors.title = errors.title;
                }
                if (errors.amount) {
                    form.value.errors.amount = errors.amount;
                }
                if (errors.short_description) {
                    form.value.errors.short_description = errors.short_description;
                }
            },
        });
    };
</script>
<template>
    <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-lg font-semibold text-center p-2">Expanses</h2>
                    </div>
                    <div class="card-body p-4">
                        <form @submit.prevent="create" class="w-full max-w-lg">
                            <div class="flex flex-wrap -mx-3 mb-4 pb-4">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                        Expanse Title
                                    </label>
                                    <input v-model="form.title" class="appearance-none block w-full bg-black text-gray-400 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-gray-800" id="grid-first-name" type="text" placeholder="eg. Food">
                                    <span v-if="form.errors.title" class="text-red-500 text-sm">{{ form.errors.title }}</span>
                                </div>

                                <div class="w-full md:w-1/2 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">amount</label>
                                    <input v-model="form.amount" class="appearance-none block w-full bg-black text-gray-400 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-gray-800 focus:border-gray-500" id="grid-last-name" type="text" placeholder="eg. 1000">
                                    <span v-if="form.errors.amount" class="text-red-500 text-sm">{{ form.errors.amount }}</span>
                                </div>

                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">Short Description</label>
                                    <textarea v-model="form.short_description" name="short_description" id="" class="appearance-none block w-full bg-black text-gray-400 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-gray-800 focus:border-gray-500"></textarea>
                                    <span v-if="form.errors.short_description" class="text-red-500 text-sm">{{ form.errors.short_description }}</span>
                                </div>

                                <div class="w-full md:w-1/3 px-3 m-auto mt-3">
                                    <button type="submit" class="appearance-none block w-full bg-black text-gray-400 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-gray-800 focus:border-gray-500">Add Expanse</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
