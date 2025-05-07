<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use Inertia\Inertia;
use App\Models\Album;

class SongController extends Controller
{
    public function index()
    {
        // Fetch all songs from the database
        $songs = Song::with('album')->paginate(1);
        $allsongs = Song::with('album')->get();
        return Inertia::render ('Songs', [
            'songs' => $songs,
            'allsongs'=>$allsongs,
        ]);
    }

    public function create()
    {
        $albums=Album::all();
       
        return Inertia::render('SongsFormulari', [
            'albums' => $albums,
        ]);

    } 
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'artista' => 'required|string|max:255',
            'duracion'=>'required|string|max:255',
            
           
        ]);
        $song = new Song();
        $song->title = $request->input('titulo');
        $song->artist = $request->input('artista');
        $song->duration = $request->input('duracion');
        $song->album_id = $request->input('album');
        $song->save();
        
        return redirect()->route('songs.index')->with('success', 'Song created successfully.');
       
    
    }
    public function edit ($id){
        
        $song = Song::findOrFail($id)->with('album')->first();
        $albums=Album::all();
    
        return Inertia::render('SongEdit', [
            'song' => $song,
            'albums' => $albums,
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'artista' => 'required|string|max:255',
            'duracion'=>'required|string|max:255',
            'album'=>'required|max:255',
           
        ]);

        $song = Song::findOrFail($id);
        $song->title = $request->input('titulo');
        $song->artist = $request->input('artista');
        $song->duration = $request->input('duracion');
        $song->album_id = $request->input('album');
        $song->save();
        
        return redirect()->route('songs.index')->with('success', 'Song updated successfully.');
    }
    public function destroy($id)
    {
        $song = Song::findOrFail($id);
        $song->delete();
        
        return redirect()->route('songs.index')->with('success', 'Song deleted successfully.');
    }
    public function show($id)
    {
        $song = Song::findOrFail($id)->with ('album')->first();
       
        return Inertia::render('SongShow', [
            'song' => $song,
        ]);
    }
}
