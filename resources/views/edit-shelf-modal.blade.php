<div class="col-12">

    <div class="form-group has-feedback"><label for="author">Добавить полку</label><input class="form-control"
        type="text" id="shelfadd" tabindex="-1" name="author" required="" placeholder="ПОГ полка"
        value=""></div>
    <div class="form-group"><button id="add-shelf" class="btn btn-primary active btn-block" style="background-color:#303641;"
        onclick="addNewShelf()" type="button">Отправить&nbsp;<i class="fa fa-chevron-circle-right"></i></button></div>
    <hr>

    <div class="form-group has-feedback"><label for="reader">Удалить полку</label><select id="shelfdelete" class="form-control"
        name="reader">
        @foreach ($shelves as $shelf)
            <option value="{{ $shelf->id }}">
                {{ $shelf->name }}</option>
        @endforeach
    </select></div>
    <div class="form-group"><button id="update-book" class="btn btn-primary active btn-block" style="background-color:#303641;"
        onclick="deleteShelf()" type="button">Удалить&nbsp;<i class="fa fa-chevron-circle-right"></i></button></div>
    <hr>

    
</div>
