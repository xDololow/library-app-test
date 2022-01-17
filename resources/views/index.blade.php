@include('head')

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand" href="#">Library app</a>
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <button class="btn btn-link" onclick="editShelvesForm()">Редактировать полки</button>
            </li>
            <li class="nav-item">
              <button class="btn btn-link" onclick="editReadersForm()">Редактировать читателей</button>
            </li>
            <li class="nav-item">
              <button class="btn btn-link" onclick="readingJournal()">Журнал чтения</button>
            </li>
          </ul>
          {{-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form> --}}
        </div>
      </nav>

    <section class="py-5">

        <div class="container">

            <h1 class="text-center mb-4">Библиотека</h1>

            <div class="filtr-controls text-center lead text-uppercase mb-3">
                <span class="active d-inline-block mx-3 py-1 position-relative" data-filter="all">ВСЁ </span>

                @foreach ($bookCategories as $category)
                    <span class="d-inline-block mx-3 py-1 position-relative"
                        data-filter="{{ $category->id }}">{{ $category->name }} </span>
                @endforeach

            </div>

            <div class="row filtr-container">

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
                                        class="btn btn-outline-dark btn-sm " type="button" onclick="deleteBook({{ $book->id }})"><i
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

            </div>
        </div>


        {{-- <article class="bg-light text-dark py-4 mt-5 border-top border-bottom border-dark">
            <div class="container">
                <h1>Informations</h1>
                <p>Add "<strong>data-filter</strong>" attribute to filter control element<br></p>
                <p>Output example:&nbsp;<em>&lt;span data-filter="4"&gt;Category name&lt;/span&gt;</em><br></p>
                <p>Add "<strong>data-category</strong>" attribute to .filtr-item element with the number of the
                    filter<br></p>
                <p>Output example:&nbsp;<em>&lt;div class="filtr-item"
                        data-category="4"&gt;...&lt;/div&gt;</em><br></p>
                <p>Card in multiple categories:&nbsp;<em>&lt;div class="filtr-item"
                        data-category="</em><strong><em>4,5</em></strong><em>"&gt;...&lt;/div&gt; (separate with
                        comma)</em><br></p>
                <h3>Documentation</h3>
                <p class="text-uppercase"><a href="http://yiotis.net/filterizr/" target="_blank">filterizr
                        website<br></a></p>
                <p class="text-right small">Photos by&nbsp;<a
                        href="https://unsplash.com/photos/4nulm-JUYFo?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText"
                        target="_blank"><em>Averie Woodard</em></a></p>
            </div>
        </article> --}}
    </section>

    <div class="modal fade" role="dialog" tabindex="-1" id="editbook">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Добавление / Редактирование книги</h4><button type="button"
                        class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div>
                        <img src="assets/svg/load.svg" width="256" height="256" alt="Loading..." style="width: 100%;">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/-Filterable-Cards-.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>
