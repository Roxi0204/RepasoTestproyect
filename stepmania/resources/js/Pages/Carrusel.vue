<script setup>
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    books: Array,
    genderBook: Array,
});

const index = ref(0);

const textos = [
  'Texto 1: Bienvenido al carrusel',
  'Texto 2: Este es el segundo mensaje',
  'Texto 3: Aquí va el tercer texto',
  'Texto 4: Y este es el cuarto mensaje',
];

const next = () => {
  index.value = (index.value + 1) % textos.length;
};

const prev = () => {
  index.value = (index.value - 1 + textos.length) % textos.length;
};
</script>

<template>
    <Head title="Carrusel Mejorado" />
    <section class="relative min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-700 via-purple-700 to-pink-700 text-white">
      <div class="w-full max-w-2xl mx-auto p-6 bg-gradient-to-br from-gray-900 to-gray-800 rounded-lg shadow-lg">
        <div class="relative text-center">
          <!-- Texto del carrusel -->
          <p class="text-xl md:text-2xl font-bold bg-gradient-to-r from-purple-500 to-pink-500 text-black p-6 rounded-lg shadow">
            {{ textos[index] }}
          </p>
  
          <!-- Botón anterior -->
          <button
            @click="prev"
            class="absolute top-1/2 left-0 transform -translate-y-1/2 -translate-x-full bg-purple-600 hover:bg-purple-800 text-white font-bold py-2 px-4 rounded-full shadow focus:outline-none focus:ring-2 focus:ring-purple-300"
            aria-label="Texto anterior"
          >
            &lt;
          </button>
  
          <!-- Botón siguiente -->
          <button
            @click="next"
            class="absolute top-1/2 right-0 transform -translate-y-1/2 translate-x-full bg-purple-600 hover:bg-purple-800 text-white font-bold py-2 px-4 rounded-full shadow focus:outline-none focus:ring-2 focus:ring-purple-300"
            aria-label="Texto siguiente"
          >
            &gt;
          </button>
        </div>
  
        <!-- Indicadores -->
        <div class="flex justify-center gap-2 mt-4">
          <span
            v-for="(s, i) in textos"
            :key="i"
            class="w-3 h-3 md:w-4 md:h-4 rounded-full transition-all duration-300"
            :class="i === index ? 'bg-purple-500 scale-125' : 'bg-gray-400'"
            aria-label="Ir al texto {{ i + 1 }}"
          ></span>
        </div>
      </div>
    </section>
  </template>
<style scoped>
/* Animación para los indicadores */
span {
  transition: transform 0.3s ease, background-color 0.3s ease;
}
</style>