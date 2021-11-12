@extends('admin.layout')

@section('title', 'Visualizar Filmes')

@section('page-title', 'Visualizar  de Filmes')

@section('content')
    <form method="post" action="{{route('movies.show')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Titulo</label>
            <input type="text" name="title" id="title" value="{{$movie->title}}">
        </div>
        <div class="form-group">
            <label for="cover">Capa</label>
            <input type="file" name="cover" id="cover" value="{{$nameFile}}" required>
        </div>
        <div class="form-group">
            <label for="trailer">Trailer</label>
            <input type="text" name="trailer" id="trailer" value="{{$movies->trailer}}">
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label for="year">Ano</label>
                    <input type="number" name="year" id="year" value="{{$movies->year}}" required>
                </div>
                <div class="col-6">
                    <label for="time">Duracao (min)</label>
                    <input type="number" name="time" id="time" value="{{$movies->time}}"  required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="country">Pais</label>
            <input name="country_id" id="country" value="{{$movies->country->id}}" required>
            </input>
        </div>
        <div class="form-group">
            <label for="genre">Genero</label>
            <input name="genre_id" id="genre" class="form-control" value="{{$genre->id}}" required>
        </div>
        </div>
        <div class="form-group">
            <label for="director">Diretor</label>
            <input name="director_id" id="director" value="{{$director_id}}">
            </input>
        </div>
        <div class="form-group">
            <label for="synopsis">Sinopse</label>
            <textarea name="synopsis" id="synopsis" cols="30" rows="10" value="{{$movies->sinopsis}}"></textarea>
        </div>
    </form>
@endsection
