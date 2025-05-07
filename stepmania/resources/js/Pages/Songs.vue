<script setup>
import { computed, defineProps, ref } from 'vue'
import { Link } from '@inertiajs/vue3'
import axios from 'axios'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'

const props = defineProps({
    songs: Array,
    song: String,
    allsongs:Array,
})

console.log(props.songs.data);
const localPagination = ref({...props.songs});

function deleteSong(id) {
    if (confirm('Are you sure you want to delete this song?')) {
        axios.post(route('songs.destroy', id)).then(() => {
            window.location.href = '/songs'
        })
    }
}
const searchSongsQuery=ref('');
const filterSongs=ref('');

const filteredSongsItems=computed(() =>{
    return props.allsongs.filter(song =>{
        const matchesQuery=song.title.toLowerCase().includes(searchSongsQuery.value.toLowerCase()) ||
        song.artist.toLowerCase().includes(searchSongsQuery.value.toLowerCase())
        const matchesFilter= song.closed==filterSongs.value;
        return matchesQuery;
    })
})

</script>

<template>
   <AuthenticatedLayout>
    <div class="p-6">
        <h1 class="text-3xl font-bold mb-6 text-center">Lista de Canciones</h1>
        <div class="flex justify-between items-center mb-4">
            <Link href="/songs/create"
                class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 transition duration-300">
                Agregar Canción
            </Link>
        </div>
        
        <div class="h-full-screen bg-blue-400 p-6 rounded-lg shadow-lg mb-6">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <input v-model='searchSongsQuery' @click="searchSongsQuery = ''"
                        @keydown.enter="searchSongsQuery = ''" type="text" placeholder="Buscar canciones..."
                        class="w-full px-4 py-2 border rounded-lg bg-[ff0000] text-black border-[ff0000] focus:outline-none focus:ring-2 focus:ring-[#5DA6C3]"
                        aria-label="Buscar canciones">
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div v-for="cancion in (searchSongsQuery ? filteredSongsItems : props.songs.data)" :key="cancion.id"
                class="flex flex-col justify-between p-4 rounded-lg shadow-md bg-white hover:bg-gray-100 transition">
                <div>
                    <p class="text-lg font-semibold text-gray-800 text-center">{{ cancion.title }}</p>
                    <p class="text-gray-600">Álbum: {{ cancion.album.title }}</p>
                    <p class="text-gray-600">Duración: {{ cancion.duration }}</p>
                    <p class="text-gray-600">Fecha de lanzamiento: {{ cancion.release_date }}</p>
                    <p class="text-gray-600">Artista: {{ cancion.artist }}</p>
                </div>
                <div class="mt-4 flex flex-wrap gap-2">
                    <Link :href="`/songs/edit/${cancion.id}`"
                        class="w-full sm:w-auto px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 transition duration-300 text-center">
                    Editar
                    </Link>
                    <button @click.prevent="deleteSong(cancion.id)"
                        class="w-full sm:w-auto px-4 py-2 bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-red-600 transition duration-300 text-center">
                        Eliminar
                    </button>
                    <Link :href="`/songs/${cancion.id}`"
                        class="w-full sm:w-auto px-4 py-2 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-600 transition duration-300 text-center">
                    Ver más
                    </Link>
                </div>
            </div>
        </div>
        <div class="mt-6 flex justify-center" v-if="songs.links && songs.links.length > 3">
        <div class="flex flex-wrap -mb-1">
            <template v-for="(link, p) in songs.links" :key="p">
                <div v-if="link.url === null"
                    class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded"
                    v-html="link.label">
                </div>
                <Link v-else
                    class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-red-100 focus:border-indigo-500 focus:text-indigo-500"
                    :class="{ 'bg-red-500 text-white': link.active }"
                    :href="link.url"
                    v-html="link.label"/>
            </template>
        </div>
    </div>
    </div>
</AuthenticatedLayout>

</template>
<style scoped>
/* Puedes agregar estilos personalizados aquí si es necesario */
</style>