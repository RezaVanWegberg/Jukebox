@extends('layouts.master')

@section('content')
    <h1>DIt is een totaaloverzicht van alle Songs</h1>
    <a href="{{route('song.create')}}">Create a song</a>
    <ul>
    @foreach($songs as $song)
    
        <li>{{$song->name}} - {{$song->author}} | {{$song->genre?->name}} |  Released in {{$song->releasedate}} | is found in playlist: @foreach($song->playlists as $playlist) {{$playlist->name}}; @endforeach <a href="{{route('song.destroy', ['song' => $song->id])}}">X</a> -<a href="{{ route('song.show', ['song' => $song->id]) }}">View</a></li>

    @endforeach
    </ul>

@endsection
