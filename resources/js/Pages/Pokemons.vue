<template>

    <Head title="Pokemon List" />

    <AuthenticatedLayout>
        <template #header>
            <div
                class="cursor-pointer p-2 rounded-lg bg-gray-700"
                @click="back"
            >
                <div class="flex items-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </div>
                    <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight ml-2">{{generation}}</h2>
                </div>
            </div>
        </template>


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative">
            <div @click="back" id="back">
                <div class="fixed right-6 bottom-6 p-4 bg-black rounded-[80px] cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </div>
            </div>
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
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue';

defineProps({
    pokemons: Array,
    generation: String,
});

onMounted(() => {
    let back = document.getElementById('back');
    if(back.style){
        back.style.display = 'none';
    }

    let callback = (entries, observer) => {
        entries.forEach(entry => {
            if(!entry.isIntersecting){
                document.getElementById('back').style.display = 'block';
            }else{
                document.getElementById('back').style.display = 'none';
            }
        })
    }

    let observer = new IntersectionObserver( callback , {
        treadhold: 0.5
    })

    window.addEventListener('scroll', () => {
        let header = document.getElementsByTagName('header');
        if(header){
            observer.observe(header[0], {treadhold: 0.5});
        }
    });
});

function back(){
    window.history.back();
}


</script>
