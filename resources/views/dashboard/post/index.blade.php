@extends('dashboard.layout')

@section('content')

    <a class="btn btn-success my-3" href="{{ route('post.create') }}">Crear</a>

    <table class="table mb-2">
        <thead>
            <tr>
                <td>
                    Titulo                
                </td>
                <td>
                    Categoria
                </td>
                <td>
                    Posteado
                </td>
                <td>
                    Acciones
                </td>
            </tr>
        </thead>

        <tbody>
            <tr>
                @foreach ($posts as $p)
                <tr>
                    <td>
                        {{$p->title}}                
                    </td>
                    <td>
                        {{$p->category->title}}
                    </td>
                    <td>
                        {{$p->posted}}
                    </td>
                    <td>
                        <a class="my-1 btn btn-primary" href="{{ route('post.edit', $p) }}">Editar</a>
                        <a class="my-1 btn btn-primary" href="{{ route('post.show', $p) }}">Ver</a>

                        <form action="{{ route('post.destroy', $p) }}" method="post">
                            @method('DELETE')
                            @csrf

                            <button class="my-1 btn btn-danger" type="submit">Eliminar</button>
                        
                        </form>
                        
                        
                    </td>
                </tr>
                    
                @endforeach
        </tbody>
    </table>

    {{ $posts->links()}} 

    
@endsection