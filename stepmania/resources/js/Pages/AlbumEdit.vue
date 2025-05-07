<script setup>
import { ref, onMounted } from 'vue'
import { defineProps } from 'vue'
import { useForm } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'


const props = defineProps({
  album: Object,
})

const form = useForm({
  title: '',
  artist: '',
  genre: '',
  year: '',
})

onMounted(() => {
  form.title = props.album.title
  form.artist = props.album.artist
  form.genre = props.album.genre
  form.year = props.album.year
})

function save() {
  form.put(route('albums.update', props.album.id))
}
</script>

<template>
  <AuthenticatedLayout>
  <div class="p-6 max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold mb-6 text-center">Editar Álbum</h1>

    <!-- Formulario -->
    <form @submit.prevent="save" class="space-y-6 bg-white p-6 rounded-lg shadow-md">
      <!-- Campo: Título -->
      <div>
        <label class="block mb-2 font-semibold text-gray-700" for="title">Título</label>
        <input
          v-model="form.title"
          id="title"
          type="text"
          class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Ingresa el título del álbum"
          required
        />
      </div>

      <!-- Campo: Artista -->
      <div>
        <label class="block mb-2 font-semibold text-gray-700" for="artist">Artista</label>
        <input
          v-model="form.artist"
          id="artist"
          type="text"
          class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Ingresa el nombre del artista"
          required
        />
      </div>
      <div>
        <label class="block mb-2 font-semibold text-gray-700" for="genre">Genero</label>
        <input
          v-model="form.genre"
          id="genre"
          type="text"
          class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          required
        />
      </div>

      <!-- Campo: Fecha de lanzamiento -->
      <div>
        <label class="block mb-2 font-semibold text-gray-700" for="year">Fecha de Lanzamiento</label>
        <input
          v-model="form.year"
          id="year"
          type="text"
            placeholder="Ejemplo: 2023"
          class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          required
        />
      </div>

      <!-- Botón de envío -->
      <div class="text-center">
        <button
          type="submit"
          class="w-full sm:w-auto px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 transition duration-300"
        >
          Guardar Cambios
        </button>
      </div>
    </form>
  </div>
  </AuthenticatedLayout>
</template>

<style scoped>
/* Mejora del diseño para pantallas pequeñas */
@media (max-width: 640px) {
  form {
    padding: 1.5rem;
  }
}
</style>