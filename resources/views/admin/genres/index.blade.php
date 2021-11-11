<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('genres') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('genres.create')}}" class="btn btn-success">Novo genero</a>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="main-col">Genero</th>
                            <th>-</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($genres AS $genre)
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



