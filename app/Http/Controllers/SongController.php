<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Playlist;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Song::all();
        return view('song.index', ['songs' => $songs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();

        return view('song.create', ['genres' => $genres]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $playlistId = null)
{
    $messages = [
        'required' => 'Je bent de :attribute vergeten',
        'date' => 'Deze waarde moet een datum zijn',
        'integer' => 'Deze waarde moet een nummer zijn',
        'min:10' => 'Het lied moet minimaal 10 seconden zijn'
    ];

    $request->validate([
        'name' => ['required'],
        'author' => 'required',
        'releasedate' => 'required|date',
        'duration' => ['required', 'integer', 'min:10'],
        'genre_id' => 'required',
    ], $messages);

    $song = Song::create([
        'name' => $request['name'],
        'author' => $request['author'],
        'releasedate' => $request['releasedate'],
        'duration' => $request['duration'],
        'genre_id' => $request['genre_id']
    ]);

    $playlists = Playlist::all();
    $playlist = $playlistId ? Playlist::find($playlistId) : $playlists->first();

    return view('song.show', compact('song', 'playlists', 'playlist'));
}


    /**
     * Display the specified resource.
     */
    public function show($songId, $playlistId = null)
    {
        $song = Song::find($songId);
        $playlists = Playlist::all();
        $playlist = $playlistId ? Playlist::find($playlistId) : $playlists->first();
        
        return view('song.show', compact('song', 'playlists', 'playlist'));
    }
    
    
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(song $song)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, song $song)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(song $song)
    {
        Song::destroy($song->id);
        return redirect(route('song.index'));
    }

    public function details(song $song)
    {
        return view('song.show', compact('song'));
    }
}
