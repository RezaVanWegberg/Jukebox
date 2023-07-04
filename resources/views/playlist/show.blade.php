@extends('layouts.master')

@section('content')
    <h1>Playlist: {{ $playlist->name }}</h1>
    <!-- Additional playlist information or functionality -->

    <h2>Songs:</h2>
    <ul>
        @foreach($songs as $song)
            <li>{{ $song->name }}</li>
        @endforeach
    </ul>
@endsection
