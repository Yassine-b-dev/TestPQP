
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="MovieList" />
  
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Film {{ movie.title }}</h2>
    </template>
    <div class="py-12">
      <div>
        <h2 >Edit Movie</h2>
        <form @submit.prevent="submitForm">
          <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input class="form-control" type="text" id="title" v-model="movie.title" required />
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control" id="description" v-model="movie.description" ></textarea>
          </div>
          <div class="mb-3">
            <label for="poster_path" class="form-label">poster path:</label>
            <input class="form-control"  type="text" id="poster_path" v-model="movie.poster_path" >
          </div>
          <div class="mb-3">
            <label for="vote_average" class="form-label">vote average:</label>
            <input class="form-control"  type="text" id="vote_average" v-model="movie.vote_average" >
          </div>
          <div class="mb-3">
            <label for="release_date" class="form-label">release date:</label>
            <input class="form-control"  type="text" id="release_date" v-model="movie.release_date" >
          </div>
          <button type="submit" class="btn btn-primary">Update Movie</button>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script>
import axios from 'axios';
let url = window.location.pathname
let segments = url.split('/');
let lastSegment = segments[segments.length - 2];

export default {
  data() {
    return {
      movie: {
        title: '',
        description: '',
        poster_path: '',
        vote_average: '',
        release_date: '',
      }
    }
  },
  mounted() {
    axios.get('/api/movies/' + lastSegment).then(response => {
      //console.log(response.data); // Afficher la réponse dans la console
      //this.page = response.data.page;
      this.movie = response.data;
    });
  },
  methods: {
    async submitForm() {
      try {
        await axios.put('/api/movies/'+lastSegment, this.movie);
      } catch (error) {
        console.error(error);
      }
    }
  }
}
</script>