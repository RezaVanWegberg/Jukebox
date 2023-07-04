@extends('layouts.master')

@section('content')
    <h1>Song: {{ $song->name }}</h1>
    <!-- Additional song information or functionality -->

<ul>
    <li>song name: {{$song->name}} </li>
    <li>author: {{$song->author}}</li>
    <li>genre: {{$song->genre?->name}}</li>
    <li>Released in {{$song->releasedate}}</li>
    <li>is found in playlist: @foreach($song->playlists as $playlist) {{$playlist->name}}; @endforeach </li>
    <li><a href="{{route('song.destroy', ['song' => $song->id])}}">DELETE SONG</a></li>

</ul>

    <form method="POST" action="{{ route('playlist.addSong') }}">
        @csrf
        @if (Auth::guest())
        @else
        <label>Select a Playlist:</label>
        <select name="playlist_id">
            @foreach($playlists as $pl)
                <option value="{{ $pl->id }}" {{ $playlist && $playlist->id == $pl->id ? 'selected' : '' }}>{{ $pl->name }}</option>
            @endforeach
        </select>
        @endif
        <br>
        <input type="hidden" name="song_id" value="{{ $song->id }}">
        <input type="submit" value="Add to Playlist">
    </form>
@endsection
