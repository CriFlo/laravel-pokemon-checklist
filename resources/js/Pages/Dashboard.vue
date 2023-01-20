<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PokemonCard from '@/Components/PokemonCard.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Pokemon List" />

    <AuthenticatedLayout>
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
        </template> -->

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                    <div class="p-10 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-5 lg:grid-cols-8 xl:grid-cols-8 gap-5">
                        <PokemonCard />
                        <PokemonCard />
                        <PokemonCard />
                        <PokemonCard />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
