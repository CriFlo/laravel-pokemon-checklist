<template>

    <AuthenticatedLayout>
        <template #header>
            <div
                class="flex items-center cursor-pointer p-2 rounded-lg bg-gray-700"
                @click="back"
            >
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </div>
                <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight ml-2">{{generation}}</h2>
            </div>
        </template>


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-10 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-5 lg:grid-cols-6 xl:grid-cols-6 gap-5 text-center">
                <PokemonCard
                    v-for="pokemon in pokemons"
                    :key="pokemon.id"
                    :pokemon="pokemon"
                />
            </div>
        </div>


    </AuthenticatedLayout>

</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PokemonCard from '@/Components/PokemonCard.vue';
import { Head, router } from '@inertiajs/vue3';

defineProps({
    pokemons: Array,
    generation: String,
});

function back(){
    window.history.back();
}


</script>
