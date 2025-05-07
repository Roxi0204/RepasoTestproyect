<script setup>
import { ref, computed, defineProps } from 'vue'
import { Link } from '@inertiajs/vue3'
import axios from 'axios'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'


const props = defineProps({
  albums: Array,
 
})
console.log(props.albums);


function deleteAlbum(id) {
  if (confirm('¿Estás seguro de que deseas eliminar este álbum?')) {
    axios.post(route('albums.destroy', id)).then(() => {
      window.location.href = '/albums'
    })
  }
}
</script>

<template>
  <AuthenticatedLayout>
  <div class="p-6">
    <h1 class="text-3xl font-bold mb-6 text-center">Lista de Álbumes</h1>
    <div class="flex justify-between items-center mb-4">
      <Link href="/albums/create"
        class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 transition duration-300">
        Agregar Álbum
      </Link>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <div v-for="album in props.albums" :key="album.id"
        class="flex flex-col justify-between p-4 rounded-lg shadow-md bg-white hover:bg-gray-100 transition">
        <div>
          <p class="text-lg font-semibold text-gray-800 text-center">{{ album.title }}</p>
          <p class="text-gray-600">Artista: {{ album.artist }}</p>
            <p class="text-gray-600">Género: {{ album.genre }}</p>
          <p class="text-gray-600">Fecha de lanzamiento: {{ album.year }}</p>
        </div>
        <div class="mt-4 flex flex-wrap gap-2">
          <Link :href="`/albums/edit/${album.id}`"
            class="w-full sm:w-auto px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 transition duration-300 text-center">
            Editar
          </Link>
          <button @click.prevent="deleteAlbum(album.id)"
            class="w-full sm:w-auto px-4 py-2 bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-red-600 transition duration-300 text-center">
            Eliminar
          </button>
          <Link :href="`/albums/${album.id}`"
            class="w-full sm:w-auto px-4 py-2 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-600 transition duration-300 text-center">
            Ver más
          </Link>
        </div>
      </div>
    </div>
  </div>
  </AuthenticatedLayout>
</template>

<style scoped>
/* Puedes agregar estilos personalizados aquí si es necesario */
</style>