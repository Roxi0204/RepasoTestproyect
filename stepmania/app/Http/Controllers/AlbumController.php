<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use Inertia\Inertia;

class AlbumController extends Controller
{
    public function index()
    {
        // Fetch all albums from the database
        $albums = Album::with('songs')->get();
        return Inertia::render('Albums', [
            'albums' => $albums,
        ]);
    }

    public function create()
    {
        return Inertia::render('AlbumsFormulari');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'genre'=>'required|string|max:255',
            'year'=>'required|string|max:255',
        ]);
        $album = new Album();
        $album->title = $request->input('title');
        $album->artist = $request->input('artist');
        $album->genre = $request->input('genre');
        $album->year = $request->input('year');
        $album->save();

        return redirect()->route('albums.index')->with('success', 'Album created successfully.');
    }

    public function edit($id)
    {
        $album = Album::findOrFail($id);

        return Inertia::render('AlbumEdit', [
            'album' => $album,
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'genre'=>'required|string|max:255',
            'year'=>'required|string|max:255',
        ]);
        $album = Album::findOrFail($id);
        $album->title = $request->input('title');
        $album->artist = $request->input('artist');
        $album->genre = $request->input('genre');
        $album->year = $request->input('year');
        $album->save();

        return redirect()->route('albums.index')->with('success', 'Album updated successfully.');
    }
    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        $album->delete();

        return redirect()->route('albums.index')->with('success', 'Album deleted successfully.');
    }
    public function show($id)
    {
        $album = Album::findOrFail($id);
        return Inertia::render('AlbumShow', [
            'album' => $album,
        ]);
    }
}
