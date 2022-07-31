@extends('dashboard.layout')

@section('content')

<h1>Crear Post</h1>

@include('dashboard.fragment._errors-form')


<form action="{{route('post.store')}}" method='post'>
    @csrf
    <label for="">Título</label>
    <input type="text" name='title'><br>

    <label for="">Slug</label>
    <input type="text" name='slug'><br>

    <label for="">Categoria</label>
    <select name="category_id" >
        <option value=""></option>
        @foreach ($categories as $title => $id)
        <option value="{{ $id }}">{{ $title }}</option>
        @endforeach
    </select><br>
    

    <label for="">Posteado</label>
    <select name="posted" >
        <option value="not">NO</option> 
        <option value="yes">Si</option>                    
    </select> <br>      

    <label for="">Contenido</label>
    <textarea name="content" ></textarea><br>

    <label for="">Descripción</label>
    <textarea name="description" ></textarea><br>

    <button type="submit">Enviar</button><br>

</form>
    
@endsection