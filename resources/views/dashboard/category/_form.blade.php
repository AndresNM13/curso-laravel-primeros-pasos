@csrf
    <label for="">Título</label>
    <input type="text" class='form-control' name='title' value = '{{ old("title", $category->title) }}'><br>

    <label for="">Slug</label>
    <input type="text" class='form-control' name='slug' value = '{{ old("slug", $category->slug) }}'><br>

    <button class="btn btn-success my-3" type="submit">Enviar</button><br>