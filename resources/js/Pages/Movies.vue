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
                            <li v-for="film in films" :key="film.id">
                            {{ film.title }}
                        </li>
                        </ul>
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
    //console.log(response.data.results); // Afficher la réponse dans la console
      this.page = response.data.page;
      this.films = response.data.results;
    });
  }
};
</script>