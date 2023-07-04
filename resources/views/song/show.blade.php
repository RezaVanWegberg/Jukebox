@extends('layouts.master')

@section('content')
    <h1>Song: {{ $song->name }}</h1>
    <!-- Additional song information or functionality -->

    <ul>
        <li>song name: {{$song->name}} </li>
        <li>author: {{$song->author}}</li>
        <li>genre: {{$song->genre?->name}}</li>
        <li>Released in {{$song->releasedate}}</li>
        <!-- @if ($song->playlists->isNotEmpty())
        <li>is found in playlist: @foreach($song->playlists as $playlist) {{$playlist->name}}; @endforeach </li>
        @endif -->
        @if (Auth::check() && Auth::user()->name == $song->author)
            <li><a href="{{route('song.destroy', ['song' => $song->id])}}">DELETE SONG</a></li>
        @endif

    </ul>

    @if (!Auth::guest() && count(Auth::user()->playlists) > 0)
        <form method="POST" action="{{ route('playlist.addSong') }}">
            @csrf
            <label>Select a Playlist:</label>
            <select name="playlist_id">
                @foreach(Auth::user()->playlists as $pl)
                    <option value="{{ $pl->id }}" {{ $playlist && $playlist->id == $pl->id ? 'selected' : '' }}>{{ $pl->name }}</option>
                @endforeach
            </select>
            <br>
            <input type="hidden" name="song_id" value="{{ $song->id }}">
            <input type="submit" value="Add to Playlist">
        </form>
    @elseif (!Auth::guest())
        <p>You have no playlists. <a href="{{route('playlist.index')}}">Make a playlist!</a></p>
    @elseif (Auth::guest())
        <a href="{{route('register')}}">Register to make a playlist!</a>
    @endif
@endsection
