
@extends('layouts.master')
@section('content')
    <form method="POST" action="{{route('playlist.store')}}">
        @csrf
        <label>Vul een naam voor de playlist in</label>
        <input name="playlistName" type="text" value="{{old('playlistName')}}">
        @error('playlistName')
        <span style="font-weight: bold; color:red;">{{$message}}</span>
        @enderror

        <input type="submit" value="Send me!">
    </form>
@endsection
