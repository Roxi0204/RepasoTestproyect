<script setup>
import { ref } from 'vue'
import { defineProps } from 'vue'

const props = defineProps({
  song: Object
})
// Datos de la canción
const cancion = ref({
  titulo: 'Bohemian Rhapsody',
  artista: 'Queen',
  album: 'A Night at the Opera',
  duracion: '5:55',
  anio: 1975,
  genero: 'Rock'
})
</script>

<template>
    <button @click="$inertia.visit('/songs')"
        type="button"
        class="absolute top-4 left-4 px-4 py-2 bg-purple-600 text-black font-semibold rounded-full hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-offset-2 transition"
        aria-label="Volver"
      >
        Volver
      </button>
  <main class="min-h-screen flex items-center justify-center bg-gradient-to-b from-purple-100 to-white p-4">
    
    <section
      class="bg-white border border-purple-300 rounded-3xl shadow-xl w-full max-w-xs p-6 sm:p-8 space-y-6"
      aria-labelledby="detalle-cancion"
    >
      <header class="text-center">
        <h1 id="detalle-cancion" class="text-2xl font-bold text-purple-700 mb-1 tracking-wide">
          🎶 {{ props.song.title}}
        </h1>
        <p class="text-gray-500 text-sm">{{ props.song.artist }}</p>
      </header>

      <div class="flex flex-col gap-4">
        <div class="bg-gray-50 p-3 rounded-xl flex justify-between items-center">
          <span class="text-gray-600 font-semibold">Álbum:</span>
          <span class="text-pink-500 font-semibold">{{ props.song.album.title }}</span>
        </div>
        <div class="bg-gray-50 p-3 rounded-xl flex justify-between items-center">
          <span class="text-gray-600 font-semibold">Duración:</span>
          <span class="text-green-500 font-semibold">{{ props.song.duration }}</span>
        </div>
        <div class="bg-gray-50 p-3 rounded-xl flex justify-between items-center">
          <span class="text-gray-600 font-semibold">Año:</span>
          <span class="text-yellow-500 font-semibold">{{ props.song.year }}</span>
        </div>
        <div class="bg-gray-50 p-3 rounded-xl flex justify-between items-center">
          <span class="text-gray-600 font-semibold">Género:</span>
          <span class="text-indigo-500 font-semibold">{{ props.song.genre }}</span>
        </div>
      </div>
    </section>
  </main>
</template>
