@extends('layouts.master')

@push('style')
    <link rel="stylesheet" href="{{asset('css/genre.style.css')}}">
@endpush

@section('content')
    <h1>Dit is een totaaloverzicht van alle Genres</h1>
    <a href="{{ route('genre.create') }}" >Create genre</a>
    <ul>
        @foreach($genres as $genre)
            <li>
                <a href="{{ route('genre.songs', ['genre' => $genre->id]) }}">{{ $genre->name }}</a>
                <a href="{{ route('genre.destroy', ['genre' => $genre->id]) }}">X</a>
            </li>
        @endforeach
    </ul>
@endsection

@section('counter')
    Er zijn op dit moment {{ $genres->count() }} genres
@endsection
