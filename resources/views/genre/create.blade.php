
@extends('layouts.master')
@section('content')
<body>
    <form method="POST" action="{{route('genre.store')}}">
        @csrf
        <label>Vul een naam voor de genre in</label>
        <input name="genreName" type="text" value="{{old('genreName')}}">
        @error('genreName')
        <span style="font-weight: bold; color:red;">{{$message}}</span>
        @enderror
        <input type="submit" value="Send me!">
    </form>
@endsection