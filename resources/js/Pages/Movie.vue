<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Movie" />
    
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Liste des films de la semaine</h2>
        </template>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="flex items-center p-4 w-[920px]">
                            <div class="w-3/12">
                                <img :src="'https://www.themoviedb.org/t/p/w220_and_h330_face' + film.poster_path" alt="Poster" class="rounded ">
                            </div>
                            <div class="w-9/12">
                                <div class="ml-5">
                                    <h2 class="text-2xl text-gray-900 font-semibold mb-2">{{ film.title }} {{ film.release_date}}</h2>
                                    <div class="mb-1 flex mb-4 sm:flex-nowrap flex-wrap">
                                        <span class="text-sm">
                                            {{ film.title }}
                                        </span>
                                    </div>
                                    <div class="flex items-center space-x-2 tracking-wide pb-1">
                                        <h1 class="text-gray-500">Release Date</h1>
                                        <p class="leading-6 text-sm">{{ film.release_date }}</p>
                                    </div>
                                    <div class="flex items-center space-x-2 tracking-wide pb-1">
                                        <h1 class="text-gray-500">Rating</h1>
                                        <p class="leading-6 text-sm">{{ film.vote_average }}/10</p>
                                    </div>
                                    <p class="leading-6 mt-5 text-gray-500">{{ film.description }}</p>
                                </div>
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
let url = window.location.pathname
let segments = url.split('/');
let lastSegment = segments[segments.length - 1];
export default {
    data() {
        return {
            film: []
        };
    },
    mounted() {
        axios.get('/api/movies/' + lastSegment).then(response => {
            console.log(response.data); // Afficher la réponse dans la console
            //this.page = response.data.page;
            this.film = response.data;
        });
    }
};


</script>