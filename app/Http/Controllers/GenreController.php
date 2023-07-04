<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::all();
        return view('genre.index', ['genres' => $genres]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genre.create');
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
            'genreName' => ['required']
            
        ],$messages);

        Genre::create([
            "name"=>$request['genreName']
        ]);
        return redirect(route('genre.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        Genre::destroy($genre->id);
        return redirect(route('genre.index'));
    }

    public function songs(Genre $genre)
{
    $songs = $genre->songs;

    return view('genre.songs', compact('genre', 'songs'));
}

}
