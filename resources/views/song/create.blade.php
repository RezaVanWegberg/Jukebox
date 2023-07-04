<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{route('song.store')}}">
        @csrf
        <label>Vul een naam voor de song in</label>
        <input name="songName" type="text">
        <input type="submit" value="Send me!">
        
        <select name="genre_id">
        @foreach($genres as $genre)
        <option value="{{$genre->id}}">{{$genre->name}}</option>
        @endforeach
    </select>
</form>


</body>
</html> -->
<!-- 
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Songs - Create</title>
</head>
<body>
    <h1>Add a Song</h1>
    <form method="POST" action="{{route('song.store')}}">
        @csrf
        <label>Vul een naam voor het liedje in</label>
        <input name="name" type="text">
        <br>
        <label>Vul een author voor het liedje in</label>
        <input name="author" type="text">
        <br>
        <label>Vul een releasedate voor het liedje in</label>
        <input name="releasedate" type="date">
        <br>
        <label>Vul een duratie voor het liedje in</label>
        <input name="duration" type="number">
        <br>

        <select name="genre_id">
        @foreach($genres as $genre)
        <option value="{{$genre->id}}">{{$genre->name}}</option>
        @endforeach
        <br>

        <input type="submit" value="Send me!">
    </form>
</body>
</html> -->

@extends('layouts.master')
@section('content')
    <h1>Add a Song</h1>
    <form method="POST" action="{{route('song.store')}}">
        @csrf
        <label>Vul een naam voor het liedje in</label>
        <input name="name" type="text" value="{{old('name')}}">
        @error('name')
        <span style="font-weight: bold; color:red;">{{$message}}</span>
        @enderror
        <br>
        <label>Vul een author voor het liedje in</label>
        <input name="author" type="text" value="{{old('author')}}">
        @error('author')
        <span style="font-weight: bold; color:red;">{{$message}}</span>
        @enderror
        <br>
        <label>Vul een releasedate voor het liedje in</label>
        <input name="releasedate" type="date" value="{{old('releasedate')}}">
        @error('releasedate')
        <span style="font-weight: bold; color:red;">{{$message}}</span>
        @enderror
        <br>
        <label>Vul een duratie voor het liedje in</label>
        <input name="duration" type="number" value="{{old('duration')}}">
        @error('duration')
        <span style="font-weight: bold; color:red;">{{$message}}</span>
        @enderror
        <br>
        <label>Vul een het genre voor het liedje in</label>
        <select name="genre_id">
            @foreach($genres as $genre)
            <option @if(old('genre_id') == $genre->id) selected @endif value="{{$genre->id}}">{{$genre->name}}</option>
            @endforeach
        </select>
        @error('genre_id')
        <span style="font-weight: bold; color:red;">{{$message}}</span>
        @enderror
        <br>
        <input type="submit" value="Send me!">
    </form>



    
@endsection
