@extends('layouts.master')

@section('content')
    <h1>Playlist: {{ $playlist->name }}</h1>
    <!-- Additional playlist information or functionality -->

    <h2>Songs:</h2>
    @if ($songs->isEmpty())
        <p>This playlist is empty. <a href="{{ route('song.index') }}">Browse songs</a></p>
    @else
        <ul>
            @foreach($songs as $song)
                <li>
                    {{ $song->name }}
                    <form method="POST" action="{{ route('playlist.removeSong', ['playlist' => $playlist->id, 'song' => $song->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Remove</button>
                    </form>
                    <a href="{{ route('song.show', ['song' => $song->id]) }}">View</a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
