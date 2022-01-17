<div class="col-12">


    <input type="hidden" name="id" value="{{$book->id}}" >
    <div class="form-group has-feedback"><label for="author">Автор книги</label><input class="form-control"
        type="text" id="author" tabindex="-1" name="author" required="" placeholder="Автор"
        value="{{ $book->author }}"></div>
    <div class="form-group has-feedback"><label for="reader">Читатель</label><select id="reader" class="form-control"
            name="reader">
            <option value="0">Нет читателя</option>
            @foreach ($readers as $reader)
                <option value="{{ $reader->id }}" {{ $reader->id == $book->reader_id ? 'selected=""' : '' }}>
                    {{ $reader->full_name }}</option>
            @endforeach
        </select></div>
    <div class="form-group"><label for="category">Категория</label><select id="category" class="form-control"
            name="category" required="">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $book->category_id ? 'selected=""' : '' }}>
                    {{ $category->name }}</option>
            @endforeach
        </select></div>
    <div class="form-group"><label for="shelf">Полка</label><select class="form-control" id="shelf"
            name="shelf" required="">
            @foreach ($shelves as $shelf)
                <option value="{{ $shelf->id }}" {{ $shelf->id == $book->shelf_id ? 'selected=""' : '' }}>
                    {{ $shelf->name }}</option>
            @endforeach
        </select></div>
    <div class="form-row">
        <div class="col-sm-6">
            <div class="form-group has-feedback"><label for="tags_string">Теги</label><input class="form-control"
                    type="text" id="tags_string" name="tags" placeholder="Тег_1 Тег_2 Тег_3" readonly=""
                    value="{{ $book->tags }}"></div>
        </div>
        <div class="col-sm-6">
            <div class="form-group"><label for="calltime">Список тегов</label><select class="form-control"
                    id="tags" required="">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                    @endforeach
                </select></div>
            <div class="btn-group" role="group" style="width: 100%;"><button class="btn btn-secondary"
                    type="button" onclick="addTagToBook()">Добавить</button><button class="btn btn-danger" type="button"
                    onclick="deleteTagFromBook()">Удалить</button></div>
        </div>
    </div>
    <div class="form-group"><label for="comments">Обложка книги (если файл не выбран, останется старая)</label>
        <div class="btn-toolbar"></div><input id="photo" class="form-control-file" type="file" name="photo">
    </div>
    <div class="form-group"><button id="update-book" class="btn btn-primary active btn-block" style="background-color:#303641;"
            onclick="updateBook()" type="button">Отправить&nbsp;<i class="fa fa-chevron-circle-right"></i></button></div>
    <hr>


</div>
