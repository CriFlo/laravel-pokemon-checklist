<template>
    <div @click="changeState"
        :class="'max-w-sm rounded overflow-hidden shadow-lg rounded-[40px] px-2 pt-2 flex flex-wrap flex-col justify-center ' + (catched ? 'border-4 border-green-600' : 'border-4 border-red-600')"
        style="background-color: white;">
        <img class="w-full" :src="link">
        <div class="py-2">
            <div class="font-bold text-md">{{ pokemon.name }}</div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';

const props = defineProps({
    pokemon: Object
})

let catched = ref(props.pokemon.catched)

const link = `/storage/pokemons/${props.pokemon.label}.jpg`

function changeState() {
    catched.value = !catched.value
    axios.post(`/change-state/${props.pokemon.id}`)
}
</script>
