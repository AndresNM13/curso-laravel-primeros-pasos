@extends('dashboard.layout')

@section('content')

    <a href="{{ route('post.create') }}">Crear</a>

    <table>
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
                        Categoria
                    </td>
                    <td>
                        {{$p->posted}}
                    </td>
                    <td>
                        <a href="{{ route('post.edit', $p) }}">Editar</a>
                        <a href="{{ route('post.show', $p) }}">Ver</a>

                        <form action="{{ route('post.destroy', $p) }}">
                            @method('DELETE')
                            @csrf

                            <button type="submit">Eliminar</button>
                        
                        </form>
                        
                        
                    </td>
                </tr>
                    
                @endforeach
        </tbody>
    </table>

    {{ $posts->links()}}

    
@endsection