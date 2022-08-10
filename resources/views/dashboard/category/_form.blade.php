@csrf
    <label for="">Título</label>
    <input type="text" name='title' value = '{{ old("title", $category->title) }}'><br>

    <label for="">Slug</label>
    <input type="text" name='slug' value = '{{ old("slug", $category->slug) }}'><br>

    <button type="submit">Enviar</button><br>