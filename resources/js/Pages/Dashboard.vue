<template>

    <Head title="Pokemon List" />

    <AuthenticatedLayout>
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Generations</h2>
        </template> -->

        <div class="">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                    <ul class="text-center px-10 py-4 flex flex-col justify-center items-center">
                        <li
                            class="text-gray-200 bg-red-600 m-1 p-6 rounded-[40px] min-w-[200px]"
                            v-for="generation in generations"
                            @click="chooseGeneration(generation)"
                        >
                            {{ generation }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';

defineProps({
    generations: Object,
});

function chooseGeneration(generation) {
    //push to generation page
    router.visit(`/pokemons/${generation}`);
}

</script>
