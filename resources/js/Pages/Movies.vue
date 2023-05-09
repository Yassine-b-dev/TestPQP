<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="ListMovies" />
    
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Liste des films de la semaine</h2>
        </template>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <ul>
                            
                        </ul>
                        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">                            
                            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                                <div v-for="film in films" :key="film.id" class="group relative">
                                    <div class="min-h-80 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                                        <img :src="'https://www.themoviedb.org/t/p/w220_and_h330_face' + film.poster_path" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                    </div>
                                    <div class="mt-4 flex justify-between">
                                        <div>
                                            <h3 class="text-sm text-gray-700">
                                                <a :href="'/movies/' + film.id">
                                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                        
                                                    {{ film.title }}
                                                 
                                                </a>
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-500">{{film.vote_average}}/10</p>
                                        </div>
                                        <p class="text-sm font-medium text-gray-900">{{ film.release_date }}</p>
                                    </div>
                                </div>
                                
                                <!-- More products... -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            films: []
        };
    },
    mounted() {
        axios.get('/api/movies').then(response => {
            console.log(response.data); // Afficher la réponse dans la console
            //this.page = response.data.page;
            this.films = response.data;
        });
    }
};
</script>