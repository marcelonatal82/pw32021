<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>@yield('title') - CATALOGO DE FILMES</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sticky-footer-navbar/">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">

    <!-- Favicons -->

    <meta name="theme-color" content="#7952b3">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{asset('./css/sticky-footer-navbar.css')}}" rel="stylesheet">
    <link href="{{asset('./css/mystyle.css')}}" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">
<div class="card mb-3" style="max-width: 100%;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{\Illuminate\Support\Facades\Storage::url('movies/').$movie->cover}}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$movie->title}}</h5>
                    <p class="card-text"><strong>Sinopse:</strong> {{$movie->synopsis}}</p>
                    <p class="card-text"><strong>Ano:</strong> {{$movie->year}}</p>
                    <p class="card-text"><strong>Duracao:</strong> {{$movie->time}}</p>
                    <p class="card-text"><strong>Trailer:</strong> <a href="{{$movie->trailer}}" target="_blank">Assista aqui</a></p>
                    <p class="card-text"><strong>Pais:</strong> {{$movie->country->name}}</p>
                    <p class="card-text"><strong>Genero:</strong> {{$movie->genre->description}}</p>
                    <p class="card-text"><strong>Diretor:</strong> {{$movie->director->name}}</p>
                    <a href="{{route('vitrine.showmovie', $movie)}}" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
