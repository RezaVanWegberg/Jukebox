<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;
use App\Models\Song;

use Illuminate\Support\Facades\Auth;


class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $user = Auth::user();
    $playlists = $user->playlists()->get();

    return view('playlist.index', ['playlists' => $playlists]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('playlist.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $messages = [
        'required' => 'Je bent de :attribute vergeten'
    ];

    $request->validate([
        'playlistName' => ['required']
    ], $messages);

    $playlist = new Playlist();
    $playlist->name = $request->input('playlistName');
    $playlist->user_id = Auth::id(); // Set the user_id to the currently logged-in user's id
    $playlist->save();

    return redirect(route('playlist.index'));
}


    /**
     * Display the specified resource.
     */
    public function show(Playlist $playlist)
    {
    $songs = $playlist->songs;
    $playlists = Playlist::all(); // Add this line to fetch all playlists
    return view('playlist.show', compact('playlist', 'songs', 'playlists'));
    }


    /**
     * Add a song to a playlist.
     */
    public function addSong(Request $request)
{
    $playlistId = $request->input('playlist_id');
    $songId = $request->input('song_id');

    $playlist = Playlist::findOrFail($playlistId);
    $playlist->songs()->attach($songId);

    // return redirect()->back();
    return redirect()->route('playlist.show', ['playlist' => $playlist->id]);

}
    /**
     * remove a song from a playlist
     */
    public function removeSong(Playlist $playlist, Song $song)
    {
        $playlist->songs()->detach($song->id);
        return redirect()->route('playlist.show', ['playlist' => $playlist->id]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Playlist $playlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Playlist $playlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Playlist $playlist)
    {
        Playlist::destroy($playlist->id);
        return redirect(route('playlist.index'));
    }
}
