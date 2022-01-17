@foreach ($allBooks as $book)

    <div class="col-md-6 col-lg-4 filtr-item" data-category="{{ $book->category_id }}">
        <div style="height: 525px;" class="card border-dark">
            <div class="card-header bg-dark text-light">
                <h5 class="m-0">{{ $book->author }}</h5>
            </div><img class="img-fluid card-img d-block rounded-0"
                style="width: auto; height: 200px; object-fit: cover;"
                src="data: image/png;base64,{{ $book->photo }}">
            <div class="card-body">
                <p class="card-text">Полка: {{ $book->getShelfName($book->shelf_id) }}</p>
                <p class="card-text">Текущий читатель:
                    {{ is_null($book->reader_id) ? 'Книга свободна' : $book->getReaderName($book->reader_id) }}
                </p>
                <p class="card-text">Время забирания книги:
                    {{ is_null($book->taken_date) ? '---' : $book->taken_date }}</p>
            </div>
            <div class="d-flex card-footer">
                <div class="btn-group-vertical btn-block">
                    <button class="btn btn-dark btn-sm " type="button"
                        onclick="editBookData({{ $book->id }})"><i
                            class="fa fa-eye"></i>&nbsp;Редактировать книгу</button><button
                        class="btn btn-outline-dark btn-sm " type="button"><i
                            class="fa fa-remove"></i>&nbsp;Удалить книгу</button>
                </div>
            </div>
        </div>
    </div>

@endforeach

<div class="col-md-6 col-lg-4 filtr-item" data-category="all">
    <div style="height: 525px;" class="card border-dark">
        <div class="card-header bg-dark text-light">
            <h5 class="m-0">Добавить книгу</h5>
        </div>
        <img class="img-fluid card-img d-block rounded-0"
            style="width: auto; height: 349px; object-fit: contain;" src="https://puu.sh/IxRyB.png">

        <div class="d-flex card-footer"><button class="btn btn-dark btn-sm btn-block" type="button"
                onclick="editBookData(0)"><i class="fa fa-plus"></i>&nbsp;Добавить книгу</button>
        </div>
    </div>
</div>