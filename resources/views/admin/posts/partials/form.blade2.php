<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Ingrese el nombre del post"
        value="{{ old('name', $post->name ?? '') }}">

    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label for="name">Slug</label>
    <input type="text" name="slug" id="slug" class="form-control" placeholder="Ingrese el slug del post"
        value="{{ old('slug', $post->slug ?? '') }}">
    @error('slug')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label for="category_id">Categoria</label>
    <select name="category_id" id="category_id" class="form-control">
        @foreach ($categories as $id => $category)
            <option value="{{ $id }}"
                {{ old('category_id', $post->category_id ?? '') == $id ? 'selected' : '' }}>
                {{ $category }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <p class="font-weight-bold">Etiquetas</p>
    @foreach ($tags as $tag)
        <label class="mr-2">
            <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
            {{ $tag->name }}
        </label>
    @endforeach

    <br>
    @error('tags')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <p class="font-weight-bold">Estado</p>
    <label for="">
        <input type="radio" name="status" value="1">
        Borrador
    </label>
    <label for="">
        <input type="radio" name="status" value="2">
        Publicado
    </label>
    @error('status')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    <div class="row mb-3">
        <div class="col">
            <div class="image-wrapper">
                @isset($post->image)
                    <img src="{{ asset($post->image->url) }}" alt="" id="picture" accept="image/*">
                @else
                    <img id="picture" src="https://cdn.pixabay.com/photo/2020/03/27/13/02/venice-4973502_1280.jpg"
                        alt="">
                    @endif
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="file">Imagen que se mostrara en el post</label>
                    <input type="file" name="file" id="file" class="form-control-file" accept="image/*">
                </div>
                @error('file')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Beatae, officiis incidunt commodi numquam quas
                    esse alias, dolor ipsum dignissimos eius hic a. Aliquam eveniet minima incidunt amet temporibus, commodi
                    quisquam?</p>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="extract">Extracto:</label>
        <textarea name="extract" id="extract" class="form-control">{{ old('extract', $post->extract ?? '') }}</textarea>
    </div>
    @error('extract')
        <small class="text-danger">{{ $message }}</small>
    @enderror
