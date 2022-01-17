<div class="col-12">
 
    <h5>Добавить</h5>
    <div class="form-group has-feedback"><label for="full_name">Имя</label><input class="form-control"
        type="text" id="readeradd1" tabindex="-1" name="full_name" required="" placeholder="Кеноби Hello there"
        value=""></div>
    <div class="form-group has-feedback"><label for="birth_date">Дата рождения</label><input class="form-control"
        type="date" id="readeradd2" tabindex="-1" name="birth_date" required="" placeholder="13.37.7272"
        value=""></div>
    <div class="form-group"><button id="add-reader" class="btn btn-primary active btn-block" style="background-color:#303641;"
        onclick="addNewReader()" type="button">Отправить&nbsp;<i class="fa fa-chevron-circle-right"></i></button></div>
        <hr>

    <h5>Редактировать</h5>
    <div class="form-group has-feedback"><label for="reader">Выберите читателя</label><select id="readeredit" class="form-control"  onchange="loadReaderInfo(this.value)"
        name="reader">
        <option hidden="true" data-hidden="true">Выберите читателя</option>
        @foreach ($readers as $reader)
            <option value="{{ $reader->id }}">
                {{ $reader->full_name }} ({{ $reader->birth_date }})</option>
        @endforeach
    </select></div>
    <div class="form-group has-feedback"><label for="full_name">Имя</label><input class="form-control"
        type="text" id="full_name" tabindex="-1" name="full_name" required="" placeholder="Кеноби Hello there"
        value=""></div>
    <div class="form-group has-feedback"><label for="birth_date">Дата рождения</label><input class="form-control"
        type="date" id="birth_date" tabindex="-1" name="birth_date" required="" placeholder="13.37.7272"
        value=""></div>
    <div class="form-group"><button id="update-reader" class="btn btn-primary active btn-block" style="background-color:#303641;"
        onclick="editReader()" type="button">Отправить&nbsp;<i class="fa fa-chevron-circle-right"></i></button></div>
    <hr>

    <h5>Удалить</h5>
    <div class="form-group has-feedback"><label for="reader">Выберите читателя</label><select id="readerdelete" class="form-control"
        name="reader">
        @foreach ($readers as $reader)
            <option value="{{ $reader->id }}">
                {{ $reader->full_name }} ({{ $reader->birth_date }})</option>
        @endforeach
    </select></div>
    <div class="form-group"><button id="delete-reader" class="btn btn-primary active btn-block" style="background-color:#303641;"
        onclick="deleteReader()" type="button">Удалить&nbsp;<i class="fa fa-chevron-circle-right"></i></button></div>
    <hr>
    
</div>
