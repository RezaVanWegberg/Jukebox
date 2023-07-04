@extends('layouts.master')

@section('content')
    <h1>Dit is een totaal overzicht van alle Playlists<h1>
        <a href="create" style="float: right; margin-right: 100px;">Create</a>
        <ul>
    @foreach($playlists as $playlist)
        <li>{{$playlist->name}} <a href="{{route('playlist.destroy', ['playlist' => $playlist->id])}}">X</a> - <a href="{{ route('playlist.show', ['playlist' => $playlist->id]) }}">View</a></li>

    @endforeach
    </ul>
@endsection