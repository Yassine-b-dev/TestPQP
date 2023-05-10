
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="MovieList" />
  
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Film</h2>
    </template>
    <div class="py-12">
      <div>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="movie in movies" :key="movie.id">
              <td>{{ movie.id }}</td>
              <td>{{ movie.title }}</td>
              <td>{{ movie.description }}</td>
              <td>
                <div class="row gap-3">
                  <a :href="'/movies/'+ movie.id"></a>
                  <a :href="`/movies/${movie.id}`" class="p-2 col border btn btn-primary">View</a>
                  <a :href="`/movies/${movie.id}/edit`" class="p-2 col border btn btn-success">Edit</a>
                  <button @click="deleteMovie(movie.id)" type="button" class="p-2 col border btn btn-danger">Delete</button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </AuthenticatedLayout>
</template>




<script>
import axios from 'axios';



export default {
  data() {
    return {
      movies: []
    };
  },
  mounted() {
    axios.get('/api/moviesList').then(response => {
      console.log(response.data); 
      
      this.movies = response.data;
    });
  },
  methods: {
    async deleteMovie(id) {
      try {
        await axios.delete(`/api/movie/delete/${id}`);
        this.movie = this.movie.filter(movie => movie.id !== id);
      } catch (error) {
        console.error(error);
      }
      location.reload();

    }
  }
};

</script>