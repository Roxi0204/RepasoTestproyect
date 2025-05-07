<script setup>
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'

const props = defineProps({
 albums:Array,
})
const form = useForm({
  titulo: '',
  artista: '',
  duracion: '',
  album: '',
})

function save() {
  form.post(route('songs.store'))
}
</script>

<template>
  <AuthenticatedLayout>
  <div class="p-6 max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold mb-6 text-center">Agregar Nueva Canción</h1>

    <!-- Formulario -->
    <form @submit.prevent="save" class="space-y-6 bg-white p-6 rounded-lg shadow-md">
      <!-- Campo: Título -->
      <div>
        <label class="block mb-2 font-semibold text-gray-700" for="titulo">Título</label>
        <input
          v-model="form.titulo"
          id="titulo"
          type="text"
          aria-label="Título de la canción"
          class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Ingresa el título de la canción"
          required
        />
      </div>

      <!-- Campo: Artista -->
      <div>
        <label class="block mb-2 font-semibold text-gray-700" for="artista">Artista</label>
        <input
          v-model="form.artista"
          id="artista"
          type="text"
          aria-label="Nombre del artista"
          class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Ingresa el nombre del artista"
          required
        />
      </div>

      <!-- Campo: Duración -->
      <div>
        <label class="block mb-2 font-semibold text-gray-700" for="duracion">Duración</label>
        <input
          v-model="form.duracion"
          id="duracion"
          type="text"
          aria-label="Duración de la canción"
          class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Ejemplo: 3:45"
          required
        />
      </div>

      <!-- Campo: Álbum -->
<div>
  <label class="block mb-2 font-semibold text-gray-700" for="album">Álbum</label>
  <select
    v-model="form.album"
    id="album"
    aria-label="Selecciona un álbum"
    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
    required
  >
    <option value="" disabled>Selecciona un álbum</option>
    <option v-for="album in albums" :key="album.id" :value="album.id">
      {{ album.title }}
    </option>
  </select>
</div>

      <!-- Botón de envío -->
      <div class="text-center">
        <button
          type="submit"
          class="w-full sm:w-auto px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 transition duration-300"
        >
          Agregar Canción
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