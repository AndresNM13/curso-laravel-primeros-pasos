@csrf
    <label for="">Título</label>
    <input type="text" class='form-control' name='title' value = '{{ old("title", $post->title) }}'><br>

    <label for="">Slug</label>
    <input type="text" class='form-control' name='slug' value = '{{ old("slug", $post->slug) }}'><br>

    <label for="">Categoria</label>
    <select name="category_id" class='form-control'>
        <option value=""></option>
        @foreach ($categories as $title => $id)
        <option {{ old("category_id", $post->category_id) == $id ? 'selected' : ''}} value="{{ $id }}">{{ $title }}</option>
        @endforeach
    </select><br>
    

    <label for="">Posteado</label>
    <select name="posted" class='form-control'>
        <option {{ old("posted", $post->posted) == "not" ? 'selected' : ''}} value="not">NO</option> 
        <option {{ old("posted", $post->posted) == "yes" ? 'selected' : ''}} value="yes">Si</option>                    
    </select> <br>      

    <label for="">Contenido</label>
    <textarea class='form-control' name="content" >{{ old("content", $post->content) }}</textarea><br>

    <label for="">Descripción</label>
    <textarea class='form-control' name="description" >{{ old("description", $post->description) }}</textarea><br>

    @if ( isset($task) && $task == 'edit')
        <label for="">Imagen</label>
        <input type="file" name="image" >
        
    @endif


    <button class="mt-3 my-1 btn btn-success" type="submit">Enviar</button><br>