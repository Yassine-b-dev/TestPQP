<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="MoviesSearch" />
    
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Liste des movies de la semaine</h2>
        </template>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class='flex items-center justify-center '>
                            <form class="flex items-center max-w-md mx-auto bg-white rounded-lg " @submit.prevent="searchMovie">
                                <div class="w-full">
                                    <input type="search" class="w-full px-4 py-1 text-gray-800 rounded-full focus:outline-none"
                                    placeholder="search" v-model="search">
                                </div>
                                <div>
                                    <button type="submit" class="flex items-center bg-blue-500 justify-center w-12 h-12 text-white rounded-r-lg"
                                    >
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <h2 v-if="isEmpty" class="flex items-center justify-center font-semibold text-xl text-gray-800 leading-tight">Aucun résultat</h2>

                        <div v-else class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">                            
                            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                                <div v-for="movie in movies" :key="movie.id" class="group relative">
                                    <div class="min-h-80 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                                        <img :src="'https://www.themoviedb.org/t/p/w220_and_h330_face' + movie.poster_path" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                    </div>
                                    <div class="mt-4 flex justify-between">
                                        <div>
                                            <h3 class="text-sm text-gray-700">
                                                <a :href="'/movies/' + movie.id">
                                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                        
                                                    {{ movie.title }}
                                                 
                                                </a>
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-500">{{movie.vote_average}}/10</p>
                                        </div>
                                        <p class="text-sm font-medium text-gray-900">{{ movie.release_date }}</p>
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
      search: '',
      movies: [],
      isEmpty: false,
    };
  },
  methods: {
    async searchMovie() {

      const response = await axios.get(`/api/moviesSearch?search=${this.search}`);
      console.log(response.data);
      if (response.data.length === 0) {
        this.isEmpty = true
      }else{
        this.movies = response.data;
        this.isEmpty = false
      }
    },
  },
};
</script>