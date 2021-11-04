@extends('cliente.layout')

@section('title', 'Cadastro de cliente')

@section('page-title', 'Cadastro de cliente')

@section('content')
    <a href="{{route('cliente.create')}}" class="btn btn-success">Novo Cliente</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="main-col">Clientes</th>
                <th>-</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes AS $cliente)
                <tr>
                    <td class="main-col">{{$genre->description}}</td>
                    <td>
                        <a href="{{route('genres.edit', $genre)}}" class="btn btn-primary">Editar</a>
                        <form method="post" action="{{route('genres.destroy', $genre)}}" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
